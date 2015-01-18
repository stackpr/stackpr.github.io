---
title: 'Bug Soup: Icewarp + Outlook + List Footer'
layout: post
category: blog
tags:
- Icewarp
- Microsoft Outlook
- Email List
permalink: /blog/2011/09/14/bug-soup-icewarp-outlook-list-footer

---
{% include JB/setup %}
<div id="node-121" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>A few emails came over our Icewarp-powered email list and appeared blank in Outlook 2010. The data was clearly present in the email files, but Outlook refused to render the content.</p>
<!--break-->
<p>A visual inspection of the raw email file (a .imap file) noted that there were extra characters at the end of the base64-encoded HTML version of the multipart/alternative email. It looked like this:</p>
<pre>
...bD4NCg==
PGJyLz4g
--_000_71BFCDA6D7DE10409ADDE59E61426C47010BADF7E165R04BYNMSGC1_--&nbsp;</pre>
<p>Obviously, the linebreak and PGJyLz4g cause problems with the base64 decoding. It seems that Outlook considers the invalid base64 string to be a security risk such that it chooses not to display anything at all -- not even a warning.</p>
<p>After seeing this error from two different unrelated senders, I focused on potential factors from our system. When the string was decoded with the rest of the message string, it turned into gibberish characters. However, when decoded by itself, it changed into &quot;&lt;br /&gt; &quot;, which is quite recognizable. Since this is on an email list, the fact that HTML was being inserted (albeit incorrectly) sent me to the footer configuration for the email list. Adjusting the footer changes what is inserted at the bottom of the file. &quot;&lt;br /&gt; &quot; was being inserted when the footer file was empty.</p>
<p>So it seems that the empty message was a combination of:</p>
<ol>
    <li>Email list footer being handled poorly by Icewarp to insert bad code at the end of a message such that the base64 string was no longer well-formed.</li>
    <li>Outlook 2010's lack of error messages and decision to hide messages that are marginally malformatted.</li>
</ol>
<p>Still waiting on Icewarp for feedback on the issue.</p></div></div></div>  </div>
</div>
