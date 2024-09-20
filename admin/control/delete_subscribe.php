<?php
  require_once("../../db.php");
  $id = $_GET["subs_id"];
  $record = mysqli_query($conn, "DELETE FROM subscribers WHERE subs_id=$id");
  if($record){
    header("location:../subscribes.php?delete_subscribe=successfuly");
  }
  else{
    header("location:../subscribes.php?notdelete_subscribe=true");
  }

 ?>
