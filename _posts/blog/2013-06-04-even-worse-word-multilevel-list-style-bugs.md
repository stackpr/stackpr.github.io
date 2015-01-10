---
title: Even Worse Word Multilevel List Style Bugs
layout: post
category: blog
tech:
- Microsoft Word
- Microsoft Office
permalink: /blog/2013/06/04/even-worse-word-multilevel-list-style-bugs
images:
- listnum-duplicate-name.png

---
{% include JB/setup %}
<div id="node-282" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Previously, I documented a couple solutions that seemed to work when <a href="http://www.admin.witti.ws/blog/2013/04/12/copy-word-multilevel-list-styling">copying Word multilevel list styling</a> (that is a better starting point if you are trying to copy lists between documents). However, I stumbled across an even more frustrating case where the ListNum field name had already been reserved somehow elsewhere. Since there is no obvious way to locate the use of a particular ListNum field name within a Word document, a precision resolution (i.e., delete/re-insert of section) was not going to work. The problem became especially frustrating when Word actually allowed the creation of two distinct list styles with the same name. As the screenshot shows, the ListNum field name selection box shows "CpnpOutline1" twice!</p>
<!--break-->
<p>The consensus among research is that purging unwanted Multilevel Lists can really only be done by copying the entire document <em>except</em> for the final paragraph marker. So select all (Ctrl-A), unselect the end (Shift-Left), copy (Ctrl-C), new document (Ctrl-N), paste (Ctrl-V). This requires reapplying your template (assuming you use a template given your advanced list styling techniques).</p>
<p>Unfortunately, this specific problem was that there was some sort of misuse of the ListNum field name somewhere in the document. Copying everything based on that advice took the problem with it.</p>
<h3>
	Solution (or something that worked for me)</h3>
<ol><li>
		Copy a small section of the document that includes the relevant multilevel list.</li>
	<li>
		Paste it into a new document.</li>
	<li>
		Correctly configure the multilevel list in the new document based on what you have copied.</li>
	<li>
		Select-all and delete to get back to an empty document -- but an empty document that knows how the list should function.</li>
	<li>
		Copy the old document content into the empty document except for the last paragraph marker (see description above). Since the empty document has already established what to do with the multilevel list in question, the issue gets resolved when you paste the content.</li>
	<li>
		Confirm that the ListNum field names are working correctly.</li>
	<li>
		Reapply your template and resume work.</li>
</ol></div></div></div>  </div>
</div>
