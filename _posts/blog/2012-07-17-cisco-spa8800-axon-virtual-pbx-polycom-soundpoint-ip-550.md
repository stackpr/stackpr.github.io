---
title: Cisco SPA8800 + Axon Virtual PBX + Polycom SoundPoint IP 550
layout: post
category: blog
tags:
- VoIP
- Axon Virtual PBX
- Polycom SoundPoint IP 550
- SPA8800
permalink: /blog/2012/07/17/cisco-spa8800-axon-virtual-pbx-polycom-soundpoint-ip-550

---
{% include JB/setup %}
<div id="node-164" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I already described <a href="/portfolio/voip-pbx-behind-multiple-traditional-pstn-lines">the general setup</a> that was being configured. The process of configuring these three systems to work together took quite a bit of time and referencing hundreds of blog and support pages. It was not until everything was working that I knew which steps were helpful, and the tabs have long-since been closed. Thus, I am going to attempt to capture the important steps for the next person. The final product was that an inbound call would follow this route: PSTN =&gt; SPA8800 =&gt; Axon =&gt; IP550.</p>
<h2>
	Overview of the Experience</h2>
<p>I started this configuration process having already given up on one PBX (Icewarp) due to lack of relevant documentation. Although Axon was notably better, there was still a lot left to be desired. As I learned through this process, part of the blame falls on Cisco's inconsistent configuration strategies. I found <a href="http://nch.invisionzone.com/index.php?showtopic=5091">Axon+SPA3000 instructions</a> and <a href="https://supportforums.cisco.com/docs/DOC-9899">Asterisk+SPA8800 instructions</a> (and <a href="https://communities.cisco.com/thread/5220">here </a>and a few other places), but nothing that pulled together what I needed.</p>
<p>Setting up an extension so that the phone could register with Axon was very intuitive. Inbound calls were initially dropped with the error "<strong>Rejected incoming call - could not find a VoIP line to use for call bridging.</strong>" That error was created because Axon (1) does not do any intuitive header rewriting, and (2) requires one valid local end-point for a call. An inbound call would attempt to use the external line for one endpoint and the Axon system (the FXS on SPA8800) itself for the other. Without basic rewriting, that translated into 0 local end-points for a call. Similar endpoint problems came from outbound calls.</p>
<p>Axon is optimized to work with a Gateway Server (a reasonable decision on their part), but SPA8800 does not work as a gateway server. It initiates registration -- it cannot be registered with. That was a key distinction that came as a surprise. If it is possible for SPA8800 to be the server, I did not see any documentation to that extent during the project. Axon's interface suggests that everything should be plug-and-play if the SPA8800 registers as an external line, but the lack of header rewriting made that an impossibility -- perhaps other devices would have allowed more header customization such that it would have worked more easily.</p>
<p>For Axon to handle the SIP that SPA880 threw at it, we needed:</p>
<ol><li>
		SPA8800 Line 1 to register with Axon as an external line for outbound calls</li>
	<li>
		SPA8800 Line 1 to route calls to its own registration account on Axon for inbound calls</li>
	<li>
		Caller IDs to be mangled in a predictable way so that each system could appropriately route them</li>
</ol><h2>
	Key Settings</h2>
<ol><li>
		SPA8800 Line 1 to register as an external line for outbound calls
		<ol><li>
				In <strong>Axon</strong>, go to <strong>External Dialing</strong>, <strong>Add New External Line</strong>, and configure <strong>Device Login/Password*</strong> with a user name of line1 (change references to "line1" below if you use something different).</li>
			<li>
				Click <strong>Advanced Line Settings</strong> for the external line. Check "Disable call activity polling" and <strong>Save Changes</strong>.</li>
			<li>
				In <strong>SPA8800</strong>, go to <strong>Advanced</strong> (top-right), <strong>Line 1</strong>, and configure <strong>Subscriber Information*</strong> to match the Axon device info. Additionally, set:
				<ol><li>
						Proxy: IP_OF_AXON:PORT_OF_AXON</li>
					<li>
						Register: yes</li>
					<li>
						Make calls without reg: yes</li>
					<li>
						Ans calls without reg: yes</li>
					<li>
						Dial Plan 1: ([2-9]xxxxxxxxx|[0-1][2-9]xxxxxxxxx|&lt;line[1-2]-:&gt;[2-9]xxxxxxxxx|&lt;line[1-2]-:&gt;[0-1][2-9]xxxxxxxxx)</li>
					<li>
						Dial Plan 8: (&lt;:line1@IP_OF_AXON&gt;S0)</li>
					<li>
						PSTN CID For VoIP CID: Yes</li>
					<li>
						PSTN Caller Default DP: 8</li>
					<li>
						PSTN CID Number Prefix: line1-</li>
					<li>
						PSTN Ring Timeout: 3 (only if you do not need caller ID)</li>
				</ol></li>
		</ol></li>
	<li>
		SPA8800 Line 1 to unspoof when returning a call
		<ol><li>
				See the dial plan from the setup above. It removes the "line1-" prefix.</li>
		</ol></li>
	<li>
		Avoid IP550 rewriting
		<ol><li>
				Add reg.1.thirdPartyName="EXTENSION_ID@IP_OF_AXON" to the phone configuration. This provides a complete SIP address to any third-party devices so that all calls are routed through Axon. This was added early in the process, and we did not confirm whether it could be safely removed. </li>
		</ol></li>
</ol><p>* In each of these cases, I configured the authID to be the same as the uid. That should be unnecessary, but it eliminated any potential confusion - and it works smoothly.</p>
<p>To summarize, you have configured 1 login within Axon and 1 line within SPA8800.</p>
<p>Inbound routing: A PSTN call hits SPA8800, which initiates a SIP from line1-[EXT_CID] to the line1 External Line account on Axon. That call is sent to Axon for handling because of the SPA8800 Line 1 dialplan. Axon uses line1 as one endpoint and the "Incoming Calls Ring on Extension or Group" selection as the other endpoint.</p>
<p>Outbound routing: The line1 external line registration can be used in an External Dialing - Dialing Plan.</p>
<h2>
	Backing Up Settings</h2>
<ol><li>
		How to backup SPA8800: <a href="https://communities.cisco.com/thread/4152">Not easy.</a></li>
	<li>
		How to backup Axon: GUI &gt; Options &gt; Save Settings Backup</li>
	<li>
		How to backup Polycom: Just backup the configuration directory</li>
</ol></div></div></div>  </div>
</div>
