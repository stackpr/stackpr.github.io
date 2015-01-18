---
title: Axon Issues with Multiple-FXO Adapter (SPA8800)
layout: post
category: blog
tags:
- VoIP
- SPA8800
- Axon Virtual PBX
permalink: /blog/2012/09/18/axon-issues-multiple-fxo-adapter-spa8800

---
{% include JB/setup %}
<div id="node-229" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The last lingering issue with the phone system has been difficult to troubleshoot due to its infrequency. We have 2 PSTN lines that route through 1 SPA8800 to our Axon server. About half of the time when both lines are in use, the first call gets transferred to the second caller's phone. I believe this is being caused by the phone system's inadequate random assignment of port numbers for RTP streams. My guess is that streams are colliding.</p>
<!--break-->
<p>I have attempted to resolve this by adding a second IP to the Windows NIC so that the lines can access Axon on different IP addresses. Unfortunately, that will only have an impact when the second line is being used by an inbound call. The secondary attempt to address the problem is to check the "Prevent Odd RTP Ports Being Forwarded" setting on the external lines.</p>
<p>Alternate all-in-one options that I've been considering (all I could find within our price range):</p>
<ul><li>
		Cisco UC320W - eliminated because we use Polycom phones</li>
	<li>
		<a href="http://www.voiplink.com/trixbox_Appliance_s/256.htm">trixbox Appliance</a> (priced a little high)</li>
	<li>
		<a href="http://store.phoniceq.com/product_info.php?products_id=200">PhonicEQ Inc - Voice Cards for Asterisk PBX</a> (atcom)</li>
	<li>
		<a href="http://www.linksoft.com.hk/soLinkLite.htm">SoLink Lite IP-PBX : Asterisk-Based IP-PBX Appliance</a></li>
	<li>
		<a href="http://www.voip-info.org/wiki/view/Positron+Telecommunnication+Systems+Inc.">Positron Telecommunnication Systems Inc. - voip-info.org</a> - this one is cool!</li>
	<li>
		<a href="http://www.grandstream.com/index.php/products/ip-voice-telephony/ip-pbx-solutions/gxe502x">Grandstream Networks, Inc :: GXE502X</a> - good balance of price, features and professionalism</li>
</ul><p>Likely next step: <a href="http://www.asteriskwin32.com/">AsteriskWin32 - The Open Source PBX for Windows</a></p>
<p>Update: These low-cost optioners were ultimately rejected in favor of a Shorewall system. It drove the price up somewhat, but it came with the added benefits of an improved speakerphone and a vendor who can provide support.</p>
</div></div></div>  </div>
</div>
