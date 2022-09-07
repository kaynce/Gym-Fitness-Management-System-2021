<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_r = "nav-expanded";
  $nav_active_dashboard_r   = "nav-active";
  $nav_dashboard_expanded_a_r = "nav-expanded";
  $nav_active_dashboard_a_r   = "nav-active";
  $nav_active_a_r   = "nav-active";

 ?>
<?php include('head.php'); ?>

            <div class="inner-wrapper">
                <!-- start: sidebar -->
               <?php require_once('sidebar.php'); ?>
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
                                <li><span>Add Rate</span></li>
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
                            
                                        <h2 class="panel-title"><a href="members.php"></a>Add Rate</h2>
                                    </header>
                                    <div class="panel-body">
                                        <form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">

                                            <p id="errorMs"></p>

                                           
                                             <div class="form-group">
                                                <label class="col-md-3 control-label" >Physical Fitness</label>
                                                <div class="col-md-6">
                                                    <select class="form-control"  id="physical_fitness_id" name="physical_fitness_id" required="required" class="custom-select select2" id="">
                                                        <option>Please select</option>
                                                      <?php
                                                        $query = $con->query("SELECT * FROM physical_fitness ORDER BY id asc");
                                             
                                                        while($row= $query->fetch_assoc()):
                                                      ?>
                                                      <option value="<?php echo $row['physical_fitness_id']; ?>" ><?php echo ucwords($row['physical_fitness_name']) ?></option>
                                                      <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>

                                             <hr class="separator" />

                                            <h2 class="panel-title">Walk in Rates</h2>
                                           <!--  <p class="panel-subtitle">
                                                Student
                                            </p> -->


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

                                                <button type="button"  id="add" name="add" class="mb-xs mt-xs mr-xs btn btn-success add">Add Rate</button>

                                                <a href="add_rate.php"><button type="button"  id="reset" name="reset" class="mb-xs mt-xs mr-xs btn btn-primary reset">Reset</button></a>



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

        var physical_fitness_id = $('#physical_fitness_id').val();
        var student_amount = $('#student_amount').val();
        var non_student_amount = $('#non_student_amount').val();
        var add = $('#add').val();

        if (physical_fitness_id == '' || student_amount == '' || non_student_amount == '') {
            
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
                    url:'ajax.php?action=insert_new_rate_action',
                    type:'post',
                    data:{
                        physical_fitness_id:physical_fitness_id,
                        student_amount:student_amount,
                        non_student_amount:non_student_amount,
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
                                     window.location.href = 'add_rate.php';
                                 // }
                                    
                            })           
                        }else if(data == 2){
                          Swal.fire({
                              icon: 'error',
                              title: 'This Physical Fitness is already been set!'
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