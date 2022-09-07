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

                                    <li class="">
                                        <a href="index.php">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
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
                                        <!--    <li>
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

                                   <li class="nav-parent nav-expanded nav-active">
                                        <a>
                                            <i class="fa fa-align-left" aria-hidden="true"></i>
                                            <span>Rate</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="">
                                                <a href="add_rate.php">
                                                    Add Rate
                                                </a>
                                            </li>

                                            <li class="">
                                                <a href="add_package.php">
                                                    Add Package
                                                </a>
                                            </li>
                                            
                                            <!-- <li>
                                                <a href="add_package.php">
                                                     Add Package Rate
                                                </a>
                                            </li> -->

                                          <!--   <li class="">
                                                <a href="add_personal_training_rate.php">
                                                    Add Personal Training Rate
                                                </a>
                                            </li> -->

                                            <li class="nav-active">
                                                <a href="packages.php">
                                                    List of Packages
                                                </a>
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
                                                <a href="add_rate.php">
                                                    Add Rate
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
                                <!--      End if else -->
                                </ul>
                            </nav>
                
                            <hr class="separator" />
                

                
                        
                        </div>
                
                    </div>
                
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Rate</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <!-- <li>
                                    <a href="index.php">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li> -->
                                <li><span>Rate</span></li>
                                <li><span>Add Package</span></li>
                            </ol>
                    
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                        </div>

                    </header>

                <div class="row">


                     <?php 
                   
                      //if(isset($_GET['id'])){
                            $training_class_id = $_GET['id'];
                            $query = "SELECT training_classes.id, 
                                                             training_classes.training_class_id, 
                                                             training_classes.training_classes_name, 
                                                             training_classes.description,
                                                             training_classes_rate.student_amount,
                                                             training_classes_rate.non_student_amount,
                                                             training_classes_packages_rates.month,
                                                             training_classes_packages_rates.session,
                                                             training_classes_packages_rates.package_student_amount,
                                                             training_classes_packages_rates.package_non_student_amount
                                                      FROM 
                                                      training_classes
                                                      INNER JOIN training_classes_rate  ON training_classes.training_class_id = training_classes_rate.training_class_id
                                                      INNER JOIN training_classes_packages_rates  ON training_classes.training_class_id = training_classes_packages_rates.training_class_id WHERE training_classes.training_class_id = '$training_class_id' ";

                            $result = mysqli_query($con, $query);
                            $result_2 = mysqli_fetch_array($result);
                            foreach($result_2 as $store =>$catch){
                                $$store = $catch;
                            }
                        //}
                    ?>

                    <div class="row">
                        <div class="col-xl-12">

                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="fa fa-caret-down"></a>
                                            <!-- <a href="#" class="fa fa-times"></a> -->
                                        </div>
                            
                                        <h2 class="panel-title"><a href="members.php"></a>Add Package</h2>
                                    </header>
                                    <div class="panel-body">
                                        <form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">

                                            <p id="errorMs"></p>


                                            <input type="text" class="form-control"  maxlength="50" id="training_class_id" name="training_class_id"  value=" <?php echo isset($training_class_id) ? $training_class_id:'' ?>"placeholder="Input training classes name here" >

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Training Class</label>
                                                <div class="col-md-6">

                                                     <input type="text" class="form-control"  maxlength="50" id="training_classes_name" name="training_classes_name"  value=" <?php echo isset($training_classes_name) ? $training_classes_name:'' ?>"placeholder="Input training classes name here" >

                                                </div>
                                            </div>


                                            <hr class="separator" style="background-color: #34495E;" />

                                            <h2 class="panel-title">Walk in Rates</h2>
                                           <!--  <p class="panel-subtitle">
                                                Student
                                            </p> -->


                                           <div class="form-group">
                                                <label class="col-md-3 control-label">Student Amount</label>
                                                <div class="col-md-6">

                                                     <input type="text" class="form-control"  maxlength="50" id="student_amount" name="student_amount"  value=" <?php echo isset($student_amount) ? $student_amount:'' ?>"placeholder="Input amount here" >

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Non-Student Amount</label>
                                                <div class="col-md-6">

                                                     <input type="text" class="form-control"  maxlength="50" id="non_student_amount" name="non_student_amount"  value=" <?php echo isset($non_student_amount) ? $non_student_amount:'' ?>"placeholder="Input amount here" >

                                                </div>
                                            </div>

                                            <hr class="separator" style="background-color: #34495E;" />

                                           <div class="form-group">
                                                <label class="col-md-3 control-label">Month</label>
                                                <div class="col-md-6">

                                                    <input type="text" class="form-control"  maxlength="50" id="month" name="month"  value=" <?php echo isset($month) ? $month:'' ?>"placeholder="Input training classes name here" >

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Session</label>
                                                <div class="col-md-6">

                                                   <input type="text" class="form-control"  maxlength="50" id="session" name="session"  value=" <?php echo isset($session) ? $session:'' ?>"placeholder="Input session name here" >

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Student Amount</label>
                                                <div class="col-md-6">

                                                 <input type="text" class="form-control"  maxlength="50" id="package_student_amount" name="package_student_amount"  value=" <?php echo isset($package_student_amount) ? $package_student_amount:'' ?>"placeholder="Input package student amount here" >

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Non-Student Amount</label>
                                                <div class="col-md-6">

                                                    <input type="text" class="form-control"  maxlength="50" id="package_non_student_amount" name="package_non_student_amount"  value=" <?php echo isset($package_non_student_amount) ? $package_non_student_amount:'' ?>"placeholder="Input package non-student amount" >

                                                </div>
                                            </div>
                                           
                                            <hr class="separator" />

                                            <button type="button"  id="add" name="add" class="mb-xs mt-xs mr-xs btn btn-success add">Add Package</button>

                                            <a href="add_package.php"><button type="button"  id="reset" name="reset" class="mb-xs mt-xs mr-xs btn btn-primary reset">Reset</button></a>

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
        var training_classes_name = $('#training_classes_name').val();
        var student_amount = $('#student_amount').val();
        var non_student_amount = $('#non_student_amount').val();
        var month = $('#month').val();
        var session = $('#session').val();
         var package_student_amount = $('#package_student_amount').val();
        var package_non_student_amount = $('#package_non_student_amount').val();

        var add = $('#add').val();

        if (training_classes_name == '' || student_amount == ''  || non_student_amount == ''
            || month == '' || session == ''
            || package_student_amount == '' || package_non_student_amount == '') {
            
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
                    url:'ajax.php?action=edit_package_rate_action',
                    type:'post',
                    data:{
                        training_class_id,training_class_id,
                        training_classes_name:training_classes_name,
                        student_amount:student_amount,
                        non_student_amount:non_student_amount,
                        month:month,
                        session:session,
                        package_student_amount:package_student_amount,
                        package_non_student_amount:package_non_student_amount,
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
                                     window.location.href = 'edit_package.php';
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