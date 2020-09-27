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
<br><br><br>


<div class="container">
  <h2 class=" text-white text-center py-4">কমপ্লেইন করার সময় যে আই ডি টি দিয়েছিলেন সেটি সার্চ বক্সে বসিয়ে আপনার অভিযোগ এর অগ্রগতি দেখুন।</h2>


  <form class="col-lg-6 offset-lg-4  form-inline" action="complainstatus.php" method="POST">
    <input class="form-control input-lg mr-sm-3" type="text" name="search" placeholder="কমপ্লেইন আই ডি টি দিন " aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" value="search">Search</button>
  </form><br><br>






  <?php

    include "db_connection.php";
   ?>

<?php
if (!isset($_POST['search']) || $_POST['search'] == NULL) {

}
else {
if(isset($_POST['search'])){

  $search = $_POST['search'];



}


 ?>

 <?php

  $db = new database();
  $query ="SELECT * FROM complain WHERE 	Coid LIKE '%$search%' ";
  $read = $db->select($query);
  ?>
  <link rel="stylesheet" type="text/css" href="css/table.css">
 <table  class="table table-striped table-dark    table-bordered">
   <thead>
   <tr>



   </tr>
 </thead>
<?php

  if($read){
 while($row = $read->fetch_array()){


   echo "<tr>";
   echo "<td>".$row["Coid"]."</td>";
   echo "<td>".$row["Comname"]."</td>";
   echo "<td>".$row["Nstation"]."</td>";
   echo "<td>".$row["Cotype"]."</td>";
   echo "<td>".$row["Image"]."</td>";
   echo "<td>".$row["Description"]."</td>";
   echo "<td>".$row["Location"]."</td>";
   echo "<td>".$row["Status"]."</td>";







 }
}
 else {
  echo "emp";
}
}
  ?>
</div>



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
