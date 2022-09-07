<?php if (session_status() === PHP_SESSION_NONE){  session_start(); } ?>
<?php 
include 'assets/db_connect.php';

 ?>



<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />
		 <title>Verify your email - HMG Fitness Center</title>
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

		<link rel="stylesheet" type="text/css" href="assets/stylesheets/admin_style.css">

		<!-- -------------------------------- -->

		<!-- sweetalert -->
   		<script src="assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>

   		
   		<link rel="stylesheet" type="text/css" href="dist/css/admin_login_style.css?">

   		<!-- File upload -->
   		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />


   		<!-- Select 2 -->
   		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />

     	<!-- <link rel="stylesheet" href="assets/stylesheets/select2.min.css"/> -->
     	<script type="text/javascript" src="assets/javascripts/select2.min.js"></script>

		
		<!-- Customized Bootstrap Stylesheet for spinner-->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!--  Stylesheet for spinner-->
        <link href="../assets/css/style.css?" rel="stylesheet">

	</head>

	<style type="text/css">
		.back-color{
			background-color: #171819;
		}
		label{
			font-size: 15px;
		}
		a{
			font-size: 14px;
		}


	</style>

	<body class="page-body login-page login-form-fall">

		
<div class="back-color">

		 <!-- Spinner Start -->
	    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
	      <!--   <div class="spinner"></div>-->
	        <div class="container-ring align-items-center justify-content-center">
	            <div class="ring"></div>
	            <div class="ring"></div>
	             <div class="ring"></div>
	        </div>
	    </div>
	    <!-- Spinner End -->

	    <?php 
	    	$status = '';
	    	$email_status = '';
	    	if(isset($_SESSION['status']) && isset($_SESSION['email_status'])){
	    		$status = $_SESSION['status'];
	    		$email_status = $_SESSION['email_status'];
	    	}	
	    ?>	

	    <?php if($status == 'pending' && $email_status == 1 ){ ?>
				<!-- start: page -->
				<section class="body-sign">
					<div class="center-sign">
							<a href="../index" class="logo pull-left">
								<img src="assets/images/admin-hmg-logo.png" height="54" alt="HMG Fitness Center Logo" />
							</a>

						<div class="panel panel-sign">
							<div class="panel-title-sign mt-xl text-right">
								<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-envelope mr-xs"></i> Verify your Account</h2>
							</div>
							<div class="panel-body">
								<div class="form-group mb-lg">
										<center><h2>Steps to complete Account Verification</h2></center>
										<br><br>
										<center>
										<label class="text-uppercase text-semibold text-dark "><i class="fa fa-check-circle btn-success" style="font-size: 20px;"></i>&nbsp;&nbsp;Verify by Email</label>
										<br>
										<br>
										<label class="text-uppercase text-semibold text-dark" ><i class="fa fa-circle-thin " style="font-size: 20px;"></i>&nbsp;&nbsp;Approval of Admin</label>
										<br>
										<br>
										
										<button type="button" class="btn btn-outline-success refresh" id="refresh" style="font-size: 15px;">Refresh</button>
										<hr class="separator">
										<a class="fa fa-sign-out mr-xs" href="admin_logout.php" style="color:blue!important; font-size: 1.8rem;"> &nbsp; Logout</a>
										</center>
									</div>

							</div>
						</div>
					</div>
				</section>
				<!-- end: page -->

				
		<?php }else{ ?>
			<!-- start: page -->
				<section class="body-sign">
					<div class="center-sign">
							<a href="../index" class="logo pull-left">
								<img src="assets/images/admin-hmg-logo.png" height="54" alt="HMG Fitness Center Logo" />
							</a>

						<div class="panel panel-sign">
							<div class="panel-title-sign mt-xl text-right">
								<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-envelope mr-xs"></i> Verify your email</h2>
							</div>
							<div class="panel-body">
								<div class="form-group mb-lg">
										<center><h4></h4></center>
										<center>
										<label>If you please, click the link that was sent to email to verify your account</label>
										<br>
										<br>
										<label>Didn't get the email?</label>
										<br>
										<a href="#" id="send_verification_code" style="color:blue!important;">Click to resend</a>
										<br>
										<br>
										<label>Enter Verification Code</label>
										<br>
										<!-- <form method="POST"> -->
											<input type="hidden" class="form-control"  maxlength="10" id="verify_user_email" name="verify_user_email" value="<?php echo $_SESSION['user_email']; ?>" >

											<input type="text" class="form-control"  maxlength="10" id="ver_code" name="ver_code" style="text-align: center; font-size: 15px" placeholder="Enter Verification Code Here" required>
										
										
										<br>
										
											<button type="btn" name="submit" id="submit" class="btn btn-primary confirm" style="text-align: center; font-size: 15px">Confirm</button>
										<!-- </form> -->
										<br>
										<hr class="separator">
										<a class="fa fa-sign-out mr-xs" href="admin_logout.php" style="color:blue!important; font-size: 1.8rem;"> &nbsp; Logout</a>
										<center>
									</div>

							</div>
						</div>
					</div>
				</section>
				<!-- end: page -->

		<?php } ?>

</div>

		<!-- Vendor -->

		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<script src="assets/vendor/select2/select2.js"></script>

		<!--  Javascript spinner -->
		<script src="../assets/javascript/main.js"></script>

	</body>
</html>
<!--  $('.select2').select2({
    placeholder:'Please Select Here',
    })
 -->
 <script type="text/javascript">
 	
 	 //Send email
      $(document).on('click', '#send_verification_code', function(){

      	let email = $('#verify_user_email').val();

      	Swal.fire({
           title: 'Send verification code to ' + email + "?",
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

	            $.ajax({  
	                url:'ajax.php?action=resend_verification_code_action',
	                type:'post',
	                data:{
	                    email:email
	                }, success:function(data, status){

			            console.log(data);

			            console.log(status);

						if(status == 'success'){

							Swal.fire({
					          icon: 'success',
					          title: 'Verification Code Sent Successfully!'
					        })

						}else{

							Swal.fire({
					          icon: 'warning',
					          title: 'Message could not be sent. Mailer Error!',

					        })

						}
					}

	           }); 

	   

            }
        })     
      }); 
      //End



 </script>

 <script>
 	//Send email
    $(document).on('click', '.confirm', function(){

      	let email = $('#verify_user_email').val();
      	let ver_code = $('#ver_code').val();

      	if(ver_code == ''){
      		Swal.fire({
      			icon: 'info',
	            title: "Verification Code is required"
	        })
      	}else{

      		$.ajax({  
                url:'ajax.php?action=check_verification_code',
                type:'post',
                data:{
                    email:email,
                    ver_code:ver_code
                }, success:function(data, status){

		            console.log(data);
		            console.log(status);

					if(data == 1){
						Swal.fire({
						    icon: 'success',
							title: "Email Confirmed!",
							text: 'Email Successfully Confirmed!',
							allowOutsideClick: false
						}).then((result) => {
								// if (result.value) {
							 window.location.href = 'index';
								// }
						})
					}else if(data == 2){
						Swal.fire({
						    icon: 'success',
							title: "Email Confirmed!",
							text: 'Email Successfully Confirmed!',
							allowOutsideClick: false
						}).then((result) => {
								// if (result.value) {
							 window.location.href = 'verify-your-email';
								// }
						})
					}else{
						Swal.fire({
							    icon: 'error',
								title: "Code does not match!",
								text: 'Incorrect verification code!'
						})

						document.getElementById('ver_code').value = '';
					}

				}

           }); 
      		//End ajax
      	}
      }); 
      //End
 </script>

  <script>
 	//Send email
    $(document).on('click', '.refresh', function(){

  		$.ajax({  
            url:'ajax.php?action=refresh_get_status',
            type:'post',
             success:function(data, status){

	            console.log(data);
	            console.log(status);

				if(data == 1){
					window.location.href = 'index';
				}else{
					window.location.href = 'verify-your-email';
				}

			}

       }); 
  		//End ajax

      }); 
      //End
 </script>