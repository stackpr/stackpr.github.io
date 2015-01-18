---
title: Supporting extremely large file uploads with PHP
layout: post
category: blog
tags:
- Amazon IAM
- Amazon S3
- Plupload
permalink: /blog/2014/03/31/supporting-extremely-large-file-uploads-php

---
{% include JB/setup %}
<div id="node-331" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Any time you think about "unlimited," you likely think about the cloud, and that is about the only way to do this. With PHP, any standard file upload must remain under the <a href="http://www.php.net/manual/en/ini.core.php#ini.post-max-size">post_max_size</a> and the <a href="http://www.php.net/manual/en/ini.core.php#ini.upload-max-filesize">upload_max_filesize</a>. There are client-side solutions that can chunk a file to make it uploadable without increasing your limits, but even those require you to pay close attention to your disk space and to your temp directory space. Chunking the upload and storing the chunks on cloud-backed storage can address most concerns. However, the combination of Amazon S3, Amazon IAM and <a href="http://www.plupload.com/">Plupload</a> provide a compelling stack that allows for unlimited uploads to a secure cloud-based storage provider without any impact on your web server. Below are some of the keys steps that facilitate leveraging these exciting technologies.</p>
<!--break-->
<h2>
	Overview</h2>
<ol><li>
		Setup
		<ol><li>
				Create new bucket that auto-expires all uploaded content after a period of time (30 minutes - 30 days).</li>
			<li>
				Create IAM credentials that can only upload to that newly-created bucket.</li>
			<li>
				Create a script to sign requests to upload to the bucket. This example uses AJAX since pre-authorizing an upload from the page leads to a stale data problem (e.g., the authorization times out) if they just leave the page open.</li>
			<li>
				Create a script to move an uploaded file to its final location after validation is performed.</li>
		</ol></li>
	<li>
		Example User Workflow for Upload
		<ol><li>
				Visit upload page.</li>
			<li>
				Select file(s) using Plupload.</li>
			<li>
				JavaScript: Before starting an upload, request the authorization from your server.</li>
			<li>
				JavaScript: Upload using Plupload.</li>
			<li>
				User sees: progress bar (optional)</li>
			<li>
				JavaScript: Notify server that the upload is complete and perform any action. Alternately, the upload id can be embedded in the POST data for a broader form, and the server will take the submission of that form as notification that the upload can be processed.</li>
			<li>
				Notify the user that the upload is complete.</li>
		</ol></li>
	<li>
		From the Server Perspective
		<ol><li>
				Server provides the upload form.</li>
			<li>
				Server authorizes the upload.</li>
			<li>
				Server is notified that the upload is complete.</li>
		</ol></li>
</ol><h2>
	How is this different?</h2>
<p>This is different in almost every way from a standard file upload. It is more flexible, but it takes more setup time. One of the biggest differences is the handling of the file upload itself. If you notify the server as part of a POST form, then you are replacing the $_FILES variable with the object key where the file is stored on S3. Assuming your site is hosted on EC2 or has excellent bandwidth to download quickly from S3, you should be able to download extremely large files from S3 without ever seeing a spike in your memory usage and without wasting any disk space on partial uploads.</p>
<h2>
	Piece 1: Configuring the Amazon Web Services</h2>
<p>Many of these tips are derived from <a href="https://github.com/moxiecode/plupload/wiki/Upload-to-Amazon-S3">this page</a>. It includes a link to an official upload example, and it is extremely helpful. This page notes some additional steps like IAM setup and on-demand signatures to address some lingering concerns.</p>
<ol><li>
		Do NOT use any dots in your bucket name. Use hyphens for namespacing. <a href="http://docs.aws.amazon.com/AmazonS3/latest/dev/BucketRestrictions.html">See an explanation.</a></li>
	<li>
		In bucket properties, expand Lifecycle and add a rule with these settings:
		<ol><li>
				Enabled: Yes</li>
			<li>
				Name: Remove by Default (you can rename)</li>
			<li>
				Apply to Entire Bucket: No</li>
			<li>
				Prefix: upload</li>
			<li>
				Time Period Format: Days from the creation date</li>
			<li>
				[Click + Expiration]</li>
			<li>
				Expiration (Delete Objects): 1 days from object's creation date</li>
		</ol></li>
	<li>
		In bucket properties, expand Permissions and Add CORS Configuration (see Piece 2).</li>
	<li>
		Upload crossdomain.xml (Piece 3) and clientaccesspolicy.xml (Piece 4) to the bucket.</li>
	<li>
		Go to IAM and create a new user (name "plupload" or "user-upload" or similar). Make sure that you store the credentials.</li>
	<li>
		On the IAM user's Permissions tab, click "Attach User Policy". Choose "Custom Policy" and then use the policy provided in Piece 5.</li>
