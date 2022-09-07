<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }

	 // unset($_SESSION['nav-active 1']);

	 // $_SESSION['nav-active 2'] = "nav-active 2";
	 $nav_active_2 = "nav-active";
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
						   <!-- Start third card -->
             
            <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="health-status"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">Health Status</h2>
                    <br>

                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">
                                                                        
                                              </colgroup>

                                            <thead style="" class="text-uppercase text-semibold text-dark">
                                                <tr>
                                                    <th scope="col" class="center">Action</th>
                                                    <th scope="col" class="center">Date</th>
                                                    <th scope="col"  class="center" >#</th>
                      
                                                    <th scope="col" class="center">Weight</th>
                                                    <th scope="col" class="center">Body Fats</th>
                                                    <th scope="col" class="center">Bone Density</th>
                                                    <th scope="col" class="center">Body Water</th>
                                                    <th scope="col" class="center">Muscle Mass</th>
                                                    <th scope="col" class="center">Body Structure</th>
                                                    <th scope="col" class="center">Basal Metabolic (BM) </th>
                                                    <th scope="col" class="center">Metabolic Age </th>
                                                    <th scope="col" class="center">Visceral Fats </th>
                                           
                                                </tr>
                                            </thead>
                                           <tbody>
                        
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                                       			
                                       			if(isset($_SESSION['email'])){
                                       				 $email = $_SESSION['email'];
                                       				 $query = "SELECT * FROM `members` WHERE email = '$email' ";

                                       				 $result = mysqli_query($con, $query);

                                       				 if(mysqli_num_rows($result)){
                                       				 	$row = mysqli_fetch_array($result);

                                       				 	$member_id = $row['member_id'];
                                       				 }
                                       			}	
                                       			
                                               

                                                $query = "SELECT * FROM `health_status` WHERE member_id = '$member_id' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
                                                     <a type="button" href="assets/ajax/view_health_status.php?id=<?php echo $row['id']; ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-success" >View</a>
                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                               
                                                 
                                                  <td class="center">
                                                     <?php echo date("M d,Y", strtotime($row['date_created'])) ?>
                                                     
                                                  </td>

                                                   <td class="center"><?php echo $i++ ?></td>

                                                  <td class="center">
                                                   <?php echo ucwords($row['weight']) ?>
                                                     
                                                  </td>
                                                  
                                                  <td class="center">
                                                     <?php echo $row['body_fats'] ?>
                                                  </td>
                                                  
                                               
                                                  <td class="center">
                                                    <?php echo $row['bone_density'] ?>
                                                  </td>


                                                  <td class="center">
                                                     <?php echo $row['body_water'] ?>
                                                  </td>


                                                  <td class="center">
                                                     <?php echo $row['muscle_mass'] ?>
                                                  </td>


                                                  <td class="center">
                                                     <?php echo $row['body_structure'] ?>
                                                  </td>


                                                  <td class="center">
                                                     <?php echo $row['basal_metabolic'] ?>
                                                  </td>


                                                  <td class="center">
                                                     <?php echo $row['metabolic_age'] ?>
                                                  </td>


                                                  <td class="center">
                                                     <?php echo $row['visceral_fats'] ?>
                                                  </td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>

                      </table>
                    </div>
                  </div>

                </section>  

            </div>
            <!-- End third card -->
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

