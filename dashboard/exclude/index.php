<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }

	 //  unset($_SESSION['nav-active 2']);
	 // $_SESSION['nav-active 1'] = "nav-active 1";
	 $nav_active_1 = "nav-active";
 ?>

<?php include('head.php'); ?>
<style type="text/css">
	
</style>


<?php 
		if(isset($_SESSION['done'])){
			unset($_SESSION['done']);

			?>
				 <script type="text/javascript">
				 	Swal.fire({
					    icon: 'success',
						title: 'Registration Completed!',
						text: 'We will send you an email for approval of your registration in 24 hours'
					}).then((result) => {
							// if (result.value) {
						window.location.href = 'index';
							// }
											        		
					})
				 </script>
			<?php
		}
?>
	
<?php 
		if(isset($_SESSION['done_add_renew'])){
			unset($_SESSION['done_add_renew']);

			?>
				 <script type="text/javascript">
				 	Swal.fire({
					    icon: 'success',
						title: 'Account has been updated!',
						text: 'It will be approved by the administrator in a matter of minutes'
					}).then((result) => {
							// if (result.value) {
						window.location.href = 'index';
							// }
											        		
					})
				 </script>
			<?php
		}
?>

<?php 

if(isset($_SESSION['id']) && isset($_SESSION['email'])) {

		function to_notification(){
			    require('../admin/assets/db_connect.php');

			    $email = $_SESSION['email'];

			    $alert_title = "A new client";
				$alert_message = "A new client has just registered";
				$status = "0";
				$type = "to_admin";

				$date = new DateTime();
			    $date_created = $date->format('Y-m-d');

				$query = "INSERT INTO `notifications` ( 
												email, 
												alert_title, 
												alert_message,
												status,
												type,
												date_created)
							VALUES ('$email',
									'$alert_title',
									'$alert_message',
									'$status',  
									'$type',
								    '$date_created')";

				mysqli_query($con, $query);

		}
		#check if image sent
		$error = '';
		$msg = '';

		$x = 0;
		// if(isset($_SESSION['done']) == FALSE){

		// ========== Start Registration Code ==========
		if (isset($_POST['submit'])) {

			if (isset($_POST['age'])){ $age = mysqli_real_escape_string($con, $_POST['age']);}
			if (isset($_POST['gender'])){ $gender = mysqli_real_escape_string($con, $_POST['gender']);}
			if (isset($_POST['date_of_birth'])){ $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);}
			if (isset($_POST['height'])){ $height = mysqli_real_escape_string($con, $_POST['height']);}
			if (isset($_POST['weight'])){ $weight = mysqli_real_escape_string($con, $_POST['weight']);}
			// if (isset($_POST['address'])){ $address = mysqli_real_escape_string($con, $_POST['address']);}
			if (isset($_POST['region'])){ $region = mysqli_real_escape_string($con, $_POST['region']);}
			if (isset($_POST['house_no'])){ $house_no = mysqli_real_escape_string($con, $_POST['house_no']);}
			if (isset($_POST['street_name'])){ $street_name = mysqli_real_escape_string($con, $_POST['street_name']);}
			if (isset($_POST['province'])){ $province = mysqli_real_escape_string($con, $_POST['province']);}
			if (isset($_POST['city'])){ $city = mysqli_real_escape_string($con, $_POST['city']);}
			if (isset($_POST['barangay'])){ $barangay = mysqli_real_escape_string($con, $_POST['barangay']);}
			if (isset($_POST['postal_code'])){ $postal_code = mysqli_real_escape_string($con, $_POST['postal_code']);}

			if (isset($_POST['contact'])){ $contact = mysqli_real_escape_string($con, $_POST['contact']);}

			$email = $_SESSION['email'];
			$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
			$result = mysqli_query($con, $query);

			if (mysqli_num_rows($result) == 1) {	
				$row = mysqli_fetch_assoc($result);

				$password = $row['password'];
				$lastname = $row['lastname'];
				$firstname = $row['firstname'];
				$email = $row['email'];
				$verify_status = $row['verify_status'];
			}

			# getting image data and store them in var
			// Start check screenshot id
			if (isset($_FILES['screenshot_id_file'])) {

				?>
					<!-- <script type="text/javascript">
						Swal.fire({
								icon: 'success',
								title: 'Registration Completed!',
								text: 'We will send you an email for approval of your registration in 24 hours'
						})
					</script> -->
				<?php

				$img_screenshot_id_name = $_FILES['screenshot_id_file']['name'];
				$img_screenshot_id_size = $_FILES['screenshot_id_file']['size'];
				$tmp_screenshot_id_name = $_FILES['screenshot_id_file']['tmp_name'];
				$error_screenshot_id = $_FILES['screenshot_id_file']['error'];

			
				# getting image data and store them in var
				$img_screenshot_payment_name = $_FILES['screenshot_payment_file']['name'];
				$img_screenshot_payment_size = $_FILES['screenshot_payment_file']['size'];
				$tmp_screenshot_payment_name = $_FILES['screenshot_payment_file']['tmp_name'];
				$error_screenshot_payment = $_FILES['screenshot_payment_file']['error'];

				//$firstname = $_POST['firstname'];

				// $password = $_POST['password'];
				// $cpassword = $_POST['cpassword'];

				// Start password
				if ($password == $password) {
					# code...
							#if there is no error occurred while uploading
						if ($error_screenshot_id === 0 || $error_screenshot_payment === 0 ) {

						 	if($img_screenshot_id_size > 10000000  || $img_screenshot_payment_size > 10000000  ){ 
						 		#error message 
							 	$msg = "Sorry, your file is too large!";

							 	#response array
							 	//$msg = array('error' => 1, 'em' => $em);
						 	} else {
						 		// echo "Okay!";
						 		$img_screenshot_id_ex = pathinfo($img_screenshot_id_name, PATHINFO_EXTENSION);
						 		$img_screenshot_payment_ex = pathinfo($img_screenshot_payment_name, PATHINFO_EXTENSION);
						 		// echo $img_ex;

						 		/**
						 		convert the image extension into lower case and 
						 		store it in var 
						 		**/

						 		$img_screenshot_id_ex_lc = strtolower($img_screenshot_id_ex);
						 		$img_screenshot_payment_ex_lc = strtolower($img_screenshot_payment_ex);

						 		/**
						 		creating array that stores 
						 		allowed to upload image extensions. 
						 		**/

						 		$allowed_exs = array("jpg", "jpeg", "png");

						 		/**
						 		check if the image extension is 
						 		present in $allowed_exs array
						 		**/
						 		if(in_array($img_screenshot_id_ex_lc, $allowed_exs) || in_array($img_screenshot_payment_ex_lc, $allowed_exs)){
						
										// $password = md5($_POST['password']);

										// $lastname = $_POST['lastname'];
										// $firstname = $_POST['firstname'];

						 			


										// $email = $_POST['email'];
										// $rate = $_POST['rate'];
										$physical_fitness = $_POST['physical_fitness'];
										if (isset($_POST['physical_fitness'])) {
											$physical_fitness = $_POST['physical_fitness'];

											//-----------get the name of the package from db
											$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness'";
											$result_tc  = mysqli_query($con, $query_tc);
											if(mysqli_num_rows($result_tc)){
												$row_package_name = mysqli_fetch_assoc($result_tc);
												$physical_fitness_name = $row_package_name['physical_fitness_name'];
											//--------------------
											}
										}

										$trainor ='';
										if (isset($_POST['trainor'])) {
											$trainor = $_POST['trainor'];
										}

										$package_name ='';
										if (isset($_POST['package_name'])) {
											$package_name = $_POST['package_name'];
										}
										

										$package ='';
										if (isset($_POST['package'])) {
											$package = $_POST['package'];
										}


										$package_id = '';
										if(isset($_POST['package_id'])){
											$package_id = $_POST['package_id'];

											//-----------get the name of the package from db
											$query_tc = "SELECT * FROM physical_fitness_packages_rates WHERE package_id = '$package_id'";
											$result_tc  = mysqli_query($con, $query_tc);
											if(mysqli_num_rows($result_tc)){
												$row_package_name = mysqli_fetch_assoc($result_tc);
												$package_name = $row_package_name['physical_fitness_name'];
												//--------------------
											}
										}


										$session = '';
										if(isset($_POST['session'])){
											$session = $_POST['session'];
										}


					                    //$trainors_classes = implode(",", $_POST['trainors_classes']);
										$client_type = '';
										if(isset($_POST['client_type_reg'])){
											$client_type = $_POST['client_type_reg'];
										}

										$walk_in = '';
										if(isset($_POST['walk_in_reg'])){
											$walk_in = $_POST['walk_in_reg'];
										}

										$amount = '';
										if(isset($_POST['amount'])){
											$amount = $_POST['amount'];
										}


										$status = "pending";

										$date = new DateTime();
										$date_created = $date->format('Y-m-d');

										// End
						 			/**
						 			renaming the image name width
						 			with random string 
						 			**/
						 			$new_img_screenshot_id_name = uniqid("IMG-", true).'.'.$img_screenshot_id_ex_lc;
						 			$new_img_screenshot_payment_name = uniqid("IMG-", true).'.'.$img_screenshot_payment_ex_lc;

						 			#creating upload path on root directory

						 			$img_upload_path_screenshot_id = "../admin/assets/images/users/screenshot_id/".$new_img_screenshot_id_name;
						 				$img_upload_path_screenshot_payment = "../admin/assets/images/users/screenshot_payment/".$new_img_screenshot_payment_name;

						 			#move uploaded image to 'uploads' folder
						 			move_uploaded_file($tmp_screenshot_id_name, $img_upload_path_screenshot_id);
						 			move_uploaded_file($tmp_screenshot_payment_name, $img_upload_path_screenshot_payment);

						 			#inserting image name into database

						 			// $query = "INSERT INTO `users` (image)
										// VALUES ('$new_img_name')";

						 			to_notification();

						 			$query = "UPDATE `pending_members` 
												     SET screenshot_id = '$new_img_screenshot_id_name',
												     	screenshot_payment = '$new_img_screenshot_payment_name',
												     	password = '$password',
												     	lastname = '$lastname',
												     	firstname = '$firstname',
												     	age = '$age',
												     	gender = '$gender',
												     	date_of_birth = '$date_of_birth',
												     	height = '$height',
												     	weight = '$weight',
												     	region = '$region',
												     	house_no = '$house_no',
												     	street_name = '$street_name',
												     	province = '$province',
												     	city = '$city',
												     	barangay = '$barangay',
												     	postal_code = '$postal_code',
												     	contact = '$contact',
												     	email = '$email',
												     	physical_fitness_name = '$physical_fitness_name',
												     	physical_fitness_id = '$physical_fitness',
												     	client_type = '$client_type',
												     	walk_in = '$walk_in',
												     	package = '$package_name',
												     	package_id = '$package_id',
												     	session = '$session',
												     	amount = '$amount',
												     	trainor = '$trainor',
												     	date_created = '$date_created',
												     	status = '$status',
												     	verify_status = '$verify_status'
													 WHERE email = '$email' ";


										if($query){
											mysqli_query($con, $query);
											$_SESSION['done'] = 'done';
											?>
												<script>
														window.location.href = 'index';
												</script>
											<?php
											
										}
									


						 		}else{
						 			#error message 
						 			$error = "You can't upload this type of file(image)!";


						 		}

						 	}

						 } else {
						 	#error message 
						 	//$msg = "unknown error occurred!";

							$error="Something went wrong. Please try again";

						 }
				 }else{
				 // End password

				 	?>
						 <script type="text/javascript">
						 		
						 	Swal.fire({
								icon: 'error',
								title: 'Password Mismatched!'
							})					        		
						
						 </script>
					<?php

				 }
			}else{

				# getting image data and store them in var
				$img_screenshot_payment_name = $_FILES['screenshot_payment_file']['name'];
				$img_screenshot_payment_size = $_FILES['screenshot_payment_file']['size'];
				$tmp_screenshot_payment_name = $_FILES['screenshot_payment_file']['tmp_name'];
				$error_screenshot_payment = $_FILES['screenshot_payment_file']['error'];

				//$firstname = $_POST['firstname'];

				// $password = $_POST['password'];
				// $cpassword = $_POST['cpassword'];

				if ($password == $password) {
					# code...
							#if there is no error occurred while uploading
						if ($error_screenshot_payment === 0 ) {
						 	if($img_screenshot_payment_size > 10000000  ){ 
						 		#error message 
							 	//$msg = "Sorry, your file is too large!";

							 	?>
										<script type="text/javascript">
											Swal.fire({
										          icon: 'error',
										          title: 'Sorry!',
										          text: 'your file is too large'
										        }).then((result) => {
										        	 // if (result.value) {
										        	  	// window.location.href = 'admin_login.php';
										        	 // }
										        		
										        })
										        
										</script>
									<?php

							 	#response array
							 	//$msg = array('error' => 1, 'em' => $em);
						 	} else {
						 		// echo "Okay!";
						 		$img_screenshot_payment_ex = pathinfo($img_screenshot_payment_name, PATHINFO_EXTENSION);
						 		// echo $img_ex;

						 		/**
						 		convert the image extension into lower case and 
						 		store it in var 
						 		**/
						 		$img_screenshot_payment_ex_lc = strtolower($img_screenshot_payment_ex);

						 		/**
						 		creating array that stores 
						 		allowed to upload image extensions. 
						 		**/

						 		$allowed_exs = array("jpg", "jpeg", "png");

						 		/**
						 		check if the image extension is 
						 		present in $allowed_exs array
						 		**/
						 		if(in_array($img_screenshot_payment_ex_lc, $allowed_exs)){
						
										// $password = md5($_POST['password']);

										// $lastname = $_POST['lastname'];
										// $firstname = $_POST['firstname'];

										// $age = $_POST['age'];
										// $gender = $_POST['gender'];
										// $date_of_birth = $_POST['date_of_birth'];
										// $height = $_POST['height'];
										// $weight = $_POST['weight'];
										// $address = $_POST['address'];
										// $contact = $_POST['contact'];

						 			


										// $email = $_POST['email'];
										// $rate = $_POST['rate'];
										$physical_fitness = $_POST['physical_fitness'];
										if (isset($_POST['physical_fitness'])) {
											$physical_fitness = $_POST['physical_fitness'];

											//-----------get the name of the package from db
											$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness'";
											$result_tc  = mysqli_query($con, $query_tc);
											if(mysqli_num_rows($result_tc)){
												$row_package_name = mysqli_fetch_assoc($result_tc);
												$physical_fitness_name = $row_package_name['physical_fitness_name'];
											//--------------------
											}
										}

										$trainor ='';
										if (isset($_POST['trainor'])) {
											$trainor = $_POST['trainor'];
										}

										$package_name ='';
										if (isset($_POST['package_name'])) {
											$package_name = $_POST['package_name'];
										}

										$package ='';
										if (isset($_POST['package'])) {
											$package = $_POST['package'];

										}
										
										$package_id = '';
										if(isset($_POST['package_id'])){
											$package_id = $_POST['package_id'];
										}


										$session = '';
										if(isset($_POST['session'])){
											$session = $_POST['session'];
										}

					                    //$trainors_classes = implode(",", $_POST['trainors_classes']);
										$client_type = '';
										if(isset($_POST['client_type_reg'])){
											$client_type = $_POST['client_type_reg'];
										}

										$walk_in = '';
										if(isset($_POST['walk_in_reg'])){
											$walk_in = $_POST['walk_in_reg'];
										}

										$amount = '';
										if(isset($_POST['amount'])){
											$amount = $_POST['amount'];
										}
										
					                    $avl = "1";
										$status = "pending";

										$date = new DateTime();
										$date_created = $date->format('Y-m-d');
										// End
						 			/**
						 			renaming the image name width
						 			with random string 
						 			**/
						 			$new_img_screenshot_payment_name = uniqid("IMG-", true).'.'.$img_screenshot_payment_ex_lc;

						 			#creating upload path on root directory

						 			$img_upload_path_screenshot_payment = "../admin/assets/images/users/screenshot_payment/".$new_img_screenshot_payment_name;

						 			#move uploaded image to 'uploads' folder
						 			move_uploaded_file($tmp_screenshot_payment_name, $img_upload_path_screenshot_payment);

						 			#inserting image name into database

						 			// $query = "INSERT INTO `users` (image)
										// VALUES ('$new_img_name')";

						 			to_notification();

						 			$query = "UPDATE `pending_members` 
												     SET screenshot_payment = '$new_img_screenshot_payment_name',
												     	password = '$password',
												     	lastname = '$lastname',
												     	firstname = '$firstname',
												     	age = '$age',
												     	gender = '$gender',
												     	date_of_birth = '$date_of_birth',
												     	height = '$height',
												     	weight = '$weight',
												     	region = '$region',
												     	house_no = '$house_no',
												     	street_name = '$street_name',
												     	province = '$province',
												     	city = '$city',
												     	barangay = '$barangay',
												     	postal_code = '$postal_code',
												     	contact = '$contact',
												     	email = '$email',
												     	physical_fitness_name = '$physical_fitness_name',
												     	physical_fitness_id = '$physical_fitness',
												     	client_type = '$client_type',
												     	walk_in = '$walk_in',
												     	package = '$package_name',
												     	package_id = '$package_id',
												     	session = '$session',
												     	amount = '$amount',
												     	trainor = '$trainor',
												     	date_created = '$date_created',
												     	status = '$status',
												     	verify_status = '$verify_status'
													 WHERE email = '$email' ";
									
										if ($query) {
											mysqli_query($con, $query);
											$_SESSION['done'] = 'done';
											?>
												<script>
													window.location.href = 'index';
												</script>
											<?php
										}
									

						 		}else{
						 			#error message 
						 			$error = "You can't upload this type of file(image)!";

						 			



						 		}

						 	}

						 } else {
						 	#error message 
						 	//$msg = "unknown error occurred!";

							$error="Something went wrong. Please try again";

						 }
				 }else{

				 	?>
						 <script type="text/javascript">
						 		
						 	Swal.fire({
								icon: 'error',
								title: 'Password Mismatched!'
							})					        		
						
						 </script>
					<?php

				 }
			}
			//End check screenshot id

		}
		// ========== End Registration Code ==========

		// ========== Start Renew Code ==========
		if (isset($_POST['submit_renew'])) {

			function submit_renew_to_notification(){
			    require('../admin/assets/db_connect.php');

			    $email = $_SESSION['email'];

			    $alert_title = "Account renewal/addition is pending.";
				$alert_message = "A client's account has been renewed/added to!";
				$status = "0";
				$type = "to_admin";
				$date = new DateTime();
				$date_created = $date->format('Y-m-d');

				$query = "INSERT INTO `notifications` ( 
												email, 
												alert_title, 
												alert_message,
												status,
												type,
												date_created)
							VALUES ('$email',
									'$alert_title',
									'$alert_message',
									'$status',  
									'$type',
								    '$date_created')";

				mysqli_query($con, $query);


		    }

			$email = $_SESSION['email'];
			$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
			$result = mysqli_query($con, $query);

			if (mysqli_num_rows($result) == 1) {	
				$row = mysqli_fetch_assoc($result);

				$password = $row['password'];
				$lastname = $row['lastname'];
				$firstname = $row['firstname'];
				$email = $row['email'];
				$verify_status = $row['verify_status'];
			}

			# getting image data and store them in var
			// Start check screenshot id
			if (isset($_FILES['screenshot_id_file'])) {

				$img_screenshot_id_name = $_FILES['screenshot_id_file']['name'];
				$img_screenshot_id_size = $_FILES['screenshot_id_file']['size'];
				$tmp_screenshot_id_name = $_FILES['screenshot_id_file']['tmp_name'];
				$error_screenshot_id = $_FILES['screenshot_id_file']['error'];
			
				# getting image data and store them in var
				$img_screenshot_payment_name = $_FILES['screenshot_payment_file']['name'];
				$img_screenshot_payment_size = $_FILES['screenshot_payment_file']['size'];
				$tmp_screenshot_payment_name = $_FILES['screenshot_payment_file']['tmp_name'];
				$error_screenshot_payment = $_FILES['screenshot_payment_file']['error'];

				// Start password
				if ($password == $password) {
					# code...
							#if there is no error occurred while uploading
						if ($error_screenshot_id === 0 || $error_screenshot_payment === 0 ) {

						 	if($img_screenshot_id_size > 10000000  || $img_screenshot_payment_size > 10000000  ){ 
						 		#error message 
							 	$msg = "Sorry, your file is too large!";

							 	#response array
							 	//$msg = array('error' => 1, 'em' => $em);
						 	} else {
						 		// echo "Okay!";
						 		$img_screenshot_id_ex = pathinfo($img_screenshot_id_name, PATHINFO_EXTENSION);
						 		$img_screenshot_payment_ex = pathinfo($img_screenshot_payment_name, PATHINFO_EXTENSION);
						 		// echo $img_ex;

						 		/**
						 		convert the image extension into lower case and 
						 		store it in var 
						 		**/

						 		$img_screenshot_id_ex_lc = strtolower($img_screenshot_id_ex);
						 		$img_screenshot_payment_ex_lc = strtolower($img_screenshot_payment_ex);

						 		/**
						 		creating array that stores 
						 		allowed to upload image extensions. 
						 		**/

						 		$allowed_exs = array("jpg", "jpeg", "png");

						 		/**
						 		check if the image extension is 
						 		present in $allowed_exs array
						 		**/
						 		if(in_array($img_screenshot_id_ex_lc, $allowed_exs) || in_array($img_screenshot_payment_ex_lc, $allowed_exs)){
										
						 			/**
						 			renaming the image name width
						 			with random string 
						 			**/
						 			$new_img_screenshot_id_name = uniqid("IMG-", true).'.'.$img_screenshot_id_ex_lc;
						 			$new_img_screenshot_payment_name = uniqid("IMG-", true).'.'.$img_screenshot_payment_ex_lc;

						 			#creating upload path on root directory

						 			$img_upload_path_screenshot_id = "../admin/assets/images/users/screenshot_id/".$new_img_screenshot_id_name;
						 				$img_upload_path_screenshot_payment = "../admin/assets/images/users/screenshot_payment/".$new_img_screenshot_payment_name;

						 			#move uploaded image to 'uploads' folder
						 			move_uploaded_file($tmp_screenshot_id_name, $img_upload_path_screenshot_id);
						 			move_uploaded_file($tmp_screenshot_payment_name, $img_upload_path_screenshot_payment);

		// Start
					$email = $_SESSION['email'];
					$query = "SELECT * FROM `members` WHERE email = '$email' ";
					$result = mysqli_query($con, $query);

					$row = mysqli_fetch_assoc($result);

					$email = $row['email'];
					$member_id = $row['member_id'];

					$screenshot_id = '';
					if (!empty($row['screenshot_id'])) {
						$screenshot_id = $row['screenshot_id'];
					}

				   	
				   	$screenshot_payment = '';
					if (!empty($row['screenshot_payment'])) {
						  $screenshot_payment = $row['screenshot_payment'];
					}

					// for mailbox_action
					// $_SESSION['email_name'] = $row['email'];

					// $physical_fitness = $row['physical_fitness'];
					$physical_fitness = $_POST['physical_fitness'];
					if (isset($_POST['physical_fitness'])) {
						$physical_fitness = $_POST['physical_fitness'];

						//-----------get the name of the package from db
						$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness'";
						$result_tc  = mysqli_query($con, $query_tc);
						if(mysqli_num_rows($result_tc)){
							$row_package_name = mysqli_fetch_assoc($result_tc);
							$physical_fitness_name = $row_package_name['physical_fitness_name'];
						//--------------------
						}
					}

					// $client_type = $row['client_type'];
					$client_type = '';
					if(isset($_POST['client_type'])){
						$client_type = $_POST['client_type'];
					}

					$walk_in = '';
					if(isset($_POST['walk_in'])){
						$walk_in = $_POST['walk_in'];
					}

					// $walk_in = $_POST['walk_in'];
					
					if(isset($_POST['amount'])){
						$amount = $_POST['amount'];
					}

					$training_classes_name = '';
					if(isset($_POST['training_classes_name'])){ $package = $_POST['training_classes_name']; }

					$package_name ='';
					if (isset($_POST['package_name'])) {
						$package_name = $_POST['package_name'];
				    }

					$package ='';
					if (isset($_POST['package'])) {
						$package = $_POST['package'];
					}

					$package_id = '';
					if(isset($_POST['package_id'])){
						$package_id = $_POST['package_id'];
					}


					$session = '';
					if(isset($_POST['session'])){
						$session = $_POST['session'];
					}
					

					$day ='';
					$week ='';
					$month ='';

					$date = new DateTime();
					$start_date = $date->format('Y-m-d');
					$paid_date = $date->format('Y-m-d');

					//Check of walk in
					if($_POST['walk_in'] == 'YES'){
						//==================Start membership expiry date
						$query_start_date = "SELECT * FROM `physical_fitness_walk_in_rates` WHERE physical_fitness_id='$physical_fitness'";

						$result_start_date  = mysqli_query($con, $query_start_date);

						$value=mysqli_fetch_row($result_start_date);
						//get the value
						$day = $value[2];
						//===============
			           //  $d=strtotime("+".$value[2]." Days");
			           //  //$cdate=date("Y-m-d"); //current date
			           //  $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
			           // //inserting into enrolls_to table of corresponding userid
			           // ================== End membership expiry date
			            $end_date=date("Y-m-d"); 
					}else{

						//If the walk in is equal to NO
						$query_start_date = "SELECT * FROM physical_fitness_walk_in_rates WHERE package_id = '$package'";
						$result_start_date = mysqli_query($con, $query_start_date);

						$value = mysqli_fetch_row($result_start_date);

						if(mysqli_num_rows($result_start_date)<1){

							$query_start_date = "SELECT * FROM physical_fitness_walk_in_rates WHERE package_id = '$package'";
						    $result_start_date = mysqli_query($con, $query_start_date);
						    $value = mysqli_fetch_row($result_start_date);

						     // index in database
						    // $value[5]
						     if(!empty($value[5])){ 	
								 	//==================Start membership expiry date
									
									$day = $value[5];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[5]." Days");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[6])) { 
						            //==================Start membership expiry date
									
									$week = $value[6];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[6]." Weeks");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[7])) {  
						            //==================Start membership expiry date
									
									$month = $value[7];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[7]." Months");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						        }else{ } 
						}else{

							 if(!empty($value[5])){ 	
								 	//==================Start membership expiry date
									
									$day = $value[5];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[5]." Days");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[6])) { 
						            //==================Start membership expiry date
									
									$week = $value[6];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[6]." Weeks");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[7])) {  
						            //==================Start membership expiry date
									
									$month = $value[7];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[7]." Months");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else{ } 
					   }

					}
			

					//$end_date = '';
					$trainor ='';
					if(isset($_POST['trainor'])){
						$trainor = $_POST['trainor'];
					}


					$date = new DateTime();
					$date_created = $date->format('Y-m-d');

					// End qrcode

					$status = "0";
					$add_renew_status = "pending";
					
					$query = "INSERT INTO `enrolls_to` ( 
														member_id, 
														screenshot_id, 
														screenshot_payment,
														client_type,
														walk_in,
														physical_fitness_id,
														physical_fitness_name,
														day, 
														week,
														month, 
														package,
														package_id,
														session,
														remaining_session,
														amount, 
														paid_date, 
														start_date,
														end_date,
														trainor_id,
														status, 
														date_created,
														add_renew_status)
									VALUES ('$member_id',
											'$new_img_screenshot_id_name',  
											'$new_img_screenshot_payment_name',
											'$client_type',
											'$walk_in',
											'$physical_fitness',
											'$physical_fitness_name',
											'$day', 
											'$week', 
											'$month',   
											'$package_name',   
											'$package_id',
											'$session',
											'$session',
											'$amount',  
										    '$paid_date', 
										    '$start_date', 
										    '$end_date',
										    '$trainor',  
										    '$status', 
										   	'$date_created',
										    '$add_renew_status')";

												if ($query) {
													mysqli_query($con, $query);
													$_SESSION['done_add_renew'] = 'done_add_renew';

													submit_renew_to_notification();

													?>
														<script>
															window.location.href = 'index';
														</script>
													<?php
													
												}
											
								
			//End
						 				
						 		}else{
						 			#error message 
						 			$error = "You can't upload this type of file(image)!";


						 		}

						 	}

						 } else {
						 	#error message 
						 	//$msg = "unknown error occurred!";

							$error="Something went wrong. Please try again";

						 }
				 }else{
				 // End password

				 	?>
						 <script type="text/javascript">
						 		
						 	Swal.fire({
								icon: 'error',
								title: 'Password Mismatched!'
							})					        		
						
						 </script>
					<?php

				 }
			}else{

				# getting image data and store them in var
				$img_screenshot_payment_name = $_FILES['screenshot_payment_file']['name'];
				$img_screenshot_payment_size = $_FILES['screenshot_payment_file']['size'];
				$tmp_screenshot_payment_name = $_FILES['screenshot_payment_file']['tmp_name'];
				$error_screenshot_payment = $_FILES['screenshot_payment_file']['error'];

				//$firstname = $_POST['firstname'];

				// $password = $_POST['password'];
				// $cpassword = $_POST['cpassword'];

				if ($password == $password) {
					# code...
							#if there is no error occurred while uploading
						if ($error_screenshot_payment === 0 ) {
						 	if($img_screenshot_payment_size > 10000000  ){ 
						 		#error message 
							 	//$msg = "Sorry, your file is too large!";

							 	?>
										<script type="text/javascript">
											Swal.fire({
										          icon: 'error',
										          title: 'Sorry!',
										          text: 'your file is too large'
										        }).then((result) => {
										        	 // if (result.value) {
										        	  	// window.location.href = 'admin_login.php';
										        	 // }
										        		
										        })
										        
										</script>
									<?php

							 	#response array
							 	//$msg = array('error' => 1, 'em' => $em);
						 	} else {
						 		// echo "Okay!";
						 		$img_screenshot_payment_ex = pathinfo($img_screenshot_payment_name, PATHINFO_EXTENSION);
						 		// echo $img_ex;

						 		/**
						 		convert the image extension into lower case and 
						 		store it in var 
						 		**/
						 		$img_screenshot_payment_ex_lc = strtolower($img_screenshot_payment_ex);

						 		/**
						 		creating array that stores 
						 		allowed to upload image extensions. 
						 		**/

						 		$allowed_exs = array("jpg", "jpeg", "png");

						 		/**
						 		check if the image extension is 
						 		present in $allowed_exs array
						 		**/
						 		if(in_array($img_screenshot_payment_ex_lc, $allowed_exs)){
								
						 			/**
						 			renaming the image name width
						 			with random string 
						 			**/
						 			$new_img_screenshot_payment_name = uniqid("IMG-", true).'.'.$img_screenshot_payment_ex_lc;

						 			#creating upload path on root directory

						 			$img_upload_path_screenshot_payment = "../admin/assets/images/users/screenshot_payment/".$new_img_screenshot_payment_name;

						 			#move uploaded image to 'uploads' folder
						 			move_uploaded_file($tmp_screenshot_payment_name, $img_upload_path_screenshot_payment);

		// Start
					$email = $_SESSION['email'];
					$query = "SELECT * FROM `members` WHERE email = '$email' ";
					$result = mysqli_query($con, $query);

					$row = mysqli_fetch_assoc($result);

					$email = $row['email'];
					$member_id = $row['member_id'];

					$screenshot_id = '';
					if (!empty($row['screenshot_id'])) {
						$screenshot_id = $row['screenshot_id'];
					}

				   	
				   	$screenshot_payment = '';
					if (!empty($row['screenshot_payment'])) {
						  $screenshot_payment = $row['screenshot_payment'];
					}

					// for mailbox_action
					// $_SESSION['email_name'] = $row['email'];

					// $physical_fitness = $row['physical_fitness'];
					$physical_fitness = $_POST['physical_fitness'];
					if (isset($_POST['physical_fitness'])) {
						$physical_fitness = $_POST['physical_fitness'];

						//-----------get the name of the package from db
						$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness'";
						$result_tc  = mysqli_query($con, $query_tc);
						if(mysqli_num_rows($result_tc)){
							$row_package_name = mysqli_fetch_assoc($result_tc);
							$physical_fitness_name = $row_package_name['physical_fitness_name'];
						//--------------------
						}
					}	

					if(isset($_POST['client_type'])){
						$client_type = $_POST['client_type'];
					}

					if(isset($_POST['walk_in'])){
						$walk_in = $_POST['walk_in'];
					}

					if(isset($_POST['amount'])){
						$amount = $_POST['amount'];
					}

					$package ='';
					if (isset($_POST['package'])) {
						$package = $_POST['package'];

					    //-----------get the name of the package from db
						$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$package'";
						$result_tc  = mysqli_query($con, $query_tc);
						if(mysqli_num_rows($result_tc) == 1){
							$row_package_name = mysqli_fetch_assoc($result_tc);
							$package_name = $row_package_name['physical_fitness_name'];
						}
						
						//--------------------
					}

					$package_name ='';
					if (isset($_POST['package_name'])) {
						$package_name = $_POST['package_name'];
				    }

					$package_id = '';
					if(isset($_POST['package_id'])){
						$package_id = $_POST['package_id'];
					}

					$session = '';
					if(isset($_POST['session'])){
						$session = $_POST['session'];
					}
				
					$day ='';
					$week ='';
					$month ='';

					$date = new DateTime();
					$start_date = $date->format('Y-m-d');
					$paid_date = $date->format('Y-m-d');

					//Check of walk in
					if($_POST['walk_in'] == 'YES'){
						//==================Start membership expiry date
						$query_start_date = "SELECT * FROM `physical_fitness_walk_in_rates` WHERE physical_fitness_id='$physical_fitness'";

						$result_start_date  = mysqli_query($con, $query_start_date);

						$value=mysqli_fetch_row($result_start_date);
						//get the value
						$day = $value[2];
						//===============
			           //  $d=strtotime("+".$value[2]." Days");
			           //  //$cdate=date("Y-m-d"); //current date
			           //  $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
			           // //inserting into enrolls_to table of corresponding userid
			           // ================== End membership expiry date
			            $end_date=date("Y-m-d"); 
					}else{

						//If the walk in is equal to NO
						$query_start_date = "SELECT * FROM physical_fitness_packages_rates WHERE package_id = '$package_id'";
						$result_start_date = mysqli_query($con, $query_start_date);

						$value = mysqli_fetch_row($result_start_date);

						if(mysqli_num_rows($result_start_date)<1){
// 
							// $query_start_date = "SELECT * FROM training_classes_personal_training_rates WHERE package_id = '$package'";
						 //    $result_start_date = mysqli_query($con, $query_start_date);
						 //    $value = mysqli_fetch_row($result_start_date);

						 //     // index in database
						 //    // $value[5]
						 //     if(!empty($value[5])){ 	
							// 	 	//==================Start membership expiry date
									
							// 		$day = $value[5];
							// 		$result_start_date  = mysqli_query($con, $query_start_date);

							// 		$value=mysqli_fetch_row($result_start_date);

						 //            $d=strtotime("+".$value[5]." Days");
						 //            //$cdate=date("Y-m-d"); //current date
						 //            $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
						 //           //inserting into enrolls_to table of corresponding userid
						 //           // ================== End membership expiry date
						 //     }else if(!empty($value[6])) { 
						 //            //==================Start membership expiry date
									
							// 		$week = $value[6];
							// 		$result_start_date  = mysqli_query($con, $query_start_date);

							// 		$value=mysqli_fetch_row($result_start_date);

						 //            $d=strtotime("+".$value[6]." Weeks");
						 //            //$cdate=date("Y-m-d"); //current date
						 //            $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
						 //           //inserting into enrolls_to table of corresponding userid
						 //           // ================== End membership expiry date
						 //     }else if(!empty($value[7])) {  
						 //            //==================Start membership expiry date
									
							// 		$month = $value[7];
							// 		$result_start_date  = mysqli_query($con, $query_start_date);

							// 		$value=mysqli_fetch_row($result_start_date);

						 //            $d=strtotime("+".$value[7]." Months");
						 //            //$cdate=date("Y-m-d"); //current date
						 //            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						 //           //inserting into enrolls_to table of corresponding userid
						 //           // ================== End membership expiry date
						 //        }else{ } 
						}else{

							 if(!empty($value[5])){ 	
								 	//==================Start membership expiry date
									
									$day = $value[5];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[5]." Days");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[6])) { 
						            //==================Start membership expiry date
									
									$week = $value[6];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[6]." Weeks");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[7])) {  
						            //==================Start membership expiry date
									
									$month = $value[7];
									$result_start_date  = mysqli_query($con, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[7]." Months");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else{ 
						     	$start_date = '';
								//$paid_date = '';
								$end_date = '';
						     } 
					   }

					}
			

					//$end_date = '';
					$trainor ='';
					if(isset($_POST['trainor'])){
						$trainor = $_POST['trainor'];
					}


					$date = new DateTime();
					$date_created = $date->format('Y-m-d');

					if(isset($_POST['type'])){
						$type = $_POST['type'];
					}

			
					// End qrcode

					$status = "0";
					$add_renew_status = "pending";

					$query = "INSERT INTO `enrolls_to` ( 
														member_id, 
														screenshot_payment,
														client_type,
														walk_in,
														physical_fitness_id,
														physical_fitness_name,
														day, 
														week,
														month, 
														package,
														package_id,
														session,
														remaining_session,
														amount, 
														paid_date, 
														start_date,
														end_date,
														trainor_id,
														status, 
														date_created,
														add_renew_status)
									VALUES ('$member_id',
											'$new_img_screenshot_payment_name',
											'$client_type',
											'$walk_in',
											'$physical_fitness',
											'$physical_fitness_name',
											'$day', 
											'$week', 
											'$month',   
											'$package_name',   
											'$package_id',
											'$session',
											'$session',
											'$amount',  
										    '$paid_date', 
										    '$start_date', 
										    '$end_date',
										    '$trainor',  
										    '$status', 
										   	'$date_created',
										    '$add_renew_status')";

												if ($query) {
													mysqli_query($con, $query);
													$_SESSION['done_add_renew'] = 'done_add_renew';
													
													submit_renew_to_notification();

													?>
														<script>
															window.location.href = 'index';
														</script>
													<?php
													
												}
			//End
						 		}else{
						 			#error message 
						 			$error = "You can't upload this type of file(image)!";

						 		}

						 	}

						 } else {
						 	#error message 
						 	//$msg = "unknown error occurred!";

							$error="Something went wrong. Please try again";

						 }
				 }else{

				 	?>
						 <script type="text/javascript">
						 		
						 	Swal.fire({
								icon: 'error',
								title: 'Password Mismatched!'
							})					        		
						
						 </script>
					<?php

				 }
			}
			//End check screenshot id

		}

}
//End of isset id & email
?>
<!-- ========== End Renew Code ========== -->
	
	<?php 
	    	if(isset($_SESSION['loading'])){
				?>
					<script type="text/javascript">
						let timerInterval
						Swal.fire({
						  title: 'Loading...',
						  html: 'I will close in <b></b> milliseconds.',
						  timer: 2000,
						  allowOutsideClick: false,
						  timerProgressBar: true,
						  didOpen: () => {
						    Swal.showLoading()
						    const b = Swal.getHtmlContainer().querySelector('b')
						    timerInterval = setInterval(() => {
						      b.textContent = Swal.getTimerLeft()
						    }, 100)
						  },
						  willClose: () => {
						    clearInterval(timerInterval)
						  }
						}).then((result) => {
						  /* Read more about handling dismissals below */
						  if (result.dismiss === Swal.DismissReason.timer) {

						    console.log('I was closed by the timer');
						    //Unset the loading session
						    window.location.href = 'unset.php';
						  }
						})

					</script>
				<?php
	    	}
	     ?>


	<!--   
	     <div class="preloader">
	        <div class="lds-ripple">
	            <div class="lds-pos"></div>
	            <div class="lds-pos"></div>
	        </div>
	    </div> -->

			<div class="inner-wrapper" >
				<!-- start: sidebar -->
			    <?php 
			    	require('sidebar.php');
			     ?>
				<!-- end: sidebar -->


				<?php 
					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];

						$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
						$result = mysqli_query($con, $query);

							if(mysqli_num_rows($result) == 1){
								$row = mysqli_fetch_assoc($result);
								$status = $row['status'];
							}else{
								$query = "SELECT * FROM `members` WHERE email = '$email' ";
								$result = mysqli_query($con, $query);

								if(mysqli_num_rows($result) == 1){
									$row = mysqli_fetch_assoc($result);
									$status = $row['status'];
								}
							}
					}
				?>

			
			<?php if($status == ''){ ?>


				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Registration</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span></span></li>
							</ol>
							
							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

						</div>
					</header>
		
					<!-- start: page -->
					
						<div class="row">
							<div class="col-xs-12">
								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<!-- <a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a> -->
										</div>
						
										<h2 class="panel-title">Registration for one day fitness or membership</h2>
									</header>
									<div class="panel-body">
										<div class="wizard-progress wizard-progress-lg">
											<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
											<ul class="wizard-steps">
												<li class="active text-a">
													<a href="#w4-account" data-toggle="tab"><span>1</span>Account Info</a>
												</li>
												<li>
													<a href="#w4-profile" data-toggle="tab"><span>2</span>Physical Fitness Info</a>
												</li>
												<li>
													<a href="#w4-billing" data-toggle="tab"><span>3</span>Billing Info</a>
												</li>
												<li>
													<a href="#w4-confirm" data-toggle="tab"><span>4</span>Confirmation</a>
												</li>
											</ul>
										</div>	
										
										
							
										<!-- <form onsubmit="return Validate(this);">
										  File: <input type="file" name="file" onchange="return Validate(this);" />

										  <br>
										  <input type="submit" value="Submit" />
										</form>

										 <center><span id="message"></span></center> -->

			
										<form id="form1" onsubmit="return Validate(this);" name="form1"  class="form-horizontal" novalidate="novalidate"  enctype="multipart/form-data" method="POST">
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
													
													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="date_of_birth">Date of Birth</label>
														<div class="col-md-6">
															<input type="date" class="form-control" name="date_of_birth" id="date_of_birth"   onblur="getAge();" value="" required >
															<span id="message"></span>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="age">Age</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="age" id="age" placeholder="Required age 18 and above"   maxlength="2" readonly  required>
															
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="gender">Gender</label>
														<div class="col-md-6">
														 <select type="text" name="gender" class="form-control dropdown " id="gender" value=""  required="">
															<option></option>
														    <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
														    <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
													    </select>
														</div>
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="height">Height</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="height" id="height" placeholder="Enter height in cm"  maxlength="6" value="" required >
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="weight">Weight</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight in kg"  maxlength="6"  value="" required >
														</div>
													</div>

													<hr class="separator">
												
													<!-- <div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Region</label>
														<div class="col-md-6">
															<select type="text" name="region"  id="region"  class="form-control" value=""  required="required">
																<option></option>
																<option value="Metro Manila">Metro Manila</option>
																<option value="Mindanao">Mindanao</option>
																<option value="North Luzon">North Luzon</option>
																<option value="Central Luzon">Central Luzon</option>
																<option value="South Luzon">South Luzon</option>
																<option value="Visayas">Visayas</option>
													    </select>
														</div>
													</div> -->

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Region</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="region" id="region" placeholder="Enter region here"  maxlength="50"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">House No.</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="house_no" id="house_no" placeholder="Enter house #"  maxlength="50"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Street Name</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="street_name" id="street_name" placeholder="Enter street name"  maxlength="50"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Province</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="province" id="province" placeholder="Ex: Bulacan"  maxlength="50"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">City</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="city" id="city" placeholder="Ex: Malolos"  maxlength="50"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Barangay</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="barangay" id="barangay" placeholder="Ex: Atlag"  maxlength="50"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Postal Code</label>
														<div class="col-md-6">
															<input type="text" maxlength="4" class="form-control" name="postal_code" id="postal_code" placeholder="Ex: 3000"  maxlength="6"  value="" required >
															<!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
														</div>
													</div>

													


													<!-- <div class="form-group">
														<label class="col-md-3 control-label" for="address">Address</label>
														<div class="col-md-6">
															<textarea type="text" class="form-control" name="address" id="address" placeholder="Enter address"  maxlength="200" value="" required></textarea>
														</div>
													</div>	 -->

													<hr class="separator">
													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="contact">Phone Number</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="contact" id="contact" placeholder="09*********"  maxlength="11"  value="" required>
														</div>
													</div>
			
													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="type">Client Type</label>
														<div class="col-md-6">
														
														 <select type="text" name="client_type_reg"   id="client_type_reg"  class="form-control" onchange="student_screenshot(this.value)" value=""  required="required">
														<option></option>
														 	<!-- <option></option> -->
														 	  <option  value="NON-STUDENT" <?php echo isset($type) && $type == 'NON-STUDENT' ? 'selected' : '' ?>>NON-STUDENT</option>
														    <option  value="STUDENT" <?php echo isset($type) && $type == 'STUDENT' ? 'selected' : '' ?>>STUDENT</option>
														  
													    </select>
														</div>
													</div>

													<div class="form-group">
	                                            
	                                                	<div id="student_screemtshot_file">

	                                           			</div>
	                                       			</div>
												</div>

												<div id="w4-profile" class="tab-pane">

													<div class="form-group">
														<!-- <label class="col-md-3 control-label" for="gender">Walk in(YES) is only for 1 day</label> -->
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="gender">Only for 1 day?</label>
														<div class="col-md-6">
														 <select type="text" id="walk_in_reg"  name="walk_in_reg" class="form-control dropdown" onchange="walkInInfoReg(this.value)" required="">
														 	<option></option>
														    <option value="YES" <?php echo isset($walk_in) && $walk_in == 'YES' ? 'selected' : '' ?>>YES</option>
														    <option value="NO" <?php echo isset($walk_in) && $walk_in == 'NO' ? 'selected' : '' ?>>NO</option>
													    </select>
														</div>
													</div>

													<div class="form-group">
	                                            
	                                                	<div id="walk_in_info_reg">

	                                           			</div>
	                                       			</div>

													<div class="form-group">
	                                            
	                                                	<div id="fitness_info_reg">

	                                           			</div>
	                                       			</div>

	                                       			<div class="form-group">
	                                            
	                                                	<div id="walk_in_info2_reg">

	                                           			</div>
	                                       			</div>

	                                       			<div class="form-group">
	                                            
	                                                	<div id="fitness_info2_reg">

	                                           			</div>
	                                       			</div>
												</div>

												<div id="w4-billing" class="tab-pane">
													<?php 
													    $query = "SELECT * FROM `settings` WHERE setting_id = '140' ";
														$result = mysqli_query($con, $query);

													    if(mysqli_num_rows($result)){
															$row = mysqli_fetch_assoc($result);
														}
												    ?>
													<div class="form-group">
														<label class="col-md-6 control-label text-semibold text-dark text-uppercase" for="w4-cc">HMG Business Gcash Number: </label>
														<div class="col-md-6">
															<label class=" control-label" for="w4-cc"><?php echo isset($row['p_one']) ? $row['p_one']: '' ?></label>
														</div>

														<label class="col-md-6 control-label text-semibold text-dark text-uppercase" for="w4-cc">Name: </label>
														<div class="col-md-6">
															<label class=" control-label" for="w4-cc"><?php echo isset($row['p_two']) ? $row['p_two']: '' ?></label>
														</div>
													</div>

													<div class="form-group">
													    <label class="col-md-6 control-label text-semibold text-dark text-uppercase" for="w4-cc">Screenshot of payment: </label>
															<div class="col-md-6">

								                                <div class="fileupload fileupload-new" data-provides="fileupload">
								                                     <div class="input-append">
								                                        <div class="uneditable-input">
								                                           <i class="fa fa-file fileupload-exists"></i>
								                                            <span class="fileupload-preview"></span>
								                                        </div>
								                                            <span class="btn btn-default btn-file">
								                                            <span class="fileupload-exists">Change</span>
								                                            <span class="fileupload-new">Select file</span>
								                                            <input type="file" accept="image/*" id="screenshot_payment_file"  name="screenshot_payment_file" onchange="displayImgPayment(this,$(this))" required/>
								                                            </span>
								                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								                                          </div>
								                                        </div>
                                      
																		<!-- <input type="file" class=" control-label" name="screenshot_payment_file" id="screenshot_payment_file" accept="image/*" required> -->
																	</div>
																</div>		

																 <div class="form-group">
							                                        <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Image</label>
							                                        <div class="col-md-6">
							                                          <img  id="img_payment" class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; min-height: 100%;">
							                                          <span id="message_image"></span>
							                                        </div>
							                                    </div>

												</div>

												<div id="w4-confirm" class="tab-pane">
													    <?php 
													    	$query = "SELECT * FROM `settings` WHERE setting_id = '141' ";
													    	$result = mysqli_query($con, $query);

													    	if(mysqli_num_rows($result)){
													    		$row = mysqli_fetch_assoc($result);
													    	}
													     ?>
															<h3><?php echo isset($row['p_one']) ? $row['p_one']: '' ?></h3>
															<h4><?php echo isset($row['p_two']) ? $row['p_two']: '' ?></h4>
															<br>
															<p><?php echo isset($row['p_three']) ? $row['p_three']: '' ?></p>
															<br>
															<p><?php echo isset($row['p_four']) ? $row['p_four']: '' ?></p>
															<br>
															<p><?php echo isset($row['p_five']) ? $row['p_five']: '' ?></p>
															<br>
															<p><?php echo isset($row['p_six']) ? $row['p_six']: '' ?></p>
														
													<div class="form-group">
														<div class="col-sm-3"></div>
														<div class="col-sm-9">
															<div class="checkbox-custom">
																<input type="checkbox" name="terms" id="w4-terms" required>
																<label for="w4-terms">I agree to the terms of service</label>
																<br>
																<center><input type="submit" class="mb-xs mt-xs mr-xs btn btn-success pull-right" name="submit" value="Finish" style="font-size: 20px"></center>	

															</div>
														</div>
													</div>
												</div>
											</div>

												<div class="panel-footer">
													<ul class="pager">
														<li class="previous disabled"  >
															<a ><i class="fa fa-angle-left"></i> Previous</a>
														</li>
														<li class="finish hidden pull-right">
															<!-- <input type="submit" name="submit" value="submit"> -->
														<!-- 	<a type="Subtmit" name="submit">Finish</a> -->
														</li>
														<li class="next" >
															<a >Next <i class="fa fa-angle-right"></i></a>
														</li>
													</ul>
												</div>

										</form>
									</div>
								<!-- 	<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled"  >
												<a ><i class="fa fa-angle-left"></i> Previous</a>
											</li>
											<li class="finish hidden pull-right">
												<input type="submit" name="submit" id="submit" value="Finish">
											</li>
											<li class="next" >
												<a >Next <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div> -->
								</section>
							</div>
						</div>

					<!-- end: page -->
					
				</section>				 	
			<?php }else{ ?>
				<section role="main" class="content-body" >
					<header class="page-header" >
						<h2>Renewal/Add More</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span></span></li>
							</ol>
							
							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

						</div>
					</header>

					
					<!-- start: page -->
					
						<div class="row">
							<div class="col-xs-12">
								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<!-- <a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a> -->
										</div>
						
										<h2 class="panel-title">Renewal/Add More</h2>
									</header>

									<?php if($status == 'pending'){ ?>

											<div class="form-group">			
												<center>
													<h4>Your registration has not yet been approved</h4>
												</center>
							
											</div>

									<?php }else{ ?>

												<div class="panel-body">
													<div class="wizard-progress wizard-progress-lg">
														<div class="steps-progress">
															<div class="progress-indicator"></div>
														</div>
														<ul class="wizard-steps">
															<li class="active text-a">
																<a href="#w4-account" data-toggle="tab"><span>1</span>Account Info</a>
															</li>
															<li>
																<a href="#w4-profile" data-toggle="tab"><span>2</span>Physical Fitness Info</a>
															</li>
															<li>
																<a href="#w4-billing" data-toggle="tab"><span>3</span>Billing Info</a>
															</li>
															<li>
																<a href="#w4-confirm" data-toggle="tab"><span>4</span>Confirmation</a>
															</li>
														</ul>
													</div>	
													
													
						
													<form id="form1" onsubmit="return validateRenew(this);" name="form1"  class="form-horizontal" novalidate="novalidate"  enctype="multipart/form-data" method="POST">
														<div class="tab-content">
															<div id="w4-account" class="tab-pane active">
				
																
														
															<div class="form-group">
																	<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="type">Client Type</label>
																	<div class="col-md-6">
																	
																	 <select type="text" name="client_type"   id="client_type"  class="form-control" onchange="student_screenshot(this.value)" value=""  required="required">
																	<option></option>
																	 	<!-- <option></option> -->
																	 	  <option  value="NON-STUDENT" <?php echo isset($type) && $type == 'NON-STUDENT' ? 'selected' : '' ?>>NON-STUDENT</option>
																	    <option  value="STUDENT" <?php echo isset($type) && $type == 'STUDENT' ? 'selected' : '' ?>>STUDENT</option>
																	  
																    </select>
																	</div>
																</div>



																<div class="form-group">
				                                            
				                                                	<div id="student_screemtshot_file">

				                                           			</div>
				                                       			</div>

																
															</div>



															<div id="w4-profile" class="tab-pane">

																<div class="form-group">
																	<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="gender">Only for 1 day?</label>
																	<div class="col-md-6">
																	 <select type="text" id="walk_in"  name="walk_in" class="form-control dropdown" onchange="walkInInfo(this.value)" required="">
																	 	<option></option>
																	    <option value="YES" <?php echo isset($walk_in) && $walk_in == 'YES' ? 'selected' : '' ?>>YES</option>
																	    <option value="NO" <?php echo isset($walk_in) && $walk_in == 'NO' ? 'selected' : '' ?>>NO</option>
																    </select>
																	</div>
																</div>

																<div class="form-group">
				                                            
				                                                	<div id="walk_in_info">

				                                           			</div>
				                                       			</div>

																<div class="form-group">
				                                            
				                                                	<div id="fitness_info">

				                                           			</div>
				                                       			</div>

				                                       			<div class="form-group">
				                                            
				                                                	<div id="walk_in_info2">

				                                           			</div>
				                                       			</div>

				                                       			<div class="form-group">
				                                            
				                                                	<div id="fitness_info2">

				                                           			</div>
				                                       			</div>

															</div>

															<div id="w4-billing" class="tab-pane">
																<?php 
																    $query = "SELECT * FROM `settings` WHERE setting_id = '140' ";
																	$result = mysqli_query($con, $query);

																    if(mysqli_num_rows($result)){
																		$row = mysqli_fetch_assoc($result);
																	}
															    ?>
																<div class="form-group">
																	<label class="col-md-6 control-label text-semibold text-dark text-uppercase" for="w4-cc">HMG Business Gcash Number: </label>
																	<div class="col-md-6">
																		<label class=" control-label " for="w4-cc"><?php echo isset($row['p_one']) ? $row['p_one']: '' ?></label>
																	</div>

																	<label class="col-md-6 control-label text-semibold text-dark text-uppercase" for="w4-cc">Name: </label>
																	<div class="col-md-6">
																		<label class=" control-label " for="w4-cc"><?php echo isset($row['p_two']) ? $row['p_two']: '' ?></label>
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-md-6 control-label text-semibold text-dark text-uppercase" for="w4-cc">Screenshot of payment: </label>
																	<div class="col-md-6">

								                                        <div class="fileupload fileupload-new" data-provides="fileupload">
								                                          <div class="input-append">
								                                            <div class="uneditable-input">
								                                              <i class="fa fa-file fileupload-exists"></i>
								                                              <span class="fileupload-preview"></span>
								                                            </div>
								                                            <span class="btn btn-default btn-file">
								                                              <span class="fileupload-exists">Change</span>
								                                              <span class="fileupload-new">Select file</span>
								                                              <input type="file" accept="image/*" id="screenshot_payment_file"  name="screenshot_payment_file" onchange="displayImgPayment(this,$(this))" required />
								                                            </span>
								                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								                                          </div>
								                                        </div>
                                      
																		<!-- <input type="file" class=" control-label" name="screenshot_payment_file" id="screenshot_payment_file" accept="image/*" required> -->
																	</div>
																</div>		

																 <div class="form-group">
							                                        <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Image</label>
							                                        <div class="col-md-6">

							                                          <img  id="img_payment" class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; min-height: 100%;">
							                                          <span id="message_image"></span>
							          

							                                        </div>
							                                    </div>

		
															</div>



															<div id="w4-confirm" class="tab-pane">
																 <?php 
															    	$query = "SELECT * FROM `settings` WHERE setting_id = '141' ";
															    	$result = mysqli_query($con, $query);

															    	if(mysqli_num_rows($result)){
															    		$row = mysqli_fetch_assoc($result);
															    	}
															     ?>
																	<h3><?php echo isset($row['p_one']) ? $row['p_one']: '' ?></h3>
																	<h4><?php echo isset($row['p_two']) ? $row['p_two']: '' ?></h4>
																	<br>
																	<p><?php echo isset($row['p_three']) ? $row['p_three']: '' ?></p>
																	<br>
																	<p><?php echo isset($row['p_four']) ? $row['p_four']: '' ?></p>
																	<br>
																	<p><?php echo isset($row['p_five']) ? $row['p_five']: '' ?></p>
																	<br>
																	<p><?php echo isset($row['p_six']) ? $row['p_six']: '' ?></p>
																

																<div class="form-group">
																	<div class="col-sm-3"></div>
																	<div class="col-sm-9">
																		<div class="checkbox-custom">
																			<input type="checkbox" name="terms" id="w4-terms" required>
																			<label for="w4-terms">I agree to the terms of service</label>
																			<br>
																			<center><input type="submit" class="mb-xs mt-xs mr-xs btn btn-success pull-right" name="submit_renew" value="Finish" style="font-size: 20px"></center>	

																		</div>
																	</div>
																</div>
															</div>
														</div>

															<div class="panel-footer">
																<ul class="pager">
																	<li class="previous disabled"  >
																		<a ><i class="fa fa-angle-left"></i> Previous</a>
																	</li>
																	<li class="finish hidden pull-right">
																		<!-- <input type="submit" name="submit" value="submit"> -->
																	<!-- 	<a type="Subtmit" name="submit">Finish</a> -->
																	</li>
																	<li class="next" >
																		<a >Next <i class="fa fa-angle-right"></i></a>
																	</li>
																</ul>
															</div>

													</form>
												</div>

									<?php } ?>
								<!-- 	<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled"  >
												<a ><i class="fa fa-angle-left"></i> Previous</a>
											</li>
											<li class="finish hidden pull-right">
												<input type="submit" name="submit" id="submit" value="Finish">
											</li>
											<li class="next" >
												<a >Next <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div> -->
								</section>
							</div>
						</div>

					<!-- end: page -->

				</section>	
			   		    	
				<?php } ?>
																 
			
			</div>



		</section>

