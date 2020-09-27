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
        <br><br>
 <h1 class="white-text text-center py-4">POLICE STATION HOMEPAGE</h1>

      </div>




  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
