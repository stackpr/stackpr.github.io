---
title: Automatic Backup - EBS Snapshots
layout: post
category: blog
tech:
- Amazon EC2
- Amazon IAM
permalink: /blog/2013/06/24/automatic-backup-ebs-snapshots

---
{% include JB/setup %}
<div id="node-288" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Applications running on Amazon EC2 frequently use EBS for persistent storage. It survives reboots, and it facilitates convenient backup models via snapshots. The snapshots are stored incrementally such that you only incur storage expenses when data differs between snapshots. Thus, if a volume has strictly-growing data (e.g., log files), then taking a snapshot at time A and B would take about the same amount of storage as taking an extra 10 snapshots between those two times. While they can be created manually online, automated EBS snapshots are a thousand times more helpful. It takes a few minutes to setup, but hopefully these instructions will prove helpful.</p>
<!--break-->
<h2>
	System Requirements</h2>
<p>Although possible on any system, the instructions assume the following Linux setup.</p>
<ol><li>
		Ubuntu Linux with SSH or terminal access</li>
	<li>
		<a href="http://aws.amazon.com/developertools/368">Amazon EC2 AMI Tools : Developer Tools : Amazon Web Services</a></li>
	<li>
		One solution is to start with the Ubuntu AMI: <a href="http://cloud-images.ubuntu.com/locator/ec2/">Ubuntu Amazon EC2 AMI Finder</a></li>
	<li>
		PHP</li>
</ol><h2>
	Instructions</h2>
<ol><li>
		<a href="https://console.aws.amazon.com/iam/home?#users">Go to the IAM Console</a></li>
	<li>
		Create a user "backup-ebs-user" (or use any alternate name)
		<ol><li>
				<a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_SettingUpUser.html">AWS's instructions for adding an IAM User</a></li>
			<li>
				Record the user name and security credentials for future use (not necessary for this task)</li>
		</ol></li>
	<li>
		Create a certificate for CLI
		<ol><li>
				<a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_UploadCertificate.html">Creating and Uploading a User Signing Certificate</a></li>
			<li>
				In terminal, run (the third command includes a number of user prompts that you can address as you see fit):<br /><pre class="brush:bash">
cd /path/to/secure/location/
openssl genrsa 1024 &gt; backup-ebs-user.private-key.pem
openssl req -new -x509 -nodes -sha1 -days 365 -key backup-ebs-user.private-key.pem -outform PEM &gt; backup-ebs-user.certificate.pem</pre>
			</li>
			<li>
				Upload the .pem file to Amazon: Click "Manage Signing Certificates" for the user and paste the backup-ebs-user.certificate.pem file</li>
		</ol></li>
	<li>
		Update the permissions for the backup user
		<ol><li>
				<a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PoliciesOverview.html">Overview of AWS IAM Policies</a></li>
			<li>
				<a href="http://awspolicygen.s3.amazonaws.com/policygen.html">AWS Policy Generator</a></li>
			<li>
				The key steps for adding a policy are to go to the user, click Permissions, click "Attach User Policy", and click "Custom Policy" to initiate the process of adding the secure policy for this user.</li>
			<li>
				The user needs the ability to view and create EBS snapshots, which involves this minimal policy:<br /><pre class="brush:jscript">
{
  "Statement": [
    {
      "Sid": "1",
      "Action": [
        "ec2:CreateSnapshot",
        "ec2:DeleteSnapshot",
        "ec2:DescribeVolumes",
        "ec2:DescribeSnapshots"
      ],
      "Effect": "Allow",
      "Resource": "*"
    }
  ]
}</pre>
			</li>
		</ol></li>
	<li>
		Install the script to create snapshots nightly
		<ol><li>
				Copy backup-ebs.php to your server</li>
			<li>
				Edit the file and customize the configuration variables at the top of the file (e.g., paths to the .pem files)</li>
			<li>
				Change the mode to allow execution: chmod 755 /path/to/backup-ebs.php</li>
			<li>
				Update crontab to run as frequently as you like:
				<ol><li>
						In terminal: crontab -e</li>
					<li>
						Add line: 30 23 * * * /path/to/backup-ebs.php</li>
				</ol></li>
		</ol></li>
</ol><h2>
	WARNINGS/DISCLAIMERS</h2>
<p>Use this script at your own risk. Make sure you understand what the script is doing!!!!</p>
<ol><li>
		Snapshots result in charges to your AWS account.</li>
	<li>
		Snapshots are automatically deleted after the configured time limit. That data is lost forever.</li>
	<li>
		AMI snapshots are never automatically deleted by this script, so costs can continue to escalate for those snapshots.</li>
	<li>
		If you are using a micro instance (or if you run other resource-intensive applications), then be warned that snapshot creation can be killed by the system if resources are insufficient. Thus, whenever possible, run this on a larger instance -- or on a non-EC2 server since snapshots do not need to be triggered from the cloud.</li>
</ol><h2>
	Script: backup-ebs.php</h2>
<pre class="brush:php">
#!/usr/bin/php
&lt;?php
// Configure the script.
$AWSDIR = "/path/to/secure/location";
$AWSCERT = "--cert=$AWSDIR/backup-ebs-user.certificate.pem --private-key=$AWSDIR/backup-ebs-user.private-key.pem";
$MAXDAYS = 60;
// -----------------------------------------------------------------------
// NO NEED TO EDIT BELOW THIS LINE.
// Delete any old snapshots.
$EBS = "ec2-create-snapshot $AWSCERT ";
$snapshots = array();
$cmd = "ec2-describe-snapshots $AWSCERT";
exec($cmd, $snapshots);
foreach ($snapshots as $snapshot) {
  // Parse the snapshot data.
  $snapshot = preg_split("@\s+@s", trim($snapshot), 9);
  $snapshotId = $snapshot[1];
  if ($snapshot[3] !== 'completed') {
    continue;
  }
  // Never delete AMI snapshots.
  if (isset($snapshot[8]) &amp;&amp; strpos($snapshot[8], 'ami-') !== FALSE) {
    continue;
  }
  // Delete any snapshots over MAXAGE.
  $time = strtotime($snapshot[4]);
  if ($time &lt; time() - 86400 * $MAXDAYS) {
    $cmd = "ec2-delete-snapshot $AWSCERT $snapshotId";
    echo "Deleting $snapshotId from $snapshot[4]\n";
    system($cmd);
  }
}
// Create snapshots of any volumes that currently exist on the account.
$volumes = array();
$cmd = "ec2-describe-volumes $AWSCERT | egrep 'TAG.*Name' | cut -f 3,5";
exec($cmd, $volumes);
foreach ($volumes as $vol) {
  list($volId, $volName) = preg_split("@\s+@s", trim($vol), 2);
  $volName = str_replace('ami-', 'ami_', $volName);
  $volName = escapeshellarg($volName);
  $cmd = "$EBS -d $volName $volId";
  echo "Creating snapshot $volName for $volId\n";
  system($cmd);
}</pre>
<!--?php
// Configure the script.
$AWSDIR = "/drive/www_witti_ws/system/aws";
$AWSCERT = "--cert=$AWSDIR/witti-backup-ebs.certificate.pem --private-key=$AWSDIR/witti-backup-ebs.private-key.pem";
$MAXDAYS = 60;
// -----------------------------------------------------------------------
// NO NEED TO EDIT BELOW THIS LINE.
// Delete any old snapshots.
$EBS = "ec2-create-snapshot $AWSCERT ";
$snapshots = array();
$cmd = "ec2-describe-snapshots $AWSCERT";
exec($cmd, $snapshots);
foreach ($snapshots as $snapshot) {
  // Parse the snapshot data.
  $snapshot = preg_split("@\s+@s", trim($snapshot), 9);
  $snapshotId = $snapshot[1];
  if ($snapshot[3] !== 'completed') {
    continue;
  }
  // Never delete AMI snapshots.
  if (isset($snapshot[8]) && strpos($snapshot[8], 'ami-') !== FALSE) {
    continue;
  }
  // Delete any snapshots over MAXAGE.
  $time = strtotime($snapshot[4]);
  if ($time < time() - 86400 * $MAXDAYS) {
    $cmd = "ec2-delete-snapshot $AWSCERT $snapshotId";
    echo "Deleting $snapshotId from $snapshot[4]\n";
    system($cmd);
  }
}
// Create snapshots of any volumes that currently exist on the account.
$volumes = array();
$cmd = "ec2-describe-volumes $AWSCERT | egrep 'TAG.*Name' | cut -f 3,5";
exec($cmd, $volumes);
foreach ($volumes as $vol) {
  list($volId, $volName) = preg_split("@\s+@s", trim($vol), 2);
  $volName = str_replace('ami-', 'ami_', $volName);
  $volName = escapeshellarg($volName);
  $cmd = "$EBS -d $volName $volId";
  echo "Creating snapshot $volName for $volId\n";
  system($cmd);
}
</pre--></div></div></div>  </div>
</div>
