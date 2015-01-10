---
title: Microsoft Word Styles-Based Outline Numbering
layout: post
category: blog
tech:
- Microsoft Office
- Microsoft Word
permalink: /blog/2009/09/25/microsoft-word-styles-based-outline-numbering

---
{% include JB/setup %}
<div id="node-56" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The styles functionality in Word provides the ability to quickly update formatting throughout a document. Things like adjusting the font size on all headings goes from a major undertaking to a minor inconvenience when styles are used properly. Styles can also be used to format lists easily so that numbering is applied automatically. Unfortunately, it can become quite convoluted when you want to have multiple outlines that have the same styles but restart.</p>
<p>The problem is that "restart numbering" is an ephemeral concept in Word, especially if you apply it through the interface. The "restart" property is easily deleted, and it appears to be randomly discarded as well. That can cause styled outlines that are pages apart tohave sequential numbering. The best non-programmatic solution is to put a physical restart field at the end of a list. There are other solutions, but this one works best with some usability improvements. The key field configuration was found <a href="http://www.syntagma.demon.co.uk/FAQs/ListRestartByLISTNUM.htm">here</a>.</p>
<h2>Solution</h2>
<h3>Part 1: Update the Outline Style</h3>
<ol><li><strong>Modify</strong> the style that includes your outline numbering (should be your first-level style to avoid problems)</li>
    <li>Open Bullets &amp; Numbering at <strong>Format &gt;&gt; Numbering</strong></li>
    <li>Select the <strong>Outline Numbered</strong> format and click <strong>Customize</strong></li>
    <li>Click <strong>More</strong> to expose additional settings</li>
    <li>Select the first level of the outline in the <strong>Preview</strong> (should already be highlighted if you followed suggestion above)</li>
    <li>Place a unique name in the <strong>ListNum</strong> (ex: DemoList1)</li>
    <li>Click <strong>OK</strong>, then <strong>OK</strong>, then <strong>OK</strong>, to save the style.</li>
</ol><h3>Part 2: Create a "Restart Outline" Text Snippet</h3>
<ol><li>Type <strong>[Restart Outline]</strong> somewhere in the document</li>
    <li>Put your cursor between "Restart" and "Outline"</li>
    <li><strong>Insert &gt;&gt; Field</strong></li>
    <li>Select Field Names: <strong>ListNum</strong></li>
    <li>Under Field properties, select the <strong>List Name</strong> that you entered above: <strong>DemoList1</strong></li>
    <li>Check <strong>Level in the list</strong> and enter 1</li>
    <li>Check <strong>Start-at value</strong> and enter 0</li>
    <li>Click <strong>OK</strong></li>
    <li>Highlight <strong>[Restart Outline]</strong> and go to <strong>Format &gt;&gt; Font</strong></li>
    <li>Change <strong>Font color</strong> to red, change <strong>Font Style</strong> to Bold, and check <strong>Hidden</strong> in the <strong>Effects</strong> (all are on the Font tab)</li>
    <li>Click <strong>OK </strong> to close font properties (these can/should be done as a style)</li>
    <li>The text may have disappeared now - it will not be printed, but you can view/edit it by clicking the marks button (<strong>¶</strong>)</li>
</ol><h3>Using Your New Tool</h3>
<ol><li>Click the marks button (<strong>¶</strong>) once if you do not see symbols like that in your document</li>
    <li>Copy-paste the <strong>[Restart Outline]</strong> snippet to the <strong>end</strong> of each outline so that it is ready to number the next outline correctly</li>
</ol><h3>Why the Restart Outline Text and Styles</h3>
<p>Without the hidden style, there will be visible characters. Without the <strong>[Restart Outline]</strong> text around the field, the field can be hard to find. By bolding/redding/wrapping the field when in markup view, it is much easier to maintain.</p></div></div></div>  </div>
</div>
