---
title: Updating PDT Tools Formatter for Eclipse
layout: post
category: blog
tech:
- PHP
- Eclipse
permalink: /blog/2013/06/05/updating-pdt-tools-formatter-eclipse

---
{% include JB/setup %}
<div id="node-284" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Without purchasing Zend Studio or another commercial PHP IDE, Eclipse with PDT and PDT Tools seems to be the compelling solution. PDT Tools (pdt_tools) is a separate package that provides utilities like code formatting for PHP. The pdt_tools package for Eclipse is still <a href="http://sourceforge.jp/users/atlanto/pf/eclipse/files/">available for download</a>. However, according the <a href="http://sourceforge.jp/projects/pdt-tools/scm/git/CodeFormatter/">project page</a> on SourceForge JP, the pdt_tools formatter subproject is "concluded". Some of the code formatting was not aligned with my preferences, so I took a closer look at the plugin.</p>
<!--break-->
<p>The first step was accessing the source code. Two options are located below, including the actual source used to create the package zip file. The "another developer" version appears to be for a previous version of Eclipse, so the "original developer" code is probably what you will need. As I dug into the code, I finally figured out that the module does not actually contain very much of the formatting logic. Basically, it leverages the Eclipse CodeFormatter classes (see references). This module appears to tokenize the PHP and map it to standard C-style constructs that the Eclipse CodeFormatter can then format. The result is that the majority of the module is simply UI for configurations and that adding new formatting options is comparatively quite difficult. The only formatting logic that appears to be directly implemented relates to alignment.</p>
<p>One of my reasons for researching is that I prefer two divergent styles of code formatting for array initializers. In the end, I concluded that I could not have it both ways without significant customization:</p>
<pre class="brush:php">
// One-line for ordered arrays
$arr = array(1, 2, 3);
// Multi-line for hashes
$hash = array(
  'key' =&gt; 'value',
);</pre>
<p>Regardless, I hope that these preliminary notes help anyone else looking to customize the code formatter.</p>
<h3>
	References</h3>
<ol><li>
		From the original developer: <a href="http://sourceforge.jp/projects/pdt-tools/scm/git/CodeFormatter/tree/master/pdt_tools.formatter/">CodeFormatter (git) - Tools for PDT (PHP Development Tools) - SourceForge.JP</a></li>
	<li>
		From another developer that forked an old version: <a href="https://github.com/dmeybohm/Eclipse-PHP-Formatter/tree/master/src/jp/sourceforge/pdt_tools/formatter">Eclipse-PHP-Formatter/src/jp/sourceforge/pdt_tools/formatter at master · dmeybohm/Eclipse-PHP-Formatter · GitHub</a></li>
	<li>
		Leverages the underlying Eclipse CodeFormatter: <a href="http://help.eclipse.org/indigo/index.jsp?topic=%2Forg.eclipse.jdt.doc.isv%2Freference%2Fapi%2Forg%2Feclipse%2Fjdt%2Fcore%2Fformatter%2Fpackage-summary.html">Eclipse Platform Package Browser</a></li>
</ol></div></div></div>  </div>
</div>
