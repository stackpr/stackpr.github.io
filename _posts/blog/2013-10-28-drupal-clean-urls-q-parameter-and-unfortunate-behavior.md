---
title: Drupal clean URLs, the 'q' parameter, and an unfortunate behavior
layout: post
category: blog
tech:
- Apache
- Varnish
- Drupal
permalink: /blog/2013/10/28/drupal-clean-urls-q-parameter-and-unfortunate-behavior
images:
- url_clean_1.png

---
{% include JB/setup %}
<div id="node-291" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Drupal <a href="https://drupal.org/getting-started/clean-urls">clean URL</a> technique provides a simple method of making web addresses shorter and more user-friendly (and possibly more SEO-friendly). However, the default implementation using rewrite creates an interesting situation where malformed links can have unexpected consequences for what is displayed on your web site. At the moment, these appear to be simply unfortunate -- I have not brainstormed for ways that it could create a security vulnerability.</p>
<!--break-->
<p><strong>Consequence 1</strong>: You can generate a 404 error. A simple example would be to find a valid page and append "q=break-me" to the query string. For instance, <a href="https://drupal.org/?q=break-me">https://drupal.org/?q=break-me</a>. This is especially problematic if you work with a web service that automatically appends a 'q' variable, as some Adwords users describe <a href="https://drupal.org/node/1345004">here</a>.</p>
<p><strong>Consequence 2:</strong> You can see the wrong content on a page. This seems relatively benign other than it can be confusing for a novice editor to diagnose on the site. However, it is possible this to additionally break relative links, which can create an unprofessional appearance. For instance, see the screenshot of the webform project when it has the q pointing to the "getting started" page <a href="https://drupal.org/project/webform?q=start">https://drupal.org/project/webform?q=start</a>. The images are broken because their sources are relative to a different path.</p>
<p>The easiest solution would be to ban the use of the 'q' parameter entirely or even disable the use of query strings (e.g., when using CloudFront, another CDN, or any local reverse proxy). A couple examples are below.</p>
<h2>
	Varnish</h2>
<p>Change 'q' to 'alt'</p>
<pre class="brush:bash">
set req.url = regsuball(req.url, "(&amp;|\?)q=", "\1alt=");
</pre>
<h2>
	Apache mod_rewrite</h2>
<p>Change 'q' to 'alt' and redirect to it (301).</p>
<pre class="brush:bash">
RewriteCond %{QUERY_STRING} (^|^.*&amp;)q=(.*)$
RewriteRule ^(.*)$ /$1?%1alt=%2 [L,R=301]
</pre>
</div></div></div>  </div>
</div>