</ol><h2>
	Piece 2: CORS Configuration</h2>
<p>The following generic configuration should work, although you can definitely lock it down more.</p>
<pre class="brush:xml">
&lt;CORSConfiguration&gt;
    &lt;CORSRule&gt;
        &lt;AllowedOrigin&gt;*&lt;/AllowedOrigin&gt;
        &lt;AllowedHeader&gt;*&lt;/AllowedHeader&gt;
        &lt;AllowedMethod&gt;GET&lt;/AllowedMethod&gt;
        &lt;AllowedMethod&gt;POST&lt;/AllowedMethod&gt;
        &lt;MaxAgeSeconds&gt;3000&lt;/MaxAgeSeconds&gt;
    &lt;/CORSRule&gt;
<span style="font-size: 12px;">&lt;/CORSConfiguration&gt;</span></pre>
<h2>
	Piece 3: crossdomain.xml</h2>
<p>Adjust this for your domain name and upload it to the root of the S3 bucket.</p>
<pre class="brush:xml">
&lt;cross-domain-policy&gt;
&lt;allow-access-from domain="*.example.com" secure="false"/&gt;
&lt;allow-access-from domain="example.com" secure="false"/&gt;
&lt;/cross-domain-policy&gt;</pre>
<h2>
	Piece 4: clientaccesspolicy.xml</h2>
<p>Upload this to the root of the S3 bucket.</p>
<pre class="brush:xml">
&lt;?xml version="1.0" encoding="utf-8" ?&gt;
&lt;access-policy&gt;
  &lt;cross-domain-access&gt;
    &lt;policy&gt;
      &lt;allow-from http-request-headers="*"&gt;
        &lt;domain uri="*"/&gt;
      &lt;/allow-from&gt;
      &lt;grant-to&gt;
        &lt;resource path="/" include-subpaths="true"/&gt;
      &lt;/grant-to&gt;
    &lt;/policy&gt;
  &lt;/cross-domain-access&gt;
&lt;/access-policy&gt;</pre>
<h2>
	Piece 5: IAM Policy</h2>
<p>Replace the bucket name below and then attach it to the IAM user.</p>
<pre class="brush:jscript">
{
  "Version": "2012-10-17",
  "Statement": [
    {
      "Action": [
        "s3:PutObject",
        "s3:PutObjectAcl"
      ],
      "Sid": "Stmt1373830917000",
      "Resource": [
        "arn:aws:s3:::plupload-example-bucket-name/upload/*"
      ],
      "Effect": "Allow"
    }
  ]
}</pre>
<h2>
	Piece 6: Configuring Plupload</h2>
<p>Plupload is a JS utility, but you can still configure from PHP. Build the array shown below and then make it available to your JS using your framework's preferred method. For example, Drupal users should drupal_add_js() to add this to the Drupal.settings array.</p>
<p>The example below is to click a button Depending on how you want Plupload to appear, you need settings similar to the following:</p>
<pre class="brush:php">
    $plupload_settings = array(
      // 'container' =&gt; 'container',
      'max_file_size' =&gt; '10mb',
      'runtimes' =&gt; 'html5,flash,silverlight',
      'flash_swf_url' =&gt; '/path/to/plupload/js/Moxie.swf',
      'silverlight_xap_url' =&gt; '/path/toplupload/js/Moxie.xap',
      'url' =&gt; "https://plupload-example-bucket-name.s3.amazonaws.com:443/",
      'multi_selection' =&gt; FALSE,
      // optional, but better be specified directly
      'file_data_name' =&gt; 'file',
      'filters' =&gt; array(
        array(
          'title' =&gt; "Image files",
          'extensions' =&gt; "jpg"
        ),
      ),
      'browse_button' =&gt; 'HTML ELEMENT ID OF "BROWSE" BUTTON',
    );
</pre>
<h2>
	Piece 7: Plupload Events</h2>
