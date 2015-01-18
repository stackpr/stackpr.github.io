---
title: Optimizing the LAMP Stack - Part III
layout: post
category: portfolio
tags:
- PHP
- Drupal
- MySQL
- APC
position:
- Developer
- End-to-end
permalink: /portfolio/optimizing-lamp-stack-part-iii

---
{% include JB/setup %}
<div id="node-122" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Another wave of performance-enhancing upgrades to the site and underlying technologies. Constant tuning seems to be the price we pay to use 150+ open source Drupal modules. Here is a combination of changes that make a big improvement:</p>
<!--break-->
<ol>
    <li>Added support for a slave database that automatically launches and terminates on weekdays during business hours. After some initial adjustments, this database took over about 50% of the database workload without experiencing any async-related errors.</li>
    <li>Implement APC cache for several key cache tables. Previous experience and research with memcached suggested that it would not provide the stability required. On EC2, it seems that memcached requires multiple instances to achieve production-grade reliability, and we do not currently run enough instances to make that work. Additionally, although it is less scalable volume-wise, APC is a faster local cache that does not require making the socket connection. The APC cache is also more aggressive than the traditional Drupal cache. The traditional Drupal cache clears itself for all sorts of reasons (that are often triggered by our cron jobs), and it never caches the &quot;no entry in cache&quot; result. By improving use-case-specific logic for clearing individual cache entries, and by maximizing the cache speed via APC, we saw a good boost in performance and drop in hits to the database.</li>
    <li>Implement APC cache for path calculations. Watch the database to see how many path-related queries are run on each request, especially if you are running global redirect.</li>
    <li>Reduce database queries through optimization of authorization functions. The organic groups access function is not really optimized. For instance, it triggers a user_load() to get a list of groups rather than just loading the groups. Depending on how many other modules hook into user_load, that can introduce significant additional queries. This change had a massive impact on speed, even for small single-node pages.</li>
    <li>Create a teaser cache table for use in views. Many of our views simply filter nodes and display the teasers. By caching the teasers across views, we dramatically improve the speed of those interfaces.</li>
</ol>
<p>These changes yielded significant performance boosts. After all the changes were completed, the total database CPU usage was down 66%, which means the system was working about 1/3 as hard. Additionally, the slave's usage ratio increased such that it now takes more of the load than the master, which bodes well for scale-out during the peak spring months. Total site performance through these changes improved by at least 33%. While that does not match the CPU drop, it was still a great step forward.</p>
<p>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /></p>
<div class="clear-block" style="display: block; ">
<div class="meta">&nbsp;</div>
</div>
<p>&nbsp;</p></div></div></div>  </div>
</div>
