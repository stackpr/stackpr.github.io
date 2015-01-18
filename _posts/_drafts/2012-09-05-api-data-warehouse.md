---
title: API for Data Warehouse
layout: post
category: blog
tags:
- PHP
- Amazon S3
permalink: /blog/2012/09/05/api-data-warehouse
published: false

---
{% include JB/setup %}
<div id="node-219" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><h2>
	Data Model</h2>
<pre class="brush:jscript">
{
  "wh_created" : "2012-10-24 00:00:00",
  "wh_scope" : "day",
  "wh_start" : "2012-10-24",
  "u_hits" : 12,
  "u_path" : "resource/mhc"
}</pre>
<h2>
	Query Model</h2>
<p>Alternately, this could be modelled on <a href="https://developers.google.com/analytics/devguides/reporting/core/v3/reference#dimensions">https://developers.google.com/analytics/devguides/reporting/core/v3/reference#dimensions</a></p>
<p>The result should be modelled after the google datatable: <a href="https://developers.google.com/chart/interactive/docs/reference#dataparam">https://developers.google.com/chart/interactive/docs/reference#dataparam</a></p>
<p>It should probably support the query syntax here: <a href="https://developers.google.com/chart/interactive/docs/querylanguage">https://developers.google.com/chart/interactive/docs/querylanguage</a></p>
<pre class="brush:jscript">
{
  "json" : "2.0",
  "method" : "witti_warehouse.getDataTable",
  "params" : {
    "date" : {
      "start" : "",
      "end" : "",
      "scope" : "",
    },
    "process_doc" : [
      /* Use the JSON compiler syntax outlines for aliases at build-time. */
      /* Change key names, omit some values, etc. */
      /* Segments (complex fields) would be built here to be referenced as a simple field below. */
      /* dimension formatting would also need to happen here. */
    ],
    "process_row" : [
      /* Use the JSON compiler syntax outlines for aliases to allow per-row modifications at request-time. */
    ],
    "fields" : [
      {
        "id" : "",
        "type" : "metric", // or "dimension"
        "title" : "column header", // Optional - need to build in a system to guess
        "combiner" : "", // metric-only
      }
    ]
  }
}</pre>
<h2>
	Drupal Modules</h2>
<ol><li>
		Base all API on <a href="http://www.jsonrpc.org/specification#parameter_structures">JSON-RPC 2.0</a> using <a href="http://drupal.org/project/services">Services</a> module</li>
	<li>
		Store full JSON objects in S3
		<ol><li>
				Download in parallel for retrieving multiple objects:
				<ol><li>
						<a href="http://www.rustyrazorblade.com/2008/02/curl_multi_exec/">http://www.rustyrazorblade.com/2008/02/curl_multi_exec/</a></li>
					<li>
						<a href="http://php.net/manual/en/function.curl-multi-exec.php">http://php.net/manual/en/function.curl-multi-exec.php</a></li>
				</ol></li>
		</ol></li>
</ol><h2>
	PHP References</h2>
<ol><li>
		<a href="http://se2.php.net/manual/en/mysqli.multi-query.php">Submit an entire transaction as one query.</a></li>
</ol><h2>
	Database Structure</h2>
<pre class="brush:sql">
ALTER TABLE `test1`
PARTITION BY KEY()
PARTITIONS 3;</pre>
<h2>
	Object Template</h2>
<pre class="brush:jscript">
{
  "id" : "the-long-random-string-for-this-template",
  "override" : [
    {
      "src" : { "type" : "path", "key" : 1 },
      "tgt" : { "el" : "item['x']['y']", "assign" : "assign" },
      "validate" : [
        ["type", "integer"],
        ["range", 0, null]
      ],
      "error" : {
        "default" : 0
      }
    },
    {
      "src" : { "type" : "query", "key" : "x" },
      "tgt" : { "el" : "item['x']['z']", "assign" : "push" },
      "validate" : [
        ["array", [
          ["type", "integer"],
          ["range", 0, 10]
        ]],
      ],
      "error" : {
        "message" : "" /* This would be passed back to the caller. */
      }
    }
  ],
  "item" : {}
}
</pre>
<h2>
	S3 - multiple requests</h2>
