---
title: do50.us API References
layout: post
category: blog
tech:
- PHP
- Drupal
- ImageMagick
- Picasa
permalink: /blog/2012/09/04/do50us-api-references
published: false

---
{% include JB/setup %}
<div id="node-217" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p><span style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">Active.com API</span></p>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<ul><li>
			<a href="http://developer.active.com/docs/Activecom_Search_API_Reference" target="_blank">http://developer.active.com/<wbr></wbr>docs/Activecom_Search_API_<wbr></wbr>Reference</a></li>
		<li>
			<a href="http://api.amp.active.com/search?v=xml&amp;m=meta:channel=Running&amp;api_key=wuhmn9ye94xn3xnteudxsavw" target="_blank">http://api.amp.active.com/<wbr></wbr>search?v=xml&amp;m=meta:channel=<wbr></wbr>Running&amp;api_key=<wbr></wbr>wuhmn9ye94xn3xnteudxsavw</a></li>
	</ul></div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	 </div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	Create Google Apps accounts for <a href="http://do50.us/" target="_blank">do50.us</a></div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<ul><li>
			<a href="https://www.google.com/a/cpanel/do50.us/SetupWizard?wmc=1&amp;sig=ALjLGbN9BX-votjXnDT0nqYIMqEdt5ywrg#SetupWizard" target="_blank">https://www.google.com/a/<wbr></wbr>cpanel/do50.us/SetupWizard?<wbr></wbr>wmc=1&amp;sig=ALjLGbN9BX-<wbr></wbr>votjXnDT0nqYIMqEdt5ywrg#<wbr></wbr>SetupWizard</a></li>
		<li>
			Free for up to 10 users.</li>
	</ul></div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	Store original images on S3:</div>
<ul><li style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
		Use s3fuse: <a href="http://drupal.org/node/996016">http://drupal.org/node/996016</a></li>
	<li style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
		Use stream wrappers: <a href="https://drupal.org/project/s3_api">Amazon S3 Stream Wrapper | drupal.org</a></li>
	<li style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
		Use queue: <a href="http://www.slayerment.com/blog/drupal-cdn-file-server-amazon-s3-way">http://www.slayerment.com/blog/drupal-cdn-file-server-amazon-s3-way</a></li>
	<li style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
		Upload directly using plupload: <a href="https://github.com/moxiecode/plupload/wiki/Upload-to-Amazon-S3">Upload to Amazon S3 · moxiecode/plupload Wiki · GitHub</a></li>
</ul><div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	Store images on Picasa:</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	 </div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<a href="http://www.shutterstock.com/pic-23938603/stock-vector-a-vector-usa-map-with-all-states-in-separate-layers.html" target="_blank">http://www.shutterstock.com/<wbr></wbr>pic-23938603/stock-vector-a-<wbr></wbr>vector-usa-map-with-all-<wbr></wbr>states-in-separate-layers.html</a></div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<a href="http://www.shutterstock.com/pic-13883914/stock-vector-united-states-of-america-map-in-vector-design.html" target="_blank">http://www.shutterstock.com/<wbr></wbr>pic-13883914/stock-vector-<wbr></wbr>united-states-of-america-map-<wbr></wbr>in-vector-design.html</a></div>
<ul style="color: rgb(0, 0, 0); font-family: arial; font-size: small; "><li>
		<a href="http://code.google.com/apis/picasaweb/docs/2.0/developers_guide_protocol.html#ListAlbumPhotos" target="_blank">http://code.google.com/apis/<wbr></wbr>picasaweb/docs/2.0/developers_<wbr></wbr>guide_protocol.html#<wbr></wbr>ListAlbumPhotos</a></li>
	<li>
		Add imgmax=d to get the original image's path.<br /><a href="https://picasaweb.google.com/data/entry/api/user/111559362215313296897/albumid/5726611968586365761/photoid/5726611995529376146?imgmax=d" target="_blank">https://picasaweb.google.com/<wbr></wbr>data/entry/api/user/<wbr></wbr>111559362215313296897/albumid/<wbr></wbr>5726611968586365761/photoid/<wbr></wbr>5726611995529376146?imgmax=d</a></li>
	<li>
		Non-original images all use same basic URL. Just change the bold s to adjust the height.<br /><a href="https://lh6.googleusercontent.com/-OqmpltKT4V0/T3kDROAE8ZI/AAAAAAAAyZU/02y67kjf9Co/" target="_blank">https://lh6.googleusercontent.<wbr></wbr>com/-OqmpltKT4V0/T3kDROAE8ZI/<wbr></wbr>AAAAAAAAyZU/02y67kjf9Co/</a><b>s2000</b>/<wbr></wbr>_DSC4449.jpg</li>
	<li>
		Max of 1,000 images per album and 10,000 albums, 20MB/img and 50 megapixels/img: <a href="http://support.google.com/picasa/bin/answer.py?hl=en&amp;answer=43879" target="_blank">http://<wbr></wbr>support.google.com/picasa/bin/<wbr></wbr>answer.py?hl=en&amp;answer=43879</a></li>
	<li>
		Implement as a stream wrapper: <a href="http://api.drupal.org/api/drupal/includes%21stream_wrappers.inc/class/DrupalPrivateStreamWrapper/7">http://api.drupal.org/api/drupal/includes%21stream_wrappers.inc/class/DrupalPrivateStreamWrapper/7</a></li>
