<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>

<?php include('head.php'); ?>


  
      <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">
        
          <div class="sidebar-header">
            <div class="sidebar-title text-primary">
              Navigation
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
              <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
          </div>
        
          <div class="nano">
            <div class="nano-content">
              <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">

                  <!----Start if else -->
                  <?php 
                  $user_id = $_SESSION['user_id'];
                  $type = $_SESSION['type'];

                  if ($type == 'admin') {
                    // $row = mysqli_fetch_assoc($result);

                   ?>

                  <!-- <li class="nav-active">
                    <a href="index.php">
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <span>Dashboard</span>
                    </a>
                  </li> -->
                  
                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Dashboard</span>
                    </a>
                    <ul class="nav nav-children ">
                      
                      <li class="">
                        <a href="index.php">
                          Dashboard
                        </a>
                      </li>

                      <li>
                        <a href="members_decline.php">
                          Membership Decline
                        </a>
                      </li>
                      
                    </ul>
                  </li>


                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Payments</span>
                    </a>
                    <ul class="nav nav-children ">
                      
                      <li>
                        <a href="payments.php">
                          List of Members
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Members</span>
                    </a>
                    <ul class="nav nav-children ">
                      <li>
                        <a href="add_member.php">
                          Add Member
                        </a>
                      </li>
                      <li>
                        <a href="members.php">
                          List of Members
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Membership Validity</span>
                    </a>
                    <ul class="nav nav-children ">
                      <li>
                        <a href="add_member.php">
                          New Entry
                        </a>
                      </li>
                      <li>
                        <a href="membership_validity.php">
                          List of Members
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Attendance</span>
                    </a>
                    <ul class="nav nav-children ">
                      
                      <li>
                        <a href="attendance.php">
                          List of Attendance
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Schedule</span>
                    </a>
                    <ul class="nav nav-children ">
                    <!--  <li>
                        <a href="add_member.php">
                          Add Member
                        </a>
                      </li> -->
                      <li>
                        <a href="schedules.php">
                          List of Schedules
                        </a>
                      </li>
                      
                    </ul>
                  </li>


                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Plans</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="plans.php">
                          List of Plans
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Rate</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="add_rate.php">
                          Add Rate
                        </a>
                      </li>

                      <li>
                        <a href="add_package.php">
                          Add Package
                        </a>
                      </li>

                      <!-- <li>
                        <a href="add_package.php">
                          Add Personal Training
                        </a>
                      </li> -->

                      <li>
                        <a href="packages.php">
                          List of Packages
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent nav-expanded nav-active">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Rates</span>
                    </a>
                    <ul class="nav nav-children">
                      <li class="nav-parent">
                        <a>Add Rate</a>
                        <ul class="nav nav-children">
                          <li>
                            <a href="add_rate.php">Add Walk In Rate</a>
                          </li>
                          <li>
                            <a href="add_package.php">Add Package Rate</a>
                          </li>
                          <li>
                            <a href="add_personal_training_rate.php">Add Personal Training Rate</a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-parent nav-expanded nav-active">
                        <a>List of Rate</a>
                        <ul class="nav nav-children">
                          <li class="">
                            <a href="walk_in.php">Walk in</a>
                          </li>
                          <li class="">
                            <a href="packages.php">Packages</a>
                          </li>
                          <li class="nav-active">
                            <a href="personal_training.php">Personal Training </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Trainors</span>
                    </a>
                    <ul class="nav nav-children">
                     <!--  <li>
                        <a href="add_trainor.php">
                          Add Trainor
                        </a>
                      </li> -->
                      <li>
                        <a href="trainors.php">
                          List of Trainors
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Training Classes</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="add_class.php">
                          Add Class
                        </a>
                      </li>
                      <li>
                        <a href="training_classes.php">
                          List of Classes
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Health Status</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="health_status.php">
                          List of Members
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                 <!--  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Report</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a>List of Members</a>
                      </li>
                      
                    </ul>
                  </li>
 -->
                  <!-- <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Pricing</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="#">Add Price</a>
                      </li>
                      <li>
                        <a href="#">List of Price</a>
                      </li>
                      
                    </ul>
                  </li> -->

                  <!-- <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Classes Timetable</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="#">Add Time</a>
                      </li>
                      <li>
                        <a href="#">Classes Timetabke</a>
                      </li>
                      
                    </ul>
                  </li>
 -->
                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Users</span>
                    </a>
                    <ul class="nav nav-children">
                    
                      <li>
                        <a href="users.php">
                          List of Users
                        </a>
                      </li>

                    </ul>
                  </li>

                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Admin Account</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="my_profile.php">
                          My Profile
                        </a>
                      </li>

                      <li>
                        <a href="admin_login.php">
                          Logout
                        </a>
                      </li>

                    </ul>
                  </li>

                  <li class="">
                       <a href="settings.php">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                             <span>Settings</span>
                       </a>
                  </li>

                  <?php 
                    } else {    
                   ?>

                    <li class="nav-active">
                      <a href="index.php">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                      </a>
                    </li>

                    <li class="nav-parent">
                      <a>
                        <i class="fa fa-child" aria-hidden="true"></i>
                        <span>Fitness Goals</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a href="fitness_goals.php">
                            List of Fitness Goals
                          </a>
                        </li>
                        
                      </ul>
                    </li>
                    
                    <li class="nav-parent">
                      <a>
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                        <span>Health Status</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a href="health_status.php">
                            List of Members
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-parent ">
                      <a>
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                        <span>Trainor Account</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a href="my_profile.php">
                            My Profile
                          </a>
                        </li>
                        <li>
                        <a href="new_password.php">
                          Change Password
                        </a>
                        </li>
                        <li>
                          <a href="admin_login.php">
                            Logout
                          </a>
                        </li>

                      </ul>
                    </li>



                   <?php 
                    }
                    ?>
                <!--    End if else -->
                </ul>
              </nav>
        
              <hr class="separator" />
        

        
            
            </div>
        
          </div>
        
        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Rates</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>List of Rate</span></li>
                <li><span>Personal Training</span></li>
              </ol>
          
              <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>

        <div class="row">

          <!-- start: page -->
          <div class="row">
          
            <!-- <div class="col-md-6 col-lg-12 col-xl-6"> -->
            <div class="">
              <div class="row">
              <!--  <div class="col-md-12 col-lg-4 col-xl-4"> -->
                
                
              

              </div>
            </div>
          </div>

          

          <div class="row">
            
            <div class="col-xl-12">
                <section class="panel">

                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="personal_training.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">List of Personal Training Rate</h2>
                  </header>

                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                         <colgroup>
                                  
                                            <col width="14%">
                                            <col width="1%">
                                            <col width="5%">
                                            <col width="5%">
                                            <col width="5%">
                                            <col width="2%">
                                            <col width="5%">
                    
                                             <col width="5%">
                                        
                                          </colgroup>
                                          <thead>
                                            <tr>
                                              <th class="text-center">Action</th>
                                              <th class="text-center">#</th>
                                              <th class="text-center">Training Class Name</th>
                                              <th class="text-center"> Name</th>
                                              <th class="text-center">Session</th>
                                              <th class="text-center" >Duration</th>
                          
                                              <th class="text-center" >Description</th>
                                              <th class="text-center">Rate</th>

                                            </tr>
                                          </thead>

                                           <tbody>
                        
                                               <?php 
                                            $i = 1;
                                            // $query = "SELECT * FROM `packages`";

                                            $query = "SELECT    training_classes_personal_training_rates.training_class_id,
                                                                training_classes_personal_training_rates.package_id,
                                                                training_classes_personal_training_rates.package_name, 
                                                                training_classes_personal_training_rates.description,
                                                                training_classes_personal_training_rates.day,
                                                                training_classes_personal_training_rates.week,
                                                                training_classes_personal_training_rates.month, 
                                                                training_classes_personal_training_rates.session,
                                                                training_classes_personal_training_rates.amount,
                                                                 training_classes.training_classes_name          
                                                          FROM 
                                                          training_classes_personal_training_rates
                                                          INNER JOIN training_classes  ON training_classes_personal_training_rates.training_class_id = training_classes.training_class_id";


                                                    $result = mysqli_query($con, $query);
                                                    $number=1;


                                            while ($row = mysqli_fetch_array($result)):
                                            ?>

                                           <tr>
                                                <td class="center">

                                                  <a type="button" class="btn btn-sm btn-success view" id="<?php echo $row['id'];?>">View</a>

                                                  <a type="button" class="btn btn-sm btn-info" href="edit_package.php?id=<?php echo $row['training_class_id'];?>">Edit</a>


                                                  <a type="button" class="btn btn-sm btn-danger delete" id="<?php echo $row['id'];?>">Delete</a>


                                            </td>


                                              <td class="text-center"><?php echo $i++ ?></td>
                                              <td class="text-center">
                                                 <p><?php echo $row['training_classes_name'] ?></p>
                                                 
                                              </td>
                                              <td class="text-center">
                                                 <p><?php echo $row['package_name'] ?></p>
                                                 
                                              </td>
                                              <td class="text-center">
                                                <?php if (empty($row['session'])){ ?>

                                                    -----

                                                <?php }else{ ?>

                                                 <p><?php echo ucwords($row['session']. ' Session') ?></p>

                                                 <?php } ?>
                                              </td>

                                               <td class="text-center">
                                                 <!-- Month -->
                                                 <?php if(!empty($row['day'])){ ?>    
                                                    <?php echo $row['day']; ?> Day/s  
                                                 <?php }else if(!empty($row['week'])) {  ?>
                                                    <?php echo $row['week']; ?> Week/s  
                                                 <?php }else if(!empty($row['month'])) {  ?>
                                                      <?php echo $row['month']; ?> Month/s
                                                 <?php }else{ ?>
                                                      -----
                                                 <?php  } ?>   

                                       
                                                 
                                              </td>

                                   

                                              <td class="text-center">
                                                 <p><?php echo ucwords(substr($row['description'], 0, 15)) ?></p>
                                      
                                                 
                                              </td>


                                              <td class="text-center">
                                                 <p><?php echo number_format($row['amount'],2)  ?></p>
                                                 
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
          
          <!-- end: page -->
        </section>
      </div>

      <?php include('calendar.php'); ?>


    </section>


    <!--===============  Start  View modal =============== -->
        <div class="modal fade" id="viewModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">View</h4>
                </div>
                 <div class="modal-body">
              
          <?php 

            // $id = $_POST['id'];;
            // $query = "SELECT * FROM members WHERE id = $id";
            // $result = mysqli_query($con, $query);
            // $row = mysqli_fetch_assoc($result);
           ?>
            <form method="POST"  autocomplete="off" enctype="multipart/form-data">

              <div class="row form-group">

                <div class="col-md-4">
                  <label class="control-label">Training Classes Name</label>
               
                     <!-- <p class="form-control-static" readonly><?php echo isset($view_id) ? $view_id:'' ?></p> -->
                </div>

                 <div class="col-md-4">
                  <label class="control-label">Description</label>
                  <textarea type="text" name="view_description" id="view_description" class="form-control"  readonly=""><?php echo isset($view_description) ? $view_description:'' ?></textarea>
                </div>

                <p class="form-control-static" readonly><?php echo isset($view_id) ? $view_id:'' ?></p>

                  <input type="text"  id="view_id" class="form-control" value="<?php echo isset($view_id) ? $view_id:'' ?>" >
             </div>
                  
                </div>
                    <div class="modal-footer">
                       
             <!--           <button type="button"  class="btn btn-primary editClass">Edit</button> -->
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      
                    </div>

              </form>

              </div>
             
              </div>
            </div>
        </div>
<!--==================End View modal =======================-->


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

      $(document).on('click', '.approve', function(){  
        
        Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Approve'            
        }).then((result) => {
            if (result.value) {

              var member_id = $(this).attr("id");  

              $.ajax({  
                  url:'approve_member_action.php',
                  type:'post',
                  data:{
                      member_id:member_id,
                  },  
                  success:function(data, status){ 

                    if (status == 'success') {
                      Swal.fire({
                    icon: 'success',
                    title: 'Successfully Approved!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                    }
                  }  
             }); 

            }
        })     
      }); 




   
</script>


<?php include('footer.php'); ?>