---
title: MySQL's MAX() is slow 5 years later
layout: post
category: blog
tags:
- MySQL
permalink: /blog/2011/04/06/mysqls-max-slow-5-years-later

---
{% include JB/setup %}
<div id="node-109" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>As early as 2006, it <a href="http://forums.mysql.com/read.php?24,83639,83639#msg-83639">was noted</a> that the MAX() function is sometimes quite slow in a MySQL database. In fact, there are less clear references going further back than that. The easy-to-read MAX() query below was about 20-30 times slower than the second version that yields the exact same result:</p>
<ol><li>
		SELECT MAX(clicked) FROM {directmail_log}</li>
	<li>
		SELECT clicked FROM {directmail_log} WHERE clicked IS NOT NULL ORDER BY clicked DESC LIMIT 1</li>
</ol><p>I assume that it recomputes the max and stores it with each row it looks at. That would be pretty wasteful for this basic query, but it would make sense in the context of other queries that have multiple aggregate functions (e.g., MIN, MAX and SUM in the same call). However, given that this problem is more than 5 years old, it would be nice for the engine to have an optimization for each of the basic aggregate functions so that they are at least fast in basic queries.</p>
<p>That assumption is somewhat established by the EXPLAIN. When using the order by, MySQL is able to use filesort. Apparently, that underlying technology is much faster than the in-memory computation.</p>
</div></div></div>  </div>
</div>
