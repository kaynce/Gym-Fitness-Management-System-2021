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
     $id = $_GET['id'];
     $query = "SELECT * FROM `physical_fitness` WHERE id = '$id' ";
     $result = mysqli_query($con, $query);

      $row = mysqli_fetch_assoc($result); 
?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Physical Fitness</h2>
        </header>
        <div class="panel-body">
            <form>
    
              <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
                <div class="col-sm-6">
                   <span><?php echo $row['physical_fitness_name'];  ?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Description</label>
                <div class="col-sm-6">
                  <span><?php echo $row['description']; ?></span>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Profile Pic</label>
                <div class="col-sm-12">
                   <span class="show-grid-block img">
                      <?php 
                        if(!empty($row['image'])){
                            ?>
                              <!-- located in client asset folder -->
                              <img  src="../assets/images/classes/<?php echo $row['image']; ?>"  lass="rounded img-responsive client-image" style="min-height: 100%; height: 30rem; min-width: 100%;">
                              <!-- located in admin asset folder -->
                            <?php }else{ ?>
                              <img src="../assets/images/physical_fitness_default.png ?>"  class="rounded img-responsive " style="min-height: 100%; height: 30rem; min-width: 100%;">
                        <?php }
                       ?>
                   </span>
                </div>
              </div>
           </form>

           <!--   Start table -->
    
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


<style type="text/css">
  label{
    font-size: 1.7rem!important;
  }

  span{
    font-size: 1.7rem!important;
  } 

</style>

