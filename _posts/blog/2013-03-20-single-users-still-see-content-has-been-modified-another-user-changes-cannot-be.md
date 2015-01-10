---
title: Single Users Still See "This content has been modified by another user, changes
  cannot be saved."
layout: post
category: blog
tech:
- Drupal
permalink: /blog/2013/03/20/single-users-still-see-content-has-been-modified-another-user-changes-cannot-be

---
{% include JB/setup %}
<div id="node-260" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Drupal 6 has a very blunt validation check to ensure that multiple users do not make changes to the same node content. If a node is saved after an edit form is loaded, then the form will not validate. So if Bill and Sue both start editing a node at the same time, whoever submits first will have their content saved. Rather than creating a complex system to deal with conflicts, the system enforces a strong rule to help avoid them. However, it is also triggered by such single-user actions as a double-submission. Although double-submissions need to be handled carefully such that a generalized solution is likely inappropriate, the error message from this basic rule is often very confusing when their changes still get saved.</p>
<!--break-->
<p>If you use content profile or have any other node type that should only be edited by its owner, then there is a simple module-based solution. The node module enforces this using the change time rather than revision id since the system does not generate a new revision on save by default. If the edit form thinks it is looking at a version of the node that is newer than any other submission. Here is the code:</p>
<pre class="brush:php">
&lt;?php
function mymodule_nodeapi(&amp;$node, $op, &amp;$a3, &amp;$a4) {
  if ($op === 'prepare') {
    // Effectively allow multiple submissions for the next hour for this user on this node.
    $node-&gt;changed = time() + 3600;
  }
}</pre>
<p>This does NOT address double-submissions on node creation, and you can see that the limitation is based on clock time. This should only be done after careful consideration of the specific node type, and the timeframe that you enable double-submissions should be limited so that the hole in the validation is kept no larger than it needs to be.</p>
</div></div></div>  </div>
</div>
