<?php 
   if (session_status() === PHP_SESSION_NONE){ 
      session_start(); 
   }

   // unset($_SESSION['nav-active 1']);

   // $_SESSION['nav-active 2'] = "nav-active 2";
   $nav_active_notifications = "nav-active";
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
            <h2>Notifications</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Notifications</span></li>
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
                      <a href="notifications"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">Notifications</h2>
                    <br>
                      

                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                              <col width="1%">
                              <col width="1%">
                              <col width="5%">
                              <col width="5%">
                              <col width="1%">                       
                        </colgroup>

                      <thead style="">
                        <tr class="text-uppercase text-semibold text-dark">
                            <th scope="col" class="center">Action</th>
                            <th scope="col"  class="center" >#</th>
                            <th scope="col" class="center">Title</th>   
                            <th scope="col" class="center">Message</th> 
                            <th scope="col" class="center">Date</th>                     
                        </tr>
                      </thead>
                    <tbody>
                        
                       <?php 

                        
                        $email = $_SESSION['email'];
                        $i = 1;
                        // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
               

                        $query = "SELECT * FROM `notifications` WHERE email = '$email' AND type = 'to_client' OR type = 'announcement'  ORDER BY id DESC";

                        $result = mysqli_query($con, $query);
                        
                        while ($row = mysqli_fetch_array($result)):
                       ?>

                    <tr>
                        <!-- <th scope="row"><b></b></th> -->
                        <td class="center">
                          <!--  <a type="button" class="btn btn-sm btn-primary " href="view_health_status.php?id=<?php echo $row['id'];?>">Edit</a>
-->
                             <a type="button" href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-success" >View</a>

                        </td>
                        <!-- <td>
                            <div class="tm-status-circle pending">
                            </div>Pending
                        </td> -->
                       

                         <td class="center"><?php echo $i++ ?></td>

                          

                          <td class="center">
                           <?php 
                           // echo  substr($row['alert_title'], 0, 50) 
                            echo $row['alert_title'];
                           ?>
                            
                          </td>

                           <td class="center">
                             <?php echo $row['alert_message'] ?>
                             
                          </td>
                          
                          <td class="center">
                             <?php echo date("M d,Y", strtotime($row['date_created'])) ?>
                             
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


<!-- Start Add modal -->


    <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Add Fitness Goal</h2>
        </header>
        <div class="panel-body">
          <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
                          <input type="hidden" id="member_id" name="member_id" class="form-control" value="<?php echo $member_id ?>" />

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Goal</label>
                            <div class="col-sm-9">
                              <textarea rows="5" id="goal" name="goal" class="form-control" placeholder="Type goal..." required></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Date</label>
                            <div class="col-sm-9">
                              <input type="date" id="date_goal" name="date_goal" class="form-control" value="<?php echo $date_goal ?>" />
                            </div>
                          </div>

                        </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="button" id="add"  class="btn btn-success add" >Save</button>

            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </footer>
    </section>
  </div>
<!-- End Add modal -->



<!-- View Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Fitness Goal</h5>
 
          </div>
          <div class="modal-body">
              
          <form  >

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Date Created</label>
                            <div class="col-sm-9">
                              <label id=""><?php echo date('M d,Y', strtotime(isset($view_date_created) ? $view_date_created:'')) ?></label>

                             
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Goal</label>
                            <div class="col-sm-9">
                              <textarea rows="5" id="view_goal" name="view_goal" class="form-control" placeholder="Type goal..." readonly required><?php echo isset($view_goal) ? $view_goal:'' ?></textarea>
                              <label><?php echo isset($view_goal) ? $view_goal:'' ?></label>
                             
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Date Goal</label>
                            <div class="col-sm-9">
                              <input type="text" id="view_date_goal" name="view_date_goal" class="form-control" readonly value="<?php echo $view_date_goal ?>" />
                            </div>
                          </div>
    
           </form>
          </div>
              <div class="modal-footer">
              <button class="btn btn-default " onclick="view_close_button()">Close</button>
  
              </div>

            

        </div>
      </div>
    </div>
<!-- End View Modal -->



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

