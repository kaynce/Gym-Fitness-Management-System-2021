<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_payment = "nav-expanded";
  $nav_active_dashboard_payment  = "nav-active";
  $nav_active_payments = "nav-active";

 ?>
 
<?php include('head.php'); ?>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />

    <?php 
      if(isset($_GET['action'])){ 
        unset($_SESSION['to_date']);
        unset($_SESSION['from_date']);
        ?>
        <script>
          window.location.href = 'payments';
        </script>
        <?php
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
            <h2>Payments</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                <li><span>Payments</span></li>
                <li><span>Payments & Report</span></li>
              </ol>
          
              <?php require('assets/birthdays_count.php'); ?>
            </div>
          </header>
          <!-- Start: page -->

          <section class="panel">
            <div class="panel-body">
              <div class="invoice">
                <header class="clearfix">
                  <div class="row">
                    <div class="col-sm-6 mt-md">
                      <h2 class="h2 mt-none mb-sm text-dark text-bold">Report</h2>
                      <h4 class="h4 m-none text-dark text-bold"></h4>
                    </div>
                    <div class="col-sm-6 text-right mt-md mb-md">
                      <div class="ib">
                        <img src="assets/images/hmg-malolos-gym-logo.png" alt="HMG Fitness Center Logo" style="min-height: 100%!important; font-size: 20%!important; "  />
                      </div>
                      <?php 
                        $query = "SELECT * FROM settings WHERE setting_id = '138'";
                        $result = mysqli_query($con, $query);
                        $result_2 = mysqli_fetch_array($result);
                        foreach($result_2 as $store =>$catch){
                         $$store = $catch;
                        }
                      ?>

                      <address class="ib mr-xlg">
                        HMG Fitness Center
                        <br/>
                     
                         <?php echo substr(isset($p_one) ? $p_one : '' , 0, 49) ?>
                        <br/>
                        <?php echo substr(isset($p_one) ? $p_one : '' , 49) ?>
                        <br>
                        <?php 
                          $query = "SELECT * FROM settings WHERE setting_id = '133'";
                          $result = mysqli_query($con, $query);
                          $result_2 = mysqli_fetch_array($result);
                          foreach($result_2 as $store =>$catch){
                            $$store = $catch;
                          }
                        ?>

                        Contact: <?php echo isset($p_one) ? $p_one : '' ?>
                        <br/>
                      <?php 
                          $query = "SELECT * FROM settings WHERE setting_id = '133'";
                          $result = mysqli_query($con, $query);
                          $result_2 = mysqli_fetch_array($result);
                          foreach($result_2 as $store =>$catch){
                            $$store = $catch;
                        }
                      ?>

                      Gmail: <?php echo isset($p_one) ? $p_one : '' ?>
                      </address>
                    </div>
                  </div>
                </header>
                <div class="bill-info">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="bill-to">
                        <!-- <p class="h5 mb-xs text-dark text-semibold">To:</p>
                        <address>
                          <br/>
                          <br/>
                          <br/>
                        </address> -->
                        <label class="text-uppercase text-semibold text-dark">From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                           
                        <label class="text-uppercase text-semibold text-dark">To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                        
                        <input style='float: right;' type="button" onclick="filter()" name="filter" id="filter" value="Apply" class="btn btn-info" />  
                        <br><br>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="bill-data text-right">
                        <p class="mb-none">
                          <span class="text-dark">Date:</span>
                          <span class="value">
                            <?php 
                              $date = new DateTime();
                              $date_created = $date->format('Y-m-d');
                              echo  date("M d,Y",strtotime($date_created));
                             ?>
                          </span>
                        </p>
                        <p class="mb-none">
                          <!-- <span class="text-dark">Due Date:</span>
                          <span class="value">06/20/2014</span> -->
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                
                
             <!--  <input type="text" id="shadow-success" class="mt-sm mb-sm btn btn-success" value=""> -->
             <!-- Notification Success -->
              <div id="notif-success"></div>

              <!-- For Data range -->
              <div id="datarange_table"> 

                <h3>Gym Profit</h3>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                      <tr class="h5  text-dark ">
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">#</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Date Created</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Member ID</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Name</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Client Type</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Walk In</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Package</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Start</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">End</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php 
                            $i = 1;
                            $gym_total = 0;
                            $query = "SELECT * FROM `enrolls_to` WHERE add_renew_status = 'approved' ";
                                                    
                            $result = mysqli_query($con, $query);
                                                
                            while ($row = mysqli_fetch_array($result)):
                        ?>
               
                      <tr class="center">
                        <td class="center"><?php echo $i++ ?></td>
                        
                         <td class="center">
                         <?php echo date("M d,Y",strtotime($row['date_created']))  ?>
                        </td>

                        <td class="center">
                          <?php 
                             echo $row['member_id'];

                             $member_id = $row['member_id'];

                             $query_member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE member_id = '$member_id' ";

                            $result_member = mysqli_query($con, $query_member);
                            $row_member = mysqli_fetch_assoc($result_member);
                          ?>

                        </td>

                        <td class="center">
                          <?php echo ucwords($row_member['name']) ?>
                        </td>

                        <td class="center">
                          <?php echo ucwords($row['client_type']) ?>
                        </td>

                        <td class="center text-semibold text-dark">
                          <?php if(!empty($row['day'])){ ?>  
                              <span class="label label-success">Walk in</span>
                           <?php } ?>
                        </td>

                        <td class="center text-semibold text-dark">
                          <?php echo $row['package'];  ?>
                        </td>

                       <td class="center">
                          <?php 
                            if(!empty($row['start_date'])){
                              echo date("M d,Y",strtotime($row['start_date']));
                            }
                          ?>
                       </td>

                      <td class="center">
                        <?php
                          if(!empty($row['end_date'])){
                            echo date("M d,Y",strtotime($row['end_date']));
                          }
                        ?>
                      </td>

                     

                      <td class="center text-semibold text-dark">
                        <?php 
                          echo number_format($row['amount'], 2);
                        ?>
                      </td>
                      </tr>
                      <?php 
                          $gym_total = $gym_total + floatval($row['amount']);
                       ?>
                    <?php endwhile; ?>


                    </tbody>

                  <tr align= 'center'>
                   <th colspan='9' class="h4 text-uppercase text-semibold text-dark" style='text-align: right;'>Grand Total</th>
                   <td class="h4 text-uppercase text-semibold text-dark"><?php echo number_format($gym_total, 2) ?></td>
                  </tr>

                  </table>
        


                <hr class="separator">

                <h3>Trainors' Profit (Per Session)</h3>

                <table class="table table-bordered table-striped mb-none" id="datatable-default-2">
                    <thead>
                      <tr class="h5  text-dark ">
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">#</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Date Finished</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Trainor</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Reference ID</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Client Name</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Client Type</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Physical Fitness</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Package</th>
                        <th id="cell-id" class="center text-uppercase text-semibold text-dark">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i = 1;
                        $trainor_total = 0;
                        $trainor_id_array = Array();
                        $query = "SELECT * FROM `completed_workouts`";
                                                
                        $result = mysqli_query($con, $query);
                                            
                        while ($row = mysqli_fetch_array($result)):
                      ?>
              
                      <tr class="center">

                        <td class="center"><?php echo $i++ ?></td>
                        
                        <td class="center">
                          <?php echo date("M d, Y", strtotime($row['date_created'])); ?>
                        </td>

                        <td class="center">
                          <?php 
                             //Start Store the trainor id in a array 
                            
                             array_push($trainor_id_array, $row['trainor_id']);
                              //End

                             $trainor_id = $row['trainor_id'];
                             $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE user_id = '$trainor_id' ";

                            $result_trainor = mysqli_query($con, $query_trainor);
                            $row_trainor = mysqli_fetch_assoc($result_trainor);
                            echo $row_trainor['name'];
                          ?>
                        </td>

                        <td class="center">
                          <?php echo ucwords($row['reference_id']) ?>
                        </td>

                        <td class="center">
                          <?php 
                             $member_id = $row['member_id'];

                             $query_member = "SELECT *,concat(lastname,', ',firstname) AS name FROM members WHERE member_id = '$member_id' ";

                            $result_member = mysqli_query($con, $query_member);
                            $row_member = mysqli_fetch_assoc($result_member);

                            echo $row_member['name'];
                          ?>
                        </td>

                        <td class="center">
                          <?php 
                             $reference_id = $row['reference_id'];

                             $query_enrolls = "SELECT * FROM enrolls_to WHERE reference_id = '$reference_id' ";

                            $result_enrolls = mysqli_query($con, $query_enrolls);
                            $row_enrolls = mysqli_fetch_assoc($result_enrolls);

                            echo $row_enrolls['client_type'];
                          ?>
                        </td>

                         <td class="center">
                          <?php echo ucwords($row_enrolls['physical_fitness_name']) ?>
                        </td>

                        <td class="center text-semibold text-dark">
                          <?php echo ucwords($row_enrolls['package']) ?>
                        </td>

                        <td class="center text-semibold text-dark">
                          <?php echo number_format($row['equity'], 2);  ?>
                        </td>

                     
                      </tr>
                      <?php 
                          $trainor_total = $trainor_total + floatval($row['equity']);
                       ?>
                    <?php endwhile; ?>


                    </tbody>

                     <tr align= 'center' >
                       <th colspan='8' class="h4 text-uppercase text-semibold text-dark" style='text-align: right;'>Grand Total</th>
                       <td class="h4 text-uppercase text-semibold text-dark"><?php echo number_format($trainor_total, 2) ?></td>
                    </tr>

                   
                </table>
              </div>
              <!-- End Table -->

              <hr class="separator">
                <div class="invoice-summary">
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-6">
                      <table class="table h5 text-dark">
                        <tbody>
                          <tr class="b-top-none">
                            <td colspan="3" class="text-uppercase text-semibold text-dark" style="font-size: 1.5rem!important;">Gym Profit Total</td>
                            <td class="text-left" style="font-size: 1.5rem!important;"><?php echo number_format($gym_total, 2); ?></td>
                          </tr>

                          

                          <?php 
                            $query_list = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `users` WHERE status = 'approved' ";
                            $result_list = mysqli_query($con, $query_list);
                            
                           while($row = mysqli_fetch_assoc($result_list)){
                          ?>
                            <?php if(in_array($row['user_id'], $trainor_id_array)){ ?>
                              <tr class="">
                                <td colspan="2" style="font-size: 1.5rem!important;"><?php echo ucwords($row['name']);  ?></td>
                                <td class="text-left" style="font-size: 1.5rem!important;"><?php echo number_format($trainor_total, 2); ?></td>
                              </tr>
                            <?php } ?>
                          <?php } ?>

                          <tr class="">
                            <td colspan="3" class="text-uppercase text-semibold text-dark" style="font-size: 1.5rem!important;">Trainors Profit Total</td>
                            <td class="text-left" style="font-size: 1.5rem!important;"><?php echo number_format($trainor_total, 2); ?></td>
                          </tr>

                          <tr class="">
                            <td colspan="3" class="text-uppercase text-semibold text-dark" style="font-size: 1.5rem!important;">Grand Total</td>
                            <td class="text-left text-uppercase text-semibold text-dark" style="font-size: 1.5rem!important;">
                              <?php

                                $grand_total = $gym_total - $trainor_total;
                                echo number_format($grand_total, 2); 
                              ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="text-right mr-lg">
               <!--  <a href="#" class="btn btn-default">Submit Invoice</a> -->
                <a href="payments?action=refresh"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
                <a href="report_print" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
              </div>
            </div>
          </section>
          <!-- End: page -->
        </section>
      </div>
      <?php require('assets/calendar.php'); ?>
    </section>

    <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script src="cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>

     function filter(){
        var from_date = $('#from_date').val();  
        var to_date = $('#to_date').val();  
        var from_date = document.getElementById("from_date").value;
                
        if(from_date != '' && to_date != '')  
        {  
          $.ajax({  
              url:"ajax.php?action=filter_action",
              method:"POST",  
              data:{
                    from_date:from_date, 
                    to_date:to_date
              },success:function(data){  
                
                $('#datarange_table').html(data);  
                
                $(document).ready( function () {
                    $('#datatable-default').DataTable();
                });

                $(document).ready( function () {
                    $('#datatable-default-2').DataTable();
                });

                //   var html = '';
                // html += '<tr>';

                // $('#error').html('<button id="shadow-success" class="mt-sm mb-sm btn btn-success">Success</button>');

                $('#notif-success').click();

               

              }  
          });  
        } else {  
          Swal.fire({
            icon: 'warning',
            title: 'Please select date!'
          })
        }  

    }
//End
  

 $('#notif-success').click(function() {

    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();

    new PNotify({
      title: 'Applied Successfully',
      text: from_date + ' - ' + to_date ,
      type: 'success',
      shadow: true
    });
  });
</script>

<?php include('footer.php'); ?>
  <!-- Vendor -->
  
   

<script>
  $(document).ready( function () {
      $('#datatable-default').DataTable();
  });

  $(document).ready( function () {
      $('#datatable-default-2').DataTable();
  });
</script>
