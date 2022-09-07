<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
   $nav_dashboard_expanded_h_status = "nav-expanded";
  $nav_active_dashboard_h_status  = "nav-active";
  $nav_active_h_members  = "nav-active";
 ?>
 
<?php include('head.php'); ?>
  

  
      <div class="inner-wrapper">
        <!-- start: sidebar -->
        
       <?php require("sidebar.php"); ?>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Health Status</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Health Status</span></li>
                <li><span>List of Members</span></li>
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
                 $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE status ='approved' AND member_id = $member_id ORDER BY concat(lastname,', ',firstname) desc ";
                 $result = mysqli_query($con, $query);
                 $number=1;
                 $row = mysqli_fetch_array($result);

              ?>


          <div class="row">
            

<!--             First card -->
          
                 
            <!-- Start third card -->
             
            <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="view_health_status?member_id=<?php echo $_GET['member_id']; ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
                    
                    <h2 class="panel-title"><a href="health_status" class="fa fa-chevron-left">&nbsp; &nbsp;</a>Back</h2>
                    <br>
                    <h2 class="panel-title">Health Status - <?php echo $member_id ?>, <?php echo $row['name']; ?></h2>
                    <br>
                      <!--  <button type="button" class="btn btn-success mb-1"  data-toggle="modal" href="#addModal">Add Progress</button> -->
                      <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Progress</a>
                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                                                                        
                          </colgroup>

                          <thead class="text-uppercase text-semibold text-dark" style="">
                              <tr>
                                  <th scope="col" class="center">Action</th>
                                  <th scope="col" class="center">Date</th>
                                  <th scope="col"  class="center" >#</th>
    
                                  <th scope="col" class="center">Weight</th>
                                  <th scope="col" class="center">Body Fats</th>
                                  <th scope="col" class="center">Bone Density</th>
                                  <th scope="col" class="center">Body Water</th>
                                  <th scope="col" class="center">Muscle Mass</th>
                                  <th scope="col" class="center">Body Structure</th>
                                  <th scope="col" class="center">Basal Metabolic (BM) </th>
                                  <th scope="col" class="center">Metabolic Age </th>
                                  <th scope="col" class="center">Visceral Fats </th>
                         
                              </tr>
                          </thead>
                         <tbody>
      
                             <?php 
                              $i = 1;
                              $member = "SELECT * FROM `health_status` WHERE member_id = '$member_id' ORDER BY id DESC";
                              $result = mysqli_query($con, $member);
                              while ($row = mysqli_fetch_array($result)):
                             ?>

                          <tr>
                              <!-- <th scope="row"><b></b></th> -->
                              <td class="center">
                                  
                                  <a type="button" href="assets/ajax/view_client_progress.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-success" >View</a>
                             
                                   <a type="button" href="assets/ajax/edit_client_progress.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-primary" >Edit</a>

                                  <a type="button" href="#" class=" btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" >Delete</a>
                            
                              </td>
                              <!-- <td>
                                  <div class="tm-status-circle pending">
                                  </div>Pending
                              </td> -->
                             
                               
                                <td class="center">
                                   <?php echo date("M d,Y", strtotime($row['date_created'])) ?>
                                   
                                </td>

                                 <td class="center"><?php echo $i++ ?></td>

                                <td class="center">
                                 <?php echo ucwords($row['weight']) ?>
                                   
                                </td>
                                
                                <td class="center">
                                   <?php echo $row['body_fats'] ?>
                                </td>
                                
                             
                                <td class="center">
                                  <?php echo $row['bone_density'] ?>
                                </td>


                                <td class="center">
                                   <?php echo $row['body_water'] ?>
                                </td>


                                <td class="center">
                                   <?php echo $row['muscle_mass'] ?>
                                </td>


                                <td class="center">
                                   <?php echo $row['body_structure'] ?>
                                </td>


                                <td class="center">
                                   <?php echo $row['basal_metabolic'] ?>
                                </td>


                                <td class="center">
                                   <?php echo $row['metabolic_age'] ?>
                                </td>


                                <td class="center">
                                   <?php echo $row['visceral_fats'] ?>
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
          
          <!-- end: page -->


        </section>

      </div>
    
   <?php require('assets/calendar.php'); ?>


    </section>

