<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_members = "nav-expanded";
  $nav_active_dashboard_members  = "nav-active";
  $nav_active_archived_members  = "nav-active";

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
						<h2>Archived Members</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Members</span></li>
								<li><span>Archived Members</span></li>
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
											<a href="members"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">Archived Members</h2>
									</header>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
                                <col width="1%">
                                <col width="5%">
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
                                    <th scope="col" class="center">Profile Pic</th>
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

                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='archived' ORDER BY id DESC ";

                                $result = mysqli_query($con, $member);
                                
                                while ($row = mysqli_fetch_array($result)):
                               ?>

                            <tr class="center">
                                <!-- <th scope="row"><b></b></th> -->
                                <td class="center">
                                  <a type="button" id="<?php echo $row['id']; ?>" class="btn btn-sm btn-success restore"><i class="fa fa-check"></i>&nbsp;Restore</a>
                                </td>
                                <!-- <td>
                                    <div class="tm-status-circle pending">
                                    </div>Pending
                                </td> -->
                                <td class="center"><?php echo $i++ ?></td>
                                  
                                <td class="center">
                                
                                 <?php 
                                 if(!empty($row['image'])){
                                  ?>
                                  <img src="../assets/images/users/<?php echo $row['image']; ?>"  class="img-responsive img-rounded img-thumbnail">

                                 <?php }else{ ?>
                              		 <img src="../assets/images/default-avatar.jpg ?>"  class="img-responsive img-rounded img-thumbnail">
                                 <?php } ?>
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
                  url:'ajax.php?action=restore_member_action',
                  type:'post',
                  data:{
                      id:id
                  },
                  cache: false, 
                  success:function(data, resp){

                  console.log(data);

                  console.log(resp);

            if(data == 1){

              Swal.fire({
                    icon: 'success',
                    title: 'Restored Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                       window.location.href = 'archived_members';
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
    //End
</script>




<?php include('footer.php'); ?>
