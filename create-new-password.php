<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<!-- To restrict the client  -->
 <?php 
 	if(!isset($_SESSION['create_new_password'])){
	 	?>
		 	<script>
				window.location.href = 'login';
			</script>
	 	<?php
 	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new password - HMG Fitness Center</title>
 
    <?php require('assets/credentials_head_plugins.php'); ?>
</head>
<body>

 <style type="text/css">

 	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    *{
        font-family: 'Poppins', sans-serif;
        /*border: 1px solid black!important;*/
    }

    #form1{
        background-color: #171819!important;
    }
</style>

  <?php 
  	$reset_code_correct = 0;
	if (isset($_POST['reset_code_submit'])) {	

		$reset_code_correct = 0;
		$email = $_SESSION['client_email'];
		$reset_code = $_POST['reset_code'];
		$query = "SELECT * FROM `verified_email` WHERE email='$email'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$reset_code_db = $row['reset_code'];

		if($reset_code_db == $reset_code){
			$reset_code_correct = 1;
		}else{

			?>
				<script type="text/javascript">
					Swal.fire({
						icon: 'error',
						title: "Incorrect reset code"
					})
				</script>
			<?php
		}
	}
 ?>

 


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


</style>
	
	<?php 
		$email = $_SESSION['client_email'];
		// $reset_code = $_POST['reset_code'];
		$query = "SELECT * FROM `verified_email` WHERE email = '$email' ";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);

		if($reset_code_correct == 1){
	?>

	<div id="form1" class="login-container-form">
		<section class="body-sign">
			<div class="center-sign">
				<a href="index" class="logo pull-left">
					<img src="admin/assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-key mr-xs"></i>Create New Password</h2>
					</div>
					<div class="panel-body">
						<form  id="change_pass_form" method="POST">
							<div class="form-group mb-lg">
								<labek class=""><span class="text-uppercase text-semibold text-dark">New Password</span></label>

								<label class=" text-dark"> 
                                    <span id="letter">&nbsp;Lowercase Letter</span> &
                                    <span id="capital">&nbsp;One Uppercase</span> &
                                    <span id="number">&nbsp;One Number</span> &
                                    <span id="length">&nbsp;8+ Characaters</span>
                                </label>

								<div class="input-group input-group-icon">
											
									<input type="password" class="form-control input-lg"  maxlength="50" id="signup_password" name="signup_password"  placeholder="Enter new password here"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup="check()" required >
									
									<span class="input-group-btn">
			                              <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-new-password" style="font-size:25px!important; color: black;"></span></button>
			                         </span>
								</div>
							</div>


							<div class="form-group mb-lg">
								<label class="pull-left text-uppercase text-semibold text-dark">Confirm New Password</label>


								<label class=" text-dark"> 
	                                <span id="letter2">&nbsp;Lowercase Letter</span> &
	                                <span id="capital2">&nbsp;One Uppercase</span> &
	                                <span id="number2">&nbsp;One Number</span> &
	                                <span id="length2">&nbsp;8+ Characters</span>
                                </label>

								<div class="input-group input-group-icon">
									 
									 <input type="password" class="form-control input-lg"  maxlength="50" id="signup_cpassword" name="signup_cpassword" placeholder="Enter confirm password here"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup="check2()" required>

									<span class="input-group-btn">
			                              <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-confirm-password" style="font-size:25px!important; color: black;"></span></button>
			                         </span>
								</div>
							</div>

							<input type="hidden" class="form-control input-lg"  id="email" name="email"  placeholder="Enter new password here" value="<?php echo $_SESSION['client_email']; ?>" >

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
									
									</div>
								</div>

								<div class="col-sm-4 text-right">
									<!-- <button type="submit" name="submit" class="btn btn-primary hidden-xs login">Login</button> -->
									<button type="submit" name="submit" class="btn-lg btn-primary" >Save</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
							<!-- 	<span>or</span> -->
							</span>

						</form>
					</div>
				</div>
			</div>

		</section>
			</div>
		<!-- end: page -->
	<?php }else{ ?>
		<div id="form1" class="login-container-form">
			<section class="body-sign">
				<div class="center-sign">
					<a href="index" class="logo pull-left">
						<img src="admin/assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
					</a>

					<div class="panel panel-sign">
						<div class="panel-title-sign mt-xl text-right">
							<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Reset Code</h2>
						</div>
						<div class="panel-body">
							<form   method="post">
								<div class="form-group mb-lg">
									<label class="text-uppercase text-semibold text-dark">Enter reset code</label>
									<div class="input-group input-group-icon">
												
										<input type="text" class="form-control input-lg"  maxlength="50" id="reset_code" name="reset_code"  placeholder="Enter reset code here"  required >
										
										<span class="input-group-addon">
											<span class="icon icon-lg">
												<i class="fa fa-key"></i>
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
										<button type="submit" name="reset_code_submit" class="btn btn-primary login" >Submit</button>
									</div>
								</div>

								<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<!-- 	<span>or</span> -->
								</span>

							</form>
						</div>
					</div>
				</div>

			</section>
			</div>
		<!-- end: page -->
	<?php } ?>

<?php require('assets/credentials_footer_plugins.php'); ?>



<script type="text/javascript">
	 $(document).on('click', '.toggle-new-password', function(){  
	    $(this).toggleClass("fa-eye fa-eye-slash");
	    var input = $("#signup_password");
	    if (input.attr("type") === "password") {
	      input.attr("type", "text");
	    } else {
	      input.attr("type", "password");
	    }
    });

	$(document).on('click', '.toggle-confirm-password', function(){  
	    $(this).toggleClass("fa-eye fa-eye-slash");
	    var input = $("#signup_cpassword");
	    if (input.attr("type") === "password") {
	      input.attr("type", "text");
	    } else {
	      input.attr("type", "password");
	    }
    });
	
   // $(document).ready(function(){  

      $("#change_pass_form").submit(function(e){

      	e.preventDefault();

      	var email = $('#email').val().trim();
        var new_password = $('#signup_password').val().trim();
        var password_length = $('#signup_password').val().length;
        var confirm_new_password = $('#signup_cpassword').val().trim();


	    if (new_password == '' || confirm_new_password == '') {
	        	Swal.fire({
						icon: 'warning',
						title: 'There is an empty field!',
						text: 'Please check the missing field!'
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
	    }else if(new_password != confirm_new_password){
		        Swal.fire({
						icon: 'warning',
						title: 'Password don\'t Match!',
						text: 'Please check the password!',
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
		                url:'dashboard/client_ajax.php?action=client_create_new_password',
		                type:'post',
		                data:{
		                    email:email,
		                    new_password:new_password
		                },
		                cache: false,   
		                success:function(data, status){ 
		                	console.log(data);
		                	console.log(status);
		                	
		                   if(data == 1){
		                		Swal.fire({
							          icon: 'success',
							          title: 'Your password has been reset successfully!'
							        }).then((result) => {
							        	 // if (result.value) {
							        	  	 window.location.href = 'login';
							        	 // }
							    })
		                	}else{
		                		Swal.fire({
						          icon: 'error',
						          title: 'Something went wrong! Please try again!'
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

// });  
//End

</script>


