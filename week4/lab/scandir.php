<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        //DIRECTORY_SEPARATOR 

        $folder = './uploads';
        $directory = scandir('./uploads');
         
        //var_dump($directory);
        ?>


        
        <?php foreach ($directory as $file) : ?>        
            <?php if ( is_file($folder . DIRECTORY_SEPARATOR . $file) ) : ?>
                <ol>
                    <li><h3><?php echo $file; ?></h3></li>
                </ol>
            <?php endif; ?>
        <?php endforeach; ?>

    </body>
</html>
