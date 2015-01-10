---
title: Avoid Autoresponders to Email List Messages
layout: post
category: blog
tech:
- Icewarp
- Email List
permalink: /blog/2012/08/17/avoid-autoresponders-email-list-messages

---
{% include JB/setup %}
<div id="node-203" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>One key element for an email list configuration is whether the outbound messages come from the sender or from the list. If they come from the sender, then someone can <em>Reply-All</em> to get the sender and the list or just <em>Reply</em> to get the sender. That is a very convenient setup, but it prevents having any real control over autoresponders that go to the message sender. However, there are a few headers that can suppress a portion of the autoresponders.</p>
<p>Although there are other possibilities, I settled on adding these three headers to all list messages:</p>
<ol><li>
		<a href="http://www.apps.ietf.org/rfc/rfc2919.html">List-Id: listname@example.com</a>: Identifies the email as a list message.</li>
	<li>
		<a href="http://en.wikipedia.org/wiki/Email">Precedence: list</a>: A generic method of communicating the autoresponders should not be sent. Alternate values could be "bulk" or "junk", but they are more likely to increase filtering problems.</li>
	<li>
		<a href="http://msdn.microsoft.com/en-us/library/ee219609(v=EXCHG.80).aspx">X-Auto-Response-Suppress</a>: All: A Microsoft-specific header to control auto-responses.</li>
</ol><p>To add the headers in Icewarp, go to the Rules tab for the specific Mailing List. Then, follow these steps:</p>
<ol><li>
		Click "Add..."</li>
	<li>
		Select "All messages" in Conditions</li>
	<li>
		Select "Edit message header" in Actions</li>
	<li>
		Click on "header" to change the headers</li>
	<li>
		Click "Add", enter the header info, and then "Add" again (repeat for other headers)</li>
	<li>
		Click "OK" and "OK" to close the windows</li>
	<li>
		Move the rule to the top of your rules list</li>
</ol><p>That should do it. You cannot control whether all of your list users have software that will respect these headers, but it is a step forward.</p>
</div></div></div>  </div>
</div>
