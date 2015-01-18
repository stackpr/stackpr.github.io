---
title: Printing Long Deidentified Comments on a Word 2010 Document
layout: post
category: blog
tags:
- Microsoft Word
permalink: /blog/2013/03/22/printing-long-deidentified-comments-word-2010-document
images:
- word-truncated-comments.png
- word-hide-comments.png
- word-print-comments.png
- acrobat-save-to-word.png

---
{% include JB/setup %}
<div id="node-264" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Blinded peer review requires that author and reviewer data be removed completely from all exchanged documents. It also requires that feedback be preserved and communicated effectively between the parties such that we are not blinded by the blinding process. The first step has to be the removal of all identifying information. In our case, we need the document and comments to be printable, which adds extra little challenges.</p>
<!--break-->
<h2>
	Solution One (success): Deidentification</h2>
<p>First, you delete (and accept changes if applicable) any references to the author or reviewer. Word can remove metadata, but it cannot distinguish when actual content includes identifying data. Humans are still necessary for that step. To remove the metadata (author information and commenter initials), following these instructions:</p>
<p><a href="http://office.microsoft.com/en-us/word-help/remove-hidden-data-and-personal-information-by-inspecting-documents-HA010354329.aspx">Remove hidden data and personal information by inspecting documents - Word - Office.com</a></p>
<h2>
	Solution Two (failed): Converting Word Comments to PDF Comments</h2>
<p>From what I can tell, this is not possible without a commercial plugin. Comments get printed as regular content and are not preserved as comments. That is sufficient for many use cases, but it is entirely insufficient when the comments become too lengthy (described more below).</p>
<h2>
	Solution Two (success): Exporting Word Comments to a New Word Document</h2>
<p>This solution is meant to work for any document. If you only have a couple short comments per page, then simply printing the documents works. However, the screenshot shows how comments are truncated and ellipses appear when too many (or too many long) comments appear on one page such that Word cannot make the comments fit on the length of the page. For some reason, Word is unwilling to simply reflow the document to preserve the comments. This is a workaround that is overkill for other situations.</p>
<h3>
	Step 1: Print the document with comment references - but not comments</h3>
<p>Click on Review in the ribbon. Go to Show Markup &gt; Balloons &gt; Show All Revisions Inline</p>
<p>Balloons refer to to the balloons around comments to the side. By setting it to show all revisions inline, it will continue to show additions/deletions, but the comments are reduced to footnote-style comment references. The comments themselves do not appear. You can then print or convert to PDF.</p>
<h3>
	Step 2: Print the comments with the IDs to cross-reference</h3>
<p>In the print dialog, expand the Print All Pages drop-down box. When visible, make two changes. First, uncheck "Print Markup". Second, select "List of Markup". This causes the additions, deletions and comments to be printed without any comments. You can either print the document -- or print to PDF.</p>
<p>Note: You may be tempted to accept all changes so that only comments are exported/printed. However, you have to be very very very careful doing that. Some comments may be removed if they are tagged to content that is deleted. Accepting the changes in that case can cause the comments to disappear and other comments to be renumbered.</p>
<h3>
	Step 3 (bonus!): Edit the comments back in Word</h3>
<p>Assuming you have access to Acrobat Standard (or better), you can print the comments to PDF using the instructions above (using Step 2). Then, you can go to File &gt; Save As &gt; Microsoft Word &gt; Word Document. Although this conversion is generally limited and imperfect, the comment styles are generally simplistic enough to make the conversion sufficient for most purposes.</p>
</div></div></div>  </div>
</div>
