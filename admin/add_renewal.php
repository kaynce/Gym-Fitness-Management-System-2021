<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

$nav_dashboard_expanded_add_renew = "nav-expanded";
$nav_active_dashboard_add_renew  = "nav-active";
$nav_active_add_renew = "nav-active";


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
				<h2>Add/Renewal</h2>
				<div class="right-wrapper pull-right">
					<ol class="breadcrumbs">
						<li><span>Add/Renewal</span></li>
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
										<a href="add_renewal"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
									</div>
									<h2 class="panel-title">Add/Renewal</h2>
								</header>

							    <div class="panel-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped mb-none" id="datatable-default">
											<colgroup>
			                                   <col width="1%">
			                                    <col width="5%">
			                                    <col width="5%">
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
			                                </colgroup>
			                                <thead class="text-uppercase text-semibold text-dark" style="">
			                                    <tr>
			                                        <th scope="col" class="center">Action</th>
			                                        <th scope="col"  class="center" >#</th>
			                                        <th scope="col" class="center">Status</th>
			                                        <th scope="col" class="center">Member ID</th>
			                                        <th scope="col" class="center">Name</th>
			                                        <th scope="col" class="center">Screenshot ID</th>
			                                        <th scope="col" class="center">Screenshot Payment</th>
			                                        <th scope="col" class="center">Physical Fitness</th>
			                                        <th scope="col" class="center">Trainor</th>
			                                        <th scope="col" class="center">Duration</th>
			                                        <th scope="col" class="center">Package</th>\
			                                        <th scope="col" class="center">Session/s</th>
			                                        <th scope="col" class="center">Remaining Session/s</th>
			                                        <th scope="col" class="center">Start Date</th>
			                                        <th scope="col" class="center">End Date</th>
			                                        <th scope="col" class="center">Date Created</th>
			                                        <th scope="col" class="center">Paid Date</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
	                                            <?php 
	                                                $i = 1;
	                             
	                                                $member = "SELECT * FROM enrolls_to WHERE add_renew_status ='approved' ORDER BY id DESC ";

	                                                $result = mysqli_query($con, $member);
	                                                
	                                                while ($row = mysqli_fetch_array($result)):
	                                            ?>

	                                            <tr class="center">
	                                                <td class="center">
	                                                	<a type="button" href="assets/ajax/view_add_renewal.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success modal-with-zoom-anim simple-ajax-modal  btn btn-info" ><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;View</a>
	                                                </td>

	                                                <td class="center"><?php echo $i++ ?></td>

	                                                <td class="center">
								                      <?php if($row['status'] == 0 || $row['status'] == 1){ ?>
						                                  <?php if(strtotime(date('Y-m-d')) <= strtotime($row['end_date'])){ ?>
						                                          <span class="label label-success">Active</span>
						                                  <?php }else if($row['end_date'] == ''){ ?>
						                                         <?php if($row['remaining_session'] != 0){ ?>
						                                                  <span class="label label-success">Active</span>
						                                        <?php }else{ ?>
						                                                  <span class="label label-primary">Closed</span>
						                                        <?php } ?>
						                                  <?php }else{ ?>
						                                            <span class="label label-danger">Exprired</span>
						                                  <?php } ?>
						                                <?php }else if($row['status'] == 2){ ?>
						                                        <span class="label label-primary">Closed</span>
						                                <?php }else{ ?>
						                                <?php } ?>
								                     </td> 

	                                                 <td>
	                                                   	<?php 
	                                                   	  	echo ucwords($row['member_id']);
	                                                   	  	$member_id = $row['member_id'];
	                                                   	    $query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = '$member_id' ORDER BY id DESC  ";
	                                                   	    $result_name = mysqli_query($con, $query_name);
	                                                   	    $row_name = mysqli_fetch_assoc($result_name);
	                                                   	  ?>
	                                                </td>

	                                                <td>
	                                                   <?php echo ucwords($row_name['name']) ?>
	                                                </td>

	                                                <td class="center">
	                                                    <?php if(!empty($row['screenshot_id'])){ ?>
		                                                     <img src="assets/images/users/screenshot_id/<?php echo $row['screenshot_id']; ?>"  class="img-responsive img-rounded img-thumbnail">
		                                                <?php }else{ ?>
		                                              		 <img src="../assets/images/default-avatar.jpg ?>"  class="img-responsive img-rounded img-thumbnail">
		                                                <?php } ?>
	                                                </td>
	                                        
	                                                <td class="center">
		                                                <?php if(!empty($row['screenshot_payment'])){ ?>
		                                                     <img src="assets/images/users/screenshot_payment/<?php echo $row['screenshot_payment']; ?>"  class="img-responsive img-rounded img-thumbnail">
		                                              <?php }else{ ?>
		                                              		 <img src="../assets/images/payment.png ?>"  class="img-responsive img-rounded img-thumbnail">
		                                              <?php } ?>
	                                                </td>

	                                                <td class="center">
	                                                    <?php echo $row['physical_fitness_name']; ?>   
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
														    }else{}
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
		                                                <?php }else{}
		                                                ?>
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
	                                                    	if(!empty($row['remaining_session'])){
	                                                    	 	 echo $row['remaining_session'];
	                                                    	}else{}
	                                                    ?>
	                                                </td>

	                                                <td class="center">
	                                                   <?php
	                                                       if(!empty($row['start_date'])){
	                                                    	 	 echo  date("M d,Y",strtotime($row['start_date']));
	                                                    	}else{}
	                                                    ?>
	                                                  </td>

	                                                  <td class="center">
	                                                    <?php
	                                                    	 if(!empty($row['end_date'])){
	                                                    	 	echo  date("M d,Y",strtotime($row['end_date']));
	                                                    	 }else{}
	                                                    ?>
	                                                  </td>

	                                                  <td class="center">
	                                                     <?php
	                                                        echo  date("M d,Y",strtotime($row['date_created']))  
	                                                     ?>
	                                                  </td>

	                                                  <td class="center">
	                                                     <?php 
	                                                         echo  date("M d,Y",strtotime($row['date_created']))  
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
            //End Swal if
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