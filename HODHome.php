<?php
session_start();
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    require("HodHeader1.php");
?>
