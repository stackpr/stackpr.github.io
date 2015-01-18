---
title: Loading an iTunes-optimized podcast in MediaMonkey
layout: post
category: blog
tags:
- RSS
- ITPC
- MediaMonkey
permalink: /blog/2014/02/25/loading-itunes-optimized-podcast-mediamonkey

---
{% include JB/setup %}
<div id="node-319" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>When tasked with the simple matter of subscribing to <a href="http://anothermotherrunner.com/amr-radio/">this podcast</a>, I discovered that MediaMonkey is relatively limited (or at least picky) in terms of what it can handle. MediaMonkey 4 does not appear to handle the ITPC protocol, so I needed to find a way around it.</p>
<!--break-->
<h2>
	Obstacle 1: ITPC in MediaMonkey</h2>
<p>The podcast site linked to the <a href="http://itpc://podcasts.streamtheworld.com/podcast/audio-2331-DMqRQrk-1010721.rss">RSS via ITPC protocol</a>, which did no good.</p>
<p>Changing the protocol but keeping the URL otherwise intact also did not work - the response was empty.</p>
<p>The first step was discovering the HTTP URL for the RSS file. In this case, there were two options:</p>
<ol><li>
		Subscribe via iTunes, locate the podcast in iTunes, and right-click to "Copy Podcast URL"</li>
	<li>
		View the source of the <a href="http://anothermotherrunner.com/amr-radio/">podcast home page</a> and look for the link tag (e.g., &lt;link rel="alternate" type="application/rss+xml" ... /&gt;)</li>
</ol><p>Both methods provided the <a href="http://anothermotherrunner.com/category/amr-radio-show/feed/">same feed URL</a>.</p>
<h2>
	Obstacle 2: Less Apparent Error</h2>
<p>Unfortunately, that URL did not work in MediaMonkey. MediaMonkey indicates that there is an error and then displays the first line of the RSS/XML file. A quick test of the URL showed that it returned proper XML, but it also showed that the content-type of the document was wrong.</p>
<p><strong>curl http://anothermotherrunner.com/category/amr-radio-show/feed/ --head</strong></p>
<ul><li>
		Sets cookies</li>
	<li>
		<div>
			Content-Type: text/html; charset=utf-8</div>
	</li>
	<li>
		<div>
			MediaMonkey says "There was a problem downloading the following file(s):". It then shows the first line of the XML file.</div>
	</li>
</ul><div>
	Rather than building something custom, the faster solution was simply to rely on feedburner. Feedburner is a bit more lax in its requirements, but it standardizes its own output in a way that MediaMonkey can understand. Simply take the feed with the problem and create a feedburner feed that you can then put into MediaMonkey.</div>
<p><strong>curl http://feeds.feedburner.com/anothermotherrunner/Viun --head</strong></p>
<ul><li>
		No cookies</li>
	<li>
		<div>
			Content-Type: text/xml; charset=UTF-8</div>
	</li>
</ul><div>
	This new feed finally resolves all the issues and lets me pull the requested podcast into MediaMonkey. As noted, there is also a slight benefit since cookies are not sent by feedburner, but the amount of data transfer is obviously secondary to the fact that it actually works.</div>
</div></div></div>  </div>
</div>
