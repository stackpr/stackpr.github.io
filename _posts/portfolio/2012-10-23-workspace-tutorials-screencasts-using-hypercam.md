---
title: Workspace Tutorials (Screencasts) using HyperCam
layout: post
category: portfolio
tech:
- HyperCam
- CamStudio
- Workspace
- Drupal
- Vimeo
- Any Video Converter
permalink: /portfolio/workspace-tutorials-screencasts-using-hypercam
images:
- video tutorial.png

---
{% include JB/setup %}
<div id="node-243" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>After several attempts, I now have a reasonable workflow for creating good quality screencast tutorials. The right combination of hardware, software and hosting solution took some testing to find. The knowledgebase itself is being built with basic Drupal modules (e.g., book), although there is a thin custom permission layer on top of that to support different types of visibility (both for accessing the page directly and via the sidebar). The video generation took the most time, largely because video is inherently time-consuming to create.</p>
<!--break-->
<h2>
	Sound and Hardware</h2>
<p>Background noise is always difficult to remove from video. To maximize audio quality, I went with a headset (Logitech h390). After some <a href="/blog/2012/10/24/logitech-h390-headset-humfeedback">tweaking</a>, I managed to get extremely clear audio with minimal background noise.</p>
<h2>
	Screencasting Software</h2>
<p>Initially, I planned to use <a href="http://camstudio.org/">CamStudio</a>. Based on reviews and initial tests, it was extremely easy to use and should have filled my needs. However, it fell apart when I recorded an actual screencast because of its <a href="http://camstudio.org/forum/discussion/515/file-creation-error.-unable-to-renamecopy-audio-file/p1">2GB file size limitation</a> that would throw the error "File creation error: unable to rename/copy audio file". Rather than fighting with it, I switched to <a href="http://www.hyperionics.com/hc/">HyperCam</a>. HyperCam appeared to record directly to video rather than combining audio/video in a second step like CamStudio. It was not quite as graceful (e.g., window selection did not work well with Office 2010), but functional and working on clips longer than a few minutes made the switch worthwhile.</p>
<p>However, HyperCam still generated enormous files. A 5:45 clip created a 1.2GB avi file. Sending that to a zip file compressed it down to 300M (compressed to 25%), but uploading the video to any host would be far too time-consuming.</p>
<h2>
	Video Compression</h2>
<p>I have been a long-term fan of <a href="http://www.any-video-converter.com/products/for_video_free/">Any Video Converter</a>, both the free and the ultimate editions. It comes with output profiles that would probably work for most people. To create a better balance between file size and quality, I used this profile:</p>
<ol style=""><li>
		Profile selection: HTML5 MP4 Movie (*.mp4)</li>
	<li>
		Video Codec: x264</li>
	<li>
		Frame Size: 720x480 <em>(this was about a 40% reduction for me)</em></li>
	<li>
		Video Bitrate: 768</li>
	<li>
		Video Framerate: 25</li>
	<li>
		Encode Pass: 1</li>
	<li>
		Audio Codec: aac</li>
	<li>
		Audio Bitrate: 128</li>
	<li>
		Sample Rate: 44100</li>
	<li>
		Audio Channel: 2</li>
	<li>
		Disable Audio: No</li>
	<li>
		A/V Sync: Basic</li>
</ol><p>With those converter settings, the 1.2G avi file compressed down to 20M, a much more reasonable size for upload and distribution.</p>
<h2>
	Hosting the Video</h2>
<p>The compressed video files were then uploaded to our <a href="http://vimeo.com/">Vimeo</a> account. Vimeo allows configurations to prevent embedding the video in other domain names. That technology is imperfect, especially when combined with progressive download, but it provides an appropriate level of security for this type of de-identified video data.</p>
<p>So that was the whole process. Hardware, software, compression and hosting selections. Now, I just need a little more time in the day to build out the full knowledgebase!</p>
</div></div></div>  </div>
</div>