</ul><div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	Use ImageMagick to apply masks and add borders</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<ul><li>
			<a href="http://www.imagemagick.org/Usage/masking/" target="_blank">http://www.imagemagick.org/<wbr></wbr>Usage/masking/</a></li>
		<li>
			Add halo/border on transparency<br /><a href="http://www.imagemagick.org/Usage/masking/#outline" target="_blank">http://www.imagemagick.org/<wbr></wbr>Usage/masking/#outline</a></li>
		<li>
			Apply masks<br /><a href="http://www.imagemagick.org/Usage/masking/#editing" target="_blank">http://www.imagemagick.org/<wbr></wbr>Usage/masking/#editing</a></li>
		<li>
			<a href="http://www.vectorstock.com/royalty-free-vector/united-states-of-america-vector-207755" target="_blank">http://www.vectorstock.com/<wbr></wbr>royalty-free-vector/united-<wbr></wbr>states-of-america-vector-<wbr></wbr>207755</a></li>
	</ul><div>
		Placing the image mask over a photo</div>
</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<ul><li>
			Best: <a href="http://deepliquid.com/projects/Jcrop/demos.php?demo=advanced" target="_blank">http://deepliquid.com/<wbr></wbr>projects/Jcrop/demos.php?demo=<wbr></wbr>advanced</a>
			<ul><li>
					No new selections</li>
				<li>
					Aspect ratio</li>
				<li>
					 </li>
			</ul></li>
		<li>
			<a href="http://jqueryui.com/demos/resizable/#constrain-area" target="_blank">http://jqueryui.com/demos/<wbr></wbr>resizable/#constrain-area</a></li>
		<li>
			For ref (not really useful here): <a href="http://stackoverflow.com/questions/5547499/google-intensitymap-visualization-us-states" target="_blank">http://stackoverflow.<wbr></wbr>com/questions/5547499/google-<wbr></wbr>intensitymap-visualization-us-<wbr></wbr>states</a></li>
	</ul></div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	 </div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	Image processing hosting alternatives to EC2</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<ul><li>
			node.js has great ImageMagick support: <a href="https://github.com/rsms/node-imagemagick" target="_blank">https://github.com/<wbr></wbr>rsms/node-imagemagick</a></li>
		<li>
			node.js has shaXX encoding: <a href="https://github.com/Marak/node_hash/blob/master/lib/hash.js" target="_blank">https://github.com/<wbr></wbr>Marak/node_hash/blob/master/<wbr></wbr>lib/hash.js</a>
			<ul><li>
					<span style="line-height: 16px; color: rgb(51, 51, 51); font-size: 12px; white-space: pre-wrap; font-family: 'Bitstream Vera Sans Mono', 'Courier New', monospace; "> <span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">hash</span> <span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; font-weight: bold; ">=</span> <span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">crypto</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">.</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">createHmac</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">(</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">algo</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">,</span> <span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">salt</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">).</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">update</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">(</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">data</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">).</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">digest</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">(</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">enco<wbr></wbr>ding</span><span style="margin: 0px; padding: 0px; border-width: 0px; font: inherit; ">)</span></span></li>
			</ul></li>
		<li>
			<a href="http://www.heroku.com/pricing#0-0" target="_blank">http://www.heroku.com/pricing#<wbr></wbr>0-0</a> (may not be any cheaper than EC2. they don't auto-scale, but they do have near-instantaneous scale up/down)
			<ul><li>
					Free SSL: <a href="https://devcenter.heroku.com/articles/ssl#piggyback_ssl_myappherokucom_and_myappherokuappcom_only" target="_blank">https://devcenter.heroku.com/<wbr></wbr>articles/ssl#piggyback_ssl_<wbr></wbr>myappherokucom_and_<wbr></wbr>myappherokuappcom_only</a></li>
				<li>
					<a href="https://devcenter.heroku.com/articles/read-only-filesystem" target="_blank">https://devcenter.heroku.com/<wbr></wbr>articles/read-only-filesystem</a></li>
			</ul></li>
	</ul><p> </p>
	<p>Photo books</p>
	<ul><li>
			<a href="http://developer.blurb.com/docs/read/Photobook" target="_blank">http://developer.blurb.com/<wbr></wbr>docs/read/Photobook</a> (only allows 1 set of book dimensions at a time but does allow different cover and paper types)</li>
		<li>
			<a href="http://developer.lulu.com/docs/publishing/publish/Data_Structures#whereSold" target="_blank">http://developer.lulu.com/<wbr></wbr>docs/publishing/publish/Data_<wbr></wbr>Structures#whereSold</a> (allows upload and dropship)</li>
		<li>
			Snapfish
			<ul><li>
					<a href="https://publisherwiki.onconfluence.com/display/dev/project" target="_blank">https://publisherwiki.<wbr></wbr>onconfluence.com/display/dev/<wbr></wbr>project</a> - appears to allow text placement too.</li>
				<li>
					<a href="https://publisherwiki.onconfluence.com/display/dev/App+compensation+model" target="_blank">https://publisherwiki.<wbr></wbr>onconfluence.com/display/dev/<wbr></wbr>App+compensation+model</a></li>
			</ul></li>
		<li>
			<a href="http://developers.printfection.com/producers/" target="_blank">http://developers.<wbr></wbr>printfection.com/producers/</a></li>
		<li>
			<a href="http://www.sharedbook.com/dev/index.html" target="_blank">http://www.sharedbook.com/dev/<wbr></wbr>index.html</a></li>
	</ul><div>
		Charts API</div>
</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<ul><li>
			<a href="https://code.google.com/apis/ajax/playground/?type=visualization#intensity_map" target="_blank">https://code.google.com/apis/<wbr></wbr>ajax/playground/?type=<wbr></wbr>visualization#intensity_map</a></li>
		<li>
			<a href="https://developers.google.com/chart/image/docs/gallery/map_charts#statecodes" target="_blank">https://developers.google.com/<wbr></wbr>chart/image/docs/gallery/map_<wbr></wbr>charts#statecodes</a> (largest possible is 440x220)</li>
		<li>
			<a href="https://developers.google.com/chart/interactive/docs/gallery/geomap#Events" target="_blank">https://developers.google.com/<wbr></wbr>chart/interactive/docs/<wbr></wbr>gallery/geomap#Events</a> (allows interactive map)</li>
	</ul></div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<div style="border-width: 0px; padding: 0px; border-style: none; margin: 0px; color: rgb(102, 102, 102); font-size: 10pt; white-space: nowrap; font-family: monospace; ">
		<span style="color: rgb(0, 0, 136); ">function </span><span style="color: black; ">drawVisualization</span>() {<br />
		  <span style="color: rgb(136, 0, 0); ">// Create and populate the data table.</span><br />
		  <span style="color: rgb(0, 0, 136); ">var </span><span style="color: black; ">data </span>= <span style="color: rgb(0, 0, 136); ">new </span><span style="color: black; ">google</span>.<span style="color: black; ">visual<wbr></wbr>ization</span>.<span style="color: black; ">DataTable</span>();<br />
		  <span style="color: black; ">data</span>.<span style="color: black; ">addColumn</span>(<span style="color: rgb(0, 136, 0); ">'string'</span>, <span style="color: rgb(0, 136, 0); ">''</span>,<wbr></wbr> <span style="color: rgb(0, 136, 0); ">'State'</span>);<br />
		  <span style="color: black; ">data</span>.<span style="color: black; ">addColumn</span>(<span style="color: rgb(0, 136, 0); ">'number'</span>, <span style="color: rgb(0, 136, 0); ">'<wbr></wbr>Population (mil)'</span>, <span style="color: rgb(0, 136, 0); ">'a'</span>);<br />
		  <span style="color: black; ">data</span>.<span style="color: black; ">addRows</span>(<span style="color: rgb(34, 136, 17); ">5</span>);<br />
		  <span style="color: black; ">data</span>.<span style="color: black; ">setValue</span>(<span style="color: rgb(34, 136, 17); ">0</span>, <span style="color: rgb(34, 136, 17); ">0</span>, <span style="color: rgb(0, 136, 0); ">'KS'</span>);<br />
		  <span style="color: black; ">data</span>.<span style="color: black; ">setValue</span>(<span style="color: rgb(34, 136, 17); ">0</span>, <span style="color: rgb(34, 136, 17); ">1</span>, <span style="color: rgb(34, 136, 17); ">1324</span>);<br /><br />
		  <span style="color: rgb(136, 0, 0); ">// Create and draw the visualization.</span><br />
		  <span style="color: rgb(0, 0, 136); ">new </span><span style="color: black; ">google</span>.<span style="color: black; ">visualization</span>.<span style="color: black; ">Int<wbr></wbr>ensityMap</span>(<span style="color: black; ">document</span>.<span style="color: black; ">getElementB<wbr></wbr>yId</span>(<span style="color: rgb(0, 136, 0); ">'visualization'</span>)).<br />
		    <span style="color: black; ">draw</span>(<span style="color: black; ">data</span>, {<span style="color: rgb(0, 136, 0); ">'region' </span>: <span style="color: rgb(0, 136, 0); ">'usa'</span><wbr></wbr>});<br />
		}<br /><span style="color: black; ">​</span></div>
	<div style="border-width: 0px; padding: 0px; border-style: none; margin: 0px; font-size: 10pt; white-space: nowrap; font-family: monospace; ">
		Clickable US Map</div>
	<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
		<ul><li>
				<span style="font-family: monospace; white-space: nowrap; "><a href="https://code.google.com/apis/ajax/playground/?type=visualization#geo_map" target="_blank">https://code.google.com/apis/<wbr></wbr>ajax/playground/?type=<wbr></wbr>visualization#geo_map</a></span></li>
		</ul></div>
	<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">function drawVisualization() {</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   var data = new google.visualization.<wbr></wbr>DataTable();</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   data.addRows(1);</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   data.addColumn('string', 'State');</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   data.addColumn('number', 'Popularity');</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   data.setValue(0, 0, 'Nebraska');</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   data.setValue(0, 1, 200);</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   </span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   var geomap = new google.visualization.GeoMap(</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">       document.getElementById('<wbr></wbr>visualization'));</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">   google.visualization.events.<wbr></wbr>addListener(geomap, "regionClick", function (r) {</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">     for each (k in r) {</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">         alert(k + " = " + r[k]);</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">     }</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">       });</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">  </span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">  geomap.draw(data, {</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">     "dataMode": "regions",</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">     "region" : "US"</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">  });</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; "> }</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; "> </span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<font face="monospace"><span style="white-space: nowrap; ">OR USE THE geochart instead</span></font></div>
		<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">function drawVisualization() {</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  var data = new google.visualization.<wbr></wbr>DataTable();</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  data.addRows(1);</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  data.addColumn('string', 'State');</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  data.addColumn('number', 'Popularity');</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  data.setValue(0, 0, 'NE');</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  data.setValue(0, 1, 200);</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; "> </span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  var geochart = new google.visualization.GeoChart(</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">      document.getElementById('<wbr></wbr>visualization'));</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">  geochart.draw(data, {width: 556, height: 347, region: 'US', resolution: 'provinces'});</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">   google.visualization.events.<wbr></wbr>addListener(geochart, "regionClick", function (r) {</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">     for each (k in r) {</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">         alert(k + " = " + r[k]);</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">     }</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">       });</span></font></div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				 </div>
			<div style="padding: 0px; border-width: 0px; border-style: none; margin: 0px; ">
				<font face="monospace"><span style="white-space: nowrap; ">}</span></font></div>
		</div>
	</div>
</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	 </div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	 </div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	Cast chart SVG to a JPEG:</div>
<div style="color: rgb(0, 0, 0); font-family: arial; font-size: small; ">
	<a href="http://blog.davidpadbury.com/2010/10/03/using-nodejs-to-render-js-charts-on-server/" target="_blank">http://blog.davidpadbury.com/<wbr></wbr>2010/10/03/using-nodejs-to-<wbr></wbr>render-js-charts-on-server/</a></div>
</div></div></div>  </div>
</div>
