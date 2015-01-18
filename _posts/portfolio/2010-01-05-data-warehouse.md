---
title: Data Warehouse
layout: post
category: portfolio
tags:
- PHP
- Drupal
- Google Visualization API
position:
- End-to-end
permalink: /portfolio/data-warehouse
images:
- warehouse_graphs_0.png
- warehouse_graphs_1.png

---
{% include JB/setup %}
<div id="node-103" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I added some very useful data warehousing functionality to Drupal. Although the schema allows for the addition of dimensions, the warehouse currently focuses on handling metrics with various scopes and methods of aggregation. Facts that would normally have been distinguished using dimensions are currently being distinguished via adding extra data to the metric names. That data might be separated later if the number of metrics becomes unwieldy in a way that justifies the time required to separate the elements.</p>
<!--break-->
<p>Most aspects of the system are implemented using hooks to maintain consistency with other Drupal modules. Hooks include identifying scopes for the time dimension, identifying metrics, and computing both current and historical facts for the metrics over time. Some metrics include CPU usage, disk usage, node counts (and other DB stats), QB-based accounting figures, Google Analytics data, Facebook likes, twitter likes, Youtube views, and many other metrics that can be harvested from our growing repository of data.</p>
</div></div></div>  </div>
</div>
