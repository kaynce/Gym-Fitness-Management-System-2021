<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

  $nav_dashboard_expanded_comments = "nav-expanded";
  $nav_active_dashboard_comments  = "nav-active";
  $nav_active_comments  = "nav-active";

 ?>
 
<?php include('head.php'); ?>
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				 <?php require('sidebar.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Comments</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<!-- <li><span>Health Status</span></li> -->
								<li><span>Comments</span></li>
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
										</div>
						
										<h2 class="panel-title">Comments</h2>
									</header>


									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
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
		                                                <th scope="col" class="center">Name</th>
		                                                <th scope="col" class="center">Email</th>
                                                    	<th scope="col" class="center">Comments</th>
                                                    	<th scope="col" class="center">Date Created</th>
		                                               <!--  <th scope="col" class="center">Date Approved</th> -->
		                                            </tr>
		                                        </thead>
		                                       <tbody>
												
                                               <?php 
                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $query = "SELECT * FROM `comments` ORDER BY id DESC ";

                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">
                                               
                                                	 <a type="button" href="assets/ajax/view_comments.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
                                             	
                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                 
                                                  <td class="center">
                                                     <?php echo $row['name'] ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                                   <?php echo ucwords($row['email']) ?>
                                                     
                                                  </td>
                                                  <td class="center">
                                                   <?php echo ucwords($row['comment']) ?>
                                                     
                                                  </td>

                                                   <td class="center">
                                                  
                                                   <?php 
                                                   		if(!empty($row['date_created'])){
															echo date("M d, Y", strtotime($row['date_created'])); 
                                                   		}
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
        })     
      }); 
 });  
</script> -->
<?php include('footer.php'); ?>