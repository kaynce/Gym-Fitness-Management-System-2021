<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php
// $dir = "image/";
// move_uploaded_file($_FILES["image"]["tmp_name"], $dir. $_FILES["image"]["name"]);

//What does PHP receive
var_dump($_FILES);

//Moves uploaded  files to a nice directory
foreach($_FILES['myFiles']['tmp_name'] as $key => $value){
	$targetPath = "../assets/images/team/" . basename($_FILES['myFiles']['name'][$key]);
	move_uploaded_file($value, $targetPath);
}
?>
