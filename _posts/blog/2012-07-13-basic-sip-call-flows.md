---
title: Basic SIP Call Flows
layout: post
category: blog
tech:
- VoIP
- SIP
permalink: /blog/2012/07/13/basic-sip-call-flows

---
{% include JB/setup %}
<div id="node-167" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Before starting work on a VoIP system, I would strongly recommend that you familiarize yourself with basic SIP call flows. <a href="http://www.rfc-editor.org/bcp/bcp75.txt">I found that BCP 75 provided very helpful basic call flow examples.</a> The number of SIP calls is significant enough that you can easily overlook the fact that packets are missing, if you are not familiar with the entire handshake process.</p>
<p>The first example that you run into is the registration process. It is representative of the entire protocol, and it is the first step that you take when setting up a new phone system. However, the registration process is different than most other web services out there, in large part because it was built to be compatible with UDP. See the link above for the actual syntax, but here are the basic steps that phone X takes to register with server Y:</p>
<ol><li>
		X asks Y, "Can I register?" (REGISTER)</li>
	<li>
		Y responds, "No, you are unauthorized." (UNAUTHORIZED)</li>
	<li>
		X asks Y, "Can I register with this user name and password?" (REGISTER with WWW-AUTHENTICATE header)</li>
	<li>
		Y responds, "Yes, you are now registered." (OK)</li>
</ol><p>I mentioned UDP above, and it seems quite central to the design even if TCP is being used in your setup. The key resulting principle is that you are transmitting packets - not requests, which results in a distinctly asynchronous setup. Thus, in the colloquial description above, Y is not responding to X in the sense of how a web service responds to a request. Instead, Y is sending a message to X that happens to be related to the message that X had sent to Y.</p>
<p>One interesting aspect of this particular example is that the UNAUTHORIZED message will still appear on a perfectly configured healthy system. Thus, if you are having problems registering, the unauthorized message is only a problem when found in conjunction with the WWW-Authenticate header.</p>
<p>The BCP covers other processes, including call initiation (INVITE) through a proxy. There are even more steps there, but it is all quite coherent when considered in the context of the async UDP programming. Until you are aware of the SIP call flow, it is extremely difficult to determine which pieces of a system are causing problems.</p>
</div></div></div>  </div>
</div>
