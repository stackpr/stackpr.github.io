---
title: Segmenting the Office Internet Traffic
layout: post
category: blog
tags:
- Windows Server 2008
- Sysadmin
- Networking
- VPN
- Shrew Soft VPN Client
- Cisco
permalink: /blog/2011/08/07/segmenting-office-internet-traffic

---
{% include JB/setup %}
<div id="node-117" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Our office network performs multiple key functions for the organization. Three key functions are staff Internet access, staff file server access, and async email/backup/automation traffic. Based on our usage levels, we have established two separate Internet connections. Email, backup, and other delay-able traffic uses one connection. All other traffic is driven by human action and runs on the other Internet connection/network. We can think of these two networks as MAN and MACHINE. While this may seem to be overkill for a basic QoS problem, the reality is that both networks utilize the entirety of their bandwidth from time to time, and it is important to keep them completely segmented from both a security and a practical perspective.</p>
<p>Servers in the DMZ are connected to both networks, but they specify MACHINE as the default gateway. Computers in the MAN network are effectively oblivious that the MACHINE network even exists.</p>
<h2>
	Annoyance: DSL Bridge Connection for VPN</h2>
<p>To create a VPN on the MAN network, I had to adjust the modem configuration to a bridge connection. Of course, doing this through a terminal server in the DMZ is made that much harder by the lack of established route. We use a SMB router and a Windstream DSL modem. Here are the key steps to follow:</p>
<ol><li>
		Run command prompt as Administrator</li>
	<li>
		Add a route to the modem (route add 192.168.254.254 10.XX.XX.XX)</li>
	<li>
		Reconfigure the modem (<a href="https://windstream.custhelp.com/app/answers/detail/a_id/467/~/bridging-gigaset%2Fsagem-4300-modem">more info</a>)</li>
	<li>
		Add the PPPoE configuration to the router with the DSL user information, which automatically configure the WAN</li>
</ol><p>Once the modem is established as a bridge connection, the router takes over for VPN.</p>
<h2>
	Cisco RV220W Disaster</h2>
<p> </p>
<p>
	<meta content="text/html; charset=utf-8" http-equiv="content-type" /><strong>Problem 1: </strong>QuickVPN is supposed to be extremely straightforward. Unfortunately, Windows 2008 was inaccessible over the VPN due to an ISAKMP packet error. Upgrading the router firmware might have helped, except that the 1.0.1.0 firmware for the RV220W had a PPPoE bug, and so I had to <a href="https://supportforums.cisco.com/docs/DOC-17210" style="color: rgb(108, 66, 14); text-decoration: none; ">downgrade</a> to remain compatible with DSL.</p>
<ul></ul><p> </p>
<p>
	<meta content="text/html; charset=utf-8" http-equiv="content-type" /><strong>Problem 2: </strong>To eliminate the certificate error that pops up every time you try to connect with QickVPN ("Server's certificate doesn't exist on your local computer. Do you want to quite this connection?"), you simply have to save the router's certificate to the connecting computer. This does not solve any other connection problems, but it does let you test that much faster. Here are the two essential references for eliminating that notice:</p>
<ol><li>
		View the certificate in the router admin at <em>Security &gt; Authentication (Certificates)</em>.</li>
	<li>
		Copy the certificate into Notepad and save it at <em>C:\Program Files\Cisco Small Business\QuickVPN Client\RouterCommonName.pem</em>. The RouterCommonName is also visible on the certificate page, if you do not remember what you entered.</li>
	<li>
		Unfortunately, at least on my Vista 32 laptop, eliminating that warning resulted in a terminal error related to wget.exe. That's not quite the progress I was looking for, so that laptop simply lives with the certificate warning.</li>
</ol><ul><li>
		<strong>Problem 3: </strong>The user names configured on the router periodically went bad. A more technical description might be that the user names appeared to become disassociated from their configurations, but the bottom line is that they stopped working. Granted, it happened during a period when I was testing quite a few different options, but some user names were fickle even after minor tasks like a reboot.</li>
	<li>
		<strong>Problem 4: </strong>Even after solving the Windows 2008 problem (described below), I was unable to confirm that it worked because problem 3 popped up again. At that point, I decided to stick with the more flexible ZyXEL router.</li>
</ul><h2>
	ZyXEL ZyWALL 2WG</h2>
<p>I love this router! It comes with a reasonable number of VPN licenses, its pricing is easy to understand, it exposes nearly all of its configurations, and it has capabilities that I never would have considered. There is a <a href="http://www.shrew.net/support/wiki/HowtoZywall">straightforward guide</a> for configuring ShrewSoft VPN to work with the router. The only downside that I have seen with the router at this point is that the VPN client IPs have to be static -- and I did not actually test to confirm that particular problem still existed in the latest firmware.</p>
<h2>
	The Glorious ISAKMP Problem</h2>
<p>The vague error message that sent me down all sorts of roads was <em>the length in the isakmp header is too big</em>. Search for that error, and you will find quite a few people having the problem, and not many of them finding a solution. I'll skip to the punchline to avoid revisiting all the bad memories... That error sometimes just means that the packet is being dropped or denied.</p>
<p>VPN packets route differently, although the expose the same network. I could connect to the VPN and ping all of the IPs in the network except one. That one computer had multiple NICs. While the routes implied by the subnet on the secondary NIC were sufficient for it to function properly with all computers on the LAN, the VPN packets were basically getting dropped until I added explicit routes to the route table on that computer. The explicit routes were for the LAN and the VPN IP ranges. Neither route seemed to affect the behavior of the server relating to the LAN, but it immediately cleared up the VPN-&gt;server connection problem.</p>
</div></div></div>  </div>
</div>
