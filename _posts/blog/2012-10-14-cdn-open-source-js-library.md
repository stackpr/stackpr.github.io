---
title: CDN for Open Source JS Library
layout: post
category: blog
tech:
- JS
- CDN
- CloudFront
permalink: /blog/2012/10/14/cdn-open-source-js-library

---
{% include JB/setup %}
<div id="node-238" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I enjoy planning for success with web applications. Prepping scalability has the benefit of being objectively achievable, which is very nice when I'm just experimenting as a hobby. Even if the web application fails, at least it will be fast! I have some JavaScript code to make public, but making it available in an efficient method can be tricky.</p>
<!--break-->
<p>Once the library has become stable and established, there are available systems like the Google CDN, the Microsoft CDN, and <a href="http://cdnjs.com/">cdnjs.com</a> (sponsored by CloudFlare). Given that my JS code is relatively new, it seems premature to bother trying to get into one of those systems. Working directly with <a href="https://www.cloudflare.com/plans">CloudFlare</a> seemed appropriate, but the terms of service do not allow JS-only hosting -- it specifies that the site should be primarily for HTML documents.</p>
<p>I've started using Github for managing the code, and <a href="http://code.lancepollard.com/github-as-a-cdn/">some people treat Github as a CDN</a>. Using GoogleCode.com is pretty standard, and linking directly to raw.github.com is becoming more common. However, I wanted to provide an alternate CDN that I can have more control over. After moving past the options above, Amazon's CloudFront was the clear winner among remaining options, especially since I already rely on other Amazon Web Services.</p>
<h2>
	Key highlights in the setup</h2>
<ol><li>
		Use a new domain (or subdomain) for the CDN that does not have any cookies from the site (or other sources). That is an important aspect of the CNAME setup, which is the alternative to using the cloudfront domain subdomain.</li>
	<li>
		Use CloudFront behaviors to limit paths that are forwarded, to filter cookies, and to filter query strings.</li>
	<li>
		Use Apache to confirm that the static files exist before serving (and/or disable dynamic languages for the virtual host):<br /><div>
			RewriteCond %{REQUEST_FILENAME} !-f</div>
		<div>
			RewriteRule ^.*$ - [L]</div>
	</li>
	<li>
		<div>
			Force cache headers for all requests (removing other headers was a good tip too, although less important).<br />
			Header set Cache-Control "max-age=7200, must-revalidate"</div>
	</li>
	<li>
		Point the default CloudFront behavior point at an empty S3 bucket (minimize the impact of 404 errors).</li>
</ol></div></div></div>  </div>
</div>
