---
title: CPNP IT Philosophy
layout: post
category: portfolio
tech:
- PHP
- Linux
- GoRad
- Drupal
- Collaborate
- GRAVEL
position:
- IT Director
permalink: /portfolio/cpnp-it-philosophy
published: false

---
{% include JB/setup %}
<div id="node-169" class="node node-portfolio node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><h2>
	A Brief History of the CPNP Way</h2>
<h3>
	The Challenge of Timing</h3>
<p>CPNP has managed to stay ahead of the curve for more than a decade. The software industry has a predictable cycle: (1) people look at where we are and decide where to go next, (2) many different people create a way to get to that next step, (3) some of those techniques are made open source or sold, (4) best practices emerge, (5) repeat the process by deciding where to go next. Unfortunately, the lag between (1) and (4) is often 3-5 years. Many big steps that CPNP has taken have occurred while other people around the world are also playing with the same ideas. We have been given the choice of venturing out on our own or waiting a few years for a solution to present itself. Indeed, if you watched the latest-and-greatest at CPNP, you could have seen a preview of what the industry would bring out a few years later.</p>
<h3>
	GRAVEL – The First Big Step (2001)</h3>
<p>In 2001, CPNP began using a closed-source PHP web site management system called GRAVEL, built by a Lincoln-based company <em>aijalon</em>. The system was feature rich amidst a very new market (e.g., “Web Content Management System (WCMS)” was not even standard terminology), and GRAVEL was consistently expanding for CPNP and for other users. For a point of reference, drupal.org (the web site for our current CMS launched after CPNP began using GRAVEL, which already had 3 years of proven performance at that point.</p>
<p><em>So CPNP began using WCMS before there was WCMS. The GRAVEL CMS was originally written in PHP 3, which means CPNP’s efforts have spanned 3-4 major versions of a programming language (PHP 5.3 is generally considered a major release)!</em></p>
<h3>
	XAAPS and Collaborate (2003-2004)</h3>
<p>After seeing the technology benefits of WCMS, CPNP began investigating how to better manage its contacts and members. To this point, they had been managed in a wide variety of spreadsheets. CRM solutions were still mainly desktop applications (SugarCRM marked the beginning of web CRM era with its launch in June 2004), and the nature of desktop applications limited the potential customizations. With the need to track some non-standard information, to make data input more efficient, and to track sensitive information (SSNs) that made web a bad choice at the time, a sophisticated application was built with MS Access to handle everything from imports to reporting. The main innovation in the database was how it allowed for creating extremely sophisticated batches of contacts for reporting purposes. That feature has been kept alive and still distinguishes our system from most other CRM options available. The CRM (named XAAPS) was started by <em>aijalon</em> and completed by <em>Uppercase Development</em> after Payne left aijalon and the remaining developers were unable to complete the project.</p>
<p><em>So CPNP began using CRM before the CRM market really exploded.</em></p>
<p>Shortly thereafter, it became apparent that CPNP was starting to outgrow GRAVEL. Although the features were stable, CPNP was customizing everything and it was hard to fit in the GRAVEL “box”. The web site was transitioned to Uppercase’s Collaborate, which was a lightweight CMS that focused on the ability to launch and manage highly customized features. Collaborate was based on the GoRAD PHP toolkit, which Uppercase built from the ground-up based on best practices that had emerged in the industry over the prior years. The GoRAD tools are still used on CPNP today, and they were at the front edge of the MVC explosion for PHP web applications. In fact, GoRAD made many of the exact same decisions as the popular Zend Framework, which was released in alpha within a year after GoRAD went into production. Since then, a handful of other systems have emerged with the same basic goals. Drupal is planning in 2013 to integrate with Symphony, which is a second generation version of this type of toolkit.</p>
<p><em>So CPNP began using web application strategies still in use today at a time when the industry was barely getting started with them.</em></p>
<h3>
	Drupal (2009)</h3>
<p>The Access database significantly reduced the administrative effort of data management. However, it was becoming clear that keeping data in sync between the database and the web site was the single largest source of stress and problems. The decision (often implicit) was made definitively to focus on having all systems tightly integrated rather than dealing with the complexities of synchronization. Drupal (a web-based software package) was selected as the foundation for this new integrated system because (1) it is one of the top 3 systems for content management, (2) it was the most popular of the top 3 among developers creating custom features, (3) it had a strong and rapidly expanding list of modules to provide extra features, and (4) some existing CPNP features could be used within Drupal without changing the code. This transition was made by Payne within the first year of joining CPNP as staff.</p>
<p><em>CPNP launched a very aggressive feature set on top of Drupal – the first public Drupal-based CRMs are just coming to market in 2012 (e.g., Red Hen CRM, CRM Core).</em></p>
<h3>
	Emails, Workspaces, Dashboards, etc. (2010-2012)</h3>
<p>CPNP sent emails to custom groups of users automatically starting with Collaborate in 2006. The system was refined for administrative usability and improved readability for users, and 30,000+ emails are now sent each month using the system. The related industry is still evolving and maturing. Although we lag in some regards (new features are added regularly), our segmentation and targeting capabilities still exceed those of the leading vendors.</p>
<p><em>CPNP still has a leading-edge feature set for email, although the lead is diminishing.</em></p>
<p>CPNP Workspaces and Dashboard Reports were launched in 2011, and the feature set continues to grow rapidly. Similar software existed for enterprises (e.g., SharePoint), but license fees and inadequate feature sets confirmed our decision to stick with an integrated Drupal-based system. However, just like many other decisions over the last decade, we can expect to see online collaboration and reporting to mature over the next few years. Google and Microsoft are battling for the online editing space with varying degrees of collaboration features, and new “dashboard” tools and companies are popping up on a weekly basis. Both are hotly contested and rapidly emerging fields. We are actively monitoring the situation to leverage those online tools while maintaining a highly integrated system.</p>
<p><em>CPNP is actively expanding in an arena that is arguably the hottest in IT after social networking.</em></p>
<h2>
	Best of Breed Versus Integrated (or Monolithic)</h2>
<p>Since 2009, we are firmly committed to an integrated system. This means that we have made the decision that the complexities of utilizing a disconnected system outweigh the benefits of the extra features that we cannot find in Drupal. An example that comes up periodically relates to surveys. Survey Monkey allows people to easily create surveys, and it provides a number of useful and simple tools. However, the extra staff time required to set up a survey within Drupal is less than the extra staff time involved in connecting CPNP user data to Survey Monkey and then importing the survey results back into the CPNP database for unified reporting. Some decisions are not as straightforward as that, but the guiding principle of the tight integration has benefited us greatly.</p>
<h2>
	Build Versus Buy</h2>
<p>In the context of Drupal, the “buy” option might not involve money since most modules are free. However, we still have to decide whether to use an existing module or build one from scratch. This is a complex decision without any hard-and-fast rules, although we err on the side of starting from an existing module. As a rule, if a module provides 80% of what we need and does not include much that we do not want (i.e., unnecessary complexity), then we start with that module and adjust it to fit out needs.</p>
<h2>
	Maintain Versus Migrate</h2>
<p>The most complex decision we face is when to maintain a custom feature or migrate it to a newly developed module that serves the same purpose. The ongoing time requirement for a third-party module is less than for a custom module, but that has to be weighed against the time it would take to migrate to the new module and train staff/members on the differences. Since the choice is often between a completely stable existing feature and an unknown module that provides some neat enhancements, the migration often simply gets put far down the priority list until a more compelling reason to migrate emerges.</p>
<p>This decision is both micro and macro. We make the decision on individual features and modules, but there is an implicit decision system-wide as well. Right now, we are unaware of any system that can handle more than 50% of our needs without modifications, but that percentage continues to rise. Eventually, there will likely be a system available for purchase that will do most of what we want/need, and then we will have to decide whether to migrate into an entirely different system. That is one decision that will be revisited with great care prior to upgrading to Drupal 8 (since there is no need to upgrade before a migration).</p>
</div></div></div>  </div>
</div>
