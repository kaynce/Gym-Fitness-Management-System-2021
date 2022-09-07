<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_f_g = "nav-expanded";
  $nav_active_dashboard_f_g  = "nav-active";
  $nav_active_f_g  = "nav-active";

 ?>
 
<?php include('head.php'); ?>
		


	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php 
					require('sidebar.php');
				 ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Fitness Goals</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Members</span></li>
								<li><span>List of Fitness Goals</span></li>
							</ol>
					
							<?php require('assets/birthdays_count.php'); ?>
						</div>
					</header>

					<div class="row">
						
						<?php 
							$user_id = $_SESSION['user_id'];
							$type = $_SESSION['type'];

							if ($type == 'admin') {
										// $row = mysqli_fetch_assoc($result);

						?>

						<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="fitness_goals"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Fitness Goals</h2>
										<br>
										<!--  <button type="button" class="btn btn-success mb-1"  data-toggle="modal" href="#addModal">Add Progress</button>	 -->
										
										<!-- <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#modalAnim">Add Progress</a> -->

									</header>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="20%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="10%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">                          
		                                          </colgroup>


		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Profile Pic</th>
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Gender</th>
		                                                <th scope="col" class="center">Address</th>
		                                                <th scope="col" class="center">Date Approved</th>
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
                                                	<a type="button" class="btn btn-sm btn-info" href="view_fitness_goals?member_id=<?php echo $row['member_id'];?>"><i class="fa fa-folder-open"></i>&nbsp;Fitness Goals</a>
                                                </td>
                                           
                                                <td class="center"><?php echo $i++ ?></td>

                                                   <td class="center">
                                                
                                                  <?php 
                                                 if(!empty($row['image'])){
                                                  ?>
                                                  <img src="../assets/images/users/<?php echo $row['image']; ?>"  class="img-responsive img-rounded img-thumbnail">

                                              <?php }else{ ?>
                                              		 <img src="../assets/images/default-avatar.jpg ?>"  class="img-responsive img-rounded img-thumbnail">
                                              <?php } ?>
                                                  </td>
                                        

                                                  <td class="center">
                                                     <?php echo $row['member_id'] ?>
                                                     
                                                  </td>

                                                 

                                                  <td class="center">
                                                   <?php echo ucwords($row['name']) ?>
                                                     
                                                  </td>
                                                  
                                                  <td class="center">
                                                     <?php echo $row['gender'] ?>
                                                  </td>
                                                  
                                                  <td class="center">
                                                   <?php echo substr($row['region'].' '.$row['house_no'].' '.$row['street_name'].' '.$row['province'].' '.$row['city'].' '.$row['barangay'].' '.$row['postal_code'], 0, 20) ?>
                                                    ...
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
						 ?>
							<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="fitness_goals"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Fitness Goals</h2>
										<br>
										<!--  <button type="button" class="btn btn-success mb-1"  data-toggle="modal" href="#addModal">Add Progress</button>	 -->
										
										<!-- <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#modalAnim">Add Progress</a> -->

									</header>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="1%">
		                                            <col width="1%">
		                                            <col width="2%">
		                                            <col width="2%">
		                                            <col width="10%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">                          
		                                          </colgroup>


		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Profile Pic</th>
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Gender</th>
		                                                <th scope="col" class="center">Address</th>
		                                                <th scope="col" class="center">Date Approved</th>
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                             
                                                $query_trainor_client = "SELECT * FROM `enrolls_to` WHERE add_renew_status = 'approved' AND trainor_id = '$user_id' AND status = '1'  ORDER BY id DESC ";

                                                $result_client_trainor = mysqli_query($con, $query_trainor_client);
                                                
                                                if(mysqli_num_rows($result_client_trainor) > 0){
                                                $row_trainor_client = mysqli_fetch_array($result_client_trainor);
                                                //user_id is session
                                                if($row_trainor_client['trainor_id'] == $user_id){
                                               ?>
	                                            <tr>
	                                                <!-- <th scope="row"><b></b></th> -->
	                                                <td class="center">


	                                                    
	                                                	<!-- <a type="button" class="btn btn-sm btn-success" href="view_fitness_goals.php?member_id=<?php echo $row['member_id'];?>">Fitness Goals</a> -->

	                                                	<!-- <a type="button" href="assets/ajax/view_trainor_client_fitness_goals.php?member_id=<?php echo $row['member_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-success" >View</a> -->
	                                                	
	                                                	<a type="button" class=" btn-sm btn-info" href="view_fitness_goals?member_id=<?php echo $row['member_id'];?>"><i class="fa fa-folder-open"></i>&nbsp;View</a>


	                                                </td>
	                                                <!-- <td>
	                                                    <div class="tm-status-circle pending">
	                                                    </div>Pending
	                                                </td> -->
	                                                <td class="center"><?php echo $i++ ?></td>
	                                                 

	                                                   <td class="center">
	                                                
	                                                <?php 
								                        if(!empty($row['image'])){
								                            ?>
								                              <img src="../assets/images/users/<?php echo $row['image']; ?>"  class="rounded img-responsive client-image">

								                            <?php }else{ ?>
								                              <img src="../assets/images/default-avatar.jpg ?>"  class="rounded img-responsive client-image">
								                        <?php }
								                       ?>
	                                                  </td>
	                                        

	                                                  <td class="center">
	                                                     <?php echo $row['member_id'] ?>
	                                                     
	                                                  </td>

	                                                 

	                                                  <td class="center">
	                                                   <?php 
		                                                   $member_id = $row['member_id'];
		                                                   $query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = '$member_id' ORDER BY id DESC ";
		                                                   $result_name = mysqli_query($con, $query_name);
		                                                   $row_all = mysqli_fetch_assoc($result_name);
		                                                   echo ucwords($row_all['name']);
	                                                   ?>
	                                                     
	                                                  </td>
	                                                  
	                                                  <td class="center">
	                                                     <?php echo $row_all['gender'] ?>
	                                                  </td>
	                                                  
	                                                  <td class="center">
	                                                   <?php echo substr($row_all['region'].' '.$row_all['house_no'].' '.$row_all['street_name'].' '.$row_all['province'].' '.$row_all['city'].' '.$row_all['barangay'].' '.$row_all['postal_code'], 0, 20) ?>
	                                                    ...
	                                                  </td>
	                                                  <td class="center">
	                                                    <?php echo date("M d,Y",strtotime($row_all['date_created'])) ?>
	                                                  </td>
	                                            </tr>
	                                           <?php 

                                           			}
                                       			}//End if 

	                                       		?>
                                             <?php endwhile; ?>
                                        </tbody>

											</table>
										</div>
									</div>

								</section>	

						</div>
					<?php 
						 }
					?>

					</div>
					
					<!-- end: page -->
				</section>
			</div>

			<?php require('assets/calendar.php'); ?>


		</section>

