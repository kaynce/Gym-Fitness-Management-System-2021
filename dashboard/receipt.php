<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
<?php require(dirname(__FILE__).'/../admin/assets/db_connect.php');  ?>
<?php require('client_session.php'); ?>

<html>
  <head>
    <title>Receipt</title>
    <!-- Web Fonts  -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/images/hmg-malolos-gym-logo.png" />
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../admin/assets/vendor/bootstrap/css/bootstrap.css" />

    <!-- Invoice Print Style -->
    <link rel="stylesheet" href="../admin/assets/stylesheets/invoice-print.css" />

    <!--- Custom CSS -->
    <link rel="stylesheet" href="../admin/assets/stylesheets/admin_style.css"/>

  </head>
  <body>
  <style type="text/css">
    td{
      font-size: 12px!important;
    }
  </style>
  <?php 
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT * FROM `enrolls_to` WHERE id = '$id' ";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
      foreach ($row as $store => $catch) {
        $$store = $catch;
      }
  ?>
    <div class="invoice">
      <header class="clearfix">
        <div class="row">
          <div class="col-sm-6 mt-md">
            <h2 class="h3 mt-none mb-sm text-dark text-bold">REFERENCE ID</h2>
            <h4 class="h4 m-none text-dark text-bold"><?php echo $reference_id; ?></h4>
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
                <img src="../admin/assets/images/hmg-malolos-gym-logo.png" alt="HMG Fitness Center Logo" style="min-height: 100%!important; font-size: 20%!important; "  />
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


      <?php 
         //Get the member id 
          $member_id = $member_id;

          $query_info = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `pending_members`  
                      WHERE member_id = '$member_id' ";
          $result_info = mysqli_query($con, $query_info);

          if(mysqli_num_rows($result_info) < 1){
            $query_info = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `members`  
                      WHERE member_id = '$member_id' ";
            $result_info = mysqli_query($con, $query_info);
          }
          
                                            
          $row_info = mysqli_fetch_array($result_info);
      ?>
      <div class="bill-info">
        <div class="row">
          <div class="col-md-6">
            <div class="bill-to">
              <p class="h5 mb-xs text-dark text-semibold">To:</p>
              <address>
                Status: 
                <?php if($add_renew_status == 'approved'){ ?>
                <span class="label label-success"><?php echo ucwords($add_renew_status ? $add_renew_status: '') ?></span>
                <?php }else{ ?>
                <span class="label label-warning"><?php echo ucwords($add_renew_status ? $add_renew_status: '') ?></span>
                <?php } ?>
                <br>
                Member ID: <?php echo isset($row_info['member_id']) ? $row_info['member_id']: '' ?>
                <br>
                Client Type: <?php echo $client_type; ?>
                <br>
                Name: <?php echo isset($row_info['name']) ? $row_info['name']: '' ?>
                <br/>
                Phone #: <?php echo isset($row_info['contact']) ? $row_info['contact']: '' ?>
                <br/>
                Email: <?php echo isset($row_info['email']) ? $row_info['email']: '' ?>
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

            </div>
          </div>
        </div>
      </div>
    
      <div class="table-responsive">
        <table class="table invoice-items">
          <thead>
            <tr class="h5  text-dark ">
              <th id="cell-id" class="center text-uppercase  text-dark">#</th>
              <th id="cell-id" class="center text-uppercase  text-dark">Physical Fitness</th>

              <?php if(!empty($package_id)){ ?>
              <th id="cell-id" class="center text-uppercase  text-dark">Package</th>
              <?php } ?>

              <?php if(!empty($trainor_id)){ ?>
              <th id="cell-id" class="center text-uppercase  text-dark">Trainor</th>
              <?php } ?>

              <?php if(!empty($trainor_id)){ ?>
              <th id="cell-id" class="center text-uppercase  text-dark">Session/s</th>
              <?php } ?>

              <?php if(!empty($day) || !empty($week) || !empty($month) ){ ?>
              <th id="cell-id" class="center text-uppercase  text-dark">Duration</th>
              <?php } ?>

              <th id="cell-id" class="center text-uppercase  text-dark">Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 1;
              $total = 0;

              $id = $_GET['id'];
              $query = "SELECT * FROM `enrolls_to`  
                          WHERE id = '$id' ";
              $result = mysqli_query($con, $query);
                                  
              while ($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
              <tr class="center">
                <td class="center" style="font-size: 13px!important;"><?php echo $i++ ?></td>
                                                 
                <td class="center">
                  <?php 
                    echo $row['physical_fitness_name'];
                  ?>

                </td>

                 <?php if(!empty($package_id)){ ?>
                <td class="center">
                  <?php 
                    echo $row['package'];
                   ?>
                </td>
                <?php } ?>

                <?php if(!empty($trainor_id)){ ?>
                  <td class="center">
                    <?php 
                      $trainor_id = $row['trainor_id'];

                      $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM `users` WHERE user_id = '$trainor_id' ";

                      $result_trainor = mysqli_query($con, $query_trainor);
                      $row_trainor = mysqli_fetch_assoc($result_trainor);
                      echo $row_trainor['name'];
                     ?>
                  </td>
                <?php } ?>

                <?php if(!empty($session)){ ?>
                  <td class="center">
                    <?php echo ucwords($row['session']) ?>
                  </td>
                <?php } ?>

                <?php if(!empty($day) || !empty($week) || !empty($month) ){ ?>
                    <td class="center">
                     <?php if(!empty($row['day'])){ ?>        
                            <?php echo $row['day']; ?> Day  
                     <?php }else if(!empty($row['week'])) {  ?>
                            <?php echo $row['week']; ?> Week/s  
                     <?php }else if(!empty($row['month'])) {  ?>
                            <?php echo $row['month']; ?> Month/s
                     <?php }else{ ?>
                     <?php  } ?> 
                   </td>
               <?php  } ?> 

                <td class="center">
                  <?php echo number_format($row['amount'], 2); ?>
                </td>

                </tr>
                  <?php 
                    $total = $total + floatval($row['amount']);
                  ?>
                <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    
      <div class="invoice-summary">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-8">
            <table class="table h5 text-dark">
              <tbody>
                <tr class="h4">
                  <td colspan="2" class="text-uppercase text-semibold text-dark" style="font-size: 15px!important">Total</td>
                  <td class="text-left text-uppercase  text-semibold text-dark" style="font-size: 15px!important"><?php echo number_format($total, 2); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script>
      window.print();
    </script>
  <?php } ?>
  <!-- End if --> 
  </body>
</html>