<?php

$getFile = filter_input(INPUT_GET, 'file');
        
$filename = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR. $getFile;
  /* SplFileObject extends from SplFileInfo so you can use the same functions 
   * from SplFileInfo with SplFileObject 
   */         
$file = new SplFileObject($filename, "r");
$contents = $file->fread($file->getSize());

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($filename);

//header('Content-Type: '.$mimeType);
//header('Content-Length: ' . $file->getSize());
//echo $contents;

 /* Alternative without the above headers */
 
$b64 = base64_encode($contents);
//echo '<img src="data:'.$mimeType.';base64,'.$b64.'"/>';
