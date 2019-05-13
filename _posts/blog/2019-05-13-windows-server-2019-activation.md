---
title: "0x80070490: The product key you entered didn't work"
layout: post
category: blog
tags:
- Windows Server 2019
- Windows Server
references:
- title: Microsoft
  link: https://techcommunity.microsoft.com/t5/Windows-Server-Insiders/Windows-Server-2019-install-product-key-not-working/td-p/193071
- title: Reddit
  link: https://www.reddit.com/r/sysadmin/comments/9lx6f5/server_2019_product_key_woes/

---
{% include JB/setup %}

## Problem 1

When attempting to activate Windows Server 2019 after installation is already complete generates the error code "0x80070490: The product key you entered didn't work".

## Solution 1 (Bad)

Reinstall Windows and input the license code during installation

## Solution 2 (Good)

Activate Windows using the command-line. The error seems to be limited to the GUI.

```
c:\Windows\System32\slmgr.vbs /ipk [LICENSE_MAK_KEY]
```
