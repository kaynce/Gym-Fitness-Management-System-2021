<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }
// error_reporting(0);
	 //  unset($_SESSION['nav-active 2']);
	 // $_SESSION['nav-active 1'] = "nav-active 1";
	 $nav_active_1 = "nav-active";
 ?>

<?php include('head.php'); ?>
<style type="text/css">
	
</style>
	
	<?php 
	    	if(isset($_SESSION['loading'])){
				?>
					<script type="text/javascript">
						let timerInterval
						Swal.fire({
						  title: 'Loading...',
						  html: 'I will close in <b></b> milliseconds.',
						  timer: 1500,
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

									// count the total total journey days
									$member_id = $row['member_id'];
							        $select_list = "SELECT DISTINCT log_date FROM `attendance` WHERE member_user_id = '$member_id' ";
							 
							        $result_list = mysqli_query($con, $select_list);

							        $total_days = mysqli_num_rows($result_list);

								}
							}
					}
				?>

				 <?php 
			     		

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
						
										<h2 class="panel-title">Registration for one day of fitness or membership</h2>
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
												<li class="text-uppercase">
													<a href="#w4-profile" data-toggle="tab"><span>2</span>Physical <br> Fitness Info</a>
												</li>
												<li class="text-uppercase">
													<a href="#w4-billing" data-toggle="tab"><span>3</span>Billing Info</a>
												</li>
												<li class="text-uppercase">
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

			
										<form id="registration_form" onsubmit="return Validate(this);" name="registration_form"  class="form-horizontal" novalidate="novalidate"  enctype="multipart/form-data" method="POST"  >
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
															 <select type="text" name="region"   id="region"  class="form-control"  value=""  required="required">
															<option></option>
															 <?php 
												    			$query = "SELECT * FROM region";
												    			$result = $con->query($query);
												    			if ($result->num_rows > 0) {
												    				while ($row = $result->fetch_assoc()) {
												    					echo "<option value='{$row["region_id"]}'>{$row['region_name']}</option>";
												    				}
												    			}else{
												    				echo "<option value=''>region not available</option>"; 
												    			}
												    		?>
													    </select>
														</div>
													</div>


													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Province</label>
														<div class="col-md-6">
															 <select type="text" name="province"   id="province"  class="form-control"  value=""  required="required">
																<option></option>
														    </select>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">City</label>
														<div class="col-md-6">
															<select type="text" name="city"   id="city"  class="form-control"  value=""  required="required">
																<option></option>
														    </select>
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


	                                       			<div class="form-group">
	                                            
	                                                	<div id="trainor_info_reg">

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
                                      									<span>Maximum file size: 10MB</span>
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
																<center><input type="submit" class="mb-xs mt-xs mr-xs btn btn-success pull-right" id="submit" name="submit" value="Submit" style="font-size: 20px"></center>	

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

			

					<header class="page-header">

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

			
						<div class="col-md-12 col-md-6">
							<section class="panel panel-featured-left panel-featured-secondary">
								<div class="panel-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-secondary">
												<i class="fa fa-fire"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Stay Fit on the Road</h4>
												<div class="info">
													<strong class="amount">Day: 
														<?php
															 if(isset($total_days)){
															 	echo $total_days;
															 }else{
															 	echo '0';
															 }
														?>
													</strong>
													<!-- <span class="text-primary">(14 unread)</span> -->
												</div>
											</div>
											<div class="summary-footer">
												<!-- <a class="text-muted text-uppercase">(view all)</a> -->
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
				
					
					<!-- start: page -->
					
						<div class="row">
							<div class="col-xs-12">
								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<!-- <a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a> -->
										</div>
						
										<h2 class="panel-title ">Renewal/Add More</h2>
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
															<li class="active text-a text-uppercase">
																<a href="#w4-account" data-toggle="tab"><span>1</span>Account Info</a>
															</li>
															<li class="text-uppercase">
																<a href="#w4-profile" data-toggle="tab"><span>2</span>Physical <br> Fitness Info</a>
															</li>
															<li class="text-uppercase">
																<a href="#w4-billing" data-toggle="tab"><span>3</span>Billing Info  & <br>Confirmation</a>
															</li>
															
														</ul>
													</div>	
													
													
						
													<form id="add_renew_form" onsubmit="return validateRenew(this);" name="add_renew_form"  class="form-horizontal" novalidate="novalidate"  enctype="multipart/form-data" method="POST">
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

			                                       				<div class="form-group">
				                                                	<div id="trainor_info">

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
							                                
							                                        <center><input type="submit" class="mb-xs mt-xs mr-xs btn btn-success pull-right" id="submit_renew" name="submit_renew" value="Submit" style="font-size: 20px"></center>	
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

