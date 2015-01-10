---
title: Dynamic Fundraising Thermometer from SVG
layout: post
category: blog
tech:
- SVG
- ImageMagick
- PHP
permalink: /blog/2013/11/20/dynamic-fundraising-thermometer-svg
images:
- thermometer_400x400.png
- thermometer_400x400_2500.png
- thermometer_400x400_6000.png

---
{% include JB/setup %}
<div id="node-295" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>With the excitement of a donor offering a match for the month of December, I was tasked with prepping a fundraising thermometer. The specs were relatively straightforward: (1) control the format of the thermometer, (2) update it automatically, (3) support unexpected spikes in traffic, and (4) abide by our standard browser support requirements.</p>
<!--break-->
<h2>
	Decision-Making Process and Solution</h2>
<p>My first stop was to see check for a free high-quality web service. While I found several (see alternatives below), I wanted a more modern look without a link to their web site in the credits. The credits issue really forces the build-it-yourself path.</p>
<p>My preference for dynamic image generation would be to use SVG. When applicable, I rely on Google Visualizations, which falls back to VML for old versions of Internet Explorer. Although neither are supported on some mobile browsers, the combination reaches our key limiting browser requirement of IE8. Unfortunately, there is no standard visualization for a fundraising thermometer (some bar charts could serve the same purpose). Additionally, the chart was going to be used in pre-scheduled bulk email communications. Even if I were to work around the browser limitations, email client limitations seemed to flag the JS-oriented path as entirely futile (e.g., no HTML5 shims for email).</p>
<p>This leads me to the final decision of how to create the image - a potentially cumbersome strategy of last resort. PHP has some sophisticated image manipulation tools at its disposal in the form of ImageMagick and GD. My preference is ImageMagick, especially since it has an excellent command-line interface as well. However, manually creating the entire image from scratch seemed unnecessarily complicated. Instead, I created a SVG file using <a href="http://inkscape.org">Inkscape</a>, and then I wrote a simple script to adjust the XML based on donations received and convert it to a PNG that could be viewed without any problems. Using this technique, the PHP only has to modify the red and the text without directly handling any font settings or the construction of the rest of the image. Very straightforward.</p>
<h2>
	Necessary Installations (Ubuntu)</h2>
<p>If you consider doing this, you will hopefully have most of the key libraries installed. This assumes that you have a functioning Ubuntu server with PHP. You need to have ImageMagick installed (you probably do), and this particular SVG file requires Arial (you may not have it installed).</p>
<pre class="brush:bash">
apt-get install imagemagick msttcorefonts</pre>
<h2>
	Image Update Script (PHP)</h2>
<p>This script is conspicuously lacking of any real input validation. It is extracted from a larger drush command that I use. Make sure that your $goal and $raised variables are valid numbers. I recommend typecasting to integer and/or rounding to the nearest cent. Catching errors from the XML processing is also wise, although the are very unlikely given that you know exactly what the input file will be. Save this to a script "script.php" and execute it via cron as "php script.php" with whatever frequency you like.</p>
<pre class="brush:php">
&lt;?php
    $goal = 5000;
    $raised = 0;
    $xml = simplexml_load_file('thermometer.svg');
    $t_min_y = 323.4;
    $t_min_h = 7.269;
    $t_max_h = 277.465;
    $xml_t =&amp; $xml-&gt;xpath("//*[@id='temperature']");
    $xml_complete =&amp; $xml-&gt;xpath("//*[@id = 'complete']");
    $xml_raised =&amp; $xml-&gt;xpath("//*[@id = 'raised']");
    if ($raised &gt;= $goal) {
      $xml_t[0]['height'] = $t_max_h;
      $xml_complete[0]['style'] = preg_replace('@fill:.*?(;|$)@', 'fill:#ff0000\1', $xml_complete[0]['style']);
    }
    else {
      $xml_t[0]['height'] = $t_min_h + ($t_max_h - $t_min_h) * $raised / $goal;
      $xml_complete[0]['style'] = preg_replace('@fill:.*?(;|$)@', 'fill:#ffffff\1', $xml_complete[0]['style']);
    }
    $xml_t[0]['y'] = $t_min_y + $t_min_h - $xml_t[0]['height'];
    $xml_raised[0][0] = '$' . number_format($raised, 0);
    $xml-&gt;saveXML('thermometer.svg');
    // Convert to various PNG sizes
    // This could also be accomplished using the PHP interface, but I prefer to leverage the entire stack.
    shell_exec("convert thermometer.svg thermometer.png");
    shell_exec("convert -resize 100x100 thermometer.png thermometer_100x100.png");
    shell_exec("convert -resize 400x400 thermometer.png thermometer_400x400.png");
</pre>
<h2>
	No-Coding Alternatives</h2>
<p>I have no doubt that there are hundreds of no-code solutions for you out there, especially given how easy these are to create. However, some have the expectation to receive an acknowledgement on your web page, and others require you to manually update the image. In all cases, the look of the thermometer is reasonably constrained by the configuration options they choose provide.</p>
<ol><li>
		<a href="http://thermometer.fund-raising-ideas-center.com/">Fundraising Thermometer | Cool Thermometer for Fundraising</a></li>
	<li>
		<a href="http://www.abcfundraising.com/thermometer/">Free Fundraising Thermometer! Get Your Free Fundraising Thermometer!</a></li>
	<li>
		<a href="http://www.school-fundraisers.com/fundraising-thermometer.php">Fundraising Thermometer Widget ~ Fundraising Thermometer Graphic</a></li>
	<li>
		<a href="http://foofurple.com/thermometer/">Make a charity fundraising thermometer image | Foofurple</a></li>
</ol></div></div></div><div class="field field-name-field-document field-type-file field-label-above"><div class="field-label">Document:&nbsp;</div><div class="field-items"><div class="field-item even"><span class="file"><img class="file-icon" alt="" title="image/svg+xml" src="http://w.wcdn.ws/cdn/farfuture/5BLCfr5fS1vaf6MuKfh40wQoUKIFM2S5DjpHy30EImA/drupal:7.15-dev/modules/file/icons/image-x-generic.png" /> <a href="http://w.wcdn.ws/cdn/farfuture/SSgf5W7Ru-rXmkpWJx6d2-iGURhltqGoPzRZ5xlPst0/md5:a66b24fb2ce4810efb24fa0034921d2b/sites/default/files/blog/thermometer.svg" type="image/svg+xml; length=11171">thermometer.svg</a></span></div></div></div>  </div>
</div>
