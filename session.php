<?php
  session_start();
  require_once("db.php");
  if(!isset($_SESSION['user_id'])){
    header("location:../index.php");
  }
?>
