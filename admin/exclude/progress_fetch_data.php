<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
  <?php  
 //fetch.php  
	include('assets/db_connect.php');

 if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM `health_status` WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($con, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>	