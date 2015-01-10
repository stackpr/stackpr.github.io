---
title: RDS Standard Storage Disk Speeds
layout: post
category: blog
tech:
- Amazon RDS
permalink: /blog/2013/02/20/rds-standard-storage-disk-speeds
images:
- rds_iops.png
- rds_throughput.png
- rds_diskqueue.png

---
{% include JB/setup %}
<div id="node-254" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I maxed out db.m1.xlarge RDS instance's disk capacity that utilized RDS Standard Storage, which provides what Amazon describes as High I/O. The Disk Queue hit 150, which means that the IOPs and throughput were definitely pushed to their limits. Based on the results, the standard storage instances perform on par with using a <a href="http://en.wikipedia.org/wiki/Parallel_ATA">Parallel ATA</a> (133 MB/s). That performance comparison seems relatively accurate, although it is probably more like a shared portion of a <a href="http://en.wikipedia.org/wiki/Serial_ATA">SATA</a> (150+ MB/s) drive or a RAID system.</p>
<p>The throughput stabilized around 125 MB/s read+write and 4,500 IOPs. The easiest way to increase performance beyond this would be to use the <a href="http://aws.amazon.com/rds/mysql/#PIOPS">Provisioned IOPs</a>, which would allow you to increase the IOPs as high as 10,000. Unfortunately, you'd see a major increase in cost to make that switch.</p>
</div></div></div>  </div>
</div>
