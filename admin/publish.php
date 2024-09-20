<?php
  session_start();
  require_once("../db.php");
  $pro_id = $_GET["pro_id"];
  $publish = 1;
  $result = mysqli_query($conn, "UPDATE projects SET publish='$publish' WHERE pro_id=$pro_id");
  if($result){
    header("location:product-list.php");
  }else{
    header("location:view_product.php?pro=$pro_id");
  }

?>
