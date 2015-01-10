---
title: Transitioning from s3sync to AWS CLI
layout: post
category: blog
tech:
- Amazon S3
- s3sync
- AWS CLI
permalink: /blog/2013/12/03/transitioning-s3sync-aws-cli

---
{% include JB/setup %}
<div id="node-298" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The ruby <a href="http://s3sync.net/wiki">s3sync</a> tool (not the similar <a href="http://s3tools.org/">python option</a>) has proven extremely valuable over the years. However, the emergence of an official <a href="http://aws.amazon.com/cli/">AWS CLI</a> and web-based manager, a couple minor glitches with our installed version of s3sync, and the temporary halt of development when the original developer stopped work all led to the decision to make a change. However, the AWS CLI had problems downloading files that were uploaded by s3sync because of how directories were created.</p>
<!--break-->
<p>Version note: I currently have <strong>s3sync 1.2.5</strong> installed.</p>
<div>
	The challenge of directories on S3 is well-documented. In fact, the s3sync <a href="https://github.com/ms4720/s3sync">documentation</a> even acknowledges, "In S3 there's no actual concept of folders, just keys and nodes. So, every tool uses its own proprietary way of storing dir info (my scheme being the best naturally) and in general the methods are not compatible". As the <a href="https://code.google.com/p/s3fs/issues/detail?id=27#c24">s3fs community discusses</a>, Amazon has effectively created a spec by implementation at this point. Unfortunately, the spec is different than what s3sync uses.</div>
<p>Essentially, each S3 folder should have its meta data stored in a file named "dirname_$folder$". This is a zero-byte file that simply provides a place for any meta data to be stored. If no such file is created, then there is effectively no meta data being stored for that directory, which should still be acceptable.</p>
<p>On the other hand, s3sync uses a file named "dirname" that contains a UUID. The data is still stored as meta data, from what I can tell, but the naming convention has the unfortunate side-effect of making downloading using a different program (like the AWS CLI) difficult because there is now a <em>file</em> that has the exact same path as a <em>directory</em>. We know that the file and directory cannot both exist on your filesystem. The result (at least using the AWS CLI) is that the metadata file is downloaded, and further downloads fail because the directory was not and cannot be created.</p>
<p>The key note is that the metadata items are effectively option under both schemas. Unless you have a very specific use case in mind, simply deleting the metadata items from S3 is sufficient to allow the AWS CLI sync to work correctly from your bucket.</p>
<h2>
	The Solution: A Dirty BASH Script</h2>
<h3>
	Assumptions</h3>
<ol><li>
		You have already installed the AWS CLI and run `aws configure`.</li>
	<li>
		You know your bucket name and have appropriate access credentials.</li>
	<li>
		You do not use periods in your directory names. If you do, you will need to modify the script or manually handle those cases.</li>
	<li>
		You do not store files without file extensions. If you do, you have reason to believe that they files never be exactly 38 bytes.</li>
	<li>
		You are proficient enough in BASH to understand what the script is doing and modify it accordingly. Minimally, you will need to change it to work with your bucket name. If you are proficient, you will likely note inefficiencies -- it really is a quick script.</li>
	<li>
		You understand that this script (without modifications) is written to automatically delete items from S3, which cannot be undone.</li>
	<li>
		<strong>USE AT YOUR OWN RISK! THIS AUTOMATICALLY DELETES FILES FROM S3!!!</strong></li>
</ol><h3>
	The Script</h3>
<ol><li>
		Line 1: List all objects in a bucket.</li>
	<li>
		Line 2: Filter rows to only show rows with item keys that have a file size of 38 bytes.</li>
	<li>
		Line 3: Extract the item key and ignore any keys that have a dot after the last slash (e.g., ignore likely files).</li>
	<li>
		Line 4: Remove each of the remaining items from S3.</li>
</ol><pre class="brush:bash">
aws s3api list-objects --bucket=BUCKETNAME --max-items=100000000 --output=text | \
  egrep "CONTENTS" | sed 's/\t/~/g' | egrep "Z~38~" | \
  cut --delimiter=~ --fields=3 | egrep -v '\.[^/]*$' | \
  while read obj; do echo "$obj"; aws s3 rm "s3://BUCKETNAME /$obj"; done</pre>
</div></div></div>  </div>
</div>
