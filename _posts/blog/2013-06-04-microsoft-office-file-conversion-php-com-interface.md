---
title: Microsoft Office File Conversion via PHP COM Interface
layout: post
category: blog
tags:
- Microsoft Office
- Microsoft Word
- Microsoft Excel
- PHP
- COM
- Windows
permalink: /blog/2013/06/04/microsoft-office-file-conversion-php-com-interface

---
{% include JB/setup %}
<div id="node-283" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>For quite a long time, I used the file converters provided by Microsoft to <a href="http://www.admin.witti.ws/blog/2011/08/24/convert-microsoft-office-2010-format">convert to the Microsoft Office 2010 format</a>. PHP scripts would simply build the commands and perform the conversions via a system() call. That was stable, and it seemed reasonable to rely on Microsoft to maintain reliable utilities that were so essential to their Office product line. However, the file converters stopped working on our Windows 2008 R2 64-bit server when Office was switched from 64-bit to 32-bit (to address various plugin issues). Office 32-bit converters simply did not work on Windows 2008r2 64-bit.</p>
<!--break-->
<p>A possible workaround seemed to present itself when I noted that the Office applications themselves were still quite capable of upgrading/converting file formats. The ultimate solution was to create PHP functions that convert files using COM access to the Office applications. Thus, rather than relying on the broken file converters, the PHP script launches Word/Excel, opens the file, converts it, and saves it using the alternate file format. PHP's COM methods (or at least those from Office) throw exceptions rather than triggering errors or returning FALSE. That is an appropriate technique, but we need to ensure that the functions clean up after themselves as much as possible, which is why you see so many try/catch structures and rethrows.</p>
<p>Obviously, the script requires that you (1) be on Windows, (2) have Office installed, and (3) have the com_dotnet PHP module enabled. Good luck!</p>
<h2>
	The Script</h2>
