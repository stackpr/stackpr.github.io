---
title: Insert a Drupal View into a Book or a Node
layout: post
category: blog
tags:
- Drupal
permalink: /blog/2009/09/24/insert-drupal-view-book-or-node

---
{% include JB/setup %}
<div id="node-55" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Views are a convenient and powerful way to aggregate node content. Although the Views interface has built-in support for paths and menus, it does not give you the ability to insert it into a book. Additionally, inserting the view directly into a node requires either <a href="http://drupal.org/node/47417">using PHP</a> to render the view programmatically or installing a module like <a href="http://drupal.org/project/insert_view">insert_view</a>. Neither of these is particularly clean, and both have usability problems when you have non-technical editors</p>
<h2>Solution</h2>
<p>Create a <a href="http://drupal.org/node/209931">Panel Node</a> and load the view into the panel. This technique provides a few benefits over the php/insert_view approaches:</p>
<ol><li>You can now insert the panel node into a book outline</li>
    <li>You can switch to a different view by editing the panel - less transition time</li>
    <li>You can aggregate multiple views into the same node</li>
    <li>There is no PHP or precise syntax exposed to the user</li>
</ol><p>To create a Panel Node, go to the Panels dashboard in Drupal.</p>
<h2>Warning</h2>
<p>The panel node will wrap panel classes around the view. Thus, you may have to revise your CSS if you develop the view outside of the panel node first.</p></div></div></div>  </div>
</div>
