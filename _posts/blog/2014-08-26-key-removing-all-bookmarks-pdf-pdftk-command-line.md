---
title: Key to removing all bookmarks from PDF with PDFtk command-line
layout: post
category: blog
tags:
- PDF
- PDFtk
permalink: /blog/2014/08/26/key-removing-all-bookmarks-pdf-pdftk-command-line

---
{% include JB/setup %}
<div id="node-336" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Periodically, there is a need to remove all bookmarks from a PDF. Sometimes the bookmarks become unwieldy. Sometimes planned document mergers render the bookmarks superfluous. Other times, you just don't want them. Regardless of the motivation, pdftk seems like an appropriate tool for quick adjustments of this sort. Unfortunately, as its features have evolved, this is a use case of apparently secondary concern.</p>
<!--break-->
<h2>
	The Goal</h2>
<p>Remove all bookmarks from a PDF via the command-line using PDFtk.</p>
<h2>
	Failed Solutions Seen Elsewhere</h2>
<p>There are two solutions that do not work with pdftk 2.02, although they may have worked for some older version.</p>
<h3>
	data_dump/update_info</h3>
<p>First, the bookmarks appear in the data_dump and can be <em>updated</em> via update_info. The <a href="https://www.pdflabs.com/docs/pdftk-man-page/#dest-op-update-info">update_info documentation</a> confirms that it "changes the bookmarks...," but it does not make any reference to removing all bookmarks. If the info file that you apply to the PDF contains zero bookmarks, then pdftk ignores the bookmarks entirely and leaves them intact. Thus, this method can be used to update bookmarks or to remove most bookmarks, but it cannot be used to remove ALL bookmarks.</p>
<h3>
	cat</h3>
<p>Second, there are assertions that simply using a trivial case of the concatenation command will strip out the bookmarks. For example:</p>
<pre class="brush:bash">
pdftk example.pdf cat output nobookmarks.pdf</pre>
<p>However, the <a href="https://www.pdflabs.com/docs/pdftk-version-history/">version history</a> indicates that bookmarks are preserved when merging full PDFs since 2.0.0. This technique will only work with older versions.</p>
<h2>
	The Solution</h2>
<p>The solution is to specify the page range of the PDF. The documented behavior of the <a href="https://www.pdflabs.com/docs/pdftk-man-page/#dest-op-cat">cat operation</a> is to only preserve bookmarks when no page range is specified. It also confirms that A1-end will always include the entire PDF. Testing confirms that this purges the PDF of any bookmarks.</p>
<pre class="brush:bash">
pdftk A=example.pdf cat A1-end output nobookmarks.pdf</pre>
</div></div></div>  </div>
</div>
