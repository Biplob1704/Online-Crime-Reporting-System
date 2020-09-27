<?php
  session_start();

  if(!$_SESSION["email"]){

    header("location:userlogin.php?error=You Are Not User...!");
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
  <h1 class="text-white text-center">Profile</h1><br>

  <?php

  include "db_connection.php";
  $db = new database();

   $email=$_SESSION["email"];

   $query = "SELECT * FROM user WHERE Uemail='$email'";
   $read = $db->select($query);
  ?>

  <table  class="table table-striped table-dark    table-bordered">
  <thead>


  <?php  if($read){ ?>
   <?php while($row = $read->fetch_assoc()){ ?>

   <tbody>
     <tr>
         <th scope="col">UID</th>
         <td><?php echo $row['Uid']; ?></td>
     </tr>
     <tr>
       <th scope="col">First Name</th>
       <td><?php echo $row['Fname']; ?></td>
     </tr>
     <tr>
       <th scope="col">Last Name</th>
       <td><?php echo $row['Lname']; ?></td>
     </tr>
     <tr>
       <th scope="col">Email</th>
       <td><?php echo $row['Uemail']; ?></td>
     </tr>
     <tr>
       <th scope="col">Dob</th>
       <td><?php echo $row['Udob']; ?></td>
     </tr>
     <tr>
       <th scope="col">Number</th>
       <td><?php echo $row['Unumber']; ?></td>
     </tr>
     <tr>
       <th scope="col">Picture</th>
       <td><img src="<?php echo 'imagess/'.$row['Image'];?>" width="100px" height="100px" /></td>
     </tr>
     <tr>
       <th scope="col">Gender</th>
       <td><?php echo $row['Ugender']; ?></td>
     </tr>
     <tr>
       <th scope="col">Present  Address</th>
       <td><?php echo $row['Preaddress']; ?></td>
     </tr>
     <tr>
       <th scope="col">Parmanent Address</th>
       <td><?php echo $row['Parmaaddress']; ?></td>
     </tr>
     <tr>
       <th scope="col">Password</th>
       <td><?php echo $row['Upassword']; ?></td>
     </tr>
     <tr>
       <th scope="col">Action</th>
       <td><a href="updateprofile.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Update Data</a></td>
     </tr>

</thead>


  </tbody


  <?php } ?>
  <?php } else { ?>
   <p>empty</p>

  <?php } ?>

  </table>


</div>




  <script src="admin/js/jquery-slim.min.js"></script>
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
</body>
</html>
