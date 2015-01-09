---
title: "Rename S3 Bucket"
layout: "post"
category: "blog"
tags: ["Amazon S3"]
---
{% include JB/setup %}
<div id="node-339" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>You cannot rename an S3 bucket directly, but there are various reasons that you might desperately need to make such a change. For instance, if you created bucket "bucket.example.com" years ago with dots, you might need to rename it to "bucket-example-com" to eliminate the dots so that the SSL validates appropriately when accessed as a subdomain of s3.amazonaws.com. Such access methods do not appear to be necessary versus referencing the bucket as the path prefix, but it has been standardized in some software like ec2-upload-bundle.</p>
<!--break-->
<h2>
	The Solution</h2>
<ol><li>
		Create the new bucket "new-bucket" (can be done online)</li>
	<li>
		Copy all objects from "old.bucket" to "new-bucket" from the command-line (ideally from EC2):<br />
		aws s3 sync s3://old.bucket s3://new-bucket</li>
	<li>
		Update your system to point at new-bucket</li>
	<li>
		Empty the old bucket using an appropriate strategy:
		<ol><li>
				If you your objects are in folders, you can empty the bucket by deleting the root objects and folders through the online management console.</li>
			<li>
				If you have significant amounts of content in the bucket, you can set a lifecycle rule to delete content after 0 days. It may take a day for the bucket to get emptied, but it is easy if you are patient. (<a href="http://docs.aws.amazon.com/AmazonS3/latest/dev/manage-lifecycle-using-console.html">can be done online</a>)</li>
			<li>
				If you're in a hurry and did not use folders for easy manual deletion, you can use a quick script like:<br />
				aws s3 ls s3://old.bucket | sed 's/.* //' | while read f; do aws s3 rm "s3://old.bucket/$f"; done</li>
		</ol></li>
	<li>
		Delete the old bucket (<a href="http://docs.aws.amazon.com/AmazonS3/latest/UG/DeletingaBucket.html">can be done online</a>)</li>
</ol></div></div></div>  </div>
</div>
