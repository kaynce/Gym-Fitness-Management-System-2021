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
								<li><span>Edit Member</span></li>
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
                      <a href="edit_member?member_id=<?php echo $_GET['member_id']; ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <!-- <h2 class="panel-title">Edit Member</h2> -->

                    <h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>Back | Edit Member</h2>

                  </header>

 <?php   
    if(isset($_GET['member_id'])){
        $member_id = $_GET['member_id'];
        $query = "SELECT * FROM `members` WHERE member_id=$member_id";
        $result = mysqli_query($con, $query);
        $result_2 = mysqli_fetch_array($result);
        foreach($result_2 as $store =>$catch){
          $$store = $catch;
        }
    }
?>

                  <div class="panel-body">
                    <input type="hidden" id="edit_id" name="edit_id" value="<?php echo isset($id) ? $id: '' ?>">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">First Name</label>
                         <input type="text" id="edit_firstname" name="edit_firstname"  class="form-control" value="<?php echo isset($firstname) ? $firstname: '' ?>" maxlength="50"/>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Last Name</label>
                          <input type="text" id="edit_lastname" name="edit_lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname: '' ?>" maxlength="50"/>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Gender</label>
                            <select type="text" name="edit_gender" class="form-control dropdown " id="edit_gender" value=""  required="">
                              <option></option>
                              <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                              <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Date of Birth</label>
                          <input type="date" id="edit_date_of_birth" name="edit_date_of_birth" class="form-control"  onblur="getAge();" value="<?php echo isset($date_of_birth) ? $date_of_birth: '' ?>" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Age</label>
                          <input type="text" id="edit_age" name="edit_age" class="form-control" value="<?php echo isset($age) ? $age: '' ?>" readonly/>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Height</label>
                          <input type="number" id="edit_height" name="edit_height" class="form-control" value="<?php echo isset($height) ? $height: '' ?>" maxlength="6"/>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Weight</label>
                          <input type="number" id="edit_weight" name="edit_weight" class="form-control" value="<?php echo isset($weight) ? $weight: '' ?>" maxlength="6"/>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Region</label>
                         <select type="text" name="region"   id="region"  class="form-control"  value="" >
                          <option></option>
                           <?php 
                              $query = "SELECT * FROM region";
                              $result = $con->query($query);
                              if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                  ?>
                                  echo "<option value='<?php echo $row['region_id']; ?>' <?php echo isset($region) && $region == $row['region_id'] ? 'selected' : '' ?> ><?php echo $row['region_name']; ?></option>";
                                  <?php
                                }
                              }else{
                                echo "<option value=''>region not available</option>"; 
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Province</label>
                          <select type="text" name="province"   id="province"  class="form-control">
                                <option value=""></option>
                                <?php 
                                   if(isset($province)){

                                      $query = "SELECT * FROM `province` ";
                                      $result = mysqli_query($con, $query);
                                      while($row = mysqli_fetch_assoc($result)){
                                  
                                      ?>
                                        <option value="<?php echo $row['province_id']; ?>" <?php echo isset($province) && $province == $row['province_id'] ? 'selected' : '' ?> ><?php echo $row['province_name']; ?></option>
                                      <?php
                                    }
                                    //End While
                                   }
                                 ?>
                          </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">City/Municipality</label>
                          <select type="text" name="city"   id="city"  class="form-control"  value="" >
                                <option value=""></option>
                                <?php 
                                   if(isset($city)){
                                     $query = "SELECT * FROM `city` ";
                                      $result = mysqli_query($con, $query);
                                      while($row = mysqli_fetch_assoc($result)){

                                      ?>
                                        <option value="<?php echo $row['id'];  ?>" <?php echo isset($city) && $city == $row['id'] ? 'selected' : '' ?> ><?php echo $row['city_name']; ?></option>
                                      <?php
                                      }
                                    //End While
                                   }
                                 ?>
                                </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">House no.</label>
                         <input type="text" id="edit_house_no" name="edit_house_no" class="form-control" value="<?php echo isset($house_no) ? $house_no: '' ?>" maxlength="50"/>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Street Name</label>
                          <input type="text" id="edit_street_name" name="edit_street_name" class="form-control" value="<?php echo isset($street_name) ? $street_name: '' ?>" maxlength="50"/>
                        </div>
                      </div>
                    </div>

                  

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Barangay</label>
                          <input type="text" id="edit_barangay" name="edit_barangay" class="form-control" value="<?php echo isset($barangay) ? $barangay: '' ?>" maxlength="50"/>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Postal Code</label>
                          <input type="text" id="edit_postal_code" name="edit_postal_code" class="form-control" value="<?php echo isset($postal_code) ? $postal_code: '' ?>" maxlength="4"/>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">Phone</label>
                          <input type="text" id="edit_contact" name="edit_contact" class="form-control" value="<?php echo isset($contact) ? $contact: '' ?>" />
                        </div>
                      </div>

                    <!--   <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label text-uppercase text-semibold text-dark">New Password</label>
                          <input type="text" id="edit_new_password" name="edit_new_password" placeholder="Enter new password" class="form-control" value="" />


                        </div>
                      </div>
                    </div> -->

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label text-uppercase text-semibold text-dark">New Password</label>
                          <div class="input-group mb-md">
                            <input type="password" id="edit_new_password" name="edit_new_password" placeholder="Enter new password" class="form-control" value="" />
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><span  class="fa  fa-eye field_icon toggle-password" style="font-size:19px!important; "></span></button>
                            </span>
                          </div>
                      </div>
                    </div>

                     <footer class="panel-footer">
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <button type="button" id="edit"  class="btn btn-success edit" >Save</button>
                         <!--  <button class="btn btn-default modal-dismiss">Cancel</button> -->
                        </div>
                      </div>
                    </footer>
                  </div>

                </section>  

            </div>

            
          </div>

					<div class="row">
						
						<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="edit_members?member_id=<?php echo $_GET['member_id']; ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">Walk in | Membership List</h2>
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
                          <col width="10%">
                          <col width="5%">
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
                                  $member_id = $_GET['member_id'];
                                  $member = "SELECT * FROM enrolls_to WHERE member_id = '$member_id' AND add_renew_status = 'approved' ORDER BY id DESC ";

                                  $result = mysqli_query($con, $member);
                                  
                                  while ($row = mysqli_fetch_array($result)):
                              ?>

                              <tr class="center">
                                  <td class="center">
                                    <a type="button" href="assets/ajax/edit_change_trainor.php?physical_fitness_id=<?php echo $row['physical_fitness_id']; ?><?php echo $row['id']; ?>" class="btn btn-sm btn-primary modal-with-zoom-anim simple-ajax-modal  " >Change Trainor</a>
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

 $(document).on('click', '.toggle-password', function(){  
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#edit_new_password");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }

  });


 


  function getAge(){

    var dob = document.getElementById('edit_date_of_birth').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('edit_age').value=age;

}
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

    //-----------Start edit
  $(document).on('click', '.edit', function(){  
        
        Swal.fire({
           title: 'Do you want to update?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              // var member_id = $(this).attr("id");  
               var id =$('#edit_id').val();
               var lastname = $('#edit_lastname').val();
               var firstname = $('#edit_firstname').val();
               var age = $('#edit_age').val();
               var gender = $('#edit_gender').val();
               var date_of_birth = $('#edit_date_of_birth').val();
               var height = $('#edit_height').val();
               var weight = $('#edit_weight').val();
               var region = $('#region').val();
               var house_no = $('#edit_house_no').val();
               var street_name = $('#edit_street_name').val();
               var province = $('#province').val();
               var city = $('#city').val();
               var barangay = $('#edit_barangay').val();
               var postal_code = $('#edit_postal_code').val();
               var contact = $('#edit_contact').val();
               var new_password = $('#edit_new_password').val();

              $.ajax({  
                  url:'ajax.php?action=edit_member_action',
                  type:'post',
                  data:{
                      id:id,
                      lastname:lastname,
                      firstname:firstname,
                      age:age,
                      gender:gender,
                      date_of_birth:date_of_birth,
                      height:height,
                      weight:weight,
                      region:region,
                      house_no:house_no,
                      street_name:street_name,
                      province:province,
                      city:city,
                      barangay:barangay,
                      postal_code:postal_code,
                      contact:contact,
                      new_password:new_password
                  },  
                  cache: false, 
                  success:function(data, status){ 

                    console.log(data);
                    if (data == 1) {
                      Swal.fire({
                        icon: 'success',
                        title: 'Updated Successfully!',
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {
                         // if (result.value) {
                             window.location.href = 'edit_member?member_id=<?php echo $member_id ?>';
                         // }
                          
                      })     
                    }else{
                      Swal.fire({
                        icon: 'error',
                        title: 'Update failed',
                      })
                    }

                  }  
             }); 

            }
        })     
      }); 
 //------------End edit



     

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


  
</script>


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