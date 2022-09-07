<?php  include('../db_connect.php'); ?>

<?php 
// $member_id = $_GET['member_user_id'];
// $query = "SELECT * FROM `members` WHERE member_id = '$member_id'";
// // $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `members` WHERE member_id ='member_id' ";

// $result = mysqli_query($con, $query);
// $row = mysqli_fetch_assoc($result);

//if there is no member id go to users
?>

<?php 
     $member_id = $_GET['member_id'];
     $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = $member_id";
     $result = mysqli_query($con, $query);

      $row = mysqli_fetch_assoc($result); 
?>

<div id="custom-content" class="modal-block modal-block-md">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Client's Info</h2>
        </header>
        <div class="panel-body">
            <form>
              <div class="row show-grid">
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Member ID: </span><?php echo $row['member_id']; ?></div>
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Name: </span><?php echo ucwords($row['name']); ?></div>
              </div>

              <div class="row show-grid">
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Age: </span><?php echo $row['age']; ?></div>
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Gender: </span><?php echo $row['gender']; ?></div>
              </div>

              <div class="row show-grid">
                 <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Date Joined: </span><?php echo date("M d,Y",strtotime($row['date_created'])) ?></div>
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Address: </span>
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
                </div>
              </div>

              <div class="row show-grid">
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Phone Number: </span><?php echo $row['contact']; ?></div>
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Email: </span><?php echo $row['email']; ?></div>
              </div>

              <div class="row show-grid">
                <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Profile Pic: </span>
                  <?php 
                    if(!empty($row['image'])){
                        ?>
                          <img src="../assets/images/users/<?php echo $row['image']; ?>"  class="rounded img-responsive client-image">

                        <?php }else{ ?>
                          <img src="../assets/images/default-avatar.jpg ?>"  class="rounded img-responsive client-image">
                    <?php }
                   ?>
                </div>
              </div>

      </form>
    <hr class="separator">
           <!--   Start table -->
    <div class="row">
            
            <div class="col-xl-12">
                <section class="panel">

                  <header class="panel-heading">
                    <div class="panel-actions">
                      <!-- <a href="#" class="fa fa-caret-down"></a> -->
                      <!-- <a href="members.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a> -->
                    </div>
            
                    <h2 class="panel-title">Membership Package/Walk In List</h2>
                   
                  </header>

                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="member_info_table">
                        <colgroup>
                            <col width="5%">
                          <!--   <col width="5%"> -->
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">                   
                        </colgroup>
                    <thead class="text-uppercase text-semibold text-dark" style="">
                      <tr>
                        <th scope="col" class="center" >#</th>
                       <!--  <th scope="col" class="center">Action</th> -->
                        <th scope="col" class="center">Status</th>
                        <th scope="col" class="center">Physical Fitness </th>
                        <th scope="col" class="center">Walk In</th>
                        <th scope="col" class="center">Trainor</th>
                        <th scope="col" class="center">Package</th>
                        <th scope="col" class="center">Session/s</th>
                        <th scope="col" class="center">Remaining Session/s</th>
                        <th scope="col" class="center">Start</th>
                        <th scope="col" class="center">End</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i = 1;
                        $member_id = $_GET['member_id'];
                        $query = "SELECT * FROM `enrolls_to` WHERE member_id ='$member_id' AND add_renew_status = 'approved' ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)):
                      ?>
                    <tr class="center">
                                         
                      <td><?php echo $i++ ?></td>

                     <!--  <td>
                       
                       <a href="#addModal" class="btn btn-primary btn-small view"  data-toggle="modal" data-id="<?php echo $row['id']; ?>">Choose Trainor</a>
                      </td> -->

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

                     <td class="center">
                      <?php echo $row['physical_fitness_name']; ?>                                 
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
                      <?php 
                        $trainor_id = $row['trainor_id'];

                        if(!empty($trainor_id)){
                          $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE user_id = '$trainor_id' AND type ='trainor' AND availability = '1' order by concat(lastname,', ',firstname) DESC ";
                          $result_trainor = mysqli_query($con, $query_trainor);
                          if(mysqli_num_rows($result_trainor)){
                            $row_trainor = mysqli_fetch_array($result_trainor);
                            echo $row_trainor['name'];
                          }
                         }else{}
                      ?>                                 
                    </td>

                    <td class="center">
                      <?php echo $row['package']; ?>                               
                    </td>

                    <td class="center">
                      <?php echo $row['session']; ?>                                 
                    </td>

                    <td class="center">
                      <?php  echo $row['remaining_session']; ?>                                 
                    </td>

                    <td class="center">
                      <?php 
                       if(!empty($row['start_date'])){
                         echo date("M d,Y",strtotime($row['start_date']));
                       }else{

                       }
                       
                      ?>
                    </td>

                    <td class="center">
                      <?php
                      if(!empty($row['end_date'])){
                        echo date("M d,Y",strtotime($row['end_date']));
                       }else{
                        
                       }
                        
                      ?>
                    </td>

                      

                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>


                      <div class="pagination-container">
                        <nav>
                          <ul class="pagiation"></ul>
                        </nav>
                      </div>
                    </div>
                  </div>

                </section>  

            </div>

            
          </div>
          <!-- End table -->

        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <!-- <button type="button" id="add"  class="btn btn-success add" >Save</button> -->

            <button class="btn btn-default modal-dismiss">Close</button>
          </div>
        </div>
      </footer>
    </section>
 