<script type="text/javascript" src="assets/js/address_function.js"></script>
<script type="text/javascript" src="assets/js/validate_function.js"></script>
<script type="text/javascript" src="assets/js/submit_function.js"></script>

<!-- Add more/renew function -->
<script type="text/javascript" >
	
    	//For submit_renew check file size
document.getElementById("submit_renew").addEventListener("click", function showFileSize() {

	    // (Can't use `typeof FileReader === "function"` because apparently it
	    // comes back as "object" on some browsers. So just see if it's there
	    // at all.)
	    if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
	        Swal.fire({
		        		icon:'warning',
		        		title:'The file API is not supported on this browser yet'
		        	})
	        return;
	    }

	    if($("#screenshot_id_file").length == 0) {
		  //if screenshot id file doesn't exist
		  	let input_payment_file = document.getElementById('screenshot_payment_file');
		    if (!input_payment_file.files) { // This is VERY unlikely, browser support is near-universal
		         //alert("This browser doesn't seem to support the `files` property of file inputs.");
		          Swal.fire({
		        		icon:'warning',
		        		title:'This browser does not seem to support the files property of file inputs'
		        	})
		    }else {
		        let payment_file = input_payment_file.files[0];

		        if(payment_file.size > 10000000){

		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	 //alert("File " + payment_file.size + " bytes in size");

		        	Swal.fire({
		        		icon:'warning',
		        		title:'Maximum payment file allowed: 10MB'
		        	})
		        }else{
		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})
		        	
		        	//alert('less than 10mb');
		        	//Call the submitRenew function
		        	submitRenew();
		        }
		    }

		}else{
			//if screenshot id, payment file exist
			let input_id_file = document.getElementById('screenshot_id_file');
		  	let input_payment_file = document.getElementById('screenshot_payment_file');
		    if (!input_id_file.files && !input_payment_file.files) { // This is VERY unlikely, browser support is near-universal
		          Swal.fire({
		        		icon:'warning',
		        		title:'This browser does not seem to support the files property of file inputs'
		        	})
		    }else{
		        let id_file = input_id_file.files[0];
		        let payment_file = input_payment_file.files[0];

		        if(id_file.size > 10000000 || payment_file.size > 10000000){
		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	if(id_file.size > 10000000 && payment_file.size < 10000000){
		        		Swal.fire({
			        		icon:'warning',
			        		title:'Maximum id file allowed: 10MB'
			        	})
		        	}else if(id_file.size < 10000000 && payment_file.size > 10000000){
		        		Swal.fire({
			        		icon:'warning',
			        		title:'Maximum payment file allowed: 10MB'
			        	})
		        	}else{
		        		Swal.fire({
			        		icon:'warning',
			        		title:'Maximum id & payment file allowed: 10MB'
			        	})
		        	}
		        	
		        	
		        }else{

		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	//alert('less than 10mb');
		        	//Call the submitRenew function
		        	submitRenew();
		        }

		    }
		}
	    
	});
	//End

	function submitRenew(){

		// // START CHECK IF THE FILE IS NOT A IMAGE WITHOUT CHECKING THE EXTENSION
		// const file = this.files[0];
		// const  fileType = file['type'];
		// const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
		// if (!validImageTypes.includes(fileType)) {
		//     // invalid file type code goes here.
		// }

		// var file = this.files[0];
		// var fileType = file["type"];
		// var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
		// if ($.inArray(fileType, validImageTypes) < 0) {
		//      // invalid file type code goes here.
		// }
		// // End CHECK IF THE FILE IS NOT A IMAGE WITHOUT CHECKING THE EXTENSION


		let screenshot_payment_file = document.getElementById('screenshot_payment_file');

		if(screenshot_payment_file.files.length == 0 ){
	    	
	   		Swal.fire({
			           icon: 'info',
			           title: 'Screenshot of payment is required',
			})

       }else{

       		var form_data = new FormData($("#add_renew_form")[0]);

	        $.ajax({  
	            url:'../dashboard/client_ajax.php?action=client_renew_action',
	            type:'post',
	            data:form_data,
	            contentType: false,
	    		processData: false,
	    		success:function(data, resp){

	    			console.log(data);
	    			console.log(resp);

					if(data == 1){

						Swal.fire({
						    icon: 'success',
							title:'Submitted Successfully!',
							text: 'It will be approved by the administrator in a matter of minutes',
							allowOutsideClick: false
						}).then((result) => {
								// if (result.value) {
							window.location.href = 'index';
								// }
												        		
						})
					}else if(data == 2){

						Swal.fire({
				          icon: 'warning',
				          title: 'Allowed: extensions: jpg, jpeg & png'

				        })

					}else if(data == 3){

						Swal.fire({
				          icon: 'warning',
				          title: 'Something went wrong'

				        })

					}else if(data == 4){

						Swal.fire({
				          icon: 'warning',
				          title: 'Sorry, your file is too large!'
				        })

					}else{

						Swal.fire({
				          icon: 'error',
				          title: 'Failed to submit!',

				        })

					}

				}

	       }); 
        //End ajax

	   }

	}
    //End
