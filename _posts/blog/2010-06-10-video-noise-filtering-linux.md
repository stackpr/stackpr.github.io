---
title: Video Noise Filtering in Linux
layout: post
category: blog
tech:
- Linux
- Audacity
- Kino
- video
permalink: /blog/2010/06/10/video-noise-filtering-linux

---
{% include JB/setup %}
<div id="node-92" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p><em>Audacity</em> is the program that can remove noise. However, you need an audio file (not a video file) to work with. The Kino steps can be accomplished using ffmpeg, but they have been done using Kino here since that is how I perform basic clip editing.</p>
<!--break-->
<p>Step 1: Extract audio (easy)</p>
<ol><li>This must be done on per-part to avoid extra complexities, so it should always be the first thing you do</li>
    <li>Open Kino project and export to a WAV using the Audio tab</li>
</ol><p>Step 2: Filter noise (takes some patience)</p>
<ol><li>Open audio in Audacity</li>
    <li>Select a segment of white noise</li>
    <li>Go to Effect &gt; Noise Removal, select "Get Noise Profile"</li>
    <li>Select entire track</li>
    <li>Go to Effect &gt; Noise Removal, adjust the step 2 settings, and click "OK"</li>
    <li>Export to a new WAV file</li>
</ol><p>Step 3: Add filtered audio back to video</p>
<ol><li>Open Kino project</li>
    <li>Select storyboard item that will get the new audio</li>
    <li>Go to FX tab</li>
    <li>Leave "Overwrite" tab active with the full time selected</li>
    <li>Use Audio Filter "Mix", select audio file</li>
    <li>Change graph in audio filter so line is at the top (maxed)</li>
    <li>Change "Audio Transition" to "No change"</li>
    <li>Click "Render"</li>
</ol><p>That's it. The audio track for the video is now updated with reduced noise. </p></div></div></div>  </div>
</div>
