---
title: Biblio Rapid Creation Using Author+Title
layout: post
category: blog
tags:
- Biblio
- Drupal
- CrossRef
permalink: /blog/2012/08/08/biblio-rapid-creation-using-authortitle

---
{% include JB/setup %}
<div id="node-214" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I've used the <a href="http://drupal.org/project/biblio">Biblio</a> for a little over a month now, and the work has resulted in a number of patches that have been submitted back to the project (<a href="http://drupal.org/project/issues/search/biblio?submitted=witti">browse the issues</a>). I've learned that the primary use case appears to be bulk import of citations in a variety of different formats. Unfortunately, we receive citations in unstructured format, although it is supposed to be AMA format. The initial objective of my development has been to streamline the manual creation of highly-detailed biblio nodes.</p>
<!--break-->
<p>Here is a high-level summary of the key patches:</p>
<ol><li>
		Lookup DOI using author name and article title</li>
	<li>
		(With an admin configuration...) Automatically create a node rather than just populating the form</li>
	<li>
		Automatically created nodes can redirect to a destination URL, including back to the node add form, to create a steady flow of biblio node creation</li>
	<li>
		(With an admin configuration...) Any node with a DOI will search PubMed and PubMed Central for a PMID and PMCID, respectively</li>
	<li>
		(Already implemented...) Periodically look for updates to the citation from PubMed</li>
</ol><p>In the end, biblio nodes can now be rapidly created with very few steps when appropriately configured (including pathauto):</p>
<ol><li>
		Go to a specific web address to enter the loop.</li>
	<li>
		Copy-paste the author and title, click "Search".</li>
	<li>
		Click the DOI in the search results.</li>
	<li>
		The node is created automatically, and the process restarts when the browser is redirected to the first web address.</li>
</ol></div></div></div>  </div>
</div>
