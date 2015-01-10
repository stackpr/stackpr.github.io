---
title: Improving Workspace Sync
layout: post
category: blog
tech:
- Python
- PHP
- Windows
- Linux
- Rsync
permalink: /blog/2013/12/06/improving-workspace-sync
published: false

---
{% include JB/setup %}
<div id="node-301" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Detect files as they change - allows for lower effort per sync.</p>
<p><a href="https://pypi.python.org/pypi/watchdog/0.5.4">https://pypi.python.org/pypi/watchdog/0.5.4</a></p>
<p>apt-get install inotify-tools enables: inotifywait -r -e close_write .</p>
<p>Unfortunately, that trigger event and then listen-again pattern creates gaps where edits will be lost.</p>
</div></div></div>  </div>
</div>
