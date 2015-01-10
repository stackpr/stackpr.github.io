---
title: Disable Modal Dialogs for Firefox and Windows User Access Control (UAC)
layout: post
category: blog
tech:
- Windows
- Firefox
permalink: /blog/2012/08/20/disable-modal-dialogs-firefox-and-windows-user-access-control-uac

---
{% include JB/setup %}
<div id="node-206" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p><a href="http://en.wikipedia.org/wiki/Modal_window">Modal windows</a> have a usability benefit in some cases. By requiring user interaction and visually emphasizing the dialog, you can be far more certain that a user is aware of it. However, the habit of shading out the rest of the window (or the rest of the screen) can become a major irritation, especially when working over remote desktop or on a system with overtaxed graphics. Two such cases that went far beyond nuisance in my mind were Firefox and Windows UAC.</p>
<!--break-->
<p>In Firefox, a simple JS alert (already technically modal without the shading cue) would cause the entire page to be shaded gradually. The result is that the entire window would re-download over remote desktop as a graphic several times as the shading faded in. You quickly begin to dread any action that might trigger an alert. The Windows UAC was just as annoying. The UAC would effectively lock your screen by default whenever any program wanted to do anything. Given how many apps auto-update these days, your screen would be taken over far too frequently with the default settings. For better or worse (you can decide), I wanted the background shading/dimming/etc turned off. Google search results show that I'm not alone...</p>
<h2>
	Disable Modal in Firefox</h2>
<ol><li>
		Enter the address "about:config"</li>
	<li>
		In the search box, type "modal"</li>
	<li>
		Double-click on "prompts.tab_modal.enabled" so that the value changes to "false"</li>
</ol><h2>
	Disable Modal in Windows 7 UAC</h2>
<ol><li>
		From the Start menu, open "Change User Account Control Settings" (type "UAC" in the search box to locate it quickly).</li>
	<li>
		Using the slider, change the setting to "Notify me only when programs try to make changes to my computer (do not dim my desktop)". Note that the parenthetical is all that distinguishes this option from the slightly higher option.</li>
</ol><p><em>Note: Microsoft includes a warning that discourages this setting. Make sure that avoiding the modal dialog is worth the risk for you.</em></p>
<h2>
	Bonus Firefox Tip: Disable New Tab</h2>
<p>The screenshots that render on a new tab are also an unnecessary drag on remote desktop. A blank white area is much faster to load. Fortunately, FF makes this one easy.</p>
<ol><li>
		Open a new tab</li>
	<li>
		Click the 3x3 grid icon in the upper right corner to make the screenshots disappear (to toggle them)</li>
	<li>
		New tabs should no longer show the screenshots, although it is easy to switch back with the toggle button</li>
</ol></div></div></div>  </div>
</div>
