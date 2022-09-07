<?php  require(dirname(__FILE__).'/../../../admin/assets/db_connect.php'); ?>

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
    $query = "SELECT * FROM `enrolls_to` WHERE id ='$id' AND add_renew_status = 'approved' ORDER BY id DESC ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result); 
?>


<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Info</h2>
        </header>
        <div class="panel-body">
          <form>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Status</label>
              <div class="col-sm-6">
                <label id="">
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
                        <!-- <span class="label label-primary">Closed</span> -->
                            <span class="label label-primary">Closed</span>
                      <?php }else{ ?>

                      <?php } ?>
                </label>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Reference ID</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo$row['reference_id']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Name</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  $member_id = $row['member_id'];
                  $query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = '$member_id' ";
                  $result_name = mysqli_query($con, $query_name);
                  $row_name = mysqli_fetch_assoc($result_name);

                  echo $row_name['name']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Client Type</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo ucwords($row['client_type']); 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Cost</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo number_format($row['amount'], 2); 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['physical_fitness_name']; 
                  ?> 
                  </label>
              </div>
            </div>

            <?php if(empty($row['trainor_id']) != TRUE){ ?>
             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Trainor</label>
              <div class="col-sm-6">
                <label id="">
                   <?php 
                      $trainor_id = $row['trainor_id'];

                      $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND user_id = '$trainor_id'   ";

                      $result_trainor = mysqli_query($con, $query_trainor);
                      $row_trainor = mysqli_fetch_assoc($result_trainor);
                      echo $row_trainor['name'];

                  ?> 
                  </label>
              </div>
            </div>
            <?php } ?>

            <?php 
              if(!empty($row['day'])){    
                $duration = $row['day'].' Day/s';  
              }else if(!empty($row['week'])){
                $duration = $row['week'].' Week/s'; 
              }else if(!empty($row['month'])){
                $duration = $row['month'].' Month/s';  
              }else{
                $duration = '';
              }
            ?>
            <?php if(empty($duration) != TRUE){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Duration</label>
              <div class="col-sm-6">
                <label id="">
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
                   </label>
              </div>
            </div>  
          <?php } ?>

          <?php if(empty($row['package']) != TRUE){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Package</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['package']; 
                  ?>
                  </label>
              </div>
            </div>
          <?php } ?>

          <?php if(empty($row['session']) != TRUE){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Session/s</label>
              <div class="col-sm-6">
                <label id="">
                  <?php
                   echo $row['session']; 
                   ?>
                   </label>
              </div>
            </div>
       
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Remaining Session/s</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['remaining_session']; 
                  ?>
                  </label>
              </div>
            </div>
          <?php } ?>

          <?php if(empty($row['date_created']) != TRUE){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Created</label>
              <div class="col-sm-6">
                <label id="">
                   <?php 
                       if(!empty($row['date_created'])){
                         echo date("M d,Y",strtotime($row['date_created']));
                       }else{}
                      ?>   
                  </label>
              </div>
            </div>
          <?php } ?>

          <?php if(empty($row['start_date']) != TRUE){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Start Date</label>
              <div class="col-sm-6">
                <label id="">
                   <?php 
                       if(!empty($row['start_date'])){
                         echo date("M d,Y",strtotime($row['start_date']));
                       }else{}
                      ?>   
                  </label>
              </div>
            </div>
          <?php } ?>

          <?php if(empty($row['end_date']) != TRUE){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">End Date</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                      if(!empty($row['end_date'])){
                        echo date("M d,Y",strtotime($row['end_date']));
                       }else{}
                      ?>
                  </label>
              </div>
            </div>
          <?php } ?>
          
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
  font-weight: bold;
}
 label{
    font-size: 1.7rem;
  }
</script>