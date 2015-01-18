---
title: Firefox Broke My Selects (and the JS that fixed them)
layout: post
category: blog
tags:
- JS
- jQuery
- jQuery UI
- Firefox
permalink: /blog/2012/10/16/firefox-broke-my-selects-and-js-fixed-them

---
{% include JB/setup %}
<div id="node-239" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>A coworker experienced a strange problem yesterday (10/15/2012) wherein she could not expand select boxes on one of our key administrative tools. This seemed odd, especially since I had no problems on any other computers. However, after Firefox updated for me, I was also suddenly unable to access the tools. Given that I rely heavily on jQuery and jQuery UI, which provide superb cross-browser support, I have not experienced a browser upgrade bug in quite some time. I did not want to upgrade the libraries, since that would likely cause other bigger issues, but I needed to fix it.</p>
<!--break-->
<p>I am not sure which element was the offending factor, but here is what contributed:</p>
<ol><li>
		jQuery 1.5.1</li>
	<li>
		jQuery UI 1.6</li>
	<li>
		Firefox 16.0.1 on Windows 7</li>
	<li>
		Select boxes were inside of &lt;li&gt; tags that used both accordions and tabledrag</li>
</ol><p>The hack/fix is quite stupid and should be unnecessary:</p>
<pre class="brush:jscript">
$('select').click(function(){
  $(this).focus();
});</pre>
<p>Basically, the workaround was to tell the browser that it should focus on the select box whenever it is clicked. It seems ridiculous. But it did the trick.</p>
</div></div></div>  </div>
</div>
