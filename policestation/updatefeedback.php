<?php
   include "db_config.php";
 ?>
 <?php

 $id=(isset($_GET['id'])? $_GET['id']:'');
 $db = new database();
 $query = "SELECT * FROM query  where id=$id";
 $getdata = $db->select($query)->fetch_assoc();

  if(isset($_POST["update"])){

       $answer=$_POST["answer"];


    if($answer==''  ){
      $error="Filed Empty";
    }
    else{

          $query=" UPDATE `query` SET `Answer` = '$answer' WHERE id = '$id' ";


           $update=$db->update($query);




    }

   }


  ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-secondary">


    <!-- NAVBAR WITH RESPONSIVE TOGGLE -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
          <a class="navbar-brand" href="#">Crime Report</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto" >
                  <li class="nav-item">
                      <a class="nav-link text-white" href="policestationhome.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="complainlist.php">Complain-list</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="Querylist.php">Querys</a>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link text-white" href="criminallist.php">Criminal-list</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-white" href="policestationlogin.php">Login</a>
                  </li>
              </ul>
            </div>
          </div>
    </nav>
<br><br><br><br>
    <div class="container">
      <form class="col-lg-6 offset-lg-3 bg-primary" action="" method="post">
        <br><br><br>
        <div class="row">
          <div class="col">
            <input type="text" name="answer" value="<?php echo $getdata['Answer']; ?>" class="form-control" placeholder="Feedback">
          </div>

        </div>
        <br>
        <button type="submit" name="update" value="update" class="btn btn-dark btn-lg btn-block">ADD Feeback</button>
  <br>




  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
