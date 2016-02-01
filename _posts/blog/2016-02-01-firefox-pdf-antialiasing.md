---
title: PDF font rendering problem in Firefox
layout: post
category: blog
tags:
- PDF
- Firefox
- Acrobat
permalink: /project/ex
images:
- firefox-pdf-antialias-bad.png
- firefox-pdf-antialias-good.png

---
{% include JB/setup %}

Dating back to at least 2013 ([ref](https://support.mozilla.org/en-US/questions/954489)), people have reported PDF rendering issues in Firefox for PDFs that render properly in other viewers.
Many of the problems seem to relate to the use of embedded fonts that are available as system fonts, although that does not provide a pathway to a reliable solution.
Many of the "solutions" involve changing browser settings, which is also unreasonable for a public web site.

I am still seeing the problem in 2016 using Firefox 44.

## Solution for me

Using Acrobat Pro DC (instructions should work with other verions), I was able to correct the problem by setting the PDF background to white.

Process:
1. Go to Edit PDF tool
1. Click More > Background > Add (or Update)
1. Select "From color" and make sure it is set to a true white
1. Click OK and save the PDF
