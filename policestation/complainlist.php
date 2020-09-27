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
    <h2 class=" text-white text-center py-4">Complain List</h2>
    <form class="col-lg-6 offset-lg-4  form-inline" action="complainlist.php" method="POST">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="থানার নাম লিখুন...." aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" value="search">Search</button>
      </form><br><br>




    <?php

      include "db_config.php";
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
    $query ="SELECT * FROM complain WHERE 	Nstation LIKE '%$search%'";
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


     echo "<td>".$row["Comname"]."</td>";
     echo "<td>".$row["Nstation"]."</td>";
     echo "<td>".$row["Cotype"]."</td>";
     echo "<td>".$row["Image"]."</td>";
     echo "<td>".$row["Description"]."</td>";
     echo "<td>".$row["Location"]."</td>";
     echo "<td>".$row["Status"]."</td>";

     echo "<td><a href=\"updatecomstatus.php?id=$row[id]\" >Edit</a></td>";






   }
  }
   else {
    echo "Not Found";
  }
  }
    ?>
  </div>


  <div class="container">



       <?php

        $db = new database();
        $query = "SELECT * FROM complain";
        $read = $db->select($query);
        ?>
      <link rel="stylesheet" type="text/css" href="css/table.css">
     <table  class="table table-striped table-dark    table-bordered">
       <thead>
       <tr>


         <th scope="col">Complainer Name</th>
         <th scope="col">Nearist Police Station</th>
         <th scope="col">Complain Type</th>
         <th scope="col">Image</th>
         <th scope="col">Description</th>
         <th scope="col">Location</th>
         <th scope="col">Status</th>




       </tr>
     </thead>
    <?php  if($read){ ?>
      <?php while($row = $read->fetch_assoc()){ ?>

      <tbody>
      <tr>

        <td><?php echo $row['Comname']; ?></td>
        <td><?php echo $row['Nstation']; ?></td>
        <td><?php echo $row['Cotype']; ?></td>
        <td><img src="<?php echo 'imagess/'.$row['Image'];?>" width="80px" height="80px" /></td>
        <td><?php echo $row['Description']; ?></td>
        <td><?php echo $row['Location']; ?></td>
        <td><?php echo $row['Status']; ?></td>
        <td><a href="updatecomstatus.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a></td>




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