<!-- Start Add modal -->
    <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Add Progress</h2>
        </header>
        <div class="panel-body">
          <form id="progress_form">
             <input type="hidden" id="member_id" name="member_id" class="form-control" value="<?php echo $_GET['member_id']; ?>" />
            
             <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Weight</label>
                <input type="text" name="weight" id="weight" class="form-control"  maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Body Fats</label>
                <input type="text" name="body_fats" id="body_fats" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Bone Density</label>
                <input type="text" name="bone_density" id="bone_density" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Body Water</label>
                <input type="text" name="body_water" id="body_water" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Muscle Mass</label>
                <input type="text" name="muscle_mass" id="muscle_mass" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Body Structure</label>
                <input type="text" name="body_structure" id="body_structure" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Basal Metabolic (BM)</label>
                <input type="text" name="basal_metabolic" id="basal_metabolic" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Metabolic Age</label>
                <input type="text" name="metabolic_age" id="metabolic_age" class="form-control" maxlength="5" required>
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Visceral Fats</label>
                <input type="text" name="visceral_fats" id="visceral_fats" class="form-control" maxlength="5" required>
            </div>
          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="button" id="add"  class="btn btn-success add">Save</button>

            <button class="btn btn-default modal-dismiss">Cancel</button>

          </div>
        </div>
      </footer>
    </section>
  </div>
<!-- End Add modal -->
<style type="text/css">
  .swal2-container{
    z-index: 1000000;
  }
</style>
<?php include('footer.php'); ?>

 <script>

   $(document).on('click', '.close', function(){
       console.log('asdasd');
       // $("#add_modal").modal('hide');  
       //$('body').removeClass('modal-open');
       // $("#add_modal").remove();
   })
   
   

  $(document).ready(function(){




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

    setInputFilter(document.getElementById("weight"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("body_fats"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("bone_density"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("body_water"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("muscle_mass"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("body_structure"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("basal_metabolic"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("metabolic_age"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

     setInputFilter(document.getElementById("visceral_fats"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

  });

  $(document).on('click', '.add', function(){

    let member_id       = $('#member_id').val();
    let weight          = $('#weight').val();
    let body_fats       = $('#body_fats').val();
    let bone_density    = $('#bone_density').val();
    let body_water      = $('#body_water').val();
    let muscle_mass     = $('#muscle_mass').val(); 
    let body_structure  = $('#body_structure').val();
    let basal_metabolic = $('#basal_metabolic').val();
    let metabolic_age   = $('#metabolic_age').val();
    let visceral_fats   = $('#visceral_fats').val();

    // if (weight == '' || body_fats ==  '' || bone_density ==  '' || body_water ==  ''||
    //   muscle_mass ==  ''|| body_structure == '' || basal_metabolic ==  '' || metabolic_age ==  ''||
    //   visceral_fats ==  '' ) {
    //   Swal.fire({
    //       icon: 'warning',
    //       title: 'There is an empty field!',
    //       text: 'Please check the missing field!',
    //       //showConfirmButton: false,
    //       //timer: 1500
    //   })   
    // } else {
    // Start sweetalert
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
            url:'ajax.php?action=insert_progress_action',
            type:'POST',
            data:{
                member_id:member_id,
                weight:weight,
                body_fats:body_fats,
                bone_density:bone_density,
                body_water:body_water,
                muscle_mass:muscle_mass,
                body_structure:body_structure,
                basal_metabolic:basal_metabolic,
                metabolic_age:metabolic_age,  
                visceral_fats:visceral_fats
          }, success:function(data, status){ 

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
                         window.location.href = 'view_health_status?member_id=<?php echo $member_id; ?>';
                     // }
                  })
                }else{
                   Swal.fire({
                    icon: 'error',
                    title: 'Failed to Add!'
                  })
                }

              }  
         }); 

       // }
         // End Swal if
    //})
      // End Swal
    //}
  })
   

     //------------------Start delete
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
                  url:'ajax.php?action=delete_progress',
                  type:'post',
                  data:{
                      id:id
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
                       window.location.href = 'view_health_status?member_id=<?php echo $_GET['member_id']; ?>';
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
      //------------------End delete

</script>
   

