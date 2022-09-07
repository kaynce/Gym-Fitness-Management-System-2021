<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
<?php require('assets/db_connect.php'); ?>
<?php require('admin_session.php'); ?>
<?php include('phpqrcode/qrlib.php'); ?>


<!DOCTYPE html>
<html class="fixed">
	<head >
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>HMG Fitness Center | Dashboard </title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />

		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<!-- Web Fonts  -->
		<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> -->

 		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
	

		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />


		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>


		<!-- for pop up sweet-alert, member no reload script -->
        <script  src="assets/vendor/jquery/jquery.min.js"></script>

		<!-- sweetalert -->
   		<script src="assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>

		<!--- Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/admin_style.css"/>

<!-- 		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 -->


		<!-- Modal -->
 
		
		<!-- Vendor CSS -->
		<!-- File upload -->
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Full calendar -->
		<link href="assets/fullcalendar/main.css" rel="stylesheet">
        <script type="text/javascript" src="assets/fullcalendar/main.js"></script>

        <!--    Select css -->
     	<!-- <link rel="stylesheet" href="assets/stylesheets/select2.min.css"/> -->
     	<script type="text/javascript" src="assets/javascripts/select2.min.js"></script>



     	<!-- Camera -->
     	<script type="text/javascript" src="assets/javascripts/instascan.min.js"></script> 
     	

        <!-- 	Mailbox -->
        <link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
     	<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />



<!-- ================================== -->
		<script type="text/javascript" src="assets/javascripts/crypto-js.min.js"></script> 
	<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script> -->
   


	</head>

<body >
<style type="text/css">
	*{
		/*border: 1px solid black!important;*/
	}

.modal-header {
    background-color: #337AB7;
 
    padding:16px 16px;
 
    color:#FFF;
 
    border-bottom:2px dashed #337AB7;
 
 }

	#sidebar-left{
		transition: ease-out 0.3s!important;	
	}

 	.sidebar-header,
	.nano,
	.page-header{
	   background-color: #222834!important;
	}

	.header{
		height: 60px;
	}


