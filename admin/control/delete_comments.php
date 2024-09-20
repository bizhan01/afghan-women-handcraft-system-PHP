<?php
  require_once("../../db.php");
  $id = $_GET["comment_id"];
  $record = mysqli_query($conn, "DELETE FROM comments WHERE comment_id=$id");
  if($record){
    header("location:../comments.php?delete_comment=successfuly");
  }
  else{
    header("location:../comments.php?notdelete_comment=true");
  }
 ?>
