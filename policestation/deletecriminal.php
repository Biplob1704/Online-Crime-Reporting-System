<?php
 include "db_config.php";

 $id=(isset($_GET['id'])? $_GET['id']:'');
 $db= new database();

 $query="DELETE FROM criminal WHERE id=$id";
 $deletedata=$db->delete($query);



 ?>
