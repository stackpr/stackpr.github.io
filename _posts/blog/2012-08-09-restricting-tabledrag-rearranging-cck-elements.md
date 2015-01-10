---
title: Restricting TableDrag for Rearranging CCK Elements
layout: post
category: blog
tech:
- Drupal
- JS
permalink: /blog/2012/08/09/restricting-tabledrag-rearranging-cck-elements

---
{% include JB/setup %}
<div id="node-186" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>It is possible with theming to <a href="http://stackoverflow.com/questions/3104651/drupal-cck-remove-draggable-reorder-for-non-admins">disable dragging entirely</a> for a component based on some custom application logic. However, I have a more complex use case in mind, and I was looking for a more extensible solution. The initial use case was to have a list of CCK fields where some subset of the fields need to be kept in the same order. My specific application was for controlling systemwide worklow states versus project-specific states, but an easier example to explain would be with the meta case below.</p>
<p>Consider the data [ A, B, C, 1, 2, 3, !, ? ] where the letters need to be in the same relative order, as do the numbers, but the special characters can go anywhere. That means that the following orders are all legitimate:</p>
<ol><li>
		A, 1, 2, 3, B, !, C ?</li>
	<li>
		?, !, A, B, 1, C, 2, 3</li>
	<li>
		?, A, B, C, 1, 2, !, 3</li>
	<li>
		and so on...</li>
</ol><p>But the following would not be allowed:</p>
<ol><li>
		B, A, C, 1, 2, 3, !, ?</li>
	<li>
		A, 1, B, 3, C, 2, !, ?</li>
	<li>
		and so on...</li>
</ol><p>In my case, I only needed to worry about one subset that needed to stay in-line, but the devised solution was pretty straightforward to support any number of subsets. You would install this by:</p>
<ol><li>
		Copying the JS below into a new file on your site</li>
	<li>
		Add drupal_add_js() where appropriate to load the JS and override the isValidSwap() JS function</li>
	<li>
		Add the "lock-drag-order" and "lock-drag-order-subsetname" classes to an element within the row that should not be draggable. In the case of a form, this would likely be on a form element, but you could add the class to any tag within the row to prevent its dragging. If you only use "lock-drag-order", then it will be locked relative to all locked rows. If you only work with one subset, then the second class is unnecessary.</li>
	<li>
		Test it out!</li>
</ol><p>This creates a wide array of possible configurations, although practical applications are hard to come by. This solution really only constitutes a single JS file, so I do not plan to bundle it into a module.</p>
<pre class="brush: jscript">
Drupal.tableDrag.prototype.row.prototype.isValidSwapDefault = Drupal.tableDrag.prototype.row.prototype.isValidSwap;
Drupal.tableDrag.prototype.row.prototype.isValidSwap = function(row) {
	if (!this.isValidSwapDefault(row)) {
		return false;
	}
	if ($(this.element).has('.lock-drag-order').length == 0) {
		return true;
	}
	var retval = true,
		// Potential class names for the lock id.
		lck = "" + $(this.element).find('.lock-drag-order').eq(0).attr('class'),
		// Positions of the dragging and target rows.
		elmatch = $(row).prevAll().length,
		elsrc = $(this.element).prevAll().length,
		// Vars for logic.
		elstop = false,
		elchecks = null,
		i, clss;
	if (lck == 'undefined') {
		lck = '.lock-drag-order';
	}
	else {
		clss = lck.split(' ').sort();
		for (i = 0; i &lt; clss.length; i++) {
			if (clss[i].indexOf('lock-drag-order') != -1) {
				lck = "." + clss[i];
			}
		}
	}
	if ($(row).find(lck).length != 0) {
		return false;
	}
	i = 0;
	if (elsrc &lt; elmatch) {
		elchecks = $(this.element).nextAll();
	}
	else {
		elchecks = $(this.element).prevAll();
	}
	elchecks.each(function(){
		if (elstop) {
			// do nothing.
		}
		else if ($(this).prevAll().length == elmatch) {
			elstop = true;
		}
		else if ($(this).find(lck).length != 0) {
			elstop = true;
			retval = false;
			i++;
		}
	});
	//console.log(this.direction + ":" + (retval ? 'safe' : 'not safe') + " (checked " + elchecks.length + "/" + i + " els, tgt: " + elsrc + "/" + elmatch + ")");
	return retval;
};</pre>
</div></div></div>  </div>
</div>
