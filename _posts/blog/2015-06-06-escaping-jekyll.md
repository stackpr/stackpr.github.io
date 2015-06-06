---
title: Escaping Jekyll for GitHub Pages Sites
layout: post
category: project
tags:
- Jekyll

---
{% include JB/setup %}

GitHub Pages (Jekyll) is heavily reliant upon `{{ "{%" }}` and `{{ "{{" }}`.
Unfortunately, writing a tutorial about using it is challenging since those character patterns are escaped.

The simplest way to escape the special characters is to do the following:

- `{{ "{%" }}` is escaped as `{{ "{{" }}{{ "{{" }} "{{ "{{" }}%" }}`
- `{{ "{{" }}` is escaped as `{{ "{{" }}{{ "{{" }} "{{ "{{" }}{{ "{{" }}" }}`

The alternatives would include either using a hidden character (would not allow copy-paste) or a modifying your theme to translate an alternate character pattern for those identified above.
Unless the bulk of your posts include Jekyll examples or character patterns, replacing the strings above is probably your best bet.
