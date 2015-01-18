---
title: Transition Postini to Google Apps for Business
layout: post
category: blog
tags:
- Email
- Google Apps
- Icewarp
- Postini
permalink: /blog/2012/09/06/transition-postini-google-apps-business

---
{% include JB/setup %}
<div id="node-220" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>For quite a few years, we utilized Postini as an inbound SMTP proxy and virus/spam filter. The virus and spam filtering capabilities were very nice, but similar functionality was easily available on-premise using a plugin for Icewarp (our email server software). However, the proxy/spooling functionality was at least as important for us, and having the filtering occur off-premise provided several performance and stability benefits.</p>
<!--break-->
<h2>
	Advantages to the Old Postini Setup</h2>
<p>Even though we did not take full advantage of the Postini feature set, it still did a good job providing us with security, stability and performance.</p>
<ol><li>
		Postini took care of all spam and virus filter updates.</li>
	<li>
		We were able to restrict SMTP traffic to Postini using our hardware firewall to avoid dealing with automated attacks against port 25. That firewall restriction also ensured that all email had passed through Postini's virus and spam filters.</li>
	<li>
		Postini's spooling eliminated the primary downside to Internet connection volatility. When our email server became unreachable due to a server restart, power outage, or Internet connection issue, Postini simply held the email until it became available again. There are various services that specialize in this.</li>
	<li>
		Using their blatant spam blocking, 10-30% of the emails sent to our domain never hit our networks or affected our resources.</li>
</ol><h2>
	The Obvious Choice?</h2>
<p><a href="http://googleblog.blogspot.com/2007/09/weve-officially-acquired-postini.html">Google acquired Postini in 2007.</a> Now, Google is working to <a href="http://support.google.com/postini/bin/answer.py?hl=en&amp;answer=2725303">transition all of the Postini users to Google Apps</a> by 2013. Given that Google has integrated most of the features into Google Apps, it is the obvious choice for us to move to. I say "obvious" because it might not be the best choice. For instance, Google does not provide a static list of IP addresses that you can use for a firewall configuration, which immediately eliminates some of the benefits. There are other vendors that could provide the exact same configuration at a very low cost (e.g., <a href="http://www.spamhero.com/pricing.php">SpamHero</a>). However, we are leveraging various Google tools already such that using Google Apps does provide some potential synergies down the line. So we stick with Google.</p>
<h2>
	Adjusting the Email Server Filters</h2>
<p>The basic flow of the email filters was:</p>
<ol><li>
		Apply basic whitelisting and blacklisting</li>
	<li>
		Process postini headers to handle spam as we see fit based on scores</li>
	<li>
		Allow other emails (non-spam and trusted local sources) through</li>
</ol><p>Since we can no longer rely on firewall rules to guarantee that email has been filtered (especially for viruses), the flow has to be updated:</p>
<ol><li>
		Apply basic whitelisting and blacklisting</li>
	<li>
		Accept emails from a local trusted source</li>
	<li>
		Reject anything else that did not go through Google Apps</li>
	<li>
		Process the X-Gm-Spam header (required online configuration too) and handle the spam as we see fit</li>
	<li>
		Accept any remaining emails</li>
</ol><p>In my case, the vast majority of the email filters had to be adjusted to some degree.</p>
<h2>
	Did It Hit Google Apps Email Filters?</h2>
<p>The trick now is to determine whether an email hit Google Apps before coming to our email server. Simply checking for the X-Gm-Spam header is inadequate since that will likely become a standard extra header in hack attempts. The solution I settled on is to have Google Apps pass an access key as a header.</p>
<ol><li>
		In Google Apps, add a <a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=2368151">Receiving routing setting</a> with a custom header.</li>
	<li>
		Set the custom header name and value to something random and private. On Linux, you might just type `uuidgen` to get a good string.</li>
	<li>
		In Icewarp (or your email program), add a filter that checks the custom header name and value. After it has been verified, have your server software remove the header so that it is not exposed to any users - this will prolong the usefulness of the access key.</li>
</ol><p>This is an imperfectly secure system since there is no private key. The email header is passed in plain text through any intermediary servers. Of course, if one of those intermediaries is evil, then you are already in trouble. If there is a sudden spike in SPAM, or on a predetermined schedule, the access key header value should be changed.</p>
<h2>
	References</h2>
<ol><li>
		<a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=2530452">The official feature comparison page of Postini vs Google Apps Email</a></li>
	<li>
		<a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=77003">Email routing is available to Google Apps for Business</a></li>
	<li>
		<a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=2368132">Approved sender lists are buried deep, but they are available</a></li>
	<li>
		<a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=2364632">Blocked sender lists are easier to find</a></li>
	<li>
		<a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=60764">Restricting SMTP connections to Google IPs is much trickier than with Postini</a></li>
	<li>
		<a href="http://support.google.com/a/bin/answer.py?hl=en&amp;answer=2368153">X-Gm-Spam provides a 0/1 spam flag, similar to the general spam score in Postini headers (almost a direct map of X-pstn-xfilter: y/n)</a></li>
</ol></div></div></div>  </div>
</div>
