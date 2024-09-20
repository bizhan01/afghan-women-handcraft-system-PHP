<?php
  require_once("../../db.php");
  $id = $_GET["pro_id"];
  $record = mysqli_query($conn, "DELETE FROM projects WHERE pro_id=$id");
  if($record){
    header("location:../product-list.php?delete_project=successfuly");
  }
  else{
    header("location:../product-list.php?notdelete_projects=true");
  }

 ?>
