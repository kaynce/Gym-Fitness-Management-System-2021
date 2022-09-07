<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
<?php require('assets/db_connect.php'); ?>
<?php require('admin_session.php'); ?>

<html>
  <head>
    <title>Sales Report</title>
    <!-- Web Fonts  -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

    <!-- Invoice Print Style -->
    <link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />

    <!--- Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/admin_style.css"/>

  </head>
  <body>
  <style type="text/css">
    td{
      font-size: 12px!important;
    }
  </style>  
    <div class="invoice">
      <header class="clearfix">
        <div class="row">
          <div class="col-sm-6 mt-md">
            <h2 class="h2 mt-none mb-sm text-dark text-bold"></h2>
            <h4 class="h4 m-none text-dark text-bold"></h4>
          </div>
          <div class="col-sm-6 text-right mt-md mb-md">
            <!-- Address -->
            <?php 
                $query = "SELECT * FROM settings WHERE setting_id = '138'";
                $result = mysqli_query($con, $query);
                $result_2 = mysqli_fetch_array($result);
                foreach($result_2 as $store =>$catch){
                 $$store = $catch;
                }
            ?>
             <div class="ib">
                <img src="assets/images/hmg-malolos-gym-logo.png" alt="HMG Fitness Center Logo" style="min-height: 100%!important; font-size: 20%!important; "  />
              </div>

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
            <!-- <div class="ib">
              <img src="assets/images/invoice-logo.png" alt="OKLER Themes" />
            </div> -->
          </div>
        </div>
      </header>
      <div class="bill-info">
        <div class="row">
          <div class="col-md-6">
            <div class="bill-to">
              <p class="h5 mb-xs text-dark text-semibold"></p>
              <address>
                
                <br/>
                
                <br/>
                
                <br/>
                
              </address>
            </div>
          </div>
          <div class="col-md-6">
            <div class="bill-data text-right">
              <p class="mb-none">
                <span class="text-dark">Date:
                  <?php 
                      $date = new DateTime();
                      $date_created = $date->format('Y-m-d');
                  ?>
                </span>
                <span class="value"><?php echo date("M d,Y",strtotime($date_created)); ?></span>
              </p>

              <?php if(isset($_SESSION['from_date']) && isset($_SESSION['to_date'])){ ?>
              <p class="mb-none">
                <span class="text-dark">Date from:</span>
                <span class="value"><?php echo isset($_SESSION['from_date']) ? date("M d, Y", strtotime($_SESSION['from_date'])): '' ?></span>
              </p>

              <p class="mb-none">
                <span class="text-dark">Date to:</span>
                <span class="value"><?php echo isset($_SESSION['to_date']) ? date("M d, Y", strtotime($_SESSION['to_date'])): '' ?></span>
              </p>
            <?php } ?>

            </div>
          </div>
        </div>
      </div>
    
      <div class="table-responsive">

        <h3>Gym Profit</h3>
        <table class="table table-bordered table-striped mb-none">
          <thead>
            <tr class="h5  text-dark ">
              <th id="cell-id" class="center text-uppercase  text-dark">#</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Member ID</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Name</th>
               <th id="cell-id" class="center text-uppercase  text-dark">Client Type</th>
              <th id="cell-id" class="center text-uppercase   text-dark">Walk In</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Package</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Start</th>
              <th id="cell-id" class="center text-uppercase  text-dark">End</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Date Created</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 1;
              $gym_total = 0;

              if(isset($_SESSION['to_date']) && isset($_SESSION['from_date'])){
                  $from_date = $_SESSION['from_date'];
                  $to_date = $_SESSION['to_date'];
                  // unset($_SESSION['to_date']);
                  // unset($_SESSION['from_date']);

                  $query = "SELECT * FROM `enrolls_to`  
                            WHERE date_created 
                            BETWEEN '$from_date' AND '$to_date' AND add_renew_status = 'approved' ";
                }else{
                  $query = "SELECT * FROM `enrolls_to`  
                            WHERE add_renew_status = 'approved' ";
                }
                
                $result = mysqli_query($con, $query);                                  
                while ($row = mysqli_fetch_array($result)):
            ?>
            <tr>
              <tr class="center">
                <td class="center" style="font-size: 13px!important;"><?php echo $i++ ?></td>
                                                 
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

                <td class="center">
                  <?php echo date("M d,Y",strtotime($row['date_created']))  ?>
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
                   <td class="h4 text-uppercase text-semibold text-dark" style="font-size: 1.5rem!important;"><?php echo number_format($gym_total, 2) ?></td>
                  </tr>

        </table>


         <hr class="separator">

            <h3>Trainors' Profit (Per Session)</h3>

                <table class="table table-bordered table-striped mb-none" >
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

                        if(isset($_SESSION['to_date']) && isset($_SESSION['from_date'])){
                          $from_date = $_SESSION['from_date'];
                          $to_date = $_SESSION['to_date'];
                          // unset($_SESSION['to_date']);
                          // unset($_SESSION['from_date']);

                          $query = "SELECT * FROM `completed_workouts`  
                                    WHERE date_created 
                                    BETWEEN '$from_date' AND '$to_date' ";
                        }else{
                          $query = "SELECT * FROM `completed_workouts` ";
                        }
                        
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
                       <td class="h4 text-uppercase text-semibold text-dark" style="font-size: 1.5rem!important;"><?php echo number_format($trainor_total, 2) ?></td>
                    </tr>

                   
                </table>

      </div>
    
      
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

    </div>

    <script>
      window.print();
    </script>
  </body>
</html>