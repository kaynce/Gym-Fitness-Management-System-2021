<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_payment = "nav-expanded";
  $nav_active_dashboard_payment  = "nav-active";
  $nav_active_payment  = "nav-active";

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
						<h2>Payments</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Payments</span></li>
								<li><span>Payments</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					

					<div class="row">
						
						<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">

											
											<!-- <a href="#" class="fa fa-caret-down"></a> -->


											<a href="payments.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>




							                <!-- <div class="form-group col-md-3">
							                  <label>Product:  </label>
							                  <select class="custom-select" name="product" id="product" required>
							                    <option value="">--Select Product--</option>
							                    <option value="Milk">Milk</option>
							                    <option value="Egg">Egg</option>
							                  </select>
							                </div> -->


										</div>
							
										<h2 class="panel-title">Payments</h2>

							           

									</header>
								  	
										<div class="row col-md-3">
							                  <label>From Date</label>
							                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
							             
							                  <label>To Date</label>
							                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
							          
							                 <input style='float: right;' type="button" onclick="filter()" name="filter" id="filter" value="Filter" class="btn btn-info" />  
									     </div>
									 </div>
									</div>

									<div id="order_table">  

									<div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf" >
                                                <colgroup>
                                                    <col width="1%">
                                                    <col width="1%">
                                                    <col width="2%">
                                                    <col width="2%">
                                                    <col width="2%">
                                                    <col width="2%">
                                                    <col width="2%">   
                                                    <col width="2%">  
                                                    <col width="2%">  
                                                  </colgroup>

                                                <thead style="">
                                                    <tr>
                                                        <!-- <th scope="col"  class="center" >Actions</th> -->
                                                        <th scope="col"  class="center" >#</th>
                                                        <!-- <th scope="col" class="center">Status</th> -->
                                                        <th scope="col" class="center">Member ID</th>
                                                        <th scope="col" class="center">Name</th>
                                                        <th scope="col" class="center">Walk in</th>
                                                        <th scope="col" class="center">Package</th>
                                                        <!-- <th scope="col" class="center">Session/s</th> -->
                                                        <!-- <th scope="col" class="center">Remaining Session/s</th> -->
                                                        <th scope="col" class="center">Start</th>
                                                        <th scope="col" class="center">End</th>
                                                        <th scope="col" class="center">Date Created</th>
                                                        <th scope="col" class="center">Amount</th>
                                                    
                                                    </tr>
                                                </thead>
                                               <tbody>
                                                
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                // $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM members";
                                                $total = 0;
                                                $query = "SELECT * FROM `enrolls_to` WHERE add_renew_status = 'approved' ";
                                                    
                                                    // "SELECT end_date
                                                    // FROM `enrolls_to`
                                                    // FULL OUTER JOIN members
                                                    // ON enrolls_to.member_id = members.member_id
                                                    // WHERE status ='approved'";

                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):

                                               ?>

                                            <tr class="center">
                                                <!-- <th scope="row"><b></b></th> -->
                                               
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                

                                                <td class="center"><?php echo $i++ ?></td>
                                                
                                               

                                                  <td class="center">

                                                     <?php 
                                                        echo $row['member_id'];

                                                            $member_id = $row['member_id'];

                                                            $query_member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE member_id = '$member_id' ";

                                                            $result_member = mysqli_query($con, $query_member);
                                                            $row_member = mysqli_fetch_assoc($result_member);

                                                        
                                                     ?>

                                                  
                                                     
                                                  </td>

                                                  <td class="center">
                                                   <?php echo ucwords($row_member['name']) ?>
                                                     
                                                  </td>



                                                  

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
                                                        <?php echo $row['package'];  ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php 
                                                    	if(!empty($row['start_date'])){
                                                    		  echo date("M d,Y",strtotime($row['start_date']));
                                                    	}else{}
                                                    ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php
                                                     if(!empty($row['end_date'])){
                                                    		  echo date("M d,Y",strtotime($row['end_date']));
                                                    	}else{}
                                                     ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php echo date("M d,Y",strtotime($row['date_created']))  ?>
                                                  </td>

                                                  <td class="center">
                                                    <?php echo number_format($row['amount'], 2) ?>
                                                  </td>

                                                 
                                            </tr>
                                            <?php 
                                            	$total = $total + floatval($row['amount']);
                                             ?>
                                            

                                             <?php endwhile; ?>
                                             
                                        </tbody>
                                        <tr align= 'center'>
								               <th colspan='8' style='text-align: right;'>Total</th>
								               <td ><b><?php echo number_format($total, 2); ?></b></td>
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


 		 function filter(){
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                var product = $('#product').val();  
                
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"ajax.php?action=filter_action",
                          method:"POST",  
                          data:{
                            from_date:from_date, 
                            to_date:to_date
                          },  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                      	       $('#mytable').DataTable({ 
				                    "destroy": true, //use for reinitialize datatable
				               });
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  

                
            }

           
        //End


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