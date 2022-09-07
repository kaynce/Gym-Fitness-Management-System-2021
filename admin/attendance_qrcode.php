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

	
	<!-- Timein sweet alert -->
	<?php 
		if(isset($_SESSION['time_in'])){
			?>
				<script>
					Swal.fire({
				          icon: 'success',
				          title: 'Time In Successfully!',
				          showConfirmButton: false,
				          timer: 1500
				        })
				</script>
			<?php
			unset($_SESSION['time_in']);
		}
	?>

	<!-- Time out sweet alert -->
	<?php 
		if(isset($_SESSION['time_out'])){
			?>
				<script>
					Swal.fire({
				          icon: 'success',
				          title: 'Time Out Successfully!',
				          showConfirmButton: false,
				          timer: 1500
				        })
				</script>
			<?php
			unset($_SESSION['time_out']);
		}
	?>

	<!-- Error sweet alert -->
	<?php 
		if(isset($_SESSION['error'])){
			?>
				<script>
					Swal.fire({
					          icon: 'error',
					          title: 'Cannot find Code Number!',
					          showConfirmButton: false,
					          timer: 1500
					        })
				</script>
			<?php
		}
	?>

	<!-- 3. Ask if the client/user is going to time out	 -->
	<?php 
	// if(isset($_SESSION['query_time_out'])){
		?>
		<!-- <script>

				Swal.fire({
		           title: 'Are you sure you want to <br>TIME OUT?',
		            text: "",
		            icon: 'question',
		            showCancelButton: true,
		            confirmButtonColor: '#3085d6',
		            cancelButtonColor: '#d33',
		            confirmButtonText: 'Yes'            
		        }).then((result) => {
		            if (result.value) {
		            	let = sure_time_out = 'sure_time_out';
			            $.ajax({  
			                url:'check_in_out_action.php',
			                type:'post',
			                data:{
			                    sure_time_out:sure_time_out
			                },
			                cache: false, 
			                success:function(data, resp){
			                	
					            console.log(data);
					            console.log(resp);
								if(resp == 'success'){

									Swal.fire({
							          icon: 'success',
							          title: 'Time Out Successfully!',
							          showConfirmButton: false,
							          timer: 1500
							        }).then((result) =>{

							        	 	window.location.href = 'attendance_qrcode';
							        })

								}else{

									Swal.fire({
							          icon: 'error',
							          title: 'Failed to Time out!',

							        })

								}
							}
			           }); 
			            //End Ajax
		            }
		        })
		        //End
		   

		</script> -->
		<?php
	  //}
	 ?>
		<section class="body">
			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="attendance_qrcode" class="logo">
						<img src="assets/images/hmg-malolos-gym-logo.png" height="60" width="200" alt="Picture of HMG Fitness Center" style="margin-top: -15px;" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title text-primary">
							SCAN QR CODE HERE
						</div>
					</div>
				
					<div class="nano ">
						<div class="nano-content">
							
							<div class="col-xl-12" style="padding:10px;background:#fff; border-radius: 5px; " id="divvideo">
								<center><p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> TAP HERE</p></center>
								<!-- <a style="font-size: 2rem; float: right" onclick="reverseCamera()"><i class="fa fa-refresh"></i> </a>
								<button onclick="frontCamera()">Front</button>
								<button onclick="backCamera()">Back</button> -->
								<!-- <br>
								<br> -->
			                    <video id="preview" width="100%" height="60%" style="border-radius:10px;"></video>
								<br>
								<!-- <button id="button">TAP</button> -->
								<br>
								<?php
								if(isset($_SESSION['error'])){
								  echo "
									<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <h4><i class='icon fa fa-warning'></i> Error!</h4>
									  ".$_SESSION['error']."
									</div>
								  ";
								  unset($_SESSION['error']);
								}

								if(isset($_SESSION['success'])){
								  echo "
								  

									<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <h4><i class='icon fa fa-check'></i> Success!</h4>
									  ".$_SESSION['success']."
									  <br><br>
									 
									</div>
								  ";

								 //  <div class='alert alert-default'>
									// 	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									// 	<strong>Well done!</strong> You are using a awesome template! <a href='#' class='alert-link'>Say Hi to Porto Admin</a>.
									// </div>

								  unset($_SESSION['success']);
								}

								
								// echo "Current timezone: ".date_default_timezone_set('Asia/Manila').";
								// echo "Current timezone: ".date_default_timezone_set('Asia/Manila')."</ br>
     			// 				 Current time: ".date("d-m-Y H:i:s");
							  ?>

			                </div>

							<hr class="separator" />
						</div>
					</div>
				</aside>
				<!-- end: sidebar -->

			

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>  <i class="glyphicon glyphicon-qrcode"></i> Scan QR Code</h2>
						
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Scan QR Code</span></li>
							</ol>
							
							<?php 
							$type = $_SESSION['type'];

							if ($type == 'admin') {
									// $row = mysqli_fetch_assoc($result);

							?>

							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

							<?php 
							} else {
							 ?>
							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>
							<?php 
							}
							 ?>

						</div>
					</header>
				
				<div class="row">
					
						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
										<!-- 	<a href="#" class="fa fa-caret-down"></a> -->
											<a href="attendance_qrcode"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">Attendance</h2>

										<form action="check_in_out_action.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                   						<!-- <label>SCAN QR CODE</label> <p id="time"></p> -->

						                    <input type="text" name="member_user_id" id="member_user_id" placeholder="QR CODE" class="form-control"    autofocus style="width: 50%;">
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
		                                            <col width="5%">
		                                            <col width="5%">
		                                           <!--  <col width="5%">
		                                            <col width="5%">    -->                       
		                                          </colgroup>

		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <!-- <th scope="col" class="center">Action</th> -->
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Name</th>
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

                                                //$query = "SELECT * FROM attendance WHERE log_date='$date' ";

                                                  // $query = "SELECT 
                                                  // 			 attendance.id,
                                                  // 			 attendance.member_user_id, 
                                                  //            attendance.time_in, 
                                                  //            attendance.time_out, 
                                                  //            attendance.log_date,
                                                  //            users.firstname,
                                                  //            users.lastname,
                                                  //            members.firstname,
                                                  //            members.lastname
                                                  //     FROM 
                                                  //     attendance
                                                  //     LEFT JOIN users 
                                                  //     ON attendance.member_user_id = users.user_id
                                                  //     LEFT JOIN members 
                                                  //     ON attendance.member_user_id = members.member_id
                                                  //     WHERE log_date='$date'
                                                  //     ORDER BY attendance.id DESC";

       											$query = "SELECT * FROM `attendance` WHERE log_date='$date' ORDER BY id DESC";

                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr class="center">
                                             
                                     			<td>

                                     				<a type="button" href="assets/ajax/attendance_member_user_info.php?member_user_id=<?php echo $row['member_user_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-success" >View</a>

                                     			</td>
                                                <td class="center"><?php echo $i++ ?></td>
                                                  <td class="">
                                                  	<?php 
                                                  		$member_user_id = $row['member_user_id'];
                                                  		$query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = '$member_user_id' ";
                                                  		$result_name = mysqli_query($con, $query_name);

                                                  		if(mysqli_num_rows($result_name) == 1){
                                                  			$row_name = mysqli_fetch_assoc($result_name); 
                                                  		}else{
                                                  			//If there is no data in members table go to users table
                                                  			$query_name = "SELECT *, concat(lastname, ', ', firstname) AS name  FROM `users` WHERE user_id = '$member_user_id' ";
                                                  			$result_name = mysqli_query($con, $query_name);
                                                  			$row_name = mysqli_fetch_assoc($result_name); 
                                                  		}
                                                  	 ?>

                                                    <?php echo $row_name['name']; ?>
                                                  </td>
                                                  <td class="center">

                                                     <?php 
                                                        echo substr($row['member_user_id'], 0, 3)
                                                     ?>
                                                     **
                                                     
                                                  </td>
                                                    <td class="center">
                                                   <?php 
                                                   		if(!empty($row['time_in'])){
                                                   			echo date("h:i A", strtotime($row['time_in'])); 
                                                   		}
                                                   	?>
                                                     
                                                  </td>
                                                  
                                                  
                                                  <td class="center">
                                                    <?php 
                                                    	if(!empty($row['time_out'])){
                                                   			echo date("h:i A", strtotime($row['time_out'])); 
                                                   		}
                                                    ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php 
                                                    	if(!empty($row['log_date'])){
                                                   			echo date("M d,Y",strtotime($row['log_date']));
                                                   		}
                                                    ?>
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

 	 $(document).ready(function() {
	    // $('#member_info_table').DataTable();
	   
	 });

 	 $(document).ready(function(){  

        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});

        Instascan.Camera.getCameras().then(function(cameras){

	        if (cameras.length > 0) {
	            scanner.start(cameras[0]);
	            console.log(scanner.start(cameras[0]))
	        }else{
	            // console.error('No cameras found.');
	             alert('No cameras found');
	        }

	    }).catch(function(e) {
	        console.error(e);
	    });

	     scanner.addListener('scan',function(c){
	           document.getElementById('text').value=c;
	           document.forms[0].submit();
	     });
	});  

</script>

<script>
	  const video = document.getElementById('preview');
		const button = document.getElementById('button');

		navigator.mediaDevices
		  .getUserMedia({
		    video: {
		      facingMode: {
		        exact: 'user'
		      },
		    },
		  })
		  .then((stream) => video.srcObject = stream)
		  .catch((_) => button.style.display = 'none');
</script>

<?php include('footer.php'); ?>