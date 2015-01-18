---
title: Bad AMI Design - Meet oom-killer
layout: post
category: blog
tags:
- Linux
- Amazon EC2
- Apache
- Varnish
permalink: /blog/2011/10/27/bad-ami-design-meet-oom-killer

---
{% include JB/setup %}
<div id="node-125" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Tracking down a serious problem took this route while testing a public AMI:</p>
<ol><li>
		After a period of intense traffic, Varnish begins serving a 503 error.</li>
	<li>
		It turned out to be a backend error that could be resolved by restarting Apache.</li>
	<li>
		No errors in the Apache log.</li>
	<li>
		Grep for apache in /var/log messages and found "apache2 invoked oom-killer".</li>
	<li>
		<a href="http://linux-mm.org/OOM_Killer">oom-killer</a> kills processes when the system runs out of memory. It was apparently choosing Apache in some cases.</li>
	<li>
		Further research indicated that the public AMI was built without swap space. Seriously. No swap space.</li>
	<li>
		Rather than adding a partition, I simply added a <a href="http://www.cyberciti.biz/faq/linux-add-a-swap-file-howto/">swap file</a> to resume my testing.</li>
</ol></div></div></div>  </div>
</div>
