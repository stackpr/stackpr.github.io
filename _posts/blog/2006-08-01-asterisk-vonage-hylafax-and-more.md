---
title: Asterisk, Vonage, Hylafax and More
layout: post
category: portfolio
tags:
- VoIP
- Linux
team:
- Bump
position:
- Boss
- Developer
- End-to-end
permalink: /portfolio/asterisk-vonage-hylafax-and-more

---
{% include JB/setup %}

In 2006, faxing documents was still a relatively standard business practice, and online IVR was still a new territory.

# Hylafax and Vonage

One client wanted to send a significant number of faxes, but email-to-fax services were cost-prohibitive.

The solution was a combination of low-cost technologies that complimented each other:

1. Vonage provided unlimited telephony to the US
2. Hylafax provided a PDF-to-fax CLI that would allow a Linux server to send a fax
3. The trickiest piece was finding a _basic enough_ modem that the Linux server would have sufficient drivers to send the faxes

The modems were very inexpensive, but finding one with driver support was the problem.
Once located, it was straightforward development and testing to get a system that:

1. Converted HTML to PDF
2. Sent the PDF as a Fax over the modem via [hylafax](http://www.hylafax.org)
3. The modem connected to Vonage

We integrated this into our bulk email routine such that they sent bulk faxes at a flat fee along with their emails.
Going the other direction, we were able to present faxes as emails within the CRM. The client was responsible for ensuring that only interested parties recieved faxes.

Providing the 2-way fax integration with the CRM provided immense value to the client's sales-oriented business.

# Asterisk and Vonage

Vonage's low cost for US long-distance was appealing beyond faxes.
Once appropriate modems were identified, we further leveraged them to integrate with an Asterisk server.

While in use (2003-2008 under our supervision), asterisk still relied heavily on manual configuration and administration.
We utilized click-to-dial from Vonage in addition to Asterisk's voicemail-to-email functionality to create a highly-integrated 2-way (dial-out and vm-in) CRM experience for the client.
