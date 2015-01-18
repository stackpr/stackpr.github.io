---
title: jQuery 1.5 json parse error
layout: post
category: blog
tags:
- PHP
- Drupal
- jQuery
permalink: /blog/2011/03/14/jquery-15-json-parse-error

---
{% include JB/setup %}
<div id="node-108" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Quite a few people have noticed a parse error with json in the new jQuery 1.5 -- just check out <a href="http://www.google.com/search?q=jquery+1.5+parseerror+with+drupal">google</a>. Most of the responses suggest that it is due to a conflict with jQuery Validate. However, I think that something changed in the JSON parser.</p>
<p>I fixed the problem on my site by adjusting the drupal_json method to encode strings differently. The old encoding method worked fine with jquery 1.3, but it broke with jquery 1.5.</p>
<p>The relevant code that does not work with jquery 1.5 (see "drupal_to_js()"):</p>
<pre class="brush:php">
return '"'. str_replace(array("\r", "\n", "&lt;", "&gt;", "&amp;"),
                        array('\r', '\n', '\x3c', '\x3e', '\x26'),
                        addslashes($var)) .'"';</pre>
<p>The revised code that does work with jquery 1.5:</p>
<pre class="brush:php">
return json_encode($var);</pre>
<p>This simply pushes the encoding logic down a level to a built-in PHP function, which is well-tested by a broader audience. However, I have not tested enough to confirm whether it has made a material change in meaning. Regardless, it leads me to a conclusion that either Drupal was okay and the new JSON parser is broken, or that Drupal was broken and the old JSON parser was simply more forgiving.</p>
<p><strong>In Drupal 7, they also use json_encode() rather than the addslashes() function. See the updated equivalent to <a href="http://api.drupal.org/api/drupal/includes--common.inc/function/drupal_json_encode/7">drupal_to_js()</a>.</strong></p>
<h2>
	A follow-up issue with JSON - Content-Type header problems</h2>
<p>Quite a few people have run into an <a href="http://www.google.com/search?q=an+http+error+0+occurred.+filefield+ahah">HTTP status code zero issue</a> with filefield. It turns out that the older version of jQuery and jQuery Forms did not like having the text/javascript header set on the response. However, the newer version appears to require it (otherwise you get status 0). The fix was to replace <code>print drupal_to_js()</code>with <code>drupal_json()</code>in several places, including filefield and CCK. While this does not seem like a bug, it is another instance where the updated version is less forgiving.</p>
<h2>
	Even more Content-Type header problems</h2>
<p>While drupal_json() worked well for most AJAX requests, IE did not like that as a header when the AJAX used the POST method. Thus, I now use the following drupal_json() and drupal_to_js() functions from common.inc with jQuery 1.5:</p>
<pre class="brush:php">
/**
 * Converts a PHP variable into its Javascript equivalent.
 *
 * We use HTML-safe strings, i.e. with &lt;, &gt; and &amp; escaped.
 */
function drupal_to_js($var) {
  switch (gettype($var)) {
    case 'boolean':
      return $var ? 'true' : 'false'; // Lowercase necessary!
    case 'integer':
    case 'double':
      return $var;
    case 'resource':
    case 'string':
      return json_encode($var);
      return '"'. str_replace(array("\r", "\n", "&lt;", "&gt;", "&amp;"),
                              array('\r', '\n', '\x3c', '\x3e', '\x26'),
                              addslashes($var)) .'"';
    case 'array':
      // Arrays in JSON can't be associative. If the array is empty or if it
      // has sequential whole number keys starting with 0, it's not associative
      // so we can go ahead and convert it as an array.
      if (empty ($var) || array_keys($var) === range(0, sizeof($var) - 1)) {
        $output = array();
        foreach ($var as $v) {
          $output[] = drupal_to_js($v);
        }
        return '[ '. implode(', ', $output) .' ]';
      }
      // Otherwise, fall through to convert the array as an object.
    case 'object':
      $output = array();
      foreach ($var as $k =&gt; $v) {
        $output[] = drupal_to_js(strval($k)) .': '. drupal_to_js($v);
      }
      return '{ '. implode(', ', $output) .' }';
    default:
      return 'null';
  }
}
/**
 * Return data in JSON format.
 *
 * This function should be used for JavaScript callback functions returning
 * data in JSON format. It sets the header for JavaScript output.
 *
 * @param $var
 *   (optional) If set, the variable will be converted to JSON and output.
 */
function drupal_json($var = NULL) {
  // We are returning JavaScript, so tell the browser.
  $type = 'text/javascript; charset=utf-8';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // This seems to be necessary in IE9, and it does not impact FF.
    $type = 'text/plain; charset=utf-8';
  }
  drupal_set_header('Content-Type', $type);
  if (isset($var)) {
    echo drupal_to_js($var);
  }
}</pre>
</div></div></div>  </div>
</div>
