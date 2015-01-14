---
layout: page
title: Recent Posts
tagline: blog and portfolio
---
{% include JB/setup %}

<ul class="posts">
  {% for post in site.posts %}
  	{% unless site.JB.hide_categories contains post.category %}
  	  <li><span>{{ post.date | date_to_string }}</span> &raquo; <a href="{{ BASE_PATH }}{{ post.url }}">{{ post.title }}</a>
  	  {{ site.JB.hide_categories }} vs {{ post.category }}
  	  ...
  	  </li>
  	{% endunless %}
  {% endfor %}
</ul>
