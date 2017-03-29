<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once './models/dbconnect.php';
            require_once './models/address-CRUD.php';
            require_once './models/util.php';
            
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $addressline1 = filter_input(INPUT_POST, 'addressline1');
            $city = filter_input(INPUT_POST, 'city');
            $state = filter_input(INPUT_POST, 'state');
            $zip = filter_input(INPUT_POST, 'zip');
            $birthday = filter_input(INPUT_POST, 'birthday');
            
            $errors = [];
            
            if (isPostRequest()) {
                
                if (empty($fullname)) {
                    $errors[] = 'Full name is required.';
                }
                
            }
                        
            include './templates/add-address.html.php';
                        
        ?>
    </body>
</html>
