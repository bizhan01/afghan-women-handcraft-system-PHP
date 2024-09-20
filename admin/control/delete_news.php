<?php
    require_once("../../db.php");
    $id = $_GET["news_id"];
    $record = mysqli_query($conn, "DELETE FROM news WHERE news_id=$id");
    if($record){
      header("location:../list_news.php?delete_news=successfuly");
    }
    else{
      header("location:../list_news.php?notdelete_news=true");
    }
 ?>
