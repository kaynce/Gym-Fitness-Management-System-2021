<?php 

include '../assets/db_connect.php';

if (isset($_POST['submit'])) {

	$password = trim($_POST['password']);
	$cpassword = trim($_POST['cpassword']);

	if ($password == $cpassword) {

	    $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$training_classes = $_POST['training_classes'];
		$client_type = $_POST['client_type'];
		$package = $_POST['package'];
		$trainor = $_POST['trainor'];
		$password = md5(trim($_POST['password']));
		$cpassword = md5(trim($_POST['cpassword']));

		$status = 'pending';

		$type = 'client';


		$query_email = "SELECT * FROM members WHERE email='$email' ";

		$result_email = mysqli_query($con, $query_email);

	    if (mysqli_num_rows($result_email) == 0) {
			//if (mysqli_num_rows($result) != 1) {

				$query = "INSERT INTO pending_members (lastname, 
											firstname,
											password, 
											age, 
											gender, 
											date_of_birth,
											height,
											weight, 
											address, 
											contact,
											email,
											training_classes,
											client_type,
											package,
											trainor,
											type, 
											status)
						VALUES ('$lastname', 
							    '$firstname', 
							    '$password', 
							    '$age', 
							    '$gender', 
							   	'$date_of_birth', 
							    '$height',
								'$weight', 
							    '$address', 
							    '$contact', 
							    '$email',
							    '$training_classes',
							    '$client_type',
							    '$package',
							    '$trainor',
							    '$type',
							    '$status')";

				$result = mysqli_query($con, $query);

				if ($result) {
					
					echo "<script>alert('Registration Completed. Please wait for approval.')</script>";
					echo "<script>document.location='../index.php';</script>";

				} else {
					echo "<script>alert('Failed to register!')</script>";
			    	echo "<script>document.location='../client_registration.php';</script>";			
				}



		} else {
			echo "<script>alert('Email Already Exists.')</script>";
			echo "<script>document.location='../client_registration.php';</script>";
		    
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
		echo "<script>document.location='../client_registration.php';</script>";
	}
}


 ?>