<?php
  session_start();

  if(!$_SESSION["psid"]){

    header("location:policestationlogin.php?error=You Are Not Station User...!");
  }

?>
<?php
   include "db_config.php";
 ?>
 <?php
 $db = new database();
   if(isset($_POST["submit"])){
       $cid=$_POST["cid"];
       $cname=$_POST["cname"];
       $cfname=$_POST["cfname"];
       $chwname=$_POST["chwname"];
       $cage=$_POST["age"];
       $caddress=$_POST["address"];

       if (isset($_FILES['image']['tmp_name'])) {
				$tmp_name = $_FILES['image']['tmp_name'];
  				$target = "imagess/.";
  				$name = $_FILES["image"]["name"];
  				move_uploaded_file($tmp_name, "$target/$name");
  			}
        $image=$name;
        $cgender=$_POST["cgender"];
       $cdiscription=$_POST["cdiscription"];


    if($cid=='' || $cname=='' || $cfname=='' || $cage=='' || $caddress=='' || $cgender==''){
      $error="Filed Empty";
    }
    else{

      $query="INSERT INTO criminal(Cid,Cname,CFname,CHWname,Cage,Caddress,Cimage,Cgender,Cdescription
)VALUES('$cid','$cname','$cfname','$chwname','$cage','$caddress','$image','$cgender','$cdiscription')";
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

    <br><br>
    <div class="container">
        <form class="col-lg-6 offset-lg-3 bg-primary" method="post" action="" enctype="multipart/form-data">

          <h3 class="text-white text-center py-4">Add Criminal</h3>
          <div class="row">
            <div class="col">
              <input type="text" name="cid" class="form-control" placeholder="Enter Criminal ID">

            </div>
            <div class="col">
              <input type="text" name="cname" class="form-control" placeholder="Full Name">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <input type="text" name="cfname" class="form-control" placeholder="Crimnal Father Name">
            </div>
            <div class="col">
              <input type="text" name="chwname" class="form-control" placeholder="Criminal Husband/Wife Name">

            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <input type="number" name="age" class="form-control" placeholder="Criminal Age">
            </div>
            <div class="col">
              <input type="text" name="address" class="form-control" placeholder="Criminal Address">
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
              <select class="form-control" name="cgender">
             <option value="">Gender</option>
              <option>Male</option>
               <option>Female</option>
                <option>Others</option>
             </select>
            </div>

          </div>

          <br>
          <div class="row">
            <div class="col">
              <label for="" class="text-white">Criminal Description: </label>
              <textarea class="form-control" name="cdiscription" rows="5" cols="50" placeholder="Criminal Description"></textarea>
            </div>

          </div>
          <br>
          <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">Add Criminal</button>
    <br>
        </form>


      </div>




  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
