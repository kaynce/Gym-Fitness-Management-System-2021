<?php 

session_start();

//remove all section variables

session_unset();

//terminate the session
session_destroy();

echo "<script>document.location = '../login';</script>";
// header("Location: ../index.php");

 ?>

