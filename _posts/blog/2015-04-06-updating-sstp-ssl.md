---
title: VPN SSTP SSL update to fix errors 0x800b0101 and 0x80072746
layout: post
category: blog
tags:
- VPN
- SSTP
- Windows 2008

---
{% include JB/setup %}

## Problem

The VPN connection to a Windows server (using SSTP connection) results in errors 0x800b0101 and 0x80072746.
Ex: __0x800b0101 - A required certificate is not within its validity period__

The cause of the initial (bolded) error above is that the SSL certificate being used by Windows Server for SSTP has expired. The  When using self-signed certificates generated using default system tools, they expire after only 1 year. The self-signed certificates can require some installation client-side as well. The second error message will appear after the certificate is updated on the server until the certificate is reloaded on the client.

## Solution

1. [Associate a new certificate with the SSTP VPN on Windows Server](http://blogs.technet.com/b/rrasblog/archive/2009/02/11/sstp-certificate-selection.aspx)
2. Export the certificate to a .pfx file for distribution and remember the password for later use
3. Re-import the certificate on the client
  1.	In start menu, type MMC and click the Program that appears (“MMC”)
  1.	File > Add/Remove Snap-in
  1.	Select “Certificates” and click “Add”. A popup will appear. Choose “Computer account” on the first screen and “Local computer” on the second screen. Click Finish to close that window. Click OK to close the Snap-in window.
  1.	Go to Console Root > Certificates > Trusted Root Certification Authorities > Certificates
  1.  Delete the old certificate
  1.	Right-click on that “Certificates” folder and click All Tasks > “Import”
  1.	Select C:\path\to\MyCertificate.pfx
  1.	Enter the pfx password (from above) when prompted


Initial error: error 0x800b0101 a required certificate
Error: https://social.technet.microsoft.com/Forums/en-US/8e909824-4ef5-4314-a382-d2fb515f1077/error-0x80072746-an-existing-connection-was-forcibly-closed-by-the-remote-host?forum=winserverPN
Part of solution: http://blogs.technet.com/b/rrasblog/archive/2009/02/11/sstp-certificate-selection.aspx