<p>To use the on-demand request authorization, you need to tie into the various Plupload events. These base functions assume that you want to have the server control the upload name precisely, show a progress bar, and start uploading as soon as a file is selected. All of those options can be changed with some careful scripting</p>
<p>Here are the key JS events to look at:</p>
<pre class="brush:jscript">
// You'll want to upgrade this very-basic progress bar.
var $status_bar = $('&lt;div&gt;').appendTo('#somewhere-in-your-doc');
function setStatusPercent(percent) {
  if ($status_bar == null);
  else if (percent == 100) {
    $status_bar.html('');
  }
  else {
    $status = $('&lt;div style="background-color: #00f"&gt;&lt;/div&gt;').width((1*percent) + '%').text(percent + '%');
    $status_bar.html('').append($status);
  }
}
// If you are using AJAX, then the upload should not be 100% complete
// until after your server is notified. This allows you to configure
// where the progress bar should be after uploading to S3 and before
// notifying your server. If you just store the key in your form, then set
// this to 1 or eliminate references to it throughout.
var preProcessPercent = .95;
var pluploader = new plupload.Uploader(settings.plupload);
pluploader.bind('Init', function(up, params) {
  $('#filelist').html("&lt;div&gt;Current runtime: " + params.runtime + "&lt;/div&gt;");
});
$('#uploadfiles').click(function(e) {
  pluploader.start();
  e.preventDefault();
});
pluploader.init();
pluploader.bind('FilesAdded', function(up, files) {
  $.each(files, function(i, file) {
    $status_bar.append(
        '&lt;div id="' + file.id + '"&gt;file: ' +
        file.name + ' (' + plupload.formatSize(file.size) + ') &lt;b&gt;&lt;/b&gt;' +
    '&lt;/div&gt;');
    $.getJSON('/path/to/authorize/uploads', function(data) {
      if (typeof data.result != 'undefined') {
        up.settings = $.extend(up.settings, data.result.settings);
        up.start();
      }
    });
  });
  up.refresh(); // Reposition Flash/Silverlight
});
pluploader.bind('UploadFile', function(up, file) {
});
pluploader.bind('UploadProgress', function(up, file) {
  setStatusPercent(Math.round(preProcessPercent * file.percent));
});
pluploader.bind('Error', function(up, err) {
  $status_bar.append("&lt;div&gt;Error: " + err.code +
      ", Message: " + err.message +
      (err.file ? ", File: " + err.file.name : "") +
      "&lt;/div&gt;"
  );
  up.refresh(); // Reposition Flash/Silverlight
});
pluploader.bind('FileUploaded', function(up, file) {
  // Update your form and the progress bar.
  setStatusPercent(100);
  // Alternately, set to preProcessPercent and make AJAX request to notify server
  // In either case, you can access the S3 key at:
  // up.settings.multipart_params.key
});</pre>
<h2>
	Piece 8: Authorize Uploads Script</h2>
<p>This server-side script is accessed within the FilesAdded. You can adjust the data model, as long as you adjust the JS as well.</p>
<pre class="brush:php">
$s3_key = 'KEY';
$s3_secret = 'SECRET';
$s3_bucket = 'plupload-example-bucket-name';
// Create a UUID - or generate a sufficiently unique string
// with your user id plus uniqid.
$uuid = uuid_create();
$filename = 'upload/' . $uuid . '.' . $ext;
$acl = 'private';
$policy = base64_encode(json_encode(array(
  'expiration' =&gt; date('Y-m-d\TH:i:s.000\Z', strtotime('+1 day')),
  'conditions' =&gt; array(
	array(
	  'bucket' =&gt; $s3_bucket,
	),
	array(
	  'acl' =&gt; $acl,
	),
	array(
	  'key' =&gt; $filename
	),
	array(
	  'success_action_status' =&gt; '201'
	),
	array(
	  'starts-with',
	  '$name',
	  ''
	),
	array(
	  'Filename' =&gt; $filename
	),
  )
)));
$signature = base64_encode(hash_hmac('sha1', $policy, $s3_secret, true));
$plupload_settings = array(
  'multipart_params' =&gt; array(
	'key' =&gt; $filename,
	'Filename' =&gt; $filename,
	'success_action_status' =&gt; '201',
	'acl' =&gt; $acl,
	'AWSAccessKeyId' =&gt; $s3_key,
	'policy' =&gt; $policy,
	'signature' =&gt; $signature,
  ),
);
$plupload = array(
  'settings' =&gt; $plupload_settings,
);
// Adjust for JSON-RPC response structure, regardless of request format.
$json = array(
  'id' =&gt; 1,
  'result' =&gt; $plupload,
);
echo json_encode($json);</pre>
<h2>
	Summary</h2>
<p>This is obviously not a plug-and-play solution. Even if the JS and PHP are packaged up, the AWS setup is still extensive, and the file handling on the backend is still application-dependent. Regardless, I hope that some useful tips can be gleaned from the example configurations and code snippets provided above.</p>
</div></div></div>  </div>
</div>
