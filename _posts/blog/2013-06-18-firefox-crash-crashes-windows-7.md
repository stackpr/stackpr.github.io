---
title: Firefox Crash of Crashes on Windows 7
layout: post
category: blog
tech:
- Firefox
permalink: /blog/2013/06/18/firefox-crash-crashes-windows-7
images:
- firefox-growing-01.jpg
- firefox-growing-02.jpg
- firefox-growing-03.jpg

---
{% include JB/setup %}
<div id="node-287" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Firefox 21 was having problems. Memory usage grew consistently to fill all of the RAM. Closing Firefox would leave the firefox.exe process running and with growing memory usage. The screenshots show memory usage growth to over a gigabyte when Firefox was already closed over the course of less than 15 minutes!</p>
<p>Updating did not work. Removing extensions/add-ons did not work. Reinstalling Firefox did not work when personal data was retained. When I dug into the personal data, I discovered the likely problem... Crash reports had used up over 6GB of space!</p>
<!--break-->
<p>I found a reasonable explanation for how Firefox had created so many crash reports. See this ticket: <a href="https://support.mozilla.org/en-US/questions/956743">Firefox is creating huge numbers of crash reports</a>. It relates to version 20, but that matched the timeframe of the slowdown that my coworker had reported sluggishness. My suspicion is that Firefox was now having problems now because it was unable to finish loading all of the crash reports, which caused it to crash. Simply deleting all of the pending crash reports was sufficient to fix the problem. I went the extra step of reinstalling after deleting the crash reports, and Firefox then ran smoothly without becoming a memory hog.</p>
</div></div></div>  </div>
</div>
