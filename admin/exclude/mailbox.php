
<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php include('head.php'); ?>

 <!-- Admin -->
<?php 
       // count the total members in the database
        $select = "SELECT * FROM members WHERE status = 'approved'";
 
        $result = mysqli_query($con, $select);
         
        $total_members = mysqli_num_rows($result);
        
        #Total plans
        // count the total plans in the database
        $select_request = "SELECT * FROM plans";
 
        $result_request = mysqli_query($con, $select_request);
         
        $total_plans = mysqli_num_rows($result_request);

        #Total packages
        // count the total packages in the database
        $select_list = "SELECT * FROM packages";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_packages = mysqli_num_rows($result_list);

        #Total trainers
        // count the total trainers in the database
        $select_list = "SELECT * FROM users WHERE status = 'approved' AND type = 'trainor' ";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_trainers = mysqli_num_rows($result_list);

         #Total trainers
        // count the total trainers in the database
        $select_list = "SELECT * FROM pending_members WHERE status = 'pending'";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_pending_members = mysqli_num_rows($result_list);
     ?>

 <!-- Trainor -->
 <?php 
       #Total clients
        // count the total clients in the database
        $user_id = $_SESSION['user_id'];
        $select_list = "SELECT * FROM members WHERE status = 'approved' AND trainor = '$user_id'";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_clients = mysqli_num_rows($result_list);
  
  ?>	


	
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
									
									<li class="nav-active">
										<a href="mailbox.php">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Mailbox</span>
										</a>
									</li>

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Members</span>
										</a>
										<ul class="nav nav-children ">
											<li>
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

								<!-- 	<li class="nav-parent">
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

				<!-- Start content body -->
					<section role="main" class="content-body">
					<header class="page-header">
						<h2>Mailbox</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Mailbox</span></li>
								<li><span>Inbox</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<section class="content-with-menu mailbox">
						<div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
							<div class="inner-menu-toggle">
								<a href="#" class="inner-menu-expand" data-open="inner-menu">
									Show Menu <i class="fa fa-chevron-right"></i>
								</a>
							</div>
							
							<menu id="content-menu" class="inner-menu" role="menu">
								<div class="nano">
									<div class="nano-content">
							
										<div class="inner-menu-toggle-inside">
											<a href="#" class="inner-menu-collapse">
												<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Menu
											</a>
							
											<a href="#" class="inner-menu-expand" data-open="inner-menu">
												Show Menu <i class="fa fa-chevron-down"></i>
											</a>
										</div>
							
										<div class="inner-menu-content">
											<a href="mailbox_compose.php" class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
												<i class="fa fa-envelope mr-xs"></i>
												Compose
											</a>
							
											<ul class="list-unstyled mt-xl pt-md">
												<li>
													<a href="mailbox-folder.html" class="menu-item active">Inbox <span class="label label-primary text-normal pull-right">43</span></a>
												</li>
												<li>
													<a href="mailbox-folder.html" class="menu-item">Important</a>
												</li>
												<li>
													<a href="mailbox-folder.html" class="menu-item">Sent</a>
												</li>
												<li>
													<a href="mailbox-folder.html" class="menu-item">Drafts</a>
												</li>
												<li>
													<a href="mailbox-folder.html" class="menu-item">Trash</a>
												</li>
											</ul>
							
											<hr class="separator" />
							
											<div class="sidebar-widget m-none">
												<div class="widget-header">
													<h6 class="title">Labels</h6>
													<span class="widget-toggle">+</span>
												</div>
												<div class="widget-content">
													<ul class="list-unstyled mailbox-bullets">
														<li>
															<a href="#" class="menu-item">Dribbble <span class="ball pink"></span></a>
														</li>
														<li>
															<a href="#" class="menu-item">Envato <span class="ball green"></span></a>
														</li>
														<li>
															<a href="#" class="menu-item">Facebook <span class="ball blue"></span></a>
														</li>
													</ul>
												</div>
											</div>
							
											<hr class="separator" />
							
											<div class="sidebar-widget m-none">
												<div class="widget-header">
													<h6 class="title">Chat</h6>
													<span class="widget-toggle">+</span>
												</div>
												<div class="widget-content">
													<ul class="list-unstyled mailbox-bullets">
														<li>
															<a href="#" class="menu-item">Amy Doe <span class="ball green"></span></a>
														</li>
														<li>
															<a href="#" class="menu-item">Joey Doe <span class="ball green"></span></a>
														</li>
														<li>
															<a href="#" class="menu-item">Robert Doe <span class="ball orange"></span></a>
														</li>
														<li>
															<a href="#" class="menu-item">John Doe <span class="ball red"></span></a>
														</li>
														<li>
															<a href="#" class="menu-item">Uncle Doe <span class="ball red"></span></a>
														</li>
														<li class="text-center mt-sm">
															<em><a href="#">show offline</a></em>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</menu>
							<div class="inner-body mailbox-folder">

								<!-- START: .mailbox-header -->
								<header class="mailbox-header">
									<div class="row">
										<div class="col-sm-6">
											<h1 class="mailbox-title text-light m-none">
												<a id="mailboxToggleSidebar" class="sidebar-toggle-btn trigger-toggle-sidebar">
													<span class="line"></span>
													<span class="line"></span>
													<span class="line"></span>
													<span class="line line-angle1"></span>
													<span class="line line-angle2"></span>
												</a>
							
												Inbox
											</h1>
										</div>
										<div class="col-sm-6">
											<div class="search">
												<div class="input-group input-search">
													<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
													<span class="input-group-btn">
														<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</div>
										</div>
									</div>
								</header>
								<!-- END: .mailbox-header -->
							
								<!-- START: .mailbox-actions -->
								<div class="mailbox-actions">
									<ul class="list-unstyled m-none pt-lg pb-lg">
										<li class="ib mr-sm">
											<div class="btn-group">
												<a href="#" class="item-action fa fa-chevron-down dropdown-toggle" data-toggle="dropdown"></a>
							
												<ul class="dropdown-menu" role="menu">
													<li><a href="#">All</a></li>
													<li><a href="#">None</a></li>
													<li><a href="#">Read</a></li>
													<li><a href="#">Unread</a></li>
													<li><a href="#">Starred</a></li>
													<li><a href="#">Unstarred</a></li>
												</ul>
											</div>
										</li>
										<li class="ib mr-sm">
											<a class="item-action fa fa-refresh" href="#"></a>
										</li>
										<li class="ib mr-sm">
											<a class="item-action fa fa-tag" href="#"></a>
										</li>
										<li class="ib">
											<a class="item-action fa fa-times text-danger" href="#"></a>
										</li>
									</ul>
								</div>
								<!-- END: .mailbox-actions -->
							
								<div id="mailbox-email-list" class="mailbox-email-list">
									<div class="nano">
										<div class="nano-content">
											<ul id="" class="list-unstyled">
							
												<li class="unread">
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail1">
																<label for="mail1"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">11:35 am</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<i class="mail-label" style="border-color: #EA4C89"></i>
							
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail2">
																<label for="mail2"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">Check it out.</span>
															</p>
															<i class="mail-attachment fa fa-paperclip"></i>
															<p class="m-none mail-date">3:35 pm</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
												<li>
													<a href="mailbox-email.html">
														<div class="col-sender">
															<div class="checkbox-custom checkbox-text-primary ib">
																<input type="checkbox" id="mail3">
																<label for="mail3"></label>
															</div>
															<p class="m-none ib">Okler Themes</p>
														</div>
														<div class="col-mail">
															<p class="m-none mail-content">
																<span class="subject">Check out our new Porto Admin theme! &nbsp;–&nbsp;</span>
																<span class="mail-partial">We are proud to announce that our new theme Porto Admin is ready, wants to know more about it?</span>
															</p>
															<p class="m-none mail-date">Jul 03</p>
														</div>
													</a>
												</li>
							
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- end: page -->
				</section>				<!-- End content body -->

			</div>
			<?php include('calendar.php'); ?>
		</section>

<script>

 $(document).ready(function(){  

      $(document).on('click', '.approve', function(){  
      	
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

            	var id = $(this).attr("id");  

	            $.ajax({  
	                url:'approve_member_action.php',
	                type:'post',
	                data:{
	                    id:id,
	                },  
	                success:function(data, status){ 

	                	if (status == 'success') {
	                		Swal.fire({
					          icon: 'success',
					          title: 'Approved Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) =>{
					        	 	 window.location.href = 'index.php';
					        })
	                	}
	                },
	                 error: function(ts) { alert(ts.responseText) }
	           }); 

	   

            }
        })     
      }); 

 });  
</script>


<?php include('footer.php'); ?>