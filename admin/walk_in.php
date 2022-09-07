<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

  $nav_dashboard_expanded_r = "nav-expanded";
  $nav_active_dashboard_r   = "nav-active";
  $nav_dashboard_expanded_l_r = "nav-expanded";
  $nav_active_dashboard_l_r   = "nav-active";
  $nav_active_w_i   = "nav-active";
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
                      <a href="walk_in"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">List of Walk in Rate</h2>
                    <br>
                     <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Walk in Rate</a>
                  </header>

                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                         <colgroup>
                                  
                            <col width="5%">
                            <col width="1%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                            
                          </colgroup>
                          <thead class="text-uppercase text-semibold text-dark">
                            <tr>
                              <th class="text-center">Action</th>
                              <th class="text-center">#</th>
                              <th class="text-center">Physical Fitness</th>


                              <th class="text-center">Student Rate</th>
                               <th class="text-center">Non-Student Rate</th>
                            </tr>
                          </thead>

                           <tbody>
        
                            <?php 
                              $i = 1;
                              // $query = "SELECT * FROM `training_classes_rate`";

                               $query = "SELECT 
                                                physical_fitness.physical_fitness_id,
                                                physical_fitness.physical_fitness_name,
                                                physical_fitness_walk_in_rates.id,
                                                physical_fitness_walk_in_rates.student_amount, 
                                                physical_fitness_walk_in_rates.non_student_amount      
                                          FROM 
                                          physical_fitness_walk_in_rates  
                                          INNER JOIN physical_fitness  ON physical_fitness_walk_in_rates.physical_fitness_id = physical_fitness.physical_fitness_id";

                              $result = mysqli_query($con, $query);
                              $number=1;


                               while ($row = mysqli_fetch_array($result)):
                            ?>

                           <td class="center">
                                 <a type="button" href="assets/ajax/view_walk_in_rate.php?physical_fitness_id=<?php echo $row['physical_fitness_id'] ?>" class="btn btn-sm btn-success modal-with-zoom-anim simple-ajax-modal  btn btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                  <a type="button" href="assets/ajax/edit_walk_in_rate.php?physical_fitness_id=<?php echo $row['physical_fitness_id'] ?>" class="btn btn-sm btn-primary modal-with-zoom-anim simple-ajax-modal  btn btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>

                                 <a type="button" class="btn btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" ><i class="fa  fa-trash-o"></i>&nbsp;Delete</a>
                              </td>


                              <td class="text-center"><?php echo $i++ ?></td>

                              <td class="text-center">
                                 <p><?php echo $row['physical_fitness_name'] ?></p>
                                 
                              </td>

                               <td class="text-center">
                                 <p><?php echo number_format($row['student_amount'],2)  ?></p>
                                 
                              </td>

                               <td class="text-center">
                                 <p><?php echo number_format($row['non_student_amount'],2)  ?></p>
                                 
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
          <h2 class="panel-title">Add Walk in Rate</h2>
        </header>
        <div class="panel-body">
          <form >
            <!-- <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate"> -->
                  <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark" >Physical Fitness</label>
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

            <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Student Amount</label>
                    <div class="col-md-6">

                        <input type="number" class="form-control"  maxlength="50" id="student_amount" name="student_amount"  placeholder="Input amount here" ><?php echo isset($student_amount) ? $student_amount:'' ?>

                     </div>
            </div>

            <div class="form-group">
              <label class="col-md-6 control-label text-uppercase text-semibold text-dark ">Non-Student Amount</label>
                  <div class="col-md-6">

                   <input type="number" class="form-control"  maxlength="50" id="non_student_amount" name="non_student_amount"  placeholder="Input amount here" ><?php echo isset($non_student_amount) ? $non_student_amount:'' ?>

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

    $(document).on('click', '.add', function(){  

        var physical_fitness_id = $('#physical_fitness_id').val();
        var student_amount = $('#student_amount').val();
        var non_student_amount = $('#non_student_amount').val();
        var add = $('#add').val();

        if (physical_fitness_id == 'Please select' || student_amount == '' || non_student_amount == '') {
            
            Swal.fire({
                    icon: 'warning',
                    title: 'There is an empty field!',
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
                      url:'ajax.php?action=insert_new_rate_action',
                      type:'post',
                      data:{
                          physical_fitness_id:physical_fitness_id,
                          student_amount:student_amount,
                          non_student_amount:non_student_amount,
                          add:add
                      },
                      success:function(data, status){ 

                          if (data == 1) {
                              Swal.fire({
                                icon: 'success',
                                title: 'Added Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                              }).then((result) => {
                                   // if (result.value) {
                                       window.location.href = 'walk_in';
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
            //  }
              //End Swal if
          //})    
          //End Swal
        } 
        //End else
      }); 
      //End

   

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
                  url:'ajax.php?action=delete_walk_in',
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
                               window.location.href = 'walk_in';
                          })

                    }else{
                      Swal.fire({
                            icon: 'warning',
                            title: 'Failed to delete!'
                          })
                    }
            }

             }); 

            }
        })     
      }); 
        //Emd
</script>


<?php include('footer.php'); ?>