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
			window.location.href = 'index.php';
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

	</head>
	
	<body class="page-body login-page login-form-fall">

<?php 


	if (isset($_POST['submit'])) {	
	
		$foo = TRUE;

		while($foo){

			$email = trim($_POST['admin_login_email']);
				
			$password = trim(md5($_POST['admin_login_password']));

			//$type = $_POST['type'];

			$status = 'approved';
				
			$query = "SELECT * FROM `users` WHERE email='$email' AND password='$password' AND status = '$status'";

			$result = mysqli_query($con, $query);

			if (mysqli_num_rows($result) == 1) {

				$foo = FALSE;

				$row = mysqli_fetch_assoc($result);

				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['type'] = $row['type'];

				$cookie_name = "";
				$cookie_value = "";

				//	$rememberme = $_POST['rememberme'];

				if(isset($_POST['rememberme'])){
					$cookie_name = "user";
					$cookie_value = $row['email'];
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				}else{
					$cookie_name = "user";
					$cookie_value = "";
					setcookie($cookie_name, $cookie_value, time() - (86400 * 30), "/"); // 86400 = 1 day
				}

				
				$_SESSION['loading'] = 'loading';
				?>
					<script type="text/javascript">
						Swal.fire({
					          icon: 'success',
					          title: 'Login Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) => {
					        
					        	 // if (result.value) {
					        	  	 window.location.href = 'index.php';
					        	 // }
					        		
					        })

					</script>
				<?php
				// echo "<script type='text/javascript'>alert('Login Successfully!');</script>";	
		  //       echo "<script>document.location='index.php';</script>";
			}

			if (mysqli_num_rows($result) == 0) {
				$foo = FALSE;

				?>
					<script type="text/javascript">
						Swal.fire({
					          icon: 'warning',
					          title: 'Incorrect Username or Password!'
					        }).then((result) => {
					        	 // if (result.value) {
					        	  	// window.location.href = 'index.php';
					        	 // }
					        		
					        })
					        
					</script>


				<?php

				


				// echo "<script>alert('Incorrect Username or Password!');</script>";
				// echo "<script>document.location='admin_login.php';</script>";
			}

		}	

		$admin_login_email = $_POST['admin_login_email'];
				
		$admin_login_password = $_POST['admin_login_password'];
}

 ?>


		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="login.php" class="logo pull-left">
					<img src="assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
					</div>
					<div class="panel-body">
						<form   method="post">
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
										<a href="recover-password.php?action=recover-password" class="pull-right" style="color: blue!important">Forgot Password?</a>
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
													<input id="RememberMe" name="rememberme" checked value="rememberme" type="checkbox"/>
													<label for="RememberMe">Remember Me</label>
												<?php
											}else{
												?>
													<input id="RememberMe" name="rememberme" value="rememberme" type="checkbox"/>
													<label for="RememberMe">Remember Me</label>
												<?php
											}
										 ?>
										
									</div>
								</div>

								<div class="col-sm-4 text-right">
									<!-- <button type="submit" name="submit" class="btn btn-primary hidden-xs login">Login</button> -->
									<button type="submit" tabindex="3" name="submit" class="btn btn-primary  login">Login</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

					<!-- 		<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div> -->

							<p class="text-center">Don't have an account yet? <a href="admin_signup.php">Sign Up!</a>

						</form>
					</div>
				</div>
			</div>
		</section>
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


<script>
	$(document).ready(function(){
	    $(document).on('click', '.toggle-password', function(){  
		    $(this).toggleClass("fa-eye fa-eye-slash");
		    var input = $("#admin_login_password");

		    $("#login_password").blur(); 

		    if (input.attr("type") === "password") {
		      input.attr("type", "text");
		    } else {
		      input.attr("type", "password");
		    }
	    });
    })


</script>