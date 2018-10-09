---
title: Flatten SVG for transparent cutouts and web font creation
layout: post
category: blog
tags:
- SVG
- Fonts
- Icons
references:
- title: fill-rule documentation
  link: https://www.w3.org/TR/SVG11/painting.html#FillRuleProperty
- title: Example cutout
  link: http://stackoverflow.com/questions/22579508/subtract-one-circle-from-another-in-svg

---
{% include JB/setup %}

## Problem: Multi-layer SVG

Suppose that you have an SVG that layers a white layer (path) on top of a black layer (path) to simulate a mask.
Unlike rasterized graphics, you cannot simply flatten and cut out the images.

One specific case that does not support the overlays is when the SVG is going to be converted to a web font.
The web icon font strategy requires that each vector icon be monochromatic and that it rely on transparency rather than overlays.

## Solution: fill-rule=evenodd

1. Convert shapes to paths -- [circle converter](http://complexdan.com/svg-circleellipse-to-path-converter/)
1. Simplify the surrounding XML to avoid competing problems
1. Combine all of the paths into a single path
1. The first path should be the "background" -- all subsequent paths are cut out
1. Add `fill-rule="evenodd"` to the path

### Basic XML

<pre>
<?xml version="1.0"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">

<svg xmlns="http://www.w3.org/2000/svg"
 width="256" height="256">
   <g>
     <path d="M .... z
     M .... z
     M .... z
     M .... z" fill-rule="evenodd"/>
   </g>
</svg>
</pre>


