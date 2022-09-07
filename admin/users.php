<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_users = "nav-expanded";
  $nav_active_dashboard_users  = "nav-active";
  $nav_active_users  = "nav-active";

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
						<h2>Users</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Users</span></li>
								<li><span>List of Users</span></li>
							</ol>
					
							<?php require('assets/birthdays_count.php'); ?>
						</div>
					</header>

			

					<div class="row">
						

						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<!-- <a href="#" class="fa fa-caret-down"></a>
											<a href="members.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a> -->
										</div>
						
										<h2 class="panel-title">Users</h2>
									</header>
									<br>
							<!-- Start Tab -->
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#list_of_users" data-toggle="tab">List of Users</a>
									</li>
									<li>
										<a href="#pending_users" data-toggle="tab">Pending Users</a>
									</li>
								</ul>

								<div class="tab-content">

									<!-- Start list of users -->
									<div id="list_of_users" class="tab-pane active">
										<!-- <h4 class="mb-md">Update Status</h4> -->
									<!-- Start -->
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="14%">
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

                                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND type = 'trainor'  OR type = 'sub_admin'  ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
   
                                                	<!-- <a type="button" class="btn btn-sm btn-success" href="view_user.php?id=<?php echo $row['id'];?>">View</a> -->

                                                	<a type="button" href="assets/ajax/view_user.php?user_id=<?php echo $row['user_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                                	<!-- <a type="button" class="btn btn-sm btn-info" href="edit_user.php?id=<?php echo $row['id'];?>">Edit</a> -->

                                                	<a type="button" href="assets/ajax/edit_user.php?user_id=<?php echo $row['user_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>


                                                    <a type="button" href="#" class="btn-sm btn-danger archive" id="<?php echo $row['id'];?>"><i class="fa fa-archive"></i>&nbsp;Archive</a>

                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                
                                                  <td class="center">
                                                     <?php echo $row['user_id'] ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                                   <?php echo ucwords($row['name']) ?>
                                                     
                                                  </td>
                                                  
                                                  <td class="center">
                                                     <?php echo $row['gender'] ?>
                                                  </td>
                                                  
                                                  <td class="center">
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

						                                    // echo $row_address['region_name'].' '.$row_address['province_name'].' '.$row_address['city_name'];

						                                      echo substr($row_address['region_name'].' '.$row['house_no'].' '.$row['street_name'].' '.$row_address['province_name'].' '.$row_address['city_name'].' '.$row['barangay'].' '.$row['postal_code'], 0, 20);
						                                   ?>
						                                    ...
                                                  </td>
                                                  <td class="center">
                                                    <?php 
								                       if(!empty($row['date_created'])){
								                         echo date("M d,Y",strtotime($row['date_created']));
								                       }else{

								                       }
                      								?>
                                                  </td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>

										</table>
									</div>
								</div>
								<!-- End -->
							</div>
									<!-- End list of users -->

									<div id="pending_users" class="tab-pane">

											<!-- Start -->
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table table-bordered table-striped mb-none" id="pending_users_table">
													<colgroup>
			                                            <col width="5%">
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
			                                        
			                                                <th scope="col" class="center">Member ID</th>
			                                                <th scope="col" class="center">Name</th>
			                                                <th scope="col" class="center">Gender</th>
			                                                <th scope="col" class="center">Address</th>
			                                                <th scope="col" class="center">Date Created</th>
			                                            </tr>
			                                        </thead>
			                                       <tbody>
													
	                                               <?php 
	                                                $i = 1;
	                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

	                                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='pending' ORDER BY id DESC ";

	                                                $result = mysqli_query($con, $member);
	                                                
	                                                while ($row = mysqli_fetch_array($result)):
	                                               ?>

	                                            <tr>
	                                                <!-- <th scope="row"><b></b></th> -->
	                                                <td class="center">
	                                                    
	                                                	<!-- <input  type="button" class="btn-sm btn-success approve" value="Approve" id="<?php echo $row['id'];?>"> -->

	                                                	<a type="button" href="#" class=" btn-sm btn-success approve" id="<?php echo $row['id']; ?>" ><i class="fa fa-check"></i>&nbsp;Approve</a>

	                                                	<a type="button" href="assets/ajax/view_user.php?user_id=<?php echo $row['user_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
	                                                	<!-- <a type="button" class="btn btn-sm btn-info" href="edit_member.php?id=<?php echo $row['id'];?>">Edit</a> -->


	                                                   <a type="button" href="#" class="btn-sm btn-danger decline" id="<?php echo $row['id'];?>"><i class="fa fa-archive"></i>&nbsp;Decline</a>

	                                                </td>
	                                                <!-- <td>
	                                                    <div class="tm-status-circle pending">
	                                                    </div>Pending
	                                                </td> -->
	                                                <td class="center"><?php echo $i++ ?></td>
	                                                
	                                                  <td class="center">
	                                                     <?php echo $row['user_id'] ?>
	                                                     
	                                                  </td>
	                                                  <td class="center">
	                                                   <?php echo ucwords($row['name']) ?>
	                                                     
	                                                  </td>
	                                                  
	                                                  <td class="center">
	                                                     <?php echo $row['gender'] ?>
	                                                  </td>
	                                                  
	                                                  <td class="center">
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

							                                    // echo $row_address['region_name'].' '.$row_address['province_name'].' '.$row_address['city_name'];

							                                      echo substr($row_address['region_name'].' '.$row['house_no'].' '.$row['street_name'].' '.$row_address['province_name'].' '.$row_address['city_name'].' '.$row['barangay'].' '.$row['postal_code'], 0, 20);
							                                   ?>
							                                    ...
	                                                  </td>
	                                                  <td class="center">
	                                                    <?php 
									                       if(!empty($row['date_created'])){
									                         echo date("M d,Y",strtotime($row['date_created']));
									                       }else{}
	                      								?>
	                                                  </td>
	                                            </tr>
	                                             <?php endwhile; ?>
	                                        </tbody>

											</table>
										</div>
									</div>
									<!-- End -->

									</div>
								</div>
							</div>
							<!-- End Tab -->

						</section>	

						</div>

						
					</div>
					
					<!-- end: page -->
				</section>
			</div>

			<?php require('assets/calendar.php'); ?>

		</section>

<script type="text/javascript">
  $(document).ready(function() {
    $('#pending_users_table').DataTable();
} );
</script>

<script>


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
	                url:'ajax.php?action=approve_user_action',
	                type:'post',
	                data:{
	                    id:id
	                },  
	                success:function(data, status){ 

	                	if (status == 'success') {
	                		Swal.fire({
					          icon: 'success',
					          title: 'Approved Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) =>{
					        	 	 window.location.href = 'users';
					        })
	                	}else{
	                		Swal.fire({
					          icon: 'error',
					          title: 'Failed to approve!'
					        })
	                	}
	                }  
	           }); 

            }
        })     
      }); 

 });  


  function getAge(){

    var dob = document.getElementById('edit_date_of_birth').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('edit_age').value=age;

}



 $(document).on('click', '.archive', function(){  
        
        Swal.fire({
           title: 'Do you want to archive?',
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
                  url:'ajax.php?action=archive_trainor_action',
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
                    title: 'Archived Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                       window.location.href = 'users';
                  })

            }else{

              Swal.fire({
                    icon: 'warning',
                    title: 'Failed to archive!',

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
	                url:'ajax.php?action=user_decline_action',
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
					        	 	 window.location.href = 'users';
					        })

						}else{

							Swal.fire({
					          icon: 'warning',
					          title: 'Failed to decline!',
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
<!-- Address Code -->
		