<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

      $nav_dashboard_expanded = "nav-expanded";
      $nav_active_dashboard = "nav-active";
	  $nav_active_members_decline = "nav-active";

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
						<h2>Membership Declined</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Membership Declined</span></li>
							<!-- 	<li><span>Add Trainor</span></li> -->
							</ol>
							
							<?php require('assets/birthdays_count.php'); ?>
						</div>
					</header>



					
				<div class="row">
					<?php 
						$user_id = $_SESSION['user_id'];
						$type = $_SESSION['type'];

					    $status = 'approved';


						if ($type == 'admin') {
											// $row = mysqli_fetch_assoc($result);

					?>

					<div class="col-xl-12">
						<section class="panel">
							
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="members_declined"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
								</div>
						
								<h2 class="panel-title">Membership Declined</h2>
							</header>

							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<colgroup>
		                               <col width="25%">
		                            </colgroup>

									<thead class="text-uppercase text-semibold text-dark">
										<tr>
											<th class="text-center">Action</th>
											<th class="text-center">#</th>
										<!-- 	<th class="text-center">Membership Expiry</th>
											<th class="text-center">Member ID</th> -->
											<th class="hidden-phone text-center">Name</th>
											<th class="hidden-phone text-center">Gender</th>
											<th class="hidden-phone text-center">Address</th>
											<th class="hidden-phone text-center">Date of Reg.</th>
										</tr>
									</thead>
									

									<tbody>
									<?php 
                                         $i = 1;
                                         $member = "SELECT *,concat(lastname,', ',firstname) as name from pending_members WHERE status ='archived' order by concat(lastname,', ',firstname) desc ";

                                         $result = mysqli_query($con, $member);
                                                
                                         while ($row = mysqli_fetch_array($result)):
                                    ?>
										<tr>
											<td class="center">

											<!-- <input  type="button" class="btn btn-sm btn-success restore" value="Restore" id="<?php echo $row['id'];?>"> -->
											<a type="button" href="#" class="btn btn-sm btn-success restore" id="<?php echo $row['id'];?>" ><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Restore</a>

												<!-- <a type="button" class="btn btn-sm btn-info" href="view_pending_member.php?id=<?php echo $row['id'];?>">View</a>
 -->
 											<a type="button" href="assets/ajax/view_pending_member.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info modal-with-zoom-anim simple-ajax-modal  btn btn-success" ><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;View</a>

                                            </td>

											<td class="center">
												<?php echo $i++; ?>
											</td>

											<!-- <td class="center" >
												 <?php echo $row['membership_expiry'] ?>
											</td>
 -->
										<!-- 	<td class="center ">
												 <?php echo $row['member_id'] ?>
											</td> -->

											<td class="center ">
												 <?php echo $row['name'] ?>	
											</td>

											<td class="center ">
												 <?php echo $row['gender'] ?>
											</td>

											<td class="center ">
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

							                        $result_address = mysqli_query($con, $query_address);
							                        if($result_address){
							                          $row_address = mysqli_fetch_assoc($result_address);

							                          if($row_address){
							                             echo $row_address['region_name'].' '.$row['house_no'].' '.$row['street_name'].' '.$row_address['province_name'].' '.$row_address['city_name'].' '.$row['barangay'].' '.$row['postal_code'];
							                            }
							                        }
							                    ?> 
											</td>

											<td class="center ">
												<?php echo date("M d,Y",strtotime($row['date_created'])) ?>
											</td>
										</tr>
										<?php endwhile; ?>			
									</tbody>
									

								</table>
							</div>
						</section>
					   </div>	

					   <?php 
						} else {
						?>

						


					<?php 
						}
					 ?>

					</div>
					<!-- end: page -->


				</section>
			</div>

			<?php require('assets/calendar.php'); ?>


		</section>

<script type="text/javascript">
	
      $(document).on('click', '.restore', function(){  
      	
      	Swal.fire({
           title: 'Do you want to restore this client?',
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
	                url:'ajax.php?action=new_client_restore_member_action',
	                type:'post',
	                data:{
	                    id:id,
	                },
	                cache: false, 
	                success:function(data, resp){

			            console.log(data);

			            console.log(resp);

						if(resp == 'success'){

							Swal.fire({
					          icon: 'success',
					          title: 'Restored Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) =>{
					        	 	 window.location.href = 'members_declined';
					        })

						}else{

							Swal.fire({
					          icon: 'warning',
					          title: 'Failed to Restore!',

					        })

						}
					}

	           }); 

	   

            }
        })     
      }); 
        //Emd
</script>


<?php include('footer.php'); ?>