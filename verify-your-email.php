<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<!-- To restrict the client  -->

<!DOCTYPE html>
<html class="fixed">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Verify your email - HMG Fitness Center</title>
        <meta name="description" content="Start your journey and build a habit for a healthy life.">
        <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, ">
         <?php require('assets/credentials_head_plugins.php'); ?>

		 <!-- Customized Bootstrap Stylesheet for spinner-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!--  Stylesheet for spinner-->
        <link href="assets/css/style.css" rel="stylesheet">



    </head>

    <body class="page-body login-page login-form-fall">


	<style type="text/css">

		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

	    *{
	        font-family: 'Poppins', sans-serif;
	        /*border: 1px solid black!important;*/
	    }
    
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


		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="index" class="logo pull-left">
					<img src="admin/assets/images/admin-hmg-logo.png" height="54" alt="HMG Fitness Center Logo" />
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
							<!-- 	<form method="POST"> -->

									<input type="hidden" class="form-control"  maxlength="10" id="verify_user_email" name="verify_user_email" value="<?php echo isset($_SESSION['reg_email']) ? $_SESSION['reg_email']: '' ?>" >

									<input type="text" class="form-control"  maxlength="10" id="ver_code" name="ver_code" style="text-align: center; font-size: 15px" placeholder="Enter Verification Code Here" required>
								
								
								<br>
								
									<button type="submit" name="submit" class="btn btn-primary confirm" style="text-align: center; font-size: 15px">Confirm</button>
								<!-- </form> -->
								<br>
								<hr class="separator">
								<a class="fa fa-sign-out mr-xs" href="action/client_logout_action" style="color:blue!important; font-size: 1.8rem;"> &nbsp; Logout</a>
								<center>
							</div>

					</div>
				</div>
			</div>
		</section>
		<!-- end: page -->
</div>


<?php require('assets/credentials_footer_plugins.php'); ?>


    <!--  Javascript for spinner -->
<script src="assets/javascript/main.js"></script>

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
	                url:'dashboard/client_ajax.php?action=send_verification_code_action',
	                type:'post',
	                data:{
	                    email:email
	                }, 
	                cache: false, 
	                success:function(data, status){

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
                url:'dashboard/client_ajax.php?action=check_verification_code_action',
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
							window.location.href = 'dashboard/index';
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
