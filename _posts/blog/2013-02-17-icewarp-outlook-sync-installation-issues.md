---
title: Icewarp Outlook Sync Installation Issues
layout: post
category: blog
tags:
- Icewarp
- Microsoft Office
- Microsoft Outlook
- Windows Server 2008
permalink: /blog/2013/02/17/icewarp-outlook-sync-installation-issues

---
{% include JB/setup %}
<div id="node-252" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>My first pass at installing the Icewarp Outlook Sync add-in lead to a dead end with the error message in Outlook: "Not loaded. A runtime error occurred during the loading of the COM add-in." Everything had looked just fine during the installation process, and the installer completed without issuing any errors or warnings. In fact, the installer correctly identified the Office version we were running, and it was obviously aware of the operating system.</p>
<p>We were running a fullly updated version of Office 2010 64-bit on Windows 2008 R2 64-bit. About a year ago (in 2012), I had run into some problems with embedding video in PowerPoint because we were running 64-bit since some add-ins had not been updated for 64-bit at that point. There was no solid indication that 64-bit was the problem here, especially since Icewarp identified that it was installing on a 64-bit version, but it seemed like a plausible source of the error.</p>
<p><!--break-->Since there were some other known issues with the 64-bit version of Office, I took this opportunity to reinstall Office as 32-bit. Beyond the time wasted during installation and re-updating, it was uneventful. After reinstalling the Icewarp Outlook Sync for the 32-bit version of Outlook, the add-in loaded and seemed to work.</p>
<p>The next problem related to the Icewarp license. The add-in would not run because the license registered as expired. That is probably because my initial (failed) pass at installing the sync add-in was months earlier such that the automatic trial period was over. We have licenses, and it directs you to the webmail to get the license. This should work fine, but the license frame popped up a server not responsive error. I opened the licenses screen (a frame in the webmail) in a new tab and saw that it was using port 32000. That is the default port, but we had changed it to a different port. Apparently, that one link had a hard-coded admin port number. By manually adjusting the URL to the right port, I was finally able to get the activation key for the Icewarp Outlook Sync add-in. Once that was in place, everything appeared to work wonderfully.</p>
<p>The final headache came with the PST file. I wanted to move it to another drive. I moved the file and registered the change with Outlook via the "Mail" settings in Control Panel. Outlook opened and everything appeared to work correctly. However, the Icewarp add-in would not send new emails. From what I could find in the Icewarp add-in settings, there is no way to relocate a PST file once the Icewarp profile has been created. To resolve this, I moved the PST file back to its original location and added a note about the storage location to my long-term wish list.</p>
<p>The Icewarp Outlook Sync is a nice addition, and I am excited to have some of the enhanced functionality. However, the three challenges that I encountered during installation were frustrating. I hope that the tools will prove stable and that the installation process will only get better over time.</p>
</div></div></div>  </div>
</div>
