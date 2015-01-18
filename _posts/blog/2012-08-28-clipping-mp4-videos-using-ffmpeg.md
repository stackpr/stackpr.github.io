---
title: Clipping MP4 videos using ffmpeg
layout: post
category: blog
tags:
- ffmpeg
permalink: /blog/2012/08/28/clipping-mp4-videos-using-ffmpeg

---
{% include JB/setup %}
<div id="node-213" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>First, <a href="https://ffmpeg.org/trac/ffmpeg/wiki/UbuntuCompilationGuide">update your libraries</a> to the latest versions outside of the Ubuntu services. If you run the compilations from multiple windows (as I often do), then remember to run ldconfig after you are done so that ffmpeg can load all of the newly compiled modules.</p>
<p><a href="http://www.dzhang.com/blog/2011/12/25/basic-video-manipulation-with-ffmpeg">Basic ffmpeg operations here</a>.</p>
<p>Keep the same quality level: ffmpeg -ss 00:00:00 -t 64 -i test.mp4 -vcodec copy -acodec copy -sameq test_clip.mp4</p>
</div></div></div>  </div>
</div>
