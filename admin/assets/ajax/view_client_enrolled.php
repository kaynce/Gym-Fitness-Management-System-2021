<?php  include('../db_connect.php'); ?>


<?php 
  $id = $_GET['id'];
  $query = "SELECT * FROM `enrolls_to` WHERE id = '$id'  ";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Add/Renewal</h2>
        </header>
        <div class="panel-body">
          <form>

            <div class="form-group">
                <label class="col-sm-6 control-label">Member ID</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['member_id']; ?></label>
                </div>
            </div>

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
                                <span class="label label-primary">Closed</span>
                        <?php }else{ ?>
                        <?php } ?>
                  </label>
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
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['physical_fitness_name']; ?></label>
                </div>
            </div>

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

            <?php if(empty($row['duration']) != TRUE){ ?>
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
                  <?php }else{} ?>
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
                        $package_id = $row['package_id'];

                        $query_tcpr = "SELECT * FROM physical_fitness_packages_rates WHERE package_id ='$package_id'  ";

                       $result_tcpr = mysqli_query($con, $query_tcpr);
                       $row_tcpr = mysqli_fetch_assoc($result_tcpr);
                 

                      if(!empty($row_tcpr['package_name'])){ 
                      echo $row_tcpr['package_name'];
                      }else{}
                 ?>
                  </label>
                </div>
            </div>
          <?php } ?>

          <?php if(empty($row['session']) != TRUE){ ?>
            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Session</label>
                <div class="col-sm-6">
                  <label id="">
                    <?php
                        if(!empty($row['session'])){
                            echo $row['session'];
                        }else{}
                    ?>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Remaining Session</label>
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
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }
</style>