---
title: Calls Randomly Transferred to Voicemail on SPA8800 with Axon
layout: post
category: blog
tech:
- SPA8800
- VoIP
- SIP
- Axon Virtual PBX
permalink: /blog/2012/08/01/calls-randomly-transferred-voicemail-spa8800-axon

---
{% include JB/setup %}
<div id="node-183" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The minor change below has been reflected in the <a href="http://witti.ws/blog/2012/07/17/cisco-spa8800-axon-virtual-pbx-polycom-soundpoint-ip-550">setup post</a>. Randomly during a few different calls, participants would hear the phone ring before the call was transferred to voicemail. Of course, with the call in the vm system, the staff member is disconnected in the process (although the vm transfer is a big problem on its own).</p>
<p>This happened several times before the logs highlighted a possible cause, in part because debug levels had been reduced to avoid unnecessary network traffic. The key SIP operation was that the SPA8800 Line 1 was re-registering with the IVR. That apparently interrupted the call that was being routed such that it reinvited (SIP command INVITE) the IVR to the call. Since we've configured our phones to only accept 1 call (to avoid call waiting beeps), the IVR kicks the refreshed call into vm. The call would not drop after every REGISTER, but it only dropped after a REGISTER.</p>
<p>I was thoroughly convinced that the problem would have to be solved by the SPA8800 since it was registering and it was issuing the new INVITE. Dozens of different configurations failed to have any impact on the problem, and nothing in Axon lined up with the problem. I was reviewing yet another marginally relevant configuration document when an assumption came to light.</p>
<ol><li>
		Axon's <a href="http://www.altoedge.com/setup/fxo.html">recommended configurations</a> for FXO adapters included a 60-second registration expiration.</li>
	<li>
		Axon has a setting:<br /><em>Advanced Line Settings &gt; SIP Compatibility Options &gt; Disable call activity polling (only use if call breaks after 60 seconds)</em></li>
	<li>
		It dawned on me that the 60 seconds referenced in the compatibility option might have been contingent upon using their recommended registration expiration.</li>
</ol><p>Once I considered that the Axon interface's parenthetical might just be inaccurate (at least given our 3600 second expiration), it only took me a few seconds to check that box and resolve the problem.</p>
</div></div></div>  </div>
</div>
