---
title: New Tech Graphics
layout: post
category: portfolio
tags:
- PHP
- CSS
- JS
team:
- Quiller
- KDN
- Helzer
position:
- Developer
- Project Manager
permalink: /portfolio/new-tech-graphics
images:
- fireshot_capture_103_-_premium_grade_custom_vinyl_banners_for_business_-_62_off_promotion__-_highperformancebanners_com.png
- fireshot_capture_104_-_hundreds_of_workplace_safety_banners__save_time__money_-_buy_online_-_banners4safety_com.png
- fireshot_capture_105_-_safetybanners_org_-_banners4safety_com_safety_view_php_imagecode1071.png
references:
- title: Safety Banners
  link: http://safetybanners.org
- title: Banners 4 Stores
  link: http://www.banners4stores.com/

---
{% include JB/setup %}
<div id="node-41" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>We undertook this project with some unique constraints. They had been using (and were very comfortable with) Dreamweaver, Yahoo! Stores, and a custom pricing matrix maintained in Excel. Although custom pricing logic could have been coded into a custom shopping cart, they would have lost maintainability, control and stability. Instead, we built an export system that would convert their Excel spreadsheets into a format that could be imported into the Yahoo! Stores product database and supplemented that with a nice PHP+JS front-end that would allow user-friendly navigation throughout a product database that did not fit directly into the Yahoo! product design.</p>
<!--break-->
<p><strong>PHP Spreadsheet Interpretter</strong>. The first step was to create a PHP system that could load a spreadsheet and compute the formulas. The formulas ranged from basic arithmetic to more complex HLOOKUP and VLOOKUP commands. It currently only supports the XML format saved from Excel, but document converters and XSLT can convert other formats into one that can be read.</p>
<p><strong>PHP Spreadsheet Automation</strong>. The second step was to iterate over over the spreadsheet hundreds of times. Printing quotes vary non-linearly based on print dimensions, so each dimension received its own product code for Yahoo!. To compute these, the system would assign each combination of width and height to the spreadsheet and then evaluate the formulas. The end result was a spreadsheet many times larger than the original.</p>
<p><strong>Front-End Interface</strong>. The front-end interface involved several pieces, but it was much more straightforward. Using the spreadsheet as a data source, it created user-friendly browsing interfaces to select the appropriate products. The products would be passed to the Yahoo! cart, which handled the order through fulfillment.</p>
<p>The sites were successful, and the non-traditional approach allowed New Tech Graphics to experiment with many different (and complex) pricing models. They leveraged this development across several sites. This is a great example of making the technology fit the client.</p>
<p>NTG stayed with Uppercase Development until we closed our doors in the summer of 2009.</p>
</div></div></div>  </div>
</div>
