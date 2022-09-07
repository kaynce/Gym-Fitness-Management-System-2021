<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_h_status = "nav-expanded";
  $nav_active_dashboard_h_status  = "nav-active";
  $nav_active_h_members  = "nav-active";

 ?>
 
<?php include('head.php'); ?>


	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				  <?php require('sidebar.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Health Status</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Health Status</span></li>
								<li><span>List of Members</span></li>
							</ol>
					
							<?php require('assets/birthdays_count.php'); ?>
						</div>
					</header>

					<div class="row">
						
						 <!----Start if else -->
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
											<a href="health_status"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Members</h2>
									</header>


									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="5%">
		                                            <col width="1%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            
		                                                                  
		                                          </colgroup>

		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                               <!--  <th scope="col" class="center">Membership Expiry</th> -->
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Gender</th>
		                                                <th scope="col" class="center">Date Joined</th>
		                                               <!--  <th scope="col" class="center">Date Approved</th> -->
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
                                               
                                                	 <!-- <a type="button" class="btn btn-sm btn-success" href="view_health_status.php?id=<?php echo $row['id'];?>">Health Status</a> -->
                                             		
                                             		<a type="button" class="btn btn-sm btn-info" href="view_health_status?member_id=<?php echo $row['member_id'];?>"><i class="fa fa-folder-open"></i>&nbsp;Health Status</a>

                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                 
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
                                                    <?php echo date("M d, Y", strtotime($row['date_created'])) ?>
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
											<a href="health_status"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Members</h2>
									</header>


									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="5%">
		                                            <col width="1%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            
		                                                                  
		                                          </colgroup>

		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                               <!--  <th scope="col" class="center">Membership Expiry</th> -->
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Gender</th>
		                                                <th scope="col" class="center">Date Joined</th>
		                                               <!--  <th scope="col" class="center">Date Approved</th> -->
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
                                               
                                                	 <a type="button" class="btn btn-sm btn-info" href="view_health_status.php?member_id=<?php echo $row['member_id'];?>"><i class="fa fa-folder-open"></i>&nbsp;Health Status</a>
                                             	
                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                 
                                                  <td class="center">
                                                     <?php echo $row['member_id'] ?>
                                                     
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
                                                     <?php echo $row_name['gender'] ?>
                                                  </td>
                                                  
                                               
                                                  <td class="center">
                                                    <?php echo date("M d, Y", strtotime($row_name['date_created'])) ?>
                                                  </td>
                                            </tr>
                                            <?php 
                                            	}
                                            }
                                            //End if
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

<!-- <script>

 $(document).ready(function(){  

    $(document).on('click', '.approve', function(){  
      	
      	Swal.fire({
           title: 'Do you want to approve?',
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
             //End of Swal if
        })  
        //End Swal 
          
      }); 
    //End function
 });  
 //End


   
</script> -->


<?php include('footer.php'); ?>