<?php
  require_once("../../db.php");
  $id = $_GET["user_id"];
  $sum_count  = mysqli_query($conn,"SELECT COUNT(user_id) FROM users");
  while ($show_count = mysqli_fetch_array($sum_count)) {
    $total_counts = $show_count[0];
  }
  if($total_counts != 1){
    mysqli_query($conn,"DELETE FROM permissions WHERE user_id=$id");
    $record = mysqli_query($conn, "DELETE FROM users WHERE user_id=$id");
    if($record){
      header("location:../users.php?showUser= delete_user_successfuly");
    }
    else{
      header("location:../users.php?showUser= notdelete_user");
    }
  }else{
    header("location:../users.php?showUser= delete_users_false");
  }
 ?>
