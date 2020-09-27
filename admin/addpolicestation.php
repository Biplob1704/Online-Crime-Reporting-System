<?php
  session_start();

  if(!$_SESSION["email"]){

    header("location:adminlogin.php?error=You Are Not Admin...!");
  }

?>

<?php
   include "db_config.php";
 ?>
 <?php
 $db = new database();
   if(isset($_POST["submit"])){
       $psid=$_POST["psid"];
       $psname=$_POST["psname"];
       $psemail=$_POST["psemail"];
       $division=$_POST["division"];
       $district=$_POST["district"];
       $upzilla=$_POST["upzilla"];
       $password=$_POST["password"];
    if($psid=='' || $psname=='' || $psemail=='' || $division=='' || $district==''||  $upzilla==''|| $password=='' ){
      $error="Filed Empty";
    }
    else{

      $query="INSERT INTO policestation(Psid,Psname,Psemail,Division,District,Upzilla,Password)VALUES('$psid','$psname','$psemail','$division','$district','$upzilla','$password')";
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
      <br><br>

    <form class="col-lg-6 offset-lg-3 bg-primary" method="post" action="">

      <h2 class=" text-white text-center py-4">Add Police Station</h2>
      <div class="row">
        <div class="col">
          <input type="text" name="psid" class="form-control" placeholder="Police Station Id">
        </div>
        <div class="col">
          <input type="text" name="psname" class="form-control" placeholder="Police Station Name">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <input type="email" name="psemail" class="form-control" placeholder="Police Station Email">
        </div>
        <div class="col">
          <input type="text" name="division" class="form-control" placeholder="Division">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <input type="text" name="district" class="form-control" placeholder="District">
        </div>
        <div class="col">
          <input type="text" name="upzilla" class="form-control" placeholder="Upzilla">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">Add Station</button><br><br>

    </form>

  </div>




  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
