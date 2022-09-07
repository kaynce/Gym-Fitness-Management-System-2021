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
                    <div class="col-md-6"><span class="show-grid-block">Member ID: </span><?php echo $row['member_id'] ?></div>
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
                    <div class="col-md-6"><span class="show-grid-block">Profile Pic: </span>
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
            
            <h2 class="panel-title">Fitness Goals</h2>
            <br>
           <a type="button" href="assets/ajax/view_trainor_client_fitness_goals.php?member_id=<?php echo $row['member_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-success" >Add Fitness Goals</a>
                   
          </header>

          <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="member_info_table">
                    <colgroup>
                      <col width="5%">
                      <col width="1%">
                      <col width="5%">
                      <col width="5%">
                      <col width="5%">
                    </colgroup>

                    <thead style="">
                      <tr>
                        <th scope="col" class="center">Action</th>
                        <th scope="col"  class="center" >#</th>
                        <th scope="col" class="center">Date Created</th>
                        <th scope="col" class="center">Goals</th>   
                        <th scope="col" class="center">Date Goal</th> 
                      </tr>
                    </thead>
                <tbody>
                        
                <?php 
                  $i = 1;
                  $member = "SELECT * FROM `fitness_goals` WHERE member_id = '$member_id' ";

                  $result = mysqli_query($con, $member);
                                                
                  while ($row = mysqli_fetch_array($result)):
                ?>

                <tr>

                  <td class="center">

                     <a type="button" href="assets/ajax/view_fitness_goals_modal.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-success" >View</a>

                     <a type="button" href="assets/ajax/edit_fitness_goals_modal.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-primary" >Edit</a>

                     <a type="button" class="btn btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" >Delete</a>
                   </td>

                   <td class="center"><?php echo $i++ ?></td>

                   <td class="center">
                     <?php echo date("M d,Y", strtotime($row['date_created'])) ?>
                   </td>

                   <td class="center">
                     <?php echo  substr($row['goal'], 0, 20) ?>
                     ...
                   </td>

                   <td class="center">
                     <?php echo date("M d,Y", strtotime($row['date_goal'])) ?>                
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

</script>
