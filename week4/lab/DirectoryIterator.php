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
        
        <?php include './messages.html.php'; ?>
        <?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 
        
        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
        ?>
        <ol>
        <?php foreach ($directory as $fileInfo) : ?>   
            <?php if ( $fileInfo->isFile() ) : ?>
            <li><p><h2><?php echo $fileInfo->getFilename(); ?></h2>
                <a style="color: navy;" href='file-info.php?file=<?php echo $fileInfo->getFilename() ?>'>Read</a>
                <a style="color: navy;" href='unlink.php?file=<?php echo $fileInfo->getFilename() ?>'>Delete</a></p>
            </li>
<!--                <p>uploaded on <?php //echo date("l F j, Y, g:i a", $fileInfo->getMTime()); ?></p>
                <p>This file is <?php //echo $fileInfo->getSize(); ?> byte's</p>
                File Link: <a href="<?php //echo $fileInfo->getPathname(); ?>" target="_blank"><?php //echo $fileInfo->getRealPath(); ?>
                <img src="<?php //echo $fileInfo->getPathname(); ?>" />-->
        
            <?php endif; ?>
        <?php endforeach; ?>
        </ol>

    </body>
</html>
