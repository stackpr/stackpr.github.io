---
title: Uppercase Publishing System
layout: post
category: portfolio
tech:
- PHP
- Linux
permalink: /portfolio/uppercase-publishing-system

---
{% include JB/setup %}
<div id="node-141" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>At Uppercase, we leveraged the <a href="http://www.phing.info/">Phing project</a> to manage build/publish scripts for various projects using XML. Code was pruned locally prior to publication so that only the appropriate namespaces would be published. The recursive project requirements allowed us to ensure that all of the necessary code gets published out. The pruning process also allowed for arbitrary processing, including sprites, compiled JS/CSS, and automatic optimization of PHP code (including the suppression of debug code).</p>
<!--break-->
<p>Publication targets followed the same namespace principles as the other UDI code, and the system worked reliably throughout the expansion.</p>
<p>However, reliable is not necessarily good enough. Although we continued to use phing, we created custom functions that leveraged system functions rather than the built-in system functions to improve the speed. For instance, a recursive copy with a filter was very slow with phing's implementation, but it was very fast when we tied into the local system's rsync commands.</p>
<p>As with many projects, after many hours spent optimizing it, it is distinctly possible that a simple custom script and custom configuration file syntax might have been faster and easier to train people on than the far more powerful and complex build system. However, there was never a build challenge that it could not address -- and that is hard to beat.</p>
</div></div></div>  </div>
</div>
