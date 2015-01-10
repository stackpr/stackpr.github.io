---
title: Table Border Challenges Converting Word to PDF
layout: post
category: blog
tech:
- Microsoft Word
- PDF
permalink: /blog/2013/03/21/table-border-challenges-converting-word-pdf
images:
- word-pdf-border1.png
- word-pdf-border2.png
- word-pdf-border3.png

---
{% include JB/setup %}
<div id="node-261" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>There is a long-standing challenge to converting tables to PDF. A quick search (<a href="https://www.google.com/search?q=word+table+borders+look+wrong+after+saving+to+pdf">7.7 million results</a>) locates threads going <a href="http://forums.adobe.com/thread/305508">back to 2009</a> and beyond with people discussing the various awful problems they encounter when converting to PDF. So we are not alone with the problem. Here is a summary of what I've discovered from past experience, some testing, and confirmation in various search results.</p>
<!--break-->
<ol><li>
		PDFs are rendered inconsistently. If your primary concern is printability, then zoom in on the PDF. Frequently, missing lines are simply not appearing when you are zoomed out too far (e.g., details disappear when you view a full page depending on screen resolution).</li>
	<li>
		Borders appear much more reliably when you do NOT use shading. This includes a white background. If you set it to "no color", then the borders will frequently appear correctly. Obviously, choosing between shading and borders is not ideal. The sliver of white next to the border on the screenshots is one way that the shading-border conflict presents itself. </li>
	<li>
		The shading-border relationship can be improved by setting the cell margins to 0. The notch in the border (see screenshot) corresponds to the amount of cell margin. By seting it to 0, you can eliminate (or nearly eliminate) that sliver. Of course, it also results in content coming into contact with the border, which makes this solution inappropriate in some situations.</li>
	<li>
		One half-measure that can work is to use a border color that matches your shaded rows. That keeps the table boxed. However, it does not segment adjacent shaded rows or provide the nice sharp line between shaded rows.</li>
</ol><p>In the end, it does not appear that there is any point to banging your head against the wall if a table does not export well to PDF. You live with the limitation, apply one or more mitigation techniques above, or dramatically change your formatting to account for the problem.</p>
</div></div></div>  </div>
</div>
