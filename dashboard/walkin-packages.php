<?php 
   if (session_status() === PHP_SESSION_NONE){ 
      session_start(); 
   }

   // unset($_SESSION['nav-active 1']);

   // $_SESSION['nav-active 2'] = "nav-active 2";
   $nav_dashboard_expanded_gym = "nav-expanded";
   $nav_active_dashboard_gym = "nav-active";
   $nav_active_gym_membership = "nav-active";
 ?>


      

<?php 
include('head.php'); 
?>

<!-- If the client is not yet approved this file won't show -->
<?php require('pending_session_restriction.php'); ?>
<!-- End -->

<!--     
       <div class="preloader">
          <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
          </div>
      </div> -->

      <div class="inner-wrapper">
        <!-- start: sidebar -->
          <?php 
            require('sidebar.php');
           ?>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Gym Enrolled </h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Gym Enrolled</span></li>
                <li><span>Walk In | Packages</span></li>
              </ol>
              
              <a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

            </div>
          </header>

          
          <div class="row">
               <!-- Start third card -->
             
                 <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="walkin-packages"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">Walk In | Packages </h2>
 

                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                          <col width="1%">
                          <col width="1%"> 
                          <col width="1%">                  
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                          <col width="1%">
                        </colgroup>
                      <thead style="" class="text-uppercase text-semibold text-dark">
                        <tr>
                          <th scope="col" class="center">Action</th>
                          <th scope="col"  class="center" >#</th>
                          <th scope="col" class="center">Status</th>
                          <th scope="col" class="center">Reference ID</th>      
                          <th scope="col" class="center">Client Type</th>
                          <th scope="col" class="center">Cost</th>
                          <th scope="col" class="center">Physical Fitness</th>
                          <th scope="col" class="center">Trainor</th>
                          <th scope="col" class="center">Duration</th>
                          <th scope="col" class="center">Package</th>
                          <th scope="col" class="center">Session/s</th>
                          <th scope="col" class="center">Remaining Session/s</th>
                          <th scope="col" class="center">Date Created</th>
                          <th scope="col" class="center">Start Date</th>
                          <th scope="col" class="center">End Date</th>
                        </tr>
                      </thead>
                       <tbody>
                      <?php 
                                                 //Get the member id
                        if(isset($_SESSION['email'])){
                            $email = $_SESSION['email'];
                            $query = "SELECT * FROM `members` WHERE email = '$email' ";

                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result)){
                                 $row = mysqli_fetch_array($result);

                                 $member_id = $row['member_id'];
                               }
                            } 
                                            
                           $i = 1;

                           $member = "SELECT * FROM `enrolls_to` WHERE member_id = '$member_id' AND add_renew_status = 'approved' ORDER BY id desc ";

                           $result = mysqli_query($con, $member);
                                                
                          while ($row = mysqli_fetch_array($result)):
                      ?>
                            <tr class="center">
                              <td class="center">
                                 <a type="button" href="assets/ajax/view_member_gym_membership.php?id=<?php echo $row['id']; ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                  <a type="button" target="_blank" href="receipt.php?id=<?php echo $row['id']; ?>" class="btn-sm btn-success" ><i class=""></i>&nbsp;Receipt</a>
                              </td>

                             <td class="center"><?php echo $i++ ?></td>
                                                 

                              <td class="center">
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
                              </td> 

                              <td class="">
                                <?php echo $row['reference_id']; ?>
                              </td>

                              <td class="">
                                <?php echo ucwords($row['client_type']) ?>
                              </td>

                              <td class="center">           
                                <?php 
                                  echo number_format($row['amount'], 2);
                                ?>  
                              </td>

                              <td class="center">           
                                <?php 
                                  echo $row['physical_fitness_name'];
                                ?>  
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
                              </td>
                                                  
                              <td class="center">
                                <?php 
                                    $package_id = $row['package_id'];

                                    $query_tcpr = "SELECT * FROM physical_fitness_packages_rates WHERE package_id ='$package_id'  ";

                                    $result_tcpr = mysqli_query($con, $query_tcpr);
                                    $row_tcpr = mysqli_fetch_assoc($result_tcpr);
                                ?>

                               <?php if(!empty($row_tcpr['package_name'])){ ?>
                                      <?php echo $row_tcpr['package_name'] ?>
                               <?php }else{ ?>
                                      <?php }?>
                               </td>

                               <td class="center">
                                  <?php
                                    if(!empty($row['session'])){
                                        echo $row['session'];
                                    }else{}
                                  ?>
                               </td>

                               <td class="center">
                                  <?php
                                    if(!empty($row['remaining_session'])){
                                        echo $row['remaining_session'];
                                    }else{}
                                  ?>
                               </td>

                               <td class="center">
                                  <?php
                                    if(!empty($row['date_created'])){
                                        echo  date("M d,Y",strtotime($row['date_created']));
                                    }else{}
                                  ?>
                              </td>

                               <td class="center">
                                  <?php
                                    if(!empty($row['start_date'])){
                                        echo  date("M d,Y",strtotime($row['start_date']));
                                    }else{}
                                  ?>
                              </td>

                             <td class="center">
                                <?php
                                  if(!empty($row['end_date'])){
                                     echo  date("M d,Y",strtotime($row['end_date']));
                                  }else{}
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
            <!-- End third card -->
            </div>
        </section>
      </div>



    </section>

<!-- <style type="text/css">
  .modal-block {
    width: 750px!important;
    margin: auto!important;
  }
</style> -->

<style >
  .swal2-container {
      z-index: 100000;
    }
</style>



<!-- Vendor -->
    <script src="../admin/assets/vendor/jquery/jquery.js"></script>
    <script src="../admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../admin/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="../admin/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="../admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
    <script src="../admin/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>

    <script src="../admin/assets/vendor/pnotify/pnotify.custom.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="../admin/assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="../admin/assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="../admin/assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="../admin/assets/javascripts/forms/examples.wizard.js"></script>



<?php include('footer.php'); ?>

