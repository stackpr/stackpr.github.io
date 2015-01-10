---
title: Used the shortcut code.
layout: post
category: blog
tech:
- Apache
- PHP
permalink: /blog/2012/04/15/used-shortcut-code

---
{% include JB/setup %}
<div id="node-204" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I received an email from David K. He took the <a href="http://witti.ws/blog/2011/02/21/extract-path-lnk-file-using-php">Windows shortcut extraction code</a> and applied it to his web-based directory browser to support multiple access methods by his users.</p>
<!--break-->
<h2>
	David K Describes His Use Case</h2>
<p>Just wanted to thank you for your post on extracting the path from a windows .lnk. I used it in the following scenario:</p>
<p>Server: WebDAV server over SSL</p>
<p>Client: windows: mapped drive letter Z, uses a lot of .lnk shortcuts for various locations on the shared folders</p>
<p>Issue:</p>
<ol><li>
		Clients accessing through a browser can’t use .lnk</li>
	<li>
		DAV doesn’t support symlinks through mapped drive (though it works through a browser)</li>
	<li>
		Windows mapped drive clients can’t create symlinks for browsers to use.</li>
</ol><p>In apache httpd.conf, under appropriate virtualhost, include .conf file:</p>
<pre class="brush:xml">
include /usr/local/apache2/conf/winlink.conf</pre>
<p>see [below] .conf and .php for usage</p>
<p>hope you can use this or share it with someone who can at some point.</p>
<h3>
	Apache Configuration (winlink.conf)</h3>
<pre class="brush:xml">
&lt;IF "%{HTTP_USER_AGENT} =~ /(Avant|Mozilla|Opera|Itunes|Links|ELinks|Lynx|Konqueror|MSIE|Dillo|Uzbl|w3m|NetSurf|Polaris|BlackBerry|HTC|LG|MOT|Nokia|SAMSUNG|SEC|SonyEricsson|Vodafone)/"&gt;
  addhandler winlink .lnk
  Action winlink /cgi-bin/winlink.php?id=
&lt;/IF&gt;</pre>
<h3>
	Apache (PHP) Handler (winlink.php, slightly modified for readability/error-checks)</h3>
<pre class="brush:php">
&lt;?php
/*
Using code found at http://witti.ws/blog/2011/02/21/extract-path-lnk-file-using-php:
...
The following script was derived from the above source and adapted for my personal use.
David Kelley 4/15/2012
*/
// Ensure paths, url, and driveletter of shortcuts are correct or script will fail.
$basepath = "/storage/webdav/public";// no trailing slash
$baseurl = "http://example.com";// no trailing slash
$driveletter = "Q:";// the driveletter you are mapping the shared resource to, and making shortcuts with
$id = preg_replace('@\.+/@s', '', $_GET['id']);
$id = realpath($basepath . $id);
if (!$id || !is_file($id) || strpos($id, $basepath) !== 0) {
  die("Shortcut does not exist inside the configured path.");
}
$contents = file_get_contents($id);
$contents = preg_replace('@^.*\00([A-Z]:)(?:\\\\.*?\\\\\\\\.*?\00|[\00\\\\])(.*?)\00.*$@s', '$1\\\\$2', $contents);
$contents = str_replace("\\","/",$contents);
if (substr($contents, 0, strlen($driveletter)) !== $driveletter) {
  die("Invalid drive letter.");
}
$uri = $baseurl . substr($contents, strlen($driveletter));
header('Location: ' . $uri);
// assemble a header redirect from all supplied values.
?&gt;</pre>
<h3>
	My Notes on the Scripts</h3>
<p>This is a quick script for handling .lnk files, and it does not pretend to do anything else. It does nothing internally for authentication or security, and the die() statements catch the most obvious hack attempts but do nothing to handle them gracefully. The realpath() check will avoid path-related hacks that try to access non-existent files, but nothing is done to confirm that the user is not being redirected into oblivion. The Apache configuration could also be easily translated into a RewriteRule, if a system already uses that module.</p>
<p>All that being said, for a protected intranet WebDAV system that needs a lightweight redirection system, this seems to do the trick. Presumably, such a DAV system is implementing its own layer of security (possibly Basic or Digest HTTP Authentication). Since there does seem to be a use case for it, I thought I'd go ahead and post it.</p>
</div></div></div>  </div>
</div>
