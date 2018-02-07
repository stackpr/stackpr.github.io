---
title: QR Code Reminders
layout: post
category: blog
tags:
- QR Codes
permalink: /blog/2012/10/17/qr-code-reminders
images:
- qrcode.png

---
{% include JB/setup %}
<div id="node-240" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>We used a QR code a few years ago to test adoption within our target audience. The response rate was far too low to bother with it again, especially when short URLs provide a solution for everyone regardless of tech acumen. But the request resurfaced again in a committee that works with a younger segment that might be more familiar with the technology. To save the time refreshing next time, all of the basic steps are below.</p>
<!--break-->
<h2>
	Creating the QR Code</h2>
<ol><li>
		Create 2 web addresses with tracking information
		<ol><li>
				The first short code (i.e., alias or redirect) is for non-QR users. Assuming you provide both options, it is important to track both for comparison. I went with GA tracking: utm_campaign=WHATEVER&amp;utm_medium=print</li>
			<li>
				The second short code is for QR users. Although the QR code can include the full URL with analytics, using a separate alias provides the ability to change the redirect (and therefore the ultimate destination) of the QR codes after they are published. I went with GA tracking: utm_campaign=WHATEVER&amp;utm_medium=qr</li>
		</ol></li>
	<li>
		Choose a QR code generator
		<ol><li>
				For any QR code generator, you want to use level=H when possible. The levels are L, M, Q and H, and they represent levels of redundancy that determine how well a QR code will work when the image is distorted or obscured. <a href="http://www.qrme.co.uk/forum/general-qr-code-discussion/277-making-qr-codes-into-images.html">H has a 30% auto-correction capability.</a></li>
			<li>
				There are many good options for this. Some I considered were a <a href="http://manpages.ubuntu.com/manpages/lucid/man1/qrencode.1.html">linux CLI tool</a>, <a href="http://larsjung.de/qrcode/">jQuery.qrcode</a>, a <a href="http://createqrcode.appspot.com/">basic free appsot app</a>, and an advanced free application called <a href="http://www.esponce.com/">Esponce</a>. <em>Update 2018-02-07</em>: <a href="https://www.the-qrcode-generator.com/">Web-based generator</a> or <a href="http://www.keepautomation.com/products/word_barcode/barcodes/qrcode.html">Word field</a>.</li>
			<li>
				Google Image Charts has a QrCode chart. <a href="http://imagecharteditor.appspot.com/">You can generate it without learning the API.</a> The primary downside to utilizing Google is that Image Charts are deprecated and will become unavailable at some point in the future.</li>
		</ol></li>
	<li>
		Create the QR code
		<ol><li>
				The text of the code should be the QR short code, starting with http://</li>
			<li>
				The level should be H</li>
			<li>
				For most web addresses, use UTF-8 encoding</li>
			<li>
				The size varies by usage, but bigger is better for print, and 500x500 is the best the Google generator will allow</li>
			<li>
				Save the QR code as a static image so that it continues to work after Google no longer offers the service</li>
			<li>
				Or save the web address (mine is <a href="//chart.googleapis.com/chart?chs=500x500&amp;cht=qr&amp;chld=H&amp;chl=http%3A%2F%2Fcpnp.org%2F2012residencies-qr">here</a>)</li>
		</ol></li>
</ol></div></div></div>  </div>
</div>
