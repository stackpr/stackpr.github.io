---
title: Extract path from .lnk file using PHP
layout: post
category: blog
tech:
- PHP
- Linux
- Windows
permalink: /blog/2011/02/21/extract-path-lnk-file-using-php

---
{% include JB/setup %}
<div id="node-107" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Despite a few blogs suggesting that .lnk files were plain text, I found them to be quite binary and inconvenient to work with via PHP. Fortunately, I did not need to extract all of the shortcut information -- I just needed the target path. This code snippet worked on file shortcuts on local drives and network mounted drives, but it does require a drive letter to work. It has not been tested for all scenarios, but it works for basic path extraction.</p>
<!--break-->
<pre class="brush:php">
$dat = file_get_contents($lnk);
$tgt = preg_replace('@^.*\00([A-Z]:)(?:\\\\.*?\\\\\\\\.*?\00|[\00\\\\])(.*?)\00.*$@s', '$1\\\\$2', $dat);
</pre>
<p><em>Update 2011-09-14: Adjusted the regex for improved handling of shortcuts on a network mounted drive.</em></p>
</div></div></div>  </div>
</div>
