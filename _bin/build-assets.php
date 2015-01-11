#!/usr/bin/env php
<?php
if (isset($_SERVER['REQUEST_METHOD'])) {
  echo "Web access is disabled.\n";
  exit;
}
chdir(dirname(__DIR__) . '/assets');

// Extract the derivatives.
$image_sizes = array();
foreach (glob('derivatives/*') as $dir) {
  if (!is_dir($dir)) {
    continue;
  }
  $dims = basename($dir);
  if (preg_match('@^(\d+)x(\d+)$@s', $dims, $arr)) {
    $image_sizes[] = $dims;
  }
}

// Configure the optimizations.
$optimizers = array(
  '@\.jpe?g$@si' => 'jpegoptim --strip-all :path',
  '@\.png$@si' => 'optipng -o7 :path',
);

// Iterate over the images.
foreach (glob('files/*') as $path) {
  if (!is_file($path) || !filesize($path)) {
    continue;
  }
  $basename = basename($path);

  // Skip non-images.
  if (!preg_match('@\.(?:jpe?g|png|gif)$@si', $basename)) {
    continue;
  }

  // Determine whether to convert an image.
  foreach ($image_sizes as $size) {
    if (is_file("derivatives/$size/$basename")) {
      continue;
    }
    $basenameX = escapeshellarg($basename);
    $cmd = "convert -resize $size files/$basenameX derivatives/$size/$basenameX";
    echo "$cmd\n";
    system($cmd);
    foreach ($optimizers as $match => $optimizer) {
      if (!preg_match($match, $basename)) {
        continue;
      }
      $cmd = strtr($optimizer, array(
        ':path' => "derivatives/$size/$basenameX",
      ));
      echo "  $cmd\n";
      system($cmd);
    }
  }
}

// Build the favicon.ico
// removed:       \( -clone 0 -resize 64x64 \) \
// $cmd = "convert witti/w.png  -bordercolor white -border 0 \
//       \( -clone 0 -resize 16x16 \) \
//       \( -clone 0 -resize 32x32 \) \
//       \( -clone 0 -resize 48x48 \) \
//       -delete 0 -alpha off -colors 256 build/favicon.ico";
// echo "$cmd\n";
// system($cmd);

// Compile the JS.
$js_paths = array(
  'themes/bootstrap-3/bootstrap/js/bootstrap.min.js',
  'xregexp/min/xregexp-min.js',
  'syntaxhighlighter/src/js/shCore.js',
  'syntaxhighlighter/src/js/shBrushBash.js',
  'syntaxhighlighter/src/js/shBrushCss.js',
  'syntaxhighlighter/src/js/shBrushJScript.js',
  'syntaxhighlighter/src/js/shBrushPhp.js',
  'syntaxhighlighter/src/js/shBrushSql.js',
  'syntaxhighlighter/src/js/shBrushVb.js',
  'syntaxhighlighter/src/js/shBrushXml.js',
);
$cmd = "uglifyjs " . join(' ', $js_paths)
  . " --compress --mangle -o build/site.js";
echo "$cmd\n";
system($cmd);
