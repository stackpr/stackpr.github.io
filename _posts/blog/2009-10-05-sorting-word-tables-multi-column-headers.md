---
title: Sorting Word tables with Multi-column Headers
layout: post
category: blog
tech:
- Microsoft Office
- Microsoft Word
permalink: /blog/2009/10/05/sorting-word-tables-multi-column-headers

---
{% include JB/setup %}
<div id="node-58" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Silly little problem today... I was working on a table that had column-spanning headers (one header over two columns). I sorted the table by the first column, and it worked fine. However, sorting by any of the other columns was fickle at best. As it turns out, sorting by later columns only worked coincidentally when it worked at all.</p>
<h2>Word's Limitation</h2>
<p>The table sort interface suggests that Word distinguished based on the header row, which seems great. However, it apparently converts the column selections to ordinal values. Thus, if you select the third heading, it will sort by the third column on each row - not necessarily by the column that appears under the header. When you introduce merged cells, this becomes a problem. You can sort by the first merged header because its position is unchanged, but any headers to the right of a merged header will have the wrong position count (off by 1 for each cell that does not appear).</p>
<h2>Solution</h2>
<p>There are at least two easy ways to address this limitation:</p>
<p><strong>Option 1:</strong> you can select all of the rows except for the headers. Then, you can select the correct columns to use for the sort. This does not let you select by header name, and it also does not let you select the entire table.</p>
<p><strong>Option 2:</strong> You can split the header cells apart long enough to sort. This does create more work before/after the sort, but it allows you to select by header name, and you can still select the table quickly with your mouse.</p></div></div></div>  </div>
</div>
