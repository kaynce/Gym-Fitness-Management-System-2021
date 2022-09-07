<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php include('head.php'); ?>
	
	
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

									<li class="nav-parent nav-expanded nav-active">
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
											<li class="nav-active">
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
										<!-- 	<li>
												<a href="add_member.php">
													Add Member
												</a>
											</li> -->
											<li>
												<a href="schedules.php">
													List of Schedules
												</a>
											</li>
											
										</ul>
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
											<i class="fa fa-level-up" aria-hidden="true"></i>
											<span>Rates</span>
										</a>
										<ul class="nav nav-children">
											<li class="nav-parent">
												<a>Add Rate</a>
												<ul class="nav nav-children">
													<li>
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
											<li class="nav-parent">
												<a>List of Rate</a>
												<ul class="nav nav-children">
													<li>
														<a href="walk_in.php">Walk in</a>
													</li>
													<li>
														<a href="packages.php">Packages</a>
													</li>
													<!-- <li>
														<a href="personal_training.php">Personal Training </a>
													</li> -->
												</ul>
											</li>
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Trainors</span>
										</a>
										<ul class="nav nav-children">
											<!-- <li>
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

								<!-- 	<li class="">
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
									</li> -->

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
								<!-- 	  End if else -->
								</ul>
						  </nav>
				
							<hr class="separator" />
				

				
						
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Members</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Members</span></li>
								<li><span>List of Members</span></li>
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

					   <?php 
       
				          if(isset($_GET['id'])){
				                $id = $_GET['id'];
				                $query = "SELECT * FROM members WHERE id=$id";
				                $result = mysqli_query($con, $query);
				                $result_2 = mysqli_fetch_array($result);
				                foreach($result_2 as $store =>$catch){
				                    $$store = $catch;
				                }
				            }
				        ?>


					<div class="row">
						

						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<!-- <a href="#" class="fa fa-times"></a> -->
										</div>
							
										<h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>Edit Member's Info</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST">


											<div class="form-group">
												<label class="col-md-3 control-label">Last Name</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="50" id="lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname:'' ?>" placeholder="Last Name">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >First Name</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"   maxlength="50"  id="firstname" name="firstname" value="<?php echo isset($firstname) ? $firstname:'' ?>" placeholder="First Name">
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label" >Age</label>
												<div class="col-md-6">
													<input type="text" class="form-control"   maxlength="3"  id="age" name="age" value="<?php echo isset($age) ? $age:'' ?>" placeholder="Age">
												</div>
											</div>


											<div class="form-group">
									           <label class="col-md-3 control-label" >Gender</label>
									           <div class="col-md-6">
									            <select type="text" name="gender"    required="" class="form-control" id="gender">
									              <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
									              <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
									            </select>
									        	</div>
									          </div>



											<div class="form-group">
												<label class="col-md-3 control-label" >Date of Birth</label>
												<div class="col-md-6">
													<input type="date" class="form-control"  id="date_of_birth" name="date_of_birth" value="<?php echo isset($date_of_birth) ? $date_of_birth:'' ?>" placeholder="Last Name">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label">Height</label>
												<div class="col-md-6">
													<input type="text" class="form-control"  maxlength="10"  id="height" name="height" value="<?php echo isset($height) ? $height:'' ?>" placeholder="">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Weight</label>
												<div class="col-md-6">
													<input type="text" class="form-control" maxlength="10" id="weight" name="weight" value="<?php echo isset($weight) ? $weight:'' ?>" placeholder="">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Address</label>
												<div class="col-md-6">
													<textarea id="address" name="address"  maxlength="100" class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Phone Number</label>
												<div class="col-md-6">
													<input type="number" class="form-control" maxlength="10"  id="contact" name="contact" value="<?php echo isset($contact) ? $contact:'' ?>" placeholder="">
												</div>
											</div>

											<!-- <div class="form-group">
												<label class="col-md-3 control-label" for="inputReadOnly">Email</label>
												<div class="col-md-6">
													<input type="text" class="form-control"  id="email" name="email" value="<?php echo isset($email) ? $email:'' ?>" placeholder="Last Name">
												</div>
											</div> -->

											<div class="form-group">
		                                        <label class="col-md-3 control-label" >Training Class</label>
		                                        <div class="col-md-6">
		                                            <select class="form-control"  id="training_classes" name="training_classes" required="required" class="custom-select select2" id="">
		                                              <?php
		                                                $query = $con->query("SELECT * FROM training_classes order by training_classes_name asc");
		                                                while($row= $query->fetch_assoc()):
		                                              ?>
		                                              <option value="<?php echo $row['training_classes_name']; ?>" <?php echo isset($training_classes) && $training_classes == $row['training_classes_name'] ? 'selected' : '' ?>><?php echo ucwords($row['training_classes_name']) ?></option>
		                                              <?php endwhile; ?>
		                                            </select>
		                                        </div>
		                                    </div>

											 <div class="form-group">
		                                         <label class="col-md-3 control-label" >Client Type</label>
		                                        <div class="col-md-6">
		                                             <select type="text" class="form-control"  id="client_type" name="client_type" required="">
		                                                  <option <?php echo isset($client_type) && $client_type == 'Student' ? 'selected' : '' ?>>Student</option>
		                                                  <option <?php echo isset($client_type) && $client_type == 'Non-Student' ? 'selected' : '' ?>>Non-Student</option>
		                                                </select>
		                                        </div>
		                                    </div>

										

											 <div class="form-group">
		                                         <label class="col-md-3 control-label" >Client's Trainor</label>
		                                        <div class="col-md-6">
		                                           <select class="form-control" id="trainor" name="trainor" required="required" class="custom-select select2" >
		                                           	<option></option>
		                                            <?php
		                                                $query = $con->query("SELECT *,concat(lastname,', ',firstname) as name from users WHERE status ='approved' AND type = 'trainor' order by concat(lastname,', ',firstname) desc ");

		                                                $query_2 = $con->query("SELECT * FROM members WHERE status = 'approved'");
		                                                
		                                                $row_2 = mysqli_fetch_assoc($query_2);


		                                              while($row= mysqli_fetch_assoc($query)):

		                                            ?>
		                                           <option value="<?php echo $row['user_id'] ?>" <?php echo isset($trainor) && $row_2['trainor'] == $row['user_id'] ? 'selected': '' ?>><?php echo ucwords($row['name']) ?></option>
		                                            <?php endwhile; ?>

		                                          </select>
		                                        </div>
		                                    </div>
		                               		

						                      <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">New Password</label>
						                        <div class="col-md-6">
						                          <input type="text" value="<?php echo isset($new_password) ? $new_password:'' ?>"   name="new_password" id="new_password" class="form-control" >
						                        </div>
						                      </div>

											<input type="hidden" class="form-control"  id="member_id" name="member_id" value="<?php echo isset($member_id) ? $member_id:'' ?>">

												<button type="button"  class="mb-xs mt-xs mr-xs btn btn-success edit">Edit</button>



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


 $(document).ready(function(){  

      $(document).on('click', '.edit', function(){  
      	
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

            	// var member_id = $(this).attr("id");  
            	 var member_id =$('#member_id').val();
            	 var lastname = $('#lastname').val();
            	 var firstname = $('#firstname').val();
            	 var age = $('#age').val();
            	 var gender = $('#gender').val();
            	 var date_of_birth = $('#date_of_birth').val();
            	 var height = $('#height').val();
            	 var weight = $('#weight').val();
            	 var address = $('#address').val();
            	 var contact = $('#contact').val();
            	 var training_classes = $('#training_classes').val();
            	 var client_type = $('#client_type').val();
            	 //var package = $('#package').val();
            	 var trainor = $('#trainor').val();
            	 var new_password = $('#new_password').val();

	            $.ajax({  
	                url:'ajax.php?action=edit_member_action',
	                type:'post',
	                data:{
	                    member_id:member_id,
	                    lastname:lastname,
	                    firstname:firstname,
	                    age:age,
	                    gender:gender,
	                    date_of_birth:date_of_birth,
	                    height:height,
	                    weight:weight,
	                    address:address,
	                    contact:contact,
	                    training_classes:training_classes,
	                    client_type:client_type,	
	                    trainor:trainor,
	                    new_password:new_password
	                },  
	                success:function(data, status){ 

	                	console.log(data);
	                	if (data == 1) {
	                		Swal.fire({
					          icon: 'success',
					          title: 'Edited Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) => {
					        	 // if (result.value) {
					        	  	 window.location.href = 'members.php';
					        	 // }
					        		
					        })     
	                	}else{
	                		Swal.fire({
					          icon: 'error',
					          title: 'Edit Failed!',
					        })
	                	}

	                }  
	           }); 

            }
        })     
      }); 

 });  





 
</script>

<?php include('footer.php'); ?>