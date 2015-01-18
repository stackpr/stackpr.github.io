---
title: Firefox 20.0.1 breaks "for each()" JavaScript loop
layout: post
category: blog
tags:
- JS
- Firefox
permalink: /blog/2013/04/15/firefox-2001-breaks-each-javascript-loop

---
{% include JB/setup %}
<div id="node-271" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I manage a web application built for Firefox. By restricting users to Firefox, I am able to use some JavaScript features that might not be available in other browsers. However, Firefox pulled the rug out from under me this morning by reversing its published statement that "for each...in will not be disabled and removed because of backward compatibility considerations" (<a href="https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Statements/for_each...in">for each...in - JavaScript | MDN</a>, accessed 4/15/13). The <em>for each</em> syntax is a very simple method to iterate over the values in an array or a hash (object).</p>
<p>Unfortunately, even if they restore the feature, I still needed to remove reliance on <em>for each</em> quickly for the interim and to avoid the stress of having the potential re-elimination of the functionality again in the future. The fastest solution was to switch to another method that also has limited cross-browser support -- Array.forEach. Fortunately, since that is an object-oriented approach, unsupported browsers can be patched with JS to work just fine. For an example patch, see <a href="https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array/forEach">Array.forEach - JavaScript | MDN</a>.</p>
<p>The before and after samples below both work with either ordered arrays (["Value 1", "Value 2"]) or hashes (as in the examples). The use case is that you really don't care about the keys and that you really don't want your code to be affected if an unexpected key schema is used. In that situation, it provides the additional benefit of avoiding an unnecessary variable to store the key/index and the extra line to get the value.</p>
<h2>
	Alternative with broader support</h2>
<pre class="brush:jscript">
var items = { "A" : "Value 1", "B" : "Value 2" };
var item = null;
for (var i in items) {
  item = items[i];
  console.log(item);
}</pre>
<h2>
	Before the update</h2>
<pre class="brush:jscript">
var items = { "A" : "Value 1", "B" : "Value 2" };
for each (var item in items) {
  console.log(item);
}</pre>
<h2>
	After the update</h2>
<pre class="brush:jscript">
var items = { "A" : "Value 1", "B" : "Value 2" };
items.forEach(function(item) {
  console.log(item);
});</pre>
</div></div></div>  </div>
</div>
