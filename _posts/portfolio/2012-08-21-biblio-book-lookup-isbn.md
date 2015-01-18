---
title: Biblio Book Lookup by ISBN
layout: post
category: portfolio
tags:
- Drupal
- PHP
- Amazon
- Biblio
position:
- Developer
- End-to-end
permalink: /portfolio/biblio-book-lookup-isbn

---
{% include JB/setup %}
<div id="node-208" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Below is the initial version of the<i> </i><a href="http://drupal.org/sandbox/witti/1743148">Biblio Book Lookup</a> module project page. The module populates the node-add form using an ISBN. This functionality is similar to the populate-by-DOI and populate-by-PMID features provided by <a href="http://drupal.org/project/biblio">Biblio</a> submodules.</p>
<!--break-->
<h2>
	Overview</h2>
<p>Quickly create biblio nodes using an ISBN.</p>
<p>This module integrates with third-party resources to populate the biblio node add form based on ISBN. The Biblio module utilizes separate modules to handle this type of form population from other sources (e.g., PMID, DOI), but the request for a submodule to populate via ISBN has not been addressed: <span class="project-issue-status-1 project-issue-status-info"><a href="http://drupal.org/node/928506" title="Status: active">#928506: ISBN and ISBN-13</a></span>.</p>
<h2>
	Features</h2>
<ol><li>
		<strong><a href="https://developers.google.com/books/docs/v1/using#WorkingVolumes" rel="nofollow">Google Books API</a></strong>: Since the ISBN lookup call does not require an API key, the module is able to access ISBN information quickly and without any configuration.</li>
	<li>
		<strong><a href="http://drupal.org/project/amazon" rel="nofollow">Amazon Module</a></strong>: If the Amazon Module is installed and properly configured, then the tools are readily available to look up an ISBN either in the local database or in the web service.</li>
	<li>
		<strong>No extra configuration required!</strong> Simply enable this module. It will always check with Google, and it will check with Amazon if you use that module.</li>
</ol><h2>
	Why Use the Amazon Module?</h2>
<p>If the Google Books API is readily available, you might wonder why you would also want to use the Amazon module to access a second database. The reason is that <a href="http://stackoverflow.com/questions/1297700/what-is-the-most-complete-free-isbn-api" rel="nofollow">neither site is 100% complete</a>, and we achieve a higher hit rate by using both. Additionally, the URL defaults to the Amazon URL when installed, which means that biblio nodes will help extend your efforts to monetize your site.</p>
</div></div></div>  </div>
</div>