<!-- Vendor -->
		<script src="../admin/assets/vendor/jquery/jquery.js"></script>
		<script src="../admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../admin/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../admin/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="../admin/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>

		<script src="../admin/assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
	<!-- 	<script src="../admin/assets/javascripts/theme.js"></script> -->
		
		<!-- Theme Custom -->
		<script src="../admin/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../admin/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../admin/assets/javascripts/forms/examples.wizard.js"></script>
	



<?php include('footer.php'); ?>



<script type="text/javascript">

$(document).ready(function () {
  $('#height').mask('00000.00', { reverse: true });
});

function getAge(){

	console.log(age);

    var dob = document.getElementById('date_of_birth').value;
    // var dob = document.getElementsByClassName("date_of_birth")[0].value;

    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

    if(age >= 18 ){
    	document.getElementById('age').value=age;
    	document.getElementById('message').innerHTML = '';
    }else{
    	document.getElementById('age').value = '';
    	document.getElementById('message').style.color = 'red';
    	document.getElementById('message').innerHTML = 'Required age 18 and above!';
    }



}

  function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


	
	function displayImgPayment(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_payment').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


	var check = function() {

	      if (document.getElementById('password').value === document.getElementById('cpassword').value) {
	          document.getElementById('message').style.color = 'green';
	          document.getElementById('message').innerHTML = 'Password Match';
	      } else {
	          document.getElementById('message').style.color = 'red';
	          document.getElementById('message').innerHTML = 'Password dont Match';
	      }

	      if (document.getElementById('password').value == '') {
	          document.getElementById('message').style.color = 'blue';
	          document.getElementById('message').innerHTML = 'Input Password';
	      }

	      if (document.getElementById('cpassword').value == '') {
	          document.getElementById('message').style.color = 'blue';
	          document.getElementById('message').innerHTML = 'Input Confirm Password';
	      }
    }

    
 
    // Restricts input for the given textbox to the given inputFilter function.
	function setInputFilter(textbox, inputFilter) {
	  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
	    textbox.addEventListener(event, function() {
	      if (inputFilter(this.value)) {
	        this.oldValue = this.value;
	        this.oldSelectionStart = this.selectionStart;
	        this.oldSelectionEnd = this.selectionEnd;
	      } else if (this.hasOwnProperty("oldValue")) {
	        this.value = this.oldValue;
	        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
	      } else {
	        this.value = "";
	      }
	    });
	  });
	}

	setInputFilter(document.getElementById("age"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	setInputFilter(document.getElementById("height"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});


	setInputFilter(document.getElementById("weight"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	setInputFilter(document.getElementById("contact"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	setInputFilter(document.getElementById("house_no"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	setInputFilter(document.getElementById("postal_code"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	function checkFileUploadExt(fieldObj) {
	  var control = document.getElementById("uploadFiles");
	  var filelength = control.files.length;

	  for (var i = 0; i < control.files.length; i++) {
	    var file = control.files[i];
	    var FileName = file.name;
	    var FileExt = FileName.substr(FileName.lastIndexOf('.') + 1);
	    if ((FileExt.toUpperCase() != "PDF")) {
	      var error = "File type : " + FileExt + "\n\n";
	      error += "Invalid extension format .\n\n";
	      document.getElementById('message').innerHTML = error;
	      console.error(error);
	    }
	  }
	}

	 	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
		function Validate(oForm) {
		    var arrInputs = oForm.getElementsByTagName("input");

		    for (var i = 0; i < arrInputs.length; i++) {
		        var oInput = arrInputs[i];
		        if (oInput.type == "file") {
		            var sFileName = oInput.value;
		            if (sFileName.length > 0) {
		                var blnValid = false;
		                for (var j = 0; j < _validFileExtensions.length; j++) {
		                    var sCurExtension = _validFileExtensions[j];
		                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
		                        blnValid = true;
		                        break;
		                    }
		                }
		                
		                if (!blnValid) {

		                    //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

		                    // document.getElementById('message').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

		                    //  alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
		                    // return false;
		                      Swal.fire({
								          icon: 'error',
								          title: 'Invalid extension!',
								          text: "Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ")
							}).then((result) => {

							})

		                    return false;
		                }
		            }
		        }
		    }
		  
		    return true;
		}


		var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
		function validateRenew(oForm) {
			Console.log('NOT ALLOWEED');
		    var arrInputs = oForm.getElementsByTagName("input");

		    for (var i = 0; i < arrInputs.length; i++) {
		        var oInput = arrInputs[i];
		        if (oInput.type == "file") {
		            var sFileName = oInput.value;
		            if (sFileName.length > 0) {
		                var blnValid = false;
		                for (var j = 0; j < _validFileExtensions.length; j++) {
		                    var sCurExtension = _validFileExtensions[j];
		                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
		                        blnValid = true;
		                        break;
		                    }
		                }
		                
		                if (!blnValid) {

		                    //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

		                    // document.getElementById('message').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

		                    //  alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
		                    // return false;
		                      Swal.fire({
								          icon: 'error',
								          title: 'Invalid extension!',
								          text: "Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ")
							}).then((result) => {

							})

		                    return false;
		                }
		            }
		        }
		    }
		  
		    return true;
		}


	 	 function student_screenshot(str){
                 
            if(str == ""){

                 document.getElementById("student_screemtshot_file").innerHTML = "";
                return;

            }else if(str=="NON-STUDENT"){

            	 document.getElementById("student_screemtshot_file").innerHTML = "";

                if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                    
                xmlhttp.onreadystatechange = function() {
	                if (this.readyState == 4 && this.status == 200) {
	                     document.getElementById("student_screemtshot_file").innerHTML=this.responseText;
	                    }
                };
                    
                xmlhttp.open("GET","client_ajax.php?action=non_student_packages",true);
                xmlhttp.send();  

            }else{

            	 document.getElementById("student_screemtshot_file").innerHTML = "";

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                }
                    
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("student_screemtshot_file").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","client_ajax.php?action=student_screenshot",true);
                xmlhttp.send();    
            }
                
        }
        //End

	 	// function student_screenshot(str){
                 
   //          if(str==""){

   //              document.getElementById("package_details").innerHTML = "";
   //              return;

   //          }else if(str=="NON-STUDENT"){

   //              document.getElementById("package_details").innerHTML = "";
   //              return;

   //          }else{

   //              if (window.XMLHttpRequest) {
   //                  //code for IE7+, Firefox, Chrome, Opera, Safari
   //                  xmlhttp = new XMLHttpRequest();
   //              }
                    
   //              xmlhttp.onreadystatechange = function() {
	  //               if (this.readyState == 4 && this.status == 200) {
	  //                   document.getElementById("package_details").innerHTML=this.responseText;
	  //               }
   //              };
                    
   //              xmlhttp.open("GET","client_ajax.php?action=student_screenshot",true);
   //              xmlhttp.send();    
   //          }
   //      }

        //========Start Registration
         function walkInInfoReg(str){

            if(str == ""){

                document.getElementById("walk_in_info_reg").innerHTML = "";
                document.getElementById("walk_in_info2_reg").innerHTML = "";
                document.getElementById("fitness_info_reg").innerHTML = "";
                document.getElementById("fitness_info2_reg").innerHTML = "";
                return;

            }else if(str == "YES"){

                document.getElementById("walk_in_info_reg").innerHTML = "";
                document.getElementById("walk_in_info2_reg").innerHTML = "";
                document.getElementById("fitness_info_reg").innerHTML = "";
                document.getElementById("fitness_info2_reg").innerHTML = "";

                if (window.XMLHttpRequest) {
                   //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    	document.getElementById("walk_in_info_reg").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","walk_in_info.php?value="+str, true);
                xmlhttp.send();  

            }else{

                document.getElementById("walk_in_info_reg").innerHTML = "";
                document.getElementById("walk_in_info2_reg").innerHTML = "";
                document.getElementById("fitness_info_reg").innerHTML = "";
                document.getElementById("fitness_info2_reg").innerHTML = "";

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("walk_in_info_reg").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","walk_in_info.php?value="+str, true);
                xmlhttp.send();  
            }
        }
        //End

         function walkInInfo2Reg(str){

            var client_type =$('#client_type_reg').val();

            if(str == ""){

                document.getElementById("walk_in_info_reg").innerHTML = "";
                document.getElementById("walk_in_info2_reg").innerHTML = "";
                document.getElementById("fitness_info_reg").innerHTML = "";
                document.getElementById("fitness_info2_reg").innerHTML = "";
                return;

            }else{
                    
                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("walk_in_info2_reg").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","walk_in_info2.php?value="+str+client_type, true);
                xmlhttp.send();    
            }
        }
        //End

         function fitnessInfoReg(str){
                 
            if(str==""){

                document.getElementById("fitness_info_reg").innerHTML = "";
                document.getElementById("fitness_info2_reg").innerHTML = "";
                return;

            }else{

                document.getElementById("fitness_info_reg").innerHTML = "";
                document.getElementById("fitness_info2_reg").innerHTML = "";

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("fitness_info_reg").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","fitness_info.php?value="+str, true);
                xmlhttp.send();    
            }
        }
        //End

         function fitnessInfo2Reg(str){

            var client_type =$('#client_type_reg').val();

            if(str==""){

                document.getElementById("fitness_info2_reg").innerHTML = "";
                return;

            }else{

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("fitness_info2_reg").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","fitness_info2.php?value="+str+client_type, true);
                xmlhttp.send();    
            }
        }
        //End
    //===========End Registration

    //===========Start Add/Renew
        function walkInInfo(str){

            if(str == ""){

                document.getElementById("walk_in_info").innerHTML = "";
                document.getElementById("walk_in_info2").innerHTML = "";
                document.getElementById("fitness_info").innerHTML = "";
                document.getElementById("fitness_info2").innerHTML = "";
                return;

            }else if(str == "YES"){

                document.getElementById("walk_in_info").innerHTML = "";
                document.getElementById("walk_in_info2").innerHTML = "";
                document.getElementById("fitness_info").innerHTML = "";
                document.getElementById("fitness_info2").innerHTML = "";

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("walk_in_info").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","walk_in_info.php?value="+str, true);
                xmlhttp.send();  

            }else{

                document.getElementById("walk_in_info").innerHTML = "";
                document.getElementById("walk_in_info2").innerHTML = "";
                document.getElementById("fitness_info").innerHTML = "";
                document.getElementById("fitness_info2").innerHTML = "";

                if (window.XMLHttpRequest) {
                   //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("walk_in_info").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","walk_in_info.php?value="+str, true);
                xmlhttp.send();  
            }
        }
        //End

        function walkInInfo2(str){

            var client_type =$('#client_type').val();

            if(str == ""){

                document.getElementById("walk_in_info").innerHTML = "";
                document.getElementById("walk_in_info2").innerHTML = "";
                document.getElementById("fitness_info").innerHTML = "";
                document.getElementById("fitness_info2").innerHTML = "";
                return;

            }else{

                if (window.XMLHttpRequest) {
                   //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("walk_in_info2").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","walk_in_info2.php?value="+str+client_type, true);
                xmlhttp.send();    
            }
        }
        //End

        function fitnessInfo(str){
                 
            if(str==""){

                document.getElementById("fitness_info").innerHTML = "";
                document.getElementById("fitness_info2").innerHTML = "";
                return;

            }else{
                	
                document.getElementById("fitness_info").innerHTML = "";
                document.getElementById("fitness_info2").innerHTML = "";

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("fitness_info").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","fitness_info.php?value="+str, true);
                xmlhttp.send();    
            }
        }
        //End

        function fitnessInfo2(str){

            var client_type =$('#client_type').val();

            if(str==""){

                document.getElementById("fitness_info2").innerHTML = "";
                return;

            }else{
            	
                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("fitness_info2").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","fitness_info2.php?value="+str+client_type, true);
                xmlhttp.send();    
            }
        }
        //End
        //===========End Add/Renew
</script>
