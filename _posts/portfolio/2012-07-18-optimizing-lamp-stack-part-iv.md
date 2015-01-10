---
title: Optimizing the LAMP Stack - Part IV
layout: post
category: portfolio
tech:
- Linux
- Amazon EC2
- Amazon RDS
- Varnish
position:
- End-to-end
- System Administrator
permalink: /portfolio/optimizing-lamp-stack-part-iv

---
{% include JB/setup %}
<div id="node-172" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>This wave of optimizations received some extra funding, which made an enormous difference. I upgraded the underlying virtual hardware beyond a very important threshold at Amazon.</p>
<h2>
	The Changes</h2>
<ol><li>
		Upgraded EC2 <a href="http://aws.amazon.com/ec2/instance-types/">instance type</a> to a level that included "I/O Performance: High".
		<ol><li>
				While the I/O was a driving force for the upgrade, it also came with 4x CPU and 4x RAM compared to the previous configuration.</li>
			<li>
				Upgraded to 64-bit architecture and started with a current Ubuntu server template.</li>
			<li>
				The CPU utilization has dropped to 1/6 of previous levels under normal load.</li>
		</ol></li>
	<li>
		Upgraded RDS <a href="http://aws.amazon.com/rds/">instance class</a> to a level that included "High I/O Capacity".
		<ol><li>
				While the I/O was a driving force for the upgrade, it also came with 8x CPU and 9x RAM compared to the previous configuration.</li>
			<li>
				Previously, we would spin a readonly replica during work hours, which means that we are seeing a lower effective increase of about 4x CPU and 4x RAM (since we were doubling up). Of course, those numbers ignore replication and overhead.</li>
			<li>
				The CPU utilization has dropped below 1/10 of previous levels under normal load.</li>
		</ol></li>
	<li>
		Reconfigured varnish to use "-s malloc" rather than "-s file" to take advantage of extra RAM now available.
		<ol><li>
				Cuts disk writes on instance storage to about 1/3 of previous levels.</li>
			<li>
				Maximizes speed of cached pages.</li>
			<li>
				Shifted static files into varnish so that static images could be served without hitting the disk at all. Very fast.</li>
		</ol></li>
	<li>
		Drupal module consolidation.
		<ol><li>
				Reduced number of modules by upgrading to consolidated versions, disabling less important modules, and consolidating small custom modules that did not need to be distinct (due to low probability of contributing publicly).</li>
			<li>
				Deleted unused modules from the file system to reduce entries in the system table.</li>
		</ol></li>
	<li>
		Improved PHP's handling of path resolution based on <a href="http://www.achieveinternet.com/enterprise-drupal-blogs/enterprise-drupal-performance-caching-hosting/5-things-you-can-do-improve-performance-and-scal?goback=%2Egde_35920_member_141542337">this post</a>.
		<ol><li>
				realpath_cache_size=4096k<br />
				Note: It was surprising how much higher than the default (16k) this had to be set to have an impact. 4096k is much higher than we actually utilize, but avoiding a full-cache issue down the line justified the extra high number for us.</li>
			<li>
				realpath_cache_ttl=3600<br />
				Note: This is potentially dangerous when dealing with temporary files. As long as our temporary files rely on tempnam, we should be fine since it makes naming collisions unlikely.</li>
		</ol></li>
	<li>
		Upgrade EBS for main PHP files to ext4 without journaling
		<ol><li>
				Saw a 6% reduction in the Write Bandwidth on the device.</li>
			<li>
				Upgrade process:
				<ol><li>
						Create a second volume (/dev/xvdm) from an accurate snapshot of the EBS volume (/dev/xvdf).</li>
					<li>
						service apache2 stop; umount go; mount -o noatime -t ext3 /dev/xvdm /go; service apache2 start</li>
					<li>
						tune2fs -o journal_data_writeback /dev/xvdf</li>
					<li>
						tune2fs -O extents,uninit_bg,dir_index /dev/xvdf</li>
					<li>
						e2fsck -fDC0 /dev/xvdf</li>
					<li>
						service apache2 stop; umount go; mount -o noatime,data=writeback,commit=100,nouser_xattr -t ext4 /dev/xvd /go; service apache2 start</li>
				</ol></li>
			<li>
				References:
				<ol><li>
						<a href="http://www.thedeveloperday.com/tag/ubuntu/">noatime,data=writeback</a></li>
					<li>
						<a href="http://ext4.wiki.kernel.org/index.php/Ext4_Howto#Converting_an_ext3_filesystem_to_ext4">Upgrade ext3 to ext4</a></li>
					<li>
						<a href="http://www.mjmwired.net/kernel/Documentation/filesystems/ext4.txt#381">data=writeback</a></li>
					<li>
						<a href="http://erikugel.wordpress.com/2011/04/14/the-quest-for-the-fastest-linux-filesystem/">writeback details and "barrier"</a></li>
					<li>
						<a href="http://pclinuxos2007.blogspot.com/2009/06/tweaks-to-boot-ext4-filesystem.html">Reasons to avoid using barrier=0 and nobh</a></li>
					<li>
						<a href="http://orion.heroku.com/past/2009/7/29/io_performance_on_ebs/">Reiteration that raid optimizations are good on EBS</a></li>
				</ol></li>
		</ol></li>
</ol><h2>
	The Results</h2>
<ol><li>
		Significantly less disk access.</li>
	<li>
		Faster network communications with database.</li>
	<li>
		Under normal load, non-cached Drupal pages load at least 10% faster and with less variability.</li>
	<li>
		Under heavy load, non-cached Drupal pages load more than 50% faster, and the upper limit of supported users is much higher.</li>
</ol></div></div></div>  </div>
</div>
