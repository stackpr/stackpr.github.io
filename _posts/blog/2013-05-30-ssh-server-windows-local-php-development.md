---
title: SSH Server on Windows for Local PHP Development
layout: post
category: blog
tags:
- Linux
- Cygwin
- Windows
- SSH
- PHP
- Windows 7
permalink: /blog/2013/05/30/ssh-server-windows-local-php-development

---
{% include JB/setup %}
<div id="node-280" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>As a LAMP sysadmin/developer, I have spent plenty of time tuning my IDE and SSH clients to align with my particular workflow and other preferences. For testing purposes and various other reasons, I am committed to a Windows workstation without any unnecessary virtual machine usage. However, there are times when local work just makes more sense and/or the lack of an Internet connection precludes accessing Linux utilities via a remote server. I set out to tailor an installation of cygwin to let me perform local CLI development using the exact same tools and techniques that I use for remote development.</p>
<!--break-->
<h2>
	Objective</h2>
<p>Be able to SSH to my local Windows 7 machine via Cygwin with the objective of running standard Linux-style scripts, including PHP tools that can be repurposed from remote Linux environments.</p>
<h2>
	Installation Process</h2>
<p>I omit PuTTY and SSH general information. If you are not already familiar with both technologies, then Cygwin is less likely to make sense for you.</p>
<ol><li>
		<a href="http://cygwin.com/install.html">Download the Cygwin setup program and launch it</a></li>
	<li>
		During Cygwin setup, select the following packages:
		<ol><li>
				cygrunsrv</li>
			<li>
				openssh</li>
			<li>
				gcc-g++</li>
			<li>
				make</li>
			<li>
				libxml2-devel</li>
			<li>
				curl</li>
			<li>
				vim</li>
			<li>
				nano</li>
		</ol></li>
	<li>
		In the Start Menu, right-click on Cygwin Terminal and Run as Administrator.</li>
	<li>
		In the Cygwin Terminal, run the following three commands:
		<ol><li>
				ssh-user-config -y</li>
			<li>
				ssh-host-config -y</li>
			<li>
				cygrunsrv -S sshd</li>
		</ol></li>
	<li>
		<a href="http://linux-sxs.org/networking/openssh.putty.html">Convert SSH key to a PuTTY PPK file</a></li>
	<li>
		Configure PuTTY to connect to localhost using that new PPK file</li>
	<li>
		Install PHP
		<ol><li>
				<a href="http://php.net/downloads.php">Download PHP source</a> (I tested with 5.3.25)</li>
			<li>
				SSH to localhost (or use Cygwin Terminal if you are going out of order)</li>
			<li>
				Change directory to where the source tarball was downloaded (e.g., `cd /cygdrive/c/Users/YourName/Downloads/`)</li>
			<li>
				Extract the source code folder and go into it (e.g., `tar -xzf php-*.tar.gz; cd php-5.3.25`)</li>
			<li>
				Configure the compilation: `./configure`</li>
			<li>
				Compile PHP: `make; make install`</li>
		</ol></li>
	<li>
		Within SSH (or the Cygwin Terminal), test it with `php -r 'echo date("Y-m-d");'`</li>
</ol></div></div></div>  </div>
</div>