<pre class="brush:php">
&lt;?php
function msword_convert($old, $new) {
  // Verify that the old document exists.
  if (!is_file($old)) {
    throw new ErrorException("File not found.");
  }
  $old = realpath($old);
  // Force user to unlink the target file before converting (do not mess with overwrites).
  if (is_file($new)) {
    throw new ErrorException("Destination file already exists.");
  }
  // Connect to Word
  if (!class_exists('COM')) {
    throw new ErrorException('COM extension is not enabled.');
  }
  $word = new COM("word.application");
  if (!$word) {
    throw new ErrorException('Unable to instantiate Word COM object.');
  }
  // Check the Word version.
  if ($word-&gt;Version &lt; 12) {
    $word-&gt;Quit();
    throw new ErrorException('The version of Word is too old.');
  }
  // $word-&gt;visible = 1;
  try {
    // Documents.Open: http://msdn.microsoft.com/en-us/library/office/ff835182%28v=office.14%29.aspx
    $word-&gt;Documents-&gt;Open($old, FALSE, TRUE);
  } catch (Exception $e) {
    $word-&gt;Quit();
    throw $e;
  }
  // Document.Convert: http://msdn.microsoft.com/en-us/library/office/bb243727(v=office.12).aspx
  try {
    $word-&gt;ActiveDocument-&gt;Convert();
  } catch (Exception $e) {
    // The convert call is unavailable when it is unnecessary.
    // Thus, suppress the error.
  }
  // WdSaveFormat: http://msdn.microsoft.com/en-us/library/office/bb238158%28v=office.12%29.aspx
  static $wdSaveFormats = array(
    'docx' =&gt; 16,
    'html' =&gt; 10,
    'rtf'  =&gt; 6,
    'txt'  =&gt; 2,
    'doc'  =&gt; 0,
    'pdf'  =&gt; 17,
  );
  $newSaveFormat = 16;
  if (preg_match('@\.(.{3,4})$@', $new, $arr)) {
    if (isset($wdSaveFormats[$arr[1]])) {
      $newSaveFormat = $wdSaveFormats[$arr[1]];
    }
  }
  $rethrow = NULL;
  try {
    // Document.SaveAs: http://msdn.microsoft.com/en-us/library/office/bb221597%28v=office.12%29.aspx
    $word-&gt;ActiveDocument-&gt;SaveAs($new, $newSaveFormat);
  } catch (Exception $rethrow) {
    // We still want to close the document.
  }
  try {
    // Document.Close: http://msdn.microsoft.com/en-us/library/office/bb214403(v=office.12).aspx
    $word-&gt;ActiveDocument-&gt;Close(FALSE);
  } catch (Exception $e) {
  }
  try {
    // Application.Quit: http://msdn.microsoft.com/en-us/library/office/bb215475(v=office.12).aspx
    $word-&gt;Quit();
  } catch (Exception $e) {
  }
  if (isset($rethrow)) {
    throw $rethrow;
  }
}
function msexcel_convert($old, $new) {
  // Verify that the old document exists.
  if (!is_file($old)) {
    throw new ErrorException("File not found.");
  }
  $old = realpath($old);
  // Force user to unlink the target file before converting (do not mess with overwrites).
  if (is_file($new)) {
    throw new ErrorException("Destination file already exists.");
  }
  // Connect to excel
  if (!class_exists('COM')) {
    throw new ErrorException('COM extension is not enabled.');
  }
  $excel = new COM("excel.application");
  if (!$excel) {
    throw new ErrorException('Unable to instantiate excel COM object.');
  }
  // Check the excel version.
  if ($excel-&gt;Version &lt; 12) {
    $excel-&gt;Quit();
    throw new ErrorException('The version of excel is too old.');
  }
  // $excel-&gt;visible = 1;
  try {
    // Workbooks.Open: http://msdn.microsoft.com/en-us/library/office/bb179167%28v=office.12%29.aspx
    $excel-&gt;Workbooks-&gt;Open($old, FALSE, TRUE);
  } catch (Exception $e) {
    $excel-&gt;Quit();
    throw $e;
  }
  // XlFileFormat: http://msdn.microsoft.com/en-us/library/office/bb241279%28v=office.12%29.aspx
  static $xlFileFormat = array(
    'xlsx' =&gt; 51,
    'xls'  =&gt; 43,
    'csv'  =&gt; 6,
  );
  $newSaveFormat = 51;
  if (preg_match('@\.(.{3,4})$@', $new, $arr)) {
    if (isset($xlFileFormat[$arr[1]])) {
      $newSaveFormat = $xlFileFormat[$arr[1]];
    }
  }
  try {
    // Workbook.SaveAs: http://msdn.microsoft.com/en-us/library/office/bb214129%28v=office.12%29.aspx
    $excel-&gt;ActiveWorkbook-&gt;SaveAs($new, $newSaveFormat);
  } catch (Exception $rethrow) {
    // We still want to close the document.
  }
  try {
    // Workbook.Close: http://msdn.microsoft.com/en-us/library/office/bb179153%28v=office.12%29.aspx
    $excel-&gt;ActiveWorkbook-&gt;Close(FALSE);
  } catch (Exception $e) {
  }
  try {
    // Application.Quit: http://msdn.microsoft.com/en-us/library/office/bb215475(v=office.12).aspx
    $excel-&gt;Quit();
  } catch (Exception $e) {
  }
  if (isset($rethrow)) {
    throw $rethrow;
  }
}
</pre>
<h2>
	Bonus Tips</h2>
<ol><li>
		Manually log in as the user that will run the script. Launch Word and Excel to confirm that they are properly configured. On first launch, they perform some setup tasks, and the script is unable to complete those tasks for you.</li>
	<li>
		When running as a scheduled task, do NOT run in hidden mode (i.e., in the background). When run in the background, the script is unable to launch the applications via COM.</li>
</ol></div></div></div>  </div>
</div>
