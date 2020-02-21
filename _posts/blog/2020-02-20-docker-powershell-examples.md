---
title: "Docker Powershell Examples"
layout: post
category: blog
tags:
- Docker
- Windows
- PowerShell

---
{% include JB/setup %}

## Combine PDFs in current directory using pdftk

```
docker run -v ${PWD}:/work mnuessler/pdftk a.pdf b.pdf c.pdf cat output combined.pdf
```
