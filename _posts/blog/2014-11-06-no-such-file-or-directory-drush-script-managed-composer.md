---
title: '"No such file or directory" in drush script managed with composer (PHP)'
layout: post
category: blog
tags:
- Composer
- Github
permalink: /blog/2014/11/06/no-such-file-or-directory-drush-script-managed-composer
published: false

---
{% include JB/setup %}

## Problem

When executing `./bin/drush` within a composer-managed project on Linux, I received this error:
``` sh
# ./bin/drush
: No such file or directory
```

## Investigation

Eventually, it became apparent that the drush script was failing to execute because it could not find the interpretter. The cause became apparent with this debug info:
```sh
head -1 ./vendor/drush/drush/drush | od -c
0000000   #   !   /   u   s   r   /   b   i   n   /   e   n   v       s
0000020   h  \r  \n
0000023
```

As you can see, there is a carriage return (`\r`), which means that the Linux shell script had Windows line-endings.
The \r character prevented proper discovery of the interpretter.

## Solution

1. Edit ~/.gitconfig (or other git config file) to add autocrlf=input.
2. Delete ./vendor/drush/drush folder
3. Update using composer to clone a fresh copy of drush with proper line endings.

```
# cat ~/.gitconfig
[core]
  autocrlf = input
... (your other settings)
# rm -rf ./vendor/drush/drush
# composer update
```
