---
title: HTML5 Google Visualizations
layout: post
category: portfolio
tech:
- JS
- HTML5
permalink: /portfolio/html5-google-visualizations
images:
- warehouse graphs 0.png
- warehouse graphs 2.png
- warehouse graphs 3.png

---
{% include JB/setup %}
<div id="node-171" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I initially developed reports from our custom data warehouse to use <a href="http://filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/">jQuery Visualize</a>. The library minimized the effort related to chart generation since the data simply had to be dumped to an HTML table with specific extra markup to generate the chart. However, after a couple years, our needs grew beyond what that library could offer. Given the desire to have massive functional capabilities, <a href="https://developers.google.com/chart/interactive/docs/reference">Google Visualizations</a> became an obvious choice.</p>
<!--break-->
<p>The initial implementation (see screenshots) utilized the same techniques as jQuery Visualize. It extracted the data from an HTML table and used that data to construct a DataTable for use with a Google Visualization. Initially, the configurations replicated the jQuery Visualize capabilities with very minor configuration enhancements. However, that provided a foundation for significant developments long-term.</p>
<p>Eventually, as the need for enhancements and a better generalization emerged, the code was refactored for HTML5. To see the latest code and functionality, check out <a href="/project/witti-visualization">Witti Visualization</a>. And yes, that is the third "Visualization" library mentioned in this post!</p>
</div></div></div>  </div>
</div>
