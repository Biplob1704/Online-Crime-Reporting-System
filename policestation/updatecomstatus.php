<?php
   include "db_config.php";
 ?>
 <?php

 $id=(isset($_GET['id'])? $_GET['id']:'');
 $db = new database();
 $query = "SELECT * FROM Complain  where id=$id";
 $getdata = $db->select($query)->fetch_assoc();

  if(isset($_POST["update"])){

       $status=$_POST["status"];


    if($status==''  ){
      $error="Filed Empty";
    }
    else{

          $query=" UPDATE `complain` SET `Status` = '$status' WHERE id = '$id' ";


           $update=$db->update($query);

           header("Location: policestationhome.php");


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
            <select class="form-control" name="status">
           <option ><?php echo $getdata['Status']; ?></option>
            <option>আপনার অভিযোগ এর বিষয়ে খুব তারাতারি আপনার সঙ্গে যোগাযোগ করা হবে। </option>
             <option>সমস্ত প্রক্রিয়া সম্পন্ন হইয়াছে।</option>

           </select>

        </div>
        <br><br><br>
          <button type="submit" name="update" value="update" class="btn btn-dark btn-lg btn-block">ADD Status</button><br><br><br>
      </form>
    </div>




  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
