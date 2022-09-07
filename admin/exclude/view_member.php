<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_members = "nav-expanded";
  $nav_active_dashboard_members  = "nav-active";
  $nav_active_members  = "nav-active";
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
						<h2>Members</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Members</span></li>
								<li><span>List of Members</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

				<div class="row">

					<!-- start: page -->
					<div class="row">
					
						<!-- <div class="col-md-6 col-lg-12 col-xl-6"> -->
						<div class="">
							<div class="row">
							<!-- 	<div class="col-md-12 col-lg-4 col-xl-4"> -->
								
								
							

							</div>
						</div>
					</div>

					 <?php 
			           $member_id = $_GET['member_id'];
			           $i = 1;
			           $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = $member_id ORDER BY concat(lastname,', ',firstname) desc ";
			           $result = mysqli_query($con, $query);
			           $number=1;
			           $row = mysqli_fetch_array($result);
			        ?>


					<div class="row">
						

						<!--             First card -->
				            <div class="col-md-6">
				                <section class="panel">
				                  <header class="panel-heading">
				                    <div class="panel-actions">
				                      <a href="#" class="fa fa-caret-down"></a>
				                      <!-- <a href="#" class="fa fa-times"></a> -->
				                    </div>
				              
				                    <h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2>
				                  </header>
				                  <div class="panel-body">
				                    <form class="form-horizontal form-bordered" method="get">


				                     <div class="form-group">
					                    <label class="col-md-3 control-label" for="inputReadOnly">Member ID: </label>
					                        <div class="col-md-6">
					         
					                            <p class="form-control-static"><?php echo $row['member_id']; ?></p>
					                        </div>
					                 </div> 


				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Name: </label>
				                        <div class="col-md-6">
				                          <!-- <input type="text" value="<?php echo $row['name'] ?>" id="inputReadOnly" class="form-control" readonly="readonly"> -->
				                          <p class="form-control-static"><?php echo $row['name'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Age: </label>
				                        <div class="col-md-6">
				                       
				                          <p class="form-control-static"><?php echo $row['age'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Gender: </label>
				                        <div class="col-md-6">

				                          <p class="form-control-static"><?php echo $row['gender'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Date Joined: </label>
				                        <div class="col-md-6">
				              
				                          <p class="form-control-static"><?php echo $row['date_created'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Height</label>
				                        <div class="col-md-6">
				     
				                          <p class="form-control-static"><?php echo $row['height'] ?></p>
				                        </div>
				                      </div>

				                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">Weight</label>
				                        <div class="col-md-6">

				                          <p class="form-control-static"><?php echo $row['weight'] ?></p>
				                        </div>
				                      </div>
				                </section>
				            </div>
				           <!--  First card -->

						 <!-- Second card -->
             <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <!-- <a href="#" class="fa fa-times"></a> -->
                    </div>
              
                   <!--  <h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2> -->
                  </header>
                  <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="get">


                       <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Address: </label>
                        <div class="col-md-6">
                        
                            <p class="form-control-static"><?php echo $row['address'] ?></p>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Phone Number: </label>
                        <div class="col-md-6">
                         
                            <p class="form-control-static"><?php echo $row['contact'] ?></p>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Email: </label>
                        <div class="col-md-6">
      
                            <p class="form-control-static"><?php echo $row['email'] ?></p>
                        </div>
                      </div>

                       <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Training Class: </label>
						                        <div class="col-md-6">
						                      
						                            
						                        <?php

		                                          $training_classes_id = $row['training_classes'];

		  
		                                          $query = $con->query("SELECT * FROM `training_classes`");

		                                          while($row_training_classes=mysqli_fetch_assoc($query)):

		                                        ?>

		                                        <?php if ($training_classes_id == $row_training_classes['training_class_id']): ?>

		                                        <?php 
		                                          $training_classes_name = $row_training_classes['training_classes_name'];
		                                        ?>

		                                     <p class="form-control-static"> <?php echo $row_training_classes['training_classes_name'] ?></p>

		                                <?php endif ?>

		                            <?php endwhile; ?>

						     </div>
						 </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Client Type: </label>
                        <div class="col-md-6">
      
                            <p class="form-control-static"><?php echo $row['client_type'] ?></p>
                        </div>
                      </div>

                         <!-- <?php if ($row['walk_in'] == 'YES'): ?>

						                       <div class="form-group">
						                        <label class="col-md-3 control-label" for="inputReadOnly">Walk in: </label>
						                        <div class="col-md-6" style="font-size: 20px;">
						         					
			
						                             <?php
		  												$training_classes_id = $row['training_classes'];
		  												$package_id = $row['package'];

		  												$client_type = $row['client_type'];

		                                                $query = "SELECT * FROM `training_classes_walk_in_rates`";
		                                                $result = mysqli_query($con, $query);

		                                                while($row_cpr=mysqli_fetch_assoc($result)):

		                                              ?>

		                                                  <?php if ($training_classes_id == $row_cpr['training_class_id']): 

		                                                  			//if ($package_id == $row_cpr['package_id']): 
		                                                  	?>			
		                                                  				<p class="form-control-static"> Training Class: 
		                                                        			<strong>
		                                                        			<?php echo $training_classes_name ?>
		                                                        			</strong>
		                                                        	    </p>


		                                                        		<p class="form-control-static"> Duration: 
		                                                        			<strong>
		                                                        			1 Day
		                                                        			</strong>
		                                                        	    </p>

		                                                        	

		                                                        		<?php 
		                                                        			if ($client_type == 'student'){
		                                                        		 ?>
		                                                        				<p class="form-control-static"> Amount: 
		                                                        					<strong>
		                                                        						<?php echo $row_cpr['student_amount'] ?>	
		                                                        					</strong>
		                                                        				</p>
		                                                        		<?php 
		                                                        			}else{
		                                                        		 ?>
		                                                        		 		<p class="form-control-static"> Amount: 
		                                                        		 			<strong>
		                                                        		 				<?php echo number_format($row_cpr['non_student_amount'], 2) ?>			
		                                                        		 			</strong>
		                                                        		 		</p>
		                                                        		 <?php 
		                                                        		 	}
		                                                        		  ?>

		                                                  <?php 
		                                                  					
		                                              			//endif;
		                                              		endif;
		                                              	  ?>

		                                              <?php endwhile; ?>

						                        </div>
						                      </div>
						                 <?php endif ?> -->

						                    <!--   <?php if ($row['walk_in'] == 'NO'): ?>
						                      	
						                    
							                      <div class="form-group">
							                        <label class="col-md-3 control-label" for="inputReadOnly">Package: </label>
							                        <div class="col-md-6" style="font-size: 20px;">
							         					
				
							                             <?php
			  												
			  												$package_id = $row['package'];
			  												$client_type = $row['client_type'];

			                                                $query = "SELECT * FROM `training_classes_packages_rates`";
			                                                $result = mysqli_query($con, $query);

			                                                while($row_cpr=mysqli_fetch_assoc($result)):

			                                              ?>

			                                                  <?php if ($training_classes_id == $row_cpr['training_class_id']): 

			                                                  			if ($package_id == $row_cpr['package_id']): 
			                                                  	?>	
			                                                        		<p class="form-control-static"> Package Name: 
			                                                        			<strong>
			                                                        			<?php echo $row_cpr['package_name'] ?>
			                                                        			</strong>
			                                                        			</p>

			                                                        		 <?php if(!empty($row_cpr['day'])){ ?> 		
												                        	 		Duration: 
												                        	 		<strong>
												                        	 		<?php echo $row_cpr['day']; ?> Day/s  
												                        	 		</strong>
												                        	 <?php }else if(!empty($row_cpr['week'])) {  ?>
												                        	 		Duration: 
												                        	 		<strong>
												                        	 		<?php echo $row_cpr['week']; ?> Week/s 
												                        	 		</strong>
												                        	 <?php }else if(!empty($row_cpr['month'])) {  ?>
												                        	 	    Duration: 
												                        	 	    <strong>
												                        	 	    <?php echo $row_cpr['month']; ?> Month/s
												                        	 	    </strong>
												                        	 <?php }else{ ?>
												                        	 <?php  } ?>

			                                                        		<p class="form-control-static"> Session: 
			                                                        				<strong>
			                                                        			<?php echo $row_cpr['session'] ?>
			                                                        				</strong>
			                                                        			</p>
			                                                        		<?php 
			                                                        			if ($client_type == 'student'){
			                                                        		 ?>
			                                                        				<p class="form-control-static"> Amount: 
			                                                        					<strong>
			                                                        						<?php echo $row_cpr['package_student_amount'] ?>	
			                                                        					</strong>
			                                                        				</p>
			                                                        		<?php 
			                                                        			}else{
			                                                        		 ?>
			                                                        		 		<p class="form-control-static"> Amount: 
			                                                        		 			<strong>
			                                                        		 				<?php echo $row_cpr['package_non_student_amount'] ?>			
			                                                        		 			</strong>
			                                                        		 		</p>
			                                                        		 <?php 
			                                                        		 	}
			                                                        		  ?>

			                                                  <?php 
			                                                  					
			                                              			endif;
			                                              		endif;
			                                              	  ?>

			                                              <?php endwhile; ?>

							                        </div>
							                      </div>

						                      <?php endif ?> -->

                     
                      <div class="form-group">
                                          <label class="col-md-3 control-label" for="inputReadOnly">Client's Trainor: </label>
                                          <div class="col-md-6">
                                              <?php

                                                $trainor_id = $row['trainor'];

  
                                                $query = $con->query("SELECT *,concat(lastname,', ',firstname) as name from users WHERE status ='approved' AND type = 'trainor' ");

                                                while($row_user= mysqli_fetch_assoc($query)):

                                              ?>

                                                  <?php if ($trainor_id == $row_user['user_id']): ?>

                                                        <p class="form-control-static"> <?php echo $row_user['name'] ?></p>

                                                  <?php endif ?>

                                              <?php endwhile; ?>

                                    
                                          </div>
                                      </div>

                                      <div class="form-group">
				                        <label class="col-md-3 control-label" for="inputReadOnly">QR Code: </label>
				                        <div class="col-md-6">
				      						
				      						<img  src="qrcodes/<?php echo $row['member_id'] ?>.png" class="rounded img-responsive" alt="<?php echo $row['name'] ?>">


				                        </div>
				                      </div>

                                      	


                    </form>
                  </div>
                </section>
            </div>
            <!-- End second card -->           
		</div>
					

	<!-- 	Start table -->
		<div class="row">
						
						<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<!-- <a href="members.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a> -->
										</div>
						
										<h2 class="panel-title">Membership Package/Walk In List</h2>
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
		                                      <!--       <col width="10%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">    -->                       
		                                          </colgroup>

		                                        <thead style="">
		                                            <tr>
		                                                <!-- <th scope="col" class="center">Action</th> -->
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Walk In</th>
		                                                <th scope="col" class="center">Package</th>
		                                                <th scope="col" class="center">Start</th>
		                                                <th scope="col" class="center">End</th>
		                                                <th scope="col" class="center">Status</th>
		                                               <!--  <th scope="col" class="center">Address</th>
		                                                <th scope="col" class="center">Date Approved</th> -->
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $i = 1;
                                                $member_id = $_GET['member_id'];

                                                $member = "SELECT * fROM enrolls_to WHERE member_id ='$member_id' AND add_renew_status = 'approved' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                         
                                                <td class="center"><?php echo $i++ ?></td>

                                                 <td class="center">

                                                    <?php
                                                    if(!empty($row['day'])){
                                                    	?>	
                                                    		<span class="label label-success">Walk in</span>
                                                    	<?php
                                                    	 
                                                    }
                                                    ?>
                                                     
                                                  </td>

                                                  <td class="center">
                                                    <?php echo $row['package']; ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                                     <?php echo date("M d,Y",strtotime($row['start_date'])) ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                             
                                                    <?php echo date("M d,Y",strtotime($row['end_date'])) ?>
                                                     
                                                  </td>
                                                  

                                                  <td class="center">

                                                    <?php if($row['status'] == 1): ?>

														<?php if(strtotime(date('Y-m-d')) <= strtotime($row['end_date'])): ?>
														<span class="label label-success">Active</span>

														<?php else: ?>
															<span class="label label-danger">Exprired</span>

														<?php endif; ?>

														<?php else: ?>
														<!-- <span class="label label-primary">Closed</span> -->
														<span class="label label-danger">Exprired</span>
													<?php endif; ?>

                                                  </td>
                                                  
                                                 
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>

											</table>
										</div>
									</div>

								</section>	

						</div>

						
					</div>
					<!-- End table -->



					<!-- end: page -->
				</section>

			</div>
		
		<?php include('calendar.php'); ?>


		</section>



<?php include('footer.php'); ?>