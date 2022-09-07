<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_settings = "nav-expanded";
  $nav_active_dashboard_settings_address  = "nav-active";
  $nav_active_dashboard_settings  = "nav-active";
 ?>

 <?php 
	if(isset($_GET['address'])){
		$address = $_GET['address'];
	
		 if($address == 'region'){
		 	 $nav_active_region  = "nav-active";
		 }else if($address == 'province'){ 
		 	$nav_active_province  = "nav-active";
		 }else if($address == 'city'){ 
		 	$nav_active_city  = "nav-active";
		 }else{ 
		 	$nav_active_barangay  = "nav-active";
 		 }
 	} 
 ?>

 
<?php include('head.php'); ?>


<

<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

	
	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php require('sidebar.php'); ?>
				<!-- end: sidebar -->


				

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Settings</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Settings</span></li>
							<!-- 	<li><span>Add Trainor</span></li> -->
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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

							<?php 
								if(isset($_GET['address'])){
									$address = $_GET['address'];
								
							 ?>
						
									

								 <?php if($address == 'region'){ ?>

									<section class="panel">
											<header class="panel-heading">
												<div class="panel-actions">
													<a href="#" class="fa fa-caret-down"></a>
													<!-- <a href="#" class="fa fa-times"></a> -->
												</div>
									
												<h2 class="panel-title"><a href="members"></a>Region</h2>

											</header>
											<div class="panel-body">
												<form id="" class="form-horizontal form-bordered" method="POST"  enctype="multipart/form-data">

													 <div class="form-group">
														<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Region</label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="region_name" id="region_name" placeholder="Enter Region"  maxlength="100"  value="" required >														
														</div>
													</div>
												 
													<button type="submit"  id="add_region" name="submit" class="mb-xs mt-xs mr-xs btn btn-success ">Add</button>
												</form>
											</div>
									</section>

									<div id="region_table">
										
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
											   
												<colgroup>
					                                <col width="1%">
					                                <col width="1%">
					                                <col width="5%">
					                              </colgroup>


					                            <thead class="text-uppercase text-semibold text-dark" style="">
					                                <tr>
					                                    <th scope="col"  class="center" >#</th>
					                                    <th scope="col" class="center">Region ID</th>
					                                    <th scope="col" class="center">Region</th>
					                                </tr>
					                            </thead>
					                           <tbody>
									
					                               <?php 
					                                $i = 1;
					                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

					                                $member = "SELECT * FROM region ORDER BY id DESC ";

					                                $result = mysqli_query($con, $member);
					                                
					                                while ($row = mysqli_fetch_array($result)):
					                               ?>

					                            <tr class="center">
					                              
					                                <!-- <td>
					                                    <div class="tm-status-circle pending">
					                                    </div>Pending
					                                </td> -->
					                                <td ><?php echo $i++ ?></td>
					                                  

					                                  <td class="center">
					                                     <?php echo $row['region_id'] ?>
					                                  </td>

					                                   <td class="center">
					                                     <?php echo $row['region_name'] ?>
					                                  </td>

					                                 
					                            </tr>
					                             <?php endwhile; ?>
					                        </tbody>
											</table>
										</div>
									</div>
								<?php }else if($address == 'province'){ ?>

										<section class="panel">
											<header class="panel-heading">
												<div class="panel-actions">
													<a href="#" class="fa fa-caret-down"></a>
													<!-- <a href="#" class="fa fa-times"></a> -->
												</div>
									
												<h2 class="panel-title"><a href="members"></a>Region</h2>

											</header>
											<div class="panel-body">
												<form class="form-horizontal form-bordered" method="POST"  enctype="multipart/form-data">


												       <div class="form-group">
																<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Region</label>
																<div class="col-md-6">
																	 <select type="text" name="region"   id="region"  class="form-control"  value=""  required="required">
																	<option></option>
																	 <?php 
														    			$query = "SELECT * FROM region";
														    			$result = $con->query($query);
														    			if ($result->num_rows > 0) {
														    				while ($row = $result->fetch_assoc()) {
														    					echo "<option value='{$row["region_id"]}'>{$row['region_name']}</option>";
														    				}
														    			}else{
														    				echo "<option value=''>region not available</option>"; 
														    			}
														    		?>
															    </select>
																</div>
															</div>


															<div class="form-group">
																<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">Province</label>
																<div class="col-md-6">
																	 <select type="text" name="province"   id="province"  class="form-control"  value=""  required="required">
																		<option></option>
																    </select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="address">City</label>
																<div class="col-md-6">
																	<select type="text" name="city"   id="city"  class="form-control"  value=""  required="required">
																		<option></option>
																    </select>
																</div>
															</div>
												   
		                      


														<button type="submit"  id="add" name="submit" class="mb-xs mt-xs mr-xs btn btn-success ">Update</button>

													

												</form>
											</div>
									</section>

								<?php }else if($address == 'city'){ ?>
								<?php }else{ ?>
								<?php } ?>

							<?php } ?>

						</div>

						
					</div>
					
					<!-- end: page -->
				</section>

			</div>
		
		<?php require('assets/calendar.php'); ?>


		</section>


<?php include('footer.php'); ?>

<script>

	$(document).on('click', '#add_region', function(e){
		e.preventDefault();
		var region_name = $('#region_name').val();

		if(region_name != ''){
			$.ajax({
				url:'ajax.php?action=add_region_action',
				type:'post',
				data:{
					region_name:region_name
				},success:function(data, status){

					console.log(data);
					if(data = 1){
						Swal.fire({
							icon:'success',
							title:'Added Successfully!'
						})
						document.getElementById('region_name').value = '';

						filter_region_table();
					}else{
						Swal.fire({
							icon:'error',
							title:'Failed to add!'
						})
					}
				}
			})
			//End
		}else{
			Swal.fire({
				icon:'info',
				title:'Region is required!'
			})
		}
		//End Else
	})

	  function filter_region_table(){
       
          $.ajax({  
              url:"ajax.php?action=region_table_action",
              success:function(data){  
                $('#region_table').html(data);  
              }  
          });  
  
    }
//End


</script>