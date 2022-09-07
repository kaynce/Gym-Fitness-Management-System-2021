<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }
  $nav_dashboard_expanded_f_g = "nav-expanded";
  $nav_active_dashboard_f_g  = "nav-active";
  $nav_active_f_g  = "nav-active";
 ?>
 
<?php include('head.php'); ?>
  
<?php 

 if (isset($_POST['edit_submit'])) {

    $edit_id = $_POST['edit_id'];
    $member_id = $_GET['member_id'];
    $goal = mysqli_real_escape_string($con, trim($_POST['edit_goal']));
    $date_goal = mysqli_real_escape_string($con, trim($_POST['date_goal']));

    $query = "UPDATE `fitness_goals` 
           SET goal = '$goal',
               date_goal = '$date_goal'
         WHERE id = '$edit_id' ";

    $save = mysqli_query($con, $query);

    if($save) {
      ?>
        <script type="text/javascript">
          Swal.fire({
                      icon: 'success',
                      title: 'Added Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) => {
                     // if (result.value) {
                         window.location.href = 'view_fitness_goals?member_id=<?php echo $member_id ?>';
                     // }
                      
                  })
        </script>
      <?php
    }
    
 }


  ?>
  
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
                <li><span>Fitness Goals</span></li>
                <li><span>List of Fitness Goals</span></li>
              </ol>
          
                <?php 
              $type = $_SESSION['type'];

              if ($type == 'admin') {
                  // $row = mysqli_fetch_assoc($result);

              ?>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>

                <?php 
                } else {
                 ?>
                <a class="sidebar-right-toggle" data-open=""><i class=""></i></a>
              <?php 
              }
              ?>

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
                 $member_id = $_GET['member_id'];
                 $i = 1;

                // $query = "SELECT members.firstname,
                //                  members.lastname,
                //                  members.member_id, 
                //                  fitness_goals.description      
                //           FROM 
                //                  `members`  
                //            INNER JOIN `fitness_goals`  ON members.member_id = fitness_goals.member_id WHERE members.member_id = '$member_id'";

                 //$query = "SELECT * FROM members WHERE member_id='$member_id'";

                  $query = "SELECT * ,concat(lastname,', ',firstname) AS name FROM members WHERE member_id = '$member_id'  ORDER BY concat(lastname,', ',firstname) desc ";

                 $result = mysqli_query($con, $query);
                 $number=1;
                 $row = mysqli_fetch_array($result);
                 //$member_id =  $row['member_id'];
          ?>


          <div class="row">
            

            <!-- Start first card -->

              <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="view_health_status?member_id=<?php echo $_GET['member_id']; ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
                    
                    <h2 class="panel-title"><a href="fitness_goals" class="fa fa-chevron-left">&nbsp; &nbsp;</a>Back</h2>
                    <br>
                    <h2 class="panel-title">Health Status - <?php echo $member_id ?>, <?php echo $row['name']; ?></h2>
                    <br>
                       <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Fitness Goal</a>

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
                                  <th scope="col" class="center">Date Created</th>
                                 
                                  <th scope="col" class="center">Goals</th>   
                                  <th scope="col" class="center">Date Goal</th>                   
                              </tr>
                          </thead>
                         <tbody>
      
                             <?php 
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
                                   <a type="button" href="assets/ajax/view_fitness_goals_modal.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-success" >View</a>

                                    <a type="button" href="assets/ajax/edit_fitness_goals_modal.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-primary" >Edit</a>

                                   <a type="button" href="#" class=" btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" >Delete</a>
                              </td>

                               <td class="center"><?php echo $i++ ?></td>

                                <td class="center">
                                   <?php echo date("M d,Y", strtotime($row['date_created'])) ?>
                                   
                                </td>

                                <td class="center">
                                 <?php echo  substr($row['goal'], 0, 20) ?>
                                   ...
                                </td>

                                 <td class="center">
                                   <?php echo date("M d,Y", strtotime($row['date_goal'])) ?>
                                   
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
<!--<style type="text/css">
  .modal-block {
    width: 750px!important;
    margin: auto!important;
  }
</style>-->
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
                  <input type="date" id="date_goal" name="date_goal" class="form-control" value="<?php echo $date_goal ?>" />
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

<!-- View Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Fitness Goal</h5>
 
          </div>
          <div class="modal-body">
              
          <form>

            <div class="form-group">
              <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Date Created</label>
              <div class="col-sm-9">
                <label id=""><?php echo date('M d,Y', strtotime(isset($view_date_created) ? $view_date_created:'')) ?></label>

               
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Goal</label>
              <div class="col-sm-9">
                <textarea rows="5" id="view_goal" name="view_goal" class="form-control" placeholder="Type goal..." readonly required><?php echo isset($view_goal) ? $view_goal:'' ?></textarea>
                <label><?php echo isset($view_goal) ? $view_goal:'' ?></label>
               
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Date Goal</label>
              <div class="col-sm-9">
                <input type="text" id="view_date_goal" name="view_date_goal" class="form-control" readonly value="<?php echo $view_date_goal ?>" />
              </div>
            </div>
    
           </form>
          </div>
        <div class="modal-footer">
        <button class="btn btn-default " onclick="view_close_button()">Close</button>

        </div>

            

    </div>
  </div>
</div>
<!-- End View Modal -->


<style type="text/css">

  .swal2-container {
    z-index: 100000;
  }

   .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }

</style>

 <script type="text/javascript">

    //------------------Start Add
       $(document).on('click', '.add', function(){  

         var member_id = $('#member_id').val();
         var goal = $('#goal').val();
         var date_goal = $('#date_goal').val();

        if(goal == '' || date_goal == ''){

          Swal.fire({
            icon: 'warning',
            title: 'Input data ',
            text: 'Please check the missing field!',
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
                    url:'ajax.php?action=insert_new_goals_action',
                    type:'post',
                    data:{
                        member_id:member_id,
                        goal:goal,
                        date_goal:date_goal
                    },  
                    success:function(data, status){ 

                      if (status == 'success') {
                        Swal.fire({
                      icon: 'success',
                      title: 'Added Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) => {
                       // if (result.value) {
                           window.location.href = 'view_fitness_goals?member_id=<?php echo $member_id ?>';
                       // }
                        
                    })

                   
                      }
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

        //------------------Start edit
     $(document).on('click', '.view', function(){  

           var id = $(this).attr("id");  
             //var id = $('#id').val();
           $.ajax({  
                url:'ajax.php?action=view_goals_action',
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
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
                  url:'ajax.php?action=delete_fitness_goals_action',
                  type:'post',
                  data:{
                      id:id,
                  },
                  success:function(data, resp){

                  console.log(data);

                  console.log(resp);

            if(data == 1){

              Swal.fire({
                    icon: 'success',
                    title: 'Deleted Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{
                       window.location.href = 'view_fitness_goals?member_id=<?php echo $member_id ?>';
                  })

            }else{

              Swal.fire({
                    icon: 'warning',
                    title: 'Failed to delele!',

                  })

            }
          }

             }); 

     

            }
        })     
      }); 
        //Emd

     
</script>




</script>
   

<?php include('footer.php'); ?>