</div>
</div>

<!-- Start  Add modal -->
        <div class="modal fade  " id="addModal">
            <div class="modal-dialog">
              <div class="modal-content modal-sm">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Choose Trainor</h4>
                </div>
                 <div class="modal-body">

            <form method="POST"  autocomplete="off" enctype="multipart/form-data" id="manage-schedule">

              <div class="row form-group">
                <input type="text" name="view_trainor_id" id="view_trainor_id">
                 <div class="form-group">  
                      <label class="col-md-12 control-label">Trainor</label>
                          <div class="col-md-12">
                          <select type="text"  id="edit_change_trainor_id" name="edit_change_trainor_id" class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 

                        // $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND availability = '1' ";

                        // $result_trainor = mysqli_query($con, $query_trainor);
                        // $row_trainor = mysqli_fetch_assoc($result_trainor);
                        $query_tpf = "SELECT * FROM `trainor_physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                        $result_tpf = mysqli_query($con, $query_tpf);

                        while($row_tpf = mysqli_fetch_assoc($result_tpf)){
                      ?>  

                      <option value="<?php echo $row_tpf['user_id']; ?>" <?php echo isset($trainor_id) && $trainor_id == $row_tpf['user_id'] ? 'selected' : '' ?>>
                       <?php 
                            $user_id =  $row_tpf['user_id']; 

                            $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND user_id = '$user_id' AND availability = '1' ";

                            $result_trainor = mysqli_query($con, $query_trainor);
                            $row_trainor = mysqli_fetch_assoc($result_trainor);

                            echo $row_trainor['name'];
                        ?>
                        </option>

                    <?php } ?>
                  </select>
                       </div>
                    </div>
             </div>
                  
                </div>
                    <div class="modal-footer">
                       
                       <button type="submit" class="btn btn-success change_trainor">Save</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      
                    </div>

              </form>



              </div>
             
              </div>
            </div>
        </div>
<!-- End Add modal -->

<style type="text/css">
  .swal2-container{
    z-index: 100000000;
  }

  .client-image{
    height: 15rem!important;
  }

  span{
    font-weight: bold;
  }

   .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }

  .modal-sm {
    width: 380px!important;
    margin: auto!important;
  }

  @media(max-width: 400px){
    .modal-sm {
        position: absolute;
       top: 10px;
       right: 700px;
       bottom: 0;
       left: 0;
       z-index: 10040;
       overflow: auto;
       overflow-y: auto;
    }
  }
</style>

<script type="text/javascript">
  //$(document).ready(function() {
    $('#member_info_table').DataTable();
  //});

  //$(document).ready(function() {
      $('#trainor_client_table').DataTable();
  //});

$(document).on('click', '.change_trainor', function(){  
        
        var id = $('#edit_id').val();
        var change_trainor_id = $('#edit_change_trainor_id').val();

        if(change_trainor_id == ''){

          // Swal.fire({
          //           icon: 'error',
          //           title: 'Please choose Trainor!'
          //         })

          Swal.fire({
             title: 'Are you sure?',
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
                        change_trainor_id:change_trainor_id
                    },
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
                       window.location.href = 'edit_member.php?member_id=<?php echo $member_id ?>';
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
                        change_trainor_id:change_trainor_id
                    },
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
                         window.location.href = 'edit_member.php?member_id=<?php echo $member_id ?>';
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
  //End

</script>