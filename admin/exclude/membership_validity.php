<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php include('head.php'); ?>


	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title text-primary">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
						  <nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

									<!----Start if else -->
									<?php 
									$user_id = $_SESSION['user_id'];
									$type = $_SESSION['type'];

									if ($type == 'admin') {
										// $row = mysqli_fetch_assoc($result);

									 ?>

									<li class="">
										<a href="index.php">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									
									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Payments</span>
										</a>
										<ul class="nav nav-children ">
											
											<li>
												<a href="payments.php">
													List of Members
												</a>
											</li>
											
										</ul>
									</li>
									
									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Members</span>
										</a>
										<ul class="nav nav-children ">
											<li>
												<a href="add_member.php">
													Add Member
												</a>
											</li>
											<li class="">
												<a href="members.php">
													List of Members
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent  nav-expanded nav-active">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Membership Validity</span>
										</a>
										<ul class="nav nav-children ">
											<!-- <li>
												<a href="add_member.php">
													New Entry
												</a>
											</li> -->
											<li class="nav-active">
												<a href="membership_validity.php">
													List of Members
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Attendance</span>
										</a>
										<ul class="nav nav-children ">
											
											<li>
												<a href="attendance.php">
													List of Attendance
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Schedule</span>
										</a>
										<ul class="nav nav-children ">
										<!-- 	<li>
												<a href="add_member.php">
													Add Member
												</a>
											</li> -->
											<li>
												<a href="schedules.php">
													List of Schedules
												</a>
											</li>
											
										</ul>
									</li>


									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Plans</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="plans.php">
													List of Plans
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Packages</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="add_package.php">
													Add Package
												</a>
											</li>

											<li>
												<a href="packages.php">
													List of Pakcages
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Trainors</span>
										</a>
										<ul class="nav nav-children">
										<!-- 	<li>
												<a href="add_trainor.php">
													Add Trainor
												</a>
											</li> -->
											<li>
												<a href="trainors.php">
													List of Trainors
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Training Classes</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="add_class.php">
													Add Class
												</a>
											</li>
											<li>
												<a href="training_classes.php">
													List of Classes
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Health Status</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="health_status.php">
													List of Members
												</a>
											</li>
											
										</ul>
									</li>

									<!-- <li class="nav-parent">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Report</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a>List of Members</a>
											</li>
											
										</ul>
									</li> -->

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Users</span>
										</a>
										<ul class="nav nav-children">
										
											<li>
												<a href="users.php">
													List of Users
												</a>
											</li>

										</ul>
									</li>

									<li class="nav-parent ">
										<a>
											<i class="fa fa-align-left" aria-hidden="true"></i>
											<span>Admin Account</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="my_profile.php">
													My Profile
												</a>
											</li>

											<li>
												<a href="admin_login.php">
													Logout
												</a>
											</li>

										</ul>
									</li>

									<li class="">
		                                <a href="settings.php">
		                                  <i class="fa fa-cog" aria-hidden="true"></i>
		                                  <span>Settings</span>
		                                </a>
		                              </li>
		                              
									<?php 
										} else {		
									 ?>

									 	<li class="nav-active">
											<a href="index.php">
												<i class="fa fa-home" aria-hidden="true"></i>
												<span>Dashboard</span>
											</a>
										</li>

										<li class="nav-parent">
											<a>
												<i class="fa fa-child" aria-hidden="true"></i>
												<span>Fitness Goals</span>
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="fitness_goals.php">
														List of Fitness Goals
													</a>
												</li>
												
											</ul>
										</li>
										
										<li class="nav-parent">
											<a>
												<i class="fa fa-align-left" aria-hidden="true"></i>
												<span>Health Status</span>
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="health_status.php">
														List of Members
													</a>
												</li>
												
											</ul>
										</li>

										<li class="nav-parent ">
											<a>
												<i class="fa fa-align-left" aria-hidden="true"></i>
												<span>Trainor Account</span>
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="my_profile.php">
														My Profile
													</a>
												</li>
												<li>
												<a href="new_password.php">
													Change Password
												</a>
												</li>
												<li>
													<a href="admin_login.php">
														Logout
													</a>
												</li>

											</ul>
										</li>



									 <?php 
									 	}
									  ?>
								<!-- 	  End if else -->
								</ul>
							</nav>
							<hr class="separator" />
				

				
						
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Membership Validity</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Membership Validity</span></li>
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

					

					<div class="row">
						
						<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="members.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Members</h2>
									</header>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="20%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                              <col width="5%">
		                                            <col width="10%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">                          
		                                          </colgroup>


		                                        <thead style="">
		                                            <tr>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Membership Expiry</th>
		                                                <th scope="col" class="center">Image</th>
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


                                                    
                                                	<a type="button" class="btn btn-sm btn-success" href="view_member.php?id=<?php echo $row['member_id'];?>">View</a>

                                                	<a type="button" class="btn btn-sm btn-info" href="edit_member.php?id=<?php echo $row['id'];?>">Edit</a>

                                                	<!--  
                                                    <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $row['id'] ?>" style="">Archive</button> -->

                                                  <!--    <a type="button" class="btn btn-sm btn-success view" id="<?php echo $row['id'];?>">View</a>

                                                	<a type="button" class="btn btn-sm btn-info edit" id="<?php echo $row['id'];?>">Edit</a>
 -->

                                                    <a type="button" class="btn btn-sm btn-danger delete" id="<?php echo $row['id'];?>">Archive</a>


                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                  <td class="">
                                                    <?php echo $row['membership_expiry'] ?>
                                                     
                                                  </td>

                                                   <td class="center">
                                                
                                                  <img src="../assets/images/users/<?php echo $row['image']; ?>"  class="img-responsive img-rounded img-thumbnail">
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
                                                   <?php echo substr($row['address'], 0, 15) ?>
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

						
					</div>
					
					<!-- end: page -->
				</section>
			</div>

			<?php include('calendar.php'); ?>


		</section>


		<!--===============  Start  View modal =============== -->
        <div class="modal fade" id="viewModal">
            <div class="modal-dialog" >
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">View | Member Details</h4>
                </div>
                 <div class="modal-body">
              
           <!--  <form method="POST"  autocomplete="off" enctype="multipart/form-data">

              <div class="row form-group">

                <div class="col-md-4">
                  <label class="control-label">Training Classes Name</label>

                </div>

                 <div class="col-md-4">
                  <label class="control-label">Description</label>
                  <textarea type="text" name="view_description" id="view_description" class="form-control"  readonly=""><?php echo isset($view_description) ? $view_description:'' ?></textarea>
                </div>

                <p class="form-control-static" readonly><?php echo isset($view_id) ? $view_id:'' ?></p>

                  <input type="text"  id="view_id" class="form-control" value="<?php echo isset($view_id) ? $view_id:'' ?>" >
             </div>
                  
                </div>
                    <div class="modal-footer">
                       
                       <button type="button"  class="btn btn-primary editClass">Edit</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      
                    </div>

              </form> -->
         <form method="POST"  autocomplete="off" enctype="multipart/form-data">
              <?php 

              	$member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' ";

                $result = mysqli_query($con, $member);
                                                
               $row = mysqli_fetch_array($result);

               ?>
         <div class="col-md-4">
			<p>Name: <b><?php echo ucwords($row['name']) ?></b></p>
			<p>Gender: <b><?php echo ucwords($row['gender'])  ?></b></p>
			<p>Email: </i> <b><?php echo $row['gender']; ?></b></p>
			<p>Contact: </i> <b><?php echo $row['contact']; ?></b></p>
			<p>Address: </i> <b><?php echo $row['address']; ?></b></p>
			<input type="text" id="view_id" >
		</div>
		<div class="col-md-8">
			<large><b>Membership Plan List</b></large>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td>Plan</td>
						<td>Package</td>
						<td>Start</td>
						<td>End</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<?php 
                     $i = 1;
                     // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, id ELSE -id END";

                     $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND type = 'trainor' ORDER BY id DESC ";

                     $result = mysqli_query($con, $member);
                                                
                     while ($row = mysqli_fetch_array($result)):
                     ?>
					<tr>
						<td><?php echo $row['plan'].' mo/s.'?></td>
						<td><?php echo $row['package']?></td>
						<td><?php echo date("M d,Y",strtotime($row['start_date'])) ?></td>
						<td><?php echo date("M d,Y",strtotime($row['end_date'])) ?></td>
						<td>

							<?php if($row['status'] == 1): ?>
							<?php if(strtotime(date('Y-m-d')) <= strtotime($row['end_date'])): ?>
							<span class="badge badge-success">Active</span>
							<?php else: ?>
							<span class="badge badge-danger">Exprired</span>
							<?php endif; ?>
							<?php else: ?>
							<span class="badge badge-secondary">Closed</span>
							<?php endif; ?>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
 </form>

              </div>
             
              </div>
            </div>
        </div>
<!--==================End View modal =======================-->


<script>

 $(document).ready(function(){  
 });  


 		//------------------Start view
 	   $(document).on('click', '.view', function(){  
           var id = $(this).attr("id");  

           $.ajax({  
                url:"member_fetch_data.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  	
                     $('#view_id').val(data.id);
                     $('#view_training_classes_name').val(data.firstname);    
                     $('#view_description').val(data.description);  
 	
                     $('#viewModal').modal('show');  
                }  
           });  
      });  
 	 //------------------End view

      $(document).on('click', '.approve', function(){  
      	
      	Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Approve'            
        }).then((result) => {
            if (result.value) {

            	var member_id = $(this).attr("id");  

	            $.ajax({  
	                url:'approve_member_action.php',
	                type:'post',
	                data:{
	                    member_id:member_id,
	                },  
	                success:function(data, status){ 

	                	if (status == 'success') {
	                		Swal.fire({
					          icon: 'success',
					          title: 'Successfully Approved!',
					          showConfirmButton: false,
					          timer: 1500
					        })
	                	}
	                }  
	           }); 

            }
        })     
      }); 




   
</script>


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