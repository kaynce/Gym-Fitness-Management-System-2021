<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

$nav_dashboard_expanded_add_renew = "nav-expanded";
$nav_active_dashboard_add_renew  = "nav-active";
$nav_active_add_renew_pendings = "nav-active";


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
						<h2>List of Add/Renew Pendings</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
				
								<li><span>Add/Renew Pendings</span></li>
							</ol>
					
							<?php require('assets/birthdays_count.php'); ?>
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
											<a href="add_renew_pendings"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Add/Renew</h2>
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
		                                            <col width="5%">
		                                            <col width="10%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                         	<col width="5%">
		                                            <col width="5%">
		                                            <col width="5%"> 
		                                            <col width="5%">
		                                            <col width="10%">
		                                            <col width="5%">
		                                  
		                                     
		                                            <col width="5%">                             
		                                          </colgroup>


		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr 	>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Screenshot ID</th>
		                                                <th scope="col" class="center">Screenshot Payment</th>
		                                                <th scope="col" class="center">Physical Fitness</th>
		                                                 <th scope="col" class="center">Trainor</th>
		                                                <th scope="col" class="center">Duration</th>
		                                               <!--  <th scope="col" class="center">Week</th>
		                                                <th scope="col" class="center">Month</th> -->
		                                                <th scope="col" class="center">Package</th>\
		                                                <th scope="col" class="center">Session/s</th>
		                                                <th scope="col" class="center">Start Date</th>
		                                                <th scope="col" class="center">End Date</th>
		                                                <th scope="col" class="center">Date Created</th>
		                                    
		                                                <th scope="col" class="center">Paid Date</th>
		                                          
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $member = "SELECT * FROM enrolls_to WHERE add_renew_status ='pending' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr class="center">
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">

                                                		<a type="button" class="btn btn-sm btn-success approve" id="<?php echo $row['id'] ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Approve</a>

                                                	
                                                		 <a type="button" href="assets/ajax/view_pending_enrolled.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-sm btn-info" ><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;View</a>


                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                  <td class="">
                                                  	<!--  -->
                                                   	  <?php 
                                                   	  		echo ucwords($row['member_id']);

                                                   	  		$member_id = $row['member_id'];

                                                   	  		$query_name = "SELECT *,concat(lastname, ', ', firstname) AS name FROM `members` WHERE status ='approved' AND member_id = '$member_id'   ";

                                                   	  		$result_name = mysqli_query($con, $query_name);
                                                   	  		$row_name = mysqli_fetch_assoc($result_name);
                                                   	  ?>

                                                     
                                                  </td>

                                                  <td class="">
                                                  	<!--  -->
                                                   	  <?php echo ucwords($row_name['name']) ?>

                                                     
                                                  </td>

                                                   <td class="center">
                                                
                                                 <?php 
	                                                 if(!empty($row['screenshot_id'])){
	                                                  ?>
	                                                     <img src="assets/images/users/screenshot_id/<?php echo $row['screenshot_id']; ?>"  class="img-responsive img-rounded img-thumbnail" style="min-height: 100%; height: 20vh; min-width: 100%;">

	                                              <?php }else{ ?>
	                                              		 <img src="../assets/images/default-avatar.jpg ?>"  class="img-responsive img-rounded img-thumbnail">
	                                              <?php } ?>
                                                  </td>
                                        

                                                   <td class="center">
                                                
	                                                 <?php 
	                                                 if(!empty($row['screenshot_payment'])){
	                                                  ?>

	                                                  <img src="assets/images/users/screenshot_payment/<?php echo $row['screenshot_payment']; ?>"    class="img-responsive img-rounded img-thumbnail" style="min-height: 100%; height: 20vh; min-width: 100%;">

	                                              <?php }else{ ?>
	                                              		 <img src="../assets/images/payment.png ?>"  class="img-responsive img-rounded img-thumbnail">
	                                              <?php } ?>
                                                  </td>


                                                   <td class="center">
                                                 
                                                    <?php 
                                                    	echo $row['physical_fitness_name'];
                                                    ?>
                                                     
                                                  </td>
                                                  
                                                  <td class="center">           
                                                      <?php 
                                                      	 if(!empty($row['trainor_id'])){
	                                                          $trainor_id = $row['trainor_id'];

	                                                          $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND user_id = '$trainor_id'   ";

	                                                          $result_trainor = mysqli_query($con, $query_trainor);
	                                                          $row_trainor = mysqli_fetch_assoc($result_trainor);
	                                                          echo $row_trainor['name'];
                                                      	}
                                                      ?> 
                                                    </td>


                                                  <td class="center">
                                                     <?php 
                                                      if(!empty($row['day'])){    
													       $duration = $row['day'].' Day/s';  
													       ?>
													       	<span class="label label-success"><?php echo $duration ?></span>
													       <?php
													   }else if(!empty($row['week'])){
													   		$duration = $row['week'].' Week/s'; 
													   		?>
													   			<span class="label label-success"><?php echo $duration ?></span>
													   	    <?php
													   }else if(!empty($row['month'])){
													   	   $duration = $row['month'].' Month/s';  
													       ?>
													       	<span class="label label-success"><?php echo $duration ?></span>
													       <?php 
													   }else{
													   	   ?>

													   	   <?php
													   }
                                                     ?>
                                                  </td>
                                                  
                                                  <td class="center">

                                                  	 <?php 
                                                   	  		$package_id = $row['package_id'];

                                                   	  		$query_tcpr = "SELECT * FROM physical_fitness_packages_rates WHERE package_id ='$package_id'  ";

                                                   	  		$result_tcpr = mysqli_query($con, $query_tcpr);
                                                   	  		$row_tcpr = mysqli_fetch_assoc($result_tcpr);
                                                   	  ?>

                                                   	  <?php if(!empty($row_tcpr['package_name'])){ ?>
	                                                    	<?php echo $row_tcpr['package_name'] ?>
	                                                    <?php }else{ ?>
	                                                    	
	                                                    <?php }?>
                                                  </td>

                                                   <td class="center">
                                                    	 <?php
                                                    	 if(!empty($row['session'])){
                                                    	 	 echo $row['session'];
                                                    	 }else{
                                                    	
                                                    	 }
                                                    	 ?>
                                                  </td>

                                                  <td class="center">
                                                    	 <?php
                                                    	 if(!empty($row['start_date'])){
                                                    	 	 echo  date("M d,Y",strtotime($row['start_date']));
                                                    	 }else{
                                                    	
                                                    	 }
                                                    	 ?>
                                                  </td>

                                                  <td class="center">
                                                    	 <?php
                                                    	 if(!empty($row['end_date'])){
                                                    	 	echo  date("M d,Y",strtotime($row['end_date']));
                                                    	 }else{
                                                    	  
                                                    	 }
                                                    	  ?>
                                                  </td>

                                                  <td class="center">
                                                    	 <?php echo  date("M d,Y",strtotime($row['date_created']))  ?>
                                                  </td>

                                                

                                                  <td class="center">
                                                    	 <?php echo  date("M d,Y",strtotime($row['date_created']))  ?>
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

			<?php require('assets/calendar.php'); ?>


		</section>


<script>

 $(document).ready(function(){  
 });  

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
	                url:'ajax.php?action=approve_add_renew_member_action',
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
					        	 	window.location.href = 'add_renew_pendings';
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
            //End of Swal if
        })     
    	//End Swal
    }); 
    //End

   
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