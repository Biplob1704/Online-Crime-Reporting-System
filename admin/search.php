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
  <h2 class=" text-white text-center py-4">Police Station List</h2>
  <form class="col-lg-6 offset-lg-4  form-inline" action="search.php" method="POST">
      <input class="form-control mr-sm-3" type="text" name="search" placeholder="Division/Police Station Name/District" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" value="search">Search</button>
    </form><br>




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
  $query ="SELECT * FROM policestation WHERE 	District LIKE '%$search%' OR Psname LIKE '%$search%' OR Division LIKE '%$search%'";
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
   echo "<td>".$row["Psid"]."</td>";
   echo "<td>".$row["Psname"]."</td>";
   echo "<td>".$row["Psemail"]."</td>";
   echo "<td>".$row["Division"]."</td>";
   echo "<td>".$row["District"]."</td>";
   echo "<td>".$row["Upzilla"]."</td>";

   echo "<td><a href=\"updatestation.php?id=$row[id]\" >Edit</a></td>";
   echo "<td> <a href=\"deletestation.php?id`=$row[id]\">Delete</a></td>";





 }
}
 else {
  echo "empty";
}
}
  ?>
</div>

  <div class="container">
  <br><br>


       <?php

        $db = new database();
        $query = "SELECT * FROM policestation";
        $read = $db->select($query);
        ?>
      <link rel="stylesheet" type="text/css" href="css/table.css">
     <table  class="table table-striped table-dark    table-bordered">
       <thead>
       <tr>

         <th scope="col">Ps Id</th>
         <th scope="col">Ps Name</th>
         <th scope="col">Ps Email</th>
         <th scope="col">Division</th>
         <th scope="col">District</th>
         <th scope="col">Upzilla</th>
         <th scope="col">Action</th>
         <th scope="col">Action</th>

       </tr>
     </thead>
    <?php  if($read){ ?>
    	<?php while($row = $read->fetch_assoc()){ ?>

      <tbody>
      <tr>

        <td><?php echo $row['Psid']; ?></td>
        <td><?php echo $row['Psname']; ?></td>
        <td><?php echo $row['Psemail']; ?></td>
        <td><?php echo $row['Division']; ?></td>
        <td><?php echo $row['District']; ?></td>
        <td><?php echo $row['Upzilla']; ?></td>

        <td><a href="updatestation.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a></td>
        <td><a href="deletestation.php?id=<?php echo $row['id']; ?> " class="btn btn-warning">Delete</a></td>

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
