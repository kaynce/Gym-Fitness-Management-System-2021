<?php 
if (session_status() === PHP_SESSION_NONE){ 
 	session_start(); 
 }
ini_set('display_errors', 1);
Class Action {

	private $db;

	public function __construct() {
		ob_start();

   	require('../admin/assets/db_connect.php');
    
    $this->db = $con;

	}

	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function client_login_action(){

		$email = mysqli_real_escape_string($this->db, $_POST['email']);
		$password = mysqli_real_escape_string($this->db, md5(trim($_POST['password'])));

		$query = "SELECT * FROM `pending_members` WHERE email='$email' AND password='$password'";
		$result = mysqli_query($this->db, $query);

		if (mysqli_num_rows($result) == 1) {	

			$row = mysqli_fetch_assoc($result);

			//Get the email status
			$query_email_status = "SELECT * FROM `verified_email` WHERE email = '$email' ";
		    $result_email_status = mysqli_query($this->db, $query_email_status);
		    $row_email_status = mysqli_fetch_assoc($result_email_status);

			$verify_status_db = $row_email_status['status'];
			
			//Login Successfully
			if($verify_status_db == '1'){

				$_SESSION['id'] = $row['id'];
				$_SESSION['reg_email'] = $row['email'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['loading'] = 'loading';

				return 1;
			}else{
				//Need to verify the email
				$_SESSION['reg_email'] = $email;

				return 2;
			}
		}else{

			//If there is no account in pending members then go to members table
			$query = "SELECT * FROM `members` WHERE email='$email' AND password='$password' ";
			$result = mysqli_query($this->db, $query);

			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);

				//Archived by the admin
				if($row['status'] == 'archived'){
					return 3;
				}else{
					//Login Successfully
					$_SESSION['id'] = $row['id'];
					$_SESSION['member_id'] = $row['member_id'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['loading'] = 'loading';
					
					return 1;
				}
			}else{
				//Incorrect Username or Password
				return 4;
			}
		}
	}
	//End

	function to_notification(){

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

			mysqli_query($this->db, $query);

	}
	//End


	function address_action(){

		// Get province id through province name

		$regionID = $_POST['regionID'];

		if (!empty($regionID)) {
			// Fetch province name base on province id
			$query = "SELECT * FROM province WHERE province_id = {$regionID}";

			$result = $this->db->query($query);

			if ($result->num_rows > 0) {
				echo '<option value=""></option>'; 
				while ($row = $result->fetch_assoc()) {
					echo '<option value="'.$row['province_id'].'">'.$row['province_name'].'</option>'; 
				}
			}else{
				echo '<option value=""></option>'; 
			}

		}else if (!empty($_POST['provinceid'])) {
			$provinceid = $_POST['provinceid']; 
			// Fetch city name base on city id

			$query = "SELECT * FROM city WHERE city_id = {$provinceid}";

			$result = $this->db->query($query);

			if ($result->num_rows > 0) {
				echo '<option value=""></option>'; 
				while ($row = $result->fetch_assoc()) {
					 echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>'; 
				}
			}else{
				echo '<option value=""></option>'; 
			}
		}


	}
	//End

	function client_reg_info_action(){

		$age = '';
		$gender = '';
		$date_of_birth = '';
		$height = '';
		$weight = '';
		$region = '';
		$house_no = '';
		$street_name = '';
		$province = '';
		$city = '';
		$barangay = '';
		$postal_code = '';
		$contact = '';
		if (isset($_POST['age'])){ $age = mysqli_real_escape_string($this->db, $_POST['age']);}
		if (isset($_POST['gender'])){ $gender = mysqli_real_escape_string($this->db, $_POST['gender']);}
		if (isset($_POST['date_of_birth'])){ $date_of_birth = mysqli_real_escape_string($this->db, $_POST['date_of_birth']);}
		if (isset($_POST['height'])){ $height = mysqli_real_escape_string($this->db, $_POST['height']);}
		if (isset($_POST['weight'])){ $weight = mysqli_real_escape_string($this->db, $_POST['weight']);}
		if (isset($_POST['region'])){ $region = mysqli_real_escape_string($this->db, $_POST['region']);}
		if (isset($_POST['house_no'])){ $house_no = mysqli_real_escape_string($this->db, $_POST['house_no']);}
		if (isset($_POST['street_name'])){ $street_name = mysqli_real_escape_string($this->db, $_POST['street_name']);}
		if (isset($_POST['province'])){ $province = mysqli_real_escape_string($this->db, $_POST['province']);}
		if (isset($_POST['city'])){ $city = mysqli_real_escape_string($this->db, $_POST['city']);}
		if (isset($_POST['barangay'])){ $barangay = mysqli_real_escape_string($this->db, $_POST['barangay']);}
		if (isset($_POST['postal_code'])){ $postal_code = mysqli_real_escape_string($this->db, $_POST['postal_code']);}
		if (isset($_POST['contact'])){ $contact = mysqli_real_escape_string($this->db, $_POST['contact']);}

		$email = $_SESSION['email'];
		$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
		$result = mysqli_query($this->db, $query);

		if (mysqli_num_rows($result) == 1) {	
			$row = mysqli_fetch_assoc($result);

			$password = $row['password'];
			$lastname = $row['lastname'];
			$firstname = $row['firstname'];
			$email = $row['email'];
			$verify_status = $row['verify_status'];
		}

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

				# code...
				#if there is no error occurred while uploading
			if ($error_screenshot_id === 0 || $error_screenshot_payment === 0 ) {

			 	if($img_screenshot_id_size > 10000  || $img_screenshot_payment_size > 10000  ){ 
			 		#error message 
				 	//$msg = "Sorry, your file is too large!";
				 	return 4;
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

						$physical_fitness = $_POST['physical_fitness'];
						if (isset($_POST['physical_fitness'])) {
							$physical_fitness = $_POST['physical_fitness'];

							//-----------get the name of the package from db
							$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness'";
							$result_tc  = mysqli_query($this->db, $query_tc);
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
							$result_tc  = mysqli_query($this->db, $query_tc);
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

			 			$to_notif = new Action();
						$to_notif->to_notification();

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
								mysqli_query($this->db, $query);
								return 1;
								//If the admin approve the registration then the data of enroll will send to enrolls_to table
							}
						

			 		}else{
			 			#error message 
			 			return 2;
			 			//$error = "You can't upload this type of file(image)!";


			 		}

			 	}

			} else {
			 	#error message 
			 	//$msg = "unknown error occurred!";
				return 3;
				//$error="Something went wrong. Please try again";

			}
			
		}else{

			//Non-student
			# getting image data and store them in var
			$img_screenshot_payment_name = $_FILES['screenshot_payment_file']['name'];
			$img_screenshot_payment_size = $_FILES['screenshot_payment_file']['size'];
			$tmp_screenshot_payment_name = $_FILES['screenshot_payment_file']['tmp_name'];
			$error_screenshot_payment = $_FILES['screenshot_payment_file']['error'];

						#if there is no error occurred while uploading
					if ($error_screenshot_payment === 0 ) {
					 	if($img_screenshot_payment_size > 10000000  ){ 
					 		#error message 
						 	//$msg = "Sorry, your file is too large!";
					 		return 4;
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
	
									$physical_fitness = $_POST['physical_fitness'];
									if (isset($_POST['physical_fitness'])) {
										$physical_fitness = $_POST['physical_fitness'];

										//-----------get the name of the package from db
										$query_tc = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness'";
										$result_tc  = mysqli_query($this->db, $query_tc);
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

					 			$to_notif = new Action();
								$to_notif->to_notification();


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
										mysqli_query($this->db, $query);
										
										return 1;
										//If the admin approve the registration then the data of enroll will send to enrolls_to table
									}
								

					 		}else{
					 			#error message 
					 			//$error = "You can't upload this type of file(image)!";
					 			return 2;
					 		}

					 	}

					 } else {
					 	#error message 
					 	//$msg = "unknown error occurred!";

						//$error="Something went wrong. Please try again";
						return 3;

					 }

		}
			//End check screenshot id

	}
	//End

	function submit_renew_to_notification(){

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

		mysqli_query($this->db, $query);
	}
	//End

	function client_renew_action(){
		// ========== Start Renew Code ==========
			$email = $_SESSION['email'];
			$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
			$result = mysqli_query($this->db, $query);

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
							#if there is no error occurred while uploading
						if ($error_screenshot_id === 0 || $error_screenshot_payment === 0 ) {

						 	if($img_screenshot_id_size > 10000000  || $img_screenshot_payment_size > 10000000  ){ 
						 		#error message 
							 	//$msg = "Sorry, your file is too large!";

							 	return 4;
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
					$result = mysqli_query($this->db, $query);

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
						$result_tc  = mysqli_query($this->db, $query_tc);
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

						$result_start_date  = mysqli_query($this->db, $query_start_date);

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
						$result_start_date = mysqli_query($this->db, $query_start_date);

						$value = mysqli_fetch_row($result_start_date);

						if(mysqli_num_rows($result_start_date)<1){

							$query_start_date = "SELECT * FROM physical_fitness_walk_in_rates WHERE package_id = '$package'";
						    $result_start_date = mysqli_query($this->db, $query_start_date);
						    $value = mysqli_fetch_row($result_start_date);

						     // index in database
						    // $value[5]
						     if(!empty($value[5])){ 	
								 	//==================Start membership expiry date
									
									$day = $value[5];
									$result_start_date  = mysqli_query($this->db, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[5]." Days");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[6])) { 
						            //==================Start membership expiry date
									
									$week = $value[6];
									$result_start_date  = mysqli_query($this->db, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[6]." Weeks");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[7])) {  
						            //==================Start membership expiry date
									
									$month = $value[7];
									$result_start_date  = mysqli_query($this->db, $query_start_date);

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
									$result_start_date  = mysqli_query($this->db, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[5]." Days");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[6])) { 
						            //==================Start membership expiry date
									
									$week = $value[6];
									$result_start_date  = mysqli_query($this->db, $query_start_date);

									$value=mysqli_fetch_row($result_start_date);

						            $d=strtotime("+".$value[6]." Weeks");
						            //$cdate=date("Y-m-d"); //current date
						            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
						           //inserting into enrolls_to table of corresponding userid
						           // ================== End membership expiry date
						     }else if(!empty($value[7])) {  
						            //==================Start membership expiry date
									
									$month = $value[7];
									$result_start_date  = mysqli_query($this->db, $query_start_date);

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

					//Get the reference id
					$reference_id ='';
					if(isset($_POST['reference_id'])){
						$reference_id = $_POST['reference_id'];
					}

					$date = new DateTime();
					$date_created = $date->format('Y-m-d');

					// End qrcode

					$status = "0";
					$add_renew_status = "pending";
					
					$query = "INSERT INTO `enrolls_to` ( 
														member_id,
														reference_id, 
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
										    '$reference_id', 
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
										mysqli_query($this->db, $query);
										$_SESSION['done_add_renew'] = 'done_add_renew';

										$renew_notif = new Action();
										$renew_notif->submit_renew_to_notification();

										return 1;
										
									}
			//End
						 				
						 		}else{
						 			#error message 
						 			//$error = "You can't upload this type of file(image)!";
						 			return 2;

						 		}

						 	}

						 } else {
						 	#error message 
						 	//$msg = "unknown error occurred!";
						 	return 3;
							//$error="Something went wrong. Please try again";

						 }
			}else if(isset($_FILES['screenshot_payment_file'])) {
					# getting image data and store them in var
					$img_screenshot_payment_name = $_FILES['screenshot_payment_file']['name'];
					$img_screenshot_payment_size = $_FILES['screenshot_payment_file']['size'];
					$tmp_screenshot_payment_name = $_FILES['screenshot_payment_file']['tmp_name'];
					$error_screenshot_payment = $_FILES['screenshot_payment_file']['error'];

					//$firstname = $_POST['firstname'];

					// $password = $_POST['password'];
					// $cpassword = $_POST['cpassword'];

								#if there is no error occurred while uploading
							if ($error_screenshot_payment === 0 ) {
							 	if($img_screenshot_payment_size > 10000000  ){ 
							 		#error message 
								 	//$msg = "Sorry, your file is too large!";
									return 4;
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
						$result = mysqli_query($this->db, $query);

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
							$result_tc  = mysqli_query($this->db, $query_tc);
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
							$result_tc  = mysqli_query($this->db, $query_tc);
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

							$result_start_date  = mysqli_query($this->db, $query_start_date);

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
							$result_start_date = mysqli_query($this->db, $query_start_date);

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
										$result_start_date  = mysqli_query($this->db, $query_start_date);

										$value=mysqli_fetch_row($result_start_date);

							            $d=strtotime("+".$value[5]." Days");
							            //$cdate=date("Y-m-d"); //current date
							            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
							           //inserting into enrolls_to table of corresponding userid
							           // ================== End membership expiry date
							     }else if(!empty($value[6])) { 
							            //==================Start membership expiry date
										
										$week = $value[6];
										$result_start_date  = mysqli_query($this->db, $query_start_date);

										$value=mysqli_fetch_row($result_start_date);

							            $d=strtotime("+".$value[6]." Weeks");
							            //$cdate=date("Y-m-d"); //current date
							            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
							           //inserting into enrolls_to table of corresponding userid
							           // ================== End membership expiry date
							     }else if(!empty($value[7])) {  
							            //==================Start membership expiry date
										
										$month = $value[7];
										$result_start_date  = mysqli_query($this->db, $query_start_date);

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

						//Get the reference id
						$reference_id ='';
						if(isset($_POST['reference_id'])){
							$reference_id = $_POST['reference_id'];
						}

						$status = "0";
						$add_renew_status = "pending";

						$query = "INSERT INTO `enrolls_to` ( 
															member_id, 
															reference_id, 
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
												'$reference_id',
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
														mysqli_query($this->db, $query);
														$_SESSION['done_add_renew'] = 'done_add_renew';
														
														$renew_notif = new Action();
														$renew_notif->submit_renew_to_notification();

														return 1;
														
													}
				//End
							 		}else{
							 			#error message 
							 			//$error = "You can't upload this type of file(image)!";
							 			return 2;

							 		}

							 	}

							 } else {
							 	#error message 
							 	//$msg = "unknown error occurred!";

								//$error="Something went wrong. Please try again";
								return 3;

							 }
					//End else if

			}else{
					//Start Cash only

			           // Start
						$email = $_SESSION['email'];
						$query = "SELECT * FROM `members` WHERE email = '$email' ";
						$result = mysqli_query($this->db, $query);

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
							$result_tc  = mysqli_query($this->db, $query_tc);
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
							$result_tc  = mysqli_query($this->db, $query_tc);
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

							$result_start_date  = mysqli_query($this->db, $query_start_date);

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
							$result_start_date = mysqli_query($this->db, $query_start_date);

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
										$result_start_date  = mysqli_query($this->db, $query_start_date);

										$value=mysqli_fetch_row($result_start_date);

							            $d=strtotime("+".$value[5]." Days");
							            //$cdate=date("Y-m-d"); //current date
							            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
							           //inserting into enrolls_to table of corresponding userid
							           // ================== End membership expiry date
							     }else if(!empty($value[6])) { 
							            //==================Start membership expiry date
										
										$week = $value[6];
										$result_start_date  = mysqli_query($this->db, $query_start_date);

										$value=mysqli_fetch_row($result_start_date);

							            $d=strtotime("+".$value[6]." Weeks");
							            //$cdate=date("Y-m-d"); //current date
							            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
							           //inserting into enrolls_to table of corresponding userid
							           // ================== End membership expiry date
							     }else if(!empty($value[7])) {  
							            //==================Start membership expiry date
										
										$month = $value[7];
										$result_start_date  = mysqli_query($this->db, $query_start_date);

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

						//Get the reference id
						$reference_id ='';
						if(isset($_POST['reference_id'])){
							$reference_id = $_POST['reference_id'];
						}

						$status = "0";
						$add_renew_status = "pending";

						$query = "INSERT INTO `enrolls_to` ( 
															member_id, 
															reference_id, 
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
												'$reference_id',
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
					mysqli_query($this->db, $query);
					$_SESSION['done_add_renew'] = 'done_add_renew';
					
					$renew_notif = new Action();
					$renew_notif->submit_renew_to_notification();

					return 1;
					
				}
			}
			//End else check cash

		}

//End of isset id & email
// End Renew Code 
	//End

	function save_pending_client(){
		extract($_POST);
		$data = " firstname = '$firstname' ";
		$data .= ", lastname = '$lastname' ";
		$data .= ", age = '$age' ";
		$data .= ", gender = '$gender' ";
		$data .= ", date_of_birth = '$date_of_birth' ";
		$data .= ", height = '$height' ";
		$data .= ", weight = '$weight' ";
		$data .= ", address = '$address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", email = '$email' ";
		$data .= ", training_classes = '$training_classes' ";
		// $data .= ", client_type = '$client_type' ";
		// $data .= ", package = '$package' ";
		$data .= ", trainor = '$trainor' ";

		$data .= ", password = '".md5($password)."' ";

		$data .= ", status = 'pending' ";
		$data .= ", type = 'client' ";
	
 
		//if(empty($id)){
			$save = $this->db->query("INSERT INTO pending_members SET ".$data);
		//}
		// else{
		// 	$save = $this->db->query("UPDATE members set ".$data." where id = ".$id);
		// }

		if($save){
			return 1;
		}
	}

	function insert_new_client_action(){

		$firstname = mysqli_real_escape_string($this->db, trim($_POST['firstname']));
		$lastname = mysqli_real_escape_string($this->db, trim($_POST['lastname']));
		$email = mysqli_real_escape_string($this->db, trim($_POST['email']));
		$password = mysqli_real_escape_string($this->db, trim($_POST['password']));

		$verify_status = '0';

		$query = "SELECT * FROM `pending_members` WHERE email='$email'";
		$result = mysqli_query($this->db, $query);

		$same_email = '';

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$same_email = $row['email'];
		}else{
			$query = "SELECT * FROM `verified_email` WHERE email='$email'";
			$result = mysqli_query($this->db, $query);

			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				$same_email = $row['email'];
			}
		}

		if($email == $same_email){
			return 2;
		}else{
				
			$password = md5($password);
			$status = "";
			$query = "INSERT INTO `pending_members` (
										    firstname,
											lastname,
											email,
											password,
											status,
											verify_status)
							VALUES ('$firstname',
									'$lastname', 
									'$email', 
									'$password',
									'$status',  
									'$verify_status')";

			$result = mysqli_query($this->db, $query);
			
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
					
					$verification_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);

					// $member_id = substr(str_shuffle($numbers), 0, 5);

					//End creating employeeid

					$query = "SELECT * FROM `verified_email` WHERE verification_code='$verification_code'";			

					$result = mysqli_query($this->db , $query); 

					if (mysqli_num_rows($result) != 1) {
						 $foo = False;

						//  $query = "INSERT INTO `member_and_trainor_id` (unique_id)
						// 		VALUES ('$member_id')";

						// $result = mysqli_query($this->db, $query);

					}
				}

				//Reset code
				$foo = True;

				while($foo){

					//Start creating reset code
					$letters = '';
					$numbers = '';
					foreach (range('A', 'Z') as $char) {
					    $letters .= $char;
					}
					for($i = 0; $i < 10; $i++){
						$numbers .= $i;
					}
					
					$reset_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 2);

					// $member_id = substr(str_shuffle($numbers), 0, 5);

					//End creating reset code
					$query = "SELECT * FROM `verified_email` WHERE reset_code='$reset_code'";			

					$result = mysqli_query($this->db , $query); 

					if (mysqli_num_rows($result) != 1) {
						 $foo = False;

					}
				}
				
			$number_of_reset_password = 0;
			$status = 0;
			$query = "INSERT INTO `verified_email` (
										    email,
											verification_code,
											reset_code,
											number_of_reset_password,
											status)
							VALUES ('$email',
									'$verification_code', 
									'$reset_code', 
									'$number_of_reset_password',
									'$status')";

			$result = mysqli_query($this->db, $query);

			if ($result) {
				require('mailbox_action.php');
			}		
		}
	}

	// function student_screenshot(){
	// 	echo " <div class='form-group'>
	//             <div class='row'>
	// 		       <label class='col-sm-4 control-label'>Screenshot of ID</label>
	// 		        <div class='col-sm-4' style='width:330px;'>
	// 		          <input type='file' name='file' id='file' />
	// 		        </div>
	// 		    </div>
	// 		  </div>";

		
	// }
	//Start Address
	function metro_manila_province_action(){
		echo "<div class='form-group'>	
			        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Province</label>
			            <div class='col-md-6'>
			                 <select class='form-control'  id='province' name='province' required='required' class='custom-select select2'  onchange='allAddress(this.value)'>
			                 	<option></option>
			                 	<option value='Metro Manila 2'>Metro Manila</option>
							</select> 
				 		</div>
			</div>";
	}

	function metro_manila_city_action(){
		echo "<div class='form-group'>	
			        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Province</label>
			            <div class='col-md-6'>
			                 <select class='form-control'  id='city' name='city' required='required' class='custom-select select2'  onchange='allAddress(this.value)'>
			                 	<option></option>
			                 	<option>Binondo</option>
							</select> 
				 		</div>
			</div>";
	}
	//End Address

	function student_screenshot(){

		// echo "<div class='form-group'>

		//        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Screenshot of ID</label>
		//         <div class='col-md-6' >
		//           <input type='file' name='screenshot_id_file' id='screenshot_id_file' accept='image/*' required/>
		//         </div>

		//      </div>";

		echo "	<div class='form-group'>
                    <label class='col-md-3 control-label text-uppercase text-semibold text-dark'>Screenshot of ID</label>
                    <div class='col-md-6'>
                        <div class='fileupload fileupload-new' data-provides='fileupload'>
                            <div class='input-append'>
                                <div class='uneditable-input'>
                                    <i class='fa fa-file fileupload-exists'></i>
                                    <span class='fileupload-preview'></span>
                                </div>
                                <span class='btn btn-default btn-file'>
                                <span class='fileupload-exists'>Change</span>
                                <span class='fileupload-new'>Select file</span>
                                	<input type='file' accept='image/*' id='screenshot_id_file'  name='screenshot_id_file' id='screenshot_id_file' onchange='displayImg(this,$(this))' required/>
                                </span>
                            </div>
                            <span>Maximum file size: 10MB</span>
                        </div>
                     </div>
                </div>";

        echo "  <div class='form-group'>
                    <label class='col-md-3 control-label text-uppercase text-semibold text-dark'>Image</label>
                        <div class='col-md-6'>
                           <img id='cimg' class='img-responsive img-rounded img-thumbnail' style='min-width: 100%; min-height: 100%;'>
                                <span id='message_image'></span>
                        </div>
                </div>";


	}


	function non_student_screenshot(){

		// echo "<div class='form-group'>	

    
		//         <label class='col-md-3 control-label' >Package</label>
		//             <div class='col-md-6'>
		//                 <select class='form-control'  id='package' name='package' required>
		//                     <option></option>";

		//              		$query = $this->db->query("SELECT * FROM training_classes_packages_rates order by id asc");
		//                     while($row=$query->fetch_assoc()):

		//              echo "<option value='".$row['package_id']."'>".ucwords($row['package_name'])."</option>";
		//                   endwhile;
		// echo "</select> 
		//     </div>
		// </div>";

	}

	function training_classes_info(){

		echo "<div class='form-group'>	

    
		        <label class='col-md-3 control-label' >Packagse</label>
		            <div class='col-md-6'>
		                <select class='form-control'  id='package' name='package' required>
		                    <option></option>";

		             		$query = $this->db->query("SELECT * FROM training_classes_packages_rates order by id asc");
		                    while($row=$query->fetch_assoc()):

		             echo "<option value='".$row['package_id']."'>".ucwords($row['package_name'])."</option>";
		                  endwhile;
		echo "</select> 
		    </div>
		</div>";

		

	}
	//End

	function insert_new_goals_action(){

		$member_id = $_POST['member_id'];

		$goal = mysqli_real_escape_string($this->db, trim($_POST['goal']));
		$date_goal = mysqli_real_escape_string($this->db, trim($_POST['date_goal']));

		$date = new DateTime();
		$date_created = $date->format('Y-m-d');


		$query = "INSERT INTO `fitness_goals` (member_id,
											goal,
											date_goal,
											date_created)
						VALUES ('$member_id', 
								'$goal',
								'$date_goal',
								'$date_created')";
								

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End


	function edit_fitness_goals_action(){

		$id = $_POST['id'];

		$goal = mysqli_real_escape_string($this->db, trim($_POST['goal']));
		//$date_goal = mysqli_real_escape_string($this->db, trim($_POST['date_goal']));

		$query = "UPDATE `fitness_goals` 
			              SET goal = '$goal'
				 	      WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function save_new_password_action(){

		$email = mysqli_real_escape_string($this->db, trim($_POST['email'])); 
		$password = mysqli_real_escape_string($this->db, md5(trim($_POST['new_password']))); 

		$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
		$result = mysqli_query($this->db, $query);

		if(mysqli_num_rows($result) != 1){
			$query = "UPDATE `members` 
			     SET password = '$password'
				 WHERE email = '$email' ";
		}else{
			$query = "UPDATE `pending_members` 
			     SET password = '$password'
				 WHERE email = '$email' ";
		}


		if($save){
			return 1;
		}
		

	}
	//End

	

	function client_rp_mail_action(){


		$email = mysqli_real_escape_string($this->db, trim($_POST['email'])); 

		$query = "SELECT * FROM `verified_email` WHERE email='$email'";
		$result = mysqli_query($this->db, $query);

		if (mysqli_num_rows($result) == 1) {	

			$row = mysqli_fetch_assoc($result);
			$email = $row['email'];
			
			require('assets/mailbox_recover_password_action.php');

		}else{
			return 2;
		}


		if($save){
			return 1;
		}
		

	}
	//End



	function send_comment(){

		$name = mysqli_real_escape_string($this->db, $_POST['name']);
		$email = mysqli_real_escape_string($this->db, $_POST['email']);
		$comment = mysqli_real_escape_string($this->db, $_POST['comment']);
		$date = new DateTime();
		$date_created = $date->format('Y-m-d');

		$query = "INSERT INTO `comments` (name,
										email,
										comment,
										date_created)
						VALUES ('$name', 
								'$email',
								'$comment',
								'$date_created')";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function client_create_new_password(){

		
		$email = mysqli_real_escape_string($this->db, trim($_POST['email']));
		$new_password = md5(mysqli_real_escape_string($this->db, trim($_POST['new_password'])));

		$query = "SELECT * FROM `pending_members` WHERE email='$email'";
		$result = mysqli_query($this->db, $query);

		if (mysqli_num_rows($result) == 1) {	

			$query = "UPDATE `pending_members` SET password = '$new_password' WHERE email = '$email' ";
			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}else{
				return 2;
			}
			//End
			
		}else{

			//If there is no account in pending members then go to members table
			$query = "SELECT * FROM `members` WHERE email='$email'";
			$result = mysqli_query($this->db, $query);

			if (mysqli_num_rows($result) == 1) {

				$query = "UPDATE `members` SET password = '$new_password' WHERE email = '$email' ";
				$save = mysqli_query($this->db, $query);

				if($save){
					return 1;
				}else{
					return 2;
				}
				//End
			}
		}	
	
	}
	//End


	function send_verification_code_action(){
		$email = mysqli_real_escape_string($this->db, trim($_POST['email'])); 
		require('../assets/send_verification_code.php');
	}
	//End

	function check_verification_code_action(){

		$ver_code = mysqli_real_escape_string($this->db, trim($_POST['ver_code'])); 
		$email = mysqli_real_escape_string($this->db, trim($_POST['email'])); 

		//Get the verification code
		$query = "SELECT * FROM `verified_email` WHERE email = '$email' AND verification_code='$ver_code'";
	    $result = mysqli_query($this->db, $query);

	    if (mysqli_num_rows($result) == 1) {

	    	 $row = mysqli_fetch_assoc($result);
	    	 $ver_code_db = $row['verification_code'];

	    	 //If both verification match then verified success
	    	if($ver_code_db == $ver_code){

				//Update the status to '1' = verified
		        $query = "UPDATE `verified_email` 
			    SET status = '1'
				WHERE email = '$email' ";
				$save = mysqli_query($this->db, $query);

				 //Get the verification code
				$query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `pending_members` WHERE email = '$email' ";
			    $save = mysqli_query($this->db, $query);

			    if(mysqli_num_rows($save) == 1){
					$row = mysqli_fetch_assoc($save);
				}else{
					$query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `members` WHERE email ='$email' ";
					$save = mysqli_query($this->db, $query);
					$row = mysqli_fetch_assoc($save);


				}

				//Login Successfully
				$_SESSION['id'] = $row['id'];
				$_SESSION['member_id'] = $row['member_id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['loading'] = 'loading';

				if($save){
					return 1;
				}
				

	    	}else{
	    		return 2;
	    	}
	    }
	}
	//End

}