</script>

<script type="text/javascript">

    
 	 function student_screenshot(str){
             
        if(str == ""){

             document.getElementById("student_screemtshot_file").innerHTML = "";
            return;

        }else if(str=="NON-STUDENT"){

        	 document.getElementById("student_screemtshot_file").innerHTML = "";

            // if (window.XMLHttpRequest) {
            //  // code for IE7+, Firefox, Chrome, Opera, Safari
            //     xmlhttp = new XMLHttpRequest();
            // }
                
            // xmlhttp.onreadystatechange = function() {
            //     if (this.readyState == 4 && this.status == 200) {
            //          document.getElementById("student_screemtshot_file").innerHTML=this.responseText;
            //         }
            // };
                
            // xmlhttp.open("GET","client_ajax.php?action=non_student_packages",true);
            // xmlhttp.send();  

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

    //========Start Registration
     function walkInInfoReg(str){

        if(str == ""){

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else if(str == "YES"){

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";

            if (window.XMLHttpRequest) {
               //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                	document.getElementById("walk_in_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
            xmlhttp.send();  

        }else{

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("walk_in_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
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
            document.getElementById("trainor_info_reg").innerHTML = "";
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
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

     function fitnessInfoReg(str){
             
        if(str==""){

            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else{

            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("fitness_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

     function fitnessInfo2Reg(str){

        var client_type =$('#client_type_reg').val();

        if(str==""){

            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
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
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

    
    function trainorInfoReg(str){


        if(str==""){

            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("trainor_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/trainor_info.php?value="+str, true);
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
            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else if(str == "YES"){

            document.getElementById("walk_in_info").innerHTML = "";
            document.getElementById("walk_in_info2").innerHTML = "";
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("walk_in_info").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
            xmlhttp.send();  

        }else{

            document.getElementById("walk_in_info").innerHTML = "";
            document.getElementById("walk_in_info2").innerHTML = "";
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";

            if (window.XMLHttpRequest) {
               //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("walk_in_info").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
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
            document.getElementById("trainor_info").innerHTML = "";
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
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

    function fitnessInfo(str){
             
        if(str==""){

            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else{
            	
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("fitness_info").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

    function fitnessInfo2(str){

        var client_type =$('#client_type').val();

        if(str==""){

            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";
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
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

     function trainorInfo(str){


        if(str==""){

            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("trainor_info").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/trainor_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

    //===========End Add/Renew
</script>
