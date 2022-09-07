<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_t_classes = "nav-expanded";
  $nav_active_dashboard_t_classes  = "nav-active";
  $nav_active_p_fitness  = "nav-active";



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
						<h2>Physical Fitness</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Physical Fitness</span></li>
								<li><span>Physical Fitness Activities</span></li>
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
											<a href="physical_fitness"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">Physical Fitness Activities</h2>
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
								                      <col width="1%">
								                      <col width="1%">
								                    </colgroup>

								                    <thead class="text-uppercase text-semibold text-dark" style="">
								                      <tr>
								                          <th scope="col" class="center">Actions</th>
								                          <th scope="col"  class="center" >#</th>
								                          <th scope="col" class="center">Image</th>
								                          <th scope="col" class="center">Physical Fitness</th>
								                          <th scope="col" class="center">Description</th>
								                          <th scope="col" class="center">Owner %</th>
								                          <th scope="col" class="center">Trainor %</th>                    
								                      </tr>
								                    </thead>
								                    <tbody>
						                          <?php 
						                              $i = 1;
						                                            
						                              $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";

						                              $result = mysqli_query($con, $query);
						                                                
						                              while ($row = mysqli_fetch_array($result)):
						                          ?>

						                        <tr class="center">
						                          <td >

						                            <a type="button" href="assets/ajax/view_physical_fitness.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

						                            <a type="button" class=" btn-sm btn-primary" href="edit_physical_fitness?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp;Edit</a>

						                            <a type="button" class=" btn-sm btn-danger delete" id="<?php echo $row['physical_fitness_id'];?>"><i class="fa  fa-trash-o"></i>&nbsp;Delete</a>

						                          </td>
						   
						                          <td class="center"><?php echo $i++ ?></td>

						                          <td class="center">
						                       
						                             <?php 
								                        if(!empty($row['image'])){
								                            ?>
								                              <img  src="../assets/images/classes/<?php echo $row['image']; ?>"   class="img-responsive img-rounded img-thumbnail" >

								                            <?php }else{ ?>
								                              <img src="assets/images/physical_fitness_default.png ?>"  class="img-responsive img-rounded img-thumbnail ">
								                        <?php }
								                       ?>

						                          </td>

						                          <td class="">
						                            <?php echo $row['physical_fitness_name'] ?>
						                          </td>

						                          <td class="">
						                            <?php echo substr($row['description'], 0, 15) ?>
						                                ...
						                                                     
						                          </td>
						                          
						                           <td class="">
						                            <?php 
						                            	if(!empty($row['owner_percent'])){
						                            		echo $row['owner_percent'];
						                            		echo '%';
						                            	}
						                            	
						                            ?>
						                          </td>

						                           <td class="">
						                            <?php
						                            	 if(!empty($row['trainor_percent'])){
						                            		echo $row['trainor_percent'];
						                            		echo '%';
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
    
<script>

 $(document).ready(function(){  
 		function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
 });  


     //------------------Start delete
      $(document).on('click', '.delete', function(){  
      	
      	Swal.fire({
           title: 'Do you want to delete?',
            text: "The walk in/packages associated with this physical fitness will also be deleted",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

            	var physical_fitness_id = $(this).attr("id");  

	            $.ajax({  
	                url:'ajax.php?action=delete_physical_fitness_action',
	                type:'post',
	                data:{
	                    physical_fitness_id:physical_fitness_id
	                },  
	                success:function(data, status){ 

	                	if (status == 'success') {
	                		Swal.fire({
					          icon: 'success',
					          title: 'Deleted Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) => {
						        	 // if (result.value) {
						        	  	 window.location.href = 'physical_fitness';
						        	 // }
						        		
						        })
	                	}
	                }  
	           }); 

            }
        })     
      }); 
     //------------------End delete





   
</script>


<?php include('footer.php'); ?>