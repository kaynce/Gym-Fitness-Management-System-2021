<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_a_t = "nav-expanded";
  $nav_active_dashboard_a_t  = "nav-active";
  $nav_active_a_t  = "nav-active";

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
						<h2>Attendance</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Attendance</span></li>
								<li><span>List of Attendance</span></li>
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
											<a href="attendance_today"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Attendance</h2>
									</header>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
		                                            <col width="5%">
		                                     <!--        <col width="5%"> -->
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                            <col width="5%">
		                                           <!--  <col width="5%">
		                                            <col width="5%">    -->                       
		                                          </colgroup>

		                                        <thead class="text-uppercase text-semibold text-dark" style="">
		                                            <tr>
		                                                <!-- <th scope="col" class="center">Action</th> -->
		                                                <th scope="col"  class="center" >#</th>
		                                            <!--     <th scope="col" class="center">Name</th> -->
		                                                <th scope="col" class="center">Member ID</th>
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Time In</th>
		                                                <th scope="col" class="center">Time Out</th>
		                                                <th scope="col" class="center">Log Date</th>
		                                                <!-- <th scope="col" class="center">Date Approved</th> -->
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                                                $date = date('Y-m-d');

                                                $member = "SELECT * FROM attendance WHERE log_date='$date' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                             
                                     
                                                <td class="center"><?php echo $i++ ?></td>
                                                 
                                                  <td class="center">
                                                     <?php
                                                     	 echo $row['member_user_id'];
                                                     ?>
                                                     
                                                     
                                                  </td>

                                                  <td class="center">
                                                     <?php 
                                                  		$member_user_id = $row['member_user_id'];
                                                  		$query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = '$member_user_id' ";
                                                  		$result_name = mysqli_query($con, $query_name);

                                                  		if(mysqli_num_rows($result_name) == 1){
                                                  			$row_name = mysqli_fetch_assoc($result_name); 
                                                  		}else{
                                                  			//If there is no data in members table go to users table
                                                  			$query_name = "SELECT *, concat(lastname, ', ', firstname) AS name  FROM `users` WHERE user_id = '$member_user_id' ";
                                                  			$result_name = mysqli_query($con, $query_name);
                                                  			$row_name = mysqli_fetch_assoc($result_name); 
                                                  		}
                                                  	 ?>

                                                    <?php echo $row_name['name']; ?>
                                                     
                                                  </td>

                                                  <td class="center">
                                                   <?php 
                                                   		echo date("h:i A", strtotime($row['time_in'])); 
                                                   	?>
                                                     
                                                  </td>
                                                  
                                                  
                                                  <td class="center">
                                                    <?php 
                                                    	date("h:i A", strtotime($row['time_out'])); 
                                                    ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php echo date("M d,Y",strtotime($row['log_date'])) ?>
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
                cache: false,   
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
	                cache: false, 
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