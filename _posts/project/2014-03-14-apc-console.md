---
title: APC Console
layout: post
category: project
tags:
- PHP
- APC
permalink: /project/apc-console

---
{% include JB/setup %}
<div id="node-327" class="node node-project node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Our web site platform is highly efficient, primarily due to the aggressive caching we have implemented using APC. APC has performance advantages over other systems like Redis and Memcache because it avoids any kind of protocol overhead. It is tightly integrated and allows PHP to access the key-value pairs in memory. However, it comes with the drawback that any command-line PHP does not have access to the same cache because it is running in a different process. This becomes a major issue when there are intensive background processes that are run, and it can become a major source of database load in configuration-heavy systems like Drupal. So how do we leverage the online cache that has been built when working with console applications?</p>
<p><!--break--></p>
<p><a href="https://github.com/wittiws/apc-console"><img alt="Fork me on GitHub" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" style="position: absolute; top: 0; right: 0; border: 0;" /></a>The common response is that it is not possible: <a href="http://stackoverflow.com/questions/439262/how-can-i-get-php-to-use-the-same-apc-cache-when-invoked-on-the-cli-and-the-web">reference</a>, <a href="http://stackoverflow.com/questions/1245242/php-apc-in-cli-mode">reference</a>. Some people have had some success <a href="http://stackoverflow.com/questions/10029361/using-php-apc-cache-in-cli-mode-using-dumpfiles">using dumpfiles</a> for opcode caching, which more closely resembles the solution I am considering for accessing the user cache.</p>
<h2>
	Security</h2>
<p>Performing system administration via a web-based PHP script requires extra attention to security. To minimize the overhead from security layers, the following techniques are employed/recommended:</p>
<ol><li>
		The configuration is in a PHP file rather than a YAML/JSON file that could be viewable online.</li>
	<li>
		The console and web parts include a secret key in their handshake. You are responsible for generating the key, but uuidgen is a simple solution.</li>
	<li>
		<strong>Most importantly</strong>, this script should be installed on a private port so that it cannot be accessed by the public.</li>
</ol><h2>
	Basic Usage: Using User Variable Cache from Console</h2>
<p>More features are planned, but the basic usage is simply to access the user variable cache while running a console (command line) PHP script. This is straightforward:</p>
<ol><li>
		Create a VirtualHost listening on a private port (i.e., NOT 80!)</li>
	<li>
		Clone the ApcConsole repository from <a href="https://github.com/wittiws/apc-console">github</a>.</li>
	<li>
		Copy settings.php.dist to settings.php and make any customizations - minimally, change the secret.</li>
	<li>
		Include the default handler near the top of your console application:
		<pre class="brush:php">
require_once "/path-to-private-site/apc-console/index.php";</pre>
	</li>
</ol><h3>
	Tip: Usage with Drush</h3>
<p>Add the require_once statement to your module's hook_drush_init() function.</p>
</div></div></div>  </div>
</div>
