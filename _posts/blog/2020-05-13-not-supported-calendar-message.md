---
title: "Outlook Meeting Invitations: not supported calendar message.ics"
layout: post
category: blog
tags:
- Outlook
- ical
- PHP
position:
- Developer

---
{% include JB/setup %}

## The Problem

A meeting invitation (ical email) can be well-formed but still result in a "not supported calendar message.ics" error message from Outlook clients using Exchange, as well as from outlook.com.

## The 5 Solutions

Online discussions indicated 4 problems, and testing revealed a 5th problem.

1. [Unsupported recurrence patterns, generally involving RDATE](https://sourceforge.net/p/mrbs/support-requests/250/) - this is the most common problem in Google.
1. [The email "From" should match the "ORGANIZER"](https://stackoverflow.com/questions/27662899/outlook-365-receives-a-message-that-has-an-attachment-that-is-named-not-support)
1. [Need to add a VALUE attribute to DTSTART/DTEND fields](https://stackoverflow.com/questions/37622750/getting-not-supported-calendar-message-ics-attachment-with-outlook-email-invit)
1. [Need to change the line endings](https://stackoverflow.com/questions/42349624/outlook-2013-shows-not-supported-calendar-message-ics-but-gmail-outlook-2007/45594484#45594484)
1. Move the VEVENT elements to the end of the VCALENDAR elements. Testing revealed that outlook.com does not like invitation (ical) emails when the METHOD field comes after the VEVENT element. Sorting the elements resolves this conflict. 

