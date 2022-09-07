<?php 
	 if (session_status() === PHP_SESSION_NONE){ 
	    session_start(); 
	 }
	  $nav_dashboard_expanded = "nav-expanded";
	  $nav_active_dashboard  = "nav-active";
	  $nav_active_dashboard_dashboard  = "nav-active";
 ?>

<?php 
include('head.php'); 
?>




 <!-- Admin -->
<?php 
	# Start Check expiration date
	try{

		if (!$r = $con->query("SELECT * FROM enrolls_to")) {
			    // handle error
			}

		while ($row = $r->fetch_assoc()) {

			if(strtotime(date('Y-m-d')) <= strtotime($row['end_date'])){
				//active
			}else if(empty($row['end_date'])){
				//if there is no end date then closed
				if($row['remaining_session'] == 0){
					$id = $row['id'];

					$status = "2";
					$query = "UPDATE `enrolls_to`  
					          SET status = '$status' 
					          WHERE id = '$id' ";
					mysqli_query($con, $query);
				}
			}else{
				//inactive
				$id = $row['id'];

				$status = "0";
				$date_today = date("Y-m-d"); 

				$query = "UPDATE `enrolls_to`  
				          SET status = '$status' 
				          WHERE id = '$id' ";

			// $query = "UPDATE `enrolls_to` 
			//SET status = '$status'
		    //  ";

				mysqli_query($con, $query);
			}
		}

	}catch(Exception $e){}
	#End Check expiration date

       // count the total members in the database
        $select = "SELECT * FROM members WHERE status = 'approved'";
 
        $result = mysqli_query($con, $select);
         
        $total_members = mysqli_num_rows($result);
        
        #Total packages
        // count the total packages in the database
        $select_list = "SELECT * FROM physical_fitness_packages_rates";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_packages = mysqli_num_rows($result_list);

        #Total trainers
        // count the total trainers in the database
        $select_list = "SELECT * FROM users WHERE status = 'approved' AND type = 'trainor' ";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_trainers = mysqli_num_rows($result_list);

         #Total trainers
        // count the total trainers in the database
        $select_list = "SELECT * FROM pending_members WHERE status = 'pending'";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_pending_members = mysqli_num_rows($result_list);

         #Total Pending Enrolled
        // count the total pending enrolled in the database
        $select_list = "SELECT * FROM enrolls_to WHERE add_renew_status = 'pending'";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_pending_enrolled = mysqli_num_rows($result_list);
     ?>

 <!-- Trainor -->
 <?php 
       #Total clients
        // count the total clients in the database
        $user_id = $_SESSION['user_id'];
        $select_list = "SELECT * FROM `enrolls_to` WHERE add_renew_status = 'approved' AND trainor_id = '$user_id' AND status = '1' ";
 
        $result_list = mysqli_query($con, $select_list);

        $total_clients = mysqli_num_rows($result_list);
  ?>
	<!--   
	     <div class="preloader">
	        <div class="lds-ripple">
	            <div class="lds-pos"></div>
	            <div class="lds-pos"></div>
	        </div>
	    </div> -->


	    <?php 
	    	if(isset($_SESSION['loading'])){
				?>
					<script type="text/javascript">
						let timerInterval
						Swal.fire({
						  title: 'Loading...',
						  html: 'I will close in <b></b> milliseconds.',
						  timer: 2000,
						  allowOutsideClick: false,
						  timerProgressBar: true,
						  didOpen: () => {
						    Swal.showLoading()
						    const b = Swal.getHtmlContainer().querySelector('b')
						    timerInterval = setInterval(() => {
						      b.textContent = Swal.getTimerLeft()
						    }, 100)
						  },
						  willClose: () => {
						    clearInterval(timerInterval)
						  }
						}).then((result) => {
						  /* Read more about handling dismissals below */
						  if (result.dismiss === Swal.DismissReason.timer) {

						    console.log('I was closed by the timer');
						    //Unset the loading session
						    window.location.href = 'unset.php';
						  }
						})

					</script>
				<?php
	    	}
	     ?>
			<div class="inner-wrapper">
				
				<?php 
					require('sidebar.php');
				 ?>

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
								<li><span>Dashboard</span></li>
							</ol>
							
							<?php 
							$type = $_SESSION['type'];

							if ($type == 'admin') {
									// $row = mysqli_fetch_assoc($result);

							?>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>

							<?php 
							} else {
							 ?>
							<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>
							<?php 
							}
							 ?>

						</div>
					</header>


					<!-- start: page -->
					<div class="row">
					
						<!-- <div class="col-md-6 col-lg-12 col-xl-6"> -->
						<div class="">
							<div class="row">

								<!----Start if else -->
									<?php 
									$user_id = $_SESSION['user_id'];
									$type = $_SESSION['type'];

									$status = 'approved';


									if ($type == 'admin') {
										// $row = mysqli_fetch_assoc($result);

									 ?>

							<!-- 	<div class="col-md-12 col-lg-4 col-xl-4"> -->
								<div class="col-md-12 col-lg-4">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Active Members</h4>
														<div class="info">
															<strong class="amount"><?php echo $total_members ?></strong>
															<!-- <span class="text-primary">(14 unread)</span> -->
														</div>
													</div>
													<div class="summary-footer">
														<!-- <a class="text-muted text-uppercase">(view all)</a> -->
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<!-- <div class="col-md-12 col-lg-4">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Membership Plans</h4>
														<div class="info">
															<strong class="amount"><?php echo $total_plans ?>0</strong>
														</div>
													</div>
													<div class="summary-footer">
													
													</div>
												</div>
											</div>
										</div>
									</section>
								</div> -->

								<div class="col-md-12 col-lg-4">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-shopping-cart"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Packages</h4>
														<div class="info">
															<strong class="amount"><?php echo $total_packages ?></strong>
														</div>
													</div>
													<div class="summary-footer">
													<!-- 	<a class="text-muted text-uppercase">(statement)</a> -->
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-md-12 col-lg-4">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Trainors</h4>
														<div class="info">
															<strong class="amount"><?php echo $total_trainers ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<!-- <a class="text-muted text-uppercase">(report)</a> -->
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-md-12 col-lg-4 ">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Pending Members</h4>
														<div class="info">
															<strong class="amount"><?php echo $total_pending_members ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<!-- <a class="text-muted text-uppercase">(report)</a> -->
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-md-12 col-lg-4 ">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Pending Enrolled</h4>
														<div class="info">
															<strong class="amount"><?php echo $total_pending_enrolled ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<!-- <a class="text-muted text-uppercase">(report)</a> -->
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<?php 
								}else{	
								 ?>
								 <?php 
								 	//Get the email and then check if the email is already verified
									$query_email = "SELECT * FROM `users` WHERE user_id = '$user_id' ";
									$result_email = mysqli_query($con, $query_email);
									$row_email = mysqli_fetch_assoc($result_email);

									$user_email = $row_email['email'];

									//Check if the email is verified
									$query_check = "SELECT * FROM `verified_email` WHERE email = '$user_email' ";
									$result_check = mysqli_query($con, $query_check);
									$row_check = mysqli_fetch_assoc($result_check);

									$status_check = $row_check['status'];

									if($status_check == 1){
								  ?>

								 	<div class="col-md-12 col-lg-4 ">
										<section class="panel panel-featured-left panel-featured-quartenary">
											<div class="panel-body">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-quartenary">
															<i class="fa fa-user"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Total Clients</h4>
															<div class="info">
																<strong class="amount"><?php echo $total_clients ?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<!-- <a class="text-muted text-uppercase">(report)</a> -->
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>


								 <?php
								 		}//End check email 
									}
								  ?>


							</div>
						</div>
					</div>


				<div class="row">
					<?php 
						$user_id = $_SESSION['user_id'];
						$type = $_SESSION['type'];

					    $status = 'approved';


						if ($type == 'admin') {
											// $row = mysqli_fetch_assoc($result);

					?>

					<div class="col-xl-12">
						<section class="panel">
							
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="index.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
								</div>
						
								<h2 class="panel-title">Pending Members</h2>
							</header>

							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<colgroup>
		                               <col width="25%">
		                            </colgroup>

									<thead>
										<tr>
											<th class="text-center">Action</th>
											<th class="text-center">#</th>
										<!-- 	<th class="text-center">Membership Expiry</th>
											<th class="text-center">Member ID</th> -->
											<th class="hidden-phone text-center">Name</th>
											<th class="hidden-phone text-center">Gender</th>
											<th class="hidden-phone text-center">Address</th>
											<th class="hidden-phone text-center">Date of Reg.</th>
										</tr>
									</thead>
									

									<tbody>
									<?php 
                                         $i = 1;
                                         $member = "SELECT *,concat(lastname,', ',firstname) as name from pending_members WHERE status ='pending' order by id desc ";

                                         $result = mysqli_query($con, $member);
                                                
                                         while ($row = mysqli_fetch_array($result)):
                                    ?>
										<tr>
											<td class="center">

												<input  type="button" class="btn btn-sm btn-success approve" value="Approve" id="<?php echo $row['id'];?>">

													<!-- Modal Full -->

												  <a type="button" href="assets/ajax/view_pending_member.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" >View</a>
												 
												<!-- <a type="button" href="assets/ajax/view_fitness_goals_modal.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-success" >Full</a> -->

												<!-- <a type="button" href="#" class=" btn btn-success" >View</a> -->
												
												<!-- <a type="button" class="btn btn-sm btn-info" href="view_pending_member.php?id=<?php echo $row['id'];?>">View</a> -->

                                                <input  type="button" class="btn btn-sm btn-danger decline" value="Decline" id="<?php echo $row['id'];?>">

                                            </td>

											<td class="center">
												<?php echo $i++; ?>
											</td>

											<!-- <td class="center" >
												 <?php echo $row['membership_expiry'] ?>
											</td>
 -->
										<!-- 	<td class="center ">
												 <?php echo $row['member_id'] ?>
											</td> -->

											<td class="center ">
												 <?php echo $row['name'] ?>	
											</td>

											<td class="center ">
												 <?php echo $row['gender'] ?>
											</td>

											<td class="center ">
												 <?php echo substr($row['region'].' '.$row['house_no'].''.$row['street_name'].''.$row['province'].''.$row['city'].''.$row['barangay'].''.$row['postal_code'], 0, 20) ?>
                                                     ...  
											</td>

											<td class="center ">
												<?php echo date("M d,Y",strtotime($row['date_created'])) ?>
											</td>
										</tr>
										<?php endwhile; ?>			
									</tbody>
									

								</table>
							</div>
						</section>
					   </div>	

					   <?php 
						} else {
						?>
						
						<?php 
							if(isset($_SESSION['email_sent'])){
									unset($_SESSION['email_sent']);
									?>
										 <script type="text/javascript">
										 	Swal.fire({
											    icon: 'success',
												title: "Email Sent!",
												text: 'Your confirmation link has successfully been sent to your email'
											}).then((result) => {
													// if (result.value) {
												//window.location.href = 'index.php';
													// }
											})
										 </script>
							    	<?php
							} 
						?>

						<?php 
							//Get the email and then check if the email is already verified
							$query_email = "SELECT * FROM `users` WHERE user_id = '$user_id' ";
							$result_email = mysqli_query($con, $query_email);
							$row_email = mysqli_fetch_assoc($result_email);

							$user_email = $row_email['email'];

							//Check if the email is verified
							$query_check = "SELECT * FROM `verified_email` WHERE email = '$user_email' ";
							$result_check = mysqli_query($con, $query_check);
							$row_check = mysqli_fetch_assoc($result_check);

							$status_check = $row_check['status'];

							if($status_check == 1){

						?>
						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="index.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Clients</h2>
									</header>


									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                        <!--     <col width="5%"> -->
		                                            <col width="5%">
		                                            <col width="1%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">                      
		                                          </colgroup>

		                                        <thead style="">
		                                            <tr>
		                                              <!--   <th scope="col" class="center">Action</th> -->
		                                               <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Gender</th>
		                                                <th scope="col" class="center">Date Joined</th>
		                                               <!--  <th scope="col" class="center">Date Approved</th> -->
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $user_id = $_SESSION['user_id'];
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $member = "SELECT * FROM `enrolls_to` WHERE add_renew_status ='approved' AND trainor_id = '$user_id' AND status = '1' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
                                               
                                             		 <a type="button" href="assets/ajax/view_trainor_client.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-sm btn-success modal-with-zoom-anim simple-ajax-modal  btn btn-success" >View</a>

                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                 
                 
                                                  <td class="center">
                                                     <?php echo $row['member_id']; ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                                   <?php 
	                                                   $member_id = $row['member_id'];
	                                                   $query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = '$member_id' ORDER BY id DESC ";
	                                                   $result_name = mysqli_query($con, $query_name);
	                                                   $row_name = mysqli_fetch_assoc($result_name);
	                                                   echo ucwords($row_name['name']);
                                                   ?>
                                                  </td>
                                                  
                                                  <td class="center">
                                                     <?php echo $row_name['gender']; ?>
                                                  </td>
                                                  
                                               
                                                  <td class="center">
                                                  		<?php echo date("M d,Y",strtotime($row['date_created'])) ?>
                                                  </td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>

											</table>
										</div>
									</div>

								</section>	
						</div>
						<?php 
							}else{
							//End else status check
						 ?>
						 	<?php 
								if(isset($_POST['submit_email'])){

									$ver_code = $_POST['ver_code'];
									$email = $user_email;

									if(!empty($ver_code)){
										$query = "SELECT * FROM `verified_email` WHERE email = '$email' AND verification_code='$ver_code'";
									    $result = mysqli_query($con, $query);

									    if (mysqli_num_rows($result) == 1) {
									    	 $row = mysqli_fetch_assoc($result);
									    	 $ver_code_db = $row['verification_code'];

									    	if($ver_code_db == $ver_code){

										         $query = "UPDATE `verified_email` 
											     SET status = '1'
												 WHERE email = '$email' ";
												 $result = mysqli_query($con, $query);

											    ?>
													<script type="text/javascript">
														 	Swal.fire({
															    icon: 'success',
																title: "Email Confirmed!",
																text: 'Email Successfully Confirmed!'
															}).then((result) => {
																	// if (result.value) {
																 window.location.href = 'index.php';
																	// }
																					        		
															})
													</script>
												<?php

									    	}else{
									    		 ?>
													 <script type="text/javascript">
													 	Swal.fire({
														    icon: 'error',
															title: "Code does not match!",
															text: 'Incorrect verification code!'
														}).then((result) => {
																// if (result.value) {
															 //window.location.href = 'dashboard/index';
																// }
																				        		
														})
													 </script>
												<?php	
									    	}
									    	


									    }else{
									    	 ?>
													 <script type="text/javascript">
													 	Swal.fire({
														    icon: 'error',
															title: "<h5 style='color:#555!important'>Code does not match!</h5>",
															text: 'Incorrect verification code!'
														}).then((result) => {
																// if (result.value) {
															 //window.location.href = 'dashboard/index';
																// }
																				        		
														})
													 </script>
												<?php
									    }
									}
								}
								?>
									<!-- start: page -->
									<section class="body-sign">
										<div class="center-sign">
											<a href="admin_signup.php" class="logo pull-left">
												<img src="assets/images/admin-hmg-logo.png" height="54" alt="HMG Fitness Center Logo" />
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
															<a href="mailbox_action_user.php?email=<?php echo $user_email; ?>" style="color:blue!important;">Click to resend</a>
															<br>
															<br>
															<label>Enter Verification Code</label>
															<br>
															<form method="POST">
																<input type="text" class="form-control"  maxlength="10" id="ver_code" name="ver_code" style="text-align: center; font-size: 15px" placeholder="Enter Verification Code Here" required>
															
															
															<br>
															
																<button type="submit" name="submit_email" class="btn btn-primary login" style="text-align: center; font-size: 15px">Confirm</button>
															</form>
															<br>
															<!-- <hr class="separator">
															<i class="fa fa-sign-out" aria-hidden="true"></i>
															<a class="fa fa-sign-out mr-xs" href="action/client_logout_action" style="color:blue!important;"> &nbsp; Logout</a> -->
															<center>
														</div>

												</div>
											</div>
										</div>
									</section>
									<!-- end: page -->
						
						<?php } //End ?>

					<?php 
						}
					 ?>

					</div>
					<!-- end: page -->


				</section>
			</div>

			<?php include('calendar.php'); ?>


		</section>
