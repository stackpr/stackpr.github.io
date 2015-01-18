---
title: Witti UI Compiler 1.0
layout: post
category: portfolio
tags:
- PHP
- Linux
- Amazon S3
- YUI
- CssTidy
- Gzip
- Smush.it
- CSS
- Image
position:
- Developer
- System Design
- End-to-end
permalink: /portfolio/witti-ui-compiler-10
images:
- cpnp-home.png

---
{% include JB/setup %}
<div id="node-3" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>This is my second-generation UI compiler. It is currently only in use on cpnp.org. It provides the following optimizations:</p>
<ol><li>
		CSS: compact, aggregate, gzip</li>
	<li>
		JS: compact, aggregate, gzip</li>
	<li>
		Images: optimize</li>
</ol><p>All files are stored on Amazon S3 to provide the following additional optimizations:</p>
<ol><li>
		Shorter file names (a CSS image would be "url(1)")</li>
	<li>
		Headers are stored staticall for no processing overhead</li>
	<li>
		Unlimited bandwidth with maximum speeds</li>
	<li>
		Further optimization possible using CloudFront</li>
</ol><p>This processes files and stores states in a Sqlite database for faster processing. This is a strict improvement over the UIX system with one exception - no sprite creation.</p>
</div></div></div>  </div>
</div>
