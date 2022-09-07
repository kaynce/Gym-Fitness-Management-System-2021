<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }
 ?>



	<aside id="sidebar-left" class="sidebar-left" >
				
					<div class="sidebar-header">

						<div class="sidebar-title text-primary" >
							Navigation
						</div>

						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle" >
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>

					</div >
				
					<div class="nano" >
						<div class="nano-content" >
							<nav id="menu" class="nav-main" role="navigation" >
								<ul class="nav nav-main" >
										<?php 
											// if(isset($_SESSION['nav-active 1'])){
											// 	$nav_active_1 = $_SESSION['nav-active 1'];
											// }

											// if(isset($_SESSION['nav-active 2'])){
											// 	$nav_active_2 = $_SESSION['nav-active 2'];
											// }

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
										
										<?php if($status == 'approved' || $status == 'pending'){ ?>
										 	<li class="<?php echo $nav_active_1 ?>">
												<a href="index">
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Renewal/Add More</span>
												</a>
											</li>
									    <?php }else{ ?>
									    	<li class="<?php echo $nav_active_1 ?>">
												<a href="index">
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Registration</span>
												</a>
											</li>
										<?php } ?>

										<?php if($status == 'approved'){ ?>

										<li class="nav-parent <?php echo $nav_dashboard_expanded_gym ?> <?php echo $nav_active_dashboard_gym ?>">
											<a>
												<i class="fa fa-fire" aria-hidden="true"></i>
												<span>Gym Enrolled</span>
											</a>
											<ul class="nav nav-children">
												<li class="<?php echo $nav_active_gym_membership ?>">
													<a href="walkin-packages">
														Walk In | Packages
													</a>
												</li>
												<li class="<?php echo $nav_active_gym_membership_pending ?>">
												<a href="walkin-packages-pending">
													Walk In | Packages Pending
												</a>
												</li>
											</ul>
										</li>


										<li class="<?php echo $nav_active_attendance ?>">
											<a href="attendance">
												<i class="fa fa-qrcode" aria-hidden="true"></i>
												<span>Attendance</span>
											</a>
										</li>

										<li class="<?php echo $nav_active_f_goals ?>">
											<a href="fitness-goals">
												<i class="fa fa-child" aria-hidden="true"></i>
												<span>Fitness Goals</span>
											</a>
										</li>

										<li class="<?php echo $nav_active_2 ?>">
											<a href="health-status">
												<i class="fa fa-heart" aria-hidden="true"></i>
												<span>Health Status</span>
											</a>
										</li>

										
										<li class="<?php echo $nav_active_qr_code ?>">
											<a href="qr-code">
												<i class="glyphicon glyphicon-qrcode" aria-hidden="true"></i>
												<span>QR Code</span>
											</a>
										</li>

		
										<?php } ?>
										<li class="nav-parent <?php echo $nav_dashboard_expanded_account ?> <?php echo $nav_active_dashboard_account ?>">
											<a>
												<i class="fa fa-user" aria-hidden="true"></i>
												<span>Client Account</span>
											</a>
											<ul class="nav nav-children">
												<li class="<?php echo $nav_active_my_profile ?>">
													<a href="my-profile">
														My Profile
													</a>
												</li>
												<li class="<?php echo $nav_active_c_password ?>">
												<a href="change-password">
													Change Password
												</a>
												</li>
												<li>
													<a href="client_logout_action.php">
														Logout
													</a>
												</li>

											</ul>
										</li>

								<!-- 	  End if else -->
								</ul>
							</nav>
				
							<hr class="separator" />
				

				
						
						</div>
				
					</div>
				
				</aside>
			