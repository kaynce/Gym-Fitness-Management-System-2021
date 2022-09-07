<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

  $nav_dashboard_expanded_annoucement = "nav-expanded";
  $nav_active_dashboard_annoucement   = "nav-active";
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
            <h2>Announcement</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Announcement</span></li>
                <li><span>List of Announcement</span></li>
              </ol>
          
              <?php require('assets/birthdays_count.php'); ?>

            </div>
          </header>

          <div class="row">
            <!-- Start first card -->

              <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="announcement"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
     
                    <h2 class="panel-title">Announcement</h2>
                    <br>
                       <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Announcement</a>

                  </header>


                  <div class="panel-body">
                    <div class="table-responsive">
                     <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <colgroup>
                          <col width="5%">
                          <col width="1%">
                          <col width="5%">
                          <col width="5%">
                        </colgroup>

                          <thead class="text-uppercase text-semibold text-dark" style="">
                              <tr>
                                  <th scope="col" class="center">Action</th>
                                  <th scope="col"  class="center" >#</th>
                                  <th scope="col" class="center">Date Created</th>
                                  <th scope="col" class="center">Message</th>   
                              </tr>
                          </thead>
                         <tbody>
      
                             <?php 
                              $i = 1;
                              $type = 'announcement';
                              $query = "SELECT * FROM `notifications` WHERE type = '$type' ORDER BY id DESC";

                              $result = mysqli_query($con, $query);
                              
                              while ($row = mysqli_fetch_array($result)):
                             ?>

                          <tr>
                              <!-- <th scope="row"><b></b></th> -->
                              <td class="center">
                                <!--  <a type="button" class="btn btn-sm btn-primary " href="view_health_status.php?id=<?php echo $row['id'];?>">Edit</a>
-->
                                   <a type="button" href="assets/ajax/view_announcement.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" >View</a>

                                    <a type="button" href="assets/ajax/edit_announcement.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-primary" >Edit</a>

                                   <a type="button" href="#" class=" btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" >Delete</a>
                              </td>

                               <td class="center"><?php echo $i++ ?></td>

                                <td class="center">
                                   <?php 
                                      if(!empty($row['date_created'])){
                                        echo date("M d,Y", strtotime($row['date_created']));
                                      }
                                    ?>
                                   
                                </td>

                                <td class="center">
                                 <?php echo $row['alert_message']; ?>
                                   ...
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

  <div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide ">
      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Add Announcement</h2>
        </header>
        <div class="panel-body">
          <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">

              <div class="form-group">
                <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Message</label>
                <div class="col-sm-9">
                  <textarea rows="5" id="message" name="message" class="form-control" placeholder="Type message..." required></textarea>
                </div>
              </div>

            </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="submit" id="add"  class="btn btn-success add" >Save</button>

            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </footer>
    </section>
  </div>
<!-- End Add modal -->

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

        var message = $('#message').val();

        if(message == ''){

          Swal.fire({
            icon: 'warning',
            title: 'Message is required ',
            text: 'Please input message in the field!',
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
                    url:'ajax.php?action=insert_announcement_action',
                    type:'post',
                    data:{
                        message:message
                    },  
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
                                 window.location.href = 'announcement';
                             // }
                              
                          })
                      }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong!'
                          })
                      }
                      //If

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
</script>
    
<script>

     


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
                  url:'ajax.php?action=delete_announcement_action',
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
                             window.location.href = 'announcement';
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

     
</script>




   

<?php include('footer.php'); ?>