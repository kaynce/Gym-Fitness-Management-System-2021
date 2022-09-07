<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_trainors = "nav-expanded";
  $nav_active_dashboard_trainors  = "nav-active";
  $nav_active_assign  = "nav-active";

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

          

          <div class="row">
            

            <div class="col-xl-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="trainors.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">List of Trainors</h2>
                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                                                <col width="16%">
                                                <col width="5%">
                                                <!-- <col width="5%"> -->
                                                <col width="5%">
                                                 <col width="5%">
                                                <col width="10%">

                                                <col width="5%">
                                                <col width="5%">
                                                <col width="5%">   
                                                 <col width="5%">                          
                                              </colgroup>

                                            <thead style="">
                                                <tr>
                                                    <th scope="col" class="center">Action</th>
                                                    <th scope="col"  class="center" >#</th>
                                                   <!--  <th scope="col" class="center">Membership Expiry</th> -->
                                                    <th scope="col" class="center">Trainor ID</th>
                                                     <th scope="col" class="center">Image</th>
                                                    <th scope="col" class="center">Name</th>
                                                    <th scope="col" class="center">Gender</th>
                                                    <th scope="col" class="center">Address</th>
                                                    <th scope="col" class="center">Trainor's Classes</th>
                                                    <th scope="col" class="center">Date of Reg.</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                        
                                               <?php 

                                                // Start training_classes
                                                $training_classes_query = "SELECT * FROM physical_fitness order by physical_fitness_name asc";

                                                $training_classes_result = mysqli_query($con, $training_classes_query);

                                                $classes = array();

                                                  while($row = mysqli_fetch_array($training_classes_result)){
                                                     array_push($classes, $row['physical_fitness_name']);
                                                  }


                                                

                                                 // echo $classes_implode = implode(",", $classes);


                                                 $size = count($classes); 
                                                // End training_classes

                                                $i = 1;
                                                // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND type = 'trainor' ORDER BY id DESC ";

                                                $result = mysqli_query($con, $member);
                                                
                                                while ($row = mysqli_fetch_array($result)):

                                            
                                               ?>

                                            <tr>
                                                <!-- <th scope="row"><b></b></th> -->
                                                <td class="center">


                                                    
                                                   <a type="button" class="btn btn-sm btn-success" href="view_trainor.php?id=<?php echo $row['id'];?>">View</a>

                                                  <a type="button" class="btn btn-sm btn-info" href="edit_trainor.php?id=<?php echo $row['id'];?>">Edit</a>


                                                    <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $row['id'] ?>" style="">Archive</button>

                                                </td>
                                                <!-- <td>
                                                    <div class="tm-status-circle pending">
                                                    </div>Pending
                                                </td> -->
                                                <td class="center"><?php echo $i++ ?></td>
                                                  <!-- <td class="">
                                                    <?php echo $row['membership_expiry'] ?>
                                                     
                                                  </td> -->
                                                  <td class="center">
                                                     <?php echo $row['user_id'] ?>
                                                     
                                                  </td>
                                                

                                                  <td class="center">
                                                      <img src="../assets/images/team/<?php echo $row['image']; ?>" class="img-responsive img-circle img-thumbnail">
                                                  
                                                     
                                                  </td>

                                                  <td class="center">
                                                   <?php echo ucwords($row['name']) ?>
                                                     
                                                  </td>
                                                  
                                                  <td class="center">
                                                     <?php echo $row['gender'] ?>
                                                  </td>
                                                  
                                                  <td class="center">
                                                     <?php echo substr($row['address'], 0, 15) ?>
                                                     ...  
                                                  </td>

                                                   <div class="form-group">


                                                  <td class="center">


                                                    <?php

                                                      //if (!empty($row['trainors_classes'])) {

                                                      // $classes_explode = !empty( $row['trainors_classes']) ? explode(',',$row['trainors_classes']) : '';
                                                     $classes_explode = explode(',',$row['trainors_classes']);
                                                     
                                                       //$classes_explode = explode(",", $classes);

                                                        for($i = 0; $i < $size; $i++){
                                                          if (in_array($i,$classes_explode)) {
                                                              echo $classes[$i]; 
                                                                echo ", ";

                                                          }

                                                        }

                                                      //}

                                                    //echo $row['trainors_classes'];
                                                    // if (!empty($row['trainors_classes'])) {


                                                    //   // echo $classes_explode;

                                                    //   for($i = 0; $i < $size; $i++){

                                                    //     if (in_array($i,$classes)) {
                                                        
                                                    //     //echo $classes[$i];
                                                    //       echo in_array($i,$classes);

                                                    //      //echo $row['trainors_classes'];
                                                    //     }
                                                    //   }
                                                      


                                                    // }
                                                    // for($i = 0; $i < $size; $i++){

                                                    //   //echo in_array($i, $classes);

                                                    //   if (in_array($i, $row['trainors_classes'])) {
                                                    //      echo $classes[$i];
                                                    //     // echo $row['trainors_classes'];
                                                    //   }
                                                      
                                                    //   }
                                                    //       // echo in_array($i, $row['trainors_classes']);

                                                    //    //echo $row['trainors_classes'];
                                                    ?>
                                                  </td>


                                                  <td class="center">
                                                    <?php echo date("M d,Y",strtotime($row['date_created'])) ?>
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

      <?php include('calendar.php'); ?>


    </section>

<script>

 $(document).ready(function(){  

      $(document).on('click', '.approve', function(){  
        
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

              var member_id = $(this).attr("id");  

              $.ajax({  
                  url:'approve_member_action.php',
                  type:'post',
                  data:{
                      member_id:member_id,
                  },  
                  success:function(data, status){ 

                    if (status == 'success') {
                      
                      Swal.fire({
                        icon: 'success',
                        title: 'Successfully Approved!',
                        showConfirmButton: false,
                        timer: 1500
                      })

                    }
                  }  
             }); 

            }
        })     
      }); 

 });  



   
</script>


<?php include('footer.php'); ?>