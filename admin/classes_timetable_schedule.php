<?php if (session_status() === PHP_SESSION_NONE){ session_start();  }

  $nav_dashboard_expanded_cts = "nav-expanded";
  $nav_active_dashboard_cts  = "nav-active";
  // $nav_active_comments  = "nav-active";

 ?>
 
<?php include('head.php'); ?>


	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				 <?php require('sidebar.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Classes Timetable Schedule</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<!-- <li><span>Health Status</span></li> -->
								<li><span>Classes Timetable Schedule</span></li>
							</ol>
					
								<?php require('assets/birthdays_count.php'); ?>
						</div>
					</header>

					<div class="row">

						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="comments"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                      <?php 

                       ?>
										</div>
						
										<h2 class="panel-title">Classes Timetable Schedule</h2>
										<br>
                    <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Schedule</a>
                    <?php 
                        $query_ctb = "SELECT * FROM `settings` WHERE setting_id = '123'";
                        $result_ctb = mysqli_query($con, $query_ctb);
                        $row_ctb = mysqli_fetch_assoc($result_ctb);

                        if ($row_ctb['status'] == 1) {
                        ?>
                          <a class="mb-xs mt-xs mr-xs  btn btn-success switch" >Classes Timetable: ON</a>
                        <?php 
                        }else{
                         ?>
                          <a class="mb-xs mt-xs mr-xs  btn btn-danger switch" >Classes Timetable: OFF</a>
                        <?php 
                  
                      }
                    ?>
                     <input type="hidden" id="setting_id" name="setting_id" value="<?php echo $row_ctb['setting_id'] ?>">

                   
									</header>


									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
                            <col width="15%">
                            <col width="1%">
                            <col width="15%">
                            <col width="1%">
                            <col width="1%">
                            <col width="1%">
                            <col width="1%">
                            <col width="1%">
                    		<col width="1%">
                    		
                            <col width="1%">
                          </colgroup>

                        <thead class="text-uppercase text-semibold text-dark" style="">
                            <tr>
                                <th scope="col" class="center">Action</th>
                                <th scope="col"  class="center" >#</th>
                                <th scope="col" class="center">Time</th>
                           			<th scope="col" class="center">Monday</th>
                           			<th scope="col" class="center">Tuesday</th>
                           			<th scope="col" class="center">Wednesday</th>
                           			<th scope="col" class="center">Thursday</th>
                           			<th scope="col" class="center">Friday</th>
                           			<th scope="col" class="center">Saturday</th>
                           			<th scope="col" class="center">Sunday</th>
                            </tr>
                        </thead>
                       <tbody>
		
                           <?php 
                            $i = 1;
                            
                            $query = "SELECT *
                                      FROM classes_timetable_schedule
                                      ORDER BY STR_TO_DATE(time_from, '%H:%i')";

                            $result = mysqli_query($con, $query);
                            
                            while ($row = mysqli_fetch_array($result)):
                           ?>

                        <tr>
                            <!-- <th scope="row"><b></b></th> -->
                            <td class="center">
                           
                            	 <a type="button" href="assets/ajax/view_classes_timetable_schedule.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
                         		
                         		 <a type="button" href="assets/ajax/edit_classes_timetable_schedule.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-primary" ><i class=""></i>&nbsp;Edit</a>

                         		  <a type="button" href="#" class=" btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" ><i class=""></i>&nbsp;Delete</a>
                            </td>
                            <!-- <td>
                                <div class="tm-status-circle pending">
                                </div>Pending
                            </td> -->
                            <td class="center"><?php echo $i++ ?></td>
                             

                              <td class="center">
                                <span class="text-uppercase text-semibold text-dark"><?php echo date("h:i A", strtotime($row['time_from'])); ?></span>
                                <br>
                                <span>to</span>
                                <br>
                                <span class="text-uppercase text-semibold text-dark"><?php echo date("h:i A", strtotime($row['time_to'])); ?></span>
                              </td>
                              <td class="center">

                                <?php if(!empty($row['monday'])){ ?>
                                <span class="text-uppercase text-semibold text-dark">Activity:
                                </span>
                                <span class="text-uppercase" >
                                    <?php 
                                      if(!empty($row['monday'])){
                                          $physical_fitness_id = $row['monday']; 
                                          $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                          $result_pf = mysqli_query($con, $query_pf);
                                          if(mysqli_num_rows($result_pf) > 0){
                                              $row_pf = mysqli_fetch_assoc($result_pf);
                                              echo ucwords($row_pf['physical_fitness_name']);
                                          }
                                      }
                                    ?>
                                </span> 
                                <br>
                                 <?php 
                                  $trainor_id = $row['monday_trainor'];
                                  $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                  $result_trainor = mysqli_query($con, $query_trainor);
                                  if(mysqli_num_rows($result_trainor) > 0){
                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                   
                                  }else{
                                    $row_trainor = '';
                                  }
                                ?>
                                <span class="text-uppercase text-semibold text-dark">Trainor:
                                </span>
                                <span class="text-uppercase" >
                                    <?php 
                                          if(!empty($row_trainor['name'])){
                                            echo $row_trainor['name']; 
                                          }
                                    ?>
                                </span>
                              </td>
                              <?php } ?>
                              <!-- End -->

                           
                               <td class="center">

                                <?php if(!empty($row['tuesday'])){ ?>
                                  <span class="text-uppercase text-semibold text-dark">Activity:
                                  </span>
                                  <span class="text-uppercase" >
                                      <?php 
                                        if(!empty($row['tuesday'])){
                                            $physical_fitness_id = $row['tuesday']; 
                                            $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                            $result_pf = mysqli_query($con, $query_pf);
                                            if(mysqli_num_rows($result_pf) > 0){
                                                $row_pf = mysqli_fetch_assoc($result_pf);
                                                echo ucwords($row_pf['physical_fitness_name']);
                                            }
                                        }
                                      ?>
                                  </span> 
                                  <br>
                                   <?php 
                                    $trainor_id = $row['tuesday_trainor'];
                                    $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                    $result_trainor = mysqli_query($con, $query_trainor);
                                    if(mysqli_num_rows($result_trainor) > 0){
                                      $row_trainor = mysqli_fetch_assoc($result_trainor);
                                     
                                    }else{
                                      $row_trainor = '';
                                    }
                                  ?>
                                  <span class="text-uppercase text-semibold text-dark">Trainor:
                                  </span>
                                  <span class="text-uppercase" >
                                      <?php 
                                            if(!empty($row_trainor['name'])){
                                              echo $row_trainor['name']; 
                                            }
                                      ?>
                                  </span>

                                <?php } ?>
                              </td>
                          
                              <!-- End -->

                               <td class="center">

                                <?php if(!empty($row['wednesday'])){ ?>
                               <span class="text-uppercase text-semibold text-dark">Activity:
                                </span>
                                <span class="text-uppercase" >
                                    <?php 
                                      if(!empty($row['wednesday'])){
                                          $physical_fitness_id = $row['wednesday']; 
                                          $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                          $result_pf = mysqli_query($con, $query_pf);
                                          if(mysqli_num_rows($result_pf) > 0){
                                              $row_pf = mysqli_fetch_assoc($result_pf);
                                              echo ucwords($row_pf['physical_fitness_name']);
                                          }
                                      }
                                    ?>
                                </span>
                                <br>
                                 <?php 
                                  $trainor_id = $row['wednesday_trainor'];
                                  $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                  $result_trainor = mysqli_query($con, $query_trainor);
                                  if(mysqli_num_rows($result_trainor) > 0){
                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                   
                                  }else{
                                    $row_trainor = '';
                                  }
                                ?>
                                <span class="text-uppercase text-semibold text-dark">Trainor:
                                </span>
                                <span class="text-uppercase" >
                                    <?php 
                                          if(!empty($row_trainor['name'])){
                                            echo $row_trainor['name']; 
                                          }
                                    ?>
                                </span>
                              <?php } ?>
                              </td>
                              <!-- End -->

                               <td class="center">

                              <?php if(!empty($row['thursday'])){ ?>
                               <span class="text-uppercase text-semibold text-dark">Activity:
                                </span>
                                <span class="text-uppercase" >
                                    <?php 
                                      if(!empty($row['thursday'])){
                                          $physical_fitness_id = $row['thursday']; 
                                          $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                          $result_pf = mysqli_query($con, $query_pf);
                                          if(mysqli_num_rows($result_pf) > 0){
                                              $row_pf = mysqli_fetch_assoc($result_pf);
                                              echo ucwords($row_pf['physical_fitness_name']);
                                          }
                                      }
                                    ?>
                                </span>
                                <br>
                                 <?php 
                                  $trainor_id = $row['thursday_trainor'];
                                  $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                  $result_trainor = mysqli_query($con, $query_trainor);
                                  if(mysqli_num_rows($result_trainor) > 0){
                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                   
                                  }else{
                                    $row_trainor = '';
                                  }
                                ?>
                                <span class="text-uppercase text-semibold text-dark">Trainor:
                                </span>
                                <span class="text-uppercase" >
                                    <?php 
                                          if(!empty($row_trainor['name'])){
                                            echo $row_trainor['name']; 
                                          }
                                    ?>
                                </span>

                              <?php } ?>
                              </td>
                              <!-- End -->

                               <td class="center">

                                <?php if(!empty($row['friday'])){ ?>
                                 <span class="text-uppercase text-semibold text-dark">Activity:
                                  </span>
                                  <span class="text-uppercase" >
                                    <?php 
                                      if(!empty($row['friday'])){
                                          $physical_fitness_id = $row['friday']; 
                                          $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                          $result_pf = mysqli_query($con, $query_pf);
                                          if(mysqli_num_rows($result_pf) > 0){
                                              $row_pf = mysqli_fetch_assoc($result_pf);
                                              echo ucwords($row_pf['physical_fitness_name']);
                                          }
                                      }
                                    ?>
                                </span>
                                  <br>
                                   <?php 
                                    $trainor_id = $row['friday_trainor'];
                                    $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                    $result_trainor = mysqli_query($con, $query_trainor);
                                    if(mysqli_num_rows($result_trainor) > 0){
                                      $row_trainor = mysqli_fetch_assoc($result_trainor);
                                     
                                    }else{
                                      $row_trainor = '';
                                    }
                                  ?>
                                  <span class="text-uppercase text-semibold text-dark">Trainor:
                                  </span>
                                  <span class="text-uppercase" >
                                      <?php 
                                            if(!empty($row_trainor['name'])){
                                              echo $row_trainor['name']; 
                                            }
                                      ?>
                                  </span>
                               <?php } ?>
                              </td>
                              <!-- End -->

                               <td class="center">

                                <?php if(!empty($row['saturday'])){ ?>
                                 <span class="text-uppercase text-semibold text-dark">Activity:
                                  </span>
                                  <span class="text-uppercase" >
                                    <?php 
                                      if(!empty($row['saturday'])){
                                          $physical_fitness_id = $row['saturday']; 
                                          $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                          $result_pf = mysqli_query($con, $query_pf);
                                          if(mysqli_num_rows($result_pf) > 0){
                                              $row_pf = mysqli_fetch_assoc($result_pf);
                                              echo ucwords($row_pf['physical_fitness_name']);
                                          }
                                      }
                                    ?>
                                </span>
                                  <br>
                                   <?php 
                                    $trainor_id = $row['saturday_trainor'];
                                    $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                    $result_trainor = mysqli_query($con, $query_trainor);
                                    if(mysqli_num_rows($result_trainor) > 0){
                                      $row_trainor = mysqli_fetch_assoc($result_trainor);
                                     
                                    }else{
                                      $row_trainor = '';
                                    }
                                  ?>
                                  <span class="text-uppercase text-semibold text-dark">Trainor:
                                  </span>
                                  <span class="text-uppercase" >
                                      <?php 
                                            if(!empty($row_trainor['name'])){
                                              echo $row_trainor['name']; 
                                            }
                                      ?>
                                  </span>
                                <?php } ?>
                              </td>
                              <!-- End -->

                               <td class="center">
                                <?php if(!empty($row['sunday'])){ ?>
                                 <span class="text-uppercase text-semibold text-dark">Activity:
                                  </span>
                                  <span class="text-uppercase" >
                                    <?php 
                                      if(!empty($row['sunday'])){
                                          $physical_fitness_id = $row['sunday']; 
                                          $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                          $result_pf = mysqli_query($con, $query_pf);
                                          if(mysqli_num_rows($result_pf) > 0){
                                              $row_pf = mysqli_fetch_assoc($result_pf);
                                              echo ucwords($row_pf['physical_fitness_name']);
                                          }
                                      }
                                    ?>
                                </span> 
                                  <br>
                                   <?php 
                                    $trainor_id = $row['sunday_trainor'];
                                    $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                    $result_trainor = mysqli_query($con, $query_trainor);
                                    if(mysqli_num_rows($result_trainor) > 0){
                                      $row_trainor = mysqli_fetch_assoc($result_trainor);
                                     
                                    }else{
                                      $row_trainor = '';
                                    }
                                  ?>
                                  <span class="text-uppercase text-semibold text-dark">Trainor:
                                  </span>
                                  <span class="text-uppercase" >
                                      <?php 
                                            if(!empty($row_trainor['name'])){
                                              echo $row_trainor['name']; 
                                            }
                                      ?>
                                  </span>
                                <?php } ?>
                              </td>
                              <!-- End -->
                        </tr>
                         <?php endwhile; ?>
                        </tbody>

											</table>
										</div>
									</div>

								</section>	
						</div>
						
						
						
					</div>
					
					<!-- end: page -->
				</section>
			</div>

			<?php require('assets/calendar.php'); ?>


		</section>

<!-- Start Add modal -->
 <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Add Schedule</h2>
        </header>
   
        <div class="panel-body">
            <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
           
              <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Time from</label>
                <input type="time" name="time_from" id="time_from" class="form-control" required>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Time to</label>
                <input type="time" name="time_to" id="time_to" class="form-control" required>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Monday</label>
                 <select type="text" name="monday" id="monday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select>  
             </div>


             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                 <select type="text" name="monday_trainor" id="monday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>    
            </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Tuesday</label>
               <select type="text" name="tuesday" id="tuesday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="tuesday_trainor"  id="tuesday_trainor" class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Wednesday</label>
                <select type="text" name="wednesday" id="wednesday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="wednesday_trainor" id="wednesday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Thursday</label>
                <select type="text" name="thursday" id="thursday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select> 
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="thursday_trainor" id="thursday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Friday</label>
                <select type="text" name="friday" id="friday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select> 
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="friday_trainor" id="friday_trainor" class="form-control dropdown "  value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Saturday</label>
                <select type="text" name="saturday" id="saturday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="saturday_trainor" id="saturday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Sunday</label>
                <select type="text" name="sunday" id="sunday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>">
                        <?php echo $row['physical_fitness_name'];?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="sunday_trainor" id="sunday_trainor" class="form-control dropdown "  value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                      <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                     <?php } ?>
                  </select>  
             </div>
              

            </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="button" id="add"  class="btn btn-success add" >Save</button>

            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </footer>
    </section>
  </div>
