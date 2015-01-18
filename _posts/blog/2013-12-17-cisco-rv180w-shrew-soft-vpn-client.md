---
title: Cisco RV180W with Shrew Soft VPN Client
layout: post
category: blog
tags:
- Networking
- Cisco
- RV180W
- VPN
- Shrew Soft VPN Client
permalink: /blog/2013/12/17/cisco-rv180w-shrew-soft-vpn-client

---
{% include JB/setup %}
<div id="node-306" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>We spent the last couple years using the <a href="http://www.admin.witti.ws/blog/2011/08/07/segmenting-office-internet-traffic">ZyXEL ZyWALL 2WG</a> after encountering major compatibility and configuration challenges with a Cisco RV220W. Although Cisco is very slow to update its firmware and clients (sometimes giving the impression of being abandonware), two years was enough time for there to be some changes. The QuickVPN client now works on Windows 7 64-bit (<a href="http://community.linksys.com/t5/Wired-Routers/Quick-VPN-and-Windows-7-64-bit/td-p/305048">that was a known issue</a>), and firmware has been updated. Given the changes, we decided to try out the <a href="http://www.amazon.com/gp/product/B007RB1LQM/ref=as_li_ss_tl?ie=UTF8&amp;camp=1789&amp;creative=390957&amp;creativeASIN=B007RB1LQM&amp;linkCode=as2&amp;tag=witti02-20">CISCO SYSTEMS RV180W-A-K9-NA Wireless N VPN Router</a>.</p>
<!--break-->
<h2>
	Why the RV180W?</h2>
<p>The ZyWALL needed to be replaced. Although it "generally worked," wireless connections would be dropped regularly and require a reconnect, multiple users could not VPN from a single remote location, and one of our staff had frequent VPN connection problems. Inconsistent issues are some of the hardest to troubleshoot, and having three of them simply meant that the router was no longer an ideal solution for our office.</p>
<p>Because all SMB VPN are cheap, and this appeared to have a 50/50 chance of working. <a href="http://www.amazon.com/gp/product/B007RB1LQM/ref=as_li_ss_tl?ie=UTF8&amp;camp=1789&amp;creative=390957&amp;creativeASIN=B007RB1LQM&amp;linkCode=as2&amp;tag=witti02-20">Amazon reviews</a> showed it at 2.5 stars when we purchased (<a href="http://www.amazon.com/gp/product/B007RLFM7G/ref=as_li_ss_tl?ie=UTF8&amp;camp=1789&amp;creative=390957&amp;creativeASIN=B007RLFM7G&amp;linkCode=as2&amp;tag=witti02-20">non-wireless version</a> is rated higher). <a href="http://www.amazon.com/gp/product/B000B5LQCA/ref=as_li_ss_tl?ie=UTF8&amp;camp=1789&amp;creative=390957&amp;creativeASIN=B000B5LQCA&amp;linkCode=as2&amp;tag=witti02-20">Netgear small business</a> is also stuck at 3 stars, and even the <a href="http://www.amazon.com/gp/product/B007VPKM5K/ref=as_li_ss_tl?ie=UTF8&amp;camp=1789&amp;creative=390957&amp;creativeASIN=B007VPKM5K&amp;linkCode=as2&amp;tag=witti02-20">low-end Sonicwalls</a> get panned. In my research, it appeared that anything under $500 is really hit-or-miss, and the ratings were only high on products when there were not many reviews (i.e., the misses had not been reported yet). That might be cynical, but it did not seem like there was any amazing solution in the SMB space. If there were, one of the giants would probably gobble it up, repackage it, and charge more. So I went into this configuration knowing that half of the people who did the same thing wanted to throw the router away afterwards. Fortunately, the specs look pretty good and should theoretically support our small office (<a href="http://www.cisco.com/c/en/us/products/collateral/routers/rv180w-wireless-n-multifunction-vpn-router/c78-697399_data_sheet.html">datasheet</a>).</p>
<h2>
	The Challenges</h2>
<p>As with the previous VPN installations, there were some bumps in the road.</p>
<ol><li>
		Pre-firmware upgrade problems: Before upgrading the firmware, problems included inability to access remote network after successful QuickVPN connection, a "certificate cannot be found" error with QuickVPN, and an inability to get standard IPSEC tunnels to connect using third-party client software.</li>
	<li>
		<a href="http://supportforums.cisco.com/thread/2231005">Firmware upgrade problem</a>: Upgrading the firmware with a configuration in place broke the interface. Eventually, with some grumbling, I reset it to factory settings and manually configured it. The interface was fine after the settings were reentered.</li>
	<li>
		QuickVPN tweaks: Upgrading the firmware and manually entering the configuration from scratch resolved the challenges I had with QuickVPN, so I would strongly encourage you to go that route.</li>
	<li>
		<a href="https://supportforums.cisco.com/sites/default/files/legacy/9/4/1/20149-shrewsoft_final.pdf#viewer.action=download">Existing Shrew Soft tutorial failed</a>: This tutorial was designed for the SA 500, and the differences (or the updates to Shrew Soft) made it inadequate for configuring the RV180W. However, the configuration described below came from a merger of this tutorial with our current ZyWALL configuration.</li>
</ol><h2>
	Rejecting QuickVPN</h2>
