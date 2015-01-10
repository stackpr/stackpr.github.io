---
title: Scanstyles does nothing in Webkit/Firefox
layout: post
category: blog
tech:
- JS
- Internet Explorer
permalink: /blog/2013/12/09/scanstyles-does-nothing-webkitfirefox

---
{% include JB/setup %}
<div id="node-302" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Apparently starting in the middle of November, an update to Internet Explorer changed its user agent so that it no longer contains MSIE. My IE user agent is: "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko". JavaScript that detects IE based on the user string now breaks in some browsers, as you might expect. This error was a result of one such problematic script.</p>
<!--break-->
<p>The culprit that generates the alert "Scanstyles does nothing in Webkit/Firefox" is a jQuery plugin that creates rounded corners on your site for browsers that do not support the relevant CSS3 features. The <a href="https://code.google.com/p/curvycorners/">curvycorners project</a> appears to be defunct with no changes since March 2011 and an "official web site" that has been taken over by something else. However, suppressing the error is trivial. Just delete or disable the unnecessary alert call shown on line 3 below (still visible in the <a href="https://code.google.com/p/curvycorners/source/browse/tags/2.1.x/beta/2.1/curvycorners.src.js">last source code release</a>).</p>
<pre class="brush:jscript">
      }
    }
    // DISABLE: else curvyCorners.alert('Scanstyles does nothing in Webkit/Firefox/Opera');
  };
</pre>
<p>Alternately, if you want to disable all curvycorner alerts without having to modify the script, you simply need to define "curvyCornersVerbose=0;" in the global context before including the script. That hides all output.</p>
<p>Obviously, there are better ways to get curvy corners now, especially if you do not need to support legacy browsers. However, this might at least help you with a stop-gap measure until you can test an alternate library on your site.</p>
</div></div></div>  </div>
</div>