<!-- Modal Animation -->
		<div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Add Fitness Goals</h2>
				</header>
				<div class="panel-body">
					<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
						<div class="form-group mt-lg">
							<label class="col-sm-3 control-label">Name</label>
							<div class="col-sm-9">
								<input type="text" name="name" class="form-control" placeholder="Type your name..." required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="email" name="email" class="form-control" placeholder="Type your email..." required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">URL</label>
							<div class="col-sm-9">
								<input type="url" name="url" class="form-control" placeholder="Type an URL..." />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Comment</label>
							<div class="col-sm-9">
								<textarea rows="5" class="form-control" placeholder="Type your comment..." required></textarea>
							</div>
						</div>
					</form>
				</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button class="btn btn-primary modal-confirm" onclick="add_goals()">Confirm</button>
						<button class="btn btn-default modal-dismiss">Cancel</button>
					</div>
				</div>
			</footer>
		</section>
	</div>



<?php include('footer.php'); ?>

<style type="text/css">
	 

.modal-dialog {
 
          width: 1000px;
 
          height: 600px!important;
 
        }

.modal-content {
 
    /* 80% of window height */
 
    height: 60%;
 
 /*   background-color:#BBD6EC;*/
 
}

.modal-header {
    background-color: #337AB7;
 
    padding:16px 16px;
 
    color:#FFF;
 
    border-bottom:2px dashed #337AB7;
 
 }
}    

</style>