<p>One example: <a href="http://code.google.com/p/rolling-curl/source/browse/trunk/RollingCurl.php">http://code.google.com/p/rolling-curl/source/browse/trunk/RollingCurl.php</a></p>
<pre class="brush:php">
&lt;?php
$running=null;
do {
    curl_multi_exec($mh,$running);
    $ready=curl_multi_select($mh); // this will pause the loop
    if($ready&gt;0){
        while($info=curl_multi_info_read($mh)){
            $status=curl_getinfo($info['handle'],CURLINFO_HTTP_CODE);
            if($status==200){
                $successUrl=curl_getinfo($info['handle'],CURLINFO_EFFECTIVE_URL);
                break 2;
            }
        }
    }
} while ($running&gt;0 &amp;&amp; $ready!=-1);</pre>
<h2>
	Warehouse Aggregation Plan</h2>
<ol><li>
		Source object change adds reference to queue</li>
	<li>
		Mangle the source object and save in universe M</li>
	<li>
		All properties will fall into exactly one category:
		<ol><li>
				Filtered/ignored</li>
			<li>
				Reducible/Aggregatable (multiple combiners would be supported for each field)</li>
			<li>
				Keyed (a group by field)</li>
		</ol></li>
	<li>
		Aggregation instructions are provided in one of two ways:
		<ol><li>
				Configure all reducibles and assume the remainder are keyed</li>
			<li>
				Configure both reducibles and keys and assume the remainder should be ignored</li>
		</ol></li>
	<li>
		Reductions must be performed in order of the fact ids</li>
	<li>
		Combined data is saved in universe C</li>
	<li>
		Each new object should be able to update a fact in C without reexamining any previous facts</li>
	<li>
		For complex combiners that lack an implicit memory (e.g., max), perhaps a rewind value can be stored on the fact so that the reducer can rewind to that object and just replay its computations since it was added</li>
</ol><h2>
	Database Schema</h2>
<h3>
	Basic Universe</h3>
<p>A universe will be comprised of multiple galaxies.</p>
<ol><li>
		Objects
		<ol><li>
				oid</li>
			<li>
				status</li>
			<li>
				created</li>
			<li>
				deleted</li>
			<li>
				uuid</li>
			<li>
				data</li>
		</ol></li>
	<li>
		Fields
		<ol><li>
				oid</li>
			<li>
				key</li>
			<li>
				type</li>
			<li>
				value</li>
		</ol></li>
</ol><h3>
	Aggregate Universe</h3>
<p>An aggregate universe will be comprised of multiple universes, each further combining/reducing the values of the previous universe until all pivot hashes in a universe are unique.</p>
<ol><li>
		Source
		<ol><li>
				uid</li>
			<li>
				oid</li>
			<li>
				status (whether slice action is pending)</li>
			<li>
				slice</li>
		</ol></li>
	<li>
		Slices
		<ol><li>
				slice</li>
			<li>
				input_count</li>
			<li>
				output_count</li>
			<li>
				lock_time</li>
			<li>
				lock_uuid</li>
		</ol></li>
	<li>
		Objects (Basic, plus this...)
		<ol><li>
				Every object will have the 'slice' field for easy identification</li>
			<li>
				Every object will have the 'pivot_hash' field to determine which objects still need to be merged</li>
		</ol></li>
	<li>
		Fields (same as Basic)</li>
</ol><h3>
	Ad Hoc Queries</h3>
<ol><li>
		Basic object lookup (the null combiner)
		<ol><li>
				Add/remove from the results in each galaxy</li>
			<li>
				Each result should have a 'sort' value based on the query</li>
			<li>
				** For the null combiner, append "uid/oid" to the sort value to make it unique.</li>
			<li>
				Join the galaxy results</li>
		</ol></li>
	<li>
		Distinct object lookup (the distinct combiner)
		<ol><li>
				Same as the basic object lookup, but skip the ** step</li>
			<li>
				Any field that should be included in the distinct needs a filter, even if it is just a "not empty" filter</li>
			<li>
				After joining the results, purge duplicates</li>
			<li>
				EX: Get a list of all the states references in 2012. Filter by year=2012, sort. Remove states=empty, sort. Return fake objects with just the state field.</li>
		</ol></li>
	<li>
		Count object lookup (the count combiner)
		<ol><li>
				Basically, this is the distinct combiner, but we'll need to know the ...</li>
		</ol></li>
</ol></div></div></div>  </div>
</div>
