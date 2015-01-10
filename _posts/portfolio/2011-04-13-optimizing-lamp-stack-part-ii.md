---
title: Optimizing the LAMP Stack - Part II
layout: post
category: portfolio
tech:
- PHP
- Linux
- Drupal
- MySQL
position:
- End-to-end
permalink: /portfolio/optimizing-lamp-stack-part-ii

---
{% include JB/setup %}
<div id="node-111" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Another wave of performance-enhancing upgrades to the site and underlying technologies. Constant tuning seems to be the price we pay to use 150+ open source Drupal modules. I will try to document some of the specific steps later, but here is a combination of changes that make a big improvement:</p>
<ol><li>
		Consolidate user agent names for a higher varnish cache hit rate. I hope to release a draft of the mobile_varnish module this summer.</li>
	<li>
		Increase the varnish cache size to 4G. At some point, the cache size becomes too large, but the same documents are cached hundreds of times. In just a month, we have registered over 4,000 different user agents, and they were all cached separately (before consolidation). So your 10K image might take 40+M in the cache. Note: I actually remove the user agent from the hash for images so that only one version is stored in the cache, but such simplification does not happen for dynamic markup.</li>
	<li>
		Turn off access time with the noatime attribute on all mounts. This dramatically reduces the amount written to disk, which frees them up for faster reads.</li>
	<li>
		Use the supercron module. I had to patch a few small things because the module does not appear to be in active development. However, it allowed me to spread out the cron jobs and reduce the frequency of the intensive tasks like search index updates.</li>
	<li>
		Fix the variable caching. I will release the patch I wrote, but there are a few different techniques out there. Basically, every time variable_set() was called, it triggered a cache update and a related flood. Every cron run sets at least 2 variables, which means that the cache was being rebuilt twice as often as your cron was run. If you look at the size of your variable cache, you will see that it is a large query, which wastes write resources in MySQL. My solution involves an extra SELECT query on every request but a cache query only via cron to minimize the impact for the end user.</li>
</ol><p>I turned several of these on within about an hour, so it is hard to tell exactly which items resulted in the massive speed boosts, but the performance improvement definitely happened.</p>
</div></div></div>  </div>
</div>
