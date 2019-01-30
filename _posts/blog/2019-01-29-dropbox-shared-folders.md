---
title: Finding which Dropbox folders are shared
layout: post
category: blog
tags:
- Dropbox
references:
- title: Where is list of shared folders
  link: https://www.dropboxforum.com/t5/Sharing-and-collaboration/Where-is-list-of-shared-folders/td-p/266246

---
{% include JB/setup %}

## Problem

The list of shared folders appears to have been removed from the Dropbox interface in early 2018. No replacement interface is available.

This is a problem when you need to audit your file sharing to ensure that you did not forget to remove a share.

## Solutions

1. [Use the API to list shared folders](https://www.dropbox.com/developers/documentation/http/documentation#sharing-list_folders): Create a small script to identify folders.
2. On a Windows computer where the account is synced, (1) make hidden files visible, (2) search the Dropbox folder for "ext:dropbox" to locate the ".dropbox" files, and (3) look at the folder path and/or right-click "Open file location" to find which folder is shared.
3. Go to the [Contact Dropbox Support](https://www.dropbox.com/support/email/sharing/submit) form, but do not submit it. It includes a dropdown labelled "Which shared folder or shared link are you having trouble with?", which provides a complete list for your review.

Note that none of these solutions have the simplicity of the old interface. You cannot simply go to a list, click share, and review the details and/or unshare.
