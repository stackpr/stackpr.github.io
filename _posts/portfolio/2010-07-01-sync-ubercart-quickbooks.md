---
title: Sync Ubercart to Quickbooks
layout: post
category: portfolio
tags:
- PHP
- Drupal
- QuickBooks
position:
- End-to-end
permalink: /portfolio/sync-ubercart-quickbooks
images:
- qb_web_connect.jpeg

---
{% include JB/setup %}
<div id="node-105" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>With our custom Drupal-based CRM, any form of database sync required at least some level of customization. I settled on a two-step sync. First, I enhanced the capabilities of a PHP-based QuickBooks Web Connector server script. Once all of the relevant configurations were being synced bidirectionally, the Ubercart order data (and corresponding CRM data) simply needs to be synced unidirectionally into the server-side QB data.</p>
<p>The system is based on the principle of eventual consistency. Any online order with modifications in the prior 7 days is synced with some frequency to the online database. The QB Web Connector only allows updates while QuickBooks is open. While it is open, it re-syncs every X minutes. It takes 4-6 web+QB syncs to get all of the data into QB: create products, create contacts, create invoice, create payment, and clear payments.</p>
<p>Limitations of the QB sync:</p>
<ol><li>
		QB Web Connector only runs when the same Windows user has QuickBooks open.</li>
	<li>
		There are strict (undefined) limits on which objects can be update. Ex: paid invoices do not seem to update.</li>
	<li>
		Depositing from undeposited funds does not work. Our solution was to use undeposited funds as a holding account. Payments go into undeposited funds, and then payments are grouped as an adjusting entry is cleared from the undeposited funds account. The undeposited funds account should always be at zero.</li>
</ol></div></div></div>  </div>
</div>
