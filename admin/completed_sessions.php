<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_active_dashboard_cw  = "nav-active";

 ?>
 
<?php include('head.php'); ?>


	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				  <?php require('sidebar.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Completed Sessions</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Completed Sessions</span></li>
							</ol>
					
							<?php require('assets/birthdays_count.php'); ?>
						</div>
					</header>

					<div class="row">
						
						 <!-- For Trainor -->
							<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="completed_workouts"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">Completed Session/s</h2>
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
		                                            
		                                                                  
		                                          </colgroup>

		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <th scope="col" class="center">Action</th>
		                                                <th scope="col"  class="center" >#</th>
		                                                 <th scope="col" class="center">Date Completed</th>
		                                               <!--  <th scope="col" class="center">Membership Expiry</th> -->
		                                                <th scope="col" class="center">Reference ID</th>
		                                                <th scope="col" class="center">Member ID</th>
		                                               
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Profit</th>
		                                               
		                                               <!--  <th scope="col" class="center">Date Approved</th> -->
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 

                                                $total = 0;
                                                $user_id = $_SESSION['user_id'];
                                                $i = 1;
                                                $query = "SELECT * FROM `completed_workouts` WHERE trainor_id = '$user_id'  ";

                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                             
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
                                               
                                                	  <a type="button" href="assets/ajax/view_completed_workouts.php?id=<?php echo $row['id'] ?>" class=" modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
                                             	
                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                 
                                                  <td class="center">
                                                    <?php 
	                                                    if(!empty($row['date_created'])){
	                                                    	echo date("M d, Y", strtotime($row['date_created']));
	                                                    }
                                                    ?>
                                                  </td>

                                                   <td class="center">
                                                     <?php echo $row['reference_id'] ?>
                                                  </td>

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
                                                     <?php
                                                     	// $amount = $row['amount'];
                                                     	// $physical_fitness_id = $row['physical_fitness_id'];

                                                     	// $query_percent = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                     	// $result_percent = mysqli_query($con, $query_percent);
                                                     	// $row_percent = mysqli_fetch_assoc($result_percent);
                                                     	// $trainor_percent = $row_percent['trainor_percent'];

                                                     	// // echo number_format($trainor_percent/100, 2);
                                                     	// //Get the percentage of trainor percent and calculate the total share
                                                      //   $equity =  number_format($trainor_percent/100, 2) * $amount; 
                                                     	// echo number_format($equity, 2); 

                                                     ?>
                                                     <?php echo number_format($row['equity'], 2); ?>
                                                  </td>	
                                            </tr>
                                             <?php $total = $total + $row['equity'] ?>
                                             <?php endwhile; ?>
                                        </tbody>

	                                        <tr>
	                                        	<td class="text-uppercase text-semibold text-dark" colspan="6" style='text-align: right;'>
	                                        		Grand Total
	                                        	</td>

	                                        	<td class="text-uppercase text-semibold text-dark center" >
	                                        		<?php echo number_format($total, 2); ?>
	                                        	</td>
	                                        </tr>

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
<!-- 
<script>

 $(document).ready(function(){  

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

 });  



   
</script>
 -->

<?php include('footer.php'); ?>