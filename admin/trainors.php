<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_trainors = "nav-expanded";
  $nav_active_dashboard_trainors  = "nav-active";
  $nav_active_trainors  = "nav-active";

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
          
              <?php require('assets/birthdays_count.php'); ?>
            </div>
          </header>

          <div class="row">
            <div class="col-xl-12">
                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="trainors"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
            
                    <h2 class="panel-title">List of Trainors</h2>
                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                            <col width="16%">
                            <col width="5%">
                           
                            <col width="5%">
                             <col width="5%">
                            <col width="10%">
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">   
                             <col width="5%">                          
                          </colgroup>

                        <thead class="text-uppercase text-semibold text-dark" style="">
                            <tr>
                                <th scope="col" class="center">Action</th>
                                <th scope="col"  class="center" >#</th>
                               <!--  <th scope="col" class="center">Membership Expiry</th> -->
                                <th scope="col" class="center">Trainor ID</th>
                                 <th scope="col" class="center">Profile Pic</th>
                                <th scope="col" class="center">Name</th>
                                <th scope="col" class="center">Gender</th>
                                <th scope="col" class="center">Address</th>
                                <th scope="col" class="center">Physical Fitness</th>
                                <th scope="col" class="center">Date of Reg.</th>
                            </tr>
                        </thead>
                       <tbody>
    
                           <?php 
                            $i = 1;
                            // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                            $member = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND type = 'trainor' ORDER BY id DESC ";

                            $result = mysqli_query($con, $member);
                            
                            while ($row = mysqli_fetch_array($result)):
                           ?>

                        <tr>
                            <td class="center">

                               <a type="button" href="assets/ajax/view_trainor.php?user_id=<?php echo $row['user_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                              <a type="button" href="assets/ajax/edit_user.php?user_id=<?php echo $row['user_id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>

                              <a type="button" href="#" class="btn-sm btn-danger archive" id="<?php echo $row['id'];?>"><i class="fa fa-archive"></i>&nbsp;Archive</a>

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
                                 <?php
                                 $user_id = $row['user_id'];
                                  echo $row['user_id']; 
                                  ?>
                                 
                              </td>
                            

                              <td class="center">
                                <?php if(!empty($row['image'])){ ?>
                                  <img src="../assets/images/team/<?php echo $row['image']; ?>" class="img-responsive img-circle img-thumbnail">
                                <?php }else{ ?>
                                   <img src="../assets/images/default-avatar.jpg ?>" class="img-responsive img-circle img-thumbnail">
                                <?php } ?>
                              </td>

                              <td class="center">
                               <?php echo ucwords($row['name']) ?>
                                 
                              </td>
                              
                              <td class="center">
                                 <?php echo $row['gender'] ?>
                              </td>
                              
                              <td class="center">
                                <?php echo substr($row['region'].' '.$row['house_no'].''.$row['street_name'].''.$row['province'].''.$row['city'].''.$row['barangay'].''.$row['postal_code'], 0, 20) ?>
                                 ...  
                              </td>

                               <div class="form-group">


                              <td class="center">
                                <?php 
                                    $query_pf = "SELECT * FROM `trainor_physical_fitness` WHERE user_id = '$user_id' ";
                                    $result_pf = mysqli_query($con, $query_pf);

                                    while($row_pf = mysqli_fetch_assoc($result_pf)){
                                        $physical_fitness_id_db = $row_pf['physical_fitness_id'];
                                        $query_name = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id_db' ";
                                        $result_name = mysqli_query($con, $query_name);
                                          $row_name = mysqli_fetch_assoc($result_name);

                                          echo $row_name['physical_fitness_name'];
                                          echo ',<br>';

                                    }
                                  ?>
                              </td>


                              <td class="center">
                                <?php 
                                if(!empty($row['date_created'])){
                                    echo date("M d,Y",strtotime($row['date_created'])) ;
                                }else{}
                                
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
          
          <!-- end: page -->
        </section>
      </div>

     <?php require('assets/calendar.php'); ?>


    </section>

<script>




    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
    function Validate(oForm) {
        var arrInputs = oForm.getElementsByTagName("input");

        for (var i = 0; i < arrInputs.length; i++) {
            var oInput = arrInputs[i];
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }
                    
                    if (!blnValid) {

                        //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

                        document.getElementById('message').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

                        return false;
                    }
                }
            }
        }
      
        return true;
    }


  function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    // $(document).ready(function(){  

      // $(document).on('click', '.edit', function(){  
        
      //   Swal.fire({
      //      title: 'Do you want to update?',
      //       text: "",
      //       icon: 'question',
      //       showCancelButton: true,
      //       confirmButtonColor: '#3085d6',
      //       cancelButtonColor: '#d33',
      //       confirmButtonText: 'Yes'            
      //   }).then((result) => {
      //       if (result.value) {

      //         // var member_id = $(this).attr("id");  
      //          var id =$('#edit_id').val();
      //          var lastname = $('#edit_lastname').val();
      //          var firstname = $('#edit_firstname').val();
      //          var age = $('#edit_age').val();
      //          var gender = $('#edit_gender').val();
      //          var date_of_birth = $('#edit_date_of_birth').val();
      //          var height = $('#edit_height').val();
      //          var weight = $('#edit_weight').val();
      //          var address = $('#edit_address').val();
      //          var contact = $('#edit_contact').val();
      //          var new_password = $('#edit_new_password').val();

      //         $.ajax({  
      //             url:'ajax.php?action=edit_member_action',
      //             type:'post',
      //             data:{
      //                 id:id,
      //                 lastname:lastname,
      //                 firstname:firstname,
      //                 age:age,
      //                 gender:gender,
      //                 date_of_birth:date_of_birth,
      //                 height:height,
      //                 weight:weight,
      //                 address:address,
      //                 contact:contact,
      //                 new_password:new_password
      //             },  
      //             success:function(data, status){ 

      //               console.log(data);
      //               if (data == 1) {
      //                 Swal.fire({
      //               icon: 'success',
      //               title: 'Updated Successfully!',
      //               showConfirmButton: false,
      //               timer: 1500
      //             }).then((result) => {
      //                // if (result.value) {
      //                    window.location.href = 'members';
      //                // }
                      
      //             })     
      //               }else{
      //                 Swal.fire({
      //                   icon: 'error',
      //                   title: 'Update failed',
      //                 })
      //               }

      //             }  
      //        }); 

      //       }
      //   })     
      // }); 

 //});  



   
</script>


<?php include('footer.php'); ?>