<style type="text/css">
	.swal2-container{
		z-index: 100000;
	}
</style>
<script>
//  	window.setTimeout(function () {
//   window.location.reload();
// }, 10000);


 $(document).ready(function(){  



      $(document).on('click', '.approve', function(){  
      	
      	Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

            	var id = $(this).attr("id");  

	            $.ajax({  
	                url:'ajax.php?action=approve_member_action',
	                type:'post',
	                data:{
	                    id:id
	                },  
	            //     success:function(data, status){ 

	            //     	if (status == 'success') {
	            //     		Swal.fire({
					        //   icon: 'success',
					        //   title: 'Approved Successfully!',
					        //   showConfirmButton: false,
					        //   timer: 1500
					        // }).then((result) =>{
					        // 	 	 window.location.href = 'index.php';
					        // })
	            //     	}
	            //     }
			            success:function(data, resp){

			            console.log(data);

			            console.log(resp);

						if(resp == 'success'){

							Swal.fire({
					          icon: 'success',
					          title: 'Approved Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) =>{
					        	 	window.location.href = 'index.php';
					        })

						}else{

							Swal.fire({
					          icon: 'warning',
					          title: 'Failed to Approve!',

					        })

						}
					}

	           }); 

	   

            }
        })     
      }); 
      //End

      $(document).on('click', '.decline', function(){  
      	
      	Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

            	var id = $(this).attr("id");  

	            $.ajax({  
	                url:'ajax.php?action=delete_package_action',
	                type:'post',
	                data:{
	                    id:id
	                },
	                success:function(data, resp){

			            console.log(data);

			            console.log(resp);

						if(data == 1){

							Swal.fire({
					          icon: 'success',
					          title: 'Declined Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) =>{
					        	 	 window.location.href = 'index.php';
					        })

						}else{

							Swal.fire({
					          icon: 'warning',
					          title: 'Failed to Approve!',

					        })

						}
					}

	           }); 

	   

            }
        })     
      }); 
      //End

    $(document).on('click', '.start', function(){  
      	
      	Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

            	var id = $(this).attr("id");  

	            $.ajax({  
	                url:'ajax.php?action=session_start_action',
	                type:'post',
	                data:{
	                    id:id
	                }, success:function(data, resp){

			            console.log(data);

			            console.log(resp);

						if(data == 1){

							Swal.fire({
					          icon: 'success',
					          title: 'Session Started!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) =>{
					        	 	window.location.href = 'index.php';
					        })

						}else if(data == 2){
							Swal.fire({
					          icon: 'info',
					          title: 'This session is closed!'
					        })
						}else{

							Swal.fire({
					          icon: 'warning',
					          title: 'Failed to start!',

					        })

						}
					}

	           }); 

	   

            }
        })     
      }); 
      //End

 });  
</script>


<?php include('footer.php'); ?>