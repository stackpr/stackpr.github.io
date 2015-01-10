---
title: Pear's XML_Beautifier corrupted HTML data encoded in XML
layout: post
category: blog
tech:
- PHP
- Pear
- XML_Beautifier
- XML
permalink: /blog/2012/10/03/pears-xmlbeautifier-corrupted-html-data-encoded-xml

---
{% include JB/setup %}
<div id="node-231" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>After spending a few hours setting up a basic UI to manage an XML-based application, I ran into a corruption problem. Configurations were written to an XML file, and some configurations could contain an HTML string. This did not cause any problems for the XML parser itself, but the XML was sent through Pear's XML_Beautifier before being written to the static file. That is an important step when humans (mainly me) need to be able to read, update and `svn diff` the XML files long-term.</p>
<!--break-->
<p>A simplified example XML:</p>
<pre class="brush:xml">
&lt;tag&gt;&amp;lt;p&amp;gt;Hello World!&amp;lt;/p&amp;gt;&lt;/tag&gt;</pre>
<p>Using Pear's XML_Beautifier, ($b-&gt;formatString($str)), you get:</p>
<pre class="brush:xml">
&lt;tag&gt;&amp;lt; p &amp;gt; Hello World! &amp;lt; /p &amp;gt;&lt;/tag&gt;
</pre>
<p>Obviously, this has broken the HTML markup contained in the XML. I traced it pretty far through the class, but the bug seems to be at a low low level such that I did not want to risk affecting other systems. Instead, I simply switched over to DomDocument:</p>
<pre class="brush:php">
$dom = new DOMDocument;
$dom-&gt;preserveWhiteSpace = false;
$dom-&gt;formatOutput = true;
$dom-&gt;loadXML($xmlStr);
$str = $dom-&gt;saveXML();</pre>
<p>The result encoded \r characters (instead of eliminating or ignoring them) and indented 2 spaces (instead of tabs). But it worked reliably. I added a couple lines of PHP to clean up those downsides, and everything is humming along safely and reliably.</p>
</div></div></div>  </div>
</div>
