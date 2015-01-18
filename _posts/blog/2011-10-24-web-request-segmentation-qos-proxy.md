---
title: Web Request Segmentation (QoS by Proxy)
layout: post
category: blog
tags:
- Linux
- Amazon EC2
- Apache
permalink: /blog/2011/10/24/web-request-segmentation-qos-proxy

---
{% include JB/setup %}
<div id="node-124" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>We occasionally see major spikes in traffic due to robots and spiders on the site. While the traffic is a good thing, it is lower priority. Unfortunately, there is no way to tell apache to work slower on some requests. If we were a smaller site, our Varnish configuration would be sufficient since all of the pages could be cached for anonymous access. Unfortunately, we have a database of 20,000+ nodes that are publicly accessible, and spiders want to see all of them. When the wrong factors line up, it equates to a minor DOS attack.</p>
<p>Here are some of our rejected options:</p>
<ol><li>
		There is a <a href="http://opensource.adnovum.ch/mod_qos/">mod_qos</a> that would allow us to simply drop the traffic, but that is not what we want to happen.</li>
	<li>
		We can stick with the basic install and current resource, but that means all traffic slows way down during a DOS.</li>
	<li>
		We can scale the site as a whole. Unfortunately, some spiders will eat whatever we feed them such that we add cost without really solving the problem.</li>
</ol><p>Our end solution is to segment this traffic into a separate EC2 instance. Using some basic VCL, we direct all anonymous traffic to a particular node type (i.e., URL prefix) to a specific Apache instance. Voila! As that low priority traffic spikes, it only affects other low-priority hits to the site. Since human visitors are likely to consistently hit a smaller subset of those pages, they will still benefit from the Varnish caching on the front-end such that they will not experience the full slow-down that can happen on the first hit to each page that spiders experience.</p>
</div></div></div>  </div>
</div>
