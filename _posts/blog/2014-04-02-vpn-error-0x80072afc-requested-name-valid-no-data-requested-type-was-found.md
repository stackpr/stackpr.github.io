---
title: 'VPN Error 0x80072afc: The requested name is valid, but no data of the requested
  type was found.'
layout: post
category: blog
tech:
- Windows 2008
- Windows 7
- Windows VPN
- VPN
- SSL
permalink: /blog/2014/04/02/vpn-error-0x80072afc-requested-name-valid-no-data-requested-type-was-found

---
{% include JB/setup %}
<div id="node-332" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I encountered this error while working on a SSL (SSTP) VPN setup. The distinctive characteristic was that we defined the VPN host in the computer's hosts file, although the same error could be encountered by an improperly configured DNS entry.</p>
<p><!--break--></p>
<p>One potential source of this error is simple name resolution. Make sure you can ping the host the way it is typed into the Windows VPN Connection. If you cannot resolve the host name to ping it, then you will not be able to resolve it to connect over VPN. Of course, the error message does not say that plainly at all. In fact, the error message does not necessary communicate that it relates to host or IP data at all.</p>
<p>If you dig and dig, you can track the code back to <a href="http://msdn.microsoft.com/en-us/library/windows/desktop/ms740668(v=vs.85).aspx#WSANO_DATA">WSANO_DATA</a>, which essentially explains that the host name lookup failed.</p>
</div></div></div>  </div>
</div>
