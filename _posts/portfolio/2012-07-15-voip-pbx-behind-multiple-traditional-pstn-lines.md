---
title: VoIP PBX Behind Multiple Traditional PSTN Lines
layout: post
category: portfolio
tech:
- VoIP
- SIP
- SPA8800
- Axon Virtual PBX
- Polycom SoundPoint IP 550
- Icewarp
position:
- End-to-end
- System Administrator
permalink: /portfolio/voip-pbx-behind-multiple-traditional-pstn-lines

---
{% include JB/setup %}
<div id="node-163" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Our old phone system was not working well. No one could leave messages. Two vendor attempts to fix the phone system had failed. Frequent conference calls were tying up the one phone line. It was time to upgrade our phone system and add a second line. Outbound calls and conference calls no longer tie up the main line, and the phone system is modern and sufficiently documented that we can maintain it ourselves.</p>
<h2>
	Infrastructure Summary and Justifications</h2>
<ol><li>
		The office has 2 basic PSTN lines with failover to voicemail but without rollover. If two people dial the office using the same number, then the second person will go straight to voicemail. However, if they dial different numbers, then they can both get through to the office. Rollover is not used because of the added expense (charged by provider) given the low frequency of its being necessary.</li>
	<li>
		We are using the <a href="http://www.cisco.com/en/US/products/ps10446/index.html">Cisco SPA8800 IP Telephony Gateway</a> as an FXO gateway to convert between PSTN and VoIP/SIP.</li>
	<li>
		We are using <a href="http://www.nch.com.au/pbx/index.html">Axon Virtual PBX</a> by NCH Software for call routing.</li>
	<li>
		We are using <a href="http://www.polycom.com/products/voice/desktop_solutions/soundpoint/desk_phones/soundpoint_ip550.html">Polycom SoundPoint IP 550</a> phones, which receive high praise in most reviews online.</li>
</ol><h3>
	Why PSTN?</h3>
<p>We are using basic PSTN lines for several reasons:</p>
<ul><li>
		Primary reason: using PSTN addresses basic QoS issues since calls do not compete for bandwidth (and we use significant amounts of bandwidth).</li>
	<li>
		We already had a long-term bundle contract.</li>
	<li>
		Various past experiences with local support and the underlying technologies made us averse to relying 100% on VoIP outside of our local network.</li>
</ul><h3>
	Why SPA8800?</h3>
<p>The SPA8800 has 4 FXO ports. During the research phase, we found relatively few gateway devices that would support multiple PSTN lines. We considered multiple single-line devices but this met our price point as an SMB while keeping us at a single device -- even if we add another line later. We also considered internal modems for the server, but limited PCI slots and future driver compatibility issues made that option less compelling for us since the PBX is running on a server used for other purposes as well.</p>
<h3>
	Why Axon PBX?</h3>
<p>This was not actually our first choice. I have had experience with Asterisk before but was looking for more of a Windows GUI-based PBX. We were willing to pay a reasonable amount to have something that just worked, that I could walk a coworker through troubleshooting in a pinch, and that was designed to natively run on Windows (rather than supporting a ported version or a dedicated box). In retrospect, looking for a solid Asterisk build might have been a better route.</p>
<p>At first, we attempted to use the <a href="http://www.icewarp.com/products/sip_voip_server/">IceWarp VoIP</a> system. We have had great luck with their email and mailing list server, and we wanted to use their VoIP to take advantage of unified communications. Unfortunately, it did not work with our infrastructure out of the box, and they did not expose enough configurations or debug information for me to get everything working. After spending days working on that, I tried Axon PBX and had inbound calls working within two hours.</p>
<h2>
	More Information</h2>
<p>Many of the specific challenges will be documented in blog posts. To find them quickly, click the corresponding <em>Technologies</em> tag link below.</p>
</div></div></div>  </div>
</div>
