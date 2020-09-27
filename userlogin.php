<?php
  session_start();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin/css/custom.css">
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
                      <a class="nav-link" href="userhome.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="addcomplain.php">Complain</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="complainstatus.php">Complain-Status</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="addquery.php">Add-query</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="criminallist.php">Criminal-list</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="userregistration.php">Sing Up</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="userlogin.php">Login</a>
                  </li>
              </ul>
            </div>
          </div>
    </nav><br><br>

    <div class="container">


  <form class="col-lg-6 offset-lg-3 bg-primary  " action="" method="POST">
    <h1 class="white-text text-center py-4">User Login</h1>
    <div class="form-group">
      <label for="exampleInputEmail1">Email:</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email ">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password:</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <button type="submit" name="submit"  value="submit" class="btn btn-dark">Login</button><br><br>
  </form>

  </div>

  <?php

    include "db_connection.php";
   ?>

     <?php

     if(isset($_POST['submit'])){

      $email=$_SESSION["email"]=$_POST['email'];
      $password=$_POST['password'];

      $db = new database();
      $query = "SELECT * FROM user WHERE Uemail='$email' AND Upassword = '$password' ";
      $read = $db->select($query);
      ?>


  <?php  if($read){ ?>
    <?php while($row = $read->fetch_assoc()){

     header("Location:userhome1.php");
      ?>

   <?php } ?>
   <?php } else {
     echo "<script>alert(' Email And Password Is Incorrect!')</script>";



    ?>


   <?php } ?>
  <?php } ?>

  <br><br><br><br><br><hr>

  <footer>

    <div class="footer-copyright bottom-footer fixed-bottom text-center bg-dark text-white py-1 ">© 2020 Copyright:Online Crime Reporting System
      <a href=""></a>
    </div>
  </footer>
  <script src="admin/js/jquery-slim.min.js"></script>
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
</body>
</html>
