<?php 
if (!isset($_SESSION)) {
	session_start();
}

include '../assets/db_connect.php';

	if (isset($_POST['login'])) {	

		$email = $_POST['email'];
		
		$password = md5($_POST['password']);

		$type = 'Client';
		$status = 'Approved';

		$query = "SELECT * FROM members WHERE email='$email' AND password='$password' AND status = '$status' AND type='$type' ";

		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {	
			

			$row = mysqli_fetch_assoc($result);

			// $client_id =  $row['id'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['member_id'] = $row['member_id'];
			// $_SESSION['firstname'] = $row['firstname'];
			// $_SESSION['lastname'] = $row['lastname'];
			// $_SESSION['email'] = $row['email'];
			
			$_SESSION['type'] = $row['type'];

			// echo "<script type='text/javascript'>alert('Login Successfully!');</script>";	
	    	echo "<script>document.location='../index.php?type=client';</script>";

		} else {
			echo "<script>alert('Incorrect Username or Password!');</script>";
			echo "<script>document.location='../client_login.php';</script>";
		}

}

 ?>