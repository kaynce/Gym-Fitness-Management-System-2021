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
     $user_id = $_GET['user_id'];
     $query = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `users` WHERE user_id = '$user_id' ";
     $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result); 
?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Trainor's Info</h2>
        </header>
        <div class="panel-body">
            <form>
                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Trainor ID: </span><?php echo $row['user_id']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Name: </span><?php echo ucwords($row['name']); ?></div>
                  </div>

                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Age: </span><?php echo $row['age']; ?></div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Gender: </span><?php echo $row['gender']; ?></div>
                  </div>

                  <div class="row show-grid">
                     <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Date Joined: </span>
                      <?php 
                          if(!empty($row['date_created'])){
                            echo date("M d,Y",strtotime($row['date_created']));
                          }else{}
                        
                      ?>
                    </div>
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Address: </span>
                      <?php 
                        $region_id = $row['region'];

                        $query_address = "SELECT region.region_name, 
                                                 province.province_name,
                                                 city.city_name
                                          FROM region
                                          INNER JOIN province ON (region.region_id = province.province_id)
                                          INNER JOIN city ON (province.province_id = city.city_id)
                                          WHERE region.region_id = '$region_id' ";

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

                 <!--  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Rate: </span><?php echo $row['rate']; ?></div>
                  </div>
 -->
                  <div class="row show-grid">
                    <div class="col-md-6"><span class="show-grid-block text-uppercase text-semibold text-dark">Profile Pic: </span>
                      <?php 
                        if(!empty($row['image'])){
                            ?>
                              <img src="../assets/images/team/<?php echo $row['image']; ?>"  class="rounded img-responsive client-image">

                            <?php }else{ ?>
                              <img src="../assets/images/default-avatar.jpg ?>" class="rounded img-responsive client-image">
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
      <hr class="separator">
  <!--   Start table -->
    <div class="row">
      <div class="col-xl-12">
        <section class="panel">
          <header class="panel-heading">
            <div class="panel-actions">
              </div>
                <h2 class="panel-title">Trainor's Client/s</h2>
          </header>

          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped mb-none" id="trainor_client_table">
                <colgroup>
                  <!-- <col width="5%"> -->
                  <col width="1%">
                  <col width="5%">
                  <col width="5%">
                  <col width="5%">
                  <col width="5%">                      
                </colgroup>

                <thead class="text-uppercase text-semibold text-dark" style="">
                  <tr>
                 <!--    <th scope="col" class="center">Action</th> -->
                    <th scope="col"  class="center" >#</th>
                    <th scope="col" class="center">Member ID</th>
                    <th scope="col" class="center">Name</th>
                    <th scope="col" class="center">Gender</th>
                    <th scope="col" class="center">Date Joined</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    $user_id =  $_GET['user_id'];
                    $i = 1;
                    $member = "SELECT DISTINCT 
                                              member_id
                               FROM `enrolls_to` 
                               WHERE add_renew_status ='approved' 
                               AND trainor_id = '$user_id' 
                               AND status = '1' 
                               ORDER BY id DESC ";

                    $result = mysqli_query($con, $member);
                                                
                    while ($row = mysqli_fetch_array($result)):
                  ?>

                <tr>
                  <!-- <td class="center">
                    <a type="button" href="assets/ajax/view_trainor_client.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-sm btn-success modal-with-zoom-anim simple-ajax-modal  btn btn-success" >View</a>
                  </td> -->
                  <td class="center"><?php echo $i++ ?></td>
                  <td class="center"><?php echo $row['member_id']; ?></td>
                  <td class="center">
                  <?php 
                    $member_id = $row['member_id'];
                    $query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = '$member_id' ORDER BY id DESC ";
                    $result_name = mysqli_query($con, $query_name);
                    $row_name = mysqli_fetch_assoc($result_name);
                    echo ucwords($row_name['name']);
                  ?>
                  </td>
                  <td class="center"><?php echo $row_name['gender']; ?></td>
                  <td class="center">
                         <?php 
                          $member_id = $row['member_id'];
                          $query_date = "SELECT * FROM `enrolls_to` 
                               WHERE add_renew_status ='approved' 
                               AND trainor_id = '$user_id' 
                               AND status = '1' 
                               ORDER BY id DESC ";
                          $result_date = mysqli_query($con, $query_date);
                          $row_date = mysqli_fetch_assoc($result_date);
                          echo date("M d, Y", strtotime($row_date['date_created']));
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
    $('#trainor_client_table').DataTable();
//} );

</script>