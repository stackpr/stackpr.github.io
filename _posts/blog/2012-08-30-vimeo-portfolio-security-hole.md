---
title: Vimeo Portfolio Security Hole
layout: post
category: blog
tech:
- Vimeo
- video
permalink: /blog/2012/08/30/vimeo-portfolio-security-hole

---
{% include JB/setup %}
<div id="node-216" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Vimeo Pro provides some nice configuration options to dramatically restrict access to your videos. We produced a DVD over the last year, and we are making it available via streaming to provide a pricing model for larger (or distributed) institutions. Rather than investing heavily in extra IT infrastructure, we decided to outsource the video hosting and host on Vimeo for $200 per year. We were able to remove all branding, remove all sharing options (necessary to avoid "Watch Later" workarounds), hide on vimeo.com, and restrict embedding to specific domains. By the end, it was locked down to the point that we simply had to provide access restrictions on the page-level where the iframes were located.</p>
<p>There was a secondary appealing feature of Vimeo Pro. It provides password-protected portfolios. It seemed like we would be able quickly grant access for prospective clients to view a select subset of our video clips, and we could then just disable the password after they had their chance.</p>
<p>However, some of the basic security settings do not apply within a portfolio. Once in a password-protected portfolio, a user can click "Watch Later" to add the video to their profile. Once they do that, they can watch the video from their "Watch Later" page without re-entering the password. In fact, the video remains accessible there after the portfolio password has changed - and even after the portfolio is deleted. So all of that effort to lock things down was almost thrown out the window by setting up a password-protected portfolio. <em>(Tests were conducted on 8/30/2012.)</em></p>
<p>My workaround was to create a page on our site for the potential client so that it could use the production-style authentication. In the end, it was a minor inconvenience. But it is always a little stressful when you stumble across chinks in the armor like that. Overall, I'm still happy with Vimeo so far.</p>
</div></div></div>  </div>
</div>
