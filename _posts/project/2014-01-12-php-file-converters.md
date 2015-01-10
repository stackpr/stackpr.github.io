---
title: PHP File Converters
layout: post
category: project
tech:
- PHP
permalink: /project/php-file-converters

---
{% include JB/setup %}
<div id="node-310" class="node node-project node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>PHP File Converters provides a unified interface to various tools that PHP developers use on a regular basis for file conversions.</p>
<!--break-->
<h2>
	Engines Currently Supported</h2>
<ol><li>
		Convert Engines
		<ol><li>
				<div>
					AbiWord</div>
			</li>
			<li>
				<div>
					Catdoc</div>
			</li>
			<li>
				<div>
					Docverter</div>
			</li>
			<li>
				<div>
					GhostScript</div>
			</li>
			<li>
				<div>
					Htmldoc</div>
			</li>
			<li>
				<div>
					ImageMagick</div>
			</li>
			<li>
				<div>
					LibreOffice</div>
			</li>
			<li>
				<div>
					Pandoc</div>
			</li>
			<li>
				<div>
					PhantomJs</div>
			</li>
			<li>
				<div>
					Ted</div>
			</li>
			<li>
				<div>
					Unoconv</div>
			</li>
			<li>
				<div>
					Unrtf</div>
			</li>
			<li>
				<div>
					WkHtmlToPdf</div>
			</li>
			<li>
				<div>
					Xhtml2Pdf</div>
			</li>
		</ol></li>
	<li>
		Optimize Engines
		<ol><li>
				JpegOptim</li>
			<li>
				Pdftk</li>
		</ol></li>
	<li>
		ReplaceString
		<ol><li>
				Native (custom for PFC!)</li>
		</ol></li>
	<li>
		... and more are coming soon ...</li>
</ol><h2>
	Getting Started</h2>
<p><a href="https://github.com/wittiws/php-file-converters"><img alt="Fork me on GitHub" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" style="position: absolute; top: 0; right: 0; border: 0;" /></a></p>
<h3>
	Installation</h3>
<p>Option 1: Add the "wittiws/php-file-converters" requirement to your composer.json configuration.</p>
<p>Option 2: From the command-line, execute: composer create-project wittiws/php-file-converters</p>
<p>Option 3: Download the source code from <a href="https://github.com/wittiws/php-file-converters">Github</a> and then run `composer update`.</p>
<h3>
	CLI: Command Line Example</h3>
<pre class="brush:bash">
&lt;path&gt;/bin/fileconverter &lt;source&gt; &lt;dest&gt;</pre>
<h3>
	<span style="font-size: 12px;">PHP Example with Composer Autoload</span></h3>
<pre class="brush:php">
&lt;?php
$fc = \Witti\FileConverter\FileConverter::factory();
$fc-&gt;convertFile($source, $destination);</pre>
<h3>
	CLI: STDIN/STDOUT</h3>
<p>Use a hyphen to indicate STDIN (for input) or STDOUT (for output).</p>
<pre class="brush:bash">
prompt&gt; echo "## hi ##" | fileconverter - - --conversion=md:html
&lt;h2 id="hi"&gt;hi&lt;/h2&gt;</pre>
</div></div></div>  </div>
</div>
