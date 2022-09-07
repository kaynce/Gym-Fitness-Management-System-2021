<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_members = "nav-expanded";
  $nav_active_dashboard_members  = "nav-active";
  $nav_active_members  = "nav-active";

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
						<h2>Active Members</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Members</span></li>
								<li><span>Active Members</span></li>
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
						
										<h2 class="panel-title">Active Members</h2>
									</header>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none" id="datatable-default">
												<colgroup>
                                <col width="20%">
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

                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' ORDER BY id DESC ";

                                $result = mysqli_query($con, $member);
                                
                                while ($row = mysqli_fetch_array($result)):
                               ?>

                            <tr class="center">
                                <!-- <th scope="row"><b></b></th> -->
                                <td class="center">
                                	<!-- <a type="button" class="btn btn-sm btn-success" href="view_member.php?member_id=<?php echo $row['member_id'];?>">View</a> -->

                                  <a type="button" href="assets/ajax/view_member.php?member_id=<?php echo $row['member_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                	<!-- <a type="button" class="btn btn-sm btn-info" href="edit_member.php?id=<?php echo $row['id'];?>">Edit</a> -->

                                   <!-- <a type="button" href="assets/ajax/edit_member.php?member_id=<?php echo $row['member_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-primary" >Edit</a> -->

                                   <a type="button" href="edit_member.php?member_id=<?php echo $row['member_id'] ?>" class="btn-sm btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</a>


                                    <a type="button" href="#" class="btn-sm btn-danger archive" id="<?php echo $row['id'];?>"><i class="fa  fa-archive"></i>&nbsp;Archive</a>


                                </td>
                                <!-- <td>
                                    <div class="tm-status-circle pending">
                                    </div>Pending
                                </td> -->
                                <td ><?php echo $i++ ?></td>
                                  
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

                                    // echo $row_address['region_name'].' '.$row_address['province_name'].' '.$row_address['city_name'];

                                      echo substr($row_address['region_name'].' '.$row['house_no'].' '.$row['street_name'].' '.$row_address['province_name'].' '.$row_address['city_name'].' '.$row['barangay'].' '.$row['postal_code'], 0, 20);
                                   ?>
                                    ...
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


<script>


    $(document).on('click', '.archive', function(){  
        
        Swal.fire({
           title: 'Do you want to archive this client?',
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
                  url:'ajax.php?action=archive_member_action',
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
                    title: 'Archived Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                       window.location.href = 'members';
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


    $(document).on('click', '.view', function(){  
    
            var id =  $(this).data("id"); 

            $.ajax({  
                url:"ajax.php?action=trainor_fetch_id_data_action",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                cache: false, 
                success:function(data){  
                     $('#view_trainor_id').val(data.id);
                     $('#addModal').modal('show');  
                }  
        
         });
    });
    //End


     $(document).on('click', '.change_trainor', function(){  
        
        var id = $('#view_trainor_id').val();
        var update_trainor_id = $('#update_trainor_id').val();

        if(update_trainor_id == ''){

          // Swal.fire({
          //           icon: 'error',
          //           title: 'Please choose Trainor!'
          //         })

          Swal.fire({
             title: 'Do yo want to remove this client\'s trainor?',
              text: "The trainor of this client will be removed",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'            
          }).then((result) => {
              if (result.value) {
                
                $.ajax({                        
                    url:'ajax.php?action=save_trainor_action',
                    type:'post',
                    data:{
                        id:id,
                        update_trainor_id:update_trainor_id
                    },
                    cache: false, 
                    success:function(data, resp){

                    console.log(data);

                    console.log(resp);

              if(data == 1){

                Swal.fire({
                      icon: 'success',
                      title: 'Saved Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) =>{
                         window.location.href = 'members';
                    })

              }else{

                Swal.fire({
                      icon: 'warning',
                      title: 'Assign Trainor Failed!',

                    })
              }
            }

               }); 
              }
          })

        }else{
          Swal.fire({
             title: 'Are you sure?',
              text: "",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'            
          }).then((result) => {
              if (result.value) {
                
                $.ajax({                        
                    url:'ajax.php?action=save_trainor_action',
                    type:'post',
                    data:{
                        id:id,
                        update_trainor_id:update_trainor_id
                    },
                    cache: false, 
                    success:function(data, resp){

                    console.log(data);

                    console.log(resp);

              if(data == 1){

                Swal.fire({
                      icon: 'success',
                      title: 'Saved Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) =>{
                         window.location.href = 'members';
                    })

              }else{

                Swal.fire({
                      icon: 'warning',
                      title: 'Assign Trainor Failed!',

                    })
              }
            }

               }); 
              }
          })

        }//End else
          //End     
      }); 

    // $(document).on('click', '.change', function(){ 

    //   Swal.fire({
    //       title: 'Select field validation',
    //       input: 'select',
    //       inputPlaceholder: 'Select a trainor',
    //       inputOptions: {
    //         'Trainors': {
    //           apples: 'Trainor 1',
    //           bananas: 'Trainor 2',
    //           grapes: 'Trainor 3',
    //           oranges: 'Trainor 4'
    //         }
    //       },
    //       showCancelButton: true,
    //       inputValidator: (value) => {
    //         return new Promise((resolve) => {
    //           if (value === 'oranges') {
    //             resolve()
    //           } else {
    //             resolve('Select a trainor :)')
    //           }
    //         })
    //       }
    //     })

    //     if (fruit) {
    //       Swal.fire(`You selected: ${fruit}`)
    //     }

    // }); 
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