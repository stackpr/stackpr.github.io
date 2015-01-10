---
title: VMware ESXi
layout: post
category: blog
tech:
- VMware
permalink: /blog/2011/07/28/vmware-esxi

---
{% include JB/setup %}
<div id="node-116" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I have used VMware player for quite some time on my desktop so that I have a safe sandbox for my LAMP development. The ability to easily backup and restore has come in handy several times, and I generally have at least two different virtual machines running all the time. I also work with Amazon EC2, so the virtual machine architecture is all around. And I love it.</p>
<p>While configuring a new server to run ESXi with a couple virtual machines on it, I was able to explore a different set of tools. ESXi is very user-friendly, and most tasks could be accomplished through the interface. Some items (like adding human-readable names to disks) do not appear to be accessible through the interface, and the vSphere client does not run on Linux. However, it provides many useful monitoring resources, straightforward datastore management, and excellent community support.</p>
<p>Unfortunately, as with many decisions, there was a dealbreaker that rendered the pro/con list irrelevant. The vmdk files are just as prone to corruption on power loss as with other players. The server is on a UPS, of course, but there is always the real-world situation where the server requires a hard reset either because it froze or because the more advanced options require staff members who are not available.</p>
<p>The need for a coworker to be able to push the power button without a high probability of corrupting the server was the end of the debate for me. I tested my concern a few times, and corruption followed shortly thereafter. If we had more staff such that a tech person is constantly available or such that there is redundant hardware, then I would definitely love to work with a virtual machine structure for the office server. But not today.</p></div></div></div>  </div>
</div>
