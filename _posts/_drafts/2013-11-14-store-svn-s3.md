---
title: Store SVN on S3
layout: post
category: blog
tags:
- Subversion
permalink: /blog/2013/11/14/store-svn-s3
published: false

---
{% include JB/setup %}
<div id="node-292" class="node node-blog node-promoted node-unpublished">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><ol><li>
		s3vn: <a href="http://www.cs.cornell.edu/projects/quicksilver/public_pdfs/ladis-s3vn.pdf">http://www.cs.cornell.edu/projects/quicksilver/public_pdfs/ladis-s3vn.pdf</a>, <a href="http://s3vn.msigi.net/">http://s3vn.msigi.net/</a> (not ready for production)</li>
	<li>
		s3fs: <a href="https://code.google.com/p/s3fs/wiki/InstallationNotes">https://code.google.com/p/s3fs/wiki/InstallationNotes</a> (stores full files, local cache important, but cache needs to be manually purged: <a href="https://code.google.com/p/s3fs/issues/detail?id=159">https://code.google.com/p/s3fs/issues/detail?id=159</a> and <a href="https://code.google.com/p/s3fs/wiki/FuseOverAmazon">https://code.google.com/p/s3fs/wiki/FuseOverAmazon</a> [find "unbounded"])</li>
	<li>
		s3backer: <a href="https://code.google.com/p/s3backer/">https://code.google.com/p/s3backer/</a> (<a href="http://www.turnkeylinux.org/blog/exploring-s3-based-filesystems-s3fs-and-s3backer">http://www.turnkeylinux.org/blog/exploring-s3-based-filesystems-s3fs-and-s3backer</a>)</li>
	<li>
		s3ql: <a href="https://code.google.com/p/s3ql/wiki/Installation">https://code.google.com/p/s3ql/wiki/Installation</a> (also splits files to deduplicate)</li>
</ol><p>We can copy db/revs/ files to S3, mount that bucket using s3fs, and then do a symlink from the normal revs folder to the s3fs mount after an appropriate delay so that S3 can reach consistency before we rely on it (via s3fs). This requires a footprint for the other svn folders, as well as a buffer for any revisions that have not yet been transferred. However, 5G is probably more than sufficient, compared to 110G right now.</p>
<p>This script could be agnostic about the fs mount. It could simply take a configuration for the delay to account for the eventual consistency.</p>
<p>Purging the local file mount could be done safely by checking "lsof filename" (list open files). If it is not present, then it is safe to remove. If it is present, then perhaps it should be touched.</p>
<p>Exclude already-linked files: find . -type f -regex '[0-9]+' (or similar)</p>
</div></div></div>  </div>
</div>
