---
title: VMWare NTFS Cluster Size
layout: post
category: blog
tech:
- VMware
- NTFS
permalink: /blog/2012/08/27/vmware-ntfs-cluster-size

---
{% include JB/setup %}
<div id="node-209" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The default NTFS cluster (block) size is 4K. While preparing to move my vmware images to a new drive, I wondered whether tweaking the cluster size could impact performance. Most notes directed at those of us using simple configurations were basically to suggest that that such tiny optimizations were not worth the effort. Here are a few more productive notes that I found:</p>
<ol><li>
		<a href="http://www.wilson-it.com/resources/vmwarentfsclusters.pdf">One benchmark showed that the default 4K size had a very slight advantage.</a></li>
	<li>
		<a href="http://www.symantec.com/connect/forums/vmware-backups-are-too-slow">Some related software is optimized for a 64K size, so check your backup plan first.</a></li>
	<li>
		<a href="http://communities.vmware.com/thread/117585">If you are using special storage hardware, then you might want to align with its configuration.</a></li>
</ol><p>You can confirm your current cluster size by running a command prompt as administrator (change your drive letter and then look for "Bytes Per Cluster":</p>
<pre class="brush:bash">
C:\&gt;fsutil fsinfo ntfsinfo C:
NTFS Volume Serial Number :       0xb092904292900f4a
Version :                         3.1
Number Sectors :                  0x0000000014736fff
Total Clusters :                  0x00000000028e6dff
Free Clusters  :                  0x00000000012b98a7
Total Reserved :                  0x00000000000007d0
Bytes Per Sector  :               512
Bytes Per Physical Sector :       &lt;Not Supported&gt;
Bytes Per Cluster :               4096
Bytes Per FileRecord Segment    : 1024
Clusters Per FileRecord Segment : 0
Mft Valid Data Length :           0x0000000008f80000
Mft Start Lcn  :                  0x00000000000c0000
Mft2 Start Lcn :                  0x0000000000000002
Mft Zone Start :                  0x000000000269a4a0
Mft Zone End   :                  0x00000000026a68a0
RM Identifier:        XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX</pre>
</div></div></div>  </div>
</div>