<p>QuickVPN connected easily with the updated router firmware. However, it is a black box solution with no configuration options. It was able to access the remote network except for one key system that had two network cards (i.e., to provide connectivity fail-over). Due to the way that QuickVPN handled the client IP address (it appeared to pass through the remote LAN's IP address), our dual-network device was unable to route packets back to the client. Because of the importance of that network resource and the lack of access to QuickVPN configurations, we quickly turned to a more direct IPSEC VPN option, which is outlined below.</p>
<h2>
	ShrewSoft Configuration</h2>
<p>The following is the (redacted) vpn configuration file we used. Note that there are several settings that need to be changed for your environment: the domain name, the manual IP address, the pre-shared key (from the "Authentication &gt; Credentials" tab), and the remote network topology (from the "Policy" tab).</p>
<pre class="brush:bash">
n:version:4
n:network-ike-port:500
n:network-mtu-size:1380
n:client-addr-auto:0
n:network-natt-port:4500
n:network-natt-rate:15
n:network-frag-size:540
n:network-dpd-enable:0
n:client-banner-enable:0
n:network-notify-enable:1
n:client-dns-used:0
n:client-dns-auto:0
n:client-dns-suffix-auto:0
n:client-splitdns-used:0
n:client-splitdns-auto:0
n:client-wins-used:0
n:client-wins-auto:1
n:phase1-dhgroup:2
n:phase1-life-secs:86400
n:phase1-life-kbytes:0
n:vendor-chkpt-enable:0
n:phase2-life-secs:3600
n:phase2-life-kbytes:0
n:policy-nailed:0
n:policy-list-auto:0
n:phase1-keylen:128
n:phase2-keylen:128
s:network-host:vpn.example.com
s:client-auto-mode:disabled
s:client-iface:virtual
s:client-ip-addr:10.2.1.13
s:client-ip-mask:255.255.255.0
s:network-natt-mode:enable
s:network-frag-mode:enable
s:auth-method:mutual-psk-xauth
s:ident-client-type:fqdn
s:ident-server-type:fqdn
s:ident-client-data:remote.com
s:ident-server-data:local.com
s:phase1-exchange:aggressive
s:phase1-cipher:aes
s:phase1-hash:sha1
s:phase2-transform:esp-aes
s:phase2-hmac:sha1
s:ipcomp-transform:disabled
n:phase2-pfsgroup:0
s:policy-level:auto
s:policy-list-include:10.1.0.0 / 255.255.0.0</pre>
<h2>
	Cisco RV180W Configuration</h2>
<p>The router obviously needs to have a matching configuration. Go through a Basic VPN Setup, and then you can edit the settings to match the ShrewSoft configuration above.</p>
<h3>
	IKE Policy Configuration</h3>
<ol><li>
		Direction: Responder</li>
	<li>
		Exchange Mode: Aggressive</li>
	<li>
		Local
		<ol><li>
				Identifier Type: FQDN</li>
			<li>
				Identifier: local.com</li>
		</ol></li>
	<li>
		Remote
		<ol><li>
				Identifier Type: FQDN</li>
			<li>
				Identifier: remote.com</li>
		</ol></li>
	<li>
		IKE SA Parameters
		<ol><li>
				Encryption Algorithm: AES-128</li>
			<li>
				Authentication Algorithm: SHA-1</li>
			<li>
				Authentication Method: Pre-Shared Key</li>
			<li>
				Pre-Shared Key: **** (match whatever you use in ShrewSoft)</li>
			<li>
				Diffie-Hellman (DH) Group: Group2 (1024 bit)</li>
			<li>
				SA-Lifetime Seconds: 28800</li>
			<li>
				Dead Peer Detection: Enable</li>
			<li>
				Detection Period: 10</li>
			<li>
				Reconnect after Failure Count: 3</li>
		</ol></li>
	<li>
		Extended Authentication
		<ol><li>
				XAUTH Type: Edge Device</li>
			<li>
				Authentication Type: User Database</li>
		</ol></li>
</ol><h3>
	VPN Policy Configuration</h3>
<ol><li>
		Policy Type: Auto Policy</li>
	<li>
		Remote Endpoint: FQDN, remote.com</li>
	<li>
		Local Traffic Selection (may be different for your environment)
		<ol><li>
				Local IP: Subnet</li>
			<li>
				Start Address: 10.1.1.0</li>
			<li>
				Subnet Mask: 255.0.0.0</li>
		</ol></li>
	<li>
		Remote Traffic Selection
		<ol><li>
				Remote IP: Any</li>
		</ol></li>
	<li>
		Split DNS: Disable</li>
	<li>
		Auto Policy Parameters
		<ol><li>
				SA-Lifetime: 28800 seconds</li>
			<li>
				Encryption Algorithm: AES-128</li>
			<li>
				Integrity Algorithm: SHA-1</li>
			<li>
				PFS Key Group: Enable, DH-Group2 (1024 bit)</li>
			<li>
				Select IKE Policy: **** (name of IKE policy you just configured)</li>
		</ol></li>
</ol><h3>
	VPN Users</h3>
<p>The above configuration references using the User Database. To configure the user database, click on the "VPN Users" link in the left navigation. When adding a user, assign them to the XAUTH protocol and enable them.</p>
<h2>
	Final Steps</h2>
<p>Adjust the .vpn file for each user so that they get their own IP address. The .vpn file can contain your Pre-Shared Key and all other information except for the user name and password. You can write a simple script to auto-generate the per-user .vpn files to manage the IP assignment, or you can adjust the instructions above to use DHCP. In either case, the client setup is quick and easy once you align the settings between the RV180W and the ShrewSoft VPN Client.</p>
</div></div></div>  </div>
</div>
