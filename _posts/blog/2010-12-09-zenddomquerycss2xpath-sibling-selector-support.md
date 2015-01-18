---
title: Zend_Dom_Query_Css2Xpath Sibling Selector Support
layout: post
category: blog
tags:
- PHP
- Zend Framework
- XML
- CSS
permalink: /blog/2010/12/09/zenddomquerycss2xpath-sibling-selector-support

---
{% include JB/setup %}
<div id="node-128" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>We convert CSS stylesheets to inline styles for some email applications with a system built on top of the ZF1 Css2Xpath class. However, it does not support all <a href="http://www.w3.org/TR/selectors/">CSS selectors</a>. Since we are converting to inline, there is no reason to restrict ourselves to browser-supported selectors, and the "E+F" selector (F is preceded immediately by E) is quite handy. For instance, you can use it to modify the margin-top style of the first &lt;p&gt; tag after an &lt;h2&gt; (or &lt;table&gt; or whatnot). Since ZF1 is frozen and soon to be deprecated, the patch is simply dumped below.</p>
<pre>
Index: Css2Xpath.php
===================================================================
--- Css2Xpath.php       (revision 21101)
+++ Css2Xpath.php       (working copy)
@@ -72,7 +72,15 @@
                 }
             } else {
                 foreach ($paths as $key =&gt; $xpath) {
-                    $paths[$key] .= '//' . $pathSegment;
+                    if (substr($xpath, -2) == '::') {
+                        $paths[$key] .= $pathSegment;
+                    }
+                    elseif (strpos($pathSegment, '::') !== FALSE) {
+                        $paths[$key] .= '/' . $pathSegment;
+                    }
+                    else {
+                      $paths[$key] .= '//' . $pathSegment;
+                    }
                 }
             }
         }
@@ -91,6 +99,10 @@
      */
     protected static function _tokenize($expression)
     {
+        if ($expression == '+') {
+            return 'following-sibling::';
+        }
+
         // Child selectors
         $expression = str_replace('&gt;', '/', $expression);
</pre>
</div></div></div>  </div>
</div>
