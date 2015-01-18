---
title: Working with XML in PHP
layout: post
category: blog
project:
- /project/quipxml
tags:
- PHP
permalink: /blog/2014/03/13/working-xml-php

---
{% include JB/setup %}
<div id="node-326" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>PHP has several built-in strategies for handling XML, but each comes with its own limitations (e.g., DOM is verbose, SimpleXML has limited creation capabilities). The weakness of built-in solutions has led to a proliferation of XML libraries. <a href="http://stackoverflow.com/questions/3577641/how-do-you-parse-and-process-html-xml-in-php">Stack Overflow has a post that identifies 13+ substantial projects</a>. The syntax of many of the projects has been influenced by jQuery, and several of the projects (e.g., phpQuery and QueryPath) explicitly attempt to replicate jQuery functionality. As with any crowded open source space, some of the projects have been forked or abandoned as other projects gain more traction (e.g., phpQuery appears abandoned but QueryPath lives on).</p>
<p>From my perspective, the most prominent solutions are <a href="http://querypath.org/">QueryPath</a>, Symfony's <a href="http://symfony.com/doc/current/components/dom_crawler.html">DomCrawler</a> and <a href="http://fluentdom.org">FluentDOM</a>. Of course, that perception is largely biased by my technology stack since that largely guides my reading.</p>
<p>However, I am not a fan of the significant amount of code each of those projects requires to even load a small XML document. Additionally, the internal state strategy that complicates storing references to multiple positions in the document highlights the fact that the complexity comes with some performance hits.</p>
<p>When I started the research, I was really just looking for a project that plugged a few holes in the SimpleXML functionality. SimpleXML is fast since it is compiled into PHP, and it is very simple to use. In the end, I opted to create a lightweight wrapper that adds a few small missing features to SimpleXML without creating the extreme bloat of the libraries above. In the end, it took fewer than 500 lines (with comments) to accomplish what I wanted.</p>
<p>Using <a href="/project/quipxml">QuipXML</a>, XPath queries are chainable, the DOM can be manipulated easily, and there are a handful of trivial traversal functions.</p>
</div></div></div>  </div>
</div>
