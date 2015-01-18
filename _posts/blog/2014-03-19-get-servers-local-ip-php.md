---
title: Get Server's Local IP with PHP
layout: post
category: blog
tags:
- PHP
permalink: /blog/2014/03/19/get-servers-local-ip-php

---
{% include JB/setup %}
<div id="node-328" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>There is an easy way to get the local IP of a server using PHP.</p>
<!--break-->
<p><strong>For PHP 5.3+</strong></p>
<pre class="brush:php">
$ip = gethostbyname(gethostname());</pre>
<p><strong>For PHP 4.02+</strong></p>
<pre class="brush:php">
$ip = gethostbyname(php_uname('n'));</pre>
</div></div></div>  </div>
</div>
