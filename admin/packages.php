<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_r = "nav-expanded";
  $nav_active_dashboard_r   = "nav-active";
  $nav_dashboard_expanded_l_r = "nav-expanded";
  $nav_active_dashboard_l_r   = "nav-active";
  $nav_active_p   = "nav-active";


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
            <h2>Rates</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>List of Rate</span></li>
                <li><span>Packages</span></li>
              </ol>
          
              <?php require('assets/birthdays_count.php'); ?>
            </div>
          </header>

          <div class="row">
            
            <div class="col-xl-12">
                <section class="panel">

                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="packages"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">List of Packages</h2>
                    <br>
                     <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Package</a>

                  </header>

                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                         <colgroup>
                  
                            <col width="17%">
                            <col width="1%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            <col width="2%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                          </colgroup>
                          <thead class="text-uppercase text-semibold text-dark">
                            <tr>
                              <th class="text-center">Action</th>
                              <th class="text-center">#</th>
                              <th class="text-center">Physical Fitness</th>
                              <th class="text-center">Package Name</th>
                              <th class="text-center">Trainor</th>
                              <th class="text-center">Session/s</th>
                              <th class="text-center" >Duration</th>
                              <th class="text-center" >Description</th>
                              <th class="text-center">Student Rate</th>
                              <th class="text-center">Non-student Rate</th>
                            </tr>
                          </thead>

                           <tbody>
        
                               <?php 
                            $i = 1;
                            // $query = "SELECT * FROM `packages`";

                            // $query = "SELECT training_classes.id, 
                            //                  training_classes.training_class_id, 
                            //                  training_classes.training_classes_name, 
                            //                  training_classes_packages_rates.description,
                            //                  training_classes_walk_in_rates.student_amount,
                            //                  training_classes_walk_in_rates.non_student_amount,
                            //                  training_classes_packages_rates.package_id,
                            //                  training_classes_packages_rates.day,
                            //                  training_classes_packages_rates.week,
                            //                  training_classes_packages_rates.month,
                            //                  training_classes_packages_rates.session,
                            //                  training_classes_packages_rates.package_name,
                            //                  training_classes_packages_rates.package_student_amount,
                            //                  training_classes_packages_rates.package_non_student_amount
                            //           FROM 
                            //           training_classes
                            //           INNER JOIN training_classes_walk_in_rates  ON training_classes.training_class_id = training_classes_walk_in_rates.training_class_id
                            //           INNER JOIN training_classes_packages_rates  ON training_classes.training_class_id = training_classes_packages_rates.training_class_id";

                            $query = "SELECT * FROM physical_fitness_packages_rates ORDER BY id ASC";
                            $result = mysqli_query($con, $query);
                            $number=1;


                            while ($row = mysqli_fetch_array($result)):
                            ?>

                           <tr>
                             
                             <td class="center">
                               
                                     <a type="button" href="assets/ajax/view_packages.php?physical_fitness_id=<?php echo $row['physical_fitness_id'] ?><?php echo $row['package_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                      <a type="button" href="assets/ajax/edit_package.php?physical_fitness_id=<?php echo $row['physical_fitness_id'] ?><?php echo $row['package_id'] ?>" class="btn btn-sm btn-primary modal-with-zoom-anim simple-ajax-modal  btn btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>

                                     <a type="button" class="btn btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" ><i class="fa  fa-trash-o"></i>&nbsp;Delete</a>
                              </td>


                              <td class="text-center"><?php echo $i++ ?></td>
                              <td class="text-center">
                                <p>
                                  <?php 
                                    $physical_fitness_id = $row['physical_fitness_id'];

                                    $query_name = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id'";
                                    $result_name = mysqli_query($con, $query_name);

                                    $row_name = mysqli_fetch_assoc($result_name);
                                    echo $row_name['physical_fitness_name'];
                                  ?>
                                </p>
                                 
                              </td>
                              <td class="text-center">
                                 <p><?php echo $row['package_name'] ?></p>
                                 
                              </td>
                              <td class="text-center">
                                 <p><?php
                                   if($row['required_trainor'] == 'YES'){
                                     echo 'Required';
                                   }else{
                                      echo 'Not required';
                                   }
                                ?></p>
                                 
                              </td>
                              <td class="text-center">
                                <?php if ($row['session'] == '') { ?>

                                <?php } else if($row['session'] == 0) { ?>
                                  UNLIMITED
                                <?php  }else{ ?>

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
                                   
                                 <?php  } ?>   

                       
                                 
                              </td>

                   

                              <td class="text-center">
                                 <p>
                                 <?php 
                                  if(!empty($row['description'])){
                                    echo ucwords(substr($row['description'], 0, 15));
                                   ?>
                                   ...
                                   <?php
                                  }else{

                                  }
                                 ?>
                                 </p>
                                 
                                 
                              </td>


                              <td class="text-center">
                                 <p>
                                  <?php 
                                  if(!empty($row['package_student_amount'])){
                                     echo number_format($row['package_student_amount'],2);  
                                  }
                                
                                 ?>
                                   
                                 </p>
                                 
                              </td>

                               <td class="text-center">
                                 <p>
                                  <?php 
                                  if(!empty($row['package_non_student_amount'])){
                                     echo number_format($row['package_non_student_amount'],2);  
                                  }

                  
                                  ?></p>
                                 
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

      <?php require('assets/calendar.php'); ?>


    </section>


    <!-- Start Add modal -->
    <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Add Package</h2>
        </header>
        <div class="panel-body">
            <form >
              <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark" >Physical Fitness</label>
                  <div class="col-md-6">
                      <select class="form-control"  id="physical_fitness_id" name="physical_fitness_id" required="required" class="custom-select select2" id="">
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
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Package Name</label>
                  <div class="col-md-6">

                       <input type="text" class="form-control"  maxlength="50" id="package_name" name="package_name"  placeholder="Input here" >

                  </div>
              </div>

               <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Description</label>
                  <div class="col-md-6">

                      <textarea type="text"  class="form-control"  id="description" name="description"  maxlength="300" placeholder="Optional" ><?php echo isset($description) ? $description:'' ?></textarea>
                      <!--  <input type="text" class="form-control"   id="description" name="description"  placeholder="Input here" ><?php echo isset($description) ? $description:'' ?>
