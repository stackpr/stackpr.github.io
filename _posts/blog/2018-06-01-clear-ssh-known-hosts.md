---
title: How to clear /.ssh/known_hosts in Chrome
layout: post
category: blog
tags:
- Chrome
- ChromeOS
- SSH

---
{% include JB/setup %}

## The Problem

When using Secure Shell App (a Chrome extension), a change to the remote SSH key can result in this error:

<pre>
Connecting to user@example.com...
Loading NaCl plugin... done.
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@    WARNING: REMOTE HOST IDENTIFICATION HAS CHANGED!     @
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
IT IS POSSIBLE THAT SOMEONE IS DOING SOMETHING NASTY!
Someone could be eavesdropping on you right now (man-in-the-middle attack)!
It is also possible that a host key has just been changed.
The fingerprint for the ECDSA key sent by the remote host is
SHA256:tUTWb0FixomtBhWgz+IxetBUzvj9k4KH7dEk1CgRE9I.
Please contact your system administrator.
Add correct host key in /.ssh/known_hosts to get rid of this message.
Offending ECDSA key in /.ssh/known_hosts:1
ECDSA host key for example.com has changed and you have requested strict checking.
Host key verification failed.
NaCl plugin exited with status code 255.
(R)econnect, (C)hoose another connection, or E(x)it?
 failed! :(
</pre>
 
 
## The Solution
 
 1. Go to the connection screen where this failed
 2. Press Ctrl-Shift-j to open developer tools
 3. Identify the index of the entry to remove (1st line = 1).
 <code>lib.fs.readFile(term_.command.fileSystem_.root, '/.ssh/known_hosts', (contents) => {console.log(contents)})</code>
 4. Remove the entry by index.
 <code>term_.command.removeKnownHostByIndex(1)</code>
 5. Alternately (instead of steps 3-4), remove all entries.
 <code>term_.command.removeAllKnownHosts()</code>
 6. Reconnect to the server and accept the key.
