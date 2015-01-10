---
title: Client Report Interface
layout: post
category: portfolio
tech:
- PHP
- CSS
- JS
- Collaborate
- Assistant
- Redmine
- Ruby
- MySQL
team:
- Quiller
- Helzer
position:
- Developer
- System Design
- Project Manager
permalink: /portfolio/client-report-interface
published: false

---
{% include JB/setup %}
<div id="node-14" class="node node-portfolio node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Uppercase Development ran almost entirely on uppercaseclients.com, a highly customized project management system built on top of the <a href="http://redmine.org">Redmine</a>. The customizations ranged from modifications directly to the Ruby code within Redmine to highly-integrated front-end extensions built on PHP and GoRAD.</p>
<h2>
	Features</h2>
<p>The system included a variety of features:</p>
<ol><li>
		Time tracking by task:</li>
	<li>
		Export time data to QuickBooks:
		<ol><li>
				Included ledger entries for wages based on the time tracking.</li>
			<li>
				Included ledger entries to charge against project liability accounts based on time. A flat-fee project would be entered into QB as a liability to the client. As time was spent on the project, the time would be debited against the liability on the project to realize the income as time was spent. If project estimates were too far off, then manual adjustments to these entries were required.</li>
			<li>
				As the timesheets were imported, each line would include task number, title and client. Using QB's time-tracking system, those time entries populated invoices quickly for hourly clients.</li>
			<li>
				To sum up, once the time tracking was imported, all HR and billing data was immediately available in QB.</li>
		</ol></li>
	<li>
		Task prioritization</li>
</ol><h2>
	Implementation</h2>
<ol><li>
		MySQL: Since Redmine uses MySQL, some of our PHP code simply interacted directly with the database. We attempted to avoid complex CRUD operations directly on the database from PHP since they would likely break whenever a Redmine update included new database structures. However, we were able to extract data for reports and adjust specific fields on existing data (e.g., automatically adjust due dates).</li>
	<li>
		PHP and Web Service:</li>
	<li>
		JavaScript:</li>
	<li>
		Cron:</li>
</ol></div></div></div>  </div>
</div>
