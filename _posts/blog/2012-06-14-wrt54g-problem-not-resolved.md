---
title: WRT54G Problem (not) Resolved
layout: post
category: blog
tags:
- Networking
- Linux
permalink: /blog/2012/06/14/wrt54g-problem-not-resolved

---
{% include JB/setup %}
<div id="node-135" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>For several months, I experienced problems with my WRT54G Linksys router. This surprised me because I've had a long-term love affair with this router. It is one of very few pieces of hardware that I have actually recommended to friends/family, and most reviews agree (although it did take some hits after Cisco took over). The main symptom was that it would stop giving out IP addresses to DHCP requests after it had been online for some arbitrary amount of time. Generally speaking, we would reset it in the morning and be fine as long as no new devices wanted to connect throughout the day.</p>
<p>Of course, it's a little embarrassing and frustrating to have such lackluster performance. Here are a few of the assumptions and why there were all eventually ruled out:</p>
<ol><li>
		It was initially on a business Internet connection that could have been targeted by automated hack attempts since I previously hosted a few web sites at the external IP address. The router is a consumer router, so it seemed reasonable that it might not be able to handle a hack attempt. This was ruled out when we transitioned to a different Internet provider with no improvement.</li>
	<li>
		At various points in time, I have used some peer-to-peer networks. I know for certain that I have seen routers choke when there are too many inbound requests... This was ruled out after months of avoiding peer-to-peer networks.</li>
	<li>
		The router might have been going out. However, the router was replaced with another of the same model number without resolving the issue.</li>
	<li>
		It could have been overuse of the Internet connection, but the symptoms arise after a period of time -- not after a period of time of active use. This suggests that it results from an automated process -- either an external attack or an internal attempt to communicate outwards (more likely given #1).</li>
	<li>
		etc...</li>
</ol><p>A couple weeks ago, my desktop hard drive went out. I decided to switch my host OS from Kubuntu to Windows 7 (I use VMWare Player). The router problems have mostly gone away. It is hardly conclusive, but there are definitely some strong indications that the Linux desktop (or some problem with it) was part of the problem.</p>
<p><a href="https://www.google.com/#q=ubuntu%20wrt54g%20problems&amp;fp=1">Others might be having the problem too...</a></p>
<p><em><b>Nevermind... Two weeks later, the problems started up again -- so Ubuntu might be off the hook as the primary cause. I have further suspicions about the source of the problem, but nothing has been confirmed yet.</b></em></p>
</div></div></div>  </div>
</div>
