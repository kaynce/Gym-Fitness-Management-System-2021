<?php
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
// if (!isset($_SESSION)) {
//     session_start();
// }

    include 'assets/db_connect.php';

 ?>

 <?php include('admin_session.php'); ?>

<!DOCTYPE html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>HMG Fitness Center | Dashboard </title>


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

 			<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

		<!-- Modal -->
 
		
		<!-- Vendor CSS -->
		<!-- File upload -->
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Full calendar -->
		<link href="assets/fullcalendar/main.css" rel="stylesheet">
        <script type="text/javascript" src="assets/fullcalendar/main.js"></script>

     <!--    Select css -->
     	<link rel="stylesheet" href="assets/stylesheets/select2.min.css"/>
     	<script type="text/javascript" src="assets/javascripts/select2.min.js"></script>

		<!-- Camera -->
		<script type="text/javascript" src="assets/javascripts/instascan.min.js"></script> 

	</head>

<body>
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



#divvideo{
	box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
}
	
 

</style>



		<section class="body">
			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="index.php" class="logo">
						<img src="assets/images/hmg-malolos-gym-logo.png" height="40" width="200" alt="HMG Logo Picture" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
				<!-- 	<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			 -->
					<span class="separator"></span>
			
					<!-- <ul class="notifications">
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-tasks"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu large">
								<div class="notification-title">
									<span class="pull-right label label-default">3</span>
									Tasks
								</div>
			
								<div class="content">
									<ul>
										<li>
											<p class="clearfix mb-xs">
												<span class="message pull-left">Generating Sales Report</span>
												<span class="message pull-right text-dark">60%</span>
											</p>
											<div class="progress progress-xs light">
												<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
											</div>
										</li>
			
										<li>
											<p class="clearfix mb-xs">
												<span class="message pull-left">Importing Contacts</span>
												<span class="message pull-right text-dark">98%</span>
											</p>
											<div class="progress progress-xs light">
												<div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
											</div>
										</li>
			
										<li>
											<p class="clearfix mb-xs">
												<span class="message pull-left">Uploading something big</span>
												<span class="message pull-right text-dark">33%</span>
											</p>
											<div class="progress progress-xs light mb-xs">
												<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-envelope"></i>
								<span class="badge">4</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="pull-right label label-default">230</span>
									Messages
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle" />
												</figure>
												<span class="title">Joseph Doe</span>
												<span class="message">Lorem ipsum dolor sit.</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
												</figure>
												<span class="title">Joseph Junior</span>
												<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle" />
												</figure>
												<span class="title">Joe Junior</span>
												<span class="message">Lorem ipsum dolor sit.</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
												</figure>
												<span class="title">Joseph Junior</span>
												<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="pull-right label label-default">3</span>
									Alerts
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-thumbs-down bg-danger"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-lock bg-warning"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">15 minutes ago</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-signal bg-success"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">10/10/2014</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul> -->
			
					<span class="separator"></span>
					
					<?php 

					 ?>
				<!-- 	<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
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
									<a role="menuitem" tabindex="-1" href="my_profile.php"><i class="fa fa-user"></i> My Profile</a>
								</li>
							
								<li>
									<a role="menuitem" tabindex="-1" href="admin_login.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>

					</div> -->

				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->




	
			<div class="inner-wrapper">

		
				<!-- end: sidebar -->

			
					
				<div class="row">
					
 					<video id="preview" width="100%" height="60%" style="border-radius:10px;"></video>
						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
										<!-- 	<a href="#" class="fa fa-caret-down"></a> -->
											<a href="attendance_qrcode.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">Attendance</h2>

										<form action="check_in_out_action.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                   						<!-- <label>SCAN QR CODE</label> <p id="time"></p> -->

						                    <input type="text" name="member_user_id" id="text" placeholder="QR CODE" class="form-control"   autofocus style="width: 50%;">
						                </form>

									</header>


									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                 <!--            <col width="5%"> -->
		                                           <!--  <col width="5%">
		                                            <col width="5%">    -->                       
		                                          </colgroup>

		                                        <thead style="">
		                                            <tr>
		                                                <!-- <th scope="col" class="center">Action</th> -->
		                                                <th scope="col"  class="center" >#</th>
		                                          <!--       <th scope="col" class="center">Name</th> -->
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Time In</th>
		                                                <th scope="col" class="center">Time Out</th>
		                                                <th scope="col" class="center">Log Date</th>
		                                                <!-- <th scope="col" class="center">Date Approved</th> -->
		                                            </tr>

		                                        </thead>
		                                       <tbody>
												
                                               <?php 

                                               $date = date('Y-m-d');
                                               $date2 = new DateTime();

											   $timeZone = $date2->getTimezone();
											   echo $timeZone->getName();

                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $query = "SELECT * FROM attendance WHERE log_date='$date' ";

                                                 // $query ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID WHERE LOGDATE='$date'";

                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                             
                                     
                                                <td class="center"><?php echo $i++ ?></td>
                                                  <!-- <td class="">
                                                    <?php echo $row['name'] ?>
                                                     
                                                  </td> -->
                                                  <td class="center">
                                                     <?php echo $row['member_user_id'] ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                                   <?php echo ucwords($row['time_in']) ?>
                                                     
                                                  </td>
                                                  
                                                  
                                                  <td class="center">
                                                    <?php echo $row['time_out'] ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php echo date("M d,Y",strtotime($row['log_date'])) ?>
                                                  </td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>

											</table>
										</div>
									</div>

								</section>	
						</div>


					</div>

				</section>
			</div>


		</section>




 <script>

 	 $(document).ready(function(){  

 	 	$(".alert-success").fadeTo(4000, 500).slideUp(500, function(){
		    $(".alert-success").slideUp(2000);
		});

		$(".alert-danger").fadeTo(4000, 500).slideUp(500, function(){
		    $(".alert-danger").slideUp(2000);
		});


        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});

        Instascan.Camera.getCameras().then(function(cameras){

               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

         scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               document.forms[0].submit();
         });
 

		// var timestamp = '<?=time();?>';
		// function updateTime(){
		//   $('#time').html(Date(timestamp));
		//   timestamp++;
		// }
		// $(function(){
		//   setInterval(updateTime, 1000);
		// });



	});  

		</script>




<?php include('footer.php'); ?>