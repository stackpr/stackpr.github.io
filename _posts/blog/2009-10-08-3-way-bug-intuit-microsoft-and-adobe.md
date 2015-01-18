---
title: 'The 3-Way Bug: Intuit, Microsoft and Adobe'
layout: post
category: blog
tags:
- Adobe Photoshop CS3
- QuickBooks 2009
- Windows Vista
permalink: /blog/2009/10/08/3-way-bug-intuit-microsoft-and-adobe

---
{% include JB/setup %}
<div id="node-59" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I have a 64-bit Vista computer that generally works really well. It is fast, and it did not cost much. Vista is obviously quite unpopular, but I suspect that most of it comes from being the first widely-adopted 64-bit operating system platform. Even Linux has been quite slow to get a decent implementation (my Linux box is 32-bit on a 64-bit box).</p>
<p>The least reliable program so far has been QuickBooks. I had to upgrade for it to work on Vista, but the new version really does not seem to like 64-bit. Its printer drivers keep getting corrupted. I don't really need to PDF many QB reports, so that was no big deal.</p>
<p>However, enter Photoshop CS3. I generally love it, but then it stopped opening files. It turns out that a corrupted printer driver kills Photoshop. I tracked that down with a <a href="http://forums.adobe.com/thread/501329?tstart=0">3.5 year-old post</a>. So Adobe never fixed a known bug, and it flared up because Quickbooks did a bad job implementing on a first-attempt operating system.</p>
<p>Good times!</p>
<h2>Solution</h2>
<p>The solution was to delete the Quickbooks PDF Converter. It will be automatically re-installed, and it will probably be automatically re-corrupted! I had to cancel all documents and run as administrator for the printer to actually disappear.</p></div></div></div>  </div>
</div>
