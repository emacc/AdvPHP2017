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
        include './models/dbconnect.php';
        include './models/address-CRUD.php';
        
        $addresses = readAllAddress();
        
        include './templates/view-address.html.php';
        ?>
    </body>
</html>
