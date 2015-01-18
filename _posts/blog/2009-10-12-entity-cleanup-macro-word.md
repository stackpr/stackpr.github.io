---
title: Entity Cleanup Macro for Word
layout: post
category: blog
tags:
- VBA
- Microsoft Office
- Microsoft Word
permalink: /blog/2009/10/12/entity-cleanup-macro-word

---
{% include JB/setup %}
<div id="node-61" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The following VBA can be copied into a VBA module in Word to create a macro that does text replacements on the document. This particular case replaces a set of HTML entities that cluttered a web-based form. The pollution was caused by users pasting from Word to a textarea, which did not understand the multi-byte character set. This does not <em>solve</em> the problem, but it did convert the bad characters to readable characters that were nearly equivalent. Regardless, it is a template that can be used for basic, repetitive replacements.</p>
<h2>The Code</h2>
<p><em>Sorry about the bad character display. I'll try to make time to work on the FCK-Drupal interaction that shredded them.</em></p>
<p class="code">Dim mintCount As Integer<br />
Sub StripHtmlEntities()<br />
mintCount = 0<br />
' Reset the find/replace options.<br />
Selection.MoveStart<br />
Selection.Find.ClearFormatting<br />
Selection.Find.Replacement.ClearFormatting<br />
ReplaceString "&amp;acirc;€&amp;cent;", vbCrLf &amp; "-"<br />
ReplaceString "&amp;acirc;€™", "'"<br />
ReplaceString "&amp;Acirc;&amp;reg;", "(r)"<br />
ReplaceString "&amp;acirc;€&amp;ldquo;", "-"<br />
ReplaceString "&amp;acirc;€œ", """"<br />
ReplaceString "&amp;acirc;€�", """"<br />
MsgBox "A total of " &amp; mintCount &amp; " replacements were made."<br />
End Sub<br />
Private Sub ReplaceString(strFind As String, strReplace As String)<br />
    With Selection.Find<br />
        .Text = strFind<br />
        .Wrap = wdFindContinue<br />
    End With<br />
    Do While Selection.Find.Execute = True<br />
        mintCount = mintCount + 1<br />
        Selection.Text = strReplace<br />
        If mintCount &gt; 10000 Then Exit Sub<br />
    Loop<br />
End Sub<br />
 </p></div></div></div>  </div>
</div>
