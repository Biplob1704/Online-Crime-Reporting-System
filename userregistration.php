<?php
   include "db_connection.php";
 ?>
 <?php
 $db = new database();
   if(isset($_POST["submit"])){
       $uid=$_POST["uid"];
       $fname=$_POST["fname"];
       $lname=$_POST["lname"];
       $uemail=$_POST["uemail"];
       $udob=$_POST["udob"];
       $unumber=$_POST["unumber"];
       if (isset($_FILES['image']['tmp_name'])) {
				$tmp_name = $_FILES['image']['tmp_name'];
  				$target = "imagess/.";
  				$name = $_FILES["image"]["name"];
  				move_uploaded_file($tmp_name, "$target/$name");
  			}
        $image=$name;
       $ugender=$_POST["ugender"];
       $preaddress=$_POST["preaddress"];
       $parmaaddress=$_POST["parmaaddress"];
       $upassword=$_POST["upassword"];
    if($uid=='' || $fname=='' || $lname=='' || $uemail=='' || $udob==''||  $unumber==''|| $ugender==''|| $preaddress==''|| $parmaaddress==''|| $upassword=='' ){
      $error="Filed Empty";
    }
    else{

      $query="INSERT INTO user(Uid,Fname,Lname,Uemail,Udob,Unumber,Image,Ugender,Preaddress,Parmaaddress,Upassword)VALUES('$uid','$fname','$lname','$uemail','$udob','$unumber','$image','$ugender','$preaddress','$parmaaddress','$upassword')";
      $create=$db->insert($query);
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
    </nav>
<br><br>
<div class="container">
    <form class="col-lg-6 offset-lg-3 bg-primary" method="post" action="" enctype="multipart/form-data">

      <h3 class="white-text text-center py-4">User Registration</h3>
      <div class="row">
        <div class="col">
          <input type="text" name="uid" class="form-control" placeholder="Enter User Id ">

        </div>
        <div class="col">
          <input type="text" name="fname" class="form-control" placeholder="First Name">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <input type="text" name="lname" class="form-control" placeholder="Last Name">
        </div>
        <div class="col">
          <input type="email" name="uemail" class="form-control" placeholder="Enter Email">

        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <input type="date" name="udob" class="form-control" placeholder="Date Of Birth">
        </div>
        <div class="col">
          <input type="text" name="unumber" class="form-control" placeholder="Phone Number">
        </div>
      </div>

      <div class="row">
        <div class="col">
          Image:
          <input type="file" class="form-control" name="image" value="" placeholder="Enter image" >
        </div>

      </div>
      <br>
      <div class="row">
        <div class="col">
          <select class="form-control" name="ugender">
         <option value="">Select</option>
          <option>Male</option>
           <option>Female</option>
            <option>Others</option>
         </select>
        </div>
        <div class="col">
          <input type="text" name="preaddress" class="form-control" placeholder="Present Address">
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col">
          <input type="text" name="parmaaddress" class="form-control" placeholder="Parmanent Address">
        </div>
        <div class="col">
          <input type="password" name="upassword" class="form-control" placeholder="Password">

        </div>
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">Sing Up</button>
<br>
    </form>


  </div>
<br><br>

  <script src="admin/js/jquery-slim.min.js"></script>
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
</body>
</html>
