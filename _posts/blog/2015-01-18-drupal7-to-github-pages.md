---
title: Exporting Drupal 7 Web Site to GitHub Pages (Jekyll)
layout: post
category: blog
tags:
- Drupal
- GitHub
position:
- Developer

---
{% include JB/setup %}

# Dropping Drupal for Cheaper and Faster Web Site

I have long been a fan of static (or fully cached) web sites.
[Existing web services allow static sites to retain many of the same features.](http://www.witti.ws/blog/2012/10/07/implementing-cloudfront-drupal/)
This web site was initially built in Drupal 6 and then upgraded to Drupal 7 out of habit.
The content creation/management was convenient, but there came a time when I wanted to downgrade my hosting requirements and avoid having to upgrade to Drupal 8.

One simple option I considered was to export to a static version and pay a few cents to host it on S3.
[Others](http://blog.meshul.am/2013/08/archiving-a-website-with-amazon-s3/) have done this too, and it revolves around a basic wget command:

<pre class="brush:bash">
wget --recursive --no-clobber --page-requisites --html-extension --convert-links --restrict-file-names=windows --domains www.witti.ws --no-parent www.witti.ws
</pre>

However, that makes any kind of additional blogging time-consuming and any redesign too cumbersome to consider.
That is why I decided to go with [GitHub Pages](https://pages.github.com/).
It is a static publishing system that allows templating via [Jekyll](http://jekyllrb.com), and it is FREE or low-cost (depending on whether you are willing to make your web site code publicly visible).

Although most Jekyll sites appear to focus on a monolithic body element, you can actually add fields to your template.
By adding fields to your template, you can essentially export your existing content types as they exist without having to give up any flexibility that comes from tracking data in separate fields.

So the decision was made... Now for the export.

# Summary

1. Install and configure [Jekyll-Bootstrap](http://jekyllbootstrap.com)
2. Install dependencies
3. Export node data
4. Commit and _Push_ the node data
5. Test and enjoy your success!

For planning purposes, it would probably be to your benefit to evaluate all of the various fields that you have configured in Drupal.

# Step 1: Install and configure [Jekyll-Bootstrap](http://jekyllbootstrap.com)

For installation instructions, see [Jekyll-Bootstrap](http://jekyllbootstrap.com).

Enable field support by editing `_includes/themes/bootstrap-3/post.html`.
For each field that you will want to add in Step 3, you will want to add a block to your post file (the example is for a link field named "references" that contains "link" and "title" attributes):

<pre class="brush:php">{{ '
  {% unless page.references == null | page.references == empty %}
  	<div class="row">
	  	<div class="tag_vocabulary col-xs-2">References:</div>
	    <ul class="tag_box inline col-xs-10">
	      <li><i class="glyphicon-tags"></i></li>
	      {% for r in page.references %}
	      	<li><a href="{{ r['link'] }}" rel="nofollow">{{ r['title'] }}</a></li>
	      {% endfor %}
	    </ul>
	</div>
  {% endunless %}  
' }}</pre>

The `unless...endunless` makes it only appear appear when the field is present.

The `for...endfor` iterates over the field values and makes the values available as `r['attribute']`.

# Step 2: Dependencies = YAML

Assuming you have sudo access, the prereqs are minor.
If not, then replace the YAML code with a PHP-only YAML encoder (there are plenty to choose from).

<pre class="brush:bash">
sudo apt-get install libyaml
sudo pecl install yaml
</pre>

# Step 3: Export Process

## WARNING: THIS SHOULD NOT BE RUN WITHOUT CUSTOMIZATION!!!

Place the following code into a file "d2j.drush.inc" within an enabled module folder for your site.
Once installed and customized, you will run:

<pre class="brush:bash">
cd /path/to/www/sites/all/modules/
/path/to/www/sites/all/modules/drush/drush d2j-export
</pre>

<pre class="brush:php">
<?php
function d2j_drush_command() {
  $items['d2j-export'] = array(
    'description' => 'Export to Jekyll.',
  );
  return $items;
}

function drush_d2j_export() {
  $jekyll_root = '/path/to/export/folder/';
  $conf = array();
  $all_images = array();

  // Get all of the nodes.
  $sql = "SELECT * FROM {node} ORDER BY nid ";
  foreach (db_query($sql)->fetchAll() as $row) {
    $node = node_load($row->nid);

    // Build the export
    $exports = array(
      'title' => $node->title,
      'layout' => 'post',
      'category' => $node->type,
      'permalink' => url("node/{$node->nid}"),
      // Add any other fields that <em>any</em> of your entities might utilize.
      'project' => array(),
      'tags' => array(),
      'team' => array(),
      'position' => array(),
      'images' => array(),
      'js' => array(),
      'references' => array(),
    );

    // Build the node and trim the markup.
    $node->title = 'DELETE';

    // Attempt to extract php from the body.
    if (preg_match("@^(.*)<\?php(.*?)\?>(.*)$@s", $node->body[LANGUAGE_NONE][0]['value'], $arr)) {
      $node->body[LANGUAGE_NONE][0]['value'] = $arr[1] . $arr[3];
      if (preg_match("@drupal_add_js\('(.*?)'@s", $arr[2], $arr2)) {
        $exports['js'][] = $arr2[1];
      }
      else {
        // Flag any embedded PHP - it is not supported by default in Jekyll.
        drupal_set_message("PHP extraction: " . $arr[2], 'error');
      }
    }

    // Build the node_view.
    $node_view = node_view($node);

    // Add the tags - map vocabularies to specific fields that were init'd above.
    $tag_map = array(
      'taxonomy_vocabulary_1' => 'tags',
      'taxonomy_vocabulary_2' => 'position',
      'taxonomy_vocabulary_4' => 'team',
    );
    foreach ($tag_map as $voc => $tags) {
      if (isset($node->{$voc}) && isset($node->{$voc}[LANGUAGE_NONE])) {
        foreach ($node->{$voc}[LANGUAGE_NONE] as $tag) {
          $exports[$tags][] = $tag['taxonomy_term']->name;
        }
        unset($node_view[$voc]);
      }
    }

    // Convert any link fields.
    $link_fields = array(
      'field_reference' => 'references',
    );
    foreach ($link_fields as $field => $tgt) {
      if (isset($node->{$field}) && isset($node->{$field}[LANGUAGE_NONE])) {
        foreach ($node->{$field}[LANGUAGE_NONE] as $f) {
          if (empty($f['url'])) {
            continue;
          }
          $exports[$tgt][] = array(
            'title' => $f['title'],
            'link' => $f['url'],
          );
        }
        unset($node_view[$field]);
      }
    }

    // Convert any file fields.
    $file_fields = array(
      'field_document' => 'references',
    );
    foreach ($file_fields as $field => $tgt) {
      if (isset($node->{$field}) && isset($node->{$field}[LANGUAGE_NONE])) {
        foreach ($node->{$field}[LANGUAGE_NONE] as $f) {
          if (empty($f['filename'])) {
            continue;
          }
          $filename = $f['filename'];
          $filename = preg_replace('@[^a-z0-9\.\-]@s', '_', strtolower($filename));
          $exports[$tgt][] = array(
            'title' => $filename,
            'link' => "/assets/files/$filename",
          );
          $all_images[] = $filename;
        }
        unset($node_view[$field]);
      }
    }

    // Change the node reference fields - convert them to URL data.
    $fields = array(
      'field_project',
    );
    foreach ($fields as $field) {
      if (!isset($node->{$field}) || !isset($node->{$field}[LANGUAGE_NONE])) {
        continue;
      }
      foreach ($node->{$field}[LANGUAGE_NONE] as $v) {
        $project = $v['entity']->nid;
        if ($project === '') {
          continue;
        }
        $exports['project'][] = url("node/$project");
      }
      unset($node->{$field}, $node_view[$field]);
    }

    // Change the image fields.
    $fields = array(
      'field_screenshot',
    );
    foreach ($fields as $field) {
      if (!isset($node->{$field}) || !isset($node->{$field}[LANGUAGE_NONE])) {
        continue;
      }
      foreach ($node->{$field}[LANGUAGE_NONE] as $v) {
        $img = trim($v['filename']);
        if ($img === '') {
          continue;
        }
        $img = preg_replace('@^.*/@s', '', $img);
        $img = strtolower($img);
        $img = preg_replace('@[^a-z0-9\.\-]@s', '_', $img);
        $test = $jekyll_root . 'assets/files/' . $img;
        if (!is_file($test)) {
          $test = preg_replace('@\.([^\.]*)$@', '_0.\1', $test);
          if (is_file($test)) {
            $img = preg_replace('@\.([^\.]*)$@', '_0.\1', $img);
          }
        }
        $exports['images'][] = $img;
        $all_images[] = $img;
      }
      unset($node->{$field}, $node_view[$field]);
    }

    // Render the node and trim the markup.
    $rendered_node = drupal_render($node_view);
    $md = $rendered_node;
    $md = preg_replace('@<h2><a[^>]+>DELETE</a></h2>@s', '', $md);
    $md = preg_replace('@<div id="disqus_thread">.*?</div>@s', '', $md);
    $md = preg_replace('@<div[^>]*>\s*</div>@s', '', $md);
    $md = preg_replace('@<div[^>]*>\s*</div>@s', '', $md);
    $md = preg_replace('@<span class="submitted">[^<]+</span>@s', '', $md);
    $md = preg_replace("@\n\s*\n@s", "\n", $md);

    // Choose a path.
    // This will likely be customized per-site unless you already utilize a /**/YYYY/mm/dd/title structure.
    $path = url("node/{$node->nid}");
    // Put all unpublished nodes into the _drafts folder.
    if ($node->status != 1) {
      $created = strftime('%Y-%m-%d', $node->created);
      $path = preg_replace('@^.*/@s', '', $path);
      $path = '_posts/_drafts/' . $created . '-' . $path . '.md';
      $exports['published'] = FALSE;
    }
    elseif (preg_match('@^/(.*)/(\d+)/(\d+)/(\d+)/(.*)$@s', $path, $arr)) {
      $path = "_posts/$arr[1]/$arr[2]-$arr[3]-$arr[4]-$arr[5].md";
    }
    elseif (preg_match('@^/(project|park|portfolio|content)/(.*)$@s', $path, $arr)) {
      if ($arr[1] === 'content') {
        $arr[1] = 'portfolio';
      }
      $exports['category'] = $arr[1];
      $created = strftime('%Y-%m-%d', $node->created);
      $path = "_posts/$arr[1]/$created-$arr[2].md";
    }
    drush_print("{$node->nid} {$node->type}: $path");

    // Add jquery when necessary (e.g., other JS is being included.)
    if (!empty($exports['js'])) {
      array_unshift($exports['js'], 'jquery');
    }

    // Build the output from the exports and markdown.
    foreach ($exports as $k => $v) {
      if (is_array($v) && empty($v)) {
        unset($exports[$k]);
      }
    }
    $output = yaml_emit($exports);
    $output = preg_replace("@\.+[\r\n]*$@s", '', $output);
    $output .= "\n---\n";
    $output .= "{% include JB/setup %}\n";
    $output .= $md;

    // Write the content.
    $full_path = $jekyll_root . $path;
    file_put_contents($full_path, $output);
  }

  // Confirm that images exist.
  $all_images = array_unique($all_images);

  foreach ($all_images as $img) {
    $path = $jekyll_root . 'assets/files/' . $img;
    if (!is_file($path)) {
      drupal_set_message("Unable to locate $img", 'error');
    }
  }
}
</pre>

# Step 4: Commit and Push the data

Once you are satisfied that the export is generating appropriad MD files, you will need to commit and push the files to GitHub.

# Step 5: Test and enjoy your success!

Testing will be key.

If you have anything beyond a basic installation of Drupal, you will likely need to modify the export and add/adjust the field export logic.

Additionally, you will likely need to adjust your Jekyll template to appropriately render all of the field data that you export.

Fortunately, the field concepts in Drupal map well to the YAML configurations within Jekyll for most content-driven applications. Some tweaking will likely be necessary, but the benefit is the elimination of hosting considerations moving forward as long as you have a WORM-style blog model for your web site.

# Your experiences?

Has anyone else migrated from Drupal to Jekyll? What were your experiences, and did you attempt to retain the field structures you had established within Drupal?
