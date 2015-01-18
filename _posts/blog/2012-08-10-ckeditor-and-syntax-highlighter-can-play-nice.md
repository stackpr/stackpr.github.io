---
title: CKEditor and Syntax Highlighter Can Play Nice
layout: post
category: blog
tags:
- Drupal
- JS
- CKEditor
- Syntax Highlighter
permalink: /blog/2012/08/10/ckeditor-and-syntax-highlighter-can-play-nice

---
{% include JB/setup %}
<div id="node-192" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>With a growing amount of example code on this site, it was time to install a syntax highlighter for blog posts. Given how precious time can be, I wanted to make sure that syntax highlighter could be activated quickly using the WYSIWYG within Drupal (I already used <a href="http://drupal.org/project/ckeditor">CKEditor</a>). I started by installing the <a href="http://drupal.org/project/syntaxhighlighter">Syntax Highlighter Drupal module</a>, which provides integration with the popular <a href="http://alexgorbatchev.com/SyntaxHighlighter/">Syntax Highlighter</a> tool.</p>
<!--break-->
<h2>
	Activating Syntax Highlighter</h2>
<p>The basic Syntax Highlighter configuration was straightforward. The steps are well-documented on the module home page, and downloading the JS library separately was the only hassle. I used the autoloading configuration since I use a variety of different programming languages, and that made it so that inserting basic HTML markup would result in very nice syntax highlighting. Here is an example of what would be necessary:</p>
<pre class="brush:xml">
&lt;pre class="brush:jscript"&gt;
  document.alert('hello world!');
&lt;/pre&gt;</pre>
<p><em>Tip: When working within formatted text like this in CKEditor, hold down the shift key when pressing Enter so that you do not start a new paragraph and lose your &lt;pre&gt; styles.</em></p>
<h2>
	The Limitation</h2>
<p>By default, CKEditor includes a "Formatted" format, which allows you to easily insert a &lt;pre&gt;  tag. However, you are then required to view the source to add the special class attributes that Syntax Highlighter uses for configuration (<a href="http://alexgorbatchev.com/SyntaxHighlighter/manual/configuration/">see "Parameters"</a>). While that is not very difficult, it unfortunately would require me to remember the parameters and search long posts to find the right markup. Really, I'm just lazy enough to want it to be a selection.</p>
<h2>
	Configuring CKEditor to Show Code Style Options</h2>
<p>Customizing CKEditor to show a Styles dropdown instead of a Formats dropdown is easy in theory using the tool directly. You would just customize the JS configuration files. However, layering the Drupal best practices on top of it, and suddenly we have more infrastructure to work with (or around). There is a <a href="http://drupal.org/node/656570#comment-2597082">long discussion</a> of different methods people have used to customize their configuration and styles files. Each solution offered came with several people who had problems with it. So my solution might not work for you either... But it worked for me!</p>
<ol><li>
		As a basis, we'll assume you have the module installed, and the editor displaying. You should also be able to correctly identify which Editor Profile is being used.</li>
	<li>
		We'll also assume that you followed the Syntax Highlighter instructions correctly such that your Input Formats do not strip out the markup after saving a node.</li>
	<li>
		Copy ckeditor.config.js and ckeditor.styles.js to a new location (a custom module, a custom theme, the files directory, etc.)</li>
	<li>
		Edit the relevant Editor Profile:
		<ol><li>
				Expand the "Editor Appearance" fieldset</li>
			<li>
				Remove the "Formats" dropdown (optional)</li>
			<li>
				Add the "Styles" dropdown</li>
			<li>
				Expand the "Advanced options" fieldset</li>
			<li>
				Edit "Custom JavaScript Configuration" to include (leading slashes are important):<br /><pre class="brush:jscript">
config.customConfig = "/path/to/ckeditor.config.js";
config.stylesCombo_stylesSet = "drupal:/path/to/ckeditor.styles.js";</pre>
			</li>
		</ol></li>
	<li>
		Customize your <a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Styles">ckeditor.styles.js</a> file. If you hid the Formats dropdown on your toolbar, I would suggest enabling the heading block styles.</li>
	<li>
		Clear your browser cache</li>
</ol><h2>
	Adding the Syntax Highlighter Styles</h2>
<p>You can add styles that include classes, as long as you initialize them before the defaul (classless) element:</p>
<pre class="brush:jscript">
{ name : 'Code: CSS', element : 'pre', attributes : {'class' : 'brush:css'} },
{ name : 'Formatted', element : 'pre' },</pre>
<p>By initializing them first, the style will appear correctly in the dropdown. If you initialize the classless style first, then the style would appear as "Formatted" when you edit.</p>
<p>You can add as many selectable styles as you like. Here is the list of brushes/classes that I started with on my site:</p>
<pre class="brush:jscript">
{ name : 'Code: JS', element : 'pre', attributes : {'class' : 'brush:jscript'} },
{ name : 'Code: XML', element : 'pre', attributes : {'class' : 'brush:xml'} },
{ name : 'Code: CSS', element : 'pre', attributes : {'class' : 'brush:css'} },
{ name : 'Code: PHP', element : 'pre', attributes : {'class' : 'brush:php'} },
{ name : 'Code: BASH', element : 'pre', attributes : {'class' : 'brush:bash'} },
{ name : 'Code: SQL', element : 'pre', attributes : {'class' : 'brush:sql'} },
{ name : 'Code: VB', element : 'pre', attributes : {'class' : 'brush:vb'} },
{ name : 'Formatted', element : 'pre' },</pre>
</div></div></div>  </div>
</div>
