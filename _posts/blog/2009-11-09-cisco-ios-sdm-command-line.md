---
title: Cisco IOS - SDM command-line
layout: post
category: blog
tech:
- Cisco
permalink: /blog/2009/11/09/cisco-ios-sdm-command-line

---
{% include JB/setup %}
<div id="node-70" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Finding the right Cisco commands can be relatively painful due to the number of versions and sophistication of most use cases. As far as I can tell, the simplest configurations are the least documented. This lists some of the the key commands I use.</p>
<!--break-->
<h2>Cheat Sheet</h2>
<p># ssh router-ip // Connect to the router<br /><em>// SDM command-line:</em><br />
# ? // view cli options<br />
# show access-lists // view current config<br />
# show ip nat translations // view current port forwarding.<br />
# configure // Go into configure mode<br />
# ip nat inside source static tcp 10.10.10.2 110 xx.xx.xx.xx 110 // Forward a port<br /><em>// Another level deep - managing an access list...</em><br />
# ip access-list extended 101 // manage config for access-list 101.<br />
# 105 permit tcp host xx.xx.xx.xx host xx.xx.xx.xx eq 110 // Where xx = IP address and 105 = line number to insert<br />
# 120 permit tcp any host 76.79.26.82 eq ftp
# 130 permit tcp any host 76.79.26.82 eq ftp-data
# no 120 // Delete rule 120
<em>// Use ctrl-c to return to the main prompt<br /></em># copy running-config startup-config // Commit the changes<br />
 </p>
<h2>References</h2>
<p><em>Cisco IOS ACL - use line numbers <br /></em>http://www.petri.co.il/csc_edit_cisco_ios_acl_using_line_numbers.htm</p>
<p> </p></div></div></div>  </div>
</div>
