---
title: Small Joys in Document Conversion
layout: post
category: blog
tags:
- Linux
- Microsoft Office
permalink: /blog/2010/09/06/small-joys-document-conversion

---
{% include JB/setup %}
<div id="node-95" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p><a href="http://dag.wieers.com/home-made/unoconv/">Unoconv</a></p>
<p>I always wondered why Open Office did not come with a command-line converter. Well, so did someone else -- but they had some free time! The unoconv utility seems to be a well-designed solution for document conversion. I'm playing with it now and hope that performance can hold up to what I plan to throw at it!</p>
<!--break-->
<p>Combine this with the fact that Office documents like .xlsx are just zip files containing XML and other resources, and we have some vast potential even in a Linux-only environment. The only real downside to the whole process is that unoconv does not seem to allow us to control which sheet is converted. Thus, to convert the second tab to some other format, the system must first reorder the tabs.</p>
<p><a href="http://phpexcel.codeplex.com/">PHP Excel</a></p></div></div></div>  </div>
</div>
