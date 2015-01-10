---
title: The PHP Identical Operator is Underutilized
layout: post
category: blog
tech:
- PHP
permalink: /blog/2012/07/11/php-identical-operator-underutilized

---
{% include JB/setup %}
<div id="node-154" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>I ran into a lovely problem with GUIDs and string comparisons using equals (==). The case randomly came about that two GUIDs being compared were both in valid scientific notation. That resulted in conversion to numbers before comparison, and the numbers were equal because the scientific notations both evaluated to zero since they were too small for PHP float data types to support. Here is the proof:</p>
<pre class="brush:php">
&lt;?php var_dump(("8000002E-1284124578" == "8000011E-1336593641"));</pre>
<p>For those less familiar with scientific notation, this translates to 8000002 x 10^-1284124578, or 0.0000...(a billion zeros)...8. In PHP, the equals operator does type juggling before comparisons, and this always involves converting to numbers when both strings happen to be valid numeric strings (<a href="http://www.php.net/manual/en/language.operators.comparison.php">reference</a>).</p>
<p>The fix was simply to use the Identical operator (===). In reality, this edge case has the potential to create holes in many PHP applications since many developers (myself included in at least this case) use == for string comparisons when === is what should actually be used. One safeguard that reduces the chance of this bug is to require key data to start with an alpha character, but simply using the stricter === operator seems like a better precaution whenever the values are known to be strings.</p>
<p>As a point of reference, this distinction between == and === is similar with JavaScript (<a href="http://www.w3schools.com/js/js_comparisons.asp">reference</a>). However, unlike PHP, JavaScript only does type conversion if the two values are of different types. This yields different results than PHP when both numbers start as strings, but the same result when one of the strings is cast to a number. Here are two JS evaluations:</p>
<pre class="brush:jscript">
FALSE: ("8000002E-1284124578" == "8000011E-1336593641")
TRUE: ("8000002E-1284124578" == "8000011E-1336593641" * 1)</pre>
<p>So PHP made a different decision here. Ultimately, I believe that PHP made the decision so that the transitive property of equality would hold. Example:</p>
<ol><li>
		100 == "100" is reasonable and almost necessary for PHP to be sane</li>
	<li>
		100 == "100.0" is reasonable and follows from (1)</li>
	<li>
		Therefore, "100" == "100.0"</li>
	<li>
		Therefore, numeric strings should be compared as numbers</li>
	<li>
		"1E2" and "10E1" are scientific numeric strings for 100</li>
	<li>
		Therefore, since numeric strings should be compared as numbers, "1E2" == "10E1"</li>
</ol><p>Obviously, this creates some problems with edge-case values such as the GUIDs above, but there is a rational and thoughtful reason that the equals operator works the way it does. Additionally, it is an issue that can be avoided entirely by using the <a href="http://www.phpbench.com/">slightly more efficient</a> (and definitely more appropriate) identical operator.</p>
<p><em>Edit: A counter-example shows where == is not transitive due to different type-casting. "a" == 0, "a" == TRUE, 0 != TRUE</em></p>
</div></div></div>  </div>
</div>
