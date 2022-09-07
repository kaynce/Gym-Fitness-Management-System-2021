<?php 
   if (session_status() === PHP_SESSION_NONE){ 
      session_start(); 
   }

   // unset($_SESSION['nav-active 1']);

   // $_SESSION['nav-active 2'] = "nav-active 2";
   $nav_active_f_goals = "nav-active";
 ?>



<?php 
include('head.php'); 
?>

<!-- If the client is not yet approved this file won't show -->
<?php require('pending_session_restriction.php'); ?>
<!-- End -->

 <?php 

//From ajax folder to fitness-goals.php
 if (isset($_POST['edit_submit'])) {

    $id = $_POST['edit_id'];

    // $member_id = $_GET['member_id'];
    $goal = mysqli_real_escape_string($con, trim($_POST['goal']));
    $date_goal = mysqli_real_escape_string($con, trim($_POST['date_goal']));

    $query = "UPDATE `fitness_goals` 
           SET goal = '$goal',
               date_goal = '$date_goal'
         WHERE id = '$id' ";

    $save = mysqli_query($con, $query);

    if ($save) {
      ?>
        <script type="text/javascript">
          Swal.fire({
                      icon: 'success',
                      title: 'Updated Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) => {
                     // if (result.value) {
                       //  window.location.href = 'fitness-goals';
                     // }
                      
                  })
        </script>
      <?php
    }
    
 }


  ?>
  <!--   
       <div class="preloader">
          <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
          </div>
      </div> -->

      <div class="inner-wrapper">
        <!-- start: sidebar -->
          <?php 
            require('sidebar.php');
           ?>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Fitness Goals</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span></span></li>
              </ol>
              
              <a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

            </div>
          </header>

            <!-- For edit to reload with javascript -->
     
          <div class="row">
               <!-- Start third card -->
             
                 <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="fitness-goals"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">Fitness Goals</h2>
                    <br>
                      <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Fitness Goal</a>

                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                                <col width="5%">
                                 <col width="1%">
                                <col width="1%">
                               
                                <col width="5%">
                                <col width="1%">
                                                        
                              </colgroup>

                            <thead style="" class="text-uppercase text-semibold text-dark">
                                <tr>
                                    <th scope="col" class="center">Actions</th>
                                     <th scope="col"  class="center" >#</th>
                                    <th scope="col" class="center">Date Created</th>
                                   
                                    <th scope="col" class="center">Goals</th>   
                                    <th scope="col" class="center">Date Goal</th>                   
                                </tr>
                            </thead>
                           <tbody>
        
                               <?php 

                                 //Get the member id
                            if(isset($_SESSION['email'])){
                               $email = $_SESSION['email'];
                               $query = "SELECT * FROM `members` WHERE email = '$email' ";

                               $result = mysqli_query($con, $query);

                               if(mysqli_num_rows($result)){
                                $row = mysqli_fetch_array($result);

                                $member_id = $row['member_id'];
                               }
                            } 
                            
                                $i = 1;
                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";
                       

                                $member = "SELECT * FROM `fitness_goals` WHERE member_id = '$member_id' ";

                                $result = mysqli_query($con, $member);
                                
                                while ($row = mysqli_fetch_array($result)):
                               ?>

                            <tr>
                                <!-- <th scope="row"><b></b></th> -->
                                <td class="center">
                                  <!--  <a type="button" class="btn btn-sm btn-primary " href="view_health_status.php?id=<?php echo $row['id'];?>">Edit</a>
-->
                                     <a type="button" href="assets/ajax/view_fitness_goals.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                      <a type="button" href="assets/ajax/edit_fitness_goals.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>

                                     <a type="button" href="#" class=" btn-sm btn-danger delete"   id="<?php echo $row['id'];?>" ><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
                                </td>
                                <!-- <td>
                                    <div class="tm-status-circle pending">
                                    </div>Pending
                                </td> -->
                               
                                 
                                

                                 <td class="center"><?php echo $i++ ?></td>

                                  <td class="center">
                                      <?php 
                                        if(!empty($row['date_created'])){
                                            echo date("M d,Y",strtotime($row['date_created']));
                                          }
                                     ?>
                                     
                                  </td>

                                  <td class="center">
                                   <?php
                                      if(!empty($row['goal'])){
                                        echo  $row['goal']; 
                                      }
                                   ?>
                                  
                                  </td>

                                   <td class="center">
                                     <?php 
                                        if(!empty($row['date_goal'])){
                                            echo date("M d,Y",strtotime($row['date_goal']));
                                          }
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
            <!-- End third card -->
            </div>

        </section>
      </div>



    </section>

