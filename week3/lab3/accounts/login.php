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
        session_start();
        
        include './autoload.php';
        
        $util = new Util();
        $accounts = new Accounts();
        $errors = [];
        
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        if ( $util->isPostRequest() ) {
            
            $loginInfo = $accounts->login($email, $password);
            
            if ( $loginInfo > 0 ) {
                echo "You are logged in!";
                $_SESSION['user_id'] = $loginInfo['user_id'];
                $date = date_create($loginInfo['created']);
                $_SESSION['created'] = date_format($date, "l F j, Y, g:i a");                
                $_SESSION['email'] = $loginInfo['email'];
                
                //var_dump($accounts->login2($email, $password));
                $util->redirect("admin.php");
            } else {
                $errors[] = "Login failed";
            }
        }
        
        include './Views/errors.html.php';
        include './Views/login.html.php';
        ?>
    </body>
</html>
