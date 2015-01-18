---
title: Importing into RDS
layout: post
category: blog
tags:
- Amazon RDS
permalink: /blog/2011/04/09/importing-rds

---
{% include JB/setup %}
<div id="node-110" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Moving to RDS requires importing your database into theirs. As with any over-the-network database import, there is definitely a time factor involved as I waited for the data to transfer.</p>
<!--break-->
<p>Fixed a few problems:</p>
<ol><li><a href="http://yoodey.com/full-guide-how-using-amazon-rds-toolkit-ubuntu-ami-create-and-modify-group">Support especially long insert queries.</a> With my entire 5G database, only one query exceeded the default maximum query length, but one is enough to justify the adjustment.</li>
<li>Import the views without access to the SUPER privilege. The key is to remove the DEFINER line. That relies on rules that may not exist in RDS. A simple <code>egrep -v DEFINER</code> can remove the (generally unnecessary) line that generates errors: <code>/*!50013 DEFINER=`cpnp`@`localhost` SQL SECURITY DEFINER */</code>.</li>
<li>Support larger group_concat() values: <code>rds-modify-db-parameter-group mydbparam --parameters "name=group_concat_max_len,value=1048576,method=immediate"</code></li>
</ol></div></div></div>  </div>
</div>
