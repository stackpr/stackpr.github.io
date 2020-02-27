---
title: '`top` command cheat sheet'
layout: post
category: blog
tags:
- Linux
- Amazon EC2
permalink: /blog/2009/07/10/top-command-cheat-sheet

---
{% include JB/setup %}
<div id="node-64" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The top command has always been very helpful when tracking down load issues on a server. However, when I started using EC2, I noticed that the <em>wa</em> stat was hogging the CPU. That was never a problem on our other servers, so I had to go look up <em>wa</em>. It turns out that the drive access is incredibly slow on EC2, even when using their EBS (which is supposed to be faster). I resolved this by offloading all of the static files to a different box. Requests to the CSS and image files were actually hogging the I/O enough to cause problems for the PHP processing. It was further improved by adjusting APC configurations so that there were fewere PHP hits to the hard drives too. At this point, MySql is the primary I/O culprit remaining.</p>
<h2>
	Cheat Sheet</h2>
<ul><li>
		us -&gt; User CPU time: The time the CPU has spent running users’ processes that are not niced.</li>
	<li>
		sy -&gt; System CPU time: The time the CPU has spent running the kernel and its processes.</li>
	<li>
		ni -&gt; Nice CPU time: The time the CPU has spent running users’ proccess that have been niced.</li>
	<li>
		wa -&gt; iowait: Amount of time the CPU has been waiting for I/O to complete.</li>
	<li>
		hi -&gt; Hardware IRQ: The amount of time the CPU has been servicing hardware interrupts.</li>
	<li>
		si -&gt; Software Interrupts: The amount of time the CPU has been servicing software interrupts.</li>
	<li>
		st -&gt; steal (used by virtual CPUs waiting while the hypervisor is servicing another virtual processor, on virtual machines)</li>
</ul><p>Source: http://www.linuxquestions.org/questions/programming-9/what-is-this-value-means-for-641210/</p>
</div></div></div>  </div>
</div>
