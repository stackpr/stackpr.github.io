---
title: Automated Readability
layout: post
category: blog
tech:
- Readability
- Drupal
- PHP
permalink: /blog/2012/08/27/automated-readability

---
{% include JB/setup %}
<div id="node-212" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>As we begin to focus on improving content with our monthly publication, an obvious issue to discuss is tracking the readability level. In theory, there is an optimal level of readability for our publication, and we should be careful to stay within specific bounds as we write and publish. For an introduction to the various techniques, start with <a href="http://en.wikipedia.org/wiki/Automated_Readability_Index">Automated Readability Index (wikipedia)</a>. Most of these techniques are implemented using the classes provided by <a href="https://github.com/DaveChild/Text-Statistics">PHP Text Statistics</a>.</p>
<p>Since we maintain content using Drupal, an obvious starting place was the <a href="http://drupal.org/project/readability">Drupal Readability Project</a>, which uses the PHP class referenced above. However, I was unsatisfied with its data model. Since Drupal allows changes to a node without creating a new version id (vid), it stores readability with a timestamp. We always create new versions, and we only need one index. Thus, there was a much lighter technique available that did not involve adding multiple extra modules.</p>
<p>Step 1: Create an integer field on the node type.</p>
<p>Step 2: Implement hook_form_alter() to hide the integer field from the edit field (optional).</p>
<p>Step 3: Implement hook_nodeapi() to update the integer field in the "presave" operation.</p>
<pre class="brush:php">
      ...
      include_once "sites/all/libraries/text-statistics/TextStatistics.php";
      $body_notags = trim(strip_tags($node-&gt;body));
      $stats = new TextStatistics;
      $smog = $stats-&gt;smog_index($body_notags);
      //-&gt;flesch_kincaid_grade_level($body_notags);
      //-&gt;gunning_fog_score($body_notags);
      //-&gt;coleman_liau_index($body_notags);
      //-&gt;automated_readability_index($body_notags);
      $node-&gt;field_readability_smog = array(
        array(
          'value' =&gt; $smog
        )
      );
      ...</pre>
<p>Further enhancement of the analysis is also possible with minimal effort. There is a freely available <a href="http://www.afterthedeadline.com/api.slp">web service to check grammar and readability</a>. The web service returns various statistics that could allow us to track such specific items as cliches and repeated words (likely typos). I may bundle the two options into a module if we determine that the extra data will actually be actionable for us. At the moment, we need to establish a longer track record to decide how to use the data we collect.</p>
<p>It is an exciting step forward.</p>
</div></div></div>  </div>
</div>
