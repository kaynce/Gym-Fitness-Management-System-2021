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

        
		
		 #Total profits
        // count the total profits in the database
        $select_list = "SELECT sum(amount) AS total
					    FROM `enrolls_to` WHERE add_renew_status = 'approved' ";
 
        $result_list = mysqli_query($con, $select_list);
         
        $total_profits = mysqli_fetch_assoc($result_list);

        //Today's Profit
        $select_list = "SELECT sum(amount) AS total
					    FROM `enrolls_to` WHERE add_renew_status = 'approved' AND date_created = '$date_today' ";
        $result_list = mysqli_query($con, $select_list);
         
        $today_profits = mysqli_fetch_assoc($result_list);

     ?>

 <!-- Trainor -->
 <?php 
       #Total clients
        // count the total clients in the database
        $user_id = $_SESSION['user_id'];
        $select_list = "SELECT DISTINCT member_id FROM `enrolls_to` WHERE add_renew_status = 'approved' AND trainor_id = '$user_id' AND status = '1' ";
 
        $result_list = mysqli_query($con, $select_list);

        $total_clients = mysqli_num_rows($result_list);

        #Total of workouts completed
        // count the Total of workouts completed in the database
        $user_id = $_SESSION['user_id'];
        // $select_list = "SELECT * FROM completed_workouts WHERE trainor_id = '$user_id' AND remaining_session = '0' AND add_renew_status = 'approved' ";
        $select_list = "SELECT * FROM `completed_workouts` WHERE trainor_id = '$user_id'  ";
                                                
        $result_list = mysqli_query($con, $select_list);

        $total_sessions_completed = mysqli_num_rows($result_list);

        // count the total total journey days
        $select_list = "SELECT DISTINCT log_date FROM `attendance` WHERE member_user_id = '$user_id' ";
 
        $result_list = mysqli_query($con, $select_list);

        $total_days = mysqli_num_rows($result_list);


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
							
							<?php require('assets/birthdays_count.php'); ?>

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
							
					

							if ($type == 'admin'  || $type == 'sub_admin') {
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

								<div class="col-md-12 col-lg-4">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-fire"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Stay Fit on the Road</h4>
														<div class="info">
															<strong class="amount">Day: <?php echo $total_days ?></strong>
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
							
								<?php if($type == 'admin'){ ?>

									<div class="col-md-12 col-lg-4 ">
										<section class="panel panel-featured-left panel-featured-secondary">
											<div class="panel-body">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-secondary">
															<i class="fa fa-money"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Today's Profits</h4>
															<div class="info">
																<strong class="amount">
																		
																	<?php
																		if(!empty($today_profits['total'])){
																			echo number_format($today_profits['total'], 2); 
																		}else{
																			echo '0';
																		}
																	?>
																		
																</strong>
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
										<section class="panel panel-featured-left panel-featured-secondary">
											<div class="panel-body">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-secondary">
															<i class="fa fa-money"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Total Profits</h4>
															<div class="info">
																<strong class="amount">
																	<?php
																		if(!empty($total_profits['total'])){
																			echo number_format($total_profits['total'], 2); 
																		}else{
																			echo '0';
																		}
																		
																	?>
																		
																</strong>
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

								<?php } ?>

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
															<i class="fa fa-users"></i>
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

									<div class="col-md-12 col-lg-4 ">
										<section class="panel panel-featured-left panel-featured-secondary">
											<div class="panel-body">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-secondary">
															<i class="fa fa-fire"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Total of Session/s Completed</h4>
															<div class="info">
																<strong class="amount"><?php echo $total_sessions_completed ?></strong>
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
										<section class="panel panel-featured-left panel-featured-secondary">
											<div class="panel-body">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-secondary">
															<i class="fa fa-fire"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Stay Fit on the Road</h4>
															<div class="info">
																<strong class="amount">Day: <?php echo $total_days ?></strong>
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
											<a href="index"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
								
										<h2 class="panel-title">Pending Members</h2>
									</header>

									<div class="panel-body">
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<colgroup>
				                               <col width="25%">
				                            </colgroup>

											<thead class="text-uppercase text-semibold text-dark">
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

													
														<!-- <input  type="button" class="btn btn-sm btn-success approve" value="Approve" id="<?php echo $row['id'];?>"> -->

														<a type="button" href="#" class="btn btn-sm btn-success approve" id="<?php echo $row['id'];?>" ><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Approve</a>

															<!-- Modal Full -->

														  <a type="button" href="assets/ajax/view_pending_member.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn btn-sm btn-info" ><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;View</a>

		 												<!--  <input  type="button" class="btn btn-sm btn-danger decline" value="Decline" id="<?php echo $row['id'];?>"> -->
		 												
		 												 <a type="button" href="#" class="btn btn-sm btn-danger decline" id="<?php echo $row['id'];?>" ><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Decline</a>

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
														  <?php 
										                       $region_id = $row['region'];
										                       $province_id = $row['province'];
										                       $id = $row['city'];

										                       $query_address = "SELECT region.region_name, 
										                                          province.province_name,
										                                          city.city_name
										                                    FROM region
										                                    INNER JOIN province ON (province.province_id = $province_id)
										                                    INNER JOIN city ON (city.id = $id)
										                                    WHERE region.region_id = $region_id ";
										                        $result_address = mysqli_query($con, $query_address);
										                        $row_address = mysqli_fetch_assoc($result_address);

										                        $result_address = mysqli_query($con, $query_address);
										                        if($result_address){
										                          $row_address = mysqli_fetch_assoc($result_address);

										                          if($row_address){
										                             echo $row_address['region_name'].' '.$row['house_no'].' '.$row['street_name'].' '.$row_address['province_name'].' '.$row_address['city_name'].' '.$row['barangay'].' '.$row['postal_code'];
										                            }
										                        }
										                    ?>
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

					<?php }else if($type == 'sub_admin'){ ?>


							<div class="col-xl-12">
						<section class="panel">
							
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="index"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
								</div>
						
								<h2 class="panel-title">Pending Members</h2>
							</header>

							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<colgroup>
		                               <col width="25%">
		                            </colgroup>

									<thead class="text-uppercase text-semibold text-dark">
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

												<!-- <input  type="button" class="btn btn-sm btn-success approve" value="Approve" id="<?php echo $row['id'];?>"> -->

												<a type="button" href="#" class="btn btn-sm btn-success approve" id="<?php echo $row['id'];?>" ><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Approve</a>
													<!-- Modal Full -->

												  <a type="button" href="assets/ajax/view_pending_member.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
												 
												  <a type="button" href="#" class="btn btn-sm btn-danger decline" id="<?php echo $row['id'];?>" ><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Decline</a>

												 <!--  <input  type="button" class="btn btn-sm btn-danger decline" value="Decline" id="<?php echo $row['id'];?>"> -->

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
												 <?php echo substr($row['region'].' '.$row['house_no'].' '.$row['street_name'].''.$row['province'].''.$row['city'].''.$row['barangay'].''.$row['postal_code'], 0, 20) ?>
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
						// Trainor
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

		                                        <thead class="text-uppercase text-semibold text-dark" style="">
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

                                                // $member = "SELECT * FROM `enrolls_to` WHERE add_renew_status ='approved' AND trainor_id = '$user_id' AND status = '1' ORDER BY id DESC ";
                                                $query = "SELECT DISTINCT member_id FROM enrolls_to WHERE add_renew_status ='approved' AND trainor_id = '$user_id' AND status = '1' ORDER BY id DESC";


                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
                                               
                                             		 <a type="button" href="assets/ajax/view_trainor_client.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-sm btn-info modal-with-zoom-anim simple-ajax-modal  btn-sm btn-success" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

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
                                                  	<?php 
	                                                   $member_id = $row['member_id'];
	                                                   $query_date_created = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = '$member_id' ORDER BY id DESC ";
	                                                   $result_date_created = mysqli_query($con, $query_date_created);
	                                                   $row_date_created = mysqli_fetch_assoc($result_date_created);
	                                                   echo date("M d, Y", strtotime($row_date_created['date_created']));
                                                   ?>

                                                  </td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>

											</table>
										</div>
									</div>

								</section>	
						</div>

					<?php }  ?>

					</div>
					<!-- end: page -->


				</section>
			</div>

			<?php require('assets/calendar.php'); ?>


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
           title: 'Do you want to approve?',
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
	                cache: false, 
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
					        	 window.location.href = 'index';
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
           title: 'Do you want to decline?',
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
	                url:'ajax.php?action=decline_member_action',
	                type:'post',
	                data:{
	                    id:id
	                },
	                cache: false, 
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

      //Send email
      $(document).on('click', '.send_email', function(){  
      	
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
	                url:'ajax.php?action=send_verification_code',
	                type:'post',
	                data:{
	                    email:email
	                }, 
	                cache: false, 
	                success:function(data, resp){

			            console.log(data);

			            console.log(resp);

						if(resp == 'success'){

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


 });  
</script>


<?php include('footer.php'); ?>