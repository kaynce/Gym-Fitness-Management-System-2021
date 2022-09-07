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
								                                  ?>
								                                  echo "<option value='<?php echo $row['region_id']; ?>' <?php echo isset($region) && $region == $row['region_id'] ? 'selected' : '' ?> ><?php echo $row['region_name']; ?></option>";
								                                  <?php
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
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">City/Municipality</label>
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


	                                       			<div class="form-group">
	                                            
	                                                	<div id="trainor_info_reg">

	                                           			</div>
	                                       			</div>


												</div>

												<div id="w4-billing" class="tab-pane">
													<div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="type">Method of Payment</label>
														<div class="col-md-6">
														
														 <select type="text" name="payment_method"   id="payment_method"  class="form-control" onchange="paymentMethod(this.value)" value=""  required="required">
															<option></option>
														 	<option  value="cash">CASH</option>
														    <option  value="gcash">GCASH</option>
													    </select>
														</div>
													</div>

				                                	<div class="form-group">
	                                                	<div id="payment_method_info">
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

			
						<div class="col-md-12 col-md-5">
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

						<!-- <div class="col-md-12 col-md-7">
							<section class="panel panel-featured-left panel-featured-primary">
								<div class="panel-body">
									<div class="table-responsive" style="height: 180px; /*make this as the height for 3 rows*/overflow: scroll;">
										<h4 class="text-uppercase text-semibold text-dark">Announcement</h4>

										<table class="table table-striped mb-none" id="datatable-default">
											<thead>
											<tr class="text-uppercase text-semibold text-dark">
												<th>#</th>
												 <th>Action</th>
												  <th>Date</th>
						                          <th>Message</th>
						                        </tr>
						                      </thead>
						                      <tbody>
						                        <?php 
						                          $i = 1;
						                          $type = 'announcement';
						                          $query = "SELECT * FROM `notifications` WHERE type = '$type' ORDER BY id DESC";
						                          $result = mysqli_query($con, $query);

						                          while($row = mysqli_fetch_assoc($result)):
						                         ?>
						                          <tr>
						                            <td><?php echo $i++; ?></td>
						                            <td>
						                              <a type="button" href="assets/ajax/view_announcement.php?id=<?php echo $row['id']; ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
						                            </td>

						                             <td>
						                              <?php 
						                                if(!empty($row['date_created'])){
						                                  echo date("M d, Y", strtotime($row['date_created']));
						                                } 
						                              ?>
						                            </td>
						                            
						                            <td>
						                            	<?php
															 echo substr($row['alert_message'], 0, 20); 

															 if(strlen($row['alert_message']) > 20){
														?>
															 ...
														<?php } ?>
						                            </td>
						                           
						                          </tr>
						                        <?php endwhile; ?>
						                      </tbody>
						                    </table>

			                 		 </div>
			                	</div>
			                </section>
			            </div> -->
							        
					
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


																<div class="form-group">
																	<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="type">Method of Payment</label>
																	<div class="col-md-6">
																	
																	 <select type="text" name="payment_method"   id="payment_method"  class="form-control" onchange="paymentMethod(this.value)" value=""  required="required">
																		<option></option>
																	 	<option  value="cash">CASH</option>
																	    <option  value="gcash">GCASH</option>
																    </select>
																	</div>
																</div>

							                                	<div class="form-group">
				                                                	<div id="payment_method_info">
				                                           			</div>
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


<script src="assets/js/address_function.js"></script>

<script src="assets/js/validate_function.js"></script>
<!-- <script  src="assets/js/submit_function.js"></script> -->

<!-- Start Submit registration function -->
<!-- <script src="assets/js/submit_function.js"></script> -->
<!-- Submit registration function -->
<script src="assets/js/submit_registration_function.js"></script>
<!-- End Submit registration function -->

<!-- Start Add more/renew function -->
<script src="assets/js/add_renew_function.js"></script>

<!-- Fitness function -->
<script src="assets/js/fitness_function.js"></script>
