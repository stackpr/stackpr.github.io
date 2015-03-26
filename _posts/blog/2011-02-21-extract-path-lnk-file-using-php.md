---
title: Extract path from .lnk file using PHP
layout: post
category: blog
tags:
- PHP
- Linux
- Windows
permalink: /blog/2011/02/21/extract-path-lnk-file-using-php

---
{% include JB/setup %}
Despite a few blogs suggesting that .lnk files were plain text, I found them to be quite binary and inconvenient to work with via PHP. Fortunately, I did not need to extract all of the shortcut information -- I just needed the target path. This code snippet worked on file shortcuts on local drives and network mounted drives, but it does require a drive letter to work. It has not been tested for all scenarios, but it works for basic path extraction.

<pre class="brush:php">
$dat = file_get_contents($lnk);
$tgt = preg_replace('@^.*\00([A-Z]:)(?:[\00\\\\]|\\\\.*?\\\\\\\\.*?\00)([^\00]+?)\00.*$@s', '$1\\\\$2', $dat);

// Allow shortcuts to root folder - other shortcuts might break due to random regex matches.
// $tgt = preg_replace('@^.*\00([A-Z]:)(?:[\00\\\\]|\\\\.*?\\\\\\\\.*?\00)([^\00]*?)\00.*$@s', '$1\\\\$2', $dat);
</pre>

_Update 2011-09-14: Adjusted the regex for improved handling of shortcuts on a network mounted drive._
_Update 2015-03-26: Adjusted the regex for improved handling of shortcuts to any non-root paths (shortcuts to root directories no longer work)_
