---
title: Extending Biblio for Use with PMC, PubMed and CrossRef
layout: post
category: blog
tech:
- Drupal
- Biblio
- CrossRef
- PubMed
permalink: /blog/2012/10/01/extending-biblio-use-pmc-pubmed-and-crossref

---
{% include JB/setup %}
<div id="node-184" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The biblio module is designed to track references/citations. That is an extremely valuable feature set that I hope to leverage in a number of ways. The information below has been collected as part of the planning process for a new module (implementation has not yet started).</p>
<!--break-->
<h2>
	Identifiers</h2>
<p>There are many different ways to reference a specific piece of content. Unifying all of the identifiers is challenging with the unregulated development of new schemas. Here are a few of the key identifiers for peer-reviewed medical content:</p>
<ul><li>
		DOI: The DOI uses the <a href="http://www.handle.net/rfc/rfc3650.html">handle system</a>, which is a distributed system for read access.</li>
	<li>
		PMID and PMCID: The PubMed (see <a href="http://www.ncbi.nlm.nih.gov/pmc/?term=entrez%20help">Entrez</a>) and PubMed Central systems both provide their own IDs.</li>
</ul><h2>
	Different Reference List Exports</h2>
<ul><li>
		For CrossRef's cross-link program
		<ul><li>
				<a href="http://crossref.org/02publishers/59pub_rules.html">All members are obliged to link references</a></li>
			<li>
				<a href="http://help.crossref.org/#displaying_dois_in_print_and_online">The DOIs can be used in both print and online references</a></li>
			<li>
				<a href="http://help.crossref.org/#components">The citation_list element is illustrated as part of the sample journal article</a></li>
		</ul></li>
	<li>
		For PubMed Central's ref-list:
		<ul><li>
				<a href="http://dtd.nlm.nih.gov/publishing/tag-library/3.0/index.html?elem=ref-list">http://dtd.nlm.nih.gov/publishing/tag-library/3.0/index.html?elem=ref-list</a></li>
			<li>
				<a href="http://dtd.nlm.nih.gov/publishing/tag-library/3.0/FullArticleSamples/pnas_sample.txt">http://dtd.nlm.nih.gov/publishing/tag-library/3.0/FullArticleSamples/pnas_sample.txt</a> (example)</li>
		</ul></li>
	<li>
		For PubMed/Medline references:
		<ul><li>
				<a href="http://dtd.nlm.nih.gov/faq.html">NLM Journal Archiving and Interchange Tag Suite</a></li>
			<li>
				<a href="http://www.ncbi.nlm.nih.gov/books/NBK3828/">XML Help for PubMed Data Providers</a></li>
		</ul></li>
</ul><h2>
	Building a Biblio Reference List from Unstructured Citations</h2>
<p>Starting with a bulleted list of citations, I want to end up with biblio nodes that are referenced using Node Reference (yes, I'm still in D6). My search of existing modules identified two potential modules: <a href="http://drupal.org/project/noderefcreate">Node Reference Create</a>, and <a href="http://drupal.org/project/popups_reference">Popups: Add and Reference</a>. However, neither is quite there for this particular purpose. The ideal module would split the bullets (citations) into different field instances and then store the citations with the instance. Thus, each instance would either be a node reference or the details necessary for a user to create a node reference. The modules I found either auto-create a node (by setting the title) or just facilitate a user's manual creation of a node within the workflow of referencing the node. The trick with the new module implementation will be allowing the new field type to continue to leverage the existing Node Reference plugins for Views. The new module will need to follow a rough 4-step process:</p>
<p>Step 1: Split bullets into separate CCK field instances. This is primarily an interface change, although the splitting could happen on the server too. The individual references are now stored in a text column for each instance.</p>
<p>Step 2: Attempt to auto-convert the references into biblio nodes. There are three different sources that could reliably (with a margin of error) convert the reference code into an appropriate node reference:</p>
<ol><li>
		Examine past usage of the reference. Identical references should point at the same biblio nodes.</li>
	<li>
		Use CrossRef's web service to find a DOI based on a formatted citation. There is a <a href="http://www.crossref.org/guestquery/">free online version</a> of the form for testing, but the module would need to rely on the <a href="http://help.crossref.org/#querying-with-formatted-citations">web service version available via POST</a>. Initial testing identified that a space must be inserted after semi-colons for the web service to ever return a successful matching result. There is an <a href="http://www.crossref.org/SimpleTextQuery/">enhanced version via external service</a>, but that enhanced version has usage limits and does not implement a web service interface.</li>
	<li>
		Use PubMed Entrez to search for any indexed articles. Searching by journal name, year, volume, issue and page number (the last pieces of the citation) should always yield 0 or 1 result, and it that information can be reliably extracted from the end of an AMA-formatted citation.
		<ul><li>
				Example link: <a href="http://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&amp;term=%22Res%20Dev%20Disabil%22%5BJournal%5D+AND+2009%5BPDAT%5D+AND+30%5BVOL%5D+AND+3%5BISS%5D+AND+572-86%5BPAGE%5D">http://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?<br />
				db=pubmed&amp;term=%22Res%20Dev%20Disabil%22%5BJournal%5D<br />
				+AND+2009%5BPDAT%5D+AND+30%5BVOL%5D+AND+3%5BISS<br />
				%5D+AND+572-86%5BPAGE%5D</a></li>
			<li>
				Example extracted from: Matson JL, Neal D. Psychotropic medication use for challenging behaviors in persons with intellectual disabilities: an overview. <strong>Res Dev Disabil. 2009;30(3):572-86</strong>.</li>
		</ul></li>
</ol><p>Step 3: Auto-create nodes when possible. In conjunction with other biblio enhancements, creating a biblio node from DOI or PMID or PMCID should be possible without human involvement.</p>
<p>Step 4: Allow user review of auto-creation and facilitate manual creation of biblio nodes for those citations that could not be automatically created.</p>
</div></div></div>  </div>
</div>
