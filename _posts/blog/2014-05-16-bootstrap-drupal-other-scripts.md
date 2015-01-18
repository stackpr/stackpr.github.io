---
title: Bootstrap Drupal from other scripts
layout: post
category: blog
tags:
- Drupal 6
- PHP
permalink: /blog/2014/05/16/bootstrap-drupal-other-scripts

---
{% include JB/setup %}
<div id="node-335" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Drupal 7 has an <a href="https://drupal.org/node/1436272">issue</a> discussing some strategies for inclusion. However, I wanted to accomplish a similar task in Drupal 6. One flaw with triggering the standard Drupal bootstrap is that it attempts to handle the request. A strategy that was more successful for me, at least within the context of command-line scripts, was to bootstrap Drupal via Drush to avoid the Drupal FrontController pattern. The code was pretty simple.</p>
<!--break-->
<pre class="brush:php">
define('DRUPAL_ROOT', "/path/to/site");
include_once '/path-to-DRUSH-module-directory/includes/bootstrap.inc';
drush_bootstrap_prepare();
drush_set_option('root', DRUPAL_ROOT);
drush_bootstrap(DRUSH_BOOTSTRAP_DRUPAL_FULL);
</pre>
<p>Drush creates some listeners, so you should be aware of their impact. For instance, if you exit(), then you will see "Drush command terminated abnormally due to an unrecoverable error." As long as the script runs to the end, however, the impact is still far less than a full Drupal bootstrap.</p>
</div></div></div>  </div>
</div>
