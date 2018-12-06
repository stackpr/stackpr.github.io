---
title: Outlook iCal/ICS Support (0x80004005 errors)
layout: post
category: blog
tags:
- Outlook

---
{% include JB/setup %}

Outlook has reasonable support for Internet Calendar Subscriptions.
However, the implementation deviates from spec in several significant ways.
If you do not account for the deviations, users receive the error code 0x80004005.

1. DTEND is required, so start-only events are not supported. [ref](https://answers.microsoft.com/en-us/office/forum/office_2013_release-outlook/internet-calendar-subscriptions-error-0x80004005/31dc0c54-a0ca-4304-9227-18d2e1325b87?page=5)
1. SUMMARY must be limited to 67 characters. The spec requires lines to wrap at 75 characters [ref](https://icalendar.org/iCalendar-RFC-5545/3-1-content-lines.html), minus the 8 characters for "SUMMARY:".
However, Outlook 2013 refuses to unfold content in tests.
Outlook 2013 accepted longer SUMMARY parameter values without wrapping text, but that violates spec in a way that might impact other clients.
1. Periodically, the ical subscriptions simply get stuck and may report this error even though the ical feeds are compliant. Depending on the number feeds, you can (1) remove and re-add the calendar subscriptions, or (2) close outlook, delete/rename the calendar PST file, and allow Outlook to recreate it.
