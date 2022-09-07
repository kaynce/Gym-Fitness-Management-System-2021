<?php 
	include('assets/db_connect.php');

	if (isset($_POST['id'])) {

		$id = $_POST['id'];
		$training_classes_name = $_POST['training_classes_name'];
		$description = $_POST['description'];


		$query = "UPDATE `training_classes` 
			     SET training_classes_name = '$training_classes_name',
			      	 description = '$description'
				 WHERE id = '$id'";
		
		$result = mysqli_query($con, $query);


		if (!$result) {
			echo "<script>alert('Failed to approve! Contact the developer')</script>";
			echo "<script>document.location='../index.php';</script>";
		}
}



 ?>