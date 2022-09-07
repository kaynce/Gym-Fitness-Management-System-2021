<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }
 ?>


	<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left" >
				
					<div class="sidebar-header">

						<div class="sidebar-title text-primary">
							Navigation
						</div>

						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle" >
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
									
									<li class="nav-parent <?php echo $nav_dashboard_expanded ?> <?php echo $nav_active_dashboard ?>">
										<a>
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
										<ul class="nav nav-children ">
											
											<li class="<?php echo $nav_active_dashboard_dashboard ?>">
												<a href="index">
													Dashboard
												</a>
											</li>

											<!-- <li class="<?php echo $nav_active_add_new_pendings ?>">
												<a href="add_renew_pendings.php">
													Add/Renew Pendings
												</a>
											</li> -->

											<li class="<?php echo $nav_active_members_decline ?>">
												<a href="members_declined">
													Membership Declined
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent <?php echo $nav_dashboard_expanded_add_renew ?> <?php echo $nav_active_dashboard_add_renew ?>">
										<a>
											<i class="fa fa-plus" aria-hidden="true"></i>
											<span> Add/Renewal</span>
										</a>
										<ul class="nav nav-children ">
											
											<li class="<?php echo $nav_active_add_renew ?>">
												<a href="add_renewal">
													Add/Renewal 
												</a>
											</li>

											<!-- <li class="<?php echo $nav_active_add_new_pendings ?>">
												<a href="add_renew_pendings.php">
													Add/Renew Pendings
												</a>
											</li> -->

											<li class="<?php  echo $nav_active_add_renew_pendings ?>">
												<a href="add_renew_pendings">
													Add/Renewal Pendings
												</a>
											</li>
											
										</ul>
									</li>


									<li class="nav-parent <?php echo $nav_dashboard_expanded_payment ?> <?php echo $nav_active_dashboard_payment ?>">
										<a>
											<i class="fa fa-money" aria-hidden="true"></i>
											<span>Payments</span>
										</a>
										<ul class="nav nav-children ">
											<li class="<?php echo $nav_active_payments ?>">
												<a href="payments">
													Payments & Report
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent <?php echo $nav_dashboard_expanded_members ?> <?php echo $nav_active_dashboard_members  ?>">
										<a>
											<i class="fa fa-group" aria-hidden="true"></i>
											<span>Members</span>
										</a>
										<ul class="nav nav-children ">
											<li class="<?php echo $nav_active_members ?>">
												<a href="members">
													Active Members
												</a>
											</li>
											
											<li class="<?php echo $nav_active_archived_members ?>">
												<a href="archived_members">
													Archived Members
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

									<li class="nav-parent <?php echo $nav_dashboard_expanded_a_t ?> <?php echo $nav_active_dashboard_a_t  ?>">
										<a>
											<i class="fa fa-qrcode" aria-hidden="true"></i>
											<span>Attendance</span>
										</a>
										<ul class="nav nav-children ">
											
											<li>
												<a target='_blank' href="attendance_qrcode">
													Attendance QR Code
												</a>
											</li>

											<li class="<?php echo $nav_active_a_t ?>">
												<a href="attendance_today">
													Attendance Today
												</a>
											</li>
											
											<!-- <li class="<?php echo $nav_active_a ?>">
												<a href="attendance.php">
													List of Attendance
												</a>
											</li> -->

											<li class="nav-parent <?php echo $nav_dashboard_expanded_client_trainor ?> <?php echo $nav_active_dashboard_client_trainor ?>">
												<a>List of Attendance</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_a_clients ?>">
														<a href="attendance?action=clients">
															Clients
														</a>
													</li>
													<li class="<?php echo $nav_active_a_trainors ?>">
														<a href="attendance?action=trainors">
															Trainors
														</a>
													</li>
												</ul>
											</li>

											
										</ul>
									</li>

									<li class="nav-parent <?php echo $nav_dashboard_expanded_schedules ?> <?php echo $nav_active_dashboard_schedules  ?>">
										<a>
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span>Schedule</span>
										</a>
										<ul class="nav nav-children ">
										<!-- 	<li>
												<a href="add_member.php">
													Add Member
												</a>
											</li> -->
											<li class="<?php echo $nav_active_schedules ?>">
												<a href="schedules">
													List of Schedules
												</a>
											</li>
											
										</ul>
									</li>

									<li class=" <?php echo $nav_dashboard_expanded_annoucement  ?> <?php echo $nav_active_dashboard_annoucement   ?>">
										<a href="announcement">
											<i class="fa fa-bullhorn" aria-hidden="true"></i>
											<span>Announcement</span>
										</a>
									</li>


									<li class="nav-parent <?php echo $nav_dashboard_expanded_f_g ?> <?php echo $nav_active_dashboard_f_g  ?>">
										<a>
											<i class="fa fa-child" aria-hidden="true"></i>
											<span>Fitness Goals</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo $nav_active_f_g ?>">
												<a href="fitness_goals">
													List of Fitness Goals
												</a>
											</li>
											
										</ul>
									</li>

									<!-- <li class=" <?php echo $nav_dashboard_expanded_gym_equip ?> <?php echo $nav_active_dashboard_gym_equip  ?>">
										<a href="gym_equipment">
											<i class="fa fa-rebel" aria-hidden="true"></i>
											<span>Gym Equipment</span>
										</a>
									</li> -->

									<li class="nav-parent <?php echo $nav_dashboard_expanded_t_classes ?> <?php echo $nav_active_dashboard_t_classes  ?>">
										<a>
											<i class="fa fa-play" aria-hidden="true"></i>
											<span>Physical Fitness</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo $nav_active_a_class ?>">
												<a href="add_physical_fitness">
													Add Physical Fitness
												</a>
											</li>
											<li class="<?php echo $nav_active_p_fitness ?>">
												<a href="physical_fitness">
													Physical Fitness Activities
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent <?php echo $nav_dashboard_expanded_r ?> <?php echo $nav_active_dashboard_r  ?>">
										<a>
											<i class="fa fa-level-up" aria-hidden="true"></i>
											<span>Rates</span>
										</a>
										<ul class="nav nav-children">
											
											<li class="nav-parent <?php echo $nav_dashboard_expanded_l_r ?> <?php echo $nav_active_dashboard_l_r  ?>">
												<a>List of Rates</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_w_i ?>">
														<a href="walk_in">Walk in</a>
													</li>
													<li class="<?php echo $nav_active_p ?>">
														<a href="packages">Packages</a>
													</li>
													<!-- <li>
														<a href="personal_training.php">Personal Training </a>
													</li> -->
												</ul>
											</li>
										</ul>
									</li>

									<li class=" <?php echo $nav_dashboard_expanded_cts ?> <?php echo $nav_active_dashboard_cts  ?>">
										<a href="classes_timetable_schedule">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span>Classes Timetable Schedule</span>
										</a>
									</li>
									
									<li class="nav-parent <?php echo $nav_dashboard_expanded_trainors ?> <?php echo $nav_active_dashboard_trainors  ?>">
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
											<li class="<?php echo $nav_active_trainors ?>">
												<a href="trainors">
													List of Trainors
												</a>
											</li>
											
											<li class="<?php echo $nav_active_trainors_pf ?>">
												<a href="trainors_physical_fitness">
													Trainor's Physical Fitness
												</a>
											</li>

										</ul>
									</li>

									

									<li class="nav-parent <?php echo $nav_dashboard_expanded_h_status ?> <?php echo $nav_active_dashboard_h_status  ?>">
										<a>
											<i class="fa fa-heart" aria-hidden="true"></i>
											<span>Health Status</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo $nav_active_h_members ?>">
												<a href="health_status">
													List of Members
												</a>
											</li>
											
										</ul>
									</li>

									<li class="  <?php echo $nav_active_dashboard_cw  ?>">
									<a href="completed_sessions">
										<i class="fa fa-fire" aria-hidden="true"></i>
										<span>Completed Sessions</span>
										</a>
									</li>
										
									<li class="nav-parent <?php echo $nav_dashboard_expanded_users ?> <?php echo $nav_active_dashboard_users  ?>">
										<a>
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Users</span>
										</a>
										<ul class="nav nav-children">
										
											<li class="<?php echo $nav_active_users ?>">
												<a href="users">
													List of Users
												</a>
											</li>

											<li class="<?php echo $nav_active_archived_users ?>">
												<a href="archived_trainors">
													Archived Users
												</a>
											</li>

											<li class="<?php echo $nav_active_declined_users ?>">
												<a href="declined_users">
													 Declined Users
												</a>
											</li>

										</ul>
									</li>

									<li class="  <?php echo $nav_active_dashboard_comments  ?>">
										<a href="comments">
											<i class="fa fa-comments" aria-hidden="true"></i>
											<span>Comments</span>
										</a>
									</li>

									<li class="nav-parent <?php echo $nav_dashboard_expanded_a_account ?> <?php echo $nav_active_dashboard_a_account  ?>">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Account</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo $nav_active_my_profile ?>">
												<a href="my_profile">
													My Profile
												</a>
											</li>
											<li class="<?php echo $nav_active_new_password ?>">
												<a href="new_password">
													Change Password
												</a>
											</li>
											<li>
												<a href="admin_logout">
													Logout
												</a>
											</li>

										</ul>
									</li>



									<li class="nav-parent <?php echo $nav_dashboard_expanded_settings ?> <?php echo $nav_active_dashboard_settings  ?>">
										<a>
											<i class="fa fa-cog" aria-hidden="true"></i>
											<span>Settings</span>
										</a>
										<ul class="nav nav-children">
											<li class="<?php echo $nav_active_dashboard_settings_set_1 ?>">
												<a href="settings_set_1">
													Set 1
												</a>
											</li>
											<li class="<?php echo $nav_active_dashboard_settings_set_2 ?>">
												<a href="settings_set_2">
													Set 2
												</a>
											</li>
											
											<!-- <li class="nav-parent <?php echo $nav_dashboard_expanded_settings = "nav-expanded";
 ?> <?php echo $nav_active_dashboard_settings_address  ?>">
												<a>Address</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_region ?>">
														<a href="settings_address?address=region">Add Region</a>
													</li>
													<li class="<?php echo $nav_active_province ?>">
														<a href="settings_address?address=province">Add Province</a>
													</li>
													<li class="<?php echo $nav_active_city ?>">
														<a href="settings_address?address=city">Add City</a>
													</li>
													<li class="<?php echo $nav_active_barangay ?>">
														<a href="settings_address?address=barangay">Add Barangay</a>
													</li>
												</ul>
											</li> -->
										

										</ul>
									</li>

									<?php }else if($type == 'sub_admin'){ ?>

									 <?php 
									 	//Check if the user is approved or pending
										$query_status = "SELECT * FROM `users` WHERE user_id = '$user_id' ";
										$result_status = mysqli_query($con, $query_status);
										$row_status = mysqli_fetch_assoc($result_status);

										$user_status = $row_status['status'];

										if($user_status == 'pending'){
									?>
											<li class="nav-parent <?php echo $nav_dashboard_expanded_a_account ?> <?php echo $nav_active_dashboard_a_account  ?>">
												<a>
													<i class="fa fa-user" aria-hidden="true"></i>
													<span>Account</span>
												</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_my_profile ?>">
														<a href="my_profile">
															My Profile
														</a>
													</li>
													<li class="<?php echo $nav_active_new_password ?>">
														<a href="new_password">
															Change Password
														</a>
													</li>
													<li>
														<a href="admin_logout">
															Logout
														</a>
													</li>

												</ul>
											</li>

										
										<?php }else{ ?>
											<li class="nav-parent <?php echo $nav_dashboard_expanded ?> <?php echo $nav_active_dashboard ?>">
												<a>
													<i class="fa fa-home" aria-hidden="true"></i>
													<span>Dashboard</span>
												</a>
												<ul class="nav nav-children ">
													
													<li class="<?php echo $nav_active_dashboard_dashboard ?>">
														<a href="index">
															Dashboard
														</a>
													</li>

													<li class="<?php echo $nav_active_members_decline ?>">
														<a href="members_declined">
															Membership Declined
														</a>
													</li>
													
												</ul>
											</li>

											<li class="nav-parent <?php echo $nav_dashboard_expanded_add_renew ?> <?php echo $nav_active_dashboard_add_renew ?>">
												<a>
													<i class="fa fa-plus" aria-hidden="true"></i>
													<span> Add/Renewal</span>
												</a>
												<ul class="nav nav-children ">
													
													<li class="<?php echo $nav_active_add_renew ?>">
														<a href="add_renewal">
															Add/Renewal 
														</a>
													</li>

													<!-- <li class="<?php echo $nav_active_add_new_pendings ?>">
														<a href="add_renew_pendings.php">
															Add/Renew Pendings
														</a>
													</li> -->

													<li class="<?php  echo $nav_active_add_renew_pendings ?>">
														<a href="add_renew_pendings">
															Add/Renewal Pendings
														</a>
													</li>
													
												</ul>
											</li>


											<li class="nav-parent <?php echo $nav_dashboard_expanded_members ?> <?php echo $nav_active_dashboard_members  ?>">
												<a>
													<i class="fa fa-group" aria-hidden="true"></i>
													<span>Members</span>
												</a>
												<ul class="nav nav-children ">
													<li class="<?php echo $nav_active_members ?>">
														<a href="members">
															Active Members
														</a>
													</li>
													
													<li class="<?php echo $nav_active_archived_members ?>">
														<a href="archived_members">
															Archived Members
														</a>
													</li>
												</ul>
											</li>

											<li class="nav-parent <?php echo $nav_dashboard_expanded_a_t ?> <?php echo $nav_active_dashboard_a_t  ?>">
												<a>
													<i class="fa fa-qrcode" aria-hidden="true"></i>
													<span>Attendance</span>
												</a>
												<ul class="nav nav-children ">
													
													<li>
														<a target='_blank' href="attendance_qrcode">
															Attendance QR Code
														</a>
													</li>

													<li class="<?php echo $nav_active_a_t ?>">
														<a href="attendance_today">
															Attendance Today
														</a>
													</li>
													
													<!-- <li class="<?php echo $nav_active_a ?>">
														<a href="attendance.php">
															List of Attendance
														</a>
													</li> -->

													<li class="nav-parent <?php echo $nav_dashboard_expanded_client_trainor ?> <?php echo $nav_active_dashboard_client_trainor ?>">
														<a>List of Attendance</a>
														<ul class="nav nav-children">
															<li class="<?php echo $nav_active_a_clients ?>">
																<a href="attendance?action=clients">
																	Clients
																</a>
															</li>
															<li class="<?php echo $nav_active_a_trainors ?>">
																<a href="attendance?action=trainors">
																	Trainors
																</a>
															</li>
														</ul>
													</li>

													
												</ul>
											</li>

											<li class="nav-parent <?php echo $nav_dashboard_expanded_schedules ?> <?php echo $nav_active_dashboard_schedules  ?>">
												<a>
													<i class="fa fa-calendar" aria-hidden="true"></i>
													<span>Schedule</span>
												</a>
												<ul class="nav nav-children ">
												<!-- 	<li>
														<a href="add_member.php">
															Add Member
														</a>
													</li> -->
													<li class="<?php echo $nav_active_schedules ?>">
														<a href="schedules">
															List of Schedules
														</a>
													</li>
													
												</ul>
											</li>


											<li class="nav-parent <?php echo $nav_dashboard_expanded_f_g ?> <?php echo $nav_active_dashboard_f_g  ?>">
												<a>
													<i class="fa fa-child" aria-hidden="true"></i>
													<span>Fitness Goals</span>
												</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_f_g ?>">
														<a href="fitness_goals">
															List of Fitness Goals
														</a>
													</li>
													
												</ul>
											</li>

											<li class=" <?php echo $nav_dashboard_expanded_cts ?> <?php echo $nav_active_dashboard_cts  ?>">
												<a href="classes_timetable_schedule">
													<i class="fa fa-calendar" aria-hidden="true"></i>
													<span>Classes Timetable Schedule</span>
												</a>
											</li>
											
											<li class="nav-parent <?php echo $nav_dashboard_expanded_trainors ?> <?php echo $nav_active_dashboard_trainors  ?>">
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
													<li class="<?php echo $nav_active_trainors ?>">
														<a href="trainors">
															List of Trainors
														</a>
													</li>
													
													<li class="<?php echo $nav_active_trainors_pf ?>">
														<a href="trainors_physical_fitness">
															Trainor's Physical Fitness
														</a>
													</li>

												</ul>
											</li>

											

											<li class="nav-parent <?php echo $nav_dashboard_expanded_h_status ?> <?php echo $nav_active_dashboard_h_status  ?>">
												<a>
													<i class="fa fa-heart" aria-hidden="true"></i>
													<span>Health Status</span>
												</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_h_members ?>">
														<a href="health_status">
															List of Members
														</a>
													</li>
													
												</ul>
											</li>

											<li class="  <?php echo $nav_active_dashboard_cw  ?>">
											<a href="completed_sessions">
												<i class="fa fa-fire" aria-hidden="true"></i>
												<span>Completed Sessions</span>
												</a>
											</li>

											<li class="nav-parent <?php echo $nav_dashboard_expanded_a_account ?> <?php echo $nav_active_dashboard_a_account  ?>">
												<a>
													<i class="fa fa-user" aria-hidden="true"></i>
													<span>Account</span>
												</a>
												<ul class="nav nav-children">
													<li class="<?php echo $nav_active_my_profile ?>">
														<a href="my_profile">
															My Profile
														</a>
													</li>
													<li class="<?php echo $nav_active_new_password ?>">
														<a href="new_password">
															Change Password
														</a>
													</li>
													<li>
														<a href="admin_logout">
															Logout
														</a>
													</li>

												</ul>
											</li>

										<?php } ?>

									<?php 
										} else {		
									 ?>

									 	<li class=" <?php echo $nav_dashboard_expanded ?> <?php echo $nav_active_dashboard ?>">
											<a href="index.php">
												<i class="fa fa-home" aria-hidden="true"></i>
												<span>Dashboard</span>
											</a>
										</li>

										<li class="<?php echo $nav_active_trainor ?>">
											<a href="attendance">
												<i class="fa fa-qrcode" aria-hidden="true"></i>
												<span>Attendance</span>
											</a>
										</li>
										
										 <?php 
										 	//Get the email and then check if the email is already verified
											$query_email = "SELECT * FROM `users` WHERE user_id = '$user_id' ";
											$result_email = mysqli_query($con, $query_email);
											$row_email = mysqli_fetch_assoc($result_email);

											$user_email = $row_email['email'];

											//Check if the email is verified
											$query_check = "SELECT * FROM `verified_email` WHERE email = '$user_email' ";
											$result_check = mysqli_query($con, $query_check);
											$row_check = mysqli_fetch_assoc($result_check);

											$status_check = $row_check['status'];

											if($status_check == 1){
										  ?>

										<li class="nav-parent <?php echo $nav_dashboard_expanded_f_g ?> <?php echo $nav_active_dashboard_f_g  ?>">
											<a>
												<i class="fa fa-child" aria-hidden="true"></i>
												<span>Fitness Goals</span>
											</a>
											<ul class="nav nav-children">
												<li class="<?php echo $nav_active_f_g ?>">
													<a href="fitness_goals">
														List of Fitness Goals
													</a>
												</li>
												
											</ul>
										</li>
									
										<li class="nav-parent <?php echo $nav_dashboard_expanded_h_status ?> <?php echo $nav_active_dashboard_h_status  ?>">
											<a>
												<i class="fa fa-heart" aria-hidden="true"></i>
												<span>Health Status</span>
											</a>
											<ul class="nav nav-children">
												<li class="<?php echo $nav_active_h_members ?>">
													<a href="health_status">
														List of Members
													</a>
												</li>
													
											</ul>
										</li>

										<li class="  <?php echo $nav_active_dashboard_cw  ?>">
											<a href="completed_sessions">
												<i class="fa fa-fire" aria-hidden="true"></i>
												<span>Completed Sessions</span>
											</a>
										</li>

									<?php }//End check ?>
										<li class="nav-parent <?php echo $nav_dashboard_expanded_a_account ?> <?php echo $nav_active_dashboard_a_account  ?>">
											<a>
												<i class="fa fa-align-left" aria-hidden="true"></i>
												<span>Account</span>
											</a>
											<ul class="nav nav-children">
												<li class="<?php echo $nav_active_my_profile ?>">
													<a href="my_profile">
														My Profile
													</a>
												</li>
												<li class="<?php echo $nav_active_new_password ?>">
												<a href="new_password.php">
													Change Password
												</a>
												</li>
												<li>
													<a href="admin_logout">
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