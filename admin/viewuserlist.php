<?php
  session_start();

  if(!$_SESSION["email"]){

    header("location:adminlogin.php?error=You Are Not Admin...!");
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
                    <a class="nav-link text-white" href="adminhome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="addpolicestation.php">Add-Station</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="search.php">Station-list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="viewuserlist.php">User-list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="adminlogout.php">Logout</a>
                </li>
            </ul>
          </div>
        </div>
  </nav>




  <div class="container">
<h2 class=" text-white text-center py-4">User List</h2>
    <?php

      include "db_config.php";
     ?>

       <?php

        $db = new database();
        $query = "SELECT * FROM user";
        $read = $db->select($query);
        ?>
      <link rel="stylesheet" type="text/css" href="css/table.css">
     <table  class="table table-striped table-dark    table-bordered">
       <thead>
       <tr>


         <th scope="col">First Name</th>
         <th scope="col">Last Name</th>
         <th scope="col">Email</th>
         <th scope="col">Dob</th>
         <th scope="col">Number</th>
         <th scope="col">Picture</th>
         <th scope="col">Gender</th>
         <th scope="col">Present  Address</th>
         <th scope="col">Parmanent Address</th>



       </tr>
     </thead>
    <?php  if($read){ ?>
    	<?php while($row = $read->fetch_assoc()){ ?>

      <tbody>
      <tr>

        <td><?php echo $row['Fname']; ?></td>
        <td><?php echo $row['Lname']; ?></td>
        <td><?php echo $row['Uemail']; ?></td>
        <td><?php echo $row['Udob']; ?></td>
        <td><?php echo $row['Unumber']; ?></td>
        <td><img src="<?php echo 'imagess/'.$row['Image'];?>" width="80px" height="80px" /></td>
        <td><?php echo $row['Ugender']; ?></td>
        <td><?php echo $row['Preaddress']; ?></td>
        <td><?php echo $row['Parmaaddress']; ?></td>




      </tr>
  </tbody
     <?php } ?>
     <?php } else { ?>
     	<p>empty</p>

     <?php } ?>

     </table>

  </div>


<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
