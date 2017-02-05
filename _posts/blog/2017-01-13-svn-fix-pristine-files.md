---
title: "'Fixing SVN: svn: E000002: Can't open file '***/.svn/pristine/xx/xx***.svn-base': No such file or directory'"
layout: post
category: blog
tags:
- Linux
- Subversion

---
{% include JB/setup %}

## Problem

svn: E000002: Can't open file '/path/to/working/copy/.svn/pristine/da/da39a3ee5e6b4b0d3255bfef95601890afd80709.svn-base': No such file or directory

The error happens when the data in the sqlite database becomes inaccurate and svn deletes a file it errantly believes is no longer in use. 
You can read more details regarding the [underlying database issue](http://vcs.atspace.co.uk/2012/06/20/missing-pristines-in-svn-working-copy/), as well as consider a commercial solution.

## Free Solution

Fortunately, the pristine files are not unique to a specific working copy.

1. Check out a new working copy of the repository, narrowing to the affected directory (if the repo is large and you know the directory that caused the problem)
2. Copy the pristine file. Copy the path from the error message starting with ".svn/pristine/****" to easily find the right file.
