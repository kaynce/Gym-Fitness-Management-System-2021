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
       
          if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT * FROM `plans` WHERE id=$id";
                $result = mysqli_query($con, $query);
                $result_2 = mysqli_fetch_array($result);
                foreach($result_2 as $store =>$catch){
                    $$store = $catch;
                }
            }
        ?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="card">
                         <form class="form-horizontal" action="action/edit_plan_action.php" method="POST">
                                <div class="card-body mb-2">
                                    <h4 class="card-title">Edit Plan Details</h4>
      
                                    <a href="plans.php"><button type="button" class="btn btn-secondary mb-1" >Back</button></a>

                                    <button type="Submit" name="submit" class="btn btn-success mb-1" >Edit</button>
                                    <div class="row">

                                        <div class="col-6">                                         
                                            <label for="plan_name" class="text-right control-label col-form-label" >Plan Name</label>
                                            <input type="text" class="form-control"  name="plan_name" value="<?php echo isset($plan_name) ? $plan_name:'' ?>" placeholder="Last Name Here">
                                              
                                        </div>

                                        <div class="col-6">
                                            <label for="description" class="text-right control-label col-form-label" >First Name</label>
                                            <input type="text" class="form-control"  name="description" value="<?php echo isset($description) ? $description:'' ?>" >  
                                        </div>

                                         <div class="col-6">
                                            <label for="months" class="text-right control-label col-form-label" >Months</label>
                                            <input type="text" class="form-control" name="months" value="<?php echo isset($months) ? $months:'' ?>" >
                                        </div>

                                        <div class="col-6">                                         
                                            <label for="amount" class="text-right control-label col-form-label" >Amount</label>
                                            <input type="text" class="form-control" name="amount" value="<?php echo isset($amount) ? $amount:'' ?>" >
                                              
                                        </div>

                                         <input type="hidden" class="form-control" name="id" value="<?php echo isset($id) ? $id:'' ?>" >


                                    </div>
                                </div>
                                <!-- <div class="border-top mb-1">
                                        <div class="card-body">
                                             <a href="members.php"><button type="button" id="submit" name="submit" class="btn btn-secondary mr-2" style="float: left" >Cancel</button></a>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary" style="float: left" onclick="">Edit</button>

                                        </div>
                                    </div> -->
                               
                            </form>
                </div>
            </div>
            <!-- End Container fluid  -->
        </div>   
        <!-- End Page wrapper  -->

    </div>


<?php include('footer.php'); ?>