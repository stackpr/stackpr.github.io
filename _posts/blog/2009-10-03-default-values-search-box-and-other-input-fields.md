---
title: Default Values in Search Box and Other Input Fields
layout: post
category: blog
tags:
- jQuery
permalink: /blog/2009/10/03/default-values-search-box-and-other-input-fields

---
{% include JB/setup %}
<div id="node-57" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>This is a simple jQuery snippet that will put text (e.g. "Search...") into a text input field based on the alt attribute. This avoids having to compute a default value server-side, and it provides more data to the user at the same time.</p>
<!--break-->
<h2>The HTML</h2>
<p class="code">&lt;input alt="Search..." type="text" /&gt;</p>
<h2>The jQuery</h2>
<p class="code">$(document).ready(function(){<br />
    $('input[alt]:text').click(function(){<br />
        if ($(this).val() == $(this).attr('alt')) {<br />
            $(this).val('');<br />
        }<br />
    }).blur(function(){<br />
        if ($(this).val() == "") {<br />
            $(this).val($(this).attr('alt'));<br />
        }<br />
    }).each(function(){<br />
        $(this).val($(this).attr('alt'));<br />
    });<br />
});</p></div></div></div>  </div>
</div>
