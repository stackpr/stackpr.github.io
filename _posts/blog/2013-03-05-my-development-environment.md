---
title: My Development Environment
layout: post
category: blog
tags:
- Windows
- PHP
- Eclipse
- PuTTY
- Linux
- KDE
permalink: /blog/2013/03/05/my-development-environment

---
{% include JB/setup %}
<div id="node-255" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I have a long love affair with my Linux development environment. Among other things, Konsole is by far my favorite SSH client, and having command-line access to both the local and remote systems makes life so much better. However, the reality is that Windows is basically a job requirement in terms of testing to ensure that the system works properly for the majority of our users. I've dealt with the diverging objectives in a number of ways over the years from remote desktop to virtual machines. After managing the complexity for so long, it started just to feel like stubbornness that taxed me a little too much for the small benefits I received. So I committed to a Windows-only workstation that could manage my Linux servers in the cloud in a simple and efficient manner. My computer is more responsive than ever, and I will soon forget about the small perks that I've lost. Nothing here is novel, but this will be my record when it comes time to reinstall on the next computer.</p>
<!--break-->
<h2>
	Compare and Contrast</h2>
<p>It is shocking how few factors affect my workspace. I prefer to interact with source control over SSH such that many project management features don't really help. In fact, my code base is large enough that both Zend and Eclipse choke on the build phase when included as a normal project. Working on the code as a remote system works far more smoothly in both environments. So I just need a solid SSH client, autocomplete and reasonable source code formatting configurations.</p>
<table border="1" cellpadding="1" cellspacing="0" style="width: 100%;"><thead><tr><th scope="col" style="width: 50%;">
				Factor</th>
			<th scope="col" style="width: 25%;">
				Kubuntu + Zend</th>
			<th scope="col" style="width: 25%;">
				Windows + Eclipse</th>
		</tr></thead><tbody><tr><td>
				SSH Client</td>
			<td>
				Konsole</td>
			<td>
				MTPuTTY + KiTTY</td>
		</tr><tr><td>
				Effect of selecting text</td>
			<td>
				No effect - keystroke to copy</td>
			<td>
				Automatically copy to clipboard</td>
		</tr><tr><td>
				How to paste</td>
			<td>
				Ctrl-shift-v</td>
			<td>
				Shift-Insert or right-click</td>
		</tr><tr><td>
				Effect of a random/accidental right-click</td>
			<td>
				none</td>
			<td>
				paste</td>
		</tr><tr><td>
				SSH client color control</td>
			<td>
				customizable</td>
			<td>
				customizable</td>
		</tr><tr><td>
				Clipboard history</td>
			<td>
				built into KDE</td>
			<td>
				none</td>
		</tr><tr><td>
				Source code formatting (the only real downside for the IDE change)</td>
			<td>
				excellent and addresses all concerns</td>
			<td>
				~80% of Zend's capabilities and lacks ideal options for arrays and switches</td>
		</tr><tr><td>
				Autocomplete</td>
			<td>
				excellent</td>
			<td>
				excellent</td>
		</tr><tr><td>
				Cost (beyond operating system)</td>
			<td>
				$300</td>
			<td>
				$0</td>
		</tr><tr><td>
				Resource consumption</td>
			<td>
				2.0G (varies by VM configuration)</td>
			<td>
				0.5G (varies but avoids VM overhead)</td>
		</tr></tbody></table><h2>
	References</h2>
<ul><li>
		<a href="http://ttyplus.com/">TTY+: Multi-Tabbed TTY</a></li>
	<li>
		<a href="http://www.9bis.net/kitty/">KiTTY: A modified version of PuTTY</a></li>
	<li>
		<a href="http://drupal.org/node/75242">Drupal's Eclipse Instructions</a></li>
	<li>
		<a href="http://projects.eclipse.org/projects/tools.pdt">Eclipse PHP Development Tools</a></li>
	<li>
		<a href="http://sourceforge.jp/projects/pdt-tools/">PHP Code Formatter</a></li>
	<li>
		<a href="http://stackoverflow.com/questions/5896909/code-completion-not-working-with-remote-file-with-rse">PHP Code Autocompletion from Remote System Files</a></li>
</ul></div></div></div>  </div>
</div>
