---
title: Lightdm autologin problem on Lubuntu 12.10
layout: post
category: blog
project:
- /project/witti-kiosk
tech:
- Lubuntu
- Ubuntu
- Linux
- Lightdm
- Unity
permalink: /blog/2013/03/17/lightdm-autologin-problem-lubuntu-1210

---
{% include JB/setup %}
<div id="node-258" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Lubuntu 12.10 ships with Lightdm as the default window manager. It is flexible and fast. It allows you to select alternative greeters and a wide variety of defaults. The Ubuntu wiki has <a href="https://wiki.ubuntu.com/LightDM">excellent documentation for the configuration</a>. However, the autologin feature was not quite right. I configured it to log into a no-password user account. The user entry box would disappear, but it would not continue into the session until you manually pressed the "login" button.</p>
<!--break-->
<p>I located some other people experiencing similar problems, and there is a potentially related bug on file: <a href="https://bugs.launchpad.net/ubuntu/+source/lightdm/+bug/902852">Bug #902852 “Timed autologin feature not working” : Bugs : “lightdm” package : Ubuntu</a></p>
<p>After some trial and error, I determined that it was not lightdm causing the problem -- it was the greeter. The default Lubuntu greeter is lightdm-gtk-greeter. It is possible that there was a solution with an alternate configuration (e.g., maybe the autologin user needs a password), and it is possible that a newer version of the greeter would work if I wanted to mess with the repos, and it is possible that any number of lightweight greeters could have done the trick. However, I took a straight line to a solution.</p>
<p>I installed unity-greeter and adjusted the lightdm.conf to use it. The unity-greeter appears to be default in Ubuntu, but Lubuntu chose a lighter greeter. In fact, unity-greeter installed 247 new packages on the system. That seems quite unnecessary, but it was a stable and quick way to address my problem. Given the activity on the bug report above, I'm optimistic that future versions of Lubuntu and lightdm-gtk-greeter will not have this problem.</p>
<h2>
	Solution Summary</h2>
<ol><li>
		sudo apt-get update</li>
	<li>
		sudo apt-get install unity-greeter</li>
	<li>
		Edit "/etc/lightdm/lightdm.conf" and update line "greeter-session=unity-greeter"</li>
</ol></div></div></div>  </div>
</div>
