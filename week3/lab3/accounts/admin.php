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
                    <form action='destory.php' method="post">
                        <input type="submit" name="action" value="Log Out">
                    </form>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <h1>Admin Page</h1>
        <?php
        // put your code here
        function logout() {
            session_destroy();
            redirect("login.php");
        }
        
        include './Views/sessionAccess.html.php';
        ?>
        <h3>Welcome, You are logged in!</h3><br/> 
        <h3>User ID: <?php echo $_SESSION['user_id']; ?></h3><br/>   
        <h3>Date Created: <?php echo $_SESSION['created']; ?></h3><br/>
        <h3>Email: <?php echo $_SESSION['email']; ?></h3><br/>
        
    </body>
</html>
