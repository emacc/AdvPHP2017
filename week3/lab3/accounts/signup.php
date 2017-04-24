<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="Login.php">Login</a></li>
                  <li><a href="signup.php">Sign Up</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <?php
        // put your code here
        include './autoload.php';
        
        $util = new Util();
        $accounts = new Accounts();        
        $validator = new Validator();
        $errors = [];
        
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        if ( $util->isPostRequest() ) {
            
            if ($accounts->findUser($email) ) {
                    $errors[] = 'User with this email already exists';
                } else {
                    if ( !$validator->emailIsValid($email) ) {
                        $errors[] = "Invalid Email";
                    } 

                    if ( $validator->isEmpty($password) ) {
                        $errors[] = "Password cannot be empty";
                    }
                }
             
            
            if ( count($errors) === 0 ) {
                if ( $accounts->signup($email, $password) ) {
                    echo "Signup successful";
                    $util->redirect("login.php", array("email"=>$email) );
                } else {
                    $errors[] = 'Error adding user to the database';
                }
            } 
        }
        
        include './Views/errors.html.php';
        include './Views/signup.html.php';
        
        ?>
    </body>
</html>
