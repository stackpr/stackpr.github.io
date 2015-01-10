---
title: S3 Object Expiration for Web Service Integrations
layout: post
category: blog
tech:
- Crocodoc
- Amazon S3
permalink: /blog/2012/07/13/s3-object-expiration-web-service-integrations

---
{% include JB/setup %}
<div id="node-160" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Amazon S3's <a href="http://docs.amazonwebservices.com/AmazonS3/latest/dev/ObjectExpiration.html">Object Expiration</a> came in handy today while integrating with Crocodoc. Crocodoc's <a href="https://crocodoc.com/docs/api/#doc-upload">upload api</a> allows for either POSTing a file or sending a link to a file for downloading. Well, posting files is more error-prone and memory-intensive than a simple GET request, and adding a new authentication approach to protect files from non-Crocodoc access seemed equally unnecessary.</p>
<p>The solution was to use the stable and well-tested S3 streaming upload class to post the file to a secure location in a temporary bucket. Using a private ACL and a signed URL (with a short timeout) for passing to the web service, the file has a healthy level of security. Then, configure the bucket for an appropriate lifecycle. For use with a web service integration, the lifecycle could be set at as little as 1 day. WIth the Object Expiration set, Amazon now takes care of both the special authentication and cleaning up the temporary files later.</p>
</div></div></div>  </div>
</div>
