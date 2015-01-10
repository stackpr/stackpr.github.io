---
title: Understanding Dial Plans
layout: post
category: blog
tech:
- PBX
- VoIP
permalink: /blog/2012/07/17/understanding-dial-plans

---
{% include JB/setup %}
<div id="node-166" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Dial plans serves multiple purposes within a phone system. Essentially, a dial plan is a way to determine when a number has been completely dialed. Although we often think of phone numbers being of a consistent length, that is far from the case. You might dial 0 (1 digit) for operator, 911 (3 digits) in an emergency, 7 digits for a local number, 10 digits for extended local, 11 digits for US nationwide, and more for international. Add in the various IVR and custom short codes, and you get even more variance in the length of a phone number. The dial plan is the best way to differentiate between different use cases -- like between an extension and an area code.</p>
<h2>
	Digit Maps</h2>
<p>The Polycom SoundPoint IP 550 has a field called digit map. That field uses dial plan syntax, but it seems to have a slightly different purpose. Its primary function is to determine when you are done dialing. Thus, some of the dial plan syntax does not apply. For instance, the digitmap has little use for the angle brackets. Also, the matching order seems irrelevant too since it is not routing the call.</p>
<h2>
	Syntax</h2>
<p>Dial plans use a syntax different from anything else I recall having seen. A basic reference can be found <a href="http://www.solidfluid.co.uk/sfsite.php/00000223">here</a>. It is basically a specialized form of regular expressions. The basic syntax is "(1xx|2xx|xx.)". The plan is surrounded by parentheses, and the patterns are separated by pipes (both resembling standard regex usage). Groups of tokens are contained in brackets (e.g., "[1-2]"). That is the extent of the syntactical similarities. Here are some notes on how the dial plan syntax maps to more common string formats:</p>
<ol><li>
		Dial plan "x" is any digit, corresponding to "." in most regex.</li>
	<li>
		Dial plan "*" is the literal asterisk, corresponding to "\*" in most regex.</li>
	<li>
		Dial plan "." is the 0+ instances wildcard, corresponding to "*" in most regex. There is no equivalent to 1+ instances ("+") wildcard, which is why you generally see "xx." in dial plans, which means 1 or more of any digit.</li>
	<li>
		Dial plan "&lt;:text&gt;" inserts the literal string "text" into the dial. For phone calls, this generally would consist of digits, but VoIP introduces alpha characters such that it could be anything. In PHP syntax, you might do preg_match('/(a)(b)/', '\1text\2', $s).</li>
	<li>
		Dial plan "&lt;old:text&gt;" replaces old with the literal string "text" into the dial. For phone calls, this generally would consist of digits, but VoIP introduces alpha characters such that it could be anything. In PHP syntax, you might do preg_match('/(a)old(b)/', '\1text\2', $s). This should not be followed by a period.</li>
</ol><h2>
	The Magic of S0</h2>
<p>Per the syntax instructions, S0 changes the timer to zero and dials immediately. Without setting this, there is a brief (3-4 seconds, configurable) delay while the system waits to see whether additional digits will be dialed.</p>
<h2>
	Execution and Priority</h2>
<p>I had problems locating how the dial plan was actually executed, but the information in <a href="http://forums.whirlpool.net.au/archive/321792">this forum post</a> appeared accurate upon testing. The dialplan is evaluated from left to right, which each match overriding the previous match. However, if the interdigit timer is reduced to zero (via "S0"), then the current match is used and evaluations are stopped. This execution pattern would translate to the following pseudo-code:</p>
<pre>
foreach ($patterns as $pattern) {
  if (match $pattern) {
    $dial = $match;
    if (S0) break;
  }
}</pre>
<p>I'll admit to a limited understanding of the execution plan. Based on real-world testing on an SPA8800, the alphanumeric patterns had to come at the end of the dial plan below for everything to work correctly. Without seeing any documentation for why this might be the case, I would simply suggest that you move any alpha-based patterns to the end of your dial plans if you are experiencing inconsistent behavior.</p>
<pre>
([2-9]xxxxxxxxx|[0-1][2-9]xxxxxxxxx|&lt;line[1-2]-:&gt;[2-9]xxxxxxxxx|&lt;line[1-2]-:&gt;[0-1][2-9]xxxxxxxxx)</pre>
</div></div></div>  </div>
</div>
