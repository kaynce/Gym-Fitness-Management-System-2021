<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }

	 // unset($_SESSION['nav-active 1']);

	 // $_SESSION['nav-active 2'] = "nav-active 2";
   $nav_dashboard_expanded_account = "nav-expanded";
   $nav_active_client_account = "nav-active";
   $nav_active_c_password = "nav-active";
 ?>



<?php 
include('head.php'); 
?>


	<!--   
	     <div class="preloader">
	        <div class="lds-ripple">
	            <div class="lds-pos"></div>
	            <div class="lds-pos"></div>
	        </div>
	    </div> -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
			    <?php 
			    	require('sidebar.php');
			     ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">

						<h2>Change Password</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								 <li><span>Client Account</span></li>
                <li><span>Change Password</span></li>
							</ol>
							
							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

						</div>
					</header>

					
					<div class="row">
						<!-- Start third card -->
            <div class="col-xl-12">
              <section class="panel">
                
                <header class="panel-heading">
                  <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="change-password.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                  </div>
              
                  <h2 class="panel-title">Change Password</h2>
                </header>

                <div class="panel-body">
                  <form class="form-horizontal form-bordered" method="POST">


                          <div class="form-group">
                              <label class=" col-md-3 control-label text-uppercase text-semibold text-dark">Current Password</label>
                                <div class="col-md-6">
                                <div class="input-group mb-md">
                                  <input type="password" class="form-control"  maxlength="50" id="current_password" name="current_password"  placeholder="Current Password" required>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password-one" style="font-size:19px!important; "></span></button>
                                  </span>
                                </div>
                               </div>
                            </div>
                            
                            <div class="form-group">
                              <label class=" col-md-3 control-label text-uppercase text-semibold text-dark">New Password</label>

                               <label class=" text-dark"> 
                                  <span id="letter">&nbsp;Lowercase Letter</span> &
                                  <span  id="capital">&nbsp;One Uppercase</span> &
                                  <span id="number">&nbsp;One Number</span> &
                                  <span id="length">&nbsp;8+ Characters</span>
                              </label>

                                <div class="col-md-6">
                                <div class="input-group mb-md">
                                   <input type="password" class="form-control"   maxlength="50"  id="signup_password" name="signup_password"  placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup="check()" required>
                                  <center><span id="message"></span></center>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password-two" style="font-size:19px!important; "></span></button>
                                  </span>
                                </div>
                               </div>
                            </div>

                            <div class="form-group">
                              <label class=" col-md-3 control-label text-uppercase text-semibold text-dark">Repeat New Password</label>

                               <label class=" text-dark"> 
                                  <span id="letter2">&nbsp;Lowercase Letter</span> &
                                  <span id="capital2">&nbsp;One Uppercase</span> &
                                  <span id="number2">&nbsp;One Number</span> &
                                  <span id="length2">&nbsp;8+ Characaters</span>
                              </label>

                                <div class="col-md-6">
                                <div class="input-group mb-md">
                                  <input type="password" class="form-control"   maxlength="50"  id="signup_cpassword" name="signup_cpassword" placeholder="Repeat New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup="check()" required>
                                  <center><span id="message"></span></center>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password-three" style="font-size:19px!important; "></span></button>
                                  </span>
                                </div>
                               </div>
                            </div>
                          
                        </div>
                        <?php 
                          $email = $_SESSION['email'];
                          $query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
                          $result = mysqli_query($con, $query);

                          if(mysqli_num_rows($result) != 1){
                            $query = "SELECT * FROM `members` WHERE email = '$email' ";
                            $result = mysqli_query($con, $query);
                          }

                          $row = mysqli_fetch_assoc($result);
                          $current_password_db = $row['password'];

                         ?>

                         <input type="hidden" class="form-control"  id="current_password_db" name="current_password_db" value="<?php echo isset($current_password_db) ? $current_password_db:'' ?>">

                        <input type="hidden" class="form-control"  id="email" name="email" value="<?php echo $_SESSION['email'] ?>">

                          <button type="submit" name="submit" id="submit" class="mb-xs mt-xs mr-xs btn btn-success">Save</button>

                      </form>
                </div>
              </section>
             </div> 

          </div>
          <!-- end: page --> 
          
            <!-- End third card -->
					</div>

				</section>
			</div>



		</section>


