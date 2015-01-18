---
title: Stored Procedures in Drupal on MySQL RDS
layout: post
category: blog
tags:
- Drupal
- MySQL
- Amazon EC2
- Amazon RDS
permalink: /blog/2012/08/16/stored-procedures-drupal-mysql-rds

---
{% include JB/setup %}
<div id="node-118" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I find the option of stored procedures to be very appealing for a variety of purposes. Among other things, I've seen plenty of extremely complex SQL queries that only change by one parameter, which means that they could be wrapped up into a call that would require significantly less PHP markup and significantly less network traffic between the web and database servers. Add multi-query procedures, and the procedures would be even better.</p>
<!--break-->
<p>In the end, I decided not to pursue stored procedures right now because:</p>
<ol><li>
		There is no Drupal-centric way to create or manage them</li>
	<li>
		A stored procedure would be unable to leverage the Drupal hook techniques as intended, especially <a href="http://api.drupal.org/api/drupal/includes!database.inc/function/db_rewrite_sql/6">db_rewrite_sql</a></li>
	<li>
		Beyond network bandwidth savings, MySQL procedures may not have the performance boost that might be expected due to the scope of availability of compiled functions</li>
	<li>
		MySQL read replicas (and therefore RDS read replicas) are unreliable with most non-deterministic functions</li>
	<li>
		On top of all that bad news, it was going to take tweaking of permissions to even get to where I could test</li>
</ol><p>Although procedures might be an amazingly effective solution, the research was all so pessimistic that I've decided not to commence with testing at this point. It will remain at the front of my mind -- hopefully a use case will justify further research, development and testing.</p>
<h3>
	References</h3>
<ol><li>
		<a href="http://drupal.org/node/119781">Stored procedure within Drupal</a> or <a href="http://programmingbulls.com/patch-execute-mysql-stored-procedures-drupal">here</a></li>
	<li>
		<a href="http://blog.peterdelahunty.com/2010/10/stored-procedures-on-amazon-rds.html">Stored procedures permissions (and more) on RDS</a></li>
	<li>
		<a href="http://www.joinfu.com/2010/05/mysql-stored-procedures-aint-all-that/">MySQL performance problems</a></li>
	<li>
		<a href="http://stackoverflow.com/questions/6368985/mysql-stored-procedures-use-them-or-not-to-use-them">Debate over stored procedures, with excellent points on both sides</a></li>
	<li>
		<a href="https://forums.aws.amazon.com/thread.jspa?messageID=198765">Do not use non-deterministic functions</a></li>
	<li>
		<a href="http://dev.mysql.com/doc/refman/5.0/en/create-procedure.html">How MySQL uses deterministic functions</a></li>
</ol></div></div></div>  </div>
</div>
