<?php 
	include('assets/db_connect.php');

	if (isset($_POST['id'])) {

		$id = $_POST['id'];

		$query = "DELETE FROM `training_classes` WHERE id = '$id'";
		
		$result = mysqli_query($con, $query);

		if (!$result) {
			echo "<script>alert('Failed to delete! Contact the developer')</script>";
			echo "<script>document.location='training_classes.php';</script>";
		}
}



 ?>