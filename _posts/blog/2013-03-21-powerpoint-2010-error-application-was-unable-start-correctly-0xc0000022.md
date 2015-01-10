---
title: 'PowerPoint 2010 Error: "The application was unable to start correctly (0xc0000022)."'
layout: post
category: blog
tech:
- Microsoft PowerPoint
- Microsoft Outlook
- Microsoft Office
permalink: /blog/2013/03/21/powerpoint-2010-error-application-was-unable-start-correctly-0xc0000022
images:
- ppt-protected-view-2.png
- ppt-protected-view-1.png
- ppt-protected-view-3.png

---
{% include JB/setup %}
<div id="node-262" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>After many frustrations with Office 2010 x64, I uninstalled it and installed Office 2010 x32. However, after that reinstallation, I began getting the application error whenever I tried to open a PowerPoint presentation from an Outlook email -- even if I saved it locally and opened from there. The error message itself is quite non-descript. In fact, it was frequently coupled with this additional error message:</p>
<p><q>PowerPoint found a problem with the content in XXXX.pptx. PowerPoint can attempt to repair the presentation.</q></p>
<!--break-->
<p>I suspect that this might be specific to the operating system (Windows 2008r2 64-bit), but I'll provide the solution in case it helps.</p>
<p>Given that it related only to PowerPoints received through Outlook, my troubleshooting narrowed quickly to the Protected View system. It is confirmed that this is the culprit, which leaves us with two solutions. In this case, "solution" means a way to bypass Office security. Bypassing security is not a good option, but neither is a broken and unusable security system -- so you have to make that decision.</p>
<h2>
	Solution 1: Disable Protected View Per-File</h2>
<ol><li>
		Save the file locally.</li>
	<li>
		Right-click on the file and select Properties. (see screenshot)</li>
	<li>
		Click "Unblock".</li>
	<li>
		Open the file</li>
</ol><p><strong>The good:</strong> You have to make a conscious effort to bypass security.</p>
<p><strong>The bad:</strong> The error message does not provide any cues that you need to do this, and you are bypassing a security feature. Be careful!</p>
<h2>
	Solution 2: Disable Protected View Entirely</h2>
<ol><li>
		Open PowerPoint and go to File &gt; Options &gt; Trust Center &gt; Trust Center Settings &gt; Protected View (see screenshot).</li>
	<li>
		Uncheck all three "Enable Protected View..." checkboxes.</li>
	<li>
		Click OK and OK.</li>
	<li>
		Try to open your attachment.</li>
</ol><p><strong>The good:</strong> You will not be inconvenienced when opening files you receive via email or download from the Internet.</p>
<p><strong>The bad: </strong>You have disabled a security feature. Be careful!</p>
</div></div></div>  </div>
</div>
