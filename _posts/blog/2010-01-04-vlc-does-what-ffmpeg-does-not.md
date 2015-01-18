---
title: VLC does what ffmpeg does not
layout: post
category: blog
tags:
- Linux
- Flash
- VLC
- ffmpeg
permalink: /blog/2010/01/04/vlc-does-what-ffmpeg-does-not

---
{% include JB/setup %}
<div id="node-80" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Just like hundreds of others across the Internet, ffmpeg did not work very well for me. I finally determined that Linux VLC could display a video that none of my Windows players could. Of course, this resulted in the Flash Video Encoder's ultimately failing to convert to Flash Video. I worked with ffmpeg to attempt to convert to an appropriate codec or even just generate the thumbnail. After several failed tutorials and a couple failed GUIs, I reverted back to an application I trust: VLC.</p>
<p>I used VLC to convert to a codec that Flash Encoder could understand. I created a new conversion profile that uses these settings:</p>
<ol><li>Encapsulation: ASF/WMV</li>
    <li>Video Codec: WMV2, Framerate: 15fps</li>
    <li>Audo Codec: WMA2, Mono, Bitrate: 32kbs</li>
</ol><p>I took the resulting .asf file and converted it to .flv using the Flash Video Encoder. This allowed me to visually crop, resize and adjust the timeline of the video. Once the video was in its final size, I used VLC to create the thumbnail, which it refers to as a snapshot.</p>
<p>VLC can convert to FLV, but Flash Video Encoder provided a better interface for cropping and adjusting the timeline. However, as I learn more about VLC, I hope to contain the entire process to a single application. Thanks to Linux VLC for its excellent codec support!</p></div></div></div>  </div>
</div>
