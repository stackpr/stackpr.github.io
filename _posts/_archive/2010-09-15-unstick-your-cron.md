---
title: Unstick your cron
layout: post
category: blog
tags:
- Drupal
- Drush
permalink: /blog/2010/09/15/unstick-your-cron

---
{% include JB/setup %}
<div id="node-96" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>drush eval 'variable_set("cron_semaphore", FALSE);'</p>
<p>If a cron is interrupted somehow (e.g., a mysql restart), then you can unstick your cron by setting the cron_semaphore to false. An easy way to do this quickly is using drush. Otherwise, you have to be patient, or you have edit MySQL and clear the cache. Worse yet, you might create a special page for it. All said and done, you should have drush available so you can do quick fixes like this.</p>
</div></div></div>  </div>
</div>
