<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="upload-form.php">Upload File</a></li>
                <li><a href="DirectoryIterator.php">View Files</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <?php
        $getFile = filter_input(INPUT_GET, 'file');
        /* ****************UPDATE FILE**************** */        
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$getFile;
        
        //http://php.net/manual/en/fileinfo.constants.php
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        
        //var_dump($type, '<br /><br />');
        
        //http://php.net/manual/en/function.filesize.php
        //var_dump(filesize($file), '<br /><br />');
        
        /*
         * To delete a file use unlink
         * 
         * unlink($file)
         */
        
        
        // http://php.net/manual/en/class.splfileinfo.php
        $finfo = new SplFileInfo($file);
        
//        if ( $finfo->isFile() ) {
//            var_dump($finfo->getRealPath(), '<br /><br />');
//            var_dump($finfo->getFilename(), '<br /><br />');
//            var_dump(date("l F j, Y, g:i a", $finfo->getMTime()), '<br /><br />');
//            var_dump($finfo->getSize(), '<br /><br />');
//            var_dump($finfo->getPathname(), '<br /><br />');
//            
//        }
        
        
        ?>
        <ul>
            <li>File Size: <?php echo $finfo->getSize(); ?> bytes</li>
            <li>File Type: <?php echo $type; ?></li>
            <li>Upload Date: <?php echo date("l F j, Y, g:i a", $finfo->getMTime()); ?></li>
<!--            <li><a href='file-reader.php?file=<?php echo $finfo->getFilename() ?>'>Delete</a></li>-->
            <li>Location: <a href=' <?php echo $finfo->getPathname() ?>'><?php echo $finfo->getPathname() ?></a></li>
            <li><a href='unlink.php?file=<?php echo $finfo->getFilename() ?>'>Delete this file</a></li>
        </ul>
        
        <?php if ($type == 'text/plain') : ?>
        <textarea rows='20' cols='150' style='overflow: scroll;'>
            <?php foreach(new SplFileObject($finfo) as $line) {
                echo $line;        };  ?>
        <?php endif; ?></textarea>
        
        <?php if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif') : ?>
            <img src='<?php echo $finfo->getPathname(); ?>' />
        <?php  endif; ?>
            
        <?php if ($type == 'application/pdf' || $type == 'text/html') : ?>
            <object width="800" height="800" data="<?php echo $finfo->getPathname();?>"></object>
        <?php  endif; ?>
<!--        <object data="<?php //echo $finfo->getPathname();?>">
        </object>-->
    </body>
</html>
