---
title: Cross-Domain Single Sign-On (CDSSO)
layout: post
category: blog
tags:
- PHP
- Drupal
- Cookies
- CDSSO
- SSO
permalink: /blog/2013/11/25/cross-domain-single-sign-cdsso

---
{% include JB/setup %}
<div id="node-297" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The typical approach to cross-domain single sign-on requires a browser redirect prior to page load. This is secure primarily because it is simple and blunt. <a href="http://openam.forgerock.org/openam-documentation/openam-doc-source/doc/admin-guide/#chap-cdsso">OpenAM</a>, Oracle's <a href="http://docs.oracle.com/cd/E19575-01/820-3746/6nf8qcveh/index.html">OpenSSO</a>, and <a href="http://tools.ietf.org/html/rfc6749#page-7">OAuth </a>all use a similar redirection approach that requires the user's main window to hit the authorization (using OAuth's terminology) server. This is fine if you have a public-facing web site that is identical for most users and needs authentication to view any part of the protected content. However, imagine that you want to have a simple "Logged in" block at the top of every page (if they are logged in). If you want that to appear on all sites once a user logs in using one of those techniques, that would require some sort of redirection process for all anonymous requests since you could never be confident that the request should actually be treated as anonymous. The mainstream solutions would allow a user to connect to the second site with a single click to initiate the redirect process for authentication, but they do require that click. To simply have people logged in immediately on multiple domain names requires some creativity.</p>
<!--break-->
<p><a href="http://en.wikipedia.org/wiki/Security_Assertion_Markup_Language">SAML</a> is an attempt to standardize SSO solutions because each SSO solution relies on proprietary technologies, but even SAML does not focus on the seamless CDSSO solution that I want. The user experience can improve slightly when navigating from one site to another by having the links on site 1 effectively go to the initial authentication redirect for site 2 like with IBM's <a href="http://publib.boulder.ibm.com/tividd/td/ITAME/GC23-4682-00/en_US/HTML/ws-agmst63.htm">WebSEAL</a> (see process flow description). By having the link take you directly to the authentication step on the other site, one redirect is eliminated. Of course, that only helps when navigating from site 1 to site 2, and it does not help when navigating independently to both sites. I am confident that hundreds of experienced developers have solved this problem in a hundred different ways.</p>
<h2>
	General Techniques</h2>
<h3>
	Single-Domain</h3>
<p>The simplest solution is to keep all relevant applications on the same domain name such that they can share a cookie. Of course, this is not cross-domain, so it does not speak to the CDSSO issue.</p>
<h3>
	User-Initiated</h3>
<p>The vast majority of SSO solutions (including consumer solutions like Facebook Connect) require the user to somehow initiate the authentication by clicking a "log in" link or by attempting to access a protected resource. Upon such an event, the user is sent to an authentication URL that then redirects with appropriate tokens to confirm the identity of the user. Unless authentication is required for your entire site, this does not solve the challenge of seamlessly logging into multiple domains. Unlike the other options, the performance of this option is very predictable. Also unlike the other options, this option does not attempt to make the CDSSO experience truly seamless.</p>
<h3>
	Best-Effort</h3>
<p>A best-effort approach would be to attempt to authenticate on other domains in the background. This could be accomplished by logging users into other domains by displaying a <a href="http://en.wikipedia.org/wiki/Web_bug">web bug</a>. This is best effort because the login would only constitute CDSSO if all of the images are loaded (e.g., the user does not navigate away). The web bug would either have a token or a signature so that the other domain would know how to open the session. In the extreme case of a shared cross-domain user sessions, that token could simply be the session id itself. For this to be safe, however, the logout action needs to invalidate sessions on all domain names behind the scenes since a "best effort" logout could result in a major security breach. The least processor-intensive approach would be a signature approach that does not require any hit to the database. Given that there is a race condition (i.e., to load the bugs before user action), there is some arbitrary and variable limit to the number of sites this would support.</p>
<h4>
	Page Pseudo-Code</h4>
<pre class="brush:php">
if (just_authenticated()) {
  // The list of bugs needs to survive until first HTML rendering
  // These are img tags that will be output within the HTML
  add_bugs_for_all_domains();
}
</pre>
<h4>
	Bug Pseudo-Code</h4>
<pre class="brush:php">
// Output a transparent gif.
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
if (valid_authentication_request()) {
  // Start the session or just set the cookie.
  session_start();
}
</pre>
<h3>
	Passive with JavaScript</h3>
<p>If you are willing for the seamless login to only work with JavaScript, then the cross-domain capabilities of directly-embedded JavaScript provides an interesting option. Basically, a user would log into a SSO authentication server that redirects back to the initial login site. That much is not very magical. When the user is on another site, however, that site would treat them like an anonymous user on the server-side and confirm that they are anonymous on the client-side. This can be achieved by including a JavaScript call on all anonymous page requests that either does nothing (if they are not logged in) or triggers a direct through the standard SSO process (if they are logged in). This only works if JavaScript is enabled, but this approach would scale to any number of domains.</p>
<p>Caching must be handled very carefully with this strategy to ensure that the passive hits to the server do not overload your system. If your reverse proxy caches any no-cookie requests, that will likely be sufficient to manage normal loads.</p>
<h4>
	Page Pseudo-Code</h4>
<pre class="brush:php">
if (!is_authenticated()) {
  output_script_tag_to_authentication_server();
}
</pre>
<h4>
	Authentication JS Bug Pseudo-Code</h4>
<pre class="brush:php">
// This is an empty JS file for anonymous requests
if (is_authenticated()) {
  // If this is authenticated, then send the user through the standard auth redirect flow.
  echo "document.location.href = " . json_encode(get_auth_base_url());
  echo " + '&amp;destination=' + encodeURIComponent(document.location.href)";
}
</pre>
<h3>
	Aggressive</h3>
<p>The aggressive approach would be to have the login form redirect through all relevant domain names so that it is quite clear that the relevant cookies are being set on every possible domain name. For a three-site company, that would mean that a login would redirect from A to B to C before redirecting again to its actual intended destination. This is a brute force approach, but it can be quite effective if you only have 2-3 domain names.</p>
<p>Google uses something in this arena, which is most evident when you log out and watch your browser redirect through youtube to adjust sessions in all of their services (<a href="http://vineet-seo.blogspot.com/2011/07/google-redirect-to-accountsyoutubecom.html">source</a>). Unfortunately, this technique starts to fall apart as you add sites since every new domain name requires an additional redirection. <a href="http://www.isi.edu/in-notes/rfc1945.txt">HTTP/1.0 section 9.3</a> indicates that you should redirect no more than 5 times, although most browsers will support more. Some <a href="http://www.redirect-checker.org/how-many-redirects.php">sources</a> indicate that Google will only watch 3 redirects, although you would not want protected resources to be crawled anyway, such that it may not be a factor in your decision. Regardless, this may only be a solid approach if you only have 2-3 domain names.</p>
<h4>
	Page Pseudo-Code</h4>
<pre class="brush:php">
N/A - Nothing hits the client-side
</pre>
<h4>
	Redirect Pseudo-Code (After Authentication)</h4>
<pre class="brush:php">
// Start the session or just set the cookie.
session_start();
if ($next = get_next_redirect()) {
  header("Location: $next");
}
else {
  header("Location: " . get_ultimate_destination());
}
</pre>
<h2>
	The Developer Decision</h2>
<p>The user-initiated solution provides a fallback for other options. With that in mind, the developer can choose between best effort, passive, and aggressive techniques. Informative questions include:</p>
<ol><li>
		How many root domain names you need to support</li>
	<li>
		Whether JS is reliably available for your user base (and whether any of your sites even work without JS)</li>
	<li>
		How reliable you need the "logged in" block to be on each of your sites</li>
</ol><p>Given those variables, there is unlikely to be one "right" decision across all use cases. Unfortunately, that suggests that we are unlikely to ever see complete standardization of CDSSO technologies.</p>
<p>That said, aggressive seems to be a good solution for 2-3 domain names, and then passive seems to be a good solution for more than 3 domain names (with fallback to user-initiated).</p>
</div></div></div>  </div>
</div>
