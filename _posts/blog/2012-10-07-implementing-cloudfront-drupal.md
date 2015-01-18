---
title: Implementing CloudFront on Drupal
layout: post
category: blog
tags:
- Drupal
- CloudFront
- CDN
- Amazon S3
- JS
permalink: /blog/2012/10/07/implementing-cloudfront-drupal

---
{% include JB/setup %}
<div id="node-232" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>We all know that a static site provides the optimal server-side performance (<a href="http://www.contenthere.net/2012/01/fun-with-static-publishing.html">others write about it too</a> and take some of the same steps). Performance and scalability are non-issues for static sites -- even the oldest hardware is sufficient. As the Internet grows in complexity, it also expands the tools available to strip away the complexity.</p>
<!--break-->
<h2>
	What Can Static Sites Do?</h2>
<p>There are many competing options, but here are a few examples of how various advanced dynamic features can be implemented without any server-side code at all:</p>
<ol><li>
		User Login: <a href="http://developers.facebook.com/docs/reference/javascript/">Facebook Connect via JavaScript SDK</a></li>
	<li>
		Comments: <a href="http://disqus.com">Disqus</a> - this site implements using the <a href="http://drupal.org/project/disqus">drupal module</a></li>
	<li>
		Search: <a href="http://www.google.com/cse/">Google Custom Search</a></li>
	<li>
		Contact Form: <a href="http://www.google.com/google-d-s/createforms.html">Google Docs Forms</a></li>
	<li>
		E-Commerce: <a href="https://checkout.google.com/seller/integrate.html">Google Checkout</a> or <a href="https://www.paypal.com/webapps/mpp/how-to-sell-online">Paypal</a></li>
</ol><h2>
	Implementing on Drupal for Witti</h2>
<p>The first step was to minimize the server-side logic. Although Disqus integrates with various social networks for user login, the vast majority of the site is effectively anonymous traffic that is consistent for all visitors. Once that was done, cookies were no longer relevant and caching could be very aggressive.</p>
<p>I minimized hits to my web server by restricting URLs to prefixes that I utilize. For example, hits to admin/* never make it to my web server. This adds security, but it also reduces the potential load. The extra details are very specific to this site, but I've detailed some considerations that differentiate solutions. Origin Push is the fastest and most scalable (due in part to the limited functionality), but Origin Pull CDN is a better balance for me. CloudFlare is very intriguing to me, but I had already started using CloudFront for another project that could not use CloudFlare due to the HTML-only note in their terms.</p>
<h2>
	Comparison of Solutions</h2>
<table border="1" cellpadding="1" cellspacing="0" style="width: 100%; "><thead><tr><th scope="col" style="width: 25%; ">
				Consideration</th>
			<th scope="col" style="width: 15%; ">
				Basic<br />
				(PHP Application)</th>
			<th scope="col" style="width: 15%; ">
				Reverse Proxy<br />
				(Varnish)</th>
			<th scope="col" style="width: 15%; ">
				Origin Pull CDN<br />
				(Amazon CloudFront)</th>
			<th scope="col" style="width: 15%; ">
				CDN with Firewall<br />
				(CloudFlare)</th>
			<th scope="col" style="width: 15%; ">
				Origin Push CDN<br />
				(Amazon Cloudfront + Amazon S3)</th>
		</tr></thead><tbody><tr><td>
				DOS Attack - 404 (non-legit requests)</td>
			<td>
				Vulnerable</td>
			<td>
				Vulnerable (Filters some malformed requests)</td>
			<td>
				Vulnerable (Filters some malformed requests)</td>
			<td>
				Moderately vulnerable (Provides a web application firewall)</td>
			<td>
				Safe</td>
		</tr><tr><td>
				Spike in real traffic<br />
				DOS Attack - 200 (legit requests)</td>
			<td>
				Vulnerable</td>
			<td>
				Negligible vulnerability as long as the cache is sufficiently large</td>
			<td>
				Safe</td>
			<td>
				Safe</td>
			<td>
				Safe</td>
		</tr><tr><td>
				Supports Per-User Customization</td>
			<td>
				Yes</td>
			<td>
				Yes</td>
			<td>
				Yes, with limitations</td>
			<td>
				Yes</td>
			<td>
				Limited to JS and third-party services</td>
		</tr><tr><td>
				Support for POST requests (best to enforce with <a href="http://httpd.apache.org/docs/2.2/mod/core.html#limitexcept">LimitExcept</a>)</td>
			<td>
				Yes</td>
			<td>
				Yes</td>
			<td>
				No</td>
			<td>
				Yes</td>
			<td>
				No</td>
		</tr><tr><td>
				Flush cache entries</td>
			<td>
				Yes or N/A</td>
			<td>
				Yes, purge all or by regex</td>
			<td>
				Yes, <a href="http://docs.amazonwebservices.com/AmazonCloudFront/latest/APIReference/CreateInvalidation.html">per-URL</a></td>
			<td>
				Yes, <a href="http://support.cloudflare.com/kb/what-do-the-various-cloudflare-settings-do/how-do-i-purge-my-cache">purge all</a></td>
			<td>
				Yes</td>
		</tr><tr><td>
				Complete automatic removal of old data</td>
			<td>
				Yes</td>
			<td>
				Yes, with cache timeout</td>
			<td>
				Yes, with cache timeout</td>
			<td>
				Yes, with cache timeout</td>
			<td>
				Yes, using object expiration</td>
		</tr><tr><td>
				Path controls</td>
			<td>
				Complete</td>
			<td>
				Complete (VCL generally uses regex before passing to PHP)</td>
			<td>
				<a href="http://s3.amazonaws.com/awsdocs/CF/latest/cf_dg.pdf">Wildcards limited to ? (1 char) and * (0+ chars)</a></td>
			<td>
				Unknown</td>
			<td>
				N/A - all paths must be compiled</td>
		</tr><tr><td>
				Clean pagination when content is added</td>
			<td>
				Yes</td>
			<td>
				No - pages cache at different times, which staggers when new items in a view appear</td>
			<td>
				No - pages cache at different times, which staggers when new items in a view appear</td>
			<td>
				No - pages cache at different times, which staggers when new items in a view appear</td>
			<td>
				Yes</td>
		</tr></tbody></table><p> </p>
</div></div></div>  </div>
</div>
