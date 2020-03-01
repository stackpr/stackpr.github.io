---
title: Wiping a hard drive
layout: post
category: blog
tags:
- Linux
permalink: /blog/2009/09/19/wiping-hard-drive

---
{% include JB/setup %}
<div id="node-51" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I've had a number of hard drives wiped using Darik's Boot and Nuke (<a href="http://dban.sourceforge.net/">DBAN</a>). However, I was rather dismayed to discover that that it was incompatible with the RAID 5 configuration on my IBM server. After trying a couple pre-packaged solution, I settled on using a more manual approach by booting from a LiveCD and running the command directly. The necessary command is "shred -vfz -n 100 /dev/hda", which I found <a href="http://linuxhelp.blogspot.com/2006/06/how-to-securely-erase-hard-disk-before.html">here</a>. I used the Fedora LiveCD since I had it, and since I knew it worked with my RAID controller. The only gotchas once you have the CD and command are: (1) you have to run as root and (2) it takes a bloody long time to write over a hard drive 100 times, even if it is a 15K SCSI!</p>
</div></div></div>  </div>
</div>
