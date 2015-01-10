---
title: Expanding an EBS volume on Ubuntu
layout: post
category: blog
tech:
- Amazon EC2
- Amazon EBS
permalink: /blog/2014/09/22/expanding-ebs-volume-ubuntu

---
{% include JB/setup %}
<div id="node-338" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Amazon provides a <a href="http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ebs-expand-volume.html">verbose explanation of how to expand the volume</a>. However, as long as the volume is strictly for storage, and the storage can be taken offline for a few minutes, then the process is really pretty easy. The instructions below work on Ubuntu 14.04 when using ext2/ext3/ext4 file systems.</p>
<!--break-->
<ol><li>
		Create a snapshot of the volume.</li>
	<li>
		Launch a new volume based on that snapshot.
		<ol><li>
				Select the correct region and volume type based on your EC2 instance and preferred data speed</li>
			<li>
				Increase the volume size</li>
		</ol></li>
	<li>
		CLI: Unmount the old volume: `umount /drive/path`</li>
	<li>
		Online: Detach the old volume</li>
	<li>
		Online: Attach the new volume</li>
	<li>
		CLI: Resize the new volume: `resize2fs /dev/xvdf` (change the "f" as appropriate)</li>
	<li>
		CLI: Mount the new volume: `mount -t ext4 /dev/xvdf /drive/path` (use your normal system mount command, including any flags)</li>
</ol><p>You can reduce downtime by reorganizing these steps. In many cases, resizing will even work after the new volume is mounted (swap steps 6 and 7). If the data is being updated constantly, then you will either need to turn the site off during the transition or add steps to rsync any changes that might have been made between snapshot creation and mounting the new volume.</p>
</div></div></div>  </div>
</div>
