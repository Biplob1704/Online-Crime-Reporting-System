<?php
  session_start();

  if(!$_SESSION["email"]){

    header("location:userlogin.php?error=You Are Not User...!");
  }

?>


<?php
   include "db_connection.php";
 ?>
 <?php
 $db = new database();
   if(isset($_POST["submit"])){
       $query=$_POST["query"];


    if($query==''){
      $error="Filed Empty";
    }
    else{

      $query="INSERT INTO query(Question)VALUES('$query')";
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
<br>
  <form class="col-lg-6 offset-lg-3 bg-primary" action="" method="post">
<div class="row">
  <div class="col">
    <label class="text-white" for="">Question:</label>
    <textarea class="form-control" name="query" rows="3" cols="30" placeholder="Add Your Question About This Page.."></textarea>
  </div>

</div>
<br>
<button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">ADD Query</button><br><br>
  </form>

</div><br>

<div class="container">



     <?php

      $db = new database();
      $query = "SELECT * FROM query";
      $read = $db->select($query);
      ?>
    <link rel="stylesheet" type="text/css" href="css/table.css">
   <table  class="table table-striped table-dark    table-bordered">
     <thead>
     <tr>


       <th scope="col">Question</th>
       <th scope="col">Answer</th>






     </tr>
   </thead>
  <?php  if($read){ ?>
    <?php while($row = $read->fetch_assoc()){ ?>

    <tbody>
    <tr>

      <td><?php echo $row['Question']; ?></td>
      <td><?php echo $row['Answer']; ?></td>






    </tr>
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
