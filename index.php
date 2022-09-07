<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>

<?php $home = 'active'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMG Fitness Center - A  Fitness Center can help anyone who wants to get in shape</title>
    <meta name="description" content="Our goal is to use every chance we have to assist our clients stay active, healthy, and reach their ideal physique. HMG Fitness Center is located at 01 Guinhawa, Mc Arthur Highway, Malolos,
Bulacan (Across Malolos Bus Stop, beside Ang Dating Daan).">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, fitness center">
 
    <?php  require(dirname(__FILE__) . '/assets/plugins.php');  ?> 

    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3691088628068468"
     crossorigin="anonymous"></script>
</head>
<style type="text/css">
  
</style>
<body>

    
    <?php require('assets/head.php'); ?> 

     <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0"  >
       <?php require('assets/navbar.php'); ?>

       <?php 

            $query = "SELECT * FROM `settings` WHERE setting_id = '131' ";
            $result = mysqli_query($con, $query);
            $result_2 = mysqli_fetch_array($result);
            foreach($result_2 as $store => $catch){
                $$store = $catch;
            }
        ?>
        <div id="header-carousel"  class="carousel slide carousel-fade " data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active ">
                    <img class="w-100" src="assets/images/gym-fitness.jpg" alt="Gym fitness in malolos" >
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown text-uppercase"><?php echo isset($p_one) ? $p_one: '' ?></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn text-uppercase "><?php echo isset($p_two) ? $p_two: '' ?></h1>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img class="w-100" src="assets/images/HMG-Fitness-Center.jpg" alt="HMG Fitness Center in malolos bulacan">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown text-uppercase"><?php echo isset($p_three) ? $p_three: '' ?></h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn text-uppercase"><?php echo isset($p_four) ? $p_four: '' ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->

   <!--  <style type="text/css">


    </style>
    <br> <br> <br> <br> <br> <br>

    <div class="container-ring">
        <div class="ring"></div>
        <div class="ring"></div>
         <div class="ring"></div>
    </div> -->

    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                
                <div class="details">
                    <div class="one">
                        <h3>New to HMG Fitness Center?</h3>
                        <h4>Be part of our fitness journey</h4>
                        <br>
                        <a href="signup" class="btn btn-primary py-md-3 animated slideInLeft">Register now for one day of fitness or membership</a>
                    </div>


                    <div class="two">
                 
                        <h3 class="py-2">GYM Hours</h3>
                        
                        <div class="row animated fadeInUp">
                          <div class="col-sm-8 weekday">
                                <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '124'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Monday:</h4> <span ><?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>

                                <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '125'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Tuesday:</h4><span ><?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>

                                <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '126'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Wednesday:</h4><span><?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>

                                <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '127'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Thursday:</h4><span><?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>

                                <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '128'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Friday:</h4> <span > <?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>
                          </div>

                          <div class="col-sm-4 weekend">
                               <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '129'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Saturday:</h4> <span><?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>

                                <?php 
                                     $query = "SELECT * FROM settings WHERE setting_id = '130'";
                                     $result = mysqli_query($con, $query);
                                     $row_gym_hours = mysqli_fetch_array($result);
                                ?>
                                <h4>Sunday:</h4> <span > <?php echo date('h:i A', strtotime($row_gym_hours['time_from'])); ?> - <?php echo date('h:i A', strtotime($row_gym_hours['time_to'])); ?></span>
                          </div>
                        </div>

                      
                            
                       
                        
                        <br>
                    </div>
                </div>
           
            </div>
        </div>
    </div>

    <!-- Start Services -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
                <h1 class="mb-0">Physical Fitness Activities</h1>
            </div>

            <div class="row g-5">

           <?php

                $select = "SELECT * FROM `physical_fitness`";

                $result = mysqli_query ($con, $select);

                while($rows = mysqli_fetch_assoc($result)):

            ?>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            

                
                        <div class="class-item ">
                            <div class="ci-pic">
                                <img src="assets/images/classes/<?php echo $rows['image'];?>" alt="Gym fitness activity in malolos bulacan" class="img-responsive img-rounded img-thumbnail appear-animation" style="height: 50vh;" data-appear-animation="fadeInUp">
                            </div>
                            <div class="ci-text">
                                <span class="text-primary">Training</span>
                                <h4><?php echo $rows['physical_fitness_name'];?></h4>
                                <!-- <a href="#"><i class="fa fa-angle-right"></i></a> -->

                                 <div class="d-flex mb-3">

                            </div>

                            <p><?php echo $rows['description']; ?></p>

                            </div>
                        </div>
               

                        </div>
                       
                    </div>
                </div>
        
               <?php endwhile; ?>
            </div>
        </div>
    </div>
    <!-- End Services -->


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
                            <!-- If the amount is empty then don't show -->
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
                                    $select_packages_rate = "SELECT * FROM `physical_fitness_packages_rates` WHERE physical_fitness_id = '$physical_fitness_id' ORDER BY CAST(package_student_amount AS UNSIGNED) ASC";
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
                                    $select_packages_rate = "SELECT * FROM `physical_fitness_packages_rates` WHERE physical_fitness_id = '$physical_fitness_id' ORDER BY CAST(package_non_student_amount AS UNSIGNED) ASC";
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

    <?php 
        $query = "SELECT * FROM `settings` WHERE setting_id = '123' ";

        $result = mysqli_query($con, $query);
        $row_setting = mysqli_fetch_assoc($result);

        if($row_setting['status'] == 1){
     
            $query_schedule = "SELECT * FROM `classes_timetable_schedule` ";
            $result_schedule = mysqli_query($con, $query_schedule);
            if(mysqli_num_rows($result_schedule) > 0){
     ?>

    <!-- Class Timetable Section Begin -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">

                <!-- Class Timetable Section Begin -->
                <div id="class-timetable" class="class-timetable " >
                    <section class="class-timetable-section class-details-timetable spad">
                        <div class="container appear-animation" data-appear-animation="fadeInDown">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                                        <h5 class="fw-bold text-primary text-uppercase">Schedule</h5>
                                        <h1 class="mb-0">Classes Timetable Schedule</h1>
                                    </div>
                                </div>  
                            </div>
                            <div class="row" >
                            <div class="col-md-12" >
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                        <thead>
                                            <tr class="text-uppercase text-semibold ">
                                                <th></th>
                                                <th class="">Monday</th>
                                                <th class="">Tuesday</th>
                                                <th class="">Wednesday</th>
                                                <th class="">Thursday</th>
                                                <th class="">Friday</th>
                                                <th class="">Saturday</th>
                                                <th class="">Sunday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                $query = "SELECT *
                                                  FROM classes_timetable_schedule
                                                  ORDER BY STR_TO_DATE(time_from, '%H:%i')";
                                                  
                                                $result = mysqli_query($con, $query);
                                                
                                                while ($row = mysqli_fetch_array($result)):
                                            ?>
                                             <tr>
                                                <td class="class-time">
                                                    <h5 style="color: #fff;">
                                                        <?php 
                                                            echo date("h:i A", strtotime($row['time_from']));
                                                            echo '<br>';
                                                            echo ' to ';
                                                            echo '<br>';
                                                            echo date("h:i A", strtotime($row['time_to']));
                                                         ?>
                                                    </h5>
                                                </td>
                                                <!-- Monday -->
                                                <?php if(!empty($row['monday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                        <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['monday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['monday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }

                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>

                                                <!-- Tuesday -->
                                                <?php if(!empty($row['tuesday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                         <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['tuesday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['tuesday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }

                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>

                                                <!-- Wednesday -->
                                                <?php if(!empty($row['wednesday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                         <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['wednesday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['wednesday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>

                                                <!-- Thursday -->
                                                <?php if(!empty($row['thursday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                         <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['thursday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['thursday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>

                                                <!-- Friday -->
                                                <?php if(!empty($row['friday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                         <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['friday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['friday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>

                                                <!-- Saturday -->
                                                <?php if(!empty($row['saturday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                         <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['saturday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['saturday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>

                                                <!-- Sunday -->
                                                <?php if(!empty($row['sunday'])){ ?>
                                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                         <h5>
                                                            <?php 
                                                                $physical_fitness_id = $row['sunday']; 
                                                                $query_pf = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                                                                $result_pf = mysqli_query($con, $query_pf);
                                                                if(mysqli_num_rows($result_pf) > 0){
                                                                    $row_pf = mysqli_fetch_assoc($result_pf);
                                                                    echo ucwords($row_pf['physical_fitness_name']);
                                                                }
                                                            ?>
                                                        </h5>
                                                        <span>
                                                            <?php 
                                                                $trainor_id = $row['sunday_trainor'];
                                                                $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                                                                $result_trainor = mysqli_query($con, $query_trainor);
                                                                if(mysqli_num_rows($result_trainor) > 0){
                                                                    $row_trainor = mysqli_fetch_assoc($result_trainor);
                                                                    echo ucwords($row_trainor['name']);
                                                                }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <?php }else { ?>
                                                        <td class="dark-bg blank-td"></td>
                                                <?php } ?>
                                                
                                            </tr>
                                            <!-- <tr>
                                                <td class="class-time">7.00pm - 9.00pm</td>
                                                <td class="hover-dp ts-meta" data-tsmeta="motivation">
                                                    <h5>Cardio</h5>
                                                    <span>RLefew D. Loee</span>
                                                </td>
                                                <td class="dark-bg blank-td"></td>
                                                <td class="hover-dp ts-meta" data-tsmeta="fitness">
                                                    <h5>Boxing</h5>
                                                    <span>Rachel Adam</span>
                                                </td>
                                                <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                                    <h5>Yoga</h5>
                                                    <span>Keaf Shen</span>
                                                </td>
                                                <td class="hover-dp ts-meta" data-tsmeta="motivation">
                                                    <h5>Karate</h5>
                                                    <span>Donald Grey</span>
                                                </td>
                                                <td class="dark-bg hover-dp ts-meta" data-tsmeta="fitness">
                                                    <h5>Boxing</h5>
                                                    <span>Rachel Adam</span>
                                                </td>
                                                <td class="hover-dp ts-meta" data-tsmeta="workout">
                                                    <h5>WEIGHT LOOSE</h5>
                                                    <span>RLefew D. Loee</span>
                                                </td>
                                            </tr> -->
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
                </div>
                 <!-- Class Timetable Section End -->

            </div>
        </div>
    </div>
    <!-- Class Timetable Section End -->

     <?php 
         }
        }
    ?>
    <!-- End -->

      <!-- Start Contact  -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                    <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
                </div>
               <!-- Start contact - Sixth Section -->
            <div class="contact-section spad">
                <div class="container appear-animation" data-appear-animation="fadeIn">
                    <div class="row">
                        <div class="col-lg-6">
               
                            <div class="contact-widget">
                                <div class="cw-text">
                                    <i class="bi bi-geo-alt text-primary "></i>
                                    <?php 
                                             $query = "SELECT * FROM settings WHERE setting_id = '138'";
                                             $result = mysqli_query($con, $query);
                                             $result_2 = mysqli_fetch_array($result);
                                             foreach($result_2 as $store =>$catch){
                                                          $$store = $catch;
                                             }
                                       ?>
                                    <p style="color: #292A2D;"><?php echo isset($p_one) ? $p_one : '' ?></p>
                                </div>
                                <div class="cw-text">
                                    <i class="fa fa-mobile text-primary"></i>
                                         <?php 
                                                 $query = "SELECT * FROM settings WHERE setting_id = '133'";
                                                 $result = mysqli_query($con, $query);
                                                 $result_2 = mysqli_fetch_array($result);
                                                 foreach($result_2 as $store =>$catch){
                                                              $$store = $catch;
                                                 }
                                           ?>
                                        <a style="color: #292A2D;"><?php echo isset($p_one) ? $p_one:'' ?></a>

                                </div>
                                <div class="cw-text email">
                                    <i class="fa fa-envelope text-primary"></i>
                                     <?php 
                                             $query = "SELECT * FROM settings WHERE setting_id = '134'";
                                             $result = mysqli_query($con, $query);
                                             $result_2 = mysqli_fetch_array($result);
                                             foreach($result_2 as $store =>$catch){
                                                          $$store = $catch;
                                             }
                                       ?>

                                    <p style="color: #292A2D;">
                                        <?php echo isset($p_one) ? $p_one:'' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="leave-comment">
                                <form action="#">
                                    <input type="text" placeholder="Name" id="name" name="name" maxlength="50" style="color: #555; font-size: 17px;">
                                    <input type="email" placeholder="Email" id="email" name="email" maxlength="50" style="color: #555; font-size: 17px;">
                                   
                                    <textarea placeholder="Comment" id="comment" name="comment" style="color: #555; font-size: 17px;"></textarea>
                                    <button type="button" class="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.5366792274444!2d120.8163089141551!3d14.851239174868327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339653cf771c2d9f%3A0xadb82932800552c!2sHMG%20Fitness%20Center!5e0!3m2!1sen!2sph!4v1636250857613!5m2!1sen!2sph" height="550" width="1290" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                </div>
            </div>
        
        </div>
         
    </div>
<!-- End contact - Sixth Section -->  

<!-- To remove space cause by the prices -->
<style>
    .rp_footer{
        margin: 0 0 -50px 0;
     
    }
</style>
 <?php include('assets/footer.php'); ?>

<!-- Send comment function -->
 <script type="text/javascript" src="dashboard/assets/js/send_comment_function.js"></script>
 

