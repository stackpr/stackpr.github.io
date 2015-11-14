---
title: Facebook Feed Dialog Direct Link
layout: post
category: blog
tags:
- Facebook
references:
- title: Feed Dialog Documentation
  link: https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.5
js:
- >
  $('#linkbuilder').change(function(){ 
    var o = 'https://www.facebook.com/dialog/feed';
    $(this).find('input').each(function(){
      o += (o.indexOf('?') == -1) ? '?' : '&';
      o += $(this).attr('id') + '=' + encodeURIComponent($(this).val());
    });
    $('#output').val(o);
  });

---
{% include JB/setup %}

Fully customizing a post on Facebook is a bit trickier than it used to be since sharer.php is deprecated and its old configurations are not reliable.
The SDKs provide handy options when JavaScript is available, but it is a bit more complicated if you simply want to (1) customize a post on a fan page or (2) distribute a link directly to a customized share form.

## Utility Form

<form id="linkbuilder">
<p>App ID: <input id="app_id" type="text" size="30" /></p>
<p>Page/User ID (optional): <input id="from" type="text" size="30" /></p>
<p>Title: <input id="name" type="text" size="30" /></p>
<p>Caption: <input id="caption" type="text" size="30" /></p>
<p>Description: <input id="description" type="text" size="30" /></p>
<p>Picture URL: <input id="picture" type="text" size="30" /></p>
<p>Built URL: <textarea id="output" style="height: 50px"></textarea></p>
</form>
