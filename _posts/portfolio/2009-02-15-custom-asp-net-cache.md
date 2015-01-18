---
title: Custom ASP.Net Request-Level Caching
layout: post
category: portfolio
tech:
- ASP.Net
- C#
team:
- SRA
position:
- Developer
- Project Manager
permalink: /portfolio/custom-asp-net-cache
images:
- minnkotamotors motor page.png
references:
- title: High Aggregation Page - Motors
  link: http://www.minnkotamotors.com/products/trolling_motors/freshwater_bow_mount/fortrex.aspx

---
{% include JB/setup %}
<div id="node-26" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Ektron CMS provided the ability for a high level of interaction between various types of content. Some interaction was achieved through creating templating, but the bulk of the interaction was achieved through complex use of the Ektron API. Unfortunately, as the complexity increased, so did the number of computations necessary to render a single page. Ektron's url aliasing conflicts with built-in ASP.Net page-level caching, so I built a workaround.</p>
<!--break-->
<p>The pages use the Microsoft Cache system within the master templates to simulate page caching. Since it is an in-memory cache, the cache has to be rebuilt each time the web site is restarted, or when the application pool is flushed. Overall, these highly complex pages have load times similar to static content served by IIS. This was a big technological win, and more details will be posted later.</p></div></div></div>  </div>
</div>
