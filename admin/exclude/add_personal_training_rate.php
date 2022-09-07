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
                                      <li class="nav-parent nav-expanded nav-active">
                                        <a>Add Rate</a>
                                        <ul class="nav nav-children">
                                          <li>
                                            <a href="add_rate.php">Add Walk In Rate</a>
                                          </li>
                                          <li>
                                            <a href="add_package.php">Add Package Rate</a>
                                          </li>
                                          <li class="nav-active">
                                            <a href="add_personal_training_rate.php">Add Personal Training Rate</a>
                                          </li>
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
                                          <li>
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
                                      <!-- <li>
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

                                <!--   <li class="nav-parent">
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


                                 <!--  <li class="nav-parent">
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
                                  </li> -->

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
                                <li><span>Add Rate</span></li>
                                <li><span>Add Personal Training Rate</span></li>
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
                            <!--    <div class="col-md-12 col-lg-4 col-xl-4"> -->
                                
                                
                            

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        

                        <div class="col-xl-12">

                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="fa fa-caret-down"></a>
                                            <!-- <a href="#" class="fa fa-times"></a> -->
                                        </div>
                            
                                        <h2 class="panel-title"><a href="members.php"></a>Add Personal Training Rate</h2>
                                    </header>
                                    <div class="panel-body">
                                        <form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">

                                            <p id="errorMs"></p>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label" >Training Class</label>
                                                <div class="col-md-6">
                                                    <select class="form-control"  id="training_class_id" name="training_class_id" required="required" class="custom-select select2" id="">
                                                      
                                                      <?php
                                                        $query = $con->query("SELECT * FROM training_classes order by training_classes_name desc");
                                                        while($row= $query->fetch_assoc()):
                                                      ?>
                                                      <option value="<?php echo $row['training_class_id']; ?>" <?php echo isset($training_classes) && $training_classes == $row['training_classes_name'] ? 'selected' : '' ?>><?php echo ucwords($row['training_classes_name']) ?></option>
                                                      <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-md-3 control-label"> Name</label>
                                                <div class="col-md-6">

                                                     <input type="text" class="form-control"  maxlength="50" id="package_name" name="package_name"  placeholder="Input here" ><?php echo isset($package_name) ? $package_name:'' ?>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Description</label>
                                                <div class="col-md-6">

                                                    <textarea type="text"  class="form-control"  id="description" name="description"  maxlength="300" placeholder="Optional" ><?php echo isset($description) ? $description:'' ?></textarea>
                                                    <!--  <input type="text" class="form-control"   id="description" name="description"  placeholder="Input here" ><?php echo isset($description) ? $description:'' ?>
 -->
                                                </div>
                                            </div>

                                            
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Number of</label>
                                                <div class="col-md-6">

                                                     <input type="number" class="form-control"  maxlength="50" id="number" name="number"  placeholder="Input here" ><?php echo isset($number) ? $number:'' ?>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label" for="gender">Day/Week/Month</label>
                                                <div class="col-md-6">
                                                    <select type="text" name="day_week_month" required="" class="form-control dropdown " id="day_week_month">
                                                            <!-- <option>Please select</option> -->
                                                            <option <?php echo isset($day_week_month) && $day_week_month == 'Day/s' ? 'selected' : '' ?>>Day/s</option>
                                                            <option <?php echo isset($day_week_month) && $day_week_month == 'Week/s' ? 'selected' : '' ?>>Week/s</option>
                                                            <option <?php echo isset($day_week_month) && $day_week_month == 'Month/s' ? 'selected' : '' ?>>Month/s</option>
                                                    </select>
                                                </div>
                                            </div>

                                          

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Session</label>
                                                <div class="col-md-6">

                                                     <input type="number" class="form-control"  maxlength="50" id="session" name="session"  placeholder="Input session here" ><?php echo isset($session) ? $session:'' ?>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Amount</label>
                                                <div class="col-md-6">

                                                     <input type="number" class="form-control"  maxlength="50" id="amount" name="amount"  placeholder="Input amount here" ><?php echo isset($amount) ? $amount:'' ?>

                                                </div>
                                            </div>
                                           
                                            <hr class="separator" />

                                            <button type="button"  id="add" name="add" class="mb-xs mt-xs mr-xs btn btn-success add">Save</button>

                                            <a href="add_personal_training_rate.php"><button type="button"  id="reset" name="reset" class="mb-xs mt-xs mr-xs btn btn-primary reset">Reset</button></a>

                                        </form>
                                    </div>
                                </section>

                        </div>

                        
                    </div>
                    
                    <!-- end: page -->
                </section>

            </div>
        
        <?php include('calendar.php'); ?>


        </section>

<script>

 $(document).ready(function(){  

      $('.select2').select2({
    placeholder:'Please Select Here',
    })



      $(document).on('click', '.add', function(){  

        var training_class_id = $('#training_class_id').val();
        var package_name = $('#package_name').val();
        var description = $('#description').val();

        var number = $('#number').val();

        var day_week_month = $('#day_week_month').val();
        var session = $('#session').val();
        var amount = $('#amount').val();
        var add = $('#add').val();

        if (training_class_id == '' || number == '' || day_week_month == ''  || session == ''
            || amount == '' ) {
            
            Swal.fire({
                    icon: 'warning',
                    title: 'There is an empty field!',
                    text: 'Please check the missing field!',
                    //showConfirmButton: false,
                    //timer: 1500
            })  

        }else{

        Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {
                
                 // Start ajax
                $.ajax({  
                    url:'ajax.php?action=insert_new_personal_training_rate_action',
                    type:'post',
                    data:{
                        training_class_id:training_class_id,
                        package_name:package_name,
                        description:description,
                        number:number,
                        day_week_month:day_week_month,
                        session:session,
                        amount:amount,
                        add:add
                    },
                    success:function(data, status){ 

                        console.log(data);

                        console.log(status);

                        if (data == 1) {
                            Swal.fire({
                              icon: 'success',
                              title: 'Added Successfully!',
                              showConfirmButton: false,
                              timer: 1500
                            }).then((result) => {

                                 // if (result.value) {
                                     window.location.href = 'add_personal_training_rate.php';
                                 // }
                                    
                            })           
                        }else{

                            Swal.fire({
                              icon: 'error',
                              title: 'Add Failed!'
                            })
                        }
                    }, error: function(ts) { alert(ts.responseText) }  
               }); 
                // End ajax
            }

        })    

        } 
        //End else
      }); 




 });  



 
</script>

<?php include('footer.php'); ?>