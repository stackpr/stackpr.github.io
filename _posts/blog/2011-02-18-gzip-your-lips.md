---
title: Gzip your lips
layout: post
category: blog
tech:
- Linux
- Flash
permalink: /blog/2011/02/18/gzip-your-lips

---
{% include JB/setup %}
<div id="node-106" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Apparently, gzipping swfs can cause inconsistent but severe problems for Flash. The SWFs effectively failed on IE8 on Windows, but they were successful about 50% of the time on Firefox. I was looking for a race condition in the JavaScript that loaded the Flash since the JS changes were earlier in the day versus mod_deflate, which was enabled weeks ago without any complaints. However, you can see that other people have also experienced the problem http://www.google.com/search?q=mod_deflate+.swf -- so turn off mod_deflate for gzip by adding swf to the <code>SetEnvIfNoCase Request_URI</code>line in apache.</p>
</div></div></div>  </div>
</div>
