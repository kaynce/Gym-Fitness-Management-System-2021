<?php 
	include('../assets/db_connect.php');

	if (isset($_POST['id'])) {


		$id = $_POST['id'];
		$status = 'approved';

		$query = "UPDATE `users` 
			     SET status = '$status'
				 WHERE id = '$id'";
		
		$result = mysqli_query($con, $query);


		if (!$result) {
			echo "<script>alert('Failed to approve! Contact the developer')</script>";
			echo "<script>document.location='../index.php';</script>";
		}
}



 ?>