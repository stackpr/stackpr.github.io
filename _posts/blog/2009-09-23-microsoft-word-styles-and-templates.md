---
title: Microsoft Word Styles and Templates
layout: post
category: blog
tech:
- Microsoft Office
- Microsoft Word
permalink: /blog/2009/09/23/microsoft-word-styles-and-templates

---
{% include JB/setup %}
<div id="node-54" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Managing styles across multiple documents is possible and extremely powerful. However, there is a lack of documentation out there. Skipping over a lot of the details, here is a strategy that works quite well.</p>
<ol><li>Create "Sample Format.doc" with the styles you want</li>
    <li>Save "Sample Format.doc" as "Sample Format.dot" (Document Template)</li>
    <li>Create "Content.doc" document and edit it</li>
    <li>Go to Tools &gt; Template and Add-Ins, select "Sample Format.dot" by clicking "Attach" and browsing to it, and then check "Automatically update document styles"</li>
    <li>For other documents, either repeat steps 4-5 or copy Content.doc</li>
    <li>Future changes should be made by editing the doc and then saving to dot (replacing the file), and they are applied the next time the content docs are updated (so close and reclose those other docs)</li>
</ol><p>If you make a style change in a content document, and you want it to be applied to all the content documents, you either manually adjust styles in Sample Format.doc, or you can copy the styles:</p>
<ol><li>Go to Content.doc and open Styles and Formatting frame</li>
    <li>Change "Show" to "Custom"</li>
    <li>In pop-up window, click "Styles"</li>
    <li>In next pop-up window, click "Organizer"</li>
    <li>Under the right-hand side (probably "Normal.dot"), click "Close File"</li>
    <li>Click "Open File" and select Sample Format.doc</li>
    <li>Copy select styles to that doc</li>
    <li>Close out of the wizard</li>
    <li>Open Sample Format.doc and save to Sample Format.dot</li>
</ol><p>For expert Words users, the Sample Format.doc document is unnecessary. With a bit of caution, you can use the style organizer to directly manage the .dot file. However, having a document that shows example formatting is also good practice, so this structure does create a maintainable and logical system for consistent styling of documents.</p></div></div></div>  </div>
</div>
