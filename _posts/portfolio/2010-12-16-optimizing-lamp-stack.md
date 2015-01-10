---
title: Optimizing the LAMP Stack
layout: post
category: portfolio
tech:
- Linux
- Drupal
- Apache
- Varnish
position:
- System Administrator
permalink: /portfolio/optimizing-lamp-stack

---
{% include JB/setup %}
<div id="node-97" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>When setting up a new Drupal system from scratch, there are a number of excellent optimized options. <strong>Project Mercury</strong> has consolidated some of the recommended techniques into nice documentation and even an AMI for quick rollout on EC2. Unfortunately, I am working on a long-established and highly customized system. I started with an older stable kernel that has been benchmarked at several percent faster than the latest kernels, which further complicates the issue by binding me to older repositories. So let the adventure begin...</p>
<!--break-->
<p><strong>Memcached (Faster Cache Access):</strong> I installed and disabled this. It accelerated the site quite well, but it had a failure rate of up to 1% (e.g., it would miss the connection and throw an error). I believe this was an incompatibility with EC2 small instances that have explicit performance restrictions, so I may revisit it soon since we have upgraded to a larger instance.</p>
<p><strong>Varnish (Reverse Caching Proxy):</strong> We have an abnormally high rate of logged-in visitors, but we still have a 14% (1 in 7) hit rate against the cache. Reducing web site load by 14% and improving the experience for new visitors is definitely worthwhile. The installation process was quite complex:</p>
<ol><li>
		Upgraded Drupal to use lazy sessions. We have a customized/optimized core, so the default patch was only successful about half of the time. The gorad filesystem replace script allowed me to automatically patch about 80% of the other session cases, which left 104 instances that had to be manually reviewed and fixed.<br /><code>/go/bin/gorad-replace.php -p '/\$_SESSION\[([^\]]*?)\]\s*=\s*([^=][^;]+);/s' "drupal_set_session(\1, \2);"
egrep -rn '\$_SESSION.*=' . | egrep -v 'svn|\.patch'
</code></li>
	<li>
		Manually compiled PCRE. The yum-supported version for our kernel was out of date.</li>
	<li>
		Manually compiled Varnish. The yum-supported version was a full 1.5 releases out of date such that none of the documentation was very helpful.</li>
	<li>
		Modified Apache configuration so that the extra proxy layer was compatible.</li>
</ol><p><strong>Cloudfront (CDN):</strong> This was easy to implement since the UI compiler publishes to S3. Unfortunately, a few members work at institutions that blacklisted S3 and Cloudfront IP addresses. Thus, we have had to disable it. Given how slow those institutions are to change, we will have to explore other CDNs or continue without them.</p>
<p><strong>mod_deflate (Faster Downloads):</strong> By gzipping the various resources, we saw about a 50% decline in downloads for an empty cache on the home page. This was an easy apache configuration that had not been done due to the added processing power. However, with the upgraded instance, the reduced load via caching, and the fact that Varnish can cache the compressed versions, it made sense for us.</p>
<p>Overall, this is a major step forward in terms of performance. The best part is that only the lazy sessions actually impact the PHP code. Otherwise, these are just automated optimizing layers that sit in front of Drupal to make it faster.</p>
</div></div></div>  </div>
</div>
