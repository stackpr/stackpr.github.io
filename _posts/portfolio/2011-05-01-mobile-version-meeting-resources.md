---
title: Mobile Version of Meeting Resources
layout: post
category: portfolio
tech:
- PHP
- Drupal
- jQuery
- jQuery Mobile
position:
- Developer
- End-to-end
permalink: /portfolio/mobile-version-meeting-resources
images:
- survey-desktop-region.png
- survey-mobile.png

---
{% include JB/setup %}
<div id="node-123" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>With our renewed focus on utilizing web-based tools, we launched a mobile version of the Annual Meeting resources for 2011. Theme switching was accomplished using mobile_tools and a custom module that optimized the device detection for Varnish. The theme switching was restricted to the meeting-related pages to avoid re-theming all of the web site. The mobile theme is very basic and utilizes jQuery Mobile.</p><p>One of the primary features provided by the meeting web site is the ability to complete session evaluations directly online during and after a session. Making this work effectively required an enhancement to the GoRAD Assistant system to support alternate markup and mobile-optimized response labels. Using the GoRAD class search path capability, the Assistant in mobile mode will look first for a jQuery Mobile component implementation before falling back to the default component class. After being fully implemented, the only necessary change was to specify the "short label" for each option (e.g., "SA" for "Strongly Agree"). Given that CPNP uses XSLT to convert Slang XML to the Assistant XML, there is actually no extra work required on an ongoing basis to support mobile-optimized surveys that use the default rating scales.</p>
<p>The mobile performance is not ideal, and the narrow focus on the meeting resources creates some functional limitations. However, given the complexity of adding mobile site-wide, this provided an effective intermediate step to address the highest-mobile-traffic days each year.</p></div></div></div>  </div>
</div>
