---
title: AB (Apache Benchmark) Testing Drupal Behind Varnish
layout: post
category: blog
tech:
- Linux
- Apache
permalink: /blog/2012/05/08/ab-apache-benchmark-testing-drupal-behind-varnish

---
{% include JB/setup %}
<div id="node-173" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The standard Drupal stack has a reverse proxy server in front of the web server, and then Drupal also has a page cache. To test optimizations, however, you need to bypass both so that Drupal processes the full request.</p>
<p>At least for my infrastructure, one way to bypass all of the caching is to test POST requests. This biases the benchmark slightly due to the extra data being transmitted, but that can obviously be minimized. Since I want to run the same benchmark over time, I simplified it to a file named "run.sh":</p>
<pre>
#/bin/sh
ab -n 20 -c 5 -p run.sh http://example.com/</pre>
<p>The benchmark script posts itself using "-p run.sh" to the web address being tested. While a secondary smaller file could work, this keeps the test simple and self-contained. The other parameters (-n and -c) are just what I happened to use for testing.</p>
</div></div></div>  </div>
</div>
