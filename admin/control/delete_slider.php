<?php
  require_once("../../db.php");
  $id = $_GET["slider_id"];
  $record = mysqli_query($conn, "DELETE FROM sliders WHERE slider_id=$id");
  if($record){
    header("location:../slider.php?sliderShow= delete_slider successfuly");
  }
  else{
    header("location:../slider.php?sliderShow= notdelete_slider true");
  }

 ?>
