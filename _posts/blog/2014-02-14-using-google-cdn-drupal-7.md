---
title: Using Google CDN with Drupal 7
layout: post
category: blog
tech:
- Drupal
- Drupal 7
- jQuery
permalink: /blog/2014/02/14/using-google-cdn-drupal-7

---
{% include JB/setup %}
<div id="node-314" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>According to <a href="http://royal.pingdom.com/2012/06/20/jquery-numbers/">Royal Pingdom</a>, approximately 54% of the top 10k sites use jQuery, and approximately 25% of sites that use jQuery rely on the Google CDN. Neither of those statistics are concrete metrics of the number of users with cached versions of jQuery as served by Google, but it is reasonable that a healthy number of active web users have a primed browser cache. Even if you were pessimistic and restricted your analysis to the top 100 web sites (25% use jQuery), the best information you have is that Google is still the most popular CDN. Of course, the analysis does not make that clear, but no alternatives are suggested. So how do you leverage this cache insight with your Drupal 7 web site?</p>
<!--break-->
<h2>
	The Solution</h2>
<p>For a zero-impact jQuery replacement, you should simply replace the misc/jquery.js with an external reference to the Google CDN. Fortunately, the hook_js_alter function gives you the ability to do just that. After you create your hook, make sure that you <em>Flush all caches</em>. Here is the hook you will need to add to a custom module:</p>
<pre class="brush:php">
function mymodule_js_alter(&amp;$js) {
  // Use Google CDN for jQuery.
  $js['misc/jquery.js'] = array(
    'group' =&gt; JS_LIBRARY,
    'weight' =&gt; -20,
    'version' =&gt; '1.4.4',
    'every_page' =&gt; true,
    'type' =&gt; 'external',
    'scope' =&gt; 'header',
    'cache' =&gt; false,
    'defer' =&gt; false,
    'preprocess' =&gt; false,
    'data' =&gt; '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js',
  );
}
</pre>
</div></div></div>  </div>
</div>
