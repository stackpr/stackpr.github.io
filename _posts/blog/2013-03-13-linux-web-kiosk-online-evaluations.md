---
title: Linux Web Kiosk for Online Evaluations
layout: post
category: blog
tech:
- Linux
- Firefox
- Chrome
- Ubuntu
- Lubuntu
permalink: /blog/2013/03/13/linux-web-kiosk-online-evaluations

---
{% include JB/setup %}
<div id="node-256" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>There are quite a few kiosk options out there from appliances to how-to's, largely because any random system administrator should be able to configure a basic Linux installation with some level of security restrictions. The types of security range significantly from read-only disk access to chroots to browser-level security. Minimally, no user data should be retained between sessions, and users should have very limited ability to impact the kiosk's system.</p>
<p>I opted for moderate security provided by a minimal Linux installation (Lubuntu) and restricted system access enforced at the application level. That equates to being entirely locked down for most users. More to come on the exact techniques later. Below are notes from the initial research.</p>
<!--break-->
<h2>
	References for a Lubuntu Solution</h2>
<p>These are some references related to building a Lubuntu solution, ensuring a timeout, dealing with a bug that arose, and creating a new LiveCD for the solution.</p>
<ol><li>
		Install Lubuntu: <a href="http://lubuntu.net/">lubuntu | simplify your computer</a></li>
	<li>
		<a href="http://www.jwz.org/xscreensaver/man3.html">xscreensaver-command manual</a></li>
	<li>
		<a href="http://linux.die.net/man/1/xscreensaver">xscreensaver(1) - Linux man page</a></li>
	<li>
		<a href="https://groups.google.com/a/chromium.org/forum/?fromgroups=#!topic/chromium-bugs/RfvFzIO05Y0">Issue 73035 in chromium: Failed to create ProcessSingleton - Google Groups</a></li>
	<li>
		<a href="http://www.remastersys.com/index.html">Remastersys</a></li>
</ol><h2>
	Ubuntu Kiosk References</h2>
<p>The Ubuntu kiosk options detailed below required some adjustments to work with Lubuntu 12.10 and to keep the system alive and accessible for administrators. However, the references were helpful in terms of getting a jumpstart on the project.</p>
<ol><li>
		<a href="http://calvinsohk.blogspot.com/2011/05/making-ubuntu-1104-as-kiosk-using.html">Calvin So's IT Memo: Making Ubuntu 11.04 as Kiosk using Google Chrome</a></li>
	<li>
		<a href="http://www.instructables.com/id/Setting-Up-Ubuntu-as-a-Kiosk-Web-Appliance/step6/Set-up-Kiosk-Desktop-Mode-in-Xsessions/?images#images">Set up Kiosk Desktop Mode in Xsessions</a></li>
	<li>
		<a href="http://users.telenet.be/mydotcom/howto/linuxkiosk/ubuntu02.htm">Kiosk Linux : Ubuntu with Automatic Setup</a></li>
	<li>
		<a href="https://help.ubuntu.com/community/Installation/MinimalCD">Installation/MinimalCD - Community Ubuntu Documentation</a> and <a href="http://maketecheasier.com/install-a-minimal-ubuntu-on-old-laptop/2012/02/24">How to Install A Minimal (And Non-Bloated) Ubuntu On Your Old Laptop</a></li>
</ol><h2>
	Distro References</h2>
<p>These distros (and software applications) provide kiosks or kiosk-like appliances. Every free option came with some downsides, which are roughly noted below.</p>
<ol><li>
		<a href="http://chromeos.hexxeh.net/">Chromium OS builds by Hexxeh</a> - Limited functionality for forcing guest mode, clearing user session data, etc.</li>
	<li>
		<a href="http://www.binaryemotions.com/webkiosk-os/">Instant WebKiosk/UB: pure Internet browsing</a> - Not intended for hard drive install, lacks key features without donation (i.e., not free)</li>
	<li>
		<a href="http://jacob.steelsmith.org/category/section/ubuntu-kiosk-edition">Ubuntu kiosk edition | Jacob Steelsmith</a> - Looks straightforward but lacks documentation</li>
	<li>
		<a href="http://xpud.org/">xPUD - Shortest Path to the Cloud</a> - Leaves settings visible to users</li>
	<li>
		<a href="http://www.browserlinux.com/">BrowserLinux 501</a> - Lacks documentation and appears abandoned</li>
	<li>
		<a href="http://www.webconverger.com/">Webconverger - opensource Web Kiosk PC operating system</a> - Looks pretty aweful without paying for the subscription services (e.g., cannot save wifi connection info) (i.e., not free)</li>
	<li>
		<a href="http://www.desktoplinux.com/news/NS4984662030.html">Katrina public web kiosk project</a> - Lacks documentation and appears abandoned</li>
	<li>
		<a href="https://wiki.ubuntu.com/kioskFluxbox">kioskFluxbox - Ubuntu Wiki</a> - Instructions are helpful, but it appears abandoned</li>
	<li>
		<a href="http://packages.ubuntu.com/hardy/kiosktool">Ubuntu/KDE kiosktool</a> &amp; <a href="http://extragear.kde.org/apps/kiosktool/">The KDE Extragear - Kiosk Admin Tool</a>- Lacks documentation, although it appears to provide helpful GUIs</li>
</ol></div></div></div><div class="field field-name-field-project field-type-entityreference field-label-above"><div class="field-label">Project:&nbsp;</div><div class="field-items"><div class="field-item even"><a href="/project/witti-kiosk">Witti Kiosk</a></div></div></div>  </div>
</div>
