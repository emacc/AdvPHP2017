<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './models/dbconnect.php';
        include './models/address-CRUD.php';
        
        $addresses = readAllAddress();
        
        include './templates/view-address.html.php';
        ?>
    </body>
</html>
