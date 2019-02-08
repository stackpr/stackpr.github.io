---
title: Cannot Connect to vSphere
layout: post
category: blog
tags:
- VMware
- vSphere
- vCenter
- ESXi 6.5

---
{% include JB/setup %}

## Problem 1

The web client does not load. Accessing https://example.local/ui/login eventually gives this error:

```
A server error occurred.
[400] An error occurred while sending an authentication request to the vCenter Single Sign-On server - An error occurred when processing the metadata during vCenter Single Sign-On setup - java.net.SocketTimeoutException: Read timed out.
Check the vSphere Client server logs for details.
```

## Problem 2

This is not always a problem. While it could happen when the system hangs, it also naturally happens for about a minute (depending on server speed) after restarting the service, which means it is working.

```
The vSphere Client web server is initializing
The vSphere Client web server is still initializing. Please try again shortly.
```

## Solution 1

Connect to the vCenter VM via SSH or by clicking the browser console within ESXi. Restart the web client.

```
service-control --stop vsphere-client
service-control --start vsphere-client
# or
service vsphere-client restart
```

## Solution 2

Reset the vCenter VM entirely. It will not impact the other instances on the ESXi server.
