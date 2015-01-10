---
title: The GoRAD Toolkit
layout: post
category: portfolio
tech:
- PHP
- GoRad
position:
- Developer
- System Design
permalink: /portfolio/gorad-toolkit

---
{% include JB/setup %}
<div id="node-176" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The GoRAD Toolkit was started in December 2003 to address what I saw as a need for a reliable structured approach to building advanced PHP applications. By the time I started rolling out production sites using the framework, other PHP frameworks with the same goals started popping up. For example, the Zend Framework made many of the same core design decisions and had an alpha in 2004 as well, although it did not release a full 1.0.0 version until July 2007 (<a href="http://framework.zend.com/about">ref</a>). Frameworks are dime-a-dozen now, and I am generally committed to Drupal, but I still use a significant amount of GoRAD in production due to some of the unique utility classes that it provides. The toolkit is not available for download because the MVC components that pervade it have been deprecated in favor of other options (e.g., Drupal).</p>
<!--break-->
<h2>
	GoRAD Design Strategies</h2>
<p>GoRAD was built from the ground up to be extremely flexible and customizable. Although I had learned many lessons through practice, I also recognized that there was already a healthy body of work related to framework design that could be applied to a PHP framework. Many GoRAD design strategies are essentially PHP adaptations of the Core J2EE Patterns, including <a href="http://www.corej2eepatterns.com/Patterns2ndEd/InterceptingFilter.htm">Intercepting Filter</a>, <a href="http://www.corej2eepatterns.com/Patterns2ndEd/ContextObject.htm">Context Object</a>, <a href="http://www.corej2eepatterns.com/Patterns2ndEd/FrontController.htm">Front Controller</a>, <a href="http://www.corej2eepatterns.com/Patterns2ndEd/ApplicationController.htm">Application Controller</a>, <a href="http://www.corej2eepatterns.com/Patterns2ndEd/ViewHelper.htm">View Helper</a>, <a href="http://www.corej2eepatterns.com/Patterns2ndEd/DataAccessObject.htm">Data Access Object</a>, and others. Virtually all components are overridable and configurable with a very fine-grained separation of concerns.</p>
<h2>
	Abbreviated List of GoRAD Packages</h2>
