---
title: API for JSON-RPC Setup
layout: post
category: blog
tags:
- JSON-RPC
permalink: /blog/2012/10/22/api-json-rpc-setup
published: false

---
{% include JB/setup %}
<div id="node-241" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p><a href="http://www.jsonrpc.org/specification#notification">JSON-RPC</a> and <a href="http://dojotoolkit.org/reference-guide/1.8/dojox/rpc/smd.html">JSON SMD</a></p>
<p>ESI - <a href="http://www.w3.org/TR/esi-lang">http://www.w3.org/TR/esi-lang</a> - <a href="https://www.varnish-cache.org/docs/3.0/tutorial/esi.html">https://www.varnish-cache.org/docs/3.0/tutorial/esi.html</a> (Varnish has limited support)</p>
<p><a href="http://olado.github.com/doT/">doT.js</a></p>
<p>JSON db: <a href="http://couchdb.apache.org/">http://couchdb.apache.org/</a>, </p>
<p>Couchdb - <a href="http://wiki.apache.org/couchdb/HTTP_view_API#Creating_Views">creating views</a></p>
<p> </p>
<h2>
	References for Other Alternatives</h2>
<ol><li>
		Alternative new-age web application frameworks
		<ol><li>
				<a href="http://github.com/MLstate/opalang/wiki/A-tour-of-Opa">Opa</a>: Consolidated JS engine to manage server/database/client code in single files</li>
			<li>
				<a href="http://www.28msec.com/documentation/overview">Sausalito</a>: Conslidated XQuery engine to manage server/database/client code in one framework</li>
			<li>
				<a href="http://en.wikipedia.org/wiki/Apache_Wicket">Wicket</a>: Apache project to pull components from multiple URLs (many options similar to this)</li>
			<li>
				<a href="http://jan.varwig.org/wp-content/uploads/2009/10/diploma-thesis-jan-varwig-serverside-javascript.pdf">Research Paper</a>: A thesis on server-side JavaScript, which touches on many elements on this page</li>
		</ol></li>
	<li>
		Alternative database resources
		<ol><li>
				<a href="http://www.mongodb.org/display/DOCS/MongoDB%2C+CouchDB%2C+MySQL+Compare+Grid">Mongo vs couch</a>, <a href="http://www.metabrew.com/article/anti-rdbms-a-list-of-distributed-key-value-stores">more comparison data</a>, <a href="http://www.slideshare.net/gabriele.lana/couchdb-vs-mongodb-2982288">presentation</a></li>
			<li>
				<a href="http://www.persvr.org/Persistent%20Data%20Modeling">Persevere</a>: Another JS-centric database</li>
			<li>
				<a href="http://jsoniq.org/index.html">JSON Query</a>: Based on XQuery, it specifies a JSON-style query language. Implemented with <a href="http://www.zorba-xquery.com/html/index">Zorba</a></li>
		</ol></li>
	<li>
		Alternative JS rendering/template engines
		<ol><li>
				<a href="http://www.jsonml.org/">JsonML</a> (+JBST): A JSON-centric technology that converts XML to JSON and then also provides a template syntax to bring it all back together client-side.</li>
			<li>
				<a href="http://jsperf.com/adasdadsaddddddddddd/19">JsPerf</a>: Shows doT as the fastest</li>
			<li>
				<a href="https://github.com/BorisMoore/jsrender">jsRender</a>: Replacement for jQuery Templates, including <a href="https://github.com/BorisMoore/jsrender/blob/master/demos/step-by-step/02_compiling-named-templates-from-strings.html">compilation</a>. It claims to be <a href="http://borismoore.github.com/jsrender/test/perf-compare.html">faster</a> than other options, including doT.</li>
			<li>
				<a href="http://twigkit.github.com/tempo/">Tempo</a>: Supports filters and formatting</li>
			<li>
				<a href="https://github.com/twitter/hogan.js">Hogan</a> (Mustache): Excludes logic. Formatting must be handled by custom functions</li>
			<li>
				<a href="https://developers.google.com/closure/templates/docs/helloworld_js">Google's Closure</a>: Google's version of client-side templates</li>
			<li>
				<a href="http://engineering.linkedin.com/frontend/client-side-templating-throwdown-mustache-handlebars-dustjs-and-more">LinkedIn's analysis</a>: Their choice of <a href="http://akdubya.github.com/dustjs/">dust</a></li>
			<li>
				<a href="http://getopensource.info/explore/javascript/template-engine/">Long list of options</a>, including many of those I found through other sources</li>
		</ol></li>
</ol></div></div></div>  </div>
</div>
