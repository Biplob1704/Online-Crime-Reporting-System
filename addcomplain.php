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
       $coid=$_POST["coid"];
       $comname=$_POST["comname"];
       $nstation=$_POST["npolicestation"];
       $cotype=$_POST["cotype"];

       if (isset($_FILES['image']['tmp_name'])) {
				$tmp_name = $_FILES['image']['tmp_name'];
  				$target = "imagess/.";
  				$name = $_FILES["image"]["name"];
  				move_uploaded_file($tmp_name, "$target/$name");
  			}
        $image=$name;
        $description=$_POST["description"];
       $location=$_POST["location"];
       $status=$_POST["status"];

    if($coid=='' || $comname=='' || $nstation=='' || $cotype=='' || $description=='' || $location==''){
      $error="Filed Empty";
    }
    else{

      $query="INSERT INTO complain(Coid,Comname,Nstation,Cotype,Image,Description,Location,Status
)VALUES('$coid','$comname','$nstation','$cotype','$image','$description','$location','$status')";
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
                      <a class="nav-link text-white" href="userlogout.php">Log Out</a>
                  </li>
              </ul>
            </div>
          </div>
    </nav>
<br><br>
<div class="container">
    <form class="col-lg-6 offset-lg-3 bg-primary" method="post" action="" enctype="multipart/form-data">

      <h3 class="text-white text-center py-4">ফরম টির পূরণ এর মাধ্যমে আপনার অভিযোগ টি করুন </h3>
      <div class="row">
        <div class="col">
          <label for="" class="text-white">একটি আই ডি নাম্বার দিন:</label>
          <input type="text" name="coid" class="form-control" placeholder=" যেমনঃ ১৩৫৮০৯  ">
        </div>
        <div class="col">
          <label for="" class="text-white">কমপ্লেইন কারীর নাম:</label>
          <input type="text" name="comname" class="form-control" placeholder="যেমনঃ মোঃ আজিজুর রহমান">
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col">
          <label for="" class="text-white">নিকটস্থ থানার নাম:</label>
          <input type="text" name="npolicestation" class="form-control" placeholder="যেমনঃ গাইবান্ধা সদর,গাইবান্ধা">
        </div>
        <div class="col">
          <label for="" class="text-white">কি ধরনের ঘটনাঃ </label>
          <select class="form-control" name="cotype" >
         <option value="">ঘটনাটির ধরণ</option>
          <option>Type1</option>
           <option>Type2</option>
            <option>Type3</option>
         </select>
        </div>
      </div>

      <br>


      <div class="row">
        <div class="col">
          <label for="" class="text-white">প্রমান হিসাবে কিছু আছে কি?  </label>
          <input type="file" class="form-control" name="image" value="" placeholder="Enter image" >
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col">
        <label for="" class="text-white">ঘটনাটির বর্ণনা দিনঃ </label>
          <textarea class="form-control" name="description" rows="5" cols="50" placeholder="বরাবর &#10;অফিসার ইনচার্জ&#10; থানার নাম । &#10; বিষয়ঃ  অভিযোগ প্রসজ্ঞে । &#10; জনাব,&#10;  &#10; কে বা কারা ঘটনাটি ঘটাল তাহার বা তাহাদের নাম উল্লেখ করিবেন&#10; ঘটনাটি আনুমানিক কত ঘটিকার সময় ঘটিয়াছিল উল্লেখ করিবেন &#10;সাক্ষী হিসাবে কেহ দেখিয়া থাকিলে তাহার নাম ও উল্লেখ করে ঘটনাটির বিস্তারিত বিবরণ দিবেন &#10; &#10; নিবেদক&#10; আবেদনকারীর নাম&#10;মোবাইল নাম্বারঃ


          "></textarea>
        </div>
      </div>


      <br>
      <div class="row">
        <div class="col">
          <input type="text" name="location" class="form-control" placeholder="আপনার ঠিকানা">
        </div>

      </div>
      <br>
      <div class="row">
        <div class="col">
          <input type="hidden" name="status" class="form-control" placeholder="Status">
        </div>

      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">সম্পূর্ণ করুন </button>
<br>
    </form>


  </div>


  <script src="admin/js/jquery-slim.min.js"></script>
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
</body>
</html>
