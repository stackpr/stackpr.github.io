---
title: Drupal Read Replicas on RDS
layout: post
category: blog
tech:
- Amazon RDS
- MySQL
- Drupal
permalink: /blog/2011/07/24/drupal-read-replicas-rds
images:
- cloudwatch-rds.png

---
{% include JB/setup %}
<div id="node-188" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Drupal support for async MySQL replication has been a hot topic for quite some time as an essential element for scaling Drupal for read-intensive web sites. <a href="http://buytaert.net/database-replication-lag">Even Dries has chimed in on the discussion.</a> Drupal 7 takes some nice steps forward, but I was locked into Drupal 6 for long enough to work on a solution. A variety of people on the web have looked at ways to auto-detect whether to use a slave (read replica) for any given query, and I have tweaked the system over time such that there are no further known issues. As you might expect, one limitation of this approach is that we have to be conservative when sending queries to the read replica, and that means that it is never fully utilized on any given request.</p>
<!--break-->
<p>I use Amazon Web Services, and RDS read replicas provide the context for the implementation. A few lessons learned that might be RDS-specific:</p>
<ol><li>
		If a read replica gets more than 60 seconds out of date, it will probably not catch up - time to relaunch.</li>
	<li>
		If a read replica is less than about 20 seconds out of date, there is a good chance it will catch up.</li>
	<li>
		Using MyISAM tables is dangerous. INNODB provides a much more stable engine for replication. As <a href="http://aws.amazon.com/rds/faqs/#129">Amazon points out</a>, INNODB is much better for crash recoverability and data stability. I've seen MyISAM break a read replica entirely.</li>
</ol><p>The specific use case I targeted is that we have a predictable spike in database traffic one day each week when we send out automated Weekly Updates (WU). The WU requires multiple node loads for upwards of 1000+ users, and launching a read replica for that timeframe allows us to offload the bulk of that work to a separate RDS instance. One element of such dynamic scaling that many vendors do not focus on is the ability to reduce scale after a spike, while RDS can handle that naturally. But I digress...</p>
<p>I am not providing a patch because the implementation was on a patched core, and the logic might not be generalizable. However, here is the series of if-conditions that created a reliable environment for us:</p>
<pre class="brush:php">
&lt;?php
// Track how many queries to use master against.
// This is generally a flag of whether to use master for this query.
// Setting to -1 means that you would use master for the rest of the request.
if ($master_for_next &gt;= 0) {
  $master_for_next--;
}
// Look at the first X characters to keep the string operations fast on long queries.
$query = ltrim(strtoupper(substr($query, 0, 128)));
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  $master_for_next = -1; // Will always trigger.
}
elseif (preg_match('@(?:LAST_INSERT_ID|SEMAPHORE|ORG_DRUPAL_SESSIONS)@', $query)) {
  if ($master_for_next == 0) { // Avoid changing -1 to 1.
    $master_for_next = 1;
  }
}
elseif (substr($query, 0, 6) != 'SELECT' || strpos($query, 'INTO') !== FALSE) {
  // We cannot select the changed rows until they sync to the slave.
  if ($master_for_next  &lt; 0) {
    // Do nothing. The slave is effectively disabled.
  }
  elseif (preg_match('@INTO ORG_DRUPAL_(?:ACCESSLOG|HISTORY)@', $query) &amp;&amp; !function_exists('drush_print')) {
    // Temporarily resume writing to the db.
    // If it is &gt;0, then no need to increment it.
    if ($master_for_next == 0) {
      $master_for_next =  1;
    }
  }
  elseif (preg_match('@INTO ORG_DRUPAL_(?:CACHE(?:_MENU|_VIEWS)? )@', $query)) {
    // Inserting into some tables is safe without any lasting request implications.
    // If it is &gt;0, then no need to increment it.
    if ($master_for_next == 0) {
      $master_for_next =  1;
    }
  }
  else {
    // This is a non-SELECT query that might not be safe.
    // Depending on your tolerance for risk, either set to a number around 4 
    // (to create a race condition where you just need the replica to sync before the
    // next read) or set to -1 to stop utilizing the read replica
    $master_for_next = 4;
  }
}
$use_master = (bool) $master_for_next;
?&gt;</pre>
<h2>
	Key Assumptions</h2>
<ol><li>
		The read replica is sufficiently up-to-date when the request starts for GET (read-only, per best practices) requests.</li>
	<li>
		The last condition references a race condition, which is only acceptable if the writes being done are in-line with best practices for GET requests such that the race does not matter. Namely, the only database implications for GET requests should effectively be log entries. Anything that affects substantive data should be submitted via POST or on the command-line.</li>
	<li>
		The reference above to best practices for GET is a pretty major assumption when you use a wide range of contrib modules. Any number of them might make substantive database adjustments on a GET request. Thus, this patch technique requires some research and a significant amount of testing and monitoring for several months.</li>
</ol><p>The attached screenshot shows how the temporary read replica absorbs the bulk of the load during the relevant window. In fact, there is virtually no movement in the CPU required of the master. This setup has not encountered any issues related to this configuration in over 6 months (the configuration was tweaked at that point).</p>
</div></div></div>  </div>
</div>
