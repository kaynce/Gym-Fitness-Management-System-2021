<?php $services = 'active'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services - HMG Fitness Center</title>
    <meta name="description" content="We do our best to help our clients stay fit and learn how to exercise efficiently.">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, ">

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
                    <h1 class="display-4 text-white animated slideInDown">Services</h1>
                    <label class="h5 text-white">HOME / PAGES / <span class="text-primary">SERVICES</span></label>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

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
                                <img src="assets/images/classes/<?php echo $rows['image'];?>" alt="Physical Fitness Acitivity" class="img-responsive img-rounded img-thumbnail appear-animation" style="height: 50vh;" data-appear-animation="fadeInUp">
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
    

 <?php require('assets/footer.php'); ?>