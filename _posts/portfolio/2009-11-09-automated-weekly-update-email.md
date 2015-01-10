---
title: Automated Weekly Update Email
layout: post
category: portfolio
tech:
- PHP
- Drupal
- Zend Framework
- Panels
- Views
- Google Analytics
position:
- Developer
- End-to-end
permalink: /portfolio/automated-weekly-update-email
images:
- gmail---cpnp-weekly-update---cpnp-member-services-survey_1258156703748.png

---
{% include JB/setup %}
<div id="node-71" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Weekly Update is a great new feature that sends customized email messages to users and created a 15% CTR in the first 5 days. It pulls content of interest, filters action items by user, and provides the ability for Drupal admin users to change anything they need to maximize services. Although the module includes too much organization-specific logic to release as a general use module, the structure of the module is quite robust.</p>
<!--break-->
<p>During a specified timeframe each week, a cron hook creates a list of users that should receive emails. Subsequent cron requests send a limited number of those emails until the list is empty. Each message is created by dynamically setting the active $user and then programmatically rendering a Panel display. The panel is able to pull in any views or other Drupal resources, and I used a custom panel layout so that I could rearrange elements on the fly. The final display for the panels becomes the message body, and the first h1 tag becomes the email subject.</p>
<p>Finally, once the email message is built, the system parses the HTML and adds Google Analytics campaign-tracking code to all of the links. The campaign tracking code adds different variables by section, and it is yielding impressive statistics for analysis and further enhancement of the weekly email.</p>
<p>As an added bonus, I send the email using Zend_Mail so that they can go out through AuthSMTP to reduce the load on our email servers. It is a great system, and we had a 15% CTR in the first 5 days.</p></div></div></div>  </div>
</div>
