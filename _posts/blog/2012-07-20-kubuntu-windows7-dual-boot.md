---
title: Kubuntu-Windows7 Dual-Boot
layout: post
category: blog
tech:
- Windows 7
- Ubuntu
- Linux
- NTFS
permalink: /blog/2012/07/20/kubuntu-windows7-dual-boot

---
{% include JB/setup %}
<div id="node-177" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Ubuntu (and therefore my preferred flavor, Kubuntu) is pretty slick for dual-boot. The <a href="https://help.ubuntu.com/community/WindowsDualBoot">dual-boot instructions</a> are pretty straightforward, but the <a href="http://www.ubuntu.com/download/help/install-ubuntu-with-windows">wubi installation</a> process is even easier. You do the basic installation selections within Windows, and then it wraps things up on reboot. Partitioning is not an issue because it simply allows you to choose which NTFS volume should be used for the install (it creates fixed-size virtual disks). Select a flavor of Ubuntu, type a user name and password, and it gets started.</p>
<h2>
	Challenges</h2>
<h3>
	Challenge 1: Drive Partitioning and Windows-Kubuntu Shared Drive</h3>
<p>There will be some working files that I want accessible from both Windows and Kubuntu. The easiest way for that to work is to have a NTFS partition that only stores user data. Both operating systems can work with NTFS, thanks to <a href="http://www.dedoimedo.com/computers/automount_ntfs.html">ntfs-config</a> built-in support with Ubuntu. The first step was taken prior to installation. I shrank and extended partitions so that I had a regular (empty) Windows drive large enough for 18G (for Kubuntu) + 82G (for user files) = 100G. Then, within wubi, I selected that drive as the target for installation. The installer shrank the partition by the configurable 18G value and then started the installation, leaving an 82G NTFS drive mounted in Windows. After the installation, I went back and mounted that partition within Kubuntu without any problem.</p>
<h3>
	Challenge 2: "Cannot download the metalink and therefore the iso"</h3>
<p>Kubuntu 12.04-amd64 created this error message every time I tried wubi (the default Ubuntu flavor downloaded fine). However, I was able to work around it by downloading the Kubuntu LiveCD manually, burning it, and inserting it before running wubi. The wubi system searches for the installation files locally, and so it is able to use the LiveCD and never make the request for the metalink at all. <em>Note: Do not run wubi on the LiveCD - it is a different application that basically tells you to do a classic installation.</em></p>
<h2>
	And the Downside</h2>
<p>As mentioned above, this installation approach uses virtual disks, which are inherently slower than if we were to repartition the underlying hard drives. However, since the user files will be stored on the NTFS drive and not on the virtual disks, this was an acceptable downside for easier installation and backup (since the virtual disks can simply be copied to an external drive for safe-keeping).</p>
</div></div></div>  </div>
</div>
