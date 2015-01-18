---
title: Witti Visualization
layout: post
category: project
tags:
- JS
- Google Visualization API
permalink: /project/witti-visualization

---
{% include JB/setup %}
<div id="node-236" class="node node-project node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Witti Visualization is an HTML5 wrapper to Google Visualizations to avoid dealing with any JavaScript directly. Instead, simply add the appropriate &lt;script&gt; tag and then add HTML5 data attributes to the page. <a href="/project/witti-visualization/posts">Browse related posts and examp​les.</a></p>
<!--break-->
<h2>
	Including the JavaScript File</h2>
<p><a href="https://github.com/wittiws/visualization"><img alt="Fork me on GitHub" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" style="position: absolute; top: 0; right: 0; border: 0;" /></a>Link directly to a hosted version of the script:</p>
<ol><li>
		Use the Witti CDN: <a href="http://l.wcdn.ws/lib/visualization/visualization.min.js">http://l.wcdn.ws/lib/visualization/visualization.min.js</a></li>
	<li>
		Use directly from Github: <a href="https://raw.github.com/wittiws/visualization/master/visualization.min.js">https://raw.github.com/wittiws/visualization/master/visualization.min.js</a></li>
</ol><p>Download the file to your server:</p>
<ol><li>
		Use either link above</li>
	<li>
		Access from Github: <a href="https://github.com/wittiws/visualization">https://github.com/wittiws/visualization</a></li>
</ol><h2>
	Include the HTML5 Data Attributes</h2>
<p>The following configurations are for Witti Visualization:</p>
<table border="1" cellpadding="1" cellspacing="1" style="width: 100%;"><thead><tr><th scope="col">
				Name</th>
			<th scope="col">
				Default</th>
			<th scope="col">
				Description</th>
		</tr></thead><tbody><tr><td>
				data-gv-image="[true|print]"</td>
			<td>
				""</td>
			<td>
				Convert the chart to an image client-side for easier copy-paste. If set to "true", then the image is created at web resolution. If set to "print", then the image is created at 4x web resolution.</td>
		</tr><tr><td>
				data-gv-datatable="[HTML ID]"</td>
			<td>
				N/A</td>
			<td>
				The ID of the HTML table that contains the data. This is unnecessary if the table is inside the chart &lt;div&gt;.</td>
		</tr><tr><td>
				data-gv-datatablehide="1"</td>
			<td>
				"0"</td>
			<td>
				Hide the HTML table that contains the data. This only applies to tables outside of the chart &lt;div&gt;.</td>
		</tr><tr><td>
				data-gv-datatablerotate="1"</td>
			<td>
				"0"</td>
			<td>
				Rotate the data from the HTML table so that the series exist in rows rather than columns.</td>
		</tr></tbody></table><p>The JavaScript converts all other data-gv-VARNAME attributes to Google Visualization option parameters.</p>
</div></div></div>  </div>
</div>
