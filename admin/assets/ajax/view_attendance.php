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
     $member_user_id = $_GET['member_user_id'];
     $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = '$member_user_id' ";
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
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Member ID: </span><?php echo $row['member_id']; ?></div>
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Name: </span><?php echo ucwords($row['name']); ?></div>
        </div>

        <!-- <div class="row show-grid">
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Age: </span><?php echo $row['age']; ?></div>
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Gender: </span><?php echo $row['gender']; ?></div>
        </div> -->

        <div class="row show-grid">
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Date Joined: </span><?php echo date("M d,Y",strtotime($row['date_created'])) ?></div>
                 <!--    <div class="col-md-6"><span class="show-grid-block">Address: </span><?php echo $row['region'].' '.$row['house_no'].' '.$row['street_name'].' '.$row['province'].' '.$row['city'].' '.$row['barangay'].' '.$row['postal_code']; ?></div> -->
        </div>

        <!-- <div class="row show-grid">
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Phone Number: </span><?php echo $row['contact']; ?></div>
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Email: </span><?php echo $row['email']; ?></div>
        </div> -->

        <div class="row show-grid">
          <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Profile Pic: </span>
            <?php 
              if(!empty($row['image'])){
            ?>
                <img src="../assets/images/users/<?php echo $row['image']; ?>"  class="rounded img-responsive client-image">
            <?php }else{ ?>
                <img src="../assets/images/default-avatar.jpg ?>"  class="rounded img-responsive client-image">
            <?php } ?>
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
      
              <h2 class="panel-title">View Client's Attendance</h2>
             
            </header>

            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-striped mb-none" id="trainor_client_table">

                    <colgroup>
                      <col width="1%">
                      <col width="5%">
                      <col width="5%">
                      <col width="5%">
                    </colgroup>

                    <thead class="text-uppercase text-semibold text-dark" style="">
                        <tr>
                            <th scope="col"  class="center" >#</th>
                            <th scope="col" class="center">Log Date</th>
                            <th scope="col" class="center">Time In</th>
                            <th scope="col" class="center">Time Out</th>
                        </tr>
                    </thead>
                   <tbody>

                       <?php 
                        $i = 1;

                        // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                        $member_user_id = $row['member_id'];

                        $query = "SELECT * FROM `attendance` WHERE member_user_id='$member_user_id' ORDER BY id DESC";

                        $result = mysqli_query($con, $query);
                        
                        while ($row = mysqli_fetch_array($result)):
                       ?>

                    <tr>
                      <td class="center"><?php echo $i++ ?></td>
                      
                      <td class="center">
                        <?php echo date("M d, Y", strtotime($row['log_date'])); ?>
                      </td>

                      <td class="center">
                        <?php 
                            if(!empty($row['time_in'])){
                              echo date("h:i A", strtotime($row['time_in'])); 
                            }
                        ?>
                      </td>

                      <td class="center">
                        <?php 
                            if(!empty($row['time_out'])){
                              echo date("h:i A", strtotime($row['time_out'])); 
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
      $query = "SELECT *, CONCAT(lastname, ', ' , firstname) AS name FROM `users` WHERE user_id = '$member_user_id' ";
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
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">User ID: </span><?php echo $row['user_id']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark" >Name: </span><?php echo ucwords($row['name']); ?></div>
                  </div>

                 <!--  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Age: </span><?php echo $row['age']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Gender: </span><?php echo $row['gender']; ?></div>
                  </div> -->

                  <div class="row show-grid">
                     <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Date Joined: </span><?php echo date("M d,Y",strtotime($row['date_created'])) ?></div>
                    <!-- <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Address: </span><?php echo $row['region'].' '.$row['house_no'].' '.$row['street_name'].' '.$row['province'].' '.$row['city'].' '.$row['barangay'].' '.$row['postal_code']; ?></div> -->
                  </div>

                 <!--  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Phone Number: </span><?php echo $row['contact']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Email: </span><?php echo $row['email']; ?></div>
                  </div> -->

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
                      <!--   Start table -->
    <hr class="separator">
    <div class="row">
            
            <div class="col-xl-12">
                <section class="panel">

                  <header class="panel-heading">
                    <div class="panel-actions">
                      <!-- <a href="#" class="fa fa-caret-down"></a> -->
                      <!-- <a href="members.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a> -->
                    </div>
            
                    <h2 class="panel-title">View Trainor's Attendance</h2>
                   
                  </header>

                  <div class="panel-body">
                    <div class="table-responsive">
                       <table class="table table-bordered table-striped mb-none" id="trainor_client_table">

                          <colgroup>
                            <col width="1%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                          </colgroup>

                          <thead class="text-uppercase text-semibold text-dark" style="">
                              <tr>
                              <!--     <th scope="col" class="center">Action</th> -->
                                  <th scope="col"  class="center" >#</th>
                                  <th scope="col" class="center">Log Date</th>
                                  <th scope="col" class="center">Time In</th>
                                  <th scope="col" class="center">Time Out</th>
                               <!--    <th scope="col" class="center">Status</th> -->
                              </tr>
                          </thead>
                         <tbody>
      
                             <?php 
                              $i = 1;

                              // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                              $user_id = $row['user_id'];

                              $query = "SELECT * FROM `attendance` WHERE member_user_id='$user_id' ORDER BY id DESC";

                              $result = mysqli_query($con, $query);
                              
                              while ($row = mysqli_fetch_array($result)):
                             ?>

                          <tr>
                            <td class="center"><?php echo $i++ ?></td>
                            
                            <td class="center">
                              <?php echo date("M d, Y", strtotime($row['log_date'])); ?>
                            </td>

                            <td class="center">
                              <?php 
                                if(!empty($row['time_in'])){
                                  echo date("h:i A", strtotime($row['time_in'])); 
                                }
                              ?>
                            </td>

                            <td class="center">
                               <?php 
                                if(!empty($row['time_out'])){
                                  echo date("h:i A", strtotime($row['time_out'])); 
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
  //$(document).ready(function() {
    $('#member_info_table').DataTable();
//} );

//$(document).ready(function() {
    $('#trainor_client_table').DataTable();
//} );

</script>