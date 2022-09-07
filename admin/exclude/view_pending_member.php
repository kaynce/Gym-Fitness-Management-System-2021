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
									
									<li class="nav-parent nav-expanded nav-active">
										<a>
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
										<ul class="nav nav-children ">
											
											<li class="nav-active">
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
											<li>
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

									<!-- <li class="">
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
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
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
			           $id = $_GET['id'];
			           $i = 1;
			           $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM pending_members WHERE status ='pending' AND id = '$id' ORDER BY concat(lastname,', ',firstname) desc ";
			           $result = mysqli_query($con, $query);
			           $number=1;
			           $row = mysqli_fetch_array($result);
			        ?>


					<div class="row">
						

						<!--             First card -->
				            <div class="col-md-12">
				                <section class="panel">
				                  <header class="panel-heading">
				                    <div class="panel-actions">
				                    <!--   <a href="#" class="fa fa-caret-down"></a> -->
				                      <!-- <a href="#" class="fa fa-times"></a> -->
				                    </div>
				              
				                    <h2 class="panel-title"><a href="index.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2>
				                  </header>
				                  <div class="panel-body">
				                    <form class="form-horizontal form-bordered" method="get">

				                    <div class="col-md-6">
				                    	
				                  
				                     <!-- <div class="form-group">
					                    <label class="col-md-3 control-label" for="inputReadOnly">Member ID: </label>
					                        <div class="col-md-6">
					         
					                            <p class="form-control-static"><?php echo $row['member_id']; ?></p>
					                        </div>
					                 </div>  -->


				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Name: </label>
				                        <div class="col-md-6">
				                          <!-- <input type="text" value="<?php echo $row['name'] ?>" id="inputReadOnly" class="form-control" readonly="readonly"> -->
				                          <p class="form-control-static"><?php echo $row['name'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Age: </label>
				                        <div class="col-md-6">
				                       
				                          <p class="form-control-static"><?php echo $row['age'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Gender: </label>
				                        <div class="col-md-6">

				                          <p class="form-control-static"><?php echo $row['gender'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Date Registration: </label>
				                        <div class="col-md-6">
				              
				                          <p class="form-control-static"><?php echo $row['date_created'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Height</label>
				                        <div class="col-md-6">
				     
				                          <p class="form-control-static"><?php echo $row['height'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Weight</label>
				                        <div class="col-md-6">

				                          <p class="form-control-static"><?php echo $row['weight'] ?></p>
				                        </div>
				                      </div>

				                   </div>

				                   <div class="col-md-6">
				                   	
				                   		  <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Address: </label>
						                        <div class="col-md-6">
						                        
						                            <p class="form-control-static"><?php echo $row['address'] ?></p>
						                        </div>
						                      </div>

						                      <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Phone Number: </label>
						                        <div class="col-md-6">
						                         
						                            <p class="form-control-static"><?php echo $row['contact'] ?></p>
						                        </div>
						                      </div>

						                      <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Email: </label>
						                        <div class="col-md-6">
						      
						                            <p class="form-control-static"><?php echo $row['email'] ?></p>
						                        </div>
						                      </div>

						                      <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Training Class: </label>
						                        <div class="col-md-6">
						                      
						                            
						                             <?php

		                                                $training_classes_id = $row['training_classes'];

		  
		                                                $query = $con->query("SELECT * FROM `training_classes`");

		                                                while($row_training_classes=mysqli_fetch_assoc($query)):

		                                              ?>

		                                                  <?php if ($training_classes_id == $row_training_classes['training_class_id']): ?>

		                                                  	    <?php 
		                                                  	    	$training_classes_name = $row_training_classes['training_classes_name'];
		                                                  	     ?>

		                                                        <p class="form-control-static"> <?php echo $row_training_classes['training_classes_name'] ?></p>

		                                                  <?php endif ?>

		                                              <?php endwhile; ?>

						                        </div>
						                      </div>

						                      <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Client Type: </label>
						                        <div class="col-md-6">
						      
						                            <p class="form-control-static"><?php echo $row['client_type'] ?></p>
						                        </div>
						                      </div>

						                      <div class="form-group">
		                                          <label class="col-md-3 control-label" for="inputReadOnly">Client's Trainor: </label>
		                                          <div class="col-md-6">
		                                              <?php

		                                                $trainor_id = $row['trainor'];

		  
		                                                $query = $con->query("SELECT *,concat(lastname,', ',firstname) as name from users WHERE status ='approved' AND type = 'trainor' ");

		                                                while($row_user= mysqli_fetch_assoc($query)):

		                                              ?>

		                                                  <?php if ($trainor_id == $row_user['user_id']): ?>

		                                                        <p class="form-control-static"> <?php echo $row_user['name'] ?></p>

		                                                  <?php endif; ?>

		                                              <?php endwhile; ?>

		                                    
		                                          </div>
		                                      </div> 
                                      
						                      <?php if ($row['walk_in'] == 'YES'): ?>

						                       <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Walk in: </label>
						                        <div class="col-md-6" style="font-size: 20px;">
						         					
			
						                             <?php
		  												
		  												$package_id = $row['package'];

		  												$client_type = $row['client_type'];

		                                                $query = "SELECT * FROM `training_classes_walk_in_rates`";
		                                                $result = mysqli_query($con, $query);

		                                                while($row_cpr=mysqli_fetch_assoc($result)):

		                                              ?>

		                                                  <?php if ($training_classes_id == $row_cpr['training_class_id']): 

		                                                  			//if ($package_id == $row_cpr['package_id']): 
		                                                  	?>			
		                                                  				<p class="form-control-static"> Training Class: 
		                                                        			<strong>
		                                                        			<?php echo $training_classes_name ?>
		                                                        			</strong>
		                                                        	    </p>


		                                                        		<p class="form-control-static"> Duration: 
		                                                        			<strong>
		                                                        			1 Day
		                                                        			</strong>
		                                                        	    </p>

		                                                        	

		                                                        		<?php 
		                                                        			if ($client_type == 'student'){
		                                                        		 ?>
		                                                        				<p class="form-control-static"> Amount: 
		                                                        					<strong>
		                                                        						<?php echo $row_cpr['student_amount'] ?>	
		                                                        					</strong>
		                                                        				</p>
		                                                        		<?php 
		                                                        			}else{
		                                                        		 ?>
		                                                        		 		<p class="form-control-static"> Amount: 
		                                                        		 			<strong>
		                                                        		 				<?php echo number_format($row_cpr['non_student_amount'], 2) ?>			
		                                                        		 			</strong>
		                                                        		 		</p>
		                                                        		 <?php 
		                                                        		 	}
		                                                        		  ?>

		                                                  <?php 
		                                                  					
		                                              			//endif;
		                                              		endif;
		                                              	  ?>

		                                              <?php endwhile; ?>

						                        </div>
						                      </div>
						                     <?php endif ?>

						                      <?php if ($row['walk_in'] == 'NO'): ?>
						                      	
						                    
							                      <div class="form-group">
							                        <label class="col-md-3 control-label" for="inputReadOnly">Package: </label>
							                        <div class="col-md-6" style="font-size: 20px;">
							         					
				
							                             <?php
			  												
			  												$package_id = $row['package'];
			  												$client_type = $row['client_type'];

			                                                $query = "SELECT * FROM `training_classes_packages_rates`";
			                                                $result = mysqli_query($con, $query);

			                                                while($row_cpr=mysqli_fetch_assoc($result)):

			                                              ?>

			                                                  <?php if ($training_classes_id == $row_cpr['training_class_id']): 

			                                                  			if ($package_id == $row_cpr['package_id']): 
			                                                  	?>	
			                                                        		<p class="form-control-static"> Package Name: 
			                                                        			<strong>
			                                                        			<?php echo $row_cpr['package_name'] ?>
			                                                        			</strong>
			                                                        			</p>

			                                                        		 <?php if(!empty($row_cpr['day'])){ ?> 		
												                        	 		Duration: 
												                        	 		<strong>
												                        	 		<?php echo $row_cpr['day']; ?> Day/s  
												                        	 		</strong>
												                        	 <?php }else if(!empty($row_cpr['week'])) {  ?>
												                        	 		Duration: 
												                        	 		<strong>
												                        	 		<?php echo $row_cpr['week']; ?> Week/s 
												                        	 		</strong>
												                        	 <?php }else if(!empty($row_cpr['month'])) {  ?>
												                        	 	    Duration: 
												                        	 	    <strong>
												                        	 	    <?php echo $row_cpr['month']; ?> Month/s
												                        	 	    </strong>
												                        	 <?php }else{ ?>
												                        	 <?php  } ?>

			                                                        		<p class="form-control-static"> Session: 
			                                                        				<strong>
			                                                        			<?php echo $row_cpr['session'] ?>
			                                                        				</strong>
			                                                        			</p>
			                                                        		<?php 
			                                                        			if ($client_type == 'student'){
			                                                        		 ?>
			                                                        				<p class="form-control-static"> Amount: 
			                                                        					<strong>
			                                                        						<?php echo $row_cpr['package_student_amount'] ?>	
			                                                        					</strong>
			                                                        				</p>
			                                                        		<?php 
			                                                        			}else{
			                                                        		 ?>
			                                                        		 		<p class="form-control-static"> Amount: 
			                                                        		 			<strong>
			                                                        		 				<?php echo $row_cpr['package_non_student_amount'] ?>			
			                                                        		 			</strong>
			                                                        		 		</p>
			                                                        		 <?php 
			                                                        		 	}
			                                                        		  ?>

			                                                  <?php 
			                                                  					
			                                              			endif;
			                                              		endif;
			                                              	  ?>

			                                              <?php endwhile; ?>

							                        </div>
							                      </div>

						                      <?php endif ?>
                     
                      					
				                   </div>

				                </section>
				            </div>
				           <!--  First card -->

						 <!-- Second card -->
        

				            <!-- End third card -->         
				            <div class="col-md-12">
				                <section class="panel">
				                  <header class="panel-heading">
				                    <div class="panel-actions">
				                    <!--   <a href="#" class="fa fa-caret-down"></a> -->
				                      <!-- <a href="#" class="fa fa-times"></a> -->
				                    </div>
				              
				                   <!--  <h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2> -->
				                  </header>
				                  <div class="panel-body">
				                    <form class="form-horizontal form-bordered" method="get">


					                    <div class="form-group">
					                        <label class="col-md-6 control-label" for="inputReadOnly" style="font-size: 20px!important;"><strong>Screenshot of ID: </strong></label>
					                        <div class="">
					                        
					                            <img src="assets/images/users/screenshot_id/<?php echo $row['screenshot_id'];?>" alt="" class="img-responsive img-rounded img-thumbnail" style="height: 100%;">
					                        </div>
					                      </div>  
		


				                    </form>
				                  </div>
				                </section>
				            </div>
				            <!-- End third card --> 

				              <!-- End fourth card -->         
				            <div class="col-md-12">
				                <section class="panel">
				                  <header class="panel-heading">
				                    <div class="panel-actions">
				                    <!--   <a href="#" class="fa fa-caret-down"></a> -->
				                      <!-- <a href="#" class="fa fa-times"></a> -->
				                    </div>
				              
				                   <!--  <h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2> -->
				                  </header>
				                  <div class="panel-body">
				                    <form class="form-horizontal form-bordered" method="get">

				                      	 <div class="form-group">
					                        <label class="col-md-6 control-label" for="inputReadOnly" style="font-size: 20px!important;"><strong>Screenshot of Payment:</strong> </label>
					                        <div class="">
					                         
					                            <img src="assets/images/users/screenshot_payment/<?php echo $row['screenshot_payment'];?>" alt="" class="img-responsive img-rounded img-thumbnail" style="height: 100%;">

					                        </div>
					                    </div>
	
				    

				                    </form>
				                  </div>
				                </section>
				            </div>
				            <!-- End fourth card -->   
						</div>
					

	<!-- 	Start table -->
		<div class="row">
						


		</div>
		
		<?php include('calendar.php'); ?>


		</section>



<?php include('footer.php'); ?>