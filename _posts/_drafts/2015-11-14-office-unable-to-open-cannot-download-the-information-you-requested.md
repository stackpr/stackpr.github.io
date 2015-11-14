---
title: Unable to open http://example.com... Cannot download the information you requested.
layout: post
category: blog
tags:
- Word
- Excel
- Office
references:
- title: ex
  link: http://blogs.technet.com/b/the_microsoft_excel_support_team_blog/archive/2011/11/15/quot-cannot-download-the-information-you-requested-quot-executing-web-query-from-excel.aspx
- title: ex
  link: http://superuser.com/questions/126157/error-opening-hyperlinks-in-excel-2003

---
{% include JB/setup %}

Basically, this error appears for any link that returns HTTP/1.1 403 Forbidden

Hack that seems to work... When 403 (or similar) is about to be delivered, send 200 instead based on the user agent.
