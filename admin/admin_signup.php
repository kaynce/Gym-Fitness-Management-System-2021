<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>

<?php require_once('assets/db_connect.php'); ?>

<?php 
    $query_maintenance = "SELECT * FROM `settings` WHERE setting_id = '143'";
    $result_maintenance = mysqli_query($con, $query_maintenance);
    $row_maintenance = mysqli_fetch_assoc($result_maintenance);
    $maintenance = $row_maintenance['p_one'];
    if($maintenance == 1){
?>

<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />
		<title>Be part of our team</title>
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

	    .btn{
	    	font-size: 15px;
	    }

	    select{
	    	font-size: 15px!important;
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
		<section class="body-sign">
			<div class="center-sign">
				<a href="../index" class="logo pull-left">
					<img src="assets/images/admin-hmg-logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<a href="../index"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-home mr-xs"></i> Home</h2></a>
                        <a href="admin_signup"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Signup</h2></a>
					</div>
					<div class="panel-body">
						<form   id="form" method="POST"  onsubmit="return Validate(this);" enctype="multipart/form-data" >

							<div class="form-group mb-lg">
								<label class="text-uppercase text-semibold text-dark">First Name</label>
								<div class="input-group input-group-icon">

									 <input type="text" class="form-control input-lg"  maxlength="50" id="signup_firstname" name="signup_firstname"  placeholder="Input First Name Here" required>

									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<label class="text-uppercase text-semibold text-dark">Last Name</label>
								<div class="input-group input-group-icon">
									 <input type="text" class="form-control input-lg"  maxlength="50" id="signup_lastname" name="signup_lastname"  placeholder="Input Last Name Here" required>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>


							<div class="form-group mb-lg">
								<label class="text-uppercase text-semibold text-dark">Email</label>
								<div class="input-group input-group-icon">
								 <input type="email" class="form-control input-lg"  maxlength="50" id="signup_email" name="signup_email"  placeholder="Input Email Name Here" onkeyup	="validateEmail()" required>
								<!--   <center><span id="email_message"></span></center> -->
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-envelope"></i>
										</span>
									</span>
								</div>
							</div>


							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left text-uppercase text-semibold text-dark">Password</label>
									
									<label class=" text-dark"> 
                                        <span id="letter">&nbsp;Lowercase Letter</span> &
                                        <span id="capital">&nbsp;One Uppercase</span> &
                                        <span id="number">&nbsp;One Number</span> &
                                        <span id="length">&nbsp;8+ Characaters</span>
                                    </label>

								</div>
								<div class="input-group input-group-icon">
									 <input type="password" class="form-control input-lg"  maxlength="50" id="signup_password" name="signup_password"  placeholder="Input Password Name Here" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup="check()" required>
									 <!-- <center><span id="message"></span></center> -->

									<span class="input-group-btn">
			                              <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-first-password" style="font-size:25px!important; color: black;"></span></button>
			                         </span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left text-uppercase text-semibold text-dark">Confirm Password</label>
									
									<label class=" text-dark"> 
                                        <span id="letter2">&nbsp;Lowercase Letter</span> &
                                        <span  id="capital2">&nbsp;One Uppercase</span> &
                                        <span id="number2">&nbsp;One Number</span> &
                                        <span id="length2">&nbsp;8+ Characters</span>
                                    </label>

								</div>
								<div class="input-group input-group-icon">
									 <input type="password" class="form-control input-lg"  maxlength="50" id="signup_cpassword" name="signup_cpassword" placeholder="Input Confirm Password Here"  minlength="8"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  onkeyup="check2()" required>
									<span class="input-group-btn">
			                              <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password" style="font-size:25px!important; color: black;"></span></button>
			                         </span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left text-uppercase text-semibold text-dark">Type</label>
			
								</div>
								<div class="input-group input-group-icon">
									<select type="text" class="form-control dropdown" id="type" name="type" value=""  required="">
		                              <option></option>
		                              <option value="sub_admin">Sub-Admin</option>
		                              <option value="trainor">Trainor</option>
		                            </select>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="terms_privacy" name="terms_privacy" type="checkbox" required/>
										<label for="RememberMe">I accept the 
										<a target='_blank' href="../terms-and-conditions">Terms and Conditions</a>
									    and
									    <a target='_blank' href="../privacy-policy">Privacy Policy</a> 
									    </label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" name="submit" class="btn btn-primary">Sign up</button>
								</div>
							</div>


							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

						<!-- 	<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div> -->

							<p class="text-center sign-up-btn">Already have an account? <a href="login">Login!</a></p>

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

		<script src="assets/vendor/select2/select2.js"></script>

		<!--  Javascript spinner -->
		<script src="../assets/javascript/main.js"></script>

		<!-- Validate Password -->
        <script src="assets/javascripts/validate_password.js"></script>
	</body>
</html>
<!--  $('.select2').select2({
    placeholder:'Please Select Here',
    })
 -->

<script >

	 $(document).on('click', '.toggle-first-password', function(){  
	    $(this).toggleClass("fa-eye fa-eye-slash");
	    var input = $("#signup_password");
	    if (input.attr("type") === "password") {
	      input.attr("type", "text");
	    } else {
	      input.attr("type", "password");
	    }
    });

	$(document).on('click', '.toggle-password', function(){  
	    $(this).toggleClass("fa-eye fa-eye-slash");
	    var input = $("#signup_cpassword");
	    if (input.attr("type") === "password") {
	      input.attr("type", "text");
	    } else {
	      input.attr("type", "password");
	    }
    });

	  function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function validateEmail(){
    	var form = document.getElementById("form");
    	var email = document.getElementById("signup_email").value;
    	var email_message = document.getElementById("email_message");
    	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    	if(email.match(pattern)){
    		form.classList.add("valid");
    		form.classList.remove("invalid");
    		document.getElementById('email_message').style.color = 'green';
	        document.getElementById('email_message').innerHTML = 'Your email address is valid';
    	}else{
    		form.classList.remove("valid");
    		form.classList.add("invalid");
    		document.getElementById('email_message').style.color = 'red';
	        document.getElementById('email_message').innerHTML = 'Please enter valid email address';
    	}

    	if(email == ""){
    		form.classList.remove("valid");
    		form.classList.remove("invalid");
    		document.getElementById('email_message').style.color = '#00ff00';
    	}
    }

	// var check = function() {

	//       if (document.getElementById('signup_password').value === document.getElementById('signup_cpassword').value) {
	//           document.getElementById('message').style.color = 'green';
	//           document.getElementById('message').innerHTML = 'Password Match';
	//       } else {
	//           document.getElementById('message').style.color = 'red';
	//           document.getElementById('message').innerHTML = 'Password dont Match';
	//       }

	//       if (document.getElementById('signup_password').value == '') {
	//           document.getElementById('message').style.color = 'blue';
	//           document.getElementById('message').innerHTML = 'Input Password';
	//       }

	//       if (document.getElementById('signup_cpassword').value == '') {
	//           document.getElementById('message').style.color = 'blue';
	//           document.getElementById('message').innerHTML = 'Input Confirm Password';
	//       }
 //    }

    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
		function Validate(oForm) {
		    var arrInputs = oForm.getElementsByTagName("input");

		    for (var i = 0; i < arrInputs.length; i++) {
		        var oInput = arrInputs[i];
		        if (oInput.type == "file") {
		            var sFileName = oInput.value;
		            if (sFileName.length > 0) {
		                var blnValid = false;
		                for (var j = 0; j < _validFileExtensions.length; j++) {
		                    var sCurExtension = _validFileExtensions[j];
		                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
		                        blnValid = true;
		                        break;
		                    }
		                }
		                
		                if (!blnValid) {

		                    //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
		                    document.getElementById('message_file').style.color = 'red';
		                    // document.getElementById('message_file').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

		                     alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

		                  

		                    return false;
		                }
		            }
		        }
		    }
		  
		    return true;
		}

	 $(document).ready(function(){  

      $("form").submit(function(e){
        e.preventDefault();

        var firstname =$('#signup_firstname').val().trim();
        var lastname = $('#signup_lastname').val().trim();
        var email = $('#signup_email').val().trim();
        var password = $('#signup_password').val().trim();
        var password_length = $('#signup_password').val().length;
        var cpassword = $('#signup_cpassword').val().trim();
        var type = $('#type').val().trim();
        var terms_privacy = $('#terms_privacy:checkbox:checked').length > 0;
        var form = document.getElementById("form");
    	var email = document.getElementById("signup_email").value.trim();
    	var email_message = document.getElementById("email_message");
    	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	    if (firstname == '' || lastname == '' || email == '' || password == '' || cpassword == '' || type == '') {
	        	Swal.fire({
						icon: 'warning',
						title: 'All field are required!'
						//showConfirmButton: false,
						//timer: 1500
				})   
	    }else if(terms_privacy == ''){
	    	Swal.fire({
						icon: 'info',
						title: 'If you agree to the Terms, Conditions and Privacy Policy. Check the checkbox below',
						text: 'Please check the checkbox!',
						//showConfirmButton: false,
						//timer: 1500
				})  
	    }else if(!email.match(pattern)){
		        Swal.fire({
						icon: 'warning',
						title: 'Invalid email address!',
						text: 'Please enter valid email address!',
						//showConfirmButton: false,
						//timer: 1500
				}) 
	    }else if(password_length < 8){
		        Swal.fire({
						icon: 'info',
						title: 'Please enter at least 8 characters in password!'
						//showConfirmButton: false,
						//timer: 1500
				}) 
	    }else if(password != cpassword){
		        Swal.fire({
						icon: 'warning',
						title: 'Password don\'t Match!',
						text: 'Please check the password!',
						//showConfirmButton: false,
						//timer: 1500
				}) 
	    }else {

	        // Start sweetalert
	        Swal.fire({
	           title: 'This is a confirmation that I am aware with the terms and conditions of the creation of this account.',
	            text: "",
	            icon: 'question',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            confirmButtonText: 'Yes, I\'m In'            
	        }).then((result) => {
	            if (result.value) {

		            $.ajax({  
		                url:'ajax.php?action=insert_new_user_action',
		                type:'post',
		                data:{
		                    firstname:firstname,
		                    lastname:lastname,
		                    email:email,
		                    password:password,
		                    type:type
		                },
		                cache: false,   
		                success:function(data, status){ 
		                	console.log(data);
		                	console.log(status);
		                	
		                   if(data == 2){
		                		Swal.fire({
								          icon: 'error',
								          title: 'Email is already registered!'
								        })
		                	}else if (status == 'success') {
		            //     		Swal.fire({
						        //   icon: 'success',
						        //   title: 'Submitted Successfully!',
						        //   text: 'Your account will be approved by the admin',
						        //   allowOutsideClick: false
						        // }).then((result) => {
						        // 	 // if (result.value) {
						        // 	  	 window.location.href = 'login';
						        // 	 // }
						        // })
						         Swal.fire({
                                    icon: 'success',
                                    title: "Email Sent!",
                                    text: 'Your confirmation code has successfully been sent to your email',
                                    allowOutsideClick: false
                                }).then((result) => {
                                        // if (result.value) {
                                    window.location.href = 'verify-your-email';
                                        // }
                                })
		                	}else{
		                		Swal.fire({
						          icon: 'error',
						          title: 'Signup failed!'
						        })
		                	}
		                }  
		           }); 

	            }
	        })
          // End sweetalert
        }


      }); 

 });  
//End

</script>

<?php }else{ ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Under Maintenance - HMG Fitness Center</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="dist/css/error-pages/bootstrap.css">
        <link rel="stylesheet" href="dist/css/error-pages/app.css">
        <link rel="stylesheet" href="dist/css/error-pages/error.css">
    </head>

    <body>
        <div id="error">


            <div class="error-page container">
                <div class="col-md-8 col-12 offset-md-2">
                   
                    <div class="text-center">
                        <h1 class="error-title">UNDER MAINTENANCE</h1>
                        <a href="index" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                    </div>
                </div>
            </div>


        </div>
    </body>

    </html>

    <style type="text/css">
        @media screen and (max-width: 496px){
            h1{
                font-size: 45px!important;
            }

            .container{
                align-items: center;
            }
        }
    </style>

<?php } ?>