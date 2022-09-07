<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

  $nav_dashboard_expanded_gym_equip = "nav-expanded";
  $nav_active_dashboard_gym_equip  = "nav-active";
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
            <h2>Gym Equipment</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Gym Equipment</span></li>
                <li><span>List of Gym Equipment</span></li>
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
            <!-- Start first card -->

              <div class="col-md-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>
                      <a href="gym_equipment"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                    </div>
     
                    <h2 class="panel-title">Gym Equipment</h2>
                    <br>
                       <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#add_modal">Add Equipment</a>

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
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                          <col width="5%">
                        </colgroup>

                          <thead class="text-uppercase text-semibold text-dark" style="">
                              <tr>
                                  <th scope="col" class="center">Action</th>
                                  <th scope="col"  class="center" >#</th>
                                  <th scope="col" class="center">Purchased Date</th>   
                                  <th scope="col" class="center">E.Name</th>
                                  <th scope="col" class="center">Description</th>
                                  <th scope="col" class="center">Vendor</th>
                                  <th scope="col" class="center">Address</th>
                                  <th scope="col" class="center">Contact</th>
                                  <th scope="col" class="center">Qty</th>
                                  <th scope="col" class="center">Amount</th>
                              </tr>
                          </thead>
                         <tbody>
      
                            <?php 
                              $total_expenses = 0;

                              $i = 1;

                              $query = "SELECT * FROM `gym_equipment` ";

                              $result = mysqli_query($con, $query);
                              
                              while ($row = mysqli_fetch_array($result)):
                            ?>

                          <tr>
                              <!-- <th scope="row"><b></b></th> -->
                              <td class="center">
                                <!--  <a type="button" class="btn btn-sm btn-primary " href="view_health_status.php?id=<?php echo $row['id'];?>">Edit</a>
-->
                                   <a type="button" href="assets/ajax/view_gym_equipment.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>

                                    <a type="button" href="assets/ajax/edit_gym_equipment.php?id=<?php echo $row['id'] ?>" class="modal-with-zoom-anim simple-ajax-modal   btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Edit</a>

                                   <a type="button" href="#" class=" btn-sm btn-danger delete"  id="<?php echo $row['id'];?>" >Delete</a>
                              </td>

                               <td class="center"><?php echo $i++ ?></td>

                                <td class="center">
                                   <?php 
                                      if(!empty($row['purchased_date'])){
                                        echo date("M d,Y", strtotime($row['purchased_date']));
                                      }
                                    ?>
                                   
                                </td>

                                <td class="center">
                                 <?php echo $row['equipment_name']; ?>
                                </td>

                                <td class="center">
                                 <?php echo $row['description']; ?>
                                </td>

                                <td class="center">
                                 <?php echo $row['vendor']; ?>
                                </td>

                                <td class="center">
                                 <?php echo $row['address']; ?>
                                </td>

                                <td class="center">
                                  <?php echo $row['contact']; ?>
                                </td>

                                <td class="center">
                                  <?php echo $row['quantity']; ?>
                                </td>

                                <td class="center">
                                  <?php echo number_format($row['amount'], 2); ?>
                                </td>

                              <?php $total_expenses = $total_expenses + $row['amount']; ?>
                               
                          </tr>
                           <?php endwhile; ?>


                      </tbody>

                          <tr align= 'center'>
                           <th colspan='9' class="h4 text-uppercase text-semibold text-dark" style='text-align: right;'>Total Expenses.</th>
                           <td class="h4 text-uppercase text-semibold text-dark"><?php echo number_format($total_expenses, 2) ?></td>
                          </tr>

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
          <h2 class="panel-title">Add Equipment</h2>
        </header>
        <div class="panel-body">
          <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Purchased Date</label>
              <div class="col-sm-8">
                 <input type="date" id="purchased_date" name="purchased_date" class="form-control" value="<?php echo isset($purchased_date) ? $purchased_date: '' ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Equipment Name</label>
              <div class="col-sm-8">
                 <input type="text" id="equipment_name" name="equipment_name" class="form-control" value="<?php echo isset($equipment_name) ? $equipment_name: '' ?>" maxlength="200" placeholder='Enter Equipment Name'>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Description</label>
              <div class="col-sm-8">
                <textarea type="text" id="description" name="description" class="form-control" value="" placeholder='Enter Description' maxlength="200"><?php echo isset($description) ? $description: '' ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Vendor</label>
              <div class="col-sm-8">
                 <input type="text" id="vendor" name="vendor" class="form-control" value="<?php echo isset($vendor) ? $vendor: '' ?>" maxlength="200" placeholder='Enter Vendor'>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Address</label>
              <div class="col-sm-8">
                <textarea type="text" id="address" name="address" class="form-control" value="" placeholder='Enter Address' maxlength="200"><?php echo isset($address) ? $address: '' ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Contact</label>
              <div class="col-sm-8">
                 <input type="text" id="contact" name="contact" class="form-control" value="<?php echo isset($contact) ? $contact: '' ?>" maxlength="15" placeholder='Enter Contact'>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Quantity</label>
              <div class="col-sm-8">
                 <input type="text" id="quantity" name="equantity" class="form-control" value="<?php echo isset($quantity) ? $quantity: '' ?>" maxlength="15" placeholder='Enter Quantity'>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label text-uppercase text-semibold text-dark">Amount</label>
              <div class="col-sm-8">
                 <input type="text" id="amount" name="amount" class="form-control" value="<?php echo isset($amount) ? $amount: '' ?>" maxlength="15" placeholder='Enter Amount'>
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

    setInputFilter(document.getElementById("contact"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("quantity"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("amount"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    //------------------Start Add
    $(document).on('click', '.add', function(){  

        let purchased_date = $('#purchased_date').val();
        let equipment_name = $('#equipment_name').val();
        let description = $('#description').val();
        let vendor = $('#vendor').val();
        let address = $('#address').val();
        let contact = $('#contact').val();
        let quantity = $('#quantity').val();
        let amount = $('#amount').val();

        if(purchased_date == '' || equipment_name == '' || description == '' || 
           vendor == '' ||  address == '' ||  contact == '' || 
           quantity == '' || amount == ''){

          Swal.fire({
            icon: 'warning',
            title: 'All field are required '
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
                    url:'ajax.php?action=insert_gym_education_action',
                    type:'post',
                    data:{
                        purchased_date:purchased_date,
                        equipment_name:equipment_name,
                        description:description,
                        vendor:vendor,
                        address:address,
                        contact:contact,
                        quantity:quantity,
                        amount:amount
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
                                 window.location.href = 'gym_equipment';
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
                  url:'ajax.php?action=delete_gym_equipment_action',
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
                             window.location.href = 'gym_equipment';
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
    //End

     
</script>




   

<?php include('footer.php'); ?>