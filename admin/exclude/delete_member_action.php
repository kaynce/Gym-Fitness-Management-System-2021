<?php 
	include('assets/db_connect.php'); 

	if(isset($_POST['delete_id'])){
		$delete_id=$_POST['delete_id'];

		$query = "DELETE FROM `member` WHERE id=$delete_id";
		$result=mysqli_query($con, $query);

		if ($query) {
				echo "<script>alert('test .')</script>";
				echo "<script>document.location='../client_page.php';</script>";

			}	
	}

 ?>

