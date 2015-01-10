---
title: Pithy Template Engine
layout: post
category: portfolio
tech:
- PHP
- JS
- VBScript
- VBA
permalink: /portfolio/pithy-template-engine

---
{% include JB/setup %}
<div id="node-25" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Smarty templating language hold mass appeal for its usability and simple separation of interface and application. I have built several engines that use the same syntax with adjustments to handle the differences in programming languages. The <strong>Pithy</strong> rendering engines mimic the syntax of Smarty, but they add various extra capabilities.</p>
<p>The language was ported to various languages to provide a common denominator for my staff at Uppercase Development. By reducing the number of technologies to learn, training time was kept under control as we addressed projects in languages other than PHP.</p>
<h2>PHP - Pithy is a Smarty wrapper</h2>
<p>In PHP, Pithy extends and enhances the Smarty engine. It adds the following key features:</p>
<ol><li>Template directory inheritance: each directory can override specific templates from its parent template directories.</li>
    <li>In-memory templates: dynamic templates and database-driven templates require allowing non-file templates to be compiled and referenced.</li>
    <li>Class-based plugins: custom functions, methods and blocks can be created by registering classes. This allows easier creation of methods and functions that can be accessed in multiple ways. It also keeps logic in the GoRad namespacing and allows for alternate use of the plugins.</li>
</ol><h2>JS - Pithy is an AJAX tool</h2>
<p>In JS, Pithy has a few unique characteristics:</p>
<ol><li>Compiled templates are cached</li>
    <li>Templates can be loaded from variables or from the server</li>
    <li>When loaded from the server, Pithy handles the async process to perform AHAH placement of output</li>
</ol><h2>VBA/VBScript - Pithy is an XPath tool</h2>
<p>VBA and VBScript required separate codebases, but their Pithy features are identical. The relevant distinction for these languages is the lack of a basic multi-dimensional hash. Although it is possible to work around that, a more natural approach was taken:</p>
<ol><li>Basic conditionals, substitutions and loops are fully supported</li>
    <li>
    <pre>
Data can be assigned using XPath:
tple.assign "var", "val"
tple.assignByXpath "/loop[1]/sub[1]/var", "val"</pre>
    </li>
</ol><p> </p></div></div></div>  </div>
</div>
