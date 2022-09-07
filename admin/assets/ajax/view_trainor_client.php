<?php if(session_status() === PHP_SESSION_NONE){ session_start(); } ?>
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

    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result); 
?>

<div id="custom-content" class="modal-block modal-block-lg">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Client's Info</h2>
        </header>
        <div class="panel-body">
            <form>
                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Member ID: </span><?php echo $row['member_id'] ?></div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Name: </span><?php echo $row['firstname']; ?></div>
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

                    <thead class="text-uppercase text-semibold text-dark" style="">
                      <tr>
                        
                        <th scope="col" class="center">Action</th>
                        <th scope="col"  class="center" >#</th>
                        <th scope="col" class="center">Status</th>
                        <th scope="col" class="center">Date Created</th>
                        <th scope="col" class="center">Physical Fitness</th>
                        <th scope="col" class="center">Walk In</th>
                        <th scope="col" class="center">Package</th>
                        <th scope="col" class="center">Trainor</th>
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
                        $user_id = $_SESSION['user_id'];

                        $query = "SELECT * FROM `enrolls_to` WHERE member_id = '$member_id' AND trainor_id = '$user_id' AND add_renew_status = 'approved' ORDER BY id DESC ";

                        $result = mysqli_query($con, $query);
                                                
                        while($row = mysqli_fetch_array($result)):
                      ?>

                    <tr>
                                     
                       <td class="center">
                           <a type="button" class="btn btn-sm btn-success btn btn-success start" id="<?php echo $row['id']; ?>" >Start</a>
                       </td>

                      <td class="center"><?php echo $i++ ?></td>

                      <td class="center">
                      <?php if($row['status'] == 0 || $row['status'] == 1 ){ ?>

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
                      <?php 
                       if(!empty($row['date_created'])){
                         echo date("M d,Y",strtotime($row['date_created']));
                       }
                      ?>
                    </td>
                    
                     <td class="center"><?php echo $row['physical_fitness_name']; ?></td>

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
                      <?php echo $row['package']; ?>                               
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
                      <?php echo $row['session']; ?>                                 
                    </td>

                    <td class="center">
                      <?php  echo $row['remaining_session']; ?>                                 
                    </td>

                     


                    <td class="center">
                      <?php 
                       if(!empty($row['start_date'])){
                         echo date("M d,Y",strtotime($row['start_date']));
                       }
                       
                      ?>
                    </td>

                    <td class="center">
                      <?php
                      if(!empty($row['end_date'])){
                        echo date("M d,Y",strtotime($row['end_date']));
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
<?php 
    }else{
       //If there is no data in members table go to users table
      $query = "SELECT * FROM `users` WHERE user_id = '$member_user_id' ";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result); 
 ?>

<div id="custom-content" class="modal-block modal-block-lg">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Trainor's Info</h2>
        </header>
        <div class="panel-body">
            <form>

               

                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block">User ID: </span><?php echo substr($row['user_id'], 0, 3) ?>**</div>
                    <div class="col-md-6"><span class="show-grid-block">Name: </span><?php echo $row['firstname']; ?></div>
                  </div>

                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block">Age: </span><?php echo $row['age']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block">Gender: </span><?php echo $row['gender']; ?></div>
                  </div>

                  <div class="row show-grid">
                     <div class="col-md-6"><span class="show-grid-block">Date Joined: </span><?php echo date("M d,Y",strtotime($row['date_created'])) ?></div>
                    <div class="col-md-6"><span class="show-grid-block">Address: </span><?php echo $row['address']; ?></div>
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
                      <!--   Start table -->
    <div class="row">
            
            <div class="col-xl-12">
                <section class="panel">

                  <header class="panel-heading">
                    <div class="panel-actions">
                      <!-- <a href="#" class="fa fa-caret-down"></a> -->
                      <!-- <a href="members.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a> -->
                    </div>
            
                    <h2 class="panel-title">Trainor's Client</h2>
                   
                  </header>

                  <div class="panel-body">
                    <div class="table-responsive">
                       <table class="table table-bordered table-striped mb-none" id="trainor_client_table">

                          <colgroup>
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <!-- <col width="5%">
                            <col width="5%"> -->
     
                          </colgroup>

                            <thead style="">
                                  <tr>
                                  <!--     <th scope="col" class="center">Action</th> -->
                                      <th scope="col"  class="center" >#</th>
                                      <th scope="col" class="center">Member ID</th>
                                      <th scope="col" class="center">Name</th>
                                   <!--    <th scope="col" class="center">Status</th> -->
                                  </tr>
                              </thead>
                             <tbody>
          
                                 <?php 
                                  $i = 1;

                                  // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                                  $user_id = $row['user_id'];

                                  $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND trainor = '$user_id' ORDER BY id DESC";

                                  $result = mysqli_query($con, $member);
                                  
                                  while ($row = mysqli_fetch_array($result)):
                                 ?>

                              <tr>
                                <td class="center"><?php echo $i++ ?></td>
                                    
                                <td class="center">
                                  <?php echo $row['member_id'] ?>     
                                </td>

                                <td class="center">
                                  <?php echo $row['name'] ?>
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
<?php 
}
?>


<style type="text/css">

  .client-image{
    height: 15rem!important;
  }



  span{
    font-weight: bold;
  }
  #custom-content {
    /*  margin-top: 25px;
      font-size: 21px;
      text-align: center;*/

    -webkit-animation: fadein 2s!important; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s!important; /* Firefox < 16 */
        -ms-animation: fadein 2s!important; /* Internet Explorer */
         -o-animation: fadein 2s!important; /* Opera < 12.1 */
            animation: fadein 2s!important;
}

</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#member_info_table').DataTable();
} );

$(document).ready(function() {
    $('#trainor_client_table').DataTable();
} );

    $(document).on('click', '.start', function(){  
        
        Swal.fire({
           title: 'Do you want to start session?',
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
                  url:'ajax.php?action=session_start_action',
                  type:'post',
                  data:{
                      id:id
                  }, success:function(data, resp){

                  console.log(data);

                  console.log(resp);

            if(data == 1){

              Swal.fire({
                    icon: 'success',
                    title: 'Session Started!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                      window.location.href = 'index.php';
                  })

            }else if(data == 2){
              Swal.fire({
                    icon: 'info',
                    title: 'This session is closed!'
                  })
            }else if(data == 3){
              Swal.fire({
                    icon: 'info',
                    title: 'There is no session in this physical fitness!'
                  })
            }else{

              Swal.fire({
                    icon: 'warning',
                    title: 'Failed to start!',

                  })

            }
          }

             }); 

     

            }
        })     
      }); 
      //End
</script>