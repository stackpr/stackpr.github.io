---
title: Dynamic Generation of Photo Map with ImageMagick
layout: post
category: portfolio
tags:
- ImageMagick
- Linux
- PHP
- JSON
position:
- End-to-end
permalink: /portfolio/dynamic-generation-photo-map-imagemagick
images:
- assembled_0.png

---
{% include JB/setup %}
<div id="node-218" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I have completed step one of a hobby project. This image is a prototype that illustrates how the US map can be constructed from custom photos provided by a user. The image was programmatically created by combining a photo of my wonderful daughter and black-and-white state images.</p>
<p>Each black-and-white source image centers the state (in black) on a square canvas with standardized dimensions (4096x4096 for forward compatibility). Black on whiteh forms an image mask, although I used an alternate version to simplify the imagemagick command. The photo is then cropped to a square, and the image mask is applied. Each new square state image is resized and placed onto the US canvas using state-specific coordinates and sizes. Correctly configuring the coordinates and sizes took some time. On future projects, I will demand more during the image mask prep to avoid the reverse engineering. Inaccuracies in the placement were partially overcome by using a halo effect on each state to effectively create borders between the states (borders are slightly more forgiving).</p>
<p>This prototype image did not strategically crop the photo. Instead, it used the same square for each state. You can see in the image how some states have to be resized down more than others (e.g., the TX image is much larger than the OK image right above it).</p>
<p>Lessons learned from the prototype development:</p>
<ol><li>
		I have the appropriate imagemagick code and a better understanding of the syntax in general.</li>
	<li>
		I have a better appreciation of the processing power that will be required to launch this project.</li>
	<li>
		The project is feasible.</li>
	<li>
		The map is in fact pretty cool.</li>
</ol></div></div></div>  </div>
</div>
