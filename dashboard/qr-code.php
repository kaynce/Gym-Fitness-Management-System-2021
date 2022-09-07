<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }

	 // unset($_SESSION['nav-active 1']);

	 // $_SESSION['nav-active 2'] = "nav-active 2";
	 $nav_active_qr_code = "nav-active";
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
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span></span></li>
							</ol>
							
							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

						</div>
					</header>

					
			     <div class="row">
               <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                          <!--   <h5 class="card-title">One third width</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                         
                                            <h1 class="text-center">QR Code</h1>
                                               <h3 class="text-center">Download or Screenshot your QR code</h3>

                                            <?php 
                                                $email = $_SESSION['email'];


                                               $query = "SELECT * FROM `members` WHERE email='$email' ";

                                     
                                                $result = mysqli_query($con, $query);

                                                if(mysqli_num_rows($result) == 1){
                                                   $row = mysqli_fetch_assoc($result);
                                                   $member_id = $row['member_id'];
                                                }

                                               

                                             ?>
                                             <img src="../admin/qrcodes/<?php echo $member_id ?>.png " alt="" id="cimg" class="img-responsive img-rounded img-thumbnail" style="min-height: 100%!important; min-width: 100%!important;">
                                        </div>

                                         <!--  <button type="button" class="btn btn-info">Download</button>
             -->            

                                        <br>
                                         <center>
                                          <a class="btn btn-info"  href="download_qrcode.php?file=<?php echo $member_id; ?>.png ">Download QR Code</a>
                                        </center>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <h5 class="card-title">One third width</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p> -->
                                        </div>
                                    </div>
                                </div>
                    
              </div>
            </div>

				</section>
			</div>



		</section>

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



<?php include('footer.php'); ?>
