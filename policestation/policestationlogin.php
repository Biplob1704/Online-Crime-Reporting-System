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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body  class="bg-secondary">


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
  </nav><br><br>
    <div class="container">


  <form class="col-lg-6 offset-lg-3 bg-primary  " action="policestationlogin.php" method="POST">
    <h1 class="white-text text-center py-4">Station Login</h1>
    <div class="form-group">
      <label for="exampleInputEmail1">Police Station ID:</label>
      <input type="text" name="psid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Police Station ID">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <button type="submit" name="submit" value="submit" class="btn btn-dark">Login</button><br><br>
  </form>

  </div>

  <?php

    include "db_config.php";
   ?>

     <?php

     if(isset($_POST['submit'])){

      $psid=$_SESSION["psid"]=$_POST['psid'];
      $password=$_POST['password'];

      $db = new database();
      $query = "SELECT * FROM policestation WHERE Psid='$psid' AND Password = '$password' ";
      $read = $db->select($query);
      ?>


  <?php  if($read){ ?>
    <?php while($row = $read->fetch_assoc()){

     header("Location:policestationhome.php");
      ?>

   <?php } ?>
   <?php } else {
     echo "<script>alert(' Ps ID Or Password Is Incorrect!')</script>";



    ?>


   <?php } ?>
  <?php } ?>
<br><br><br><br><br><hr>

<footer>

  <div class="footer-copyright bottom-footer text-center bg-dark text-white py-1 ">© 2020 Copyright:Online Crime Reporting System

  </div>
</footer>
<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