<!-- <style type="text/css">
  .modal-block {
    width: 750px!important;
    margin: auto!important;
  }
</style> -->

<style >
  .swal2-container {
      z-index: 100000;
    }

.control-label{
  font-weight: bold;
}
 label{
    font-size: 1.7rem;
  }

</style>


<!-- Start Add modal -->


    <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Add Fitness Goal</h2>
        </header>
        <div class="panel-body">
          <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
            <input type="hidden" id="member_id" name="member_id" class="form-control" value="<?php echo $member_id ?>" />

            <div class="form-group">
              <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Goal</label>
              <div class="col-sm-9">
                <textarea rows="5" id="goal" name="goal" class="form-control" placeholder="Type goal..." required></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Date</label>
              <div class="col-sm-9">
                <input type="date" id="date_goal" name="date_goal" class="form-control" required />
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






<!-- Vendor -->
    <script src="../admin/assets/vendor/jquery/jquery.js"></script>
    <script src="../admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../admin/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="../admin/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="../admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
    <script src="../admin/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>

    <script src="../admin/assets/vendor/pnotify/pnotify.custom.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="../admin/assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="../admin/assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="../admin/assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="../admin/assets/javascripts/forms/examples.wizard.js"></script>



<?php include('footer.php'); ?>

 <script type="text/javascript">

    //------------------Start Add
       $(document).on('click', '.add', function(){  

           var member_id = $('#member_id').val();
           var goal = $('#goal').val();
           var date_goal = $('#date_goal').val();

          if(goal == '' || date_goal == ''){

            Swal.fire({
              icon: 'warning',
              title: 'All field are required!'
                //showConfirmButton: false,
                //timer: 1500
            })  

          } else {

          // Start swal
          // Swal.fire({
          //      title: 'Are you sure?',
          //       text: "",
          //       icon: 'question',
          //       showCancelButton: true,
          //       confirmButtonColor: '#3085d6',
          //       cancelButtonColor: '#d33',
          //       confirmButtonText: 'Yes'            
          //   }).then((result) => {
          //       if (result.value) {
                  
                   // Start ajax
                  $.ajax({  
                      url:'client_ajax.php?action=insert_new_goals_action',
                      type:'post',
                      data:{
                          member_id:member_id,
                          goal:goal,
                          date_goal:date_goal
                      },
                      cache: false,   
                      success:function(data, status){ 

                        console.log(data);
                        if (data == 1) {  
                              Swal.fire({
                                icon: 'success',
                                title: 'Added Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                              }).then((result) => {
                                 // if (result.value) {
                                     window.location.href = 'fitness-goals';
                                 // }
                                  
                              })
                        }
                        //End if
                      }  
                 }); 
                  // End ajax
               // }
                // End Swal if
            //})   
           // End Swal
        }

      });  
     //------------------End Add

        //------------------Start view
     $(document).on('click', '.view', function(){  

           var id = $(this).attr("id");  
             //var id = $('#id').val();
           $.ajax({  
                url:'../admin/ajax.php?action=view_goals_action',
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                cache: false, 
                success:function(data){   
                     $('#view_date_created').val(data.date_created);
                     //$('#edit_member_id').val(data.member_id);
                     $('#view_goal').val(data.goal);    
                     $('#view_date_goal').val(data.date_goal);
                      
                      $('#view_modal').modal('show');

                }  
           });  
      });  

     function view_close_button(){
          $('#view_modal').modal('hide');
     }



     //Delete
      $(document).on('click', '.delete', function(){  
          
        var id = $(this).attr("id");  

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
                  url:'../admin/ajax.php?action=delete_fitness_goals_action',
                  type:'post',
                  data:{
                      id:id,
                  },
                  cache: false, 
                  success:function(data, resp){

                  console.log(data);

                  console.log(resp);

            if(resp == 'success'){

              Swal.fire({
                    icon: 'success',
                    title: 'Deleted Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                       window.location.href = 'fitness-goals';
                  })

            }else{

              Swal.fire({
                    icon: 'warning',
                    title: 'Failed to delete!',

                  })

            }
          }

             }); 

     

            }
        })     
      }); 
        //Emd

     
</script>