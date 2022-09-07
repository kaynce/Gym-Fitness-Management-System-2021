<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php include('head.php'); ?>

<?php 


// echo 'hello';

#check if image sent
$error = '';
$msg = '';
if (isset($_POST['submit'])) {

	# getting image data and store them in var
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	//$firstname = $_POST['firstname'];

	#if there is no error occurred while uploading
	if ($error === 0) {
	 	if($img_size > 10000000){ 
	 		#error message 
		 	$msg = "Sorry, your file is too large!";

		 	#response array
		 	//$msg = array('error' => 1, 'em' => $em);

		 	

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
	 			//Start
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
					//$trainors_classes = $_POST['trainors_classes'];

          $trainors_classes = implode(",", $_POST['trainors_classes']);
       

					// $client_type = $_POST['client_type'];

					// $plan = $_POST['plan'];
					// $package = $_POST['package'];
					// $trainor = $_POST['trainor'];

					$type = "trainor";
          $avl = "1";
					$status = "approved";

					$date = new DateTime();
					$date_created = $date->format('Y-m-d');

					$query = "INSERT INTO `member_and_trainor_id` (unique_id)
								VALUES ('$user_id')";

					$result = mysqli_query($con, $query); 
					// End


	 			/**
	 			renaming the image name width
	 			with random string 
	 			**/
	 			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

	 			#creating upload path on root directory

	 			$img_upload_path = "../assets/images/team/".$new_img_name;

	 			#move uploaded image to 'uploads' folder
	 			move_uploaded_file($tmp_name, $img_upload_path);

	 			#inserting image name into database

	 			// $query = "INSERT INTO `users` (image)
					// VALUES ('$new_img_name')";

        // QR CODE
        $tempDir = 'qrcodes/'; 

        $filename = $user_id;

        $codeContents = $user_id;
        
        QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
      
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
                    availability,
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
                '$avl',
							'$status')";

	 			// $query = "UPDATE `image` (image, 
	 			// 								firstname)
	 			// 		   VALUES('$new_img_name', 
	 			// 		   		   '$firstname')";

	 			// $query = "UPDATE `image` 
			    //    SET image = '$new_img_name'
				// WHERE id = '$id' ";

	 			mysqli_query($con, $query);

	 			// $msg="Added Successfully";
	 			?>
	 			<script type="text/javascript">
	 		
	 			Swal.fire({
						icon: 'success',
						title: 'Added Successfully!',
						showConfirmButton: false,
						timer: 1500
				}).then((result) => {
				// if (result.value) {
							window.location.href = 'add_trainor.php';
				// }
								        		
				})

				// 	let lastname = $('#lastname').val();
				  //           let firstname = $('#firstname').val();
				  //           let age = $('#age').val();
				  //           let gender = $('#gender').val();
				  //           let date_of_birth = $('#date_of_birth').val();
				  //           let height = $('#height').val();
				  //           let weight = $('#weight').val();
				  //           let address = $('#address').val();
				  //           let contact = $('#contact').val();
				  //           let email = $('#email').val();

				  //           let rate = $('#rate').val();  


	 				// document.getElementById('lastname').value = '';
		    //   		document.getElementById('firstname').value = '';
		    //   		document.getElementById('age').value = '';
		    //   		document.getElementById('gender').value = '';
		    //   		document.getElementById('date_of_birth').value = '';
		    //   		document.getElementById('height').value = '';
		    //   		document.getElementById('weight').value = '';
		    //   		document.getElementById('address').value = '';
		    //   		document.getElementById('contact').value = '';
		    //   		document.getElementById('email').value = '';

	 			</script>
	 			<?php



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
}else {
	?>

	<!-- <script>alert('Wrong.')</script>
 -->
	<?php
}
?>

<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

	
	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title text-primary">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							  <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">

                              <!----Start if else -->
                              <?php 
                              $user_id = $_SESSION['user_id'];
                              $type = $_SESSION['type'];

                              if ($type == 'admin') {
                                // $row = mysqli_fetch_assoc($result);

                               ?>

                              <!-- <li class="nav-active">
                                <a href="index.php">
                                  <i class="fa fa-home" aria-hidden="true"></i>
                                  <span>Dashboard</span>
                                </a>
                              </li> -->
                              
                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-home" aria-hidden="true"></i>
                                  <span>Dashboard</span>
                                </a>
                                <ul class="nav nav-children ">
                                  
                                  <li class="">
                                    <a href="index.php">
                                      Dashboard
                                    </a>
                                  </li>

                                  <li>
                                    <a href="members_decline.php">
                                      Membership Decline
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>


                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-money" aria-hidden="true"></i>
                                  <span>Payments</span>
                                </a>
                                <ul class="nav nav-children ">
                                  
                                  <li>
                                    <a href="payments.php">
                                      List of Members
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-group" aria-hidden="true"></i>
                                  <span>Members</span>
                                </a>
                                <ul class="nav nav-children ">
                                  <!-- <li>
                                    <a href="add_member.php">
                                      Add Member
                                    </a>
                                  </li> -->
                                  <li class="">
                                    <a href="members.php">
                                      List of Members
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <!-- <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-align-left" aria-hidden="true"></i>
                                  <span>Membership Validity</span>
                                </a>
                                <ul class="nav nav-children ">
                                  <li>
                                    <a href="add_member.php">
                                      New Entry
                                    </a>
                                  </li>
                                  <li>
                                    <a href="membership_validity.php">
                                      List of Members
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li> -->

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-qrcode" aria-hidden="true"></i>
                                  <span>Attendance</span>
                                </a>
                                <ul class="nav nav-children ">
                                  
                                  <li>
                                    <a target='_blank' href="attendance_qrcode.php">
                                      Attendance QR Code
                                    </a>
                                  </li>

                                  <li class="">
                                    <a href="attendance_today.php">
                                      Attendance Today
                                    </a>
                                  </li>
                                  
                                  <li>
                                    <a href="attendance.php">
                                      List of Attendance
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-folder" aria-hidden="true"></i>
                                  <span>Schedule</span>
                                </a>
                                <ul class="nav nav-children ">
                                <!--  <li>
                                    <a href="add_member.php">
                                      Add Member
                                    </a>
                                  </li> -->
                                  <li class="">
                                    <a href="schedules.php">
                                      List of Schedules
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>


                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-child" aria-hidden="true"></i>
                                  <span>Fitness Goals</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li class="">
                                    <a href="fitness_goals.php">
                                      List of Fitness Goals
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-level-up" aria-hidden="true"></i>
                                  <span>Rates</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li class="nav-parent ">
                                    <a>Add Rate</a>
                                    <ul class="nav nav-children">
                                      <li class="">
                                        <a href="add_rate.php">Add Walk In Rate</a>
                                      </li>
                                      <li>
                                        <a href="add_package.php">Add Package Rate</a>
                                      </li>
                                      <!-- <li>
                                        <a href="add_personal_training_rate.php">Add Personal Training Rate</a>
                                      </li> -->
                                    </ul>
                                  </li>
                                  <li class="nav-parent ">
                                    <a>List of Rate</a>
                                    <ul class="nav nav-children">
                                      <li class="">
                                        <a href="walk_in.php">Walk in</a>
                                      </li>
                                      <li class="">
                                        <a href="packages.php">Packages</a>
                                      </li>
                                      <!-- <li>
                                        <a href="personal_training.php">Personal Training </a>
                                      </li> -->
                                    </ul>
                                  </li>
                                </ul>
                              </li>

                              <li class="nav-parent nav-expanded nav-active">
                                <a>
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                  <span>Trainors</span>
                                </a>
                                <ul class="nav nav-children">
                                 <!--  <li class="nav-active">
                                    <a href="add_trainor.php">
                                      Add Trainor
                                    </a>
                                  </li> -->
                                  <li>
                                    <a href="trainors.php">
                                      List of Trainors
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent">
                                <a>
                                  <i class="fa fa-play" aria-hidden="true"></i>
                                  <span>Training Classes</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a href="add_class.php">
                                      Add Class
                                    </a>
                                  </li>
                                  <li>
                                    <a href="training_classes.php">
                                      List of Classes
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent">
                                <a>
                                  <i class="fa fa-heart" aria-hidden="true"></i>
                                  <span>Health Status</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a href="health_status.php">
                                      List of Members
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <!-- <li class="nav-parent">
                                <a>
                                  <i class="fa fa-align-left" aria-hidden="true"></i>
                                  <span>Report</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a>List of Members</a>
                                  </li>
                                  
                                </ul>
                              </li> -->

                            <!--   <li class="">
                                <a href="#">
                                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                  <span>Report</span>
                                </a>
                              </li>


                              <li class="nav-parent">
                                <a>
                                  <i class="fa fa-table" aria-hidden="true"></i>
                                  <span>Classes Time Table</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a href="#">Add Schedule</a>
                                  </li>
                                  <li>
                                    <a href="#">Classes Timetabke</a>
                                  </li>
                                  
                                </ul>
                              </li>
 -->
                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                  <span>Users</span>
                                </a>
                                <ul class="nav nav-children">
                                
                                  <li>
                                    <a href="users.php">
                                      List of Users
                                    </a>
                                  </li>

                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                  <span>Admin Account</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a href="my_profile.php">
                                      My Profile
                                    </a>
                                  </li>
                                  <li>
                                    <a href="new_password.php">
                                      Change Password
                                    </a>
                                  </li>
                                  <li>
                                    <a href="admin_login.php">
                                      Logout
                                    </a>
                                  </li>

                                </ul>
                              </li>

                              <li class="">
		                            <a href="settings.php">
		                                  <i class="fa fa-cog" aria-hidden="true"></i>
		                                  <span>Settings</span>
		                                </a>
		                      </li>

                              <?php 
                                } else {    
                               ?>

                                <li class="nav-active">
                                  <a href="index.php">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Dashboard</span>
                                  </a>
                                </li>

                                <li class="nav-parent">
									<a>
										<i class="fa fa-child" aria-hidden="true"></i>
										<span>Fitness Goals</span>
									</a>
									<ul class="nav nav-children">
											<li>
												<a href="fitness_goals.php">
														List of Fitness Goals
											</a>
										</li>
												
									</ul>
								</li>

                                <li class="nav-parent">
                                  <a>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span>Health Status</span>
                                  </a>
                                  <ul class="nav nav-children">
                                    <li>
                                      <a href="health_status.php">
                                        List of Members
                                      </a>
                                    </li>
                                      
                                  </ul>
                                </li>

                                <li class="nav-parent ">
                                  <a>
                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                    <span>Trainor Account</span>
                                  </a>
                                  <ul class="nav nav-children">
                                    <li>
                                      <a href="my_profile.php">
                                        My Profile
                                      </a>
                                    </li>
                                    <li>
                                    <a href="new_password.php">
                                      Change Password
                                    </a>
                                    </li>
                                    <li>
                                      <a href="admin_login.php">
                                        Logout
                                      </a>
                                    </li>

                                  </ul>
                                </li>


                               <?php 
                                }
                                ?>
                            <!--    End if else -->
                            </ul>
                 </nav>
        
				
							<hr class="separator" />
				

				
						
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Trainors</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Trainors</span></li>
								<li><span>Add Trainor</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

				<div class="row">

					<!-- start: page -->
					<div class="row">
					
						<!-- <div class="col-md-6 col-lg-12 col-xl-6"> -->
						<div class="">
							<div class="row">
							<!-- 	<div class="col-md-12 col-lg-4 col-xl-4"> -->
								
								
							

							</div>
						</div>
					</div>

					<div class="row">
						

						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<!-- <a href="#" class="fa fa-times"></a> -->
										</div>
							
										<h2 class="panel-title"><a href="members.php"></a>Add Trainor</h2>

<?php if($error) { ?>

	<div class="errorWrap"><strong>ERROR</strong>:
		<?php echo htmlentities($error); 
?> 

</div>

<?php } else if($msg) { 

	?><div class="succWrap"><strong>SUCCESS</strong>:
		<?php echo htmlentities($msg); ?> 

</div>

<?php 
}
?>

									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST"  enctype="multipart/form-data">

											<p id="errorMs"></p>

											

										<!-- 	<br> -->

											<!-- <div class="form-group">
												<label class="col-md-3 control-label"></label>
												<div class="col-md-6">

													 <div class="gallery">
														<img src="../assets/images/default-image.png" id="preImg">
													</div>
												</div>
											</div> -->

											<div class="form-group">
												<label class="col-md-3 control-label">Last Name</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="50" id="lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname:'' ?>" placeholder="Last name" onclick="document.getElementById('lastname').value = ''">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >First Name</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"   maxlength="50"  id="firstname" name="firstname" value="<?php echo isset($firstname) ? $firstname:'' ?>" placeholder="First name" >
												</div>
											</div>


						                      <div class="form-group">
						                        <label class="col-md-3 control-label" >Date of Birth</label>
						                        <div class="col-md-6">
						                          <input type="date" class="form-control"  id="date_of_birth" name="date_of_birth" value="<?php echo isset($date_of_birth) ? $date_of_birth:'' ?>" placeholder="Last Name" >
						                        </div>
						                      </div>


											<div class="form-group">
												<label class="col-md-3 control-label">Age</label>
												<div class="col-md-6">
													<input type="text" class="form-control"  maxlength="2"  id="age" name="age" value="<?php echo isset($age) ? $age:'' ?>" placeholder="Input age "  >
												</div>
											</div>


											<div class="form-group">
									           <label class="col-md-3 control-label" >Gender</label>
									           <div class="col-md-6">
									            <select type="text" name="gender"    required="" class="form-control" id="gender" >
									              <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
									              <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
									            </select>
									        	</div>
									          </div>



									
											<div class="form-group">
												<label class="col-md-3 control-label">Height</label>
												<div class="col-md-6">
													<input type="number" class="form-control"  maxlength="10"  id="height" name="height" value="<?php echo isset($height) ? $height:'' ?>" placeholder="Input height in cm" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Weight</label>
												<div class="col-md-6">
													<input type="number" class="form-control" maxlength="10" id="weight" name="weight" value="<?php echo isset($weight) ? $weight:'' ?>" placeholder="Input weight in kg" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Address</label>
												<div class="col-md-6">
													<textarea id="address" name="address"  maxlength="100" class="form-control" placeholder="Input address here" ><?php echo isset($address) ? $address : '' ?></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Phone Number</label>
												<div class="col-md-6">
													<input type="number" class="form-control" maxlength="10"  id="contact" name="contact" value="<?php echo isset($contact) ? $contact:'' ?>" placeholder="Input phone number here" >
												</div>
											</div>

										


						                      <div class="form-group">
						                          <label class="col-md-3 control-label">Trainor's Classes</label>
						                          <div class="col-md-6">
						                          <select name="trainors_classes[]" id="trainors_classes" class="form-control select2" multiple="multiple" required>

						                            <?php 
						                            $query = $con->query("SELECT * FROM training_classes order by training_classes_name asc");

						                             $classes = array();

						                            while($row= $query->fetch_assoc()){
						                                array_push($classes, $row['training_classes_name']);
						                            }

						                            $size = count($classes); 

						                            //$dow = array("Body Building","Kick Boxing","Boxing");

						                            for($i = 0; $i < $size; $i++):
						                            ?>
						                            <option value="<?php echo $i ?>" <?php echo !empty($classes_arr) && in_array($i,$classes_arr) ? 'selected' : '' ?>><?php echo $classes[$i] ?></option>
						                          <?php endfor; ?>
						                          </select>
						                        </div>
						                       </div>

		                 					 <div class="form-group">
												<label class="col-md-3 control-label" >Rate</label>
												<div class="col-md-6">
													<input type="number" class="form-control" maxlength="10"  id="rate" name="rate" value="<?php echo isset($rate) ? $rate:'' ?>" placeholder="Input rate here" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputReadOnly">Email</label>
												<div class="col-md-6">
													<input type="email" class="form-control"  id="email" name="email" value="<?php echo isset($email) ? $email:'' ?>" placeholder="Input email here" >
												</div>
											</div>

											 <div class="form-group">
												<label class="col-md-3 control-label" >Password</label>
												<div class="col-md-6">
													<input type="text" class="form-control" maxlength="10"  id="password" name="password" value="trainor12345" placeholder="Input password here" readonly="">
												</div>
											</div>

						                      <div class="form-group">
						                        <label class="col-md-3 control-label">Image</label>
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
						                                <input type="file" id="my_image"  name="my_image" onchange="displayImg(this,$(this))" required/>
						                              </span>
						                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
						                            </div>
						                          </div>
						                        </div>
						                      </div>

						                        <div class="form-group">
						                          <label class="col-md-3 control-label">Image</label>
						                          <div class="col-md-6">

						                            <img src="../assets/images/team/<?php echo isset($image) ? $image : '' ?>" alt="" id="cimg" class="img-responsive img-rounded img-thumbnail" style="height: 30vh;">

						                          </div>
						                      </div>


										<!-- 	<input type="text" class="form-control"  id="member_id" name="member_id" value="<?php echo isset($member_id) ? $member_id:'' ?>">
 -->
												<button type="submit"  id="add" name="submit" class="mb-xs mt-xs mr-xs btn btn-success ">Add Trainor</button>

												<button type="button"  id="reset" name="reset" class="mb-xs mt-xs mr-xs btn btn-primary reset">Reset</button>

												
	<!-- <div class="input-box-wrapper">
		<div class="box">
			<input type="checkbox" value="javascript" class="checkbox" id="">
			<label for="javascript">javascript</label>
		</div>

		<div class="box">
			<input type="checkbox" value="python" class="checkbox" id="">
			<label for="python">python</label>
		</div>

		<div class="box">
			<input type="checkbox" value="c" class="checkbox" id="">
			<label for="c">c</label>
		</div>


		<div class="print-value">

			<textarea id="valueList"></textarea>
		</div>
	</div> -->

										</form>
									</div>
								</section>

						</div>

						
					</div>
					
					<!-- end: page -->
				</section>

			</div>
		
		<?php include('calendar.php'); ?>


		</section>

<script>


  function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    
 $(document).ready(function(){  

  $('.select2').select2({
    placeholder:'Please Select Here',
    })


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







 	// document.getElementById('valueList');
	var valueList = document.getElementById('valuelist_trainors_classes');
	// var text  = '<span> you have selected: </span>';
	var listArray = [];

	var checkboxes = document.querySelectorAll('.checkbox');

	for(var checkbox of checkboxes){
		checkbox.addEventListener('click',function(){
			if (this.checked ==  true) {
				listArray.push(this.value);
				valueList.innerHTML = listArray.join(' / ');
			} else {
				console.log('you unchecked the checkbox');
				listArray = listArray.filter(e => e !== this.value);
				valueList.innerHTML = listArray.join(' / ');
			}
		})
	}

	// var valueList = document.getElementById('valueList');
	// var text  = '<span> you have selected: </span>';
	// var listArray = [];

	// var checkboxes = document.querySelectorAll('.checkbox');

	// for(var checkbox of checkboxes){
	// 	checkbox.addEventListener('click',function(){
	// 		if (this.checked ==  true) {
	// 			listArray.push(this.value);
	// 			valueList.innerHTML = text + listArray.join(' / ');
	// 		} else {
	// 			console.log('you unchecked the checkbox');
	// 			listArray = listArray.filter(e => e !== this.value);
	// 			valueList.innerHTML = text + listArray.join(' / ');
	// 		}
	// 	})
	// }
			$(".add").click(function(e){
				e.preventDefault();

			    let form_data = new FormData();
			    let img  = $('#myImage')[0].files;
			    // console.log(img[0]);	 

			    var lastname = $('#lastname').val();
		        let firstname = $('#firstname').val();
		        let age = $('#age').val();
		        let gender = $('#gender').val();
		        let date_of_birth = $('#date_of_birth').val();
		        let height = $('#height').val();
		        let weight = $('#weight').val();
		        let address = $('#address').val();
		        let contact = $('#contact').val();
		        let email = $('#email').val();
		        //var trainors_classes = $('#valuelist_trainors_classes').val();
		        let trainors_classes = $('#trainors_classes').val();
		        let rate = $('#rate').val();    	 
		        let add =  $('#add').val();

		        if (img.length == 0 || lastname == '' || firstname ==  '' || age ==  '' || gender ==  ''||
		        	date_of_birth ==  ''|| height == '' || weight ==  '' || address ==  ''||
		        	contact ==  ''  || email ==  '' || trainors_classes ==  ''||
		        	rate ==  '') {
		      		
		      		Swal.fire({
							icon: 'warning',
							title: 'There is an empty field!',
							text: 'Please check the missing field!',
							//showConfirmButton: false,
							//timer: 1500
					})  

		      	}else{
			      	Swal.fire({
			           title: 'Are you sure?',
			            text: "",
			            icon: 'question',
			            showCancelButton: true,
			            confirmButtonColor: '#3085d6',
			            cancelButtonColor: '#d33',
			            confirmButtonText: 'Yes'            
			        }).then((result) => {
			            if (result.value) {

			            	 form_data.append('my_image', img[0]);

			            	  	$.ajax({
							    		url: 'insert_new_trainor_action_2.php',
							    		type: 'post',
							    		data:{
				                	form_data:form_data,
				                    lastname:lastname,
				                    firstname:firstname,
				                    age:age,
				                    gender:gender,
				                    date_of_birth:date_of_birth,
				                    height:height,
				                    weight:weight,
				                    address:address,
				                    contact:contact,
				                    email:email,
				                    trainors_classes:trainors_classes,
				                    rate:rate,
				                    add:add
				                },
							    		contentType: false,
							    		processData: false,
							    		success: function(res){
							    			console.log(res);
							    			const data = JSON.parse(res);

							    			if(data.error != 1){
							    				let path = "../assets/images/team/"+data.src;
							    				$("#preImg").attr("src",  path);
							    				$("#preImg").fadeOut(1).fadeIn(1000);
							    				$("#myImage").val('');

							    			} else {
							    				$("#errorMs").text(data.em);
							    			}
							    		}

							    	});

			            	 // Start ajax
				            $.ajax({  
				                url:'insert_new_trainor_action_2.php',
				                type:'post',
				                data:{
				                	form_data:form_data,
				                    lastname:lastname,
				                    firstname:firstname,
				                    age:age,
				                    gender:gender,
				                    date_of_birth:date_of_birth,
				                    height:height,
				                    weight:weight,
				                    address:address,
				                    contact:contact,
				                    email:email,
				                    trainors_classes:trainors_classes,
				                    rate:rate,
				                    add:add
				                },	
				                success:function(data, status){ 

				                	if (status == 'success') {
				                		Swal.fire({
								          icon: 'success',
								          title: 'Added Successfully!',
								          showConfirmButton: false,
								          timer: 1500
								        }).then((result) => {
								        	 // if (result.value) {
								        	  	 window.location.href = 'add_trainor.php';
								        	 // }
								        		
								        })

								       
				                	}
				                }  
				           }); 
				            // End ajax
			            }

			        })    

			        } 
      			//End else

			    //Check if the image is selected or not
			    // if (img.length > 0) {

			    // 	form_data.append('my_image', img[0]);

			    // 	$.ajax({
			    // 		url: 'upload.php',
			    // 		type: 'post',
			    // 		data: form_data,
			    // 		contentType: false,
			    // 		processData: false,
			    // 		success: function(res){
			    // 			// console.log(res);
			    // 			const data = JSON.parse(res);

			    // 			if(data.error != 1){
			    // 				let path = "uploads/"+data.src;
			    // 				$("#preImg").attr("src",  path);
			    // 				$("#preImg").fadeOut(1).fadeIn(1000);
			    // 				$("#myImage").val('');

			    // 			} else {
			    // 				$("#errorMs").text(data.em);
			    // 			}
			    // 		}

			    // 	});


			    // } else {
			    // 	$("#errorMs").text("Please select an image.");
			    // }
			});


      $(document).on('click', '.reset', function(){  

      	 window.location.href = 'add_trainor.php';
    //   		var lastname = $('#lastname').val();
    //         var firstname = $('#firstname').val();
    //         var age = $('#age').val();
    //         var gender = $('#gender').val();
    //         var date_of_birth = $('#date_of_birth').val();
    //         var height = $('#height').val();
    //         var weight = $('#weight').val();
    //         var address = $('#address').val();
    //         var contact = $('#contact').val();
    //         var email = $('#email').val();
    //         var trainors_classes = $('#valuelist_trainors_classes').val();
    //         var rate = $('#rate').val();  

    //   		document.getElementById('lastname').value = '';
    //   		document.getElementById('firstname').value = '';
    //   		document.getElementById('age').value = '';
    //   		document.getElementById('gender').value = '';
    //   		document.getElementById('date_of_birth').value = '';
    //   		document.getElementById('height').value = '';
    //   		document.getElementById('weight').value = '';
    //   		document.getElementById('address').value = '';
    //   		document.getElementById('contact').value = '';
    //   		document.getElementById('email').value = '';
      		

    //   		// document.getElementById("checkbox").checked = false;

    //   		//$("#checkbox").prop("checked", false);
    //   		$('input:checkbox').removeAttr('checked');


    // //   		console.log('you unchecked the checkbox');
				// // listArray = listArray.filter(e => e !== this.value);
				// // valueList.innerHTML = listArray.join(' / ');

				// document.getElementById('valuelist_trainors_classes').value = '';
      		

    //   		document.getElementById('rate').value = '';


      });


 });  





 
</script>

<?php include('footer.php'); ?>