---
title: Remove Drupal XML Sitemap Fieldset from a Node Form
layout: post
category: blog
tags:
- Drupal
permalink: /blog/2012/08/07/remove-drupal-xml-sitemap-fieldset-node-form

---
{% include JB/setup %}
<div id="node-189" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The node add/edit form shows the "XML Sitemap" fieldset for any node when the user has the "administer xmlsitemap". However, even administrative users deserve some level of usability tweaks. However, the module_list() function sorts by weight and then by name, and the module's "x..." name causes it to fire last even among modules with the same weight. This is a prime example of the shortcomings that can arise when there are within-hook prerequisites.</p>
<p>Given the infrequency of such problems, I decided to simply deal with it. To programmatically hide the xmlsitemap fieldset from certain nodes without any major code adjustments, you simply need to make xmlsitemap_node load before your module (the weight must be less than your module's weight):</p>
<pre>
UPDATE {system} SET weight = -1 WHERE name = 'xmlsitemap_node'</pre>
<p>And then hide the fieldset using #access settings as you normally would within your module's form_alter.</p>
<p>In Drupal 7, there is a much (much much much) better solution when they added <a href="http://api.drupal.org/api/drupal/modules%21system%21system.api.php/function/hook_module_implements_alter/7">hook_module_implements_alter</a> to <a href="http://api.drupal.org/api/drupal/includes!module.inc/function/module_implements/7">module_implements</a>. That function would allow you to enforce (and cache) within-hook prerequisites so that module X could ensure that module Y's hook_form_alter is called first.</p>
<p>Someone else has also <a href="http://drupal.org/node/1219636">looked into this</a>, but I did not find any evidence that there was enough demand to justify new custom settings on the node type form.</p>
</div></div></div>  </div>
</div>
