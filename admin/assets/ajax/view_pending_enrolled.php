<?php  include('../db_connect.php'); ?>


<?php 

  $id = $_GET['id'];

  $query = "SELECT * FROM enrolls_to WHERE id = '$id' AND add_renew_status = 'pending' ";

  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);

  $duration = '-------';

   if(!empty($row['day'])){    
       $duration = $row['day'].' Day/s';  
   }else if(!empty($row['week'])) {  
       $duration = $row['week'].' Week/s';  
   }else if(!empty($row['month'])) {
       $duration = $row['month'].' Month/s';
   }else{}

?>



<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Pending Member</h2>
        </header>
        <div class="panel-body">
          <form>

             <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Created</label>
                <div class="col-sm-6">
                  <label id=""><?php echo date("M d,Y",strtotime($row['date_created'])) ?></label>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Status</label>
                <div class="col-sm-6">
                  <label id="">
                     <span class="label label-warning text-uppercase text-semibold text-dark">Pending</span>
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
                  <label id="">
                    <?php 
                     $member_id = $row['member_id'];
                     $query_name = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = '$member_id' ";
                     $result_name = mysqli_query($con , $query_name);

                     if(mysqli_num_rows($result_name) == true){
                        $row_name = mysqli_fetch_assoc($result_name);
                     }
                      echo ucwords($row_name['name']);
                    ?>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Age</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['age']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Gender</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['gender']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Height</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['height']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Weight</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['weight']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Address</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['region'].' '.$row_name['house_no'].' '.$row_name['street_name'].' '.$row_name['province'].' '.$row_name['city'].' '.$row_name['barangay'].' '.$row_name['postal_code']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Phone Number</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['contact']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Email</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row_name['email']; ?></label>
                </div>
            </div>            

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['physical_fitness_name']; ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Client Type</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['client_type']; ?></label>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Reference ID</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $row['reference_id']; ?></label>
                </div>
            </div>
            
          <?php if ($row['walk_in'] == 'YES'){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Walk In</label>
                <div class="col-sm-6">
                  <label id="">
                    <?php
                        $physical_fitness_id = $row['physical_fitness_id'];
                        $package_id = $row['package_id'];
                        $client_type = $row['client_type'];
                        $query = "SELECT * FROM `physical_fitness_walk_in_rates`";
                        $result = mysqli_query($con, $query);

                        while($row_cpr=mysqli_fetch_assoc($result)):
                    ?>

                    <?php if ($physical_fitness_id == $row_cpr['physical_fitness_id']): ?>      
                        <p class="form-control-static">
                          <strong>
                            Physical Fitness: 
                          </strong>
                            <?php echo $row['physical_fitness_name']; ?>
                        </p>

                        <p class="form-control-static"> 
                          <strong>
                            Duration: 
                          </strong>
                             1 Day
                        </p>

                        <?php 
                        if ($client_type == 'student'){
                          ?>
                            <p class="form-control-static"> 
                              <strong>
                                Amount: 
                              </strong>
                              <?php echo number_format($row_cpr['student_amount'], 2);  ?>  
                            </p>
                          <?php 
                        }else{
                          ?>
                           <p class="form-control-static"> 
                              <strong>
                                Amount: 
                              </strong>
                            <?php echo number_format($row_cpr['non_student_amount'], 2) ?>      
                                            
                          </p>
                          <?php 
                       }
                       ?>

                       <?php 
                       endif;
                       ?>

                    <?php endwhile; ?>
                    </label>
                </div>
            </div>
          <?php }else{ ?>
             <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Package</label>
                  <div class="col-sm-6">
                  <label id="">
                    <?php
                       $physical_fitness_id = $row['physical_fitness_id'];
                       $package_id = $row['package_id'];
                       $client_type = $row['client_type'];

                       $query = "SELECT * FROM `physical_fitness_packages_rates`";
                       $result = mysqli_query($con, $query);

                       while($row_cpr=mysqli_fetch_assoc($result)):

                    ?>
                    <?php if ($physical_fitness_id == $row_cpr['physical_fitness_id']): 

                   if ($package_id == $row_cpr['package_id']): 
          ?>  
                    <p class="form-control-static"> 
                       <strong>
                          Package Name: 
                       </strong>
                        <?php echo $row_cpr['package_name'] ?>             
                    </p>

                    <?php if(!empty($row_cpr['day'])){ ?>
                        <strong>    
                          Duration: 
                        </strong>
                    <?php echo $row_cpr['day']; ?> Day/s               
                                          
                    <?php }else if(!empty($row_cpr['week'])) {  ?>
                        <strong>    
                          Duration: 
                        </strong>
                    <?php echo $row_cpr['week']; ?> Week/s 
                                      
                    <?php }else if(!empty($row_cpr['month'])) {  ?>
                        <strong>    
                          Duration: 
                        </strong>
                    <?php echo $row_cpr['month']; ?> Month/s
                <?php }else{ ?>
           <?php  } ?>             
            
                <p class="form-control-static"> 
                  <strong>
                    Session: 
                  </strong>
                <?php echo $row_cpr['session'] ?>
                                        
                </p>
                <?php 
                  if ($client_type == 'student'){
                ?>

                <p class="form-control-static"> 
                  <strong>
                    Amount: 
                 </strong>
              <?php echo number_format($row_cpr['package_student_amount'], 2); ?>  
               </p>
              <?php 
            }else{
          ?>
             <p class="form-control-static"> 
             <strong> 
              Amount: 
            </strong>
          <?php echo number_format($row_cpr['package_non_student_amount'], 2); ?>      
            </p>
        <?php 
           }
        ?>
        </div>
          
        </div>
      <?php 
                                                                  
      endif;
      endif;
    ?>

        <?php endwhile; ?>
                 </label>

  <?php } ?>
