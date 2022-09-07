<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_trainors = "nav-expanded";
  $nav_active_dashboard_trainors  = "nav-active";
  $nav_active_trainors_pf  = "nav-active";

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
            <h2>Trainors</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Trainors</span></li>
                <li><span>Trainor's Physical Fitness</span></li>
              </ol>
          
             <?php require('assets/birthdays_count.php'); ?>
            </div>
          </header>

          <!-- Start card -->
          <div class="row">
            <div class="col-xl-12">
                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="trainors_physical_fitness"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">Trainor's Physical Fitness</h2>
                    <br>
                     <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Assign Physical Fitness</a>
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

                        <thead class="text-uppercase text-semibold text-dark" style="">
                          <tr>
                            <th scope="col" class="center">Action</th>
                            <th scope="col"  class="center" >#</th>
                            <th scope="col"  class="center" >Trainor ID</th>
                            <th scope="col" class="center">Trainor Name</th>
                            <th scope="col" class="center">Physical Fitness</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

                          $i = 1;                    
                          $member = "SELECT * FROM trainor_physical_fitness";
                          $result = mysqli_query($con, $member);
                                                
                          while ($row = mysqli_fetch_array($result)):
                        ?>

                        <tr>
                            <td class="center">
                               <a type="button" href="assets/ajax/view_trainor_physical_fitness.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm  btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                               <a type="button" href="assets/ajax/edit_trainor_physical_fitness.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm  btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>

                                <a type="button" href="#" class=" btn-sm btn-danger delete" id="<?php echo $row['id'];?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </td>
 
                            <td class="center"><?php echo $i++ ?></td>

                            <td class="center"><?php echo $row['user_id']; ?></td>
        
                            <td class="center">
                            <?php 
                                $trainor_id = $row['user_id'];
                                $query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE user_id ='$trainor_id' ORDER BY id DESC ";
                                $result_name = mysqli_query($con, $query_name);

                                $row_name = mysqli_fetch_assoc($result_name);
                                echo ucwords($row_name['name']);
                            ?>
                            </td>
                                                
                            <td class="center">
                            <?php 
                              $physical_fitness_id = $row['physical_fitness_id'];
                              $query_pf_name = "SELECT *  FROM physical_fitness WHERE physical_fitness_id ='$physical_fitness_id'";
                              $result_pf_name = mysqli_query($con, $query_pf_name);
                              $row_pf_name = mysqli_fetch_assoc($result_pf_name);
                              echo $row_pf_name['physical_fitness_name'];
                            ?>
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
          <!-- End card -->
        </section>
      </div>
      <?php require('assets/calendar.php'); ?>
    </section>

<!-- Start Add modal -->
    <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Assign Physical Fitness</h2>
        </header>
        <div class="panel-body">
          <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">

            <div class="form-group">
              <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="gender">Trainor</label>
              <div class="col-md-6">
               <select type="text" id="trainor_id"  name="trainor_id" class="form-control dropdown" onchange="walk_in_info(this.value)" required="">
                <option></option>
                <?php  
                  $query = "SELECT * FROM users WHERE type = 'trainor' AND status = 'approved' ORDER BY id ASC";

                   $result = mysqli_query($con, $query);

                  while($row = mysqli_fetch_array($result)):
                    ?>
                   <option type='text' value="<?php echo $row['user_id'] ?>"><?php echo $row['firstname'] ?>, <?php echo $row['lastname'] ?></option>
                   <?php
                        endwhile;
                ?>         
                </select>
              </div>
            </div>

           <div class="form-group">
              <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="gender">Physical Fitness</label>
              <div class="col-md-6">
               <select type="text" id="physical_fitness_id"  name="physical_fitness_id" class="form-control dropdown"
                required="">
                <option></option>
                <?php  
                  $query = "SELECT * FROM physical_fitness";

                   $result = mysqli_query($con, $query);

                  while($row = mysqli_fetch_array($result)):
                    ?>
                   <option type='text' value="<?php echo $row['physical_fitness_id'] ?>"><?php echo $row['physical_fitness_name'] ?></option>
                   <?php
                        endwhile;
                ?>         
                </select>
              </div>
            </div>

          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="button" id="add"  class="btn btn-success save" >Save</button>

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
      $(document).on('click', '.save', function(){  

        var trainor_id = $('#trainor_id').val();
        var physical_fitness_id = $('#physical_fitness_id').val();

        if(trainor_id == '' || physical_fitness_id == ''){
          Swal.fire({
                icon: 'warning',
                title: 'There is an empty field!',
                text: 'Please check the missing field!'
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

                  $.ajax({  
                      url:'ajax.php?action=assign_phyiscal_fitness',
                      type:'post',
                      data:{
                          trainor_id:trainor_id,
                          physical_fitness_id:physical_fitness_id
                      },  
                      success:function(data, status){ 

                        if (data == 1) {
                           Swal.fire({
                              icon: 'success',
                              title: 'Added Successfully',
                              showConfirmButton: false,
                              timer: 1500
                            }).then((result) =>{
                                 window.location.href = 'trainors_physical_fitness';
                            })
                        }else if(data == 2){
                          Swal.fire({
                              icon: 'error',
                              title: 'Physical Fitness is already assigned to this trainor'
                            })
                        }else{
                          Swal.fire({
                              icon: 'error',
                              title: 'Failed to add'
                            }).then((result) =>{
                                 window.location.href = 'trainors_physical_fitness';
                            })
                        }
                      }  
                 }); 

                //}
                 //End Swal if
            //})
        //End Swal  
         }   

      }); 

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
                  url:'ajax.php?action=delete_trainor_physical_fitness',
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
                               window.location.href = 'trainors_physical_fitness';
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