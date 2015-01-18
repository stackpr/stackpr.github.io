---
title: The craziest bug I've ever seen
layout: post
category: blog
tags:
- PHP
- Linux
- MySQL
- Apache
permalink: /blog/2009/11/05/craziest-bug-ive-ever-seen

---
{% include JB/setup %}
<div id="node-66" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I have a module that is installed at least 12 times on one site. One of the instances started having major speed issues. After generating all of its output (i.e. completing all of the application code), it would hang and do something on the server until it hit 100 seconds. At that point, it would give the user an error message indicating that it had exceeded the maximum 30 seconds of execution time in "Unknown" on line 0.</p>
<!--break-->
<p>I eventually discovered that it happened whenever a particular XML file was referenced. I adjusted it so that only one attribute was different from a working system, but the problem continued. I eliminated all ^M characters, but the problem continued. At one point, I left a test XML file in the directory, and the problem seemed to go away. Very strange...</p>
<p>So I renamed the test file -- no problem. I removed the file -- problem returned. After much testing, it appeared that creating a file with any name of any type and of any size in the directory was sufficient to suppress the symptom. I have never before solved a problem by creating an unreferenced empty file. The only theory I have for why it worked relates to the Linux filesystem I am using, but it seems like quite a stretch. I only wish there were a better error message so that I would have something to google.</p>
</div></div></div>  </div>
</div>