<!-- </div> -->

    <?php if(!empty($row['trainor_id'])){ ?>
      <div class="form-group">
        <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Client's Trainor</label>
          <div class="col-sm-6">
            <label id="">
              <?php
                  $trainor_id = $row['trainor_id'];
                  $query = $con->query("SELECT *,concat(lastname,', ',firstname) as name from users WHERE status ='approved' AND type = 'trainor' ");
                  while($row_user= mysqli_fetch_assoc($query)):
              ?>
              <?php if ($trainor_id == $row_user['user_id']): ?>
                      <p class="form-control-static"> <?php echo $row_user['name'] ?></p>
              <?php endif; ?>

              <?php endwhile; ?>
          </label>
        </div>
      </div>
    <?php } ?>

     <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Screenshot ID</label>
                <div class="col-sm-6">
                  <label >
                      <?php if(!empty($row['screenshot_id'])){ ?>
                             <img src="assets/images/users/screenshot_id/<?php echo $row['screenshot_id']; ?>"  class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; width: 50%;">
                          <?php }else{ ?>
                             <img src="../assets/images/default-avatar.jpg ?>"  class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; width: 100%;">
                    <?php } ?>
                    </label>
                </div>
            </div>
       <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Screenshot Payment</label>
             
                  <label id="">
                    <?php if(!empty($row['screenshot_payment'])){ ?>
                            <img class="" src="assets/images/users/screenshot_payment/<?php echo $row['screenshot_payment']; ?>"  class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; width: 50%;">
                    <?php }else{ ?>
                           <img  class="img_payment" src="../assets/images/payment.png ?>"  class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; width: 100%;">
                    <?php } ?>
                    </label>
              
            </div>
             
          

    </form>
<!--   </div> -->

  <footer class="panel-footer">
    <div class="row">
      <div class="col-md-12 text-right">
        <button class="btn btn-default modal-dismiss">Close</button>
      </div>
      </div>
  </footer>
  </section>
</div>

<style type="text/css">
  .control-label{
    font-weight: 600;
  }
   label{
    font-size: 1.7rem!important;
  }

 /* .img_payment{
    border: 1px solid #ddd;
    padding: 5px;
    min-height: 100%!important;
    width: 580px;
    border-radius: 20px!important;
  }

  @media (min-width: 400px) {
    .img_payment{
     border: 1px solid #ddd!important;
    border-radius: 4px!important;
    padding: 5px!important;
    width: 150px!important;
   }
  }*/
</style>

