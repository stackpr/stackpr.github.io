---
title: SPA8800 Echo Troubleshooting
layout: post
category: blog
tech:
- VoIP
- SPA8800
permalink: /blog/2012/07/30/spa8800-echo-troubleshooting

---
{% include JB/setup %}
<div id="node-181" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Sometimes the key to troubleshooting one problem is to find out that there are other problems. I was informed that some phone calls had an echo after the local staff person spoke. It took some effort to confirm that it was an echo and not just a delay (although latency can evolve into an echo), and so I thought that the problem had been sufficiently clarified. However, while looking at echo-related configurations, someone mentioned that they experienced the echo more when they had to turn the volume all the way up.</p>
<p>Of course, louder volume causing more echo did not surprise me, but it did send me down a different path. Rather than troubleshooting <a href="http://www.cisco.com/en/US/products/ps10024/products_qanda_item09186a0080a359cc.shtml">many different echo-related settings</a>, I focused on how to help them avoid turning the volume up. I turned Network Jitter Level from High to Medium to slightly reduce network latency, and I increased the PSTN to SPA Gain to 12 (<a href="https://supportforums.cisco.com/thread/2021625">values range from -15 to 12</a>). According to the first link, the echo suppression is an auto-gain that overrides the PSTN to SPA Gain, but that was not our experience. Increasing the gain addressed the volume problem, and the echo problem is addressed for the moment.</p>
</div></div></div>  </div>
</div>
