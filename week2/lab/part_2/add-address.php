<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title></title>
    </head>
    <body>
        
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="add-address.php">Add Address</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
        <?php
            require_once './autoload.php';
            require_once './models/util.php';
            
            $db = new DbCRUD();            
            $Validation = new Validation();
                       
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $addressline1 = filter_input(INPUT_POST, 'addressline1');
            $city = filter_input(INPUT_POST, 'city');
            $state = filter_input(INPUT_POST, 'state');
            $zip = filter_input(INPUT_POST, 'zip');
            $birthday = filter_input(INPUT_POST, 'birthday');
            
            $errors = [];
            $states = getStates();
            
            
            
            if (isPostRequest()) {
                
                if ($Validation->isEmpty($fullname)) {
                    $errors[] = 'Full name is required.';
                }                
                              
                if ($Validation->isEmpty($addressline1)) {
                    $errors[] = 'Address Line 1 is required.';
                }
                
                if ($Validation->isEmpty($city)) {
                    $errors[] = 'City is required.';
                }
                
                if ($Validation->isZipValid($zip) === false)
                {
                    $errors[] = 'Zip is not valid!';
                }
                
                if ($Validation->isEmailValid($email) === false) 
                {
                    $errors[] = 'Email is not valid!';
                }
                
                if ($Validation->isEmpty($state)) {
                    $errors[] = 'State is required.';
                }
                
                if ($Validation->isDateValid($birthday) === false) {
                    $errors[] = 'Birthday is not valid!';
                }
                
                if ( count($errors) === 0 ) {
                    if ($db->createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)) {
                        $message = 'Address Added';
                        $fullname  = '';
                        $email  = '';
                        $addressline1  = '';
                        $city  = '';
                        $state  = '';
                        $zip  = '';
                        $birthday = '';
                    }
                    else {
                        $errors[] = 'Could not add to the Database';
                    }
                }
                               
            }
            
            
            include './templates/errors.html.php';
            include './templates/messages.html.php';
            include './templates/add-address.html.php';
                        
        ?>
        <br/>
    </body>
</html>
