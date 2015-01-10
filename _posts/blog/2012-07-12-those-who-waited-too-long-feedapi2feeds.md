---
title: For those who waited too long -- feedapi2feeds
layout: post
category: blog
tech:
- Drupal
- PHP
- Feeds
permalink: /blog/2012/07/12/those-who-waited-too-long-feedapi2feeds

---
{% include JB/setup %}
<div id="node-159" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The <a href="https://github.com/developmentseed/FeedAPI2Feeds">feedapi2feeds</a> module was provided to migrate from feedapi to feeds. It was last updated back in 2009, but continued development on the feeds module has broken the upgrade script (<a href="http://drupal.org/node/955388">see issue</a>). While it was not my approach, someone could theoretically install an old version of the feeds module, convert, and then upgrade the feeds module. I believe that this git command would shift the feeds module to the correct place: <em>git checkout bd4aa29802998b7f4d842a26c883a8a3931f62e3</em></p>
<p>However, I had both modules functioning on a site until I could deal with the migration, which was why I was ultimately unable (or decided not) to utilize the feedapi2feeds module. Fortunately, our use case was trivial. We sync RSS feeds to nodes -- all other applications had been moved to feeds without any need for historical data.</p>
<p>Here is a quick drush script that migrated a data type for me quickly. It is a quick-and-dirty script that violates some standards (e.g., no use of t()) and will not be polished for contribution since there is no apparent need for it, but I've provided here in case it might be of some help.</p>
<pre class="brush:php">
  $sql = "SELECT nid FROM {node} WHERE type = '<strong>feed_content_type_name</strong>' ORDER BY nid";
  foreach (db_fetch_col(db_query($sql)) as $nid) {
    // Update the feed config.
    $feed = node_load($nid);
    drush_print("Migrate $nid = " . $feed-&gt;title);
    $source = $feed-&gt;feed-&gt;url;
    $config = array(
      'FeedsHTTPFetcher' =&gt; array(
        'source' =&gt; $source
      ),
    );
    $sql = "REPLACE INTO {feeds_source} (id, feed_nid, config, source) VALUES ('feed', %d, '%s', '%s')";
    db_query($sql, $nid, serialize($config), $source);
    drush_print("Updated the source = $source", 3);
    // Migrate the current feed items.
    $sql = "SELECT * FROM {feedapi_node_item} INNER JOIN {feedapi_node_item_feed} ON nid = feed_item_nid WHERE feed_nid = %d ORDER BY nid";
    $result = db_query($sql, $nid); 
    $cnt = 0; 
    while ($row = db_fetch_object($result)) { 
      // nid, url, timestamp, arrived, guid 
      $sql = "REPLACE INTO {feeds_node_item} (nid, id, feed_nid, imported, url, guid, hash) " <span class="Apple-tab-span"> </span> 
           . "VALUES (%d, 'feed', %d, '%s', '%s', '%s', '')"; 
      db_query($sql, $row-&gt;nid, $nid, $row-&gt;arrived, $row-&gt;url, $row-&gt;guid); 
      $cnt++; 
      if ($cnt % 500 == 0) { 
        drush_print("Migrated $cnt items...", 3); 
      }
    } 
    drush_print("Migrated $cnt total items.", 3); 
  }</pre>
</div></div></div>  </div>
</div>
