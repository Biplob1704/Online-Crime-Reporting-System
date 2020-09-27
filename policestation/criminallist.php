<?php
  session_start();

  if(!$_SESSION["psid"]){

    header("location:policestationlogin.php?error=You Are Not Station User...!");
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
                    <a class="nav-link text-white" href="policestationlogout.php">Logout</a>
                  </li>
              </ul>
            </div>
          </div>
    </nav>

    <div class="container">
  <h2 class=" text-white text-center py-4">Criminal List</h2>
<a class="btn btn-success" href="addcriminal.php">Add Criminal Data</a><br><br>
      <?php

        include "db_config.php";
       ?>

         <?php

          $db = new database();
          $query = "SELECT * FROM criminal";
          $read = $db->select($query);
          ?>
        <link rel="stylesheet" type="text/css" href="css/table.css">
       <table  class="table table-striped table-dark    table-bordered">
         <thead>
         <tr>


           <th scope="col">Criminal Id</th>
           <th scope="col">Criminal Name</th>
           <th scope="col">Criminal Father Name</th>
           <th scope="col">Criminal Hus/Wife Name</th>
           <th scope="col">Criminal Age</th>
           <th scope="col">Criminal Address</th>
           <th scope="col">Criminal Image</th>
           <th scope="col">Criminal Gender</th>
           <th scope="col">Criminal Description</th>
           <th scope="col">Action</th>
           <th scope="col">Action</th>






         </tr>
       </thead>
      <?php  if($read){ ?>
        <?php while($row = $read->fetch_assoc()){ ?>

        <tbody>
        <tr>

          <td><?php echo $row['Cid']; ?></td>
          <td><?php echo $row['Cname']; ?></td>
          <td><?php echo $row['CFname']; ?></td>
          <td><?php echo $row['CHWname']; ?></td>
          <td><?php echo $row['Cage']; ?></td>
          <td><?php echo $row['Caddress']; ?></td>
          <td><img src="<?php echo 'imagess/'.$row['Cimage'];?>" width="80px" height="80px" /></td>
          <td><?php echo $row['Cgender']; ?></td>
          <td><?php echo $row['Cdescription']; ?></td>

          <td><a href="updatecriminallist.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="deletecriminal.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Delete</a></td>




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
