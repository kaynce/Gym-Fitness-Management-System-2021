<?php if (session_status() == PHP_SESSION_NONE){ session_start(); } ?>

<?php
if(isset($_SESSION['id'])){
  ?>
	<script type="text/javascript">
		window.location.href = 'dashboard';
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
    <title>Recover Password - HMG Fitness Center</title>
    <meta name="description" content="">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, recover password">
 
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

	<div id="form1" class="login-container-form">
		<section class="body-sign">
			<div class="center-sign">
				<a href="index" class="logo pull-left">
					<img src="admin/assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
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
									 
									  <input type="email" class="form-control input-lg"  maxlength="50" id="email" name="email" placeholder="Enter your email here" required>

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

  <?php require('assets/credentials_footer_plugins.php'); ?>

<script type="text/javascript">

	
   // $(document).ready(function(){  
    
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
	        	console.log('Working');

		            $.ajax({  
		                url:'dashboard/client_ajax.php?action=client_rp_mail_action',
		                type:'post',
		                data:{
		                    email:email
		                },
		                cache: false, 
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

// });  
//End

</script>

