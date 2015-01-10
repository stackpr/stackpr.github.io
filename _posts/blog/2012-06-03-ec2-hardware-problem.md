---
title: EC2 Hardware Problem?
layout: post
category: blog
tech:
- Amazon EC2
- Linux
permalink: /blog/2012/06/03/ec2-hardware-problem

---
{% include JB/setup %}
<div id="node-127" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The EC2 instance became unreachable. The Amazon console dumped the following from the syslog:</p>
<code>[2803865.768008] INFO: rcu_sched_state detected stall on CPU 0 (t=7805190 jiffies)
[2803865.768014] INFO: rcu_sched_state detected stall on CPU 1 (t=7805190 jiffies)
[2804045.888006] INFO: rcu_sched_state detected stall on CPU 1 (t=7850220 jiffies)
[2804045.888007] INFO: rcu_sched_state detected stall on CPU 0 (t=7850220 jiffies)
[2804226.008008] INFO: rcu_sched_state detected stall on CPU 0 (t=7895250 jiffies)
[2804226.008010] INFO: rcu_sched_state detected stall on CPU 1 (t=7895250 jiffies)
[2804406.128007] INFO: rcu_sched_state detected stall on CPU 1 (t=7940280 jiffies)
[2804406.128006] INFO: rcu_sched_state detected stall on CPU 0 (t=7940280 jiffies)</code>
<p>After the second reboot, the instance resumed normal operation. Right now, it is an N of 1, but I will report back if this happens again and do some additional troubleshooting at that point -- there was no unusual spike in activity around the time when the instance went down. Unfortunately, I'm not alone with this problem: <a href="https://www.google.com/search?aq=f&amp;gcx=c&amp;sourceid=chrome&amp;client=ubuntu&amp;channel=cs&amp;ie=UTF-8&amp;q=rcu_sched_state+detected+stall+on+CPU#hl=en&amp;client=ubuntu&amp;channel=cs&amp;sclient=psy-ab&amp;q=%22rcu_sched_state+detected+stall+on+CPU%22+ubuntu+ec2&amp;oq=%22rcu_sched_state+detected+stall+on+CPU%22+ubuntu+ec2&amp;aq=f&amp;aqi=&amp;aql=&amp;gs_l=serp.3...489864.496036.2.496145.15.14.1.0.0.0.140.1499.3j11.14.0...0.0.br4R-yrGOM8&amp;pbx=1&amp;bav=on.2,or.r_gc.r_pw.r_cp.r_qf.,cf.osb&amp;fp=3673d45f295f1eea&amp;biw=1353&amp;bih=872">Google results</a>.</p>
<p><em>July 6 - A month later, I encountered the same problem with the same resolution after rebooting twice. My faith in AWS has been shaken between this and the power outage a couple weeks ago -- it's been an unfortunate summer so far.</em></p>
</div></div></div>  </div>
</div>
