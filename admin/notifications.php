<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

   $nav_active_notifications = "nav-active";

 ?>
 
<?php include('head.php'); ?>


  
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
              
              <?php 
                $type = $_SESSION['type'];
                if ($type == 'admin') {
              ?>
                  <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
              <?php 
                } else {
              ?>
                <a class="sidebar-right-toggle" data-open=""><i class=""></i></a>
              <?php 
                }
              ?>

              
            </div>
          </header>

          <?php 
            $type = $_SESSION['type'];

            if($type == 'admin' || $type == 'sub_admin'){
          ?>
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
                              <col width="2%">
                              <col width="2%">
                              <col width="5%">
                              <col width="5%">
                        </colgroup>

                      <thead class="" style="">
                        <tr class="text-uppercase text-semibold text-dark">
                            <th scope="col" class="center">Action</th>
                            <th scope="col"  class="center" >#</th>
                            <th scope="col" class="center">Name</th> 
                            <th scope="col" class="center">Title</th>   
                            <th scope="col" class="center">Message</th> 
                            <th scope="col" class="center">Date</th>                     
                        </tr>
                      </thead>
                    <tbody>
                        
                      <?php 
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT email FROM `users` WHERE user_id = '$user_id'";
                        $result = mysqli_query($con, $query);

                        $row = mysqli_fetch_assoc($result);

                        $email = $row['email'];

                        $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                                       

                        $query = "SELECT * FROM `notifications` WHERE type = 'to_admin' ORDER BY id DESC ";

                        $result = mysqli_query($con, $query);
                                                
                        while ($row = mysqli_fetch_array($result)):
                      ?>

                            <tr>
                              <!-- <th scope="row"><b></b></th> -->
                              <td class="center">
                              <!--  <a type="button" class="btn btn-sm btn-primary " href="view_health_status.php?id=<?php echo $row['id'];?>">Edit</a>
       -->
                                <a type="button" href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-sm btn-success" >View</a>

                              </td>
              
                            <td class="center"><?php echo $i++ ?></td>


                            <td class="center">
                                 <?php 
                                    $email = $row['email'];
                                    $query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `pending_members` WHERE email = '$email' ";
                                    $result_name = mysqli_query($con, $query_name);

                                    if(mysqli_num_rows($result_name) == 1){
                                      $row_name = mysqli_fetch_assoc($result_name); 
                                    }else{
                                      //If there is no data in members table go to users table
                                      $query_name = "SELECT *, concat(lastname, ', ', firstname) AS name  FROM `members` WHERE email = '$email' ";
                                      $result_name = mysqli_query($con, $query_name);
                                      $row_name = mysqli_fetch_assoc($result_name); 
                                    }
                                   ?>
                                <?php echo $row_name['name']; ?>
                            </td>

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
           <!--  End row -->
         <?php }else{ ?>
          <!-- Trainor -->
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
                              <col width="2%">
                              <col width="5%">
                              <col width="5%">
                        </colgroup>

                      <thead class="" style="">
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
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT email FROM `users` WHERE user_id = '$user_id'";
                        $result = mysqli_query($con, $query);

                        $row = mysqli_fetch_assoc($result);

                        $email = $row['email'];

                        $i = 1;

                        $query = "SELECT * FROM `notifications` WHERE type = 'announcement' ORDER BY id DESC ";

                        $result = mysqli_query($con, $query);
                                                
                        while ($row = mysqli_fetch_array($result)):
                      ?>

                        <tr>
                          <!-- <th scope="row"><b></b></th> -->
                          <td class="center">
                          <!--  <a type="button" class="btn btn-sm btn-primary " href="view_health_status.php?id=<?php echo $row['id'];?>">Edit</a>
   -->
                            <a type="button" href="assets/ajax/view_notification.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn btn-sm btn-success" >View</a>

                          </td>
              
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
           <!--  End row -->

         <?php } ?>
         
          <!-- end: page -->
        </section>
      </div>

     <?php require('assets/calendar.php'); ?>


    </section>




<script>

 $(document).ready(function(){  
 });  


    //------------------Start view
     $(document).on('click', '.view', function(){  
           var id = $(this).attr("id");  

           $.ajax({  
                url:"member_fetch_data.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){   
                     $('#view_id').val(data.id);
                     $('#view_training_classes_name').val(data.firstname);    
                     $('#view_description').val(data.description);  
  
                     $('#viewModal').modal('show');  
                }  
           });  
      });  
   //------------------End view

   
</script>


<?php include('footer.php'); ?>

<style type="text/css">
   

.modal-dialog {
 
          width: 1000px;
 
          height: 600px!important;
 
        }

.modal-content {
 
    /* 80% of window height */
 
    height: 60%;
 
 /*   background-color:#BBD6EC;*/
 
}

.modal-header {
    background-color: #337AB7;
 
    padding:16px 16px;
 
    color:#FFF;
 
    border-bottom:2px dashed #337AB7;
 
 }
}    

</style>