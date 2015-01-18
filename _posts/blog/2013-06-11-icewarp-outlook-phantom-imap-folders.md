---
title: Icewarp-Outlook Phantom IMAP Folders
layout: post
category: blog
tags:
- Icewarp
- Microsoft Outlook
permalink: /blog/2013/06/11/icewarp-outlook-phantom-imap-folders

---
{% include JB/setup %}
<div id="node-286" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>IMAP is the solution of choice for many SMBs that want to access email from multiple machines. Originals are stored on the server, so any machine can theoretically access it. It was working smoothly for us with the exception that deleting or renaming folders on one machine (using Outlook) was inconsistent in whether the changes were reflected in Outlook on another computer. Updating the folder list and doing a query against available IMAP folders was insufficient to make all of the changes sync up, which left phantom folders. The folder changes were visibly made in the mail folder structure on the Icewarp server, so it became apparent that Icewarp had some secondary cache/database of directory information that held onto some bad information.</p>
<!--break-->
<p>Troubleshooting got me close enough that I was able to locate the Icewarp <a href="http://www.icewarp.com/support/online_help/7288.htm">Directory Cache</a>. At least with our flat file storage configuration, the cache is simply a SQLite database file. The Icewarp command-line tool does not appear to support clearing the cache, and arbitrarily deleting the cache file or emptying the tables seems dangerous. So I stuck with the tool accessible in the Icewarp admin tool. Go to the Advanced view of the admin (lower-left corner). Browse to System &gt; Advanced &gt; Directory Cache (tab). You can click "Run Now" to empty the directory cache once, but it seems obvious that the cache-emptying schedule should be set up.</p>
<p>Clearing the cache takes quite some time when there are quite a few folders (as we have), so the schedule should definitely be for off hours and for the lowest frequency that works for the organization.</p>
</div></div></div>  </div>
</div>
