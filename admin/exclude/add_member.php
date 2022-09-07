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

									<li class="">
										<a href="index.php">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									
									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
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
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Members</span>
										</a>
										<ul class="nav nav-children ">
											<li class="nav-active">
												<a href="add_member.php">
													Add Member
												</a>
											</li>
											<li>
												<a href="members.php">
													List of Members
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Attendance</span>
										</a>
										<ul class="nav nav-children ">
											
											<li>
												<a href="attendance.php">
													List of Attendance
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
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
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Plans</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="plans.php">
													List of Plans
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Packages</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="add_package.php">
													Add Package
												</a>
											</li>

											<li>
												<a href="packages.php">
													List of Pakcages
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
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
											<i class="fa fa-align-left" aria-hidden="true"></i>
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
											<i class="fa fa-align-left" aria-hidden="true"></i>
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

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
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
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Admin Account</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="my_profile.php">
													My Profile
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
												<i class="fa fa-align-left" aria-hidden="true"></i>
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
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Members</span></li>
								<li><span>Add Members</span></li>
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
							
										<h2 class="panel-title"><a href="members.php"></a>Add Member</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST">


											<div class="form-group">
												<label class="col-md-3 control-label">Last Name</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="50" id="lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname:'' ?>" placeholder="Last Name" >
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
													<input type="text" class="form-control"  maxlength="10"  id="height" name="height" value="<?php echo isset($height) ? $height:'' ?>" placeholder="Input height here">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Weight</label>
												<div class="col-md-6">
													<input type="text" class="form-control" maxlength="10" id="weight" name="weight" value="<?php echo isset($weight) ? $weight:'' ?>" placeholder="Input weight here">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Address</label>
												<div class="col-md-6">
													<textarea id="address" name="address"  maxlength="100" class="form-control" placeholder="Input address here"><?php echo isset($address) ? $address : '' ?></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >Phone Number</label>
												<div class="col-md-6">
													<input type="number" class="form-control" maxlength="10"  id="contact" name="contact" value="<?php echo isset($contact) ? $contact:'' ?>" placeholder="Input phone number here">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="inputReadOnly">Email</label>
												<div class="col-md-6">
													<input type="text" class="form-control"  id="email" name="email" value="<?php echo isset($email) ? $email:'' ?>" placeholder="Input email here">
												</div>
											</div>

											<div class="form-group">
		                                        <label class="col-md-3 control-label" >Training Class</label>
		                                        <div class="col-md-6">
		                                            <select class="form-control"  id="training_classes" name="training_classes" required="required" class="custom-select select2" id="">
		                                            	<option>Please select</option>
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
		                                             	<option>Please select</option>
		                                                  <option <?php echo isset($client_type) && $client_type == 'Student' ? 'selected' : '' ?>>Student</option>
		                                                  <option <?php echo isset($client_type) && $client_type == 'Non-Student' ? 'selected' : '' ?>>Non-Student</option>
		                                                </select>
		                                        </div>
		                                    </div>

											
											 <div class="form-group">
		                                         <label class="col-md-3 control-label" >Client's Trainor</label>
		                                        <div class="col-md-6">
		                                           <select class="form-control" id="trainor" name="trainor" required="required" class="custom-select select2" >
		                                           	<option>Please select</option>
		                                            <?php
		                                                $query = $con->query("SELECT *,concat(lastname,', ',firstname) as name from trainors WHERE status ='Approved' order by concat(lastname,', ',firstname) desc ");

		                                                $query_2 = $con->query("SELECT * FROM members WHERE status = 'Approved'");
		                                                
		                                                $row_2 = mysqli_fetch_assoc($query_2);


		                                              while($row= mysqli_fetch_assoc($query)):

		                                            ?>
		                                           <option value="<?php echo $row['trainor_id'] ?>" <?php echo isset($trainor) && $row_2['trainor'] == $row['trainor_id'] ? 'selected': '' ?>><?php echo ucwords($row['name']) ?></option>
		                                            <?php endwhile; ?>

		                                          </select>
		                                        </div>
		                                    </div>

		                                    <div class="form-group ">
		                                         <label class="col-md-3 control-label" >Package</label>
		                                        <div class="col-md-6">
		                                          <select onchange="my_package_details(this.value)"  class="form-control"  id="package" name="package" required="required" class="custom-select select2" >
		                                          	<option>Please select</option>
		                                              <?php
		                                                $query = $con->query("SELECT * FROM packages order by package_name asc");
		                                                while($row= $query->fetch_assoc()):
		                                              ?>
		                                              <option value="<?php echo $row['package_id'] ?>" <?php echo isset($package) && $package == $row['package_name'] ? 'selected' : '' ?>><?php echo ucwords($row['package_name']) ?></option>
		                                              <?php endwhile; ?>
		                                            </select> 
		                                        </div>
		                                    </div>


		                                     <div class="form-group">
	                                            
	                                                <div id="package_details">
	                                           
	                                        </div>


		                                    <?php 
		                                    	if(false){


		                                     ?>


		                                     <!-- <div class="form-group ">
		                                         <label class="col-md-3 control-label" >Amount</label>
		                                        <div class="col-md-6">
		                                          <select class="form-control"  id="package" name="package" required="required" class="custom-select select2" >
		                                              <?php
		                                                $query = $con->query("SELECT * FROM packages order by package_name asc");
		                                                while($row= $query->fetch_assoc()):
		                                              ?>
		                                              <option value="<?php echo $row['package_name'] ?>" <?php echo isset($package) && $package == $row['package_name'] ? 'selected' : '' ?>><?php echo ucwords($row['package_name']) ?></option>
		                                              <?php endwhile; ?>
		                                            </select> 
		                                        </div>
		                                    </div>


		                                     <div class="form-group ">
		                                         <label class="col-md-3 control-label" >Validity</label>
		                                        <div class="col-md-6">
		                                          <select class="form-control"  id="validity" name="validity" required="required" class="custom-select select2" >
		                                              <?php
		                                                $query = $con->query("SELECT * FROM packages order by package_name asc");
		                                                while($row= $query->fetch_assoc()):
		                                              ?>
		                                              <option value="<?php echo $row['package_name'] ?>" <?php echo isset($package) && $package == $row['package_name'] ? 'selected' : '' ?>><?php echo ucwords($row['package_name']) ?></option>
		                                              <?php endwhile; ?>
		                                            </select> 
		                                        </div>
		                                    </div> -->

		                                    <?php 
		                                    	}
		                                     ?>

											<input type="hidden" class="form-control"  id="member_id" name="member_id" value="<?php echo isset($member_id) ? $member_id:'' ?>">

												<button type="button"  class="mb-xs mt-xs mr-xs btn btn-success add">Add Member</button>



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

      $(document).on('click', '.add', function(){  
      	
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
        var email = $('#email').val();
        var training_classes = $('#training_classes').val();
        var client_type = $('#client_type').val();
        var package = $('#package').val();
        var trainor = $('#trainor').val();

        if (lastname == '' || firstname ==  '' || age ==  '' || gender ==  ''||
        	date_of_birth ==  ''|| height == '' || weight ==  '' || address ==  ''||
        	contact ==  ''  || email ==  '' || training_classes ==  ''||
        	client_type ==  '' || package == '' || trainor==  '') {

        	Swal.fire({
					icon: 'warning',
					title: 'There is an empty field!',
					text: 'Please check the missing field!',
					//showConfirmButton: false,
					//timer: 1500
			})   

        }else {

        // Start sweetalert
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

	            $.ajax({  
	                url:'insert_new_member_action.php',
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
	                    email:email,
	                    training_classes:training_classes,
	                    client_type:client_type,
	                    package:package,
	                    trainor:trainor
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
					        	  	 window.location.href = 'add_member.php';
					        	 // }
					        		
					        })

					       
	                	}
	                }  
	           }); 

            }
        })
          // End sweetalert
        }


      }); 

 });  

            function my_package_details(str){
                 
                if(str=="Please select"){
                    document.getElementById("package_details").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("package_details").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","package_details.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
  



 
</script>

<?php include('footer.php'); ?>