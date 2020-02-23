---
title: Witti Kiosk
layout: post
category: blog
tags:
- PHP
- Linux
- Ubuntu
- Lubuntu
- Chrome
permalink: /project/witti-kiosk

---
{% include JB/setup %}
<div id="node-257" class="node node-project node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The witti kiosk only allows access to a web browser. When the web browser is closed (or after 10 minutes of inactivity), all activity records are deleted and the browser is relaunched. This allows kiosk users to safely access password-protected resources since their passwords, cookies and history are all deleted immediately from the kiosk.</p>
<!--break-->
<p><a href="https://github.com/wittiws/kiosk"><img alt="Fork me on GitHub" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" style="position: absolute; top: 0; right: 0; border: 0;" /></a>This kiosk management script allows centralized automated administration of kiosks based on Lubuntu. <a href="/project/witti-kiosk/posts">Browse posts related to the witti kiosk system.</a></p>
<h2>
	Installation: Evaluation Method</h2>
<p>The following method should work fine for evaluation. However, it relies on the security of the witti servers. While we do our best, you should strongly consider the full installation method to take charge of your own security and simplify your administration.</p>
<ol><li>
		<a href="http://cdimage.ubuntu.com/lubuntu/releases/12.10/release/lubuntu-12.10-desktop-i386.iso">Download Lubuntu 12.10 32-bit version</a> (or use the <a href="http://cdimages.ubuntu.com/lubuntu/releases/quantal/release/lubuntu-12.10-desktop-i386.iso.torrent">torrent</a>)</li>
	<li>
		Install the standard Lubuntu system. Do NOT select autologin when creating your initial user. Remember your user name and password (they do not matter for the kiosk itself). Your user name should NOT be "kiosk" since that will be used by the kiosk script.</li>
	<li>
		After completing the installation reboot, log in and open a terminal window.</li>
	<li>
		Install PHP: sudo apt-get install -y php5-cli</li>
	<li>
		Install Kiosk: wget -O - -q "http://kiosk.witti.ws/12.10/index.php?dump=source" | sudo php</li>
	<li>
		Reboot</li>
</ol><h2>
	Installation: Full Method</h2>
<p>If you are putting multiple kiosks into production, you may want to host the script yourself.</p>
<ol><li>
		<a href="http://kiosk.witti.ws/12.10/index.php?dump=source">Download the script</a> or <a href="https://github.com/wittiws/kiosk">fork the project on github</a></li>
	<li>
		Adjust the configurations ($conf) at the very top of the script and upload it to a web server. For scalability and reliability, you might also consider simply uploading to S3 for production if you do not want to allow query string configurations (warning: you must specify a home page when doing this).</li>
	<li>
		<a href="http://cdimage.ubuntu.com/lubuntu/releases/12.10/release/lubuntu-12.10-desktop-i386.iso">Download Lubuntu 12.10 32-bit version</a> (or use the <a href="http://cdimages.ubuntu.com/lubuntu/releases/quantal/release/lubuntu-12.10-desktop-i386.iso.torrent">torrent</a>)</li>
	<li>
		Install the standard Lubuntu system. Do NOT select autologin when creating your initial user. Remember your user name and password (they do not matter for the kiosk itself). Your user name should NOT be "kiosk" since that will be used by the kiosk script.</li>
	<li>
		After completing the installation reboot, log in and open a terminal window.</li>
	<li>
		Install PHP: sudo apt-get install -y php5-cli</li>
	<li>
		Install Kiosk: wget -O - -q "http://example.com/path-to-your-install/index.php?dump=source" | sudo php</li>
	<li>
		Reboot</li>
</ol><h2>
	FAQ</h2>
<h3>
	How do I log in as an administator?</h3>
<p>Within the kiosk mode, close all browser tabs except one. Go to chrome://logout (or whatever logout URL you configure), and then close that tab. You should immediately be redirected to the greeter screen where you can log in as the administrative user you configured during installation.</p>
</div></div></div>  </div>
</div>