<script>
   $(document).on('click', '.toggle-password-one', function(){  
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#current_password");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }

  });


 $(document).on('click', '.toggle-password-two', function(){  
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#signup_password");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }

  });


 $(document).on('click', '.toggle-password-three', function(){  
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#signup_cpassword");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }

  });


// new password cannot be the same as current password
 var check = function() {

        if (document.getElementById('signup_password').value === document.getElementById('signup_cpassword').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password Match';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Password dont Match';
        }

        if (document.getElementById('new_password').value == '') {
            document.getElementById('message').style.color = 'blue';
            document.getElementById('message').innerHTML = 'Input Password';
        }

        if (document.getElementById('repeat_new_password').value == '') {
            document.getElementById('message').style.color = 'blue';
            document.getElementById('message').innerHTML = 'Input Confirm Password';
        }
    }


 $(document).ready(function(){  

   
    $("form").submit(function(e){
      e.preventDefault();
    
        let current_password = $('#current_password').val();
        let new_password = $('#signup_password').val();
        let repeat_new_password = $('#signup_cpassword').val();
        let email = $('#email').val();
        let current_password_db = $('#current_password_db').val();
      
      let new_password_hash = CryptoJS.MD5(new_password);
        let current_password_hash = CryptoJS.MD5(current_password);
       
        //console.log(current_password_hash);


        if(current_password == '' || new_password == '' || repeat_new_password == ''){
          Swal.fire({
              icon: 'warning',
              title: 'There is an empty field!',
              text: 'Please check the missing field!',
              //showConfirmButton: false,
              //timer: 1500
            }) 
        }else{

          if(current_password_hash != current_password_db){
            Swal.fire({
              icon: 'error',
              title: 'Current Password mismatched!',
              text: 'Please check the password carefully.',
              //showConfirmButton: false,
              //timer: 1500
            }) 
        }else if(new_password != repeat_new_password){
            Swal.fire({
              icon: 'error',
              title: 'Password mismatched!',
              text: 'Please check the password carefully.',
              //showConfirmButton: false,
              //timer: 1500
            }) 
        }else if(new_password_hash == current_password_db){
            Swal.fire({
              icon: 'error',
              title: 'Same password not allowed!',
              text: 'New password cannot be the same as current password.',
              //showConfirmButton: false,
              //timer: 1500
            }) 
        }else{
            // Swal.fire({
            //    title: 'Are you sure?',
            //     text: "",
            //     icon: 'question',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes'            
            // }).then((result) => {
                //if (result.value) {

                  $.ajax({  
                      url:'client_ajax.php?action=save_new_password_action',
                      type:'post',
                      data:{
                          email:email,
                          new_password:new_password
                      }, 
                      cache: false, 
                      success:function(data, resp){
                      
                            if(data == 1){

                              Swal.fire({
                                    icon: 'success',
                                    title: 'Saved Successfully!',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }).then((result) =>{
                                      window.location.href = 'change-password';
                                  })

                            }else{

                              Swal.fire({
                                    icon: 'warning',
                                    title: 'Failed to change password!',

                                  })

                            }
                      }

                  }); 

         

               // }
                //End Swal else
            //})  
            //End Swal 
          }
          //End else
       }
       //End if  
  }); 
        //End


 });  
</script>

<!-- Vendor -->
		<script src="../admin/assets/vendor/jquery/jquery.js"></script>
		<script src="../admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../admin/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../admin/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="../admin/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>

		<script src="../admin/assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../admin/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../admin/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../admin/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../admin/assets/javascripts/forms/examples.wizard.js"></script>

    
    <!-- Validate Password -->
    <script src="../admin/assets/javascripts/validate_password.js"></script>
      

<?php include('footer.php'); ?>


