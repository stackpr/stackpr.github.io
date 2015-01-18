---
title: Download Images from Shared Photostream with PHP
layout: post
category: blog
tags:
- PHP
- Drupal
- Photostream
- iCloud
permalink: /blog/2013/04/30/download-images-shared-photostream-php

---
{% include JB/setup %}
<div id="node-278" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Downloading a couple originals from a Shared Photostream is no big deal, but downloading all of them from a large photostream can quickly become cumbersome. Below is a Drush script that interacts with the JSON-driven photostream backend. There is no official API (at the time of writing), so I fully expect this to break at some point.</p>
<!--break-->
<h2>
	What is Drush?</h2>
<p><a href="http://drupal.org/project/drush">Drush</a> is the <a href="http://drupal.org/">Drupal</a> module that enables command-line access. I used Drush to gain access to the HTTP client in Drupal. The code could easily be adjusted to work with any other client of substance. Simply drop the script below into any module folder on a Drupal installation with Drush support, and you are ready to go.</p>
<h2>
	The Script: photostream.drush.inc</h2>
<pre class="brush:php">
&lt;?php
/**
 * @file
 * Provide a drush command to interact with a photostream.
 */
/**
 * Configure the drush command.
 */
function photostream_drush_command() {
  $items['photostream-download'] = array(
    'description' =--&gt; 'Download large versions of the images from a photostream.'
  );
  return $items;
}
/**
 * Download all photos from a photostream.
 * @param $stream_id string
 * @param $save_path string
 */
function drush_photostream_download($stream_id = '', $save_path = '') {
  if (empty($stream_id) || empty($save_path)) {
    drush_print(dt("Usage: photostream-download 'A45qXGF1Qtibd' '/tmp/path/to/export'"));
    return;
  }
  
  // Configure basic info for use across requests.
  $api = 'https://p04-sharedstreams.icloud.com';
  $method = 'POST';
  $retry = 1;
  $timeout = 5;
  $headers = array(
    'Accept' =&gt; 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language' =&gt; 'en-US,en;q=0.5',
    'Cache-Control' =&gt; 'no-cache',
    'Connection' =&gt; 'keep-alive',
    'Content-Type' =&gt; 'text/plain; charset=UTF-8',
    'Origin' =&gt; 'https://www.icloud.com',
    'Pragma' =&gt; 'no-cache',
    'Referer' =&gt; 'https://www.icloud.com/photostream/',
    'User-Agent' =&gt; 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0 FirePHP/0.7.2',
    'x-insight' =&gt; 'activate',
  );
  
  // Get the list of items.
  $url = "$api/$stream_id/sharedstreams/webstream";
  $data = array(
    'streamCtag' =&gt; NULL,
  );
  $data = json_encode($data);
  $response = drupal_http_request($url, $headers, $method, $data, $retry, $timeout);
  $stream = json_decode($response-&gt;data, FALSE);
  
  // Build the list of guids.
  $checksums = array();
  $guids = array();
  foreach ($stream-&gt;photos as $photo) {
    $guids[] = $photo-&gt;photoGuid;
    $test = (array) $photo-&gt;derivatives;
    ksort($test);
    $test = array_pop($test);
    $checksums[] = $test-&gt;checksum;
  }
  $guids = array_unique($guids);
  $asset_url = $api . '/A45qXGF1Qtibd/sharedstreams/webasseturls';
  
  // Create the save folder.
  if (!is_dir($save_path)) {
    if (!mkdir($save_path)) {
      drush_print(dt("Unable to create the export folder."));
      return;
    }
  }
  if (!is_writable($save_path)) {
    drush_print(dt("Unable to write to the export folder."));
    return;
  }
  drush_print(dt("Initializing the export folder."));
    
  // Work through the guids in batches and download the images (image URLs are only valid for a brief period).
  while (!empty($guids)) {
    $data = array(
      'photoGuids' =&gt; array_slice($guids, 0, 5)
    );
    $guids = array_slice($guids, 5);
    $data = json_encode($data);
    $response = drupal_http_request($asset_url, $headers, $method, $data, $retry, $timeout);
    $assets = json_decode($response-&gt;data);
    if (!is_object($assets-&gt;items)) {
      var_dump($assets, $response);
      return;
      continue;
    }
    
    // Add the assets to the zip.
    $urls = array();
    foreach ($assets-&gt;items as $checksum =&gt; $item) {
      if (!in_array($checksum, $checksums)) {
        continue;
      }
      $url = $assets-&gt;locations-&gt;{$item-&gt;url_location}-&gt;scheme . '://' . $assets-&gt;locations-&gt;{$item-&gt;url_location}-&gt;hosts[0] . $item-&gt;url_path;
      $urls[] = $url;
    }
    if (empty($urls)) {
      drush_print(dt("Unable to locate any URLs."));
      continue;
    }
    $urls = array_unique($urls);
    $pairs = array();
    foreach ($urls as $i =&gt; $url) {
      if (preg_match('@^.*/(.*?)\?@s', $url, $arr)) {
        $localname = $arr[1];
      }
      else {
        $localname = "New File $i.jpg";
      }
      $localname = urldecode($localname);
      $localname = preg_replace('@[^a-zA-Z0-9\\\\/\. \-]+@s', '_', $localname);
      $pairs[$localname] = $url;
    }
    $urls = $pairs;
    ksort($urls);
    
    // Export the images.
    foreach ($urls as $localname =&gt; $url) {
      $localname = $save_path . DIRECTORY_SEPARATOR . $localname;
      if (is_file($localname)) {
        drush_print(dt("Skipping: !path", array('!path' =&gt; $localname)));
        continue;
      }
      drush_print(dt("Downloading: !path", array('!path' =&gt; $localname)));
      $response = drupal_http_request($url, $headers);
      if ($response-&gt;code == 200) {
        file_put_contents($localname, $response-&gt;data);
      }
      else {
        drush_print(dt("Error with download"), 3);
      }
    }
  }
}
</pre>
</div></div></div>  </div>
</div>