-->
                  </div>
              </div>

              
               <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Number of</label>
                  <div class="col-md-6">

                       <input type="text" class="form-control"  maxlength="2" id="number" name="number"  placeholder="Input here" >

                  </div>
              </div>

               <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark" for="gender">Day/Week/Month</label>
                  <div class="col-md-6">
                      <select type="text" id="day_week_month" name="day_week_month" required="" class="form-control dropdown " >
                              <option></option>
                              <option value="Day/s">Day/s</option>
                              <option value="Week/s">Week/s</option>
                              <option value="Month/s">Month/s</option>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark" for="gender">Trainor</label>
                  <div class="col-md-6">
                      <select type="text" id="required_trainor" name="required_trainor" required="" class="form-control dropdown" onchange="percent(this.value)">
                              <option></option>
                              <option value="YES">Required</option>
                              <option value="NO">Not Required</option>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                <div id="owner_trainor_percent">

                </div>
              </div>

             <!--  <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Trainor %</label>
                  <div class="col-md-6">

                       <input type="text" class="form-control"  maxlength="2" id="session" name="session"  placeholder="Input '0' for unlimited session " >

                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Owner %</label>
                  <div class="col-md-6">

                       <input type="text" class="form-control"  maxlength="2" id="session" name="session"  placeholder="Input '0' for unlimited session " >

                  </div>
              </div> -->

              <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Session</label>
                  <div class="col-md-6">

                       <input type="text" class="form-control"  maxlength="2" id="session" name="session"  placeholder="Input '0' for unlimited session " >

                  </div>
              </div>

               <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Student Amount</label>
                  <div class="col-md-6">

                       <input type="number" class="form-control"  maxlength="50" id="student_amount" name="student_amount"  placeholder="Input amount here" >

                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Non-Student Amount</label>
                  <div class="col-md-6">

                       <input type="number" class="form-control"  maxlength="50" id="non_student_amount" name="non_student_amount"  placeholder="Input amount here" >

                  </div>
              </div>
             
              <hr class="separator" />

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


<style type="text/css">
  .swal2-container{
    z-index: 100000;
  }

   .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }

</style>
<script>

 $(document).ready(function(){  
 });  


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

   });  
    //   $('.select2').select2({
    // placeholder:'Please Select Here',
    // })



      $(document).on('click', '.add', function(){  

        var physical_fitness_id = $('#physical_fitness_id').val();
        var package_name = $('#package_name').val();
        var description = $('#description').val();
        var number = $('#number').val();
        var day_week_month = document.getElementById('day_week_month').value;
        var required_trainor = $('#required_trainor').val();
        var session = $('#session').val();
        var student_amount = $('#student_amount').val();
        var non_student_amount = $('#non_student_amount').val();
        var add = $('#add').val();

        // if (training_class_id == '' || number == '' || day_week_month == ''  || session == ''
        //     || student_amount == '' || non_student_amount == '') {

        if (physical_fitness_id === '' || student_amount === '' || non_student_amount === '') {
            
            Swal.fire({
                    icon: 'warning',
                    title: 'Only the Number, Session & Day/Week/Month are allowed to be empty',
                    text: 'Please check the missing field!',
                    //showConfirmButton: false,
                    //timer: 1500
            })  

        }else if(number === '' && day_week_month !== ''){
          Swal.fire({
              icon: 'warning',
              title: 'Input data in Number of'
            })
        }else if(number !== '' && day_week_month === ''){
          Swal.fire({
              icon: 'warning',
              title: 'Select between Day/Week/Month'
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
                          physical_fitness_id:physical_fitness_id,
                          package_name:package_name,
                          description:description,
                          number:number,
                          day_week_month:day_week_month,
                          required_trainor:required_trainor,
                          session:session,
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
                                       window.location.href = 'packages';
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
              //End Swal if
          //    
          //End Swal
        } 
        //End else
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




    $(document).on('click', '.delete', function(){  
        
        Swal.fire({
           title: 'Do you want to delete?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              var id = $(this).attr("id");  

              $.ajax({  
                  url:'ajax.php?action=delete_package_action',
                  type:'post',
                  data:{
                      id:id
                  },
                  success:function(data, resp){
                  if(data == 1){
                    Swal.fire({
                          icon: 'success',
                          title: 'Deleted Successfully!',
                          showConfirmButton: false,
                          timer: 1500
                        }).then((result) =>{
                             window.location.href = 'packages';
                        })
                  }else{
                    Swal.fire({
                          icon: 'warning',
                          title: 'Failed to Approve!',

                        })
                  }
             }

        }); 

            }
        })     
      }); 
    //End

         function percent(str){
                 
            if(str == ""){
                document.getElementById("owner_trainor_percent").innerHTML = "";
                return;
            }else{

               document.getElementById("owner_trainor_percent").innerHTML = "";

                if (window.XMLHttpRequest) {
                    //code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                }
                    
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("owner_trainor_percent").innerHTML=this.responseText;
                    }
                };
                    
                xmlhttp.open("GET","ajax.php?action=owner_trainor_percent",true);
                xmlhttp.send();    
            }
                
        }
        //End


   
</script>


<?php include('footer.php'); ?>