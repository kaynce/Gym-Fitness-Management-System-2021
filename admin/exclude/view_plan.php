<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php include('head.php'); ?>
  
   <!--  Start main-wrapper -->
    <div id="main-wrapper">

        <?php include('header.php'); ?>

        <?php 
           $id = $_GET['id'];
           $query = "SELECT * FROM `plans` WHERE id = '$id'";
           $result = mysqli_query($con, $query);
           $row = mysqli_fetch_array($result);
        ?>


        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="card">
                         <form class="form-horizontal" action="">
                                <div class="card-body mb-2">
                                    <h4 class="card-title">Plan Details</h4>
                                    <a href="plans.php"><button type="button" class="btn btn-secondary mb-1" >Back</button></a>
                                    <div class="row">

                                        <div class="col-6">                                         
                                            <label for="plan_name" class="text-right control-label col-form-label" >Plan Name</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $row['plan_name'] ?>" >
                                              
                                        </div>

                                         <div class="col-6">
                                            <label for="description" class="text-right control-label col-form-label" >Plan Details</label>
                                            <input type="text" class="form-control"readonly value="<?php echo $row['description'] ?>" >
                                        </div>

                                        <div class="col-6">                                         
                                            <label for="months" class="text-right control-label col-form-label" >Months</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $row['months'] ?>" >
                                              
                                        </div>

                                        <div class="col-6">                                         
                                            <label for="amount" class="text-right control-label col-form-label" >Amount</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $row['amount'] ?>">
                                              
                                        </div>

                                      
                                    </div>

                      

                           


                                </div>
                               <!--  <div class="border-top mb-5">
                                    <div class="card-body">
                                        <button type="button" id="submit" name="submit" class="btn btn-primary" style="float: left" onclick="addMember()">Submit</button>
                                    </div>
                                </div> -->
                            </form>
                </div>
            </div>
            <!-- End Container fluid  -->
        </div>   
        <!-- End Page wrapper  -->

    </div>

  

    <!-- End main wrapper -->
<?php include('footer.php'); ?>