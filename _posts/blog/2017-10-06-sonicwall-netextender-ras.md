---
title: Sonicwall TZ300, NetExtender 8 - Windows Remote Access Service Error
layout: post
category: blog
tags:
- Sonicwall TZ 300
- VPN
- RAS
references:
- title: Similar issue from prior year on other versions
  link: https://community.spiceworks.com/topic/1708896-sonicwall-netextender-went-bad-after-windows-update

---
{% include JB/setup %}

## The Problem

On a Windows 10 computer running Sonicwall NetExtender 8.6.256, the user consistently received this error:

<div class="well"><h4>Windows Remote Access Service Error</h4><p>The Windows Remote Access Services (RAS) has encountered an error. Rebooting your Window PC may resolve the issue.</p></div>

The log only showed "NetExtender Starting... Version 8.6.256". No other information.

## The Solution

The solution came from a forum discussion from a year prior related to a Windows update.

1. Log into Sonicwall TZ 300 web interface
1. Go to System > Administration
1. Locate "Web Management Settings > Certificate Common Name"
1. Change the Certificate Common Name to something new and apply changes.
1. Go back to Certificate Common Name and regenerate the certificate (button next to name)
1. Restart the Sonicwall

It is possible that it was the regenerating that solved the problem rather than changing the common name, but both steps have been included for completeness.
You might try simply regenerating the certificate before completing all of the steps.
