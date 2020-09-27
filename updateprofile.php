
<?php
   include "db_connection.php";
 ?>
 <?php

 $id=(isset($_GET['id'])? $_GET['id']:'');
 $db = new database();
 $query = "SELECT * FROM user  where id=$id";
 $getdata = $db->select($query)->fetch_assoc();

  if(isset($_POST["update"])){

    $uemail=$_POST["uemail"];
    $unumber=$_POST["unumber"];



    if (isset($_FILES['image']['tmp_name'])) {
     $tmp_name = $_FILES['image']['tmp_name'];
       $target = "imagess/.";
       $name = $_FILES["image"]["name"];

       move_uploaded_file($tmp_name, "$target/$name");
       $image=$name;
     }


     $preaddress=$_POST["preaddress"];
    $parmaaddress=$_POST["parmaaddress"];
    $upassword=$_POST["upassword"];

    if($image==''){
      $error="Filed Empty";
    }
    else{

          $query=" UPDATE `user` SET `Uemail`='$uemail',`Unumber`='$unumber',`Image`='$image',`Preaddress`='$preaddress',`Parmaaddress`='$parmaaddress',`Upassword`='$upassword'  WHERE id = '$id' ";


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
                    <a class="nav-link text-white" href="userhome1.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="addcomplain.php">Complain</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="complainstatus.php">Complain-Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="addquery.php">Add-query</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="userprofile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="userlogout.php">Logout</a>
                </li>
            </ul>
          </div>
        </div>
  </nav>
<br>
<div class="container">
    <form class="col-lg-6 offset-lg-3 bg-primary" method="post" action="" enctype="multipart/form-data">

      <h3 class="white-text text-center py-4">Profile Update</h3>
  
      <div class="row">

        <div class="col">
          <input type="email" name="uemail" class="form-control" value="<?php echo $getdata['Uemail']; ?>">

        </div>
      </div>
      <br>
      <div class="row">

        <div class="col">
          <input type="text" name="unumber" class="form-control" value="<?php echo $getdata['Unumber']; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col">
          Image:
          <img src="imagess/<?php echo $getdata['Image'] ?>" style="width:80px;height:60px">
          <input type="file" class="form-control" name="image" value="<?php echo $getdata['Image']; ?>" required>
        </div>

      </div>
      <br>
      <div class="row">

        <div class="col">
          <input type="text" name="preaddress" class="form-control" value="<?php echo $getdata['Preaddress']; ?>">
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col">
          <input type="text" name="parmaaddress" class="form-control" value="<?php echo $getdata['Parmaaddress']; ?>">
        </div>
        <div class="col">
          <input type="password" name="upassword" class="form-control" value="<?php echo $getdata['Upassword']; ?>">

        </div>
      </div>
      <br>
      <button type="submit" name="update" class="btn btn-dark btn-lg btn-block">Update</button>
<br>
    </form>

  </div>

<br><br>


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
