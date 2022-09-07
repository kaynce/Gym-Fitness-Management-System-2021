<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_r = "nav-expanded";
  $nav_active_dashboard_r   = "nav-active";
  $nav_dashboard_expanded_a_r = "nav-expanded";
  $nav_active_dashboard_a_r   = "nav-active";
  $nav_active_a_p   = "nav-active";


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
                            
                                        <h2 class="panel-title"><a href="members"></a>Add Package</h2>
                                    </header>
                                    <div class="panel-body">
                                        <form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">

                                            <p id="errorMs"></p>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label" >Training Class</label>
                                                <div class="col-md-6">
                                                    <select class="form-control"  id="training_class_id" name="training_class_id" required="required" class="custom-select select2" id="">
                                                        <option>Please select</option>
                                                      <?php
                                                        $query = $con->query("SELECT * FROM physical_fitness order by physical_fitness_name asc");
                                                        while($row= $query->fetch_assoc()):
                                                      ?>
                                                      <option value="<?php echo $row['physical_fitness_id']; ?>" <?php echo isset($physical_fitness) && $physical_fitness == $row['physical_fitness_name'] ? 'selected' : '' ?>><?php echo ucwords($row['physical_fitness_name']) ?></option>
                                                      <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Package Name</label>
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

                                                     <input type="text" class="form-control"  maxlength="2" id="number" name="number"  placeholder="Input here" ><?php echo isset($number) ? $number:'' ?>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label" for="gender">Day/Week/Month</label>
                                                <div class="col-md-6">
                                                    <select type="text" name="day_week_month" required="" class="form-control dropdown " id="day_week_month">
                                                            <option></option>
                                                            <option <?php echo isset($day_week_month) && $day_week_month == 'Day/s' ? 'selected' : '' ?>>Day/s</option>
                                                            <option <?php echo isset($day_week_month) && $day_week_month == 'Week/s' ? 'selected' : '' ?>>Week/s</option>
                                                            <option <?php echo isset($day_week_month) && $day_week_month == 'Month/s' ? 'selected' : '' ?>>Month/s</option>
                                                    </select>
                                                </div>
                                            </div>

                                          

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Session</label>
                                                <div class="col-md-6">

                                                     <input type="text" class="form-control"  maxlength="2" id="session" name="session"  placeholder="Input '0' for unlimited session " ><?php echo isset($session) ? $session:'' ?>

                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Student Amount</label>
                                                <div class="col-md-6">

                                                     <input type="number" class="form-control"  maxlength="50" id="student_amount" name="student_amount"  placeholder="Input amount here" ><?php echo isset($student_amount) ? $student_amount:'' ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Non-Student Amount</label>
                                                <div class="col-md-6">

                                                     <input type="number" class="form-control"  maxlength="50" id="non_student_amount" name="non_student_amount"  placeholder="Input amount here" ><?php echo isset($non_student_amount) ? $non_student_amount:'' ?>

                                                </div>
                                            </div>
                                           
                                            <hr class="separator" />

                                            <button type="button"  id="add" name="add" class="mb-xs mt-xs mr-xs btn btn-success add">Save</button>

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

    // Restricts input for the given textbox to the given inputFilter function.
    function setInputFilter(textbox, inputFilter) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
          if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          } else {
            this.value = "";
          }
        });
      });
    }

    setInputFilter(document.getElementById("session"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

     setInputFilter(document.getElementById("number"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

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
        var student_amount = $('#student_amount').val();
        var non_student_amount = $('#non_student_amount').val();
        var add = $('#add').val();

        // if (training_class_id == '' || number == '' || day_week_month == ''  || session == ''
        //     || student_amount == '' || non_student_amount == '') {

        if (training_class_id == ''|| session == ''
            || student_amount == '' || non_student_amount == '') {
            
            Swal.fire({
                    icon: 'warning',
                    title: 'Only the Number of & Day/Week/Month are allowed to be empty',
                    text: 'Please check the missing field!',
                    //showConfirmButton: false,
                    //timer: 1500
            })  

        }else{

            // Swal.fire({
            //    title: 'Are you sure?',
            //     text: "",
            //     icon: 'question',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes'            
            // }).then((result) => {
            //     if (result.value) {
                    
                     // Start ajax
                    $.ajax({  
                        url:'ajax.php?action=insert_new_package_rate_action',
                        type:'post',
                        data:{
                            training_class_id:training_class_id,
                            package_name:package_name,
                            description:description,
                            number:number,
                            day_week_month:day_week_month,
                            session:session,
                            student_amount:student_amount,
                            non_student_amount:non_student_amount,
                            add:add
                        },
                        cache: false, 
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
                                         window.location.href = 'add_package';
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
                //}
                // End of Swal if
            //})    
            //End Swal

        } 
        //End else
      }); 




 });  



 
</script>

<?php include('footer.php'); ?>