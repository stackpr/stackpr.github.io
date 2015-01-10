---
title: Improved Noise Filter in Linux
layout: post
category: blog
tech:
- Linux
- Audacity
permalink: /blog/2010/08/24/improved-noise-filter-linux

---
{% include JB/setup %}
<div id="node-94" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The basic noise removal left something to be desired, so I worked through documentation to come up with a more thorough cleaning process in Audacity.</p>
<ol><li>Use Analyze &gt; Plot Spectrum to identify any specific whine frequency. The example below was based on an 800 Hz frequency.</li>
    <li>In Effect &gt; Nyquist Prompt, remove the offending frequency: <blockquote> (setf freq 800)<br />
    (setf q .7)<br />
    (if (arrayp s) (vector (notch2 (aref s 0) freq q) (notch2 (aref s 1) freq q)) (notch2 s freq q))<br type="_moz" /></blockquote></li>
    <li>Effect &gt; Leveller, with settings "Moderate" and "-55 dB"</li>
    <li>Effect &gt; Amplify (adjust the volume as necessary)</li>
    <li>Effect &gt; Noise Removal (same process as before)</li>
</ol></div></div></div>  </div>
</div>
