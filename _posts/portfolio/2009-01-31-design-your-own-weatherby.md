---
title: Design Your Own Weatherby
layout: post
category: portfolio
tech:
- PHP
- XML
- Slang
- JS
- XSLT
team:
- Keiser
- SRA
- Kristi
position:
- Developer
- System Design
- Project Manager
permalink: /portfolio/design-your-own-weatherby
images:
- wby_dyow.png
- wby_dyow_results.png

---
{% include JB/setup %}
<div id="node-7" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>This was a fun project for me from a technical standpoint. The challenge was to create a multi-page wizard with significant business logic that could be managed easily by a non-technical user. After some lengthy meetings with Kristi and SRA, we had designed a logical framework that could power the wizard. Combining this project's requirements with some observations made while working on an Ektron project, two new GoRad technologies were born: Slang and Brick.</p>
<p><strong>Slang</strong> is a standardized XML format that resembles RSS syntax, has a structure similar to plist, and embraces the node concept of Drupal (or content block concept of Ektron). There is a generic &lt;item&gt; tag that contains standard RSS elements, a &lt;data&gt; element that can contain anything, a <em>type</em> attribute that specifies the type of content, and it can contain other &lt;item&gt; elements. You could think of it as recursive RSS. The generic XML format allows for more rapid prototyping, and it ultimately made this project possible.</p>
<p><strong>Brick</strong> is an application framework that runs on a few database tables. This particular case required importing a spreadsheet into the database. Logic was written in structured language that could be read as standard English. The logic selected tabs to show, questions to show on tabs, options to show on questions, and ultimately results based on the feedback. Each request, the state of the wizard was passed through Brick, which would return a Slang XML file that would be processed by the application's XSLT documents.</p>
<p>These two pieces fit well within our system. Once they were ready, the remainder of this project was 95% Excel and XSLT work. The application challenge was effectively addressed and removed as an obstacle.</p>
<p>The system is glued together with <strong>AJAX</strong> that automatically updates the results portion quickly without complete page reloads.</p></div></div></div><div class="field field-name-field-reference field-type-link-field field-label-above"><div class="field-label">References:&nbsp;</div><div class="field-items"><div class="field-item even"><a href="http://weatherby.com/customshop/dyow/rifle" rel="nofollow">Design Your Own Weatherby</a></div></div></div>  </div>
</div>
