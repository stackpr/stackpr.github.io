---
title: Icewarp Server Blocked by Spamhaus Due to the CBL
layout: post
category: blog
tags:
- Icewarp
- SMTP
- spam

---
{% include JB/setup %}

## The Problem

Emails from your Icewarp email server start coming back as rejected due to [Spamhaus](http://www.spamhaus.org/lookup/).
Submitting the form on Spamhaus, you quickly learn that it is due to the CBL with a message like:
  [YOUR_ICEWARP_IP] is listed in the XBL, because it appears in:
  CBL -> Please view this page for important information

Repeating the search on [CBL](http://cbl.abuseat.org/lookup.cgi) finally gets you to the actual problem:

- IP Address [YOUR_ICEWARP_IP] is listed in the CBL. It appears to be infected with a spam sending trojan, proxy or some other form of botnet.
- It was last detected at 2015-01-31 14:00 GMT (+/- 30 minutes), approximately 5 hours ago.
- The listing of this IP is because it HELOs as [AN_INTERNAL_IP]. Not only is this a violation of RFC2821/5321 section 4.1.1.1, it's even more frequently a sign of infection.
- In all probability this IP address is a NAT gateway, and the machine at [AN_INTERNAL_IP] in your local LAN is either infected, or if it's a server, badly misconfigured.

## The Solution

The impact and the warning flags are all quite dramatic, but it can really boil down to having an Icewarp install with
a malconfigured "Public Hostname". To correct it in Icewarp:

1. Open IceWarp Server Administration
2. Go to Mail > General
3. Change the "Public Hostname" setting to something that would be valid from outside your network (e.g., the external IP or a resolvable FQDN)

Once you have made the adjustment, simply click the link at the bottom of your CBL report to delist the IP.
If you updated your configuration correctly, it should remain delisted (at least for that problem).
