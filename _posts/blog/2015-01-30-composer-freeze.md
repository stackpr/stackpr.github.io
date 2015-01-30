---
title: Composer Freezes During Update (require-dev)
layout: post
category: blog
tags:
- PHP
- Composer

---
{% include JB/setup %}

<pre class="brush:sh">
C:\path\to\project>composer update
Loading composer repositories with package information
Updating dependencies (including require-dev)
Terminate batch job (Y/N)?
</pre>

When run in verbose mode (-vvv), I found that it was hanging on this URL:

<pre class="brush:sh">
[22.8MB/6.12s] Downloading https://packagist.org/p/provider-stale$1dd2169726dc85ef70959e8ef349c5344fef820de4995ae9ffd1789c19795f7b.json
</pre>

A quick check showed that the provider document was now 404. Apparently, composer expects you to keep your
installation and URL database relatively up-to-date. The solution was relatively simple. Clear the cache so
that composer looks for updated URLs. Run:

<pre class="brush:sh">
composer clearcache
composer update
</pre>
