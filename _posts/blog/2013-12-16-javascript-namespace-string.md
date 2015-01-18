---
title: JavaScript Namespace from String
layout: post
category: blog
tags:
- JS
permalink: /blog/2013/12/16/javascript-namespace-string

---
{% include JB/setup %}
<div id="node-305" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Namespacing JavaScript can be a relatively tedious endeavor. Since each level of the namespace is actual an object, the code has to establish an object at each level. Creating a new unnecessary module does not take much effort in a node context, but it does take unnecessary requests for client JavaScript. The objective is to create a simple and a (more difficult) short JavaScript snippet to create a namespace via object creation.</p>
<h2>
	The Problem</h2>
<p>There is an apparently simple way to create the namespace-simulating object:</p>
<pre class="brush:jscript">
var com = { example : { "a" : {} } };</pre>
<p>Unfortunately, if you create com.example.a and com.example.b, then the second declaration would override the first.</p>
<h2>
	The Reference Solution</h2>
<p>This is a verbose but complete JS solution to create the namespace object hierarchy.</p>
<pre class="brush:jscript">
if (typeof com == 'undefined') var com = {};
if (typeof com.example == 'undefined') com.example = {};
com.example.a = {};</pre>
<h2>
	A Nice External Solution</h2>
<p>An external module is nice, but it is debatable whether it is simple or short. Nevertheless, here is a good example for an external solution that simply requires a call to MyNS.CreateNamespace() from <a href="https://gist.github.com/JamesMGreene/3070677">https://gist.github.com/JamesMGreene/3070677</a>. That is a great example, but Array.prototype.reduce() is not available in IE until IE9.</p>
<h2>
	A Short Multi-Namespace Solution</h2>
<p>This concise solution creates multiple namespaces. This gets us IE5.5</p>
<pre class="brush:jscript">
(function(x){var n,p=window,s;while(x.length){s=x.shift().split('.');while(s.length){n=s.shift();p=(p[n]=p[n]||{})}}})([
  "com.example.a",
  "com.example.b"
]);</pre>
<p>The function above gets us IE5.5 (limited by <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/shift">shift</a>).</p>
<h2>
	A Short Single-Namespace Solution</h2>
<p>The same solution without the mult-namespace support would be:</p>
<pre class="brush:jscript">
(function(x){var n,p=window,s;s=x.split('.');while(s.length){n=s.shift();p=(p[n]=p[n]||{})}})("com.example.a");</pre>
<h2>
	One More Play on the Reference</h2>
<p>This retains both the high readability and high compatibility of some other solutions.</p>
<pre class="brush:jscript">
window.com=window.com||{};
window.com.example=window.com.example||{};
window.com.example.a = {};</pre>
</div></div></div>  </div>
</div>
