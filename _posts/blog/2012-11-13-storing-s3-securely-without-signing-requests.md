---
title: Storing on S3 securely without signing requests
layout: post
category: blog
tech:
- Amazon S3
permalink: /blog/2012/11/13/storing-s3-securely-without-signing-requests

---
{% include JB/setup %}
<div id="node-244" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>This ACL is a proof of concept for implementing bucket security that would avoid the complexity of signing the requests when it is inconvenient (e.g., BASH or other lightweight toolkit). The bucket permissions simply restrict using User-Agent to speed up access.</p>
<!--break-->
<pre class="brush:jscript">
{
	"Version": "2008-10-17",
	"Id": "Policy1346872753787",
	"Statement": [
		{
			"Sid": "Stmt1346872639315",
			"Effect": "Allow",
			"Principal": {
				"AWS": "*"
			},
			"Action": "s3:GetObject",
			"Resource": "arn:aws:s3:::bucketname.example.com/*",
			"Condition": {
				"StringEquals": {
					"aws:UserAgent": "long-random-string-for-authentication"
				}
			}
		}
	]
}
</pre>
<p>For example, this allows a shell script to access this using a very simple cURL command:</p>
<pre class="brush:bash">
curl -A long-random-string-for-authentication http://bucketname.example.com/object-key</pre>
<p>This method has an element of security-by-obscurity such that it is important to protect each request. Thus, accessing S3 over HTTPS would be important, as would periodically rotating the random strings.</p>
<h2>
	Addendum: Benchmarking</h2>
<p>Apache benchmark (ab2) supports the user agent via the -H flag:</p>
<pre class="brush:bash">
ab -k -c 10 -n 200 -e ab_$i.csv <strong>-H 'User-Agent: quicktest'</strong> '$url'
</pre>
<p>The above command was run for a basic benchmark of this method. Although results would likely vary significantly based on file size and other factors, there was very little evidence of a performance difference between this method and signing your requests.</p>
</div></div></div>  </div>
</div>
