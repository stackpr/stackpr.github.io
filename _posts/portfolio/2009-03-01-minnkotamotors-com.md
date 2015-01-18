---
title: MinnKotaMotors.com
layout: post
category: portfolio
tags:
- ASP.Net
- C#
- Ektron CMS400.Net
- CSS
- JS
- ActionScript
- UIX
team:
- Quiller
- Keiser
- SRA
- Nathan
position:
- Developer
- Project Manager
permalink: /portfolio/minnkotamotors-com
images:
- minnkotamotors_nav.png
- minnkotamotors_motor_page.png
- minnkotamotors_home.png
- minnkotamotors_pros.png
- minnkota_chargers.png
references:
- title: Current Minn Kota Site
  link: http://www.minnkotamotors.com

---
{% include JB/setup %}
<div id="node-12" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Uppercase team provided development support for the updated Minn Kota web site. The previous site was built using an ASP (VBScript) CMS that I built a couple years earlier. Everything had to be rebuilt because of the change of underlying technology. The new site relies on Ektron CMS400.Net, a robust enterprise-level CMS application.</p>
<p>The theme for the site had complexity and demands far beyond those that are easily accommodated by Ektron. We built a number of custom web services for integration via AJAX. We built an elaborate system of "smart forms", library items and assets to build a very large and robust web site. There are several key features that received extensive attention.</p>
<h3>
	Extensive Aggregation</h3>
<p>The site is full of lists of related and random items. The lists require aggregation of smart form data. This requires a combination of codebehind development, custom user components and extensive XSLT documents.</p>
<h3>
	Custom Request Caching</h3>
<p>The aggregation requires significant processing power. Unfortunately, the Ektron URL alias mechanism conflicts with ASP.Net system caching. Courtesy of our multiple levels of master pages, I was able to build an effective request-based caching mechanism that respects the particular demands of the Ektron system while fully addressing the speed issues.</p>
<h3>
	Web Interface Optimization</h3>
<p>Themes of this complexity create a severe delay for users. To address this issue, we utilized UIX to aggregate, compact and compress the JS/CSS files. It also manages sprites. More details on this are available elsewhere.</p>
</div></div></div>  </div>
</div>
