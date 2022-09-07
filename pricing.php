<?php $pricing = 'active'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricing - HMG Fitness Center</title>
    <meta name="description" content="Start your journey at the minimal cost of membership.">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, hmg fitness center price list, ">
  

   <?php require('assets/plugins.php'); ?>

    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3691088628068468"
     crossorigin="anonymous"></script>

</head>

<body>
   	<?php require('assets/head.php'); ?>


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <?php require('assets/navbar.php'); ?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 px-5">
                    <h1 class="display-4 text-white animated slideInDown">Pricing</h1>
                    <label class="h5 text-white">HOME / PAGES / <span class="text-primary">PRICING</span></label>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

 <!-- Start Pricing   -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Price List</h5>
                <h1 class="mb-0">We are Offering Affordable Prices for Our Clients</h1>
            </div>
            <div class="row g-0">


                 <div class="row justify-content-center appear-animation" data-appear-animation="fadeInUp">

                    <?php
                        $select = "SELECT * FROM `physical_fitness`";

                        $result = mysqli_query($con, $select);

                        while($row = mysqli_fetch_assoc($result)) {

                            $physical_fitness_id = $row['physical_fitness_id'];

                            // Retrieve rates
                            $select_rate = "SELECT * FROM `physical_fitness_walk_in_rates` WHERE physical_fitness_id = '$physical_fitness_id' ";
                            $result_rate = mysqli_query($con, $select_rate);
                            $row_rate = mysqli_fetch_assoc($result_rate);
                    ?>

                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <div class="ps-item-title">
                                <h2 ><?php echo strtoupper($row['physical_fitness_name']) ?></h2>
                            </div>
                            
                            

                            <div class="pi-price">                  
                            <br>
                            <!-- For personal training -->
                            <?php if (empty($row_rate['student_amount']) &&  empty($row_rate['non_student_amount']) ){ ?>
                                
                            <?php }else{ ?>
                            <h4 class="sub-title">WALK IN RATES</h4>
                            <br>

                                 <span>STUDENT</span>
                                 <?php if (!empty($row_rate['student_amount'])){ ?>

                                    <h2 ><?php echo number_format($row_rate['student_amount'],2); ?></h2>

                                 <?php }else{ ?>

                                    <h2>0</h2>

                                <?php } ?>

                                <br>

                                <span>NON-STUDENT</span>

                                 <?php if (!empty($row_rate['non_student_amount'])){ ?>

                                    <h2 ><?php echo number_format($row_rate['non_student_amount'],2); ?></h2>

                                 <?php }else{ ?>

                                    <h2>0</h2>

                                <?php } ?>
                                
                            <?php } ?>
                            <hr class="separator" >
                            </div>

                            <h3>PACKAGE</h3>
                            <h3></h3>
                            <div class="pi-price">


                
                                 <!-- STUDENT -->
                                  <span>STUDENT</span>
                                        <br>
                                        <br>
                                 <?php 
                                    //Retrieve packages rates
                                    $select_packages_rate = "SELECT * FROM `physical_fitness_packages_rates` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                    $result_packages_rate = mysqli_query($con, $select_packages_rate);
                                    while($row_packages_rate = mysqli_fetch_assoc($result_packages_rate)){
                                  ?>
                                    

                                     <h3>

                                    

                                      <!-- Month -->
                                     <?php if(!empty($row_packages_rate['day'])){ ?>        
                                            <?php echo $row_packages_rate['day']; ?> Day/s  
                                     <?php }else if(!empty($row_packages_rate['week'])) {  ?>
                                            <?php echo $row_packages_rate['week']; ?> Week/s  
                                     <?php }else if(!empty($row_packages_rate['month'])) {  ?>
                                            <?php echo $row_packages_rate['month']; ?> Month/s
                                     <?php }else{ ?>
                                     <?php  } ?>

                                     <!-- Session -->
                                     <?php if(!empty($row_packages_rate['session'])){ ?>        
                                                <?php echo $row_packages_rate['session']; ?> Session  
                                     <?php }else{ ?>
                                     <?php } ?>

                                    <!-- Amount -->
                                    <?php if(!empty($row_packages_rate['package_student_amount'])){ ?>
                                             <span  class="prize-tag" >
                                                <?php echo number_format($row_packages_rate['package_student_amount'],2); ?>
                                             </span>
                                     <?php }else{ ?>                
                                     <?php } ?>


                                    </h3>
                                 <?php 
                                    }
                                 ?>

                                 <!-- NON-STUDENT -->
                                <!--  <hr class="separator" > -->

                                    <span>NON-STUDENT</span>
                                        <br>
                                        <br>

                                <?php 
                                    //Retrieve packages rates
                                    $select_packages_rate = "SELECT * FROM `physical_fitness_packages_rates` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                    $result_packages_rate = mysqli_query($con, $select_packages_rate);
                                    while($row_packages_rate = mysqli_fetch_assoc($result_packages_rate)){
                                  ?>
                                    

                                     <h3>
                                      <!-- Month -->
                                     <?php if(!empty($row_packages_rate['day'])){ ?>        
                                            <?php echo $row_packages_rate['day']; ?> Day/s  
                                     <?php }else if(!empty($row_packages_rate['week'])) {  ?>
                                            <?php echo $row_packages_rate['week']; ?> Week/s  
                                     <?php }else if(!empty($row_packages_rate['month'])) {  ?>
                                            <?php echo $row_packages_rate['month']; ?> Month/s
                                     <?php }else{ ?>
                                     <?php  } ?>   



                                     <!-- Session -->
                                     <?php if(!empty($row_packages_rate['session'])){ ?>        
                                                <?php echo $row_packages_rate['session']; ?> Session  
                                     <?php }else{ ?>
                                     <?php } ?>

                                    <!-- Amount -->
                                    <?php if(!empty($row_packages_rate['package_non_student_amount'])){ ?>
                                             <span class="prize-tag" >
                                                <?php echo number_format($row_packages_rate['package_non_student_amount'],2);   ?>

                                             </span>
                                     <?php }else{ ?>                
                                     <?php } ?>
                                    </h3>
                                 <?php 
                                    }
                                 ?>

                            </div>
                            
                             <a href="signup" class="btn btn-primary animated slideInLeft pricing-btn">Enroll now</a> 

                        </div>
                    </div>

                   <?php 
                        }
                    ?>

                    <!--=================== Personal Training ================-->

            </div>
        </div>
    </div>
    <!-- End Pricing   -->


<!-- To remove space cause by the prices -->
<style>
    .rp_footer{
         margin: 0 0 -50px 0;
     
    }
</style>


 <?php require('assets/footer.php'); ?>
