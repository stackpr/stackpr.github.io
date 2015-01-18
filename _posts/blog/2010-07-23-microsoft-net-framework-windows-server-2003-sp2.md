---
title: Microsoft .NET Framework on Windows Server 2003 SP2
layout: post
category: blog
tags:
- Windows Server 2003
permalink: /blog/2010/07/23/microsoft-net-framework-windows-server-2003-sp2

---
{% include JB/setup %}
<div id="node-93" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>You'd think that installing .Net would be simple. Unfortunately, it can be quite a hassle, and a quick google search suggests that the problems are pretty widespread. Here is what my lack of progress looks like on Windows Server 2003 SP2:</p>
<ul><li>Installing 2.0SP1: This product is not supported on Vista Operating System.</li>
    <li>Installing 2.0SP2: SP1 error - This product is not supported on Vista Operating System.</li>
    <li>Installing 3.0: You must use "Turn Windows features on or off" in the Control Panel to install or configure Microsoft .NET Framework 3.0 x86.</li>
    <li>Installing 3.5SP1 directly: You must first install Microsoft .NET Framework 2.0SP1 before installing or repairing this product.</li>
</ul><p>Windows Update failed to upgrade to 3.5, so all of the above errors are generated using the full package distributions. I also ran the .Net Framework Cleanup Utility, followed by reinstalling 2.0.</p>
<p>I finally managed to make some progress using the <a href="http://www.microsoft.com/download/en/details.aspx?id=20028">Microsoft Application Verifier</a>. Basically, the installers work fine, as long as they think they can work. The Appication Verifier allows you to spoof a platform that is supported, so I told 2003 SP2 to pretend to be Vista!</p>
<p>Hopefully, that's the end of the story for a bit, although I'll never get those hours of my life back...</p></div></div></div>  </div>
</div>
