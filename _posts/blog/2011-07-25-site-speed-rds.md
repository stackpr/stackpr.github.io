---
title: Site speed with RDS
layout: post
category: blog
tags:
- Amazon RDS
permalink: /blog/2011/07/25/site-speed-rds

---
{% include JB/setup %}
<div id="node-114" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The site took an initial hit when moving to RDS due to the introduction of network latency. However, it has facilitated several improvements that would not have been possible prior to the change. Here are some RDS-related notes:</p>
<ol><li><a href="https://dyutiman.wordpress.com/2010/08/30/slow-query-in-amazon-rds/">How to purge the slow_log once you have it properly configured.</a></li>
    <li>A read-only replica for a 5-10GB database takes about 25 minutes to create.</li>
    <li>The first step of replica launching is to take a database snapshot of the master. The master's status will not be "available" during that time, although you can safely continue to use it.</li>
    <li>There is overhead associated with replicating data, and that overhead will be reflected somewhat in the instance stats.</li>
    <li>A read-only replica for a 5-10GB database takes about 5 minutes to delete.</li>
    <li>As always, Cloudwatch is your friend. Use it to make sure that your database traffic is being redistributed in a reasonable manner.</li>
</ol><p>In my case, I simply had to focus on individual optimizations until I finally located the key PHP function that was generating unnecessary database hits. Through some intense optimizations (mainly minimizing data load, caching per-request data, and reordering the conditionals), the function was dramatically improved. Once that bottleneck was removed, database CPU utilization dropped about 40% immediately. However, it took all of the other work to isolate the problem, and now we have a system that can scale effortlessly into multiple read-only databases. It was a long journey to a very good place.</p></div></div></div>  </div>
</div>
