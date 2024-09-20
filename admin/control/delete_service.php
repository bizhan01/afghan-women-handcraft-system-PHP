<?php
  require_once("../../db.php");
  $id = $_GET["service_id"];
  $record = mysqli_query($conn, "DELETE FROM services WHERE service_id=$id");
  if($record){
    header("location:../services-list.php?delete_contract=successfuly");
  }
  else{
    header("location:../services-list.php?notdelete_contract=true");
  }

 ?>
