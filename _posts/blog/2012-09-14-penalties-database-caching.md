---
title: Penalties to Database Caching
layout: post
category: blog
tech:
- Drupal
- APC
- Amazon RDS
- MySQL
permalink: /blog/2012/09/14/penalties-database-caching

---
{% include JB/setup %}
<div id="node-226" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Drupal uses database caching by default. The disk access and other overhead is exacerbated when the database is run on a separate server since you introduce network/bandwidth issues. Long ago, I <a href="/portfolio/optimizing-lamp-stack-part-iii">optimized away the problem</a> for key low-churn, high-access cache tables to use APC's cache. However, I now discover that the content (CCK) module caches the content_type information in the same table as other content cache. While the other content cache would overwhelm the APC shared memory, the content_type info is extremely low-churn, while being accessed on nearly every request to the site.</p>
<!--break-->
<p>I updated _content_type_info() to use one of the APC-enabled cache tables rather than the content_cache_tablename() cache table. The end result is that only a very small portion of requests will now have to transfer the content_type_info from the database - it will already be in memory. We utilize a significant number of node types with a very large number of CCK fields, so the content_type_info constituted a non-trivial amount of data.</p>
<p>The end result? I estimate that it will eliminate over 3 gigs of network traffic daily, and it had an immediate and visible impact on page load time. Eliminating a few other Drupal queries appears to have eliminated another 3 gigs of daily network traffic (through hacking out core module queries that don't apply to our site, adding per-nid cached detection of whether an expensive query is worthwhile, and basic caching). I'll be monitoring the profiling module to identify any other unique cache requests that might be utilizing a non-optimized table.</p>
</div></div></div>  </div>
</div>
