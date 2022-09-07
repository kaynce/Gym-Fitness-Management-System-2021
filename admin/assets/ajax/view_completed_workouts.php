<?php  include('../db_connect.php'); ?>


<?php 
  $id = $_GET['id'];
  $query = "SELECT * FROM `completed_workouts` WHERE id = '$id'  ";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Completed Session</h2>
        </header>
        <div class="panel-body">
          <form>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Completed</label>
                <div class="col-sm-6">
                  <label id=""><?php echo date("M d, Y", strtotime($row['date_created'])); ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Reference ID</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['reference_id']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
                <div class="col-sm-6">
                  <label >
                      <?php 
                         $reference_id = $row['reference_id'];
                         $query_ref = "SELECT * FROM `enrolls_to` WHERE reference_id = '$reference_id'  ";
                         $result_ref = mysqli_query($con, $query_ref);

                         if(mysqli_num_rows($result_ref) > 0){
                             $row_ref = mysqli_fetch_assoc($result_ref);
                             $physical_fitness_id = $row_ref['physical_fitness_id'];

                             $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id ='$physical_fitness_id'  ";
                             $result_pf = mysqli_query($con, $query_pf);
                             $row_pf = mysqli_fetch_assoc($result_pf);

                             echo $row_pf['physical_fitness_name'];
                          }
                      ?>
                    </label>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Package</label>
                <div class="col-sm-6">
                  <label id="">
                    <?php 
                         $package_id = $row_ref['package_id'];

                         $query_pf = "SELECT * FROM `physical_fitness_packages_rates` WHERE package_id ='$package_id'  ";
                         $result_pf = mysqli_query($con, $query_pf);

                         if(mysqli_num_rows($result_pf) > 0){
                           $row_pf = mysqli_fetch_assoc($result_pf);

                           echo $row_pf['package_name'];
                         }
                      ?>
                  </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Member ID</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['member_id']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Name</label>
                <div class="col-sm-6">
                  <label >
                      <?php 
                         $member_id = $row['member_id'];
                         $query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = '$member_id' ORDER BY id DESC  ";
                         $result_name = mysqli_query($con, $query_name);
                         $row_name = mysqli_fetch_assoc($result_name);

                         echo ucwords($row_name['name']);
                      ?>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Profit</label>
                <div class="col-sm-6">
                  <label id=""><?php echo number_format($row['equity'], 2); ?></label>
                </div>
            </div>


           
          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
            <!--   <button type="button" id="add"  class="btn btn-success add" >Save</button> -->
            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </footer>
    </section>
 
</div>

<style type="text/css">
  .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }
</style>