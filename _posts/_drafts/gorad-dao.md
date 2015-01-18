---
title: GoRAD DAO
layout: post
category: blog
tags:
- GoRad
- PHP
- XML
permalink: /blog/2013/08/14/gorad-dao
published: false

---
{% include JB/setup %}
<div id="node-290" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><div>
	                        &lt;source type="view"&gt;</div>
<div>
	                        SELECT mediaId, itemId, CONCAT(IFNULL(Module.mediaprefix,''),Media.url) AS url, fileName, fileSize, ty$</div>
<div>
	                        FROM {$prefix}Module AS Module JOIN {$prefix}Media AS Media</div>
<div>
	                        &lt;/source&gt;</div>
<div>
	 </div>
<div>
	<div>
		                &lt;relationship name="files_media" type="file" id="media_file"</div>
	<div>
		                    foreignobject="/_media/rss/{$mediaid}.*" /&gt;</div>
	<div>
		 </div>
	<div>
		<div>
			            &lt;relationship name="category_item"</div>
		<div>
			                sourceobject="item" sourcefield="itemId"</div>
		<div>
			                foreignobject="category" foreignfield="categoryId"/&gt;</div>
		<div>
			                &lt;/object&gt;</div>
		<div>
			 </div>
		<div>
			<div>
				                        &lt;relationship name="children_channel"   type="child"</div>
			<div>
				                                sourceobject="channel"</div>
			<div>
				                                sourcefield="channelId"</div>
			<div>
				                                foreignobject="item"</div>
			<div>
				                                foreignfield="itemId"</div>
			<div>
				                                foreignkey="channelId" /&gt;</div>
			<div>
				<div>
					                        &lt;aspect type="org_cpnp_Contact_Batch_PostSave" /&gt;</div>
				<div>
					 </div>
			</div>
		</div>
	</div>
</div>
<p> </p>
</div></div></div>  </div>
</div>
