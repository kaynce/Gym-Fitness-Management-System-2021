<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php 

include 'assets/db_connect.php';

if (isset($_POST['cpassword'])) {

	$foo = True;

		while($foo){

			//Start creating employeeid
			$letters = '';
			$numbers = '';
			foreach (range('A', 'Z') as $char) {
			    $letters .= $char;
			}
			for($i = 0; $i < 10; $i++){
				$numbers .= $i;
			}
			
			// $value_member_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);
			$user_id = substr(str_shuffle($numbers), 0, 5);
			//End creating employeeid

			$query = "SELECT * FROM member_and_trainor_id WHERE unique_id='$user_id'";			

			$result = mysqli_query($con, $query); 

			if (mysqli_num_rows($result) != 1) {
				 $foo = False;
			}
		}

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	$status = 'pending';

	//$type = strtolower($_POST['type']);
	$avl = "1";
	$type = 'trainor';
	
	$query = "INSERT INTO `member_and_trainor_id` (unique_id)
					VALUES ('$user_id')";

	$result = mysqli_query($con, $query); 

	if ($password == $cpassword) {

		$query = "SELECT * FROM `users` WHERE email='$email'";

		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) < 1) {
		//if (mysqli_num_rows($result) != 1) {

			$query = "INSERT INTO users (user_id, 
										lastname, 
										firstname,
										email,
										password, 
										status, 
										availability, 
										type)
					VALUES ('$user_id',
						    '$lastname', 
						    '$firstname', 
						    '$email', 
						    '$password', 
						    '$status', 
						    '$avl', 
						    '$type')";

			$result = mysqli_query($con, $query);

			if ($result) {
				echo "<script>alert('Registered Successfully!.')</script>";
				echo "<script>document.location='../admin_login.php';</script>";

			} else {
					echo "<script>alert('Failed to register!.')</script>";
					echo "<script>document.location='../admin_registration.php';</script>";
				}
			} else {
				echo "<script>alert('Email Already Exists.')</script>";
				echo "<script>document.location='../admin_registration.php';</script>";
			}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
		echo "<script>document.location='../admin_registration.php';</script>";
	}
}


 ?>