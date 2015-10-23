---
title: Route 53 Dynamic DNS
layout: post
category: blog
tags:
- AWS
- Amazon Route 53
- DNS
- PHP
permalink: /blog/2014/03/19/route-53-dynamic-dns

---
{% include JB/setup %}
<p>The desire to tie a fully-qualified domain name (FQDN) to a dynamic (DHCP) IP address is very common. Applications of such an association include (1) accessing your home network even when your external IP address is subject to change, (2) accessing resources over the LAN even when visiting other locations, (3) configuring a reliable DCHP-based network without relying on a static DHCP configuration, and many other possibilities. This is just one of a hundred different solutions available.</p>
<p>The key technologies for this solution are: Route 53, IAM, and PHP.</p>
<!--break-->
<h2>
	Survey of the Environment</h2>
<ol><li>
		A quick search on github shows dozens of projects related to this. Essentially, this task appears to be too trivial to justify using someone else's framework when a quick script gives you more control and understanding of what is going on.</li>
	<li>
		<a href="http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Route53.Route53Client.html#_changeResourceRecordSets">AWS SDK for Route 53</a>: Documentation of the delete/create command necessary for Dynamic DNS.</li>
	<li>
		<a href="https://github.com/nmenglund/r53update/blob/master/r53update.php">A self-contained PHP app to run on each machine</a>: This particular script requires you to be comfortable that the credentials stored on that machine can do no harm beyond updating its specific DNS entry. It also iterates through all of your zones on each update.</li>
	<li>
		<a href="http://docs.aws.amazon.com/Route53/latest/DeveloperGuide//UsingWithIAM.html">IAM only appears to provide zone-level security - not sure it can lock down to a specific subdomain</a>: This tells us that the requisite security for #3 above is not available in a simple single zone configuration.</li>
	<li>
		<a href="http://docs.aws.amazon.com/Route53/latest/DeveloperGuide/CreatingNewSubdomain.html">Subdomains (and their subdomains) can be added in their own Route 53 zones</a>: This provides a method to lock down the IAM user. Any dynamic dns subdomain could go into its own hosted zone, and the IAM user could be restricted to that zone.</li>
</ol><h2>
	The Solution</h2>
<p>Like everyone else, I decided to roll my own script. I used some snippets from the app referenced in #3 above. Unfortunately, the script represented the minority of the effort required for a configuration that was reasonably secure. Here are the key steps:</p>
<ol><li>
		Create a new hosted zone in Route 53 for a subdomain. Any subdomain within that zone will be editable by anyone who gains access to the computer with the script. See the <a href="http://docs.aws.amazon.com/Route53/latest/DeveloperGuide/CreatingNewSubdomain.html">manual for instructions</a>, but it boils down to these basic steps:
		<ol><li>
				Create a new hosted zone (e.g., dyn.example.com)</li>
			<li>
				Add recordsets to the new hosted zone (e.g., mycomputer.dyn.example.com)</li>
			<li>
				Copy NS entries for the new hosted zone to the primary hosted zone (e.g., add dyn.example.com NS entries to example.com zone) - do NOT add SOA entries</li>
			<li>
				Make note of the new hosted zone's ID for reference in the IAM policy (next step)</li>
		</ol></li>
	<li>Look up HOSTEDZONEID from AWS Console</li>
	<li>
		Create a new user in IAM with restricted permissions (a simple policy template is provided below).</li>
	<li>
		Install PHP on Windows (<a href="/blog/2014/01/21/installing-php-windows/">standalone</a> or <a href="http://www.iis.net/learn/extensions/introduction-to-iis-express/iis-express-overview">within IIS Express</a>).</li>
	<li>
		Install and customize the script in a new folder on your computer.</li>
	<li>
		Within the new folder, install the dependencies: `composer require "aws/aws-sdk-php:^2.5.0"`</li>
	<li>
		The script needs to be run frequently: `php update.php` (adjust both "php" and "update.php" to absolute paths to avoid problems.</li>
	<li>
		Install a scheduled task to run the script as frequently as you like. Customizing a scheduled task is relatively straightforward, but you can customize <a href="/assets/files/dynamic-dns-scheduled-task.xml">this template</a> based on your file system to streamline setup.</li>
</ol>

<h2>IAM Policy Template</h2>
<pre class="brush:jscript">
{
  "Version": "r53-dns",
  "Statement": [
    {
      "Sid": "Stmt1395252367000",
      "Effect": "Allow",
      "Action": [
        "route53:ChangeResourceRecordSets",
        "route53:ListResourceRecordSets"
      ],
      "Resource": [
        "arn:aws:route53:::hostedzone/HOSTEDZONEID"
      ]
    }
  ]
}</pre>

<h2>update.php Script</h2>
<pre class="brush:php">
<?php
require_once __DIR__ . '/vendor/autoload.php';
use Aws\Route53\Route53Client;

function route53_update() {
  // Load the SDK.
  $client = Route53Client::factory(array(
    'key' => '--INSERT YOUR KEY--',
    'secret' => '--INSERT YOUR SECRET--',
  ));

  // Host configuration.
  $ttl = 300;
  $mode = 'local';
  $zone = 'HOSTEDZONEID';
  $hosts = array(
    'My-Computer-1' => array(
      'fqdn' => 'av1.sd.example.com',
    ),
    'My-Computer-2' => array(
      'fqdn' => 'av2.sd.example.com',
    ),
  );

  // Get the fqdn
  $hostname = strtoupper(gethostname());
  if (!isset($hosts[$hostname])) {
    throw new ErrorException("Unknown host name: " . $hostname);
  }
  extract($hosts[$hostname]);

  // Get the IP address.
  if (!isset($mode) || $mode === 'local') {
    $ip = gethostbyname($hostname);
  }
  else {
    $ip = trim(file_get_contents('http://bot.whatismyipaddress.com/'));
  }

  // Get current resource record sets
  $current_recordsets = $client->listResourceRecordSets(array(
    'HostedZoneId' => $zone,
    'StartRecordName' => $fqdn,
    'StartRecordType' => 'A',
    'MaxItems' => 1,
  ))->getAll();
  $current_recordset = $current_recordsets['ResourceRecordSets'][0];

  // Make sure that a change is necessary.
  if ($current_recordset['ResourceRecords'][0]['Value'] === $ip) {
    echo "No update required for $fqdn\n";
        return;
  }

  // Define the batch.
  $batch = array(
    'HostedZoneId' => $zone,
    'ChangeBatch' => array(
      'Comment' => 'My Dynamic DNS',
      'Changes' => array(
        array(
          'Action' => 'DELETE',
          'ResourceRecordSet' => $current_recordset,
        ),
        array(
          'Action' => 'CREATE',
          'ResourceRecordSet' => array(
            'Name' => $fqdn,
            'Type' => 'A',
            'TTL' => $ttl,
            'ResourceRecords' => array(
              array(
                'Value' => $ip
              )
            )
          )
        )
      )
    )
  );
  var_export($batch);

  // Run the batch.
  echo "\n\nrunning the batch...\n";
  $result = $client->changeResourceRecordSets($batch);
  var_export($result);
}
route53_update();
</pre>
