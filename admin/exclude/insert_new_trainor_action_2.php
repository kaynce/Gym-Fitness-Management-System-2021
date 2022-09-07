<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php 
	include('assets/db_connect.php'); 

	//extract($_POST);	

if (isset($_POST['add'])){

	// Start image
	# getting image data and store them in var
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	#if there is no error occurred while uploading
	if ($error === 0) {
	 	if($img_size > 1000000){
	 		#error message 
		 	$em = "Sorry, your file is too large!";

		 	#response array
		 	$error = array('error' => 1, 'em' => $em);

		 	/**
			printing out php array and 
			converting it into JSON format
		 	**/

		 	echo json_encode($error);
		 	exit();

	 	} else {
	 		// echo "Okay!";
	 		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

	 		// echo $img_ex;

	 		/**
	 		convert the image extension into lower case and 
	 		store it in var 
	 		**/

	 		$img_ex_lc = strtolower($img_ex);

	 		/**
	 		creating array that stores 
	 		allowed to upload image extensions. 
	 		**/

	 		$allowed_exs = array("jpg", "jpeg", "png");

	 		/**
	 		check if the image extension is 
	 		present in $allowed_exs array
	 		**/
	 		if(in_array($img_ex_lc, $allowed_exs)){
	 			// echo "OKAY!";

	 			/**
	 			renaming the image name width
	 			with random string 
	 			**/
	 			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

	 			#creating upload path on root directory

	 			$img_upload_path = "uploads/".$new_img_name;

	 			#move uploaded image to 'uploads' folder
	 			move_uploaded_file($tmp_name, $img_upload_path);


	 			// Start trainor info
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

				mysqli_query($con, $query); 

	 			// End trainor info


	 			#inserting image name into database
	 			// $query = "INSERT INTO `image` (image)
	 			// 		   VALUES('$new_img_name')";

	 			$query = "INSERT INTO `users` (user_id,
	 									image,
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
							'$new_img_name',
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




	 			mysqli_query($con, $query);

	 			#response array
		 		$res = array('error' => 0, 'src' => $new_img_name);

	 			echo json_encode($res);
	 			exit();

	 		}else{
	 			#error message 
	 			$em = "You can't upload files of this type!";

	 			#response array
		 	$error = array('error' => 1, 'em' => $em);

		 	/**
			printing out php array and 
			converting it into JSON format
		 	**/

		 	echo json_encode($error);
		 	exit();
	 		}

	 	}

	 } else {
	 	#error message 
	 	$em = "unknown error occurred!";

	 	#response array
		 	$error = array('error' => 1, 'em' => $em);

		 	/**
			printing out php array and 
			converting it into JSON format
		 	**/

		 	echo json_encode($error);
		 	exit();
	 }
// End image
}


 ?>

