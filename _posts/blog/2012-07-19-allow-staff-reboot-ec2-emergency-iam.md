---
title: Allow Staff to Reboot EC2 in Emergency via IAM
layout: post
category: blog
tags:
- Amazon EC2
- Amazon IAM
permalink: /blog/2012/07/19/allow-staff-reboot-ec2-emergency-iam

---
{% include JB/setup %}
<div id="node-174" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I first used AWS Identity and Access Management (IAM) earlier this spring to give someone access to upload to only one of our S3 buckets. It is quite an impressive and robust system. As part of our emergency preparedness, however, I needed to give other staff the ability to reboot the web server in an emergency without giving them the ability to perform other costly or dangerous operations.</p>
<p>Rebooting our web server is obviously quite a powerful capability since it takes everything down. However, it is also a quick fix to a variety of problems that could pop up while I am unavailable. The configuration was pretty straightforward:</p>
<ol><li>
		Go to IAM in the AWS management console.</li>
	<li>
		Go to Groups and Create a New Group. Select a default template, like "Amazon EC2 Full Access".</li>
	<li>
		Go to Users and Create New Users. Uncheck "Generate an access key for each User".</li>
	<li>
		For each user, add them to the new group on the "Groups" tab and then set their passwords on the "Security Credentials" tab.</li>
	<li>
		On the IAM Dashboard, you can find the login link for these users under "AWS Account Alias".</li>
	<li>
		If you are not worried about further restricting access, you can stop.</li>
	<li>
		Otherwise, go to the <a href="http://awspolicygen.s3.amazonaws.com/policygen.html">AWS Policy Generator</a>. <i>It is very difficult to hand-write a detailed policy from scratch since I could not find any other page that exposed all of the possible action strings (though it might exist somewhere).</i> In step 1, select "IAM Policy" and then build your policy. I used:
		<ol><li>
				"ec2:DescribeInstanceStatus"</li>
			<li>
				"ec2:DescribeInstances"</li>
			<li>
				"ec2:MonitorInstances"</li>
			<li>
				"ec2:RebootInstances"</li>
		</ol></li>
	<li>
		Generate the policy and copy the resulting JSON code. If you are familiar with JSON, you can probably read the policy well enough to understand it. Otherwise, you can trust the generator or read more of <a href="http://docs.amazonwebservices.com/IAM/latest/CLIReference/RelatedResources.html">the available docs</a>.</li>
	<li>
		Go back to the IAM Management Console, browse to the group, click on its Permissions tab and click "Manage" next to the default policy. Paste the JSON code and "Apply Policy".</li>
	<li>
		The user now has limited access to EC2. They cannot purchase reserved instances, take snapshots, launch instances, terminate instances or do anything other than look at the instances, determine whether they are frozen, and reboot them.</li>
</ol></div></div></div>  </div>
</div>
