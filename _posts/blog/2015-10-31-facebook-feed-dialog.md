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
      var v = $(this).val().trim();
      if (v == "") return;
      o += (o.indexOf('?') == -1) ? '?' : '&';
      o += $(this).attr('id') + '=' + encodeURIComponent(v);
    });
    $('#output').val(o);
  });

---
{% include JB/setup %}

Fully customizing a post on Facebook is a bit trickier than it used to be since sharer.php is deprecated and its old configurations are not reliable.
The SDKs provide handy options when JavaScript is available, but it is a bit more complicated if you simply want to (1) customize a post on a fan page or (2) distribute a link directly to a customized share form.

## The Process for Posting a Customized Post to Your Facebook Fan Page

Note that this is a very developer-centric solution that is likely only appropriate if you already have some degree of Facebook integration on your site.

1. Register an app (web site app) and set the app's web site address to your domain name. Input its ID into the "App ID" below.
1. Identify your Facebook Page's ID and add to "From" below.
1. Customize the Title, Caption, Description and Picture URL below. Those should be self-explanatory.
1. Create an URL on your site where this should direct after posting the note. It can in turn be a redirect link back to Facebook, if you like. Add to "Redirect URI" below.
1. Copy the "Built URL" and distribute it as you like. It would be advisable to actually create another redirect link on your site to send a user here -- or use a public URL shortener for that task.

## Utility Form

<form id="linkbuilder">
  <div class="form-group">
	<label for="app_id">App ID:</label>
	<input id="app_id" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="from">From (optional Page/User ID):</label>
	<input id="from" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="to">Target (optional Page/User timeline ID - defaults to "From"):</label>
	<input id="to" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="name">Title:</label>
	<input id="name" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="caption">Caption:</label>
	<input id="caption" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="description">Description:</label>
	<input id="description" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="picture">Picture URL:</label>
	<input id="picture" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="redirect_uri">Redirect URI (for after post):</label>
	<input id="redirect_uri" type="text" size="30" />
  </div>
  <div class="form-group">
	<label for="output">Built URL:</label>
	<textarea id="output" style="height:150px;width:100%"></textarea>
  </div>
</form>
