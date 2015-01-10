---
title: Convert to Microsoft Office 2010 Format
layout: post
category: blog
tech:
- Microsoft Office
- Microsoft Word
- Microsoft Excel
permalink: /blog/2011/08/24/convert-microsoft-office-2010-format

---
{% include JB/setup %}
<div id="node-119" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>After upgrading to Microsoft Office 2010, you eventually encounter the issue of converting old file formats to the newer file formats (e.g., .doc to .docx). Large distributed shops and those that use macros heavily might find it worthwhile to look into <a href="http://technet.microsoft.com/en-us/library/ff453909.aspx">Office Migration Planning Manager (OMPM) for Office 2010</a>. For smaller shops, it is a complex blunt instrument. The Office File Converter (ofc.exe) that it utilizes can be used independently, but it creates a second file that causes your system to get cluttered over time. The third Microsoft option would be to encourage users to convert files within Office whenever they have to open them. Of course, that leaves your file server in a state of transition for much longer.</p>
<!--break-->
<p>I eventually landed on scripting around the converter programs that ship with office (at least with Office12 and Office14). Since you can specify both the input and output files, it is a little easier to control what it looks like after the file format upgrade.</p>
<h2>
	Script Objectives</h2>
<ol><li>
		Maintain a backup folder (P:\_ConvertedOfficeDocs\) to archive pre-conversion files.</li>
	<li>
		Upgrade only one folder (and its subfolders) at a time.</li>
	<li>
		Restrict which folders can be upgraded (P:\) to limit exposure from flawed command-line calls.</li>
	<li>
		Allow a user to preview what the script will do during the upgrade.</li>
</ol><h2>
	How to Call the Script</h2>
<p>To preview the conversion process:</p>
<pre class="brush:bash">
php ConvertOfficeDocs.php P:\Root\Path\to\Convert</pre>
<p>To actually perform the conversion process, append "1":</p>
<pre class="brush:bash">
php ConvertOfficeDocs.php P:\Root\Path\to\Convert 1</pre>
<h2>
	Source Code for ConvertOfficeDocs.php</h2>
<pre class="brush:php">
&lt;?php
// Configure the script for your computer.
$convert_restrict = 'P:\\';
$convert_archive = 'P:\\_ConvertedOfficeDocs\\';
$office_dir = 'C:\Program Files\Microsoft Office\Office14';
// Verify the inputs.
if (strpos($_SERVER['argv'][0], 'ConvertOfficeDocs.php') === FALSE) {
  die("Strange running format");
}
$root = $_SERVER['argv'][1];
if (!is_dir($root)) {
  die("$root does not exist.");
}
if (strpos($root, $convert_restrict) !== 0) {
  die("You can only convert within $convert_restrict");
}
$live = $_SERVER['argv'][2];
echo "Converting documents in $root.\n\n";
$dir_iterator = new RecursiveDirectoryIterator($root);
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
foreach ($iterator as $file) {
  $path = (string) $file;
  $path_msg = trim(str_replace($root, '', $path), '\\');
  if (is_file($path . "x")) {
    echo "ERROR: $path_msg already has converted version.\n";
    exit;
  }
  elseif (preg_match('@^~@', basename($path))) {
    echo "REMOVE: TEMP FILE $path_msg\n";
    if ($live) {
      @unlink($path);
    }
    continue;
  }
  elseif (preg_match('@\.doc$@', $path)) {
    echo "TO DOCX: $path_msg\n";
    $cmd = '"' . $office_dir . '\Wordconv.exe" -oice -nme ';
    $cmd .= escapeshellarg($path) . ' ' . escapeshellarg($path . 'x');
  }
  elseif (preg_match('@\.xls$@', $path)) {
    echo "TO XLSX: $path_msg\n";
    $cmd = '"' . $office_dir . '\excelcnv.exe" -oice ';
    $cmd .= escapeshellarg($path) . ' ' . escapeshellarg($path . 'x');
  }
  elseif (preg_match('@\.ppt$@', $path)) {
    echo "TO PPTX: $path_msg\n";
    $cmd = '"' . $office_dir . '\ppcnvcom.exe" -oice -nme ';
    $cmd .= escapeshellarg($path) . ' ' . escapeshellarg($path . 'x');
  }
  else {
    continue;
  }
  $convert_dir = str_replace($convert_restrict, $convert_archive, dirname($path));
  $convert_path = str_replace($convert_restrict, $convert_archive, $path);
  if (!is_dir($convert_dir)) {
    echo "DIR: $convert_dir\n";
    mkdir($convert_dir, 0777, TRUE);
  }
  if ($live) {
    system($cmd);
    rename($path, $convert_path);
  }
  else {
    echo "$cmd\n\n";
  }
}
if (!$live) {
  echo "Run the command again with an extra '1' at the end to actually convert.\n";
}
</pre>
</div></div></div>  </div>
</div>