<!-- End Add modal -->

<style type="text/css">

  .swal2-container {
    z-index: 100000;
  }

   .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }

</style>

<script>

 $(document).ready(function(){  

      $(document).on('click', '.add', function(){  
      	
      	let time_from = $("#time_from").val();
      	let time_to = $("#time_to").val();
      	let monday = $("#monday").val();
      	let monday_trainor = $("#monday_trainor").val();
      	let tuesday = $("#tuesday").val();
      	let tuesday_trainor = $("#tuesday_trainor").val();
      	let wednesday = $("#wednesday").val();
      	let wednesday_trainor = $("#wednesday_trainor").val();
      	let thursday = $("#thursday").val();
      	let thursday_trainor = $("#thursday_trainor").val();
      	let friday = $("#friday").val();
      	let friday_trainor = $("#friday_trainor").val();
      	let saturday = $("#saturday").val();
      	let saturday_trainor = $("#saturday_trainor").val();
      	let sunday = $("#sunday").val();
      	let sunday_trainor = $("#sunday_trainor").val();

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

	            $.ajax({  
	                url:'ajax.php?action=insert_new_classes_timetable_schedule',
	                type:'post',
	                data:{
	                    time_from:time_from,
	                    time_to:time_to,
	                    monday:monday,
	                    monday_trainor:monday_trainor,
	                    tuesday:tuesday,
	                    tuesday_trainor:tuesday_trainor,
	                    wednesday:wednesday,
	                    wednesday_trainor:wednesday_trainor,
	                    thursday:thursday,
	                    thursday_trainor:thursday_trainor,
	                    friday:friday,
	                    friday_trainor:friday_trainor,
	                    saturday:saturday,
	                    saturday_trainor:saturday_trainor,
	                    sunday:sunday,
	                    sunday_trainor:sunday_trainor
	                },
                  cache: false,   
	                success:function(data, status){ 

	                	console.log(data);
	                	console.log(status);
	                	if (data == 1) {
	                		Swal.fire({
					          icon: 'success',
					          title: 'Added Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then(result => {
					        	window.location.href = 'classes_timetable_schedule';
					        })
	                	}else{
	                		Swal.fire({
					          icon: 'error',
					          title: 'Failed to add!'
					        })
	                	}
	                }  
	           }); 

            }
        })     
      }); 
 });  


   //Delete
      $(document).on('click', '.delete', function(){  
          
        var id = $(this).attr("id");  

        Swal.fire({
           title: 'Do you want to delete?',
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
                  url:'ajax.php?action=delete_classes_timetable_schedule',
                  type:'post',
                  data:{
                      id:id,
                  },
                  cache: false, 
                  success:function(data, resp){

                  console.log(data);

                  console.log(resp);

            if(data == 1){

              Swal.fire({
                    icon: 'success',
                    title: 'Deleted Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                       window.location.href = 'classes_timetable_schedule.php';
                  })

            }else{

              Swal.fire({
                    icon: 'warning',
                    title: 'Failed to delete!',

                  })

            }
          }

             }); 

     

            }
        })     
      }); 
        //End


      $(document).on('click', '.switch', function(){  
        
        Swal.fire({
           title: 'Do you want to alter the switch?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              var setting_id = $("#setting_id").val();

              $.ajax({  
                  url:'ajax.php?action=classes_time_table_action',
                  type:'post',
                  data:{
                      setting_id:setting_id
                  },
                  cache: false, 
                  success:function(data, resp){

                  console.log(data);
                  console.log(resp);

                  if(data == 1){

                    Swal.fire({
                          icon: 'success',
                          title: 'Classes timetable has been successfully switched on!',
                          showConfirmButton: false,
                          timer: 1500
                        }).then((result) =>{
                             window.location.href = 'classes_timetable_schedule.php';
                        })

                  }else if(data == 2){

                    Swal.fire({
                          icon: 'success',
                          title: 'Classes timetable has been successfully switched off!',
                          showConfirmButton: false,
                          timer: 1500
                        }).then((result) =>{
                             window.location.href = 'classes_timetable_schedule.php';
                        })

                  }else{

                    Swal.fire({
                          icon: 'warning',
                          title: 'Something went wrong!',

                        })

                  }
          }

             }); 

     

            }
        })     
      }); 
      //End
</script>
<?php include('footer.php'); ?>