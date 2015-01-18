---
title: Merging Subversion Repositories
layout: post
category: blog
tags:
- Linux
- Subversion
permalink: /blog/2012/10/13/merging-subversion-repositories

---
{% include JB/setup %}
<div id="node-237" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I managed two sites in separate repositories, but I eventually decided that the excess complexity was unlikely to prove helpful anytime soon. Having administered subversion for quite some time, and given my low demands for the history accuracy, it was pretty straightforward.</p>
<!--break-->
<ol><li>
		Original setup:
		<ol><li>
				/drive/folder_a -&gt; repo_a (folder_a is the root checkout)</li>
			<li>
				/drive/folder_b -&gt; repo_b (folder_b is the root checkout)</li>
		</ol></li>
	<li>
		Target setup: The new repo will be relative to the server root ("/") such that folder_a will now be at "drive/folder_a" within the new repo.</li>
	<li>
		Ensure that both folders are fully committed</li>
	<li>
		Create a new master repo: svnadmin create /path/to/repo</li>
	<li>
		Go to a temporary folder (paths below are relative to that directory)</li>
	<li>
		Export the old repos
		<ol><li>
				svnadmin dump /path/to/repo_a &gt; repo_a.repo</li>
			<li>
				svnadmin dump /path/to/repo_b &gt; repo_b.repo</li>
		</ol></li>
	<li>
		Initialize the new repo
		<ol><li>
				svn co file:///path/to/repo</li>
			<li>
				cd repo</li>
			<li>
				svn mkdir drive drive/folder_a drive/folder_b</li>
			<li>
				svn commit -m "Initialize directory structure for repo merge."</li>
		</ol></li>
	<li>
		Import the old repos
		<ol><li>
				svnadmin load --parent-dir drive/folder_a/ /path/to/repo &lt; ../repo_a.repo</li>
			<li>
				svnadmin load --parent-dir drive/folder_b/ /path/to/repo &lt; ../repo_b.repo</li>
		</ol></li>
	<li>
		Update the working copies
		<ol><li>
				Remove the old .svn directories from
				<ol><li>
						rm -rf $(find /drive/folder_a -type d -name .svn)</li>
					<li>
						rm -rf $(find /drive/folder_b -type d -name .svn)</li>
				</ol></li>
			<li>
				Copy the new .svn directories into place
				<ol><li>
						svn update # to update the temp working copy from just the base directories</li>
					<li>
						find . -type d -name .svn | while read d; do echo $d; cp -rf "$d" "WORKING_COPY_ROOT/$d"; done</li>
				</ol></li>
		</ol></li>
</ol><p>All of these commands assume that you are within the temp checkout folder. If you change that, or if your repositories do not share a theoretical parent folder, or if you are not on the same server, then you will likely need to tweak some of the commands.</p>
<h3>
	Drawbacks</h3>
<ol><li>
		The version numbers are not mixed together. The version numbers are 0 to X and X+1 to X+Y. It is possible to merge them, but it is more complex and was unnecessary for my use case.</li>
	<li>
		This only addresses your working copy. Other computers with a working copy would need to checkout a new copy. If they want to keep them in place, then they would need to checkout a new version and then update using a modified version of the last steps.</li>
</ol></div></div></div>  </div>
</div>
