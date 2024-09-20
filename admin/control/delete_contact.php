<?php
  require_once("../../db.php");
  $id = $_GET["contact_id"];
  $record = mysqli_query($conn, "DELETE FROM contacts WHERE contact_id=$id");
  if($record){
    header("location:../contacts.php?delete_contact=successfuly");
  }
  else{
    header("location:../contacts.php?notdelete_contact=true");
  }

 ?>
