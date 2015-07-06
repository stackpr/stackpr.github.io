---
title: Syslog on Windows
layout: post
category: blog
tags:
- Syslog
- Windows
permalink: /blog/2012/05/18/syslog-windows

---
{% include JB/setup %}
<div id="node-168" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p><a href="http://en.wikipedia.org/wiki/Syslog">Syslog</a> ships with most Linux distros. Like many Linux-centric applications, it is non-trivial on Windows. To make it trivial, I use the free version of Kiwi syslog (<a href="http://www.kiwisyslog.com/index.php?option=com_kb&amp;page=articles&amp;articleid=73&amp;Itemid=244">free for life</a>, it is not a trial - <a href="http://www.solarwinds.com/products/freetools/free-kiwi-syslog-server.aspx">see also</a>). The free version has some limitations, like limited scrollback, but it gets the job done for most targetted troubleshooting.</p>
<p>Syslog supports UDP by default because it is lower overhead, which is extremely important for a logging utility. Combined with the rudimentary nature of the log messages, remote logging often requires an aggregating intermediary/relay to secure and extend the information. Since it uses UDP, separate Windows firewall rules are required to allow the packets to reach the syslog computer. Due to the 1-way communication, it is difficult to troubleshoot whether the UDP packets arrive at the computer. For instance, testing UDP packets with <a href="http://www.microsoft.com/en-us/download/details.aspx?id=24009">PortQry.exe</a> simply returns "LISTENING OR FILTERED", which is to say that the sender has no way to know whether the packet actually makes it to the destination.</p>
<p>Once Kiwi syslog server is configured and receiving packets, you see a real-time stream of log information. While it can quickly become overwhelming with too many services using the same server, it is extremely valuable when dedicated to a small enough number of services that the stream can be read.</p>
<p>I anticipate that we will see quite a few cloud-based syslog analyzers over the next few years that provide syslog proxy services to install on your computer. It would be a convenient way to plug cloud-based storage and analysis engines into an existing network of applications.</p>
</div></div></div>  </div>
</div>