<ol><li>
		Language constructs
		<ol><li>
				Base class with standard property setters/getters and other basic methods</li>
			<li>
				Various utility classes, including standardized operator syntax</li>
			<li>
				Class autoloading</li>
			<li>
				Trivial type juggling and class change (casting to a new class)</li>
			<li>
				PHPT unit testing</li>
			<li>
				Pluggable exceptions</li>
			<li>
				Aggregation for multiple inheritance</li>
		</ol></li>
	<li>
		Assistant
		<ol><li>
				Configured using XML, making it fully exportable</li>
			<li>
				Pluggable configuration syntaxes (2 default syntaxes)</li>
			<li>
				Pluggable data element hierarchy (24 default element types)</li>
			<li>
				Pluggable UI component hierarchy (45 default components)</li>
			<li>
				Contextually override UI components (ex: adjust component markup for jquerymobile based on user agent)</li>
			<li>
				Pluggable actions (21 default actions)</li>
			<li>
				Pluggable command engines</li>
			<li>
				Pluggable report engines (9 default report engines)</li>
			<li>
				Pluggable report controls/subreports</li>
			<li>
				Pluggable data access (resource) layer (4 default engines)</li>
			<li>
				Pluggable search engines (3 default styles of search)</li>
			<li>
				Form mode supported restrictions on number of rows to add and/or edit at once</li>
			<li>
				Can function as a controller, delegate or command within GoRAD MVC</li>
			<li>
				Debugging enabled by XML configuration</li>
		</ol></li>
	<li>
		Automation
		<ol><li>
				Pluggable automation (i.e., cron) system that allows PHP commands to be executed at arbitrary dates/times with supported recurrences</li>
			<li>
				All date calculations and recurrences are based on the GoRAD iCalendar implemenation</li>
			<li>
				All commands are interchangeable with those used online or via CLI</li>
			<li>
				Parameters for the command are stored in the automation object</li>
			<li>
				Output and other execution information is stored in the automation object</li>
		</ol></li>
	<li>
		Brick
		<ol><li>
				Provide a flexible spreadsheet-based multi-variant form configurator</li>
			<li>
				Visible fields and their possible input values are determined by spreadsheet-style formulas</li>
			<li>
				Sample application: a basic linear multi-page form</li>
			<li>
				Sample application: a product configurator that has interrelated restrictions and requirements (e.g., the type of A used limits the types of B that can be used)</li>
		</ol></li>
	<li>
		Slang
		<ol><li>
				Standardized XML format for storing common types of data, serving a function similar to plist, JSON, and YAML</li>
			<li>
				Based generally on the RSS format, it provides a recursive data structure</li>
			<li>
				Maximum emphasis is placed on readability</li>
			<li>
				Advanced applications apply XSLT to convert Slang into more verbose configurations</li>
		</ol></li>
	<li>
		Coding tools
		<ol><li>
				Automatic refactoring for code styles and documentation</li>
			<li>
				Debug and tracing via the Message package</li>
		</ol></li>
	<li>
		Core
		<ol><li>
				Server handlers to initialize the front controller: Apache, CLI, IIS</li>
			<li>
				Front controller, filter manager, mapper, pluggable exceptions, etc.</li>
			<li>
				Message support</li>
			<li>
				Pluggable application controller (3 default controllers: a simple map-based controller, a raw controller to override, and CLI controller)</li>
			<li>
				Pluggable delegates (5 default context-sensitive delegates)</li>
			<li>
				Pluggable filters, commands and views</li>
			<li>
				Advanced page caching</li>
			<li>
				Pluggable contexts, sessions, contacts and users (contacts and users are loosely coupled)</li>
			<li>
				Allow users to select their active contact and context when allowed (using the Perspective system)</li>
			<li>
				Dynamic URI support (register a command to a secure URL and defer processing of user input until that URI is requested)</li>
		</ol></li>
	<li>
		Data Access Object
		<ol><li>
				Pluggable aspects with multiple pointcuts available (4 default aspects for serializing, revision history, prepopulation, and chaining)</li>
			<li>
				Caching</li>
			<li>
				Pluggable relationships that were not bound to the same resource type (4 default relationships including S3 objects, local files, and child-parent)</li>
			<li>
				Pluggable storage engines (default engines include db table using, multiple tables, table aggregator, Lucene, null/memory)</li>
			<li>
				Accessible in template plugins</li>
		</ol></li>
	<li>
		XML and HTML
		<ol><li>
				Extended DOMDocument with significant utility methods</li>
			<li>
				Extended SimpleXML with significant utility methods</li>
			<li>
				Convert CSS to inline styles</li>
			<li>
				Manage XSL and parameters</li>
			<li>
				Perform advanced DOM manipulation more characteristic of jQuery than of the PHP tools</li>
			<li>
				Object-oriented wrapper for Tidy with pluggable configurable automated markup tools (11 default tidy add-on tools)</li>
		</ol></li>
	<li>
		DB filter supporting either Pear or Zend/PDO database layers</li>
	<li>
		Spreadsheet tools
		<ol><li>
				Import and export xml spreadsheets compatible with Excel</li>
			<li>
				Process Excel-compatible formulas, including SUM, MAX, AND, FALSE, IF, NOT, OR, TRUE, HLOOKUP, ROW, VLOOKUP, etc.</li>
		</ol></li>
	<li>
		SQL (MySQL-tested) Tools
		<ol><li>
				GeoCalc integration</li>
			<li>
				Modify queries to support filtering and ordering by a parent-id-style hierarchy</li>
			<li>
				Modify queries to enforce a manual sort order</li>
		</ol></li>
	<li>
		VCX
		<ol><li>
				Pluggable data layer optimized for XML (11 default layers, including XML, Plist, JSON, ini, PHP variables, etc.)</li>
			<li>
				Pluggable version types (21 default versions, including a flexible version that supports 15+ configurations and itself supports plugging)</li>
			<li>
				Statically accessible or bound to context</li>
			<li>
				Supports traversal using many XPath operators</li>
			<li>
				Supports basic data types: string, array, XML</li>
			<li>
				Supports value inheritance and merging</li>
			<li>
				Supports a unique logical infrastructure optimized for code minimalization</li>
			<li>
				Tests can be against the context, the database, user input, and the user themselves (10 default tests that apply to the browser like Flash detection or the user like captcha)</li>
		</ol></li>
	<li>
		Document Support
		<ol><li>
				Pluggable standardized metadata and content access, including a generic document, a virtual document, a PDF, an RSS file, etc.</li>
			<li>
				Pluggable document lock mechanism (some documents are not on the file system)</li>
			<li>
				Pluggable standardized document conversion involving many combinations of these file types: CSS, CSV, HSS, HTML, XML spreadsheet, PDF, Word (DOC/DOCX), XLSX, JPEG, PS, PSD, RTF, SVG, TIFF</li>
			<li>
				Pluggable conversion engines (e.g., 3 techniques to convert HTML to PDF)</li>
			<li>
				Converter filter: allows a converter to run after the application controller to convert all output, and similarly allows Assistant applications to generate PDFs and other file types</li>
		</ol></li>
	<li>
		Emulator: load a context and emulate a request</li>
	<li>
		Helpers for faster development
		<ol><li>
				Basic HTML form</li>
			<li>
				Web form with AJAX handler</li>
			<li>
				Load an Assistant as a module within the controller</li>
			<li>
				Job posting system (Assistant configurations - override with XSLT)</li>
			<li>
				Complex document management based on RSS and common extensions (Assistant configurations - override with XSLT)</li>
			<li>
				Voting/rating system with AJAX handler</li>
			<li>
				FAQ management (Assistant configurations - override with XSLT)</li>
			<li>
				Traverse relationships in the database</li>
			<li>
				And 8 other generic helper views</li>
		</ol></li>
	<li>
		Calendar and date/time tools
		<ol><li>
				Pluggable calendar engine based primarily on the iCal standard</li>
			<li>
				Pluggable imports: iCal, xCal, Exchange, PHP</li>
			<li>
				Pluggable exports: iCal, xCal, PHP</li>
			<li>
				All basic components: event, freebusy, journal, timezone, todo</li>
			<li>
				Import datetimes from unixtime, iCal format, any strtotime-compatible format, etc.</li>
			<li>
				Complete datetime math</li>
			<li>
				Recurrence support, including date exceptions</li>
			<li>
				Accessible in template plugins</li>
		</ol></li>
	<li>
		Messaging API
		<ol><li>
				Standardized interface for any type of message</li>
			<li>
				Pluggable chainable message backend (defaults include templating, archive/db, email, log, etc.)</li>
			<li>
				Automation command that can generate bulk messages for any available messaging backend (e.g., mass emails)</li>
			<li>
				Advanced message structure and consolidation, which supported code traces</li>
		</ol></li>
	<li>
		Web services support
		<ol><li>
				SOAP</li>
		</ol></li>
	<li>
		Template Engine
		<ol><li>
				Standardized object-oriented template engine API</li>
			<li>
				Pluggable template engine backend (7 default engines, including Smarty, DWT, Tal, and others)</li>
			<li>
				The "Litey" engine provided a substitution-based alternative for simple Smarty use cases</li>
			<li>
				The "DWT" engine converted Dreamweaver templates into Smarty templates and compiled them</li>
			<li>
				The "RTFMerge" engine converted mail merge documents created in Word and saved as RTF into Smarty templates and compiled them</li>
			<li>
				Pluggable class-based template plugins provided easier namespace-based extensions to the template system (dozens of default plugins)</li>
		</ol></li>
	<li>
		Composite views
		<ol><li>
				Final output can combine the results of multiple commands/views</li>
			<li>
				Each component (a "UI extra") has similar implementation, from message output to toolbar generation to dynamic charts</li>
			<li>
				Pluggable component structure (multiple defaults)</li>
		</ol></li>
	<li>
		Charting
		<ol><li>
				Pluggable engines (3 defaults: HTML, SWF, JPEG)</li>
		</ol></li>
	<li>
		Sitemap
		<ol><li>
				Filter by context and permissions using VCX</li>
			<li>
				Display as templatable hierarchy (a normal sitemap page)</li>
			<li>
				Display as menu as UI extra</li>
			<li>
				Display as templatable flat list (e.g., for Google Sitemap)</li>
		</ol></li>
	<li>
		User Authentication
		<ol><li>
				Loosely coupled with contact system, supporting a many-many relationship</li>
			<li>
				Pluggable authentication and session engine (has been used to integrate with Drupal, Redmine and others)</li>
			<li>
				Tools to import and merge</li>
		</ol></li>
	<li>
		Batch utilities
		<ol><li>
				Manage arbitrary lists of data that have unique identifiers</li>
			<li>
				Construct the lists of data using a sequential batch logic, which is capable of enormous complexity</li>
		</ol></li>
	<li>
		Spider
		<ol><li>
				Pluggable engines for reading a source (5 default engines, including filesystem, db query)</li>
			<li>
				Pluggable helpers for acting on each document (2 default engines, including database and debug)</li>
		</ol></li>
	<li>
		Array utilities
		<ol><li>
				Standardized syntax to serialize an array into a string (generally HTML) using various techniques</li>
			<li>
				Normalize keys</li>
			<li>
				Sorting utilities for multi-dimensional arrays</li>
			<li>
				Pluggable utilities to access special arrays (13 defaults utilities, including countries, filesystem queries, mime types, etc.)</li>
		</ol></li>
	<li>
		Filesystem utilities
		<ol><li>
				Iterator</li>
			<li>
				Recursive search and replace (CLI)</li>
			<li>
				Integration with the vault (database-managed recycle bin)</li>
			<li>
				Compute a realpath based on include_path and other contextual data</li>
		</ol></li>
	<li>
		Text utilities
		<ol><li>
				Flexible parser and tokenizer to support advanced markup manipulation, spreadsheet formula handling, and a variety of other use cases</li>
			<li>
				Manage conversion between character sets and types of HTML-encoding</li>
			<li>
				Convert strings to boolean values (e.g., "Yes" = "Y" = "True" = 1 = TRUE)</li>
			<li>
				Pluggable encryption (5 defaults)</li>
			<li>
				Basic utilities: character sets, diff, random strings, etc.</li>
			<li>
				Translator support with pluggable translation tools, including manual and Google Translator</li>
		</ol></li>
</ol></div></div></div>  </div>
</div>
