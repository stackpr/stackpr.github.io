#!/usr/bin/env php
<?php
if (isset($_SERVER['REQUEST_METHOD'])) {
  echo "Web access is disabled.\n";
  exit;
}

chdir(dirname(__DIR__) . '/assets');
foreach (glob('derivatives/*') as $dir) {
  if (!is_dir($dir)) {
    continue;
  }
  $dims = basename($dir);
  if (preg_match('@^(\d+)x(\d+)$@s', $dims, $arr)) {
    echo "$dims\n";
  }
}
