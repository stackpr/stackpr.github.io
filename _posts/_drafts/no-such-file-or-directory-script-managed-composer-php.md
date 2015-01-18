---
title: '"No such file or directory" in script managed with composer (PHP)'
layout: post
category: blog
tags:
- Composer
- Github
permalink: /blog/2014/11/06/no-such-file-or-directory-script-managed-composer-php
published: false

---
{% include JB/setup %}
<div id="node-340" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><div>
	root@cpnp:/drive/system/code/lib/php-file-converters/vendor/bin# ./drush</div>
<div>
	: No such file or directory</div>
<div>
	root@cpnp:/drive/system/code/lib/php-file-converters/vendor/bin# ead -1 ../drush/drush/drush | od -c</div>
<div>
	No command 'ead' found, did you mean:</div>
<div>
	 Command 'eid' from package 'id-utils' (universe)</div>
<div>
	 Command 'ed' from package 'ed' (main)</div>
<div>
	 Command '0ad' from package '0ad' (universe)</div>
<div>
	 Command 'head' from package 'coreutils' (main)</div>
<div>
	 Command 'esd' from package 'pulseaudio-esound-compat' (main)</div>
<div>
	 Command 'rad' from package 'radiance' (universe)</div>
<div>
	 Command 'ad' from package 'netatalk' (universe)</div>
<div>
	 Command 'mad' from package 'mmv' (universe)</div>
<div>
	 Command 'ear' from package 'ecere-dev' (universe)</div>
<div>
	ead: command not found</div>
<div>
	0000000</div>
<div>
	root@cpnp:/drive/system/code/lib/php-file-converters/vendor/bin# ead -1 ../drush/drush/drush | od -c^C</div>
<div>
	root@cpnp:/drive/system/code/lib/php-file-converters/vendor/bin# head -1 ../drush/drush/drush | od -c</div>
<div>
	0000000   #   !   /   u   s   r   /   b   i   n   /   e   n   v       s</div>
<div>
	0000020   h  \r  \n</div>
<div>
	0000023</div>
<div>
	root@cpnp:/drive/system/code/lib/php-file-converters/vendor/bin# cat ~/.gitconfig</div>
<div>
	boris              doctrine-dbal      drush              drush.complete.sh  pscss</div>
<div>
	doctrine           doctrine.php       drush.bat          drush.php</div>
<div>
	root@cpnp:/drive/system/code/lib/php-file-converters/vendor/bin# cat ~/.gitconfig</div>
<div>
	[core]</div>
<div>
	  excludesfile = /go/web/org/cpnp/code/drupal/.gitignore</div>
<div>
	        autocrlf = input</div>
<div>
	 </div>
<div>
	 </div>
<div>
	Corrected by updating .gitconfig, deleting the vendor/drush/drush folder, and running composer update drush/drush.</div>
<div>
	 </div>
</div></div></div>  </div>
</div>
