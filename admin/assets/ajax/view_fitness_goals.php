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
     $query = "SELECT * FROM `members` WHERE member_id = '$member_id' ";
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
                    <div class="col-md-6"><span class="show-grid-block">Member ID: </span><?php echo substr($row['member_id'], 0, 3) ?>**</div>
                    <div class="col-md-6"><span class="show-grid-block">Name: </span><?php echo $row['firstname']; ?></div>
                  </div>

                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block">Age: </span><?php echo $row['age']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block">Gender: </span><?php echo $row['gender']; ?></div>
                  </div>

                  <div class="row show-grid">
                     <div class="col-md-6"><span class="show-grid-block">Date Joined: </span><?php echo date("M d,Y",strtotime($row['date_created'])) ?></div>
                    <div class="col-md-6"><span class="show-grid-block">Address: </span><?php echo substr($row['region'].' '.$row['house_no'].''.$row['street_name'].''.$row['province'].''.$row['city'].''.$row['barangay'].''.$row['postal_code'], 0, 20) ?></div>
                  </div>

                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block">Phone Number: </span><?php echo $row['contact']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block">Email: </span><?php echo $row['email']; ?></div>
                  </div>

                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block">Image: </span>
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
                  
                 <!--  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block"> </span></div>
                    <div class="col-md-6"><span class="show-grid-block">Qr Code: </span>
                      <img  src="qrcodes/<?php echo $row['member_id'] ?>.png" class="rounded img-responsive" alt="<?php echo $row['name'] ?>">
                    </div>
                  </div> -->

           </form>

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
                            <col width="5%">                   
                        </colgroup>
                    <thead style="">
                      <tr>
                        <th scope="col" class="center" >#</th>
                        <th scope="col" class="center">Action</th>
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

                      <td>
                       <!--  <a type="button" class="mb-xs mt-xs mr-xs btn btn-succes "  id="<?php echo $row['id']; ?>" data-toggle="modal" href="#addModal" value="<?php echo $row['id']; ?>">Choose Trainor</a> -->
                       <a href="#addModal" class="btn btn-primary btn-small view"  data-toggle="modal" data-id="<?php echo $row['id']; ?>">Choose Trainor</a>
                      </td>

                      <td class="center">
                        <?php if($row['status'] == 1){ ?>

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
                          <!-- <span class="label label-primary">Closed</span> -->
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
                <input type="hidden" name="view_trainor_id" id="view_trainor_id" >
                 <div class="form-group">  
                      <label class="col-md-12 control-label">Trainor</label>
                          <div class="col-md-12">
                               <select class="form-control" id="update_trainor_id" name="update_trainor_id" required="required" class="custom-select select2">
                                <option></option>";
                                <?php  
                                  $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE type ='trainor' AND availability = '1' ORDER BY concat(lastname,', ',firstname) DESC ";
                                  $result = mysqli_query($con, $query);
                                  while($row = mysqli_fetch_array($result)):
                                ?>
                                <option type='text' value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>";
                                <?php 
                                    endwhile;
                                ?>
                        </select> 
                       </div>
                    </div>;
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
  $(document).ready(function() {
    $('#member_info_table').DataTable();
} );

$(document).ready(function() {
    $('#trainor_client_table').DataTable();
} );

</script>