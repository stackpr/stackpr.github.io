---
title: Subversion Rollbacks
layout: post
category: blog
tech:
- Linux
- Subversion
permalink: /blog/2011/07/12/subversion-rollbacks

---
{% include JB/setup %}
<div id="node-112" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>A straightforward feature that seems to be harder to find each time you need it...</p>
<p>To roll back a change in subversion, you have three basic steps:</p>
<ol>
    <li>Detect the path to the current folder in the repo:<br />
    <code>head .svn/entries</code></li>
    <li>Merge the previous revision back into the current working copy:<br />
    <code>svn merge -rCURRENT:OLD REPO_FOLDER_PATH</code></li>
    <li>Commit the new working copy back to the repository.</li>
</ol>
<p>Reference:&nbsp;<a style="color: rgb(108, 66, 14); text-decoration: none; " href="http://svnbook.red-bean.com/en/1.0/svn-book.html#svn-ch-4-sect-4.2">Subversion Manual Reference</a></p></div></div></div>  </div>
</div>
