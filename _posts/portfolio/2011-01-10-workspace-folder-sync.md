---
title: Workspace Folder Sync
layout: post
category: portfolio
tech:
- PHP
- Linux
- Drupal
- Windows Server 2003
- Rsync
position:
- End-to-end
permalink: /portfolio/workspace-folder-sync
images:
- workspace_sync_1.png

---
{% include JB/setup %}
<div id="node-104" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The workspace module was built to provide online access to whatever resources a committee member might need. An essential step was to expose files that are managed on a file server at the office by staff.</p>
<p>Since staff do most of the document generation/management, it was important to maintain efficient file access for the staff. Thus, we did not want to host the source files on the web server since the latency between the office and EC2 would create ongoing frustration. However, we also did not want to expose the file server (via WebDAV) to committee members since it introduced complex security issues and relied on very limited office bandwidth. By eliminating the two easiest options, we are left with some form of sync.</p>
<p>The solution for creating read-only access for committees was quite lovely:</p>
<ol><li>
		Prepare files for upload by creating a cache entry for source files targeted by shortcuts on the file server. This allows staff to create a shortcut rather than copying a file to multiple locations.</li>
	<li>
		Upload files to the web server using rsync, omitting special file names (anything starting with an underscore, for simplicity). Root folders include .ini files that indicate which workspaces will display the files.</li>
	<li>
		Once uploaded, the web server runs a sync process to create nodes for all of the rsync'ed files. The nodes are tied to specific workspaces and the associated access rules.</li>
	<li>
		The files are displayed in a hierarchy via a modified version of jQuery <a href="http://ludo.cubicphuse.nl/jquery-plugins/treeTable/doc/">treeTable</a>. The modification included (1) an AJAX call to load folder contents when a folder is expanded, and (2) a method to re-zebra the rows in the table for readability. Other modifications may have been necessary, but those were the primary changes.</li>
</ol><p>The screenshot shows quite a few administrative items, but the basic end-user functionality was strictly read-only on launch.</p>
</div></div></div>  </div>
</div>
