---
title: VMWare on Windows 7
layout: post
category: blog
tech:
- Windows
- VMware
permalink: /blog/2012/06/13/vmware-windows-7

---
{% include JB/setup %}
<div id="node-134" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>While running VMWare on a new computer, I ran into some stark performance issues compared to an older computer. Although part of me wanted to celebrate the fact that my Ubuntu host OS worked better than Windows 7, several practical issues motivated me to investigate further</p>
<p>First, Windows 7 handles memory differently. Although I could run 2 VMWare images with 2G RAM on Ubuntu with 4G RAM, the system effectively maxed out on Windows with 4G RAM. Thus, I adjusted the configuration of the images to leave plenty of extra RAM for the guest OS. I also left one core unallocated for use by the host OS.</p>
<p>Second, VMWare requires significant hard drive access. Watching the resource monitor, each image uses significantly more I/O than the entire host OS. With that in mind, we want to take any steps possible to reduce the hard drive usage. Although I did not benchmark the changes (separately or collectively), there was qualitative improvement after disabling shadow copies (previous versions) and search indexing (at least on the folders containing the vmware images). Those same changes had already been made within the guest systems.</p>
<p>For anyone setting up a desktop workstation that will utilize VMWare, I would strongly recommend storing the guest OS images on a dedicated hard drive -- and invest in the fastest hard drive that works with the rest of your hardware. Not only would that isolate the VMWare disk access from host OS disk access, it would also allow you to disable features like indexing and shadow copies that affect VMWare without sacrificing the related nice functionality while you are just using the host OS.</p></div></div></div>  </div>
</div>