</style>



		<section class="body" >
			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="index" class="logo">
						<img src="assets/images/hmg-malolos-gym-logo.png" height="60" width="200" alt="Picture of HMG Fitness Center" style="margin-top: -15px;" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right" >
			
					<span class="separator"></span>
					
					<?php
						$user_id = $_SESSION['user_id'];

						$query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `users` WHERE user_id ='$user_id'";

						$result = mysqli_query($con, $query);

						$row = mysqli_fetch_assoc($result);

						foreach($row as $store =>$catch){
							$$store = $catch;
						}

						if($type == 'admin' || $type == 'sub_admin'){
					?>
						<ul class="notifications">
							
							<li>

								<?php 
									if(isset($nav_active_notifications)){

									    $type = "to_admin";
									    $query = "UPDATE `notifications` 
									                    SET status = '1'
									                WHERE type = '$type' ";
									    $result = mysqli_query($con, $query);
									}
								 ?>

								<?php 
									// count the total members in the database
							        $select = "SELECT * FROM notifications WHERE status = '0' AND type = 'to_admin' ";
							        $result = mysqli_query($con, $select);
							        $total_messages = mysqli_num_rows($result);

								 ?>
								<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
									<i class="fa fa-bell"></i>
									<span class="badge"><?php echo isset($total_messages) ? $total_messages:'' ?></span>
								</a>
								
								<?php 
									// count the total members in the database
							        $select = "SELECT * FROM notifications WHERE type = 'to_admin'";
							        $result = mysqli_query($con, $select);
							        $total_messages = mysqli_num_rows($result);

								 ?>

								<div class="dropdown-menu notification-menu">
									<div class="notification-title">
										<span class="pull-right label label-default"><?php echo isset($total_messages) ? $total_messages:'' ?></span>
										Notifications
									</div>
				
									<div class="content">
										<ul>
											<?php 
												$count = 1;
												$query = "SELECT * FROM `notifications` WHERE type = 'to_admin' ORDER BY id DESC";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result)){
												$count_db = $count++;
												
											 ?>

											 	<?php if($count_db <= 5){ ?>

												 	<?php if($row['status'] == 0){ ?>
														<li style="background-color: #D3D3D3;">
															<a href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class=" modal-with-zoom-anim simple-ajax-modal clearfix">
																<div class="image">
																	<i class="fa fa-thumbs-up bg-sucess"></i>
																</div>
																<span class="title"><?php echo $row['alert_title'] ?>!</span>
																<span class="message">Client email: <?php echo $row['email'] ?> </span>
															</a>
														</li>
													<?php }else{ ?>
														<li >
															<a href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal clearfix">
																<div class="image">
																	<i class="fa fa-thumbs-up bg-sucess"></i>
																</div>
																<span class="title"><?php echo $row['alert_title'] ?>!</span>
																<span class="message">Client email: <?php echo $row['email'] ?> </span>
															</a>
														</li>
													<?php } ?>

												<?php } ?>
											<?php } ?>
										
										</ul>
				
										<hr />
				
										<div class="text-right">
											<!-- <a href="notifications" class="view-more">Next</a>
											<br> -->
											<a href="notifications" class="view-more">View all notifications</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					<?php }else{ ?>
						<!-- Trainor -->
						<ul class="notifications">
							<li>
								<?php 
									if(isset($nav_active_notifications)){

									    $type = "announcement";
									    $query = "UPDATE `notifications` 
									                    SET status = '1'
									                WHERE type = '$type' ";
									    $result = mysqli_query($con, $query);
									}
								 ?>

								<?php 
									// count the total members in the database
							        $select = "SELECT * FROM notifications WHERE status = '0' AND type = 'announcement' ";
							        $result = mysqli_query($con, $select);
							        $total_messages = mysqli_num_rows($result);

								 ?>
								<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
									<i class="fa fa-bell"></i>
									<span class="badge"><?php echo isset($total_messages) ? $total_messages:'' ?></span>
								</a>
								
								<?php 
									// count the total members in the database
							        $select = "SELECT * FROM notifications WHERE type = 'announcement'";
							        $result = mysqli_query($con, $select);
							        $total_messages = mysqli_num_rows($result);

								 ?>

								<div class="dropdown-menu notification-menu">
									<div class="notification-title">
										<span class="pull-right label label-default"><?php echo isset($total_messages) ? $total_messages:'' ?></span>
										Notifications
									</div>
				
									<div class="content">
										<ul>
											<?php 
												$count = 1;
												$query = "SELECT * FROM `notifications` WHERE type = 'announcement' ORDER BY id DESC";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result)){
												$count_db = $count++;
												
											 ?>

											 	<?php if($count_db <= 5){ ?>

												 	<?php if($row['status'] == 0){ ?>
														<li style="background-color: #D3D3D3;">
															<a href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class=" modal-with-zoom-anim simple-ajax-modal clearfix">
																<div class="image">
																	<i class="fa fa-thumbs-up bg-sucess"></i>
																</div>
																<span class="title"><?php echo $row['alert_title'] ?>!</span>
																<span class="message"><?php echo substr($row['alert_message'], 0, 30) ?></span>
															</a>
														</li>
													<?php }else{ ?>
														<li >
															<a href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal clearfix">
																<div class="image">
																	<i class="fa fa-thumbs-up bg-sucess"></i>
																</div>
																<span class="title"><?php echo $row['alert_title'] ?>!</span>
																<span class="message"><?php echo substr($row['alert_message'], 0, 30) ?></span>
															</a>
														</li>
													<?php } ?>

												<?php } ?>
											<?php } ?>
										
										</ul>
				
										<hr />
				
										<div class="text-right">
											
											<a href="notifications" class="view-more">View all notifications</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					<?php } ?>

					<span class="separator"></span>
					
					
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
							<?php if(!empty($image)){ ?>
								<img  src="../assets/images/team/<?php echo $image; ?>" alt="<?php echo $row['name'] ?>" class="img-circle" data-lock-picture="../assets/images/team/<?php echo $row['image'] ?>" style="height: 5vh!important;"/>
							<?php }else{ ?>
								<img  src="assets/images/default-avatar.jpg" alt="<?php echo $row['name'] ?>" class="img-circle" data-lock-picture="assets/images/default-avatar.jpg>" style="height: 5vh!important;"/>
							<?php } ?>
							</figure>
							<div class="profile-info" data-lock-name="" data-lock-email="">
								<span class="name">
									<?php echo $_SESSION['lastname'];  ?>
									,&nbsp;
									<?php echo $_SESSION['firstname'];  ?>
								</span>
								<span class="role">
									<?php echo strtoupper($_SESSION['type']);  ?>
								</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="my_profile"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="new_password"><i class="fa fa-key"></i> Change Password</a>
								</li>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="admin_logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->