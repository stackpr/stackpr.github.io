---
title: Git Detached Head
layout: post
category: blog
tags:
- git

---
{% include JB/setup %}

Simple reminder of how to fix a detached head in a submodule.

<pre class="brush:bash">
# git submodule update path-to-sub
# cd path-to-sub
# git status
HEAD detached at 38f1510
# git branch detached-head 38f1510
# git checkout master
# git merge detached-head
# git branch -d detached-head
</pre>
