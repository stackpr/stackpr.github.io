---
title: Command-Line Image Resize and Crop
layout: post
tags:
- Imagemagick

---
{% include JB/setup %}

Using ImageMagick (convert), you need the follow configurations

1. Resize to larger than the required box (note the "^"): -resize "2400x1260^"
2. Indicate that it should crop from both sides rather than from the bottom/right: -gravity center
3. Indicate the final cropped size: -crop 2400x1260+0+0
4. Discard intermediate image settings: +repage

The final command is:

<pre class="brush:bash">
convert input.png -resize "2400x1260^" -gravity center -crop 2400x1260+0+0 +repage output.png
</pre>
