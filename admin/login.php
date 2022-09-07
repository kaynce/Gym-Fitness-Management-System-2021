<?php 

 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

include 'assets/db_connect.php';

 ?>

 <?php

	if(isset($_SESSION['user_id'])) {
	?>
		<script>

			// alert("Login first before entering the page!");
			window.location.href = 'index';
		</script>

	<?php
}

?>

<!DOCTYPE html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Start your journey - Login</title>
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

   		<!-- Customized Bootstrap Stylesheet for spinner-->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!--  Stylesheet for spinner-->
        <link href="../assets/css/style.css?" rel="stylesheet">


	</head>
	

	<style type="text/css">

	    .login{
	        font-size: 15px;;
	    }

	    input{
	        font-size: 17px!important;
	    }

	    .sign-up a{
	        color: #f13a11!important;
	    }

	     #login-form{
            background-color: #171819!important;
        }

        label{
            font-size: 13px;
        }

        p{
            font-size: 15px;
        }

        a{
	        font-size: 13px;    
	    }

	</style>

	<body class="page-body login-page login-form-fall">

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

		<!-- start: page -->
		<div id="login-form" class="login-container-form">
			<section class="body-sign">
				<div class="center-sign">
					<a href="../index" class="logo pull-left">
						<img src="assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
					</a>

					<div class="panel panel-sign">
						<div class="panel-title-sign mt-xl text-right">
						 <a href="../index"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-home mr-xs"></i> Home</h2></a>
                         <a href="login"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2></a>
						</div>
						<div class="panel-body">
							<!-- <form   method="post"> -->
								<div class="form-group mb-lg">
									<label class="text-uppercase text-semibold text-dark">Email</label>
									<div class="input-group input-group-icon">
										<?php 
												if(isset($_COOKIE['user'])) {
													?>
														<input type="text" tabindex="1" class="form-control input-lg"  maxlength="50" id="admin_login_email" name="admin_login_email" value="<?php echo $_COOKIE['user']?>" placeholder="Input Email Here" >
													<?php
												}else{
													?>
														<input type="text" tabindex="1" class="form-control input-lg"  maxlength="50" id="admin_login_email" name="admin_login_email" value="<?php echo isset($email) ? $email: '' ?>" placeholder="Input Email Here" >
													<?php
												}
											 ?>
										<span class="input-group-addon">
											<span class="icon icon-lg">
												<i class="fa fa-user"></i>
											</span>
										</span>
									</div>
								</div>

								<div class="form-group mb-lg">
									<div class="clearfix">
										<label class="pull-left text-uppercase text-semibold text-dark">Password</label>
											<a href="recover-password" class="pull-right" style="color: blue!important">Forgot Password?</a>
									</div>
									<div class="input-group input-group-icon">
										 <input type="password" tabindex="2" class="form-control input-lg"  maxlength="50" id="admin_login_password" name="admin_login_password" value="<?php echo isset($admin_login_password) ? $admin_login_password: '' ?>" placeholder="Input Password Here" >

										<span class="input-group-btn">
				                              <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password" style="font-size:25px!important; color: black;"></span></button>
				                         </span>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-8">
										<div class="checkbox-custom checkbox-default">
											<?php 
												if(isset($_COOKIE['user'])) {
													?>
														<!-- <input id="RememberMe" name="rememberme" checked value="rememberme" type="checkbox"/>
														<label for="RememberMe">Remember Me</label> -->
													<?php
												}else{
													?>
														<!-- <input id="RememberMe" name="rememberme" value="rememberme" type="checkbox"/>
														<label for="RememberMe">Remember Me</label> -->
													<?php
												}
											 ?>
											
										</div>
									</div>

									<div class="col-sm-4 text-right">
										<!-- <button type="submit" name="submit" class="btn btn-primary hidden-xs login">Login</button> -->
										<button type="text" tabindex="3"  class="btn btn-primary  login">Login</button>
									</div>
								</div>

								<span class="mt-lg mb-lg line-thru text-center text-uppercase">
									<span>or</span>
								</span>

						<!-- 		<div class="mb-xs text-center">
									<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
									<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
								</div> -->

								<p class="text-center">Don't have an account yet? <a href="admin_signup">Sign Up!</a>

							<!-- </form> -->
						</div>
					</div>
				</div>
			</section>
		<div>
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

		<!--  Javascript spinner -->
		<script src="../assets/javascript/main.js"></script>

	</body>
</html>


<script>
	$(document).ready(function(){
	    $(document).on('click', '.toggle-password', function(){  
		    $(this).toggleClass("fa-eye fa-eye-slash");
		    var input = $("#admin_login_password");

		    $("#admin_login_password").blur(); 

		    if (input.attr("type") === "password") {
		      input.attr("type", "text");
		    } else {
		      input.attr("type", "password");
		    }
	    });
    })


	$(document).on('click', '.login',  function(){

		let email = $('#admin_login_email').val().trim();
		let password = $('#admin_login_password').val().trim();

		if(email == '' && password == '' ){
            Swal.fire({
                icon: 'warning', 
                title: 'Enter your email & password'
            })
        }else if(email == '' && password != ''){
            Swal.fire({
                icon: 'warning', 
                title: 'Enter your email'
            })
        }else if(email != '' && password == ''){
            Swal.fire({
                icon: 'warning', 
                title: 'Enter your password'
            })
        }else {
			
			 $.ajax({  
	                url:'ajax.php?action=user_login_action',
	                type:'post',
	                data:{
	                   email:email,
	                   password:password
	                },
	                cache: false, 
	                success:function(data, status){ 
	                	
	                	console.log(data);
	                	console.log(status);
	                   if(data == 1){
	                		Swal.fire({
					          icon: 'success',
					          title: 'Login Successfully!',
					          showConfirmButton: false,
					          allowOutsideClick: false,
					          timer: 1500
					        }).then((result) => {
					        	window.location.href = 'index';
					        })
	                	}else if(data == 2){
	                		window.location.href = 'verify-your-email';
	                	}else if(data == 3){
	                		window.location.href = 'verify-your-email';
	                	}else if(data == 4){
	                		window.location.href = 'verify-your-email';
	                	}else{
	                		Swal.fire({
							    icon: 'error',
								title: "Incorrect Username or Password!"
							})
	                	}
	                }  
	        }); 
		}
	})
	//End
</script>