---
title: Locking Down the Rewrite-Based Reverse Proxy
layout: post
category: blog
tech:
- Apache
- Linux
permalink: /blog/2012/07/31/locking-down-rewrite-based-reverse-proxy

---
{% include JB/setup %}
<div id="node-182" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>If you are running a rewrite-based reverse proxy, here are a few things to check to lock it down.</p>
<p>First, <a href="http://httpd.apache.org/docs/2.2/mod/mod_proxy.html#forwardreverse">ProxyRequests is not required</a>. Although the proxy module has to be enabled in Apache so that it is available to the Rewrite module, you do not need to activate any of its features directly. Either set the configuration to "off" or simply delete it. This turns off the biggest potential security hole.</p>
<p>Second, disable unwanted submodules. Just remove mod_proxy_connect and mod_proxy_ftp if you do not need them. If you are just running a web server, then you only need mod_proxy and mod_proxy_http. Although the other modules should be benign if the configurations are solid, loading these modules adds unnecessary overhead and creates the potential for configuration-based security holes.</p>
<p>Third, add a <a href="http://httpd.apache.org/docs/2.2/mod/core.html#limitexcept">LimitExcept</a> tag to the base directory of your web site to restrict access to your site to GET POST HEAD. Some other HTTP headers that might be appropriate for some use cases include: OPTIONS PROPFIND REPORT PUT. This relates to proxying because request type restriction will reduce what a hacker can accomplish if they do manage to get a request to proxy through your server. This configuration would look something like this:</p>
<pre class="brush:xml">
&lt;Directory /var/www&gt;
  &lt;LimitExcept GET POST HEAD&gt;
    Order deny,allow
    Deny from all
  &lt;/LimitExcept&gt;
&lt;/Directory&gt;</pre>
</div></div></div>  </div>
</div>
