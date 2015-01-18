---
title: Drupal and MySQL "Row size too large" Error
layout: post
category: blog
tags:
- Drupal 6
permalink: /blog/2014/09/02/drupal-and-mysql-row-size-too-large-error

---
{% include JB/setup %}
<div id="node-337" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I encountered a MySQL bug that intersected in an unfortunate way with how Drupal (D6) functions. The result was a big red box with this message:</p>
<p><em>User warning</em>: <em>Row size too large. The maximum row size for the used table type, not counting BLOBs, is 8126. You have to change some columns to TEXT or BLOBs query: content_write_record ...</em></p>
<!--break-->
<p>The table was almost entirely LONGTEXTs, which seems like it should address the error. However, as the <a href="http://bugs.mysql.com/bug.php?id=63507">official MySQL bug report</a> explains, each of those LONGTEXTs could still use up to 768 bytes. Drupal's part of the problem is how it stores all fields for a node type in a single table as long as (1) there is only one of the field per node, and (2) the field is not used on any other node types.</p>
<p>The best solution would probably be the ability to vertically split a content type's table, either automatically or by manually selecting fields. However, that is a highly-invasive feature that would risk destabilizing a rather large codebase -- and we need the fix faster.</p>
<h2>
	The Easier Solution</h2>
<p>The easier solution is to take advantage of the 2nd condition noted above. Simply create a node type that will not be usable by any roles -- I named mine "Table Splitter". Then, simply add fields to that node type that are otherwise stuck on the main node table. As soon as you add the field to the new node type, the field will be moved to its own table.</p>
<p>As mentioned before, this is not the ideal solution. Unlike a vertical split feature that might use 2 tables, this creates a much larger number of tables. However, it is quick, safe and predictable -- and its downsides are largely be mitigated using the various content caching strategies that you likely already have in place.</p>
</div></div></div>  </div>
</div>
