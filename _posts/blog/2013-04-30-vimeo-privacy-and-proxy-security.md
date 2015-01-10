---
title: Vimeo Privacy and Proxy Security
layout: post
category: blog
tech:
- Vimeo
permalink: /blog/2013/04/30/vimeo-privacy-and-proxy-security

---
{% include JB/setup %}
<div id="node-279" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Vimeo's domain-based privacy settings restrict the ability to embed a video to a specific set of domain names. It worked perfectly for quite a few months until we ran into a very strict security setup. Someone using Ironport as identified by the HTTP_VIA header was unable to watch the private Vimeo video embedded within our web site.</p>
<!--break-->
<p>The HTTP_VIA header was: 1.1 sphsprox.seph.local:80 (Cisco-IronPort-WSA/7.5.0-833)</p>
<p>The use of the proxy appears to confuse the context of the video, which triggers a false negative regarding the validity of the embed. I rarely feel the need to worry about such setups since they implicitly decided to sacrifice access to some content. However, I did provide an alternate download link (not embedded) so that the content is still accessible. Of course, such a low-level workaround is only possible because of the specific type of video content we were providing.</p>
</div></div></div>  </div>
</div>
