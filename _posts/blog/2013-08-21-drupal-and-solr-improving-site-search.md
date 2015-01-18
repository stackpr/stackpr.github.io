---
title: Drupal and Solr - Improving Site Search
layout: post
category: blog
tags:
- Drupal
- Solr
- Lucene
permalink: /blog/2013/08/21/drupal-and-solr-improving-site-search

---
{% include JB/setup %}
<div id="node-272" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The default site search has various limitations, especially when there is a vast amount of content with diverse applications. When products, blog posts, promotional content and member content all appears within a search, the results are challenging to wade through. Even to get to that point, Drupal builds an enormous table in the database. Backing up that data and rebuilding the index have both created problems in my specific use case. To address these problems (and some other shortcomings), I installed the Facet API and Solr modules.</p>
<!--break-->
<p>Now, a user can specify whether they are looking for products or blog posts, the results come with spelling suggestions, and the results are lightning-fast. The Lucene index (that powers Solr) is easy to optimize and backup using Amazon EBS snapshots. Solr's JSON API opens new integration and web services possibilities.</p>
<p>It is all very exciting, and I dare say that it was foolish to wait so long to install. Especially if you run Ubuntu, the installation is trivial. I have included all of the references I used during installation below. Good luck!</p>
<h2>
	References</h2>
<ol><li>
		<a href="https://github.com/sunspot/sunspot/wiki/Configure-Solr-on-Ubuntu,-the-quickest-way">Configure Solr on Ubuntu, the quickest way · sunspot/sunspot Wiki</a></li>
	<li>
		<a href="http://wiki.apache.org/solr/UpdateJSON#Example">UpdateJSON - Solr Wiki</a></li>
	<li>
		<a href="https://drupal.org/project/facetapi">Facet API | drupal.org</a></li>
	<li>
		<a href="http://drupal.org/project/apachesolr">Apache Solr Search Integration (Module) | drupal.org</a></li>
	<li>
		<a href="http://drupal.org/node/343467">Apache Solr Search Integration (Documentation) | drupal.org</a></li>
	<li>
		<a href="http://drupal.org/node/443980">Troubleshooting Solr | drupal.org</a></li>
	<li>
		<a href="https://drupal.org/project/apachesolr_exclude_node">Apache Solr Exclude Node | drupal.org</a></li>
</ol></div></div></div>  </div>
</div>
