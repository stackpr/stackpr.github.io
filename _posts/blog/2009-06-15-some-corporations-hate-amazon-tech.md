---
title: Some corporations hate Amazon tech
layout: post
category: blog
tech:
- Amazon S3
- Amazon EC2
permalink: /blog/2009/06/15/some-corporations-hate-amazon-tech

---
{% include JB/setup %}
<div id="node-53" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Working with pharmacists, I have the opportunity to work with IT constraints put in place by zealous sysadmins at various large corporations, hospitals and governments. The craziest problems have popped up since I started using Amazon S3 to handle serving static files. I was going to use Cloudfront to get even more from the setup, and it was all working great at our office for about a day. Then the complaints started coming in.</p>
<p><strong>Personal Storage?</strong> Several offices reported a message indicating that S3 was classified as a personal storage service. The offices locked that down to either secure their own data or to prevent misuse of work hours. What I do know is that restricting calls to GET requests would have locked it down without crippling any site that leverages S3.</p>
<p><strong>Porn?</strong> Several offices for a government agency saw this error message (with some threatening language removed):<em> (Your request was denied because of its content categorization: Pornography.) </em>The service is so well-designed and well-priced that I am sure there is an element that uses it for inappropriate sites.</p>
<p>I find it disconcerting for such a robust service to have problems because of its versatility. If that is the trend in these corporate IT departments, then it will be difficult to ever advance too far without triggering a security lock-down.</p>
<h3>SOLUTION</h3>
<p>So far, there has been a solution. The site runs on EC2, and using Apache to proxy requests to S3 through EC2 has addressed all issues. This still manages most of the benefits: minimal load on web server, custom header management on S3, encoded interface file headers, offloading file storage to S3. Even with the proxy, the elimination of serving static files from elastic block storage dropped the hosting costs by 70%.</p></div></div></div>  </div>
</div>
