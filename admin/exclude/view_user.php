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
                                  <i class="fa fa-home" aria-hidden="true"></i>
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
                                  <i class="fa fa-money" aria-hidden="true"></i>
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
                                  <i class="fa fa-group" aria-hidden="true"></i>
                                  <span>Members</span>
                                </a>
                                <ul class="nav nav-children ">
                                  <!-- <li>
                                    <a href="add_member.php">
                                      Add Member
                                    </a>
                                  </li> -->
                                  <li class="">
                                    <a href="members.php">
                                      List of Members
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <!-- <li class="nav-parent ">
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
                              </li> -->

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-qrcode" aria-hidden="true"></i>
                                  <span>Attendance</span>
                                </a>
                                <ul class="nav nav-children ">
                                  
                                  <li>
                                    <a target='_blank' href="attendance_qrcode.php">
                                      Attendance QR Code
                                    </a>
                                  </li>

                                  <li class="">
                                    <a href="attendance_today.php">
                                      Attendance Today
                                    </a>
                                  </li>
                                  
                                  <li>
                                    <a href="attendance.php">
                                      List of Attendance
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-folder" aria-hidden="true"></i>
                                  <span>Schedule</span>
                                </a>
                                <ul class="nav nav-children ">
                                <!--  <li>
                                    <a href="add_member.php">
                                      Add Member
                                    </a>
                                  </li> -->
                                  <li class="">
                                    <a href="schedules.php">
                                      List of Schedules
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>


                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-child" aria-hidden="true"></i>
                                  <span>Fitness Goals</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li class="">
                                    <a href="fitness_goals.php">
                                      List of Fitness Goals
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-level-up" aria-hidden="true"></i>
                                  <span>Rates</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li class="nav-parent ">
                                    <a>Add Rate</a>
                                    <ul class="nav nav-children">
                                      <li class="">
                                        <a href="add_rate.php">Add Walk In Rate</a>
                                      </li>
                                      <li>
                                        <a href="add_package.php">Add Package Rate</a>
                                      </li>
                                      <!-- <li>
                                        <a href="add_personal_training_rate.php">Add Personal Training Rate</a>
                                      </li> -->
                                    </ul>
                                  </li>
                                  <li class="nav-parent ">
                                    <a>List of Rate</a>
                                    <ul class="nav nav-children">
                                      <li class="">
                                        <a href="walk_in.php">Walk in</a>
                                      </li>
                                      <li class="">
                                        <a href="packages.php">Packages</a>
                                      </li>
                                      <!-- <li>
                                        <a href="personal_training.php">Personal Training </a>
                                      </li> -->
                                    </ul>
                                  </li>
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                  <span>Trainors</span>
                                </a>
                                <ul class="nav nav-children">
                                <!--   <li class="">
                                    <a href="add_trainor.php">
                                      Add Trainor
                                    </a>
                                  </li> -->
                                  <li class="">
                                    <a href="trainors.php">
                                      List of Trainors
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-play" aria-hidden="true"></i>
                                  <span>Training Classes</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li class="">
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
                                  <i class="fa fa-heart" aria-hidden="true"></i>
                                  <span>Health Status</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li class="">
                                    <a href="health_status.php">
                                      List of Members
                                    </a>
                                  </li>
                                  
                                </ul>
                              </li>

                              <!-- <li class="nav-parent">
                                <a>
                                  <i class="fa fa-align-left" aria-hidden="true"></i>
                                  <span>Report</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a>List of Members</a>
                                  </li>
                                  
                                </ul>
                              </li> -->

                             <!--  <li class="">
                                <a href="#">
                                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                  <span>Report</span>
                                </a>
                              </li>


                              <li class="nav-parent">
                                <a>
                                  <i class="fa fa-table" aria-hidden="true"></i>
                                  <span>Classes Time Table</span>
                                </a>
                                <ul class="nav nav-children">
                                  <li>
                                    <a href="#">Add Schedule</a>
                                  </li>
                                  <li>
                                    <a href="#">Classes Timetabke</a>
                                  </li>
                                  
                                </ul>
                              </li> -->

                              <li class="nav-parent nav-expanded nav-active">
                                <a>
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                  <span>Users</span>
                                </a>
                                <ul class="nav nav-children">
                                
                                  <li class="nav-active">
                                    <a href="users.php">
                                      List of Users
                                    </a>
                                  </li>

                                </ul>
                              </li>

                              <li class="nav-parent ">
                                <a>
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                  <span>Admin Account</span>
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
                                    <i class="fa fa-heart" aria-hidden="true"></i>
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
            <h2>Trainors</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
               <!--  <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Trainors</span></li>
                <li><span>List of Trainors</span></li>
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

           <?php 
                 $id = $_GET['id'];
                 $i = 1;
                 $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND type = 'trainor' AND id = $id ORDER BY concat(lastname,', ',firstname) desc ";
                 $result = mysqli_query($con, $query);
                 $number=1;
                 $row_trainor = mysqli_fetch_array($result);

                 //if (!empty( $row_trainor['trainors_classes'])) {
                     $classes_arr = explode(',',$row_trainor['trainors_classes']);
                     // $classes_arr = !empty( $row_trainor['trainors_classes']) ? explode(',',$row_trainor['trainors_classes']) : '';
                 //}

              ?>

            <div class="row">
            
            <!--             First card -->
                    <div class="col-md-6">
                        <section class="panel">
                          <header class="panel-heading">
                            <div class="panel-actions">
                              <a href="#" class="fa fa-caret-down"></a>
                              <!-- <a href="#" class="fa fa-times"></a> -->
                            </div>
                      
                            <h2 class="panel-title"><a href="users.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2>
                          </header>
                          <div class="panel-body">
                            <form class="form-horizontal form-bordered" method="get">


                                                  <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Name</label>
                        <div class="col-md-6">
                     <!--      <input type="text" value="<?php echo $row_trainor['name'] ?>" id="inputReadOnly" class="form-control" readonly="readonly"> -->
                            <h5><?php echo $row_trainor['name'] ?></h5>
                        </div>

                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Age</label>
                        <div class="col-md-6">
                          <!-- <input type="text" value="<?php echo $row_trainor['age'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                          <h5><?php echo $row_trainor['age'] ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Gender</label>
                        <div class="col-md-6">
                         <!--  <input type="text" value="<?php echo $row_trainor['gender'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                         <h5><?php echo $row_trainor['gender'] ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Date of Birth</label>
                        <div class="col-md-6">
                        <!--   <input type="text" value="<?php echo $row_trainor['date_of_birth'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                        <h5><?php echo $row_trainor['date_of_birth'] ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Height</label>
                        <div class="col-md-6">
                         <!--  <input type="text" value="<?php echo $row_trainor['height'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                         <h5><?php echo $row_trainor['height'] ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Weight</label>
                        <div class="col-md-6">
                         <!--  <input type="text" value="<?php echo $row_trainor['weight'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                         <h5><?php echo $row_trainor['weight'] ?></h5>
                        </div>
                      </div>

                        </section>
                    </div>
                   <!--  First card -->

             <!-- Second card -->
             <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <!-- <a href="#" class="fa fa-times"></a> -->
                    </div>
              
                   <!--  <h2 class="panel-title"><a href="members.php" class="fa fa-chevron-left">&nbsp; &nbsp;</a>View Info</h2> -->
                  </header>
                  <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="get">


                              <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Address</label>
                        <div class="col-md-6">
                       <!--    <input type="text" value="<?php echo $row_trainor['address'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                       <h5><?php echo $row_trainor['address'] ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Phone Number</label>
                        <div class="col-md-6">
                         <!--  <input type="text" value="<?php echo $row_trainor['contact'] ?>"  id="inputReadOnly" class="form-control" readonly="readonly"> -->
                         <h5><?php echo $row_trainor['contact'] ?></h5>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Email</label>
                        <div class="col-md-6">
                        <!--   <input type="text" value="<?php echo $row_trainor['email'] ?>" id="inputReadOnly" class="form-control" readonly="readonly"> -->
                        <h5><?php echo $row_trainor['email'] ?></h5>
                        </div>
                      </div>

                    <!--   <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Trainor Classes</label>
                        <div class="col-md-6">
                          <?php
                                $query = $con->query("SELECT * FROM trainors WHERE id = '$id'");

                              $row= mysqli_fetch_assoc($query);

                            ?>
                          <textarea id="trainor" name="trainor" class="form-control" readonly="readonly"><?php echo ucwords($row['trainors_classes']) ?></textarea>


                        </div>
                      </div>
                  
                      <div class="form-group">

                      <label class="col-md-3 control-label" for="inputReadOnly">Trainors' Client/s</label>
                        <div class="col-md-6">
                           <select id="trainor" name="trainor" required="required" multiple="" class="form-control" >

                            <?php
                                $query = $con->query("SELECT *,concat(lastname,', ',firstname) as name from trainors WHERE status ='Approved' order by concat(lastname,', ',firstname) desc ");

                                $query_2 = $con->query("SELECT * FROM members WHERE status = 'Approved'");
                                                    
                                $row_2 = mysqli_fetch_assoc($query_2);


                              while($row= mysqli_fetch_assoc($query)):

                            ?>
                          <option value="<?php echo $row['trainor_id'] ?>" <?php echo isset($trainor) && $row_2['trainor'] == $row['trainor_id'] ? 'selected': '' ?>><?php echo ucwords($row['name']) ?></option>
                            <?php endwhile; ?>

                         </select>
                        </div>
                    </div> -->

        
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Rate</label>
                        <div class="col-md-6">
                        <!--   <input type="text" value="<?php echo $row_trainor['rate'] ?>" id="inputReadOnly" class="form-control" readonly="readonly"> -->
                            <h5><?php echo $row_trainor['email'] ?></h5>
                        </div>
                      </div>

                    <!--   <div class="form-group">
                        <label class="col-md-3 control-label" for="inputReadOnly">Trainor's Training Classes</label>
                        <div class="col-md-6">
                            <h5><?php echo $row_trainor['trainors_classes'] ?></h5>
                        </div>
                      </div>
 -->
                       <div class="form-group">
                          <label class="col-md-3 control-label">Trainor's Classes</label>
                          <div class="col-md-6">
                          <select name="trainors_classes[]" id="trainors_classes" class="form-control select2" multiple="multiple" readonly>

                            <?php 
                            $query = $con->query("SELECT * FROM training_classes order by training_classes_name asc");

                             $classes = array();

                            while($row= $query->fetch_assoc()){
                                array_push($classes, $row['training_classes_name']);
                            }

                            $size = count($classes); 

                            //$dow = array("Body Building","Kick Boxing","Boxing");

                            for($i = 0; $i < $size; $i++):
                            ?>
                            <option value="<?php echo $i ?>" <?php echo !empty($classes_arr) && in_array($i,$classes_arr) ? 'selected' : '' ?>><?php echo $classes[$i] ?></option>
                          <?php endfor; ?>
                          </select>
                        </div>
                       </div>   

                        <div class="form-group">
                          <label class="col-md-3 control-label">Image</label>
                          <div class="col-md-6">

                            <img  src="../assets/images/team/<?php echo $row_trainor['image']; ?>"  class="img-responsive img-rounded img-thumbnail" style="height: 20vh;">

                          </div>
                      </div>



                    </form>
                  </div>
                </section>
            </div>
            <!-- End second card -->           
    </div>


     

             <!--  Start Trainor's Client -->
        <div class="row">
            <div class="col-xl-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <!-- <a href="#" class="fa fa-times"></a> -->
                    </div>
              
                    <h2 class="panel-title">Trainor's Client/s</h2>
                  </header>
                  <!-- Start panel body -->
                  <div class="panel-body">
                    
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">

                          <colgroup>
                                                  <col width="5%">
                                                  <col width="5%">
                                                  <col width="5%">
                                                  <!-- <col width="5%">
                                                  <col width="5%"> -->
                           
                                                </colgroup>

                                              <thead style="">
                                                  <tr>
                                                  <!--     <th scope="col" class="center">Action</th> -->
                                                      <th scope="col"  class="center" >#</th>
                                                      <th scope="col" class="center">Member ID</th>
                                                      <th scope="col" class="center">Name</th>
                                                   <!--    <th scope="col" class="center">Status</th> -->
                                                  </tr>
                                              </thead>
                                             <tbody>
                          
                                                 <?php 
                                                  $i = 1;

                                                  // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                                                  $user_id = $row_trainor['user_id'];

                                                  $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND trainor = '$user_id' ORDER BY id DESC";

                                                  $result = mysqli_query($con, $member);
                                                  
                                                  while ($row = mysqli_fetch_array($result)):
                                                 ?>

                                              <tr>
                                                  <!-- <th scope="row"><b></b></th> -->
                                               <!--    <td class="center">


                                                      
                                                     <a type="button" class="btn btn-sm btn-success" href="view_trainor.php?id=<?php echo $row['id'];?>">Assign</a>

   

                                                      <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $row['id'] ?>" style="">Remove</button>

                                                  </td> -->
                                                  <!-- <td>
                                                      <div class="tm-status-circle pending">
                                                      </div>Pending
                                                  </td> -->
                                                  <td class="center"><?php echo $i++ ?></td>
                                                    
                                                     <td class="center">
                                                       <?php echo $row['member_id'] ?>
                                                       
                                                    </td>

                                                    <td class="center">
                                                       <?php echo $row['name'] ?>
                                                       
                                                    </td>

                                                   <!--  <td class="center">
                                                       <span class="label label-success" style="font-size: 12px;">Assigned</span>
                                                       
                                                    </td> -->

                                              </tr>
                                               <?php endwhile; ?>
                                          </tbody>

                        </table>
                      </div>
                    </div>
                    
                  </div>
                  <!-- End Panel Body -->
                </section>
            </div>            
          </div>
           <!--  End Trainor's Client -->

          
          <!-- end: page -->
        </section>

      </div>
    
    <?php include('calendar.php'); ?>


    </section>



<?php include('footer.php'); ?>

<style type="text/css">

/* Search field */
.select2-search input { color: red!important; background-color: red!important; font-size: 2rem;}
    

</style>
<script type="text/javascript">

  $(document).ready(function(){

  $('.select2').select2({
    placeholder:'',
    })


// $('.select2').select2("readonly", true);


  })



</script>