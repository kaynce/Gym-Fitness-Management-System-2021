<?php 

 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

include 'assets/db_connect.php';

 ?>



<!DOCTYPE html>
<html class="fixed">
<head>

	<!-- Basic -->
	<meta charset="UTF-8">
	<title>Recover Password </title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />
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

	<!-- sweetalert -->
	<script src="assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>

	<link rel="stylesheet" type="text/css" href="dist/css/admin_login_style.css?">

</head>

<body class="page-body login-page login-form-fall">



<style type="text/css">

	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    *{
        font-family: 'Poppins', sans-serif;
        /*border: 1px solid black!important;*/
    }
    
	.login{
		font-size: 15px;;
	}

	input{
		font-size: 17px!important;
	}

	.sign-up a{
		color: #f13a11!important;
	}


</style>

	<div id="login-form" class="login-container-form">
		<section class="body-sign">
			<div class="center-sign">
				<a href="index" class="logo pull-left">
					<img src="assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-key mr-xs"></i>Recover Password</h2>
					</div>
					<div class="panel-body">
						<form   method="post">
							<div class="form-group mb-lg">
								<label>Enter your <span style="color: blue;">email</span> and we will send you instructions on how to reset your password</label>
								
							<div class="form-group mb-lg">

								<div class="input-group input-group-icon">
									 

									  <input type="email" class="form-control input-lg"  maxlength="50" id="email" name="email" value="<?php echo isset($email) ? $email: '' ?>" placeholder="Enter your email here" required>

									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-email"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
									
										
									</div>
								</div>

								<div class="col-sm-4 text-right">
									<!-- <button type="submit" name="submit" class="btn btn-primary hidden-xs login">Login</button> -->
									<button type="submit" name="submit" class="btn btn-primary submit" >Submit</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

					<!-- 		<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div> -->

							<p class="text-center ">Remembered? <a  href="login" style="color: blue!important;">Login!</a>

						</form>
					</div>
				</div>
			</div>

		</section>
			</div>
		<!-- end: page -->

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

	</body>
</html>


<script type="text/javascript">

	
    $(document).ready(function(){  

      $("form").submit(function(e){
      	e.preventDefault();

      	var email = $('#email').val().trim();

	    if (email == '') {
	        	Swal.fire({
						icon: 'warning',
						title: 'Email is required!',
						text: 'Please enter your email!'
						//showConfirmButton: false,
						//timer: 1500
				})   
	    }else {

	        // Start sweetalert
	        // Swal.fire({
	        //    title: '<h5 style="color:#555!important">Are you sure?</h5>',
	        //     text: "",
	        //     icon: 'question',
	        //     showCancelButton: true,
	        //     confirmButtonColor: '#3085d6',
	        //     cancelButtonColor: '#d33',
	        //     confirmButtonText: 'Yes'            
	        // }).then((result) => {
	        //     if (result.value) {

		            $.ajax({  
		                url:'ajax.php?action=user_rp_mail_action',
		                type:'post',
		                data:{
		                    email:email
		                },  
		                success:function(data, status){ 
		                	console.log(data);
		                	console.log(status);
		                	
		                   if(data == 2){
		                		Swal.fire({
								    icon: 'error',
									title: "Email is not registered",
									text: ''
								})
							        	
		                	}else{
		                		Swal.fire({
						           icon: 'success',
						           title: "A message has been sent to your email!",
						           allowOutsideClick: false
						        }).then((result)=>{
						        	 window.location.href = 'create-new-password';
						        })

		                	}
		                }  
		           }); 

	           // }
	            // End Swal if
	        //})
          // End Swal
        }


      }); 

 });  
//End

</script>


