---
title: 'Fixing SVN: svn: Cannot write to the prototype revision file of transaction
  ''7391-1'' because a previous representation...'
layout: post
category: blog
tech:
- Linux
- Subversion
permalink: /blog/2009/10/22/fixing-svn-svn-cannot-write-prototype-revision-file-transaction-7391-1-because-previ

---
{% include JB/setup %}
<div id="node-62" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>svn: Cannot write to the prototype revision file of transaction '7391-1' because a previous representation is currently being written by this process</p>
<!--break-->
<h2>Solution</h2>
<ol><li>Locate the offending transation (not the one in the error!):<br />
    svnadmin lstxns /path/to/repository<br /><em>Repeat this step several times over a few minutes to ensure that it is actually stuck and not just slow.</em></li>
    <li>Remove the offending transaction (change the id based on the first step):<br />
    svnadmin rmtxns /path/to/repository 6265-1</li>
</ol></div></div></div>  </div>
</div>
