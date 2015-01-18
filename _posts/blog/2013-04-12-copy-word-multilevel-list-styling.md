---
title: Copy Word Multilevel List Styling
layout: post
category: blog
tags:
- Microsoft Word
- Microsoft Office
permalink: /blog/2013/04/12/copy-word-multilevel-list-styling
images:
- multilevel-initial.png
- multilevel-more.png

---
{% include JB/setup %}
<div id="node-265" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I love Microsoft Word styles. Properly used, Word quickly becomes a much more powerful word processing document. All styles require you to work within the constraints of the template, and lists are no different. Take a look at <a href="http://www.shaunakelly.com/word/numbering/numbering20072010.html">this introduction</a> (includes screenshots) if you are unfamiliar with using styles with lists and consider the <a href="http://blogs.office.com/b/microsoft-word/archive/2009/06/25/multilevel-lists-and-list-styles.aspx">difference between multilevel lists and list styles</a>.</p>
<p>The unexpected result popped when the styles/templates were copied to a new document. Although the styles were preserved, the <em>list styles</em> were not copied. Go figure that one would be part of a template and another part would not be. There are at least two solutions.</p>
<h3>
	Solution One: Copy an Instance</h3>
<p>Copy a list from the original document to the new document. The list will bring the associations between the list styles and the Word styles with it. This should generally work.</p>
<p>An extension of this solution would be to simply start from a document that already uses the lists rather than applying the template to a new document. That ensures that list styles and any other similar concerns (as yet unidentified) are addressed.</p>
<h3>
	Solution Two: Recreate the List Style</h3>
<p>This is slightly more difficult because you have to manually reassociate the styles with the multilevel list.</p>
<ol><li>
		Expand the outline button</li>
	<li>
		Click "Define New Multilevel List"</li>
	<li>
		Click "More"</li>
	<li>
		Select each level and change the style associated with it - update other settings too</li>
	<li>
		Set the "ListNum field list name"</li>
</ol><h3>
	What does all this accomplish?</h3>
<p>This creates a valid ListNum field list name. That allows fields like this (Quick Parts &gt; Field):</p>
<pre class="brush:vb">
{ LISTNUM  ExampleList \l 1 \s 0 }</pre>
<p>The "ExampleList" definition is not embedded in the word styles. You have to copy or recreate the multilevel list to establish that relationship -- and to allow manipulation using the Word field. By reestablishing the connection, you can address various functionality issues like ensuring that the numbering restarts reliably.</p>
</div></div></div>  </div>
</div>
