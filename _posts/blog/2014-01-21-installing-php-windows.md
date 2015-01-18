---
title: Installing PHP on Windows
layout: post
category: blog
tags:
- PHP
- Windows
permalink: /blog/2014/01/21/installing-php-windows

---
{% include JB/setup %}
<div id="node-313" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Installing PHP on Linux is straightforward with apt-get or your preferred package management system. Although PHP.net does not provide that uber-simple solution, Microsoft provides a solution for us.</p>
<!--break-->
<p>Use the <a href="http://www.microsoft.com/web/platform/phponwindows.aspx">Web Platform Installer</a> to install stable versions of 5.2 or 5.3. On my computer, this installed PHP at <strong>C:\Program Files (x86)\PHP\php.exe</strong>. Unfortunately, the installer does not update your PATH for trivial command-line usage. To add the path to php.exe into your batch file, add this line:</p>
<pre class="brush:bash">
set PATH=%PATH%;"C:\Program Files (x86)\PHP"</pre>
<p>Remember to confirm and adjust the installation folder before adding this 'set' statement to your script.</p>
<p><strong>Update:</strong> In a more recent installation, the default profiles did not work. However, selecting PHP for IIS Express did install, and it includes the CLI version.</p>
</div></div></div>  </div>
</div>
