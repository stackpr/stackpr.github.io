---
title: Smarty date_format Error on PHP 5.3.10
layout: post
category: blog
tech:
- PHP
- Smarty
permalink: /blog/2012/08/16/smarty-dateformat-error-php-5310

---
{% include JB/setup %}
<div id="node-202" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I've been phasing out Smarty templates for a few years now to bring code and template more in-line with Drupal standard practices. Unfortunately, a few lingering features still use Smarty templates. Updating the Smarty engine in the past has broken some templates (so a version update is unlikely as the templates are being deprecated), but I recently discovered a bug that is exacerbated by an updated version of PHP.</p>
<p>Prior to Smarty 2.6.10, the <a href="http://www.smarty.net/docsv2/en/language.modifier.date.format">date_format</a> modifier tried to use strtotime before checking whether the input was possibly already a timestamp. On PHP 5.3.3 (and possibly later), this worked fine since recent and near-future timestamps would fail to convert and thereby fall through to where numbers were detected. Unfortunately, PHP 5.3.10 "upgraded" strtotime so that it takes a wild guess at what a timestamp means. The combo of odd logic plus new PHP behavior meant that random dates were appearing in the templates.</p>
<pre class="brush:php">
# echo '&lt;?php echo strftime("%H:%M:%S %Y-%m-%d", strtotime("1344542120"));' | php
# 13:44:54 2120-08-16</pre>
<p>To clarify, a 10-digit unix timestamp is interpretted as "HHMMSSYYYY", and the month/day are from today. That's one of the most bizarre strtotime() interpretations I've run into.</p>
<p>To avoid a major wave of testing, I simply patched the plugins/shared.make_timestamp.php to look for timestamps before trying strtotime. If you are more reliant on Smarty, then you probably need to make sure you are running on Smarty 2.6.10+ (or version 3+) before upgrading to the latest version of PHP 5.3.</p>
<p>And yes, I realize that Smarty 3 has been out for a few years now. I see that as more of a reminder to finish eliminating Smarty entirely rather than to consider an update to the latest version</p>
</div></div></div>  </div>
</div>
