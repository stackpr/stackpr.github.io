---
title: Data Warehouse Research Led to OLAP and MDX/XMLA
layout: post
category: blog
tags:
- OLAP
- MDX
- XMLA
- Data Warehouse
- MapReduce
permalink: /blog/2012/10/23/data-warehouse-research-led-olap-and-mdxxmla

---
{% include JB/setup %}
<div id="node-245" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>After years of basic data extraction and a couple years of data warehousing with time-based analysis, I began designing a system with more interesting query capabilities based on aggregating multiple dimensions. The implementation techniques were generally iterative based on the sophisticated functionality benefits that I gained in similar batch generation projects, but those techniques inevitably run into speed challenges. I had investigated MapReduce as one of the sexy new technologies, but the biggest implementations (Hadoop, Amazon EMR) were designed for big data with some delay for batch processing. That solution does not scale down to what I wanted. However, armed with my rough notes, I began searching for BI and analytics solutions that fit well. As is often the case, it just took some lucky searches to come across the right jargon. Once you have the right search terms, the world opens up.</p>
<!--break-->
<p>Most of the queries I was implementing against my data warehouse could be replicated with some effort using a PivotTable in Excel, and reading on server-side implentations of PivotTables eventually led me to the OLAP cube. The OLAP cube was exactly what I was looking for to address some of my use cases. It provides a conceptual framework for communicating and standardizing data structures for BI analysis. Research into OLAP led me to the MDX query language used along with OLAP, and it had such a rich and applicable syntax for addressing multi-dimensional queries. Such queries in SQL require multiple complex (and often inefficient) joins.</p>
<p>At the time of this research, the wikipedia entry for <a href="http://en.wikipedia.org/wiki/Data_warehouse">data warehouse</a> only references OLAP as the 17th "see also" link. The term is used more in BI circles. I likely saw OLAP multiple times without paying much attention for one good reason -- it is basically inaccessible to the PHP developer. The leading PHP tool appears to be <a href="http://olap4php.org">olap4php.org</a>, but they have not reached a 1.0 release yet. Even worse, the servers are dominated by Java and Microsoft solutions, which rarely fit comfortably in a LAMP stack.</p>
<p>I've thrown some new terms into my vocabulary, and my research continues. If OLAP and XMLA were as ubiquitous as MySQL and PHP, then I'd have my solution. As it stands, I am currently left with the unfortunate choice of adding the complexity of integrating with a system with minimal PHP library and IDE support or continuing down the route of investing time in a more limited but accessible custom solution. Time will tell, but you can guess my next search terms!</p>
<p>If I choose to use an open source OLAP server, <a href="http://mondrian.pentaho.com/">Mondrian</a> (from Pentaho) is the definite winner in my book. ocCube appears more user-friendly, but its free version has strict limitations. If I choose to go a custom route, at least I have the option of implementing as a subset of a standard to allow for a more graceful transition later.</p>
<h2>
	Some References for OLAP, MDX/XMLA and MapReduce</h2>
<ol><li>
		<a href="http://en.wikipedia.org/wiki/OLAP_cube">Introduction to OLAP cubes</a></li>
	<li>
		<a href="http://en.wikipedia.org/wiki/Pivot_table">Pivot tables are low-level OLAP clients</a></li>
	<li>
		<a href="http://en.wikipedia.org/wiki/Multidimensional_Expressions">MDX is used to query this type of data</a></li>
	<li>
		<a href="http://blogs.simba.com/simba_technologies_ceo_co/2010/11/why-mdx.html">MDX over SQL</a></li>
	<li>
		<a href="http://sqlblog.com/blogs/mosha/archive/2006/10/25/time-calculations-in-udm-parallel-period.aspx">MDX to create hierarchies</a></li>
	<li>
		Examples of MDX queries
		<ol><li>
				<a href="http://www.iccube.com/support/documentation/mdx_tutorial/calculated_members.html">Basic examples of calculated members without aggregation.</a></li>
			<li>
				<a href="http://www.iccube.com/support/documentation/viz/viz/doc/viz11PivotTableII.html">Examples that can be executed, including aggregation.</a></li>
		</ol></li>
	<li>
		<a href="http://www.iccube.com/products/iccube/olap-server">icCube is an open source OLAP database</a></li>
	<li>
		<a href="http://virtuoso.openlinksw.com/">Virtuoso provides XMLA support</a> (not free)</li>
	<li>
		<a href="http://en.wikipedia.org/wiki/Comparison_of_OLAP_Servers">Other open source OLAP databases exist.</a></li>
	<li>
		<a href="http://cwebbbi.wordpress.com/2010/11/11/pass-summit-day-2/">But is OLAP dead according to Microsoft?</a></li>
	<li>
		<a href="http://mondrian.pentaho.com/documentation/schema.php#Dynamic_datasource_xmla_servlet">Mondrian (Pentaho): Dynamically load the datasources.xml file to detect changes</a>
		<ol><li>
				Example datasource xml: <a href="http://trac.spatialytics.com/geomondrian/browser/trunk/geomondrian/FoodMart.xml">http://trac.spatialytics.com/geomondrian/browser/trunk/geomondrian/FoodMart.xml</a></li>
		</ol></li>
	<li>
		<a href="http://stmcpherson.net/2011/03/17/aggregates-and-big-data/">Aggregates and Big Data | StMcPherson's Blog</a></li>
	<li>
		<a href="http://www.cbsolution.net/ontarget/mapreduce_vs_data_warehouse">MapReduce vs Data Warehouse</a></li>
	<li>
		<a href="http://hadoop.apache.org/docs/r0.15.2/streaming.html#Working+with+the+Hadoop+Aggregate+Package+(the+-reduce+aggregate+option)">The aggregate reducer/combiner package</a></li>
</ol></div></div></div>  </div>
</div>
