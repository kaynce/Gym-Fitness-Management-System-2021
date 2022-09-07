<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php 
	include('assets/db_connect.php'); 

	//extract($_POST);	

	if (isset($_POST['add'])){

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

		$password =md5($_POST['password']);

		// $target_path = "../assets/images/team";

		// $target_path = $target_path.basename($_FILES['image_file']['name']);

		// if(move_uploaded_file($_FILES['image_file']['tmp_name'], $target_path)) {
		
		// $image_file = basename($_FILES['image_file']['name']);

		//$image_file = $_POST['image_file'];

		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$address = $_POST['address'];
		$phone = $_POST['contact'];
		$email = $_POST['email'];
		$rate = $_POST['rate'];
		$trainors_classes = $_POST['trainors_classes'];


		$client_type = $_POST['client_type'];
		$plan = $_POST['plan'];
		$package = $_POST['package'];
		$trainor = $_POST['trainor'];

		$type = "trainor";
		$status = "approved";

		$date = new DateTime();
		$date_created = $date->format('Y-m-d');

		$query = "INSERT INTO `member_and_trainor_id` (unique_id)
					VALUES ('$user_id')";

		$result = mysqli_query($con, $query); 
							
		$query = "INSERT INTO `users` (user_id,

										password,  
										lastname, 
										firstname, 
										age, 
										gender, 
										date_of_birth, 
										height, 
										weight, 
										address, 
										contact, 
										email,
										trainors_classes,   
										rate,
										date_created,
										type,
										status)
					VALUES ('$user_id',

							'$password', 
							'$lastname', 
							'$firstname', 
						    '$age', 
						    '$gender', 
							'$date_of_birth', 
							'$height', 
						    '$weight',	
						    '$address', 
							'$phone', 
							'$email',
							'$trainors_classes',
							'$rate',  
						    '$date_created',
						    '$type',
							'$status')";

	
		$result = mysqli_query($con, $query); 

		if (!$result) {
			
				?>
					<script>
						alert("Failed to save! Contact the developer");
						window.location.href = 'add_trainor.php';
					</script>
				<?php
		
		}

	}


 ?>

