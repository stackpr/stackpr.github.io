---
title: Office Documents (.docx) opening as zip files from Amazon S3
layout: post
category: blog
tech:
- Linux
- Amazon S3
permalink: /blog/2011/01/24/office-documents-docx-opening-zip-files-amazon-s3

---
{% include JB/setup %}
<div id="node-98" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>It is well-documented at this point that Office documents open as zip files from the Internet under certain circumstances, generally involving IE. If you search for the problem <a href="http://www.google.com/search?q=docx+files+on+s3+open+as+zip+files">on google</a>, you mainly find people who just discovered that problem and/or just found out that Office documents are structured zip files. Unfortunately, the Content-Type header is insufficient for IE to properly load Office documents from S3 links, at least in some cases.</p>
<p><strong>The solution:</strong> Add a Content-Disposition header to the content as well. Something along the lines of: <code>Content-Disposition: attachment; filename="filename.docx"</code></p>
<p>As with most problems, this was discovered after it had already happened. On top of adding this functionality to our API, we also needed to correct those documents already loaded. Fortunately, s3cmd makes this scriptable:</p>
<code>
mkdir temp
cd temp
s3cmd list [bucket]:[folder-prefix] | egrep docx | while read f; do s3cmd get [bucket]:$f ${f/*\//}; done
ls *docx | while read f; do s3cmd put files.cpnp.org:2011/abstract/award/$f $f Content-type:application/vnd.openxmlformats-officedocument.wordprocessingml.document 'Content-Disposition: attachment; filename="'$f'"'; done
echo "Cleanup"
cd ..
rm -rf temp
</code></div></div></div>  </div>
</div>
