<?php $privacy_policy = 'active'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terms of Service - HMG Fitness Center</title>
    <meta name="description" content="We help our client to achieve their ideal physique by motivating, reminding how important exercise is. Take care of yourself. Eating healthy and staying active are excellent ways to stay connected to yourself and to your higher power. HMG Fitness Center is an fantastic place to begin.">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, ">


     <?php 
        require(dirname(__FILE__) . '/assets/plugins.php'); 
    ?>
    
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
                    <h1 class="display-4 text-white animated slideInDown">Terms & conditions</h1>
                    <label class="h5 text-white">HOME / PAGES / <span class="text-primary">TERMS AND CONDITIONS</span></label>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



 


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase"></h5>
                        <h2 class="mb-0">Terms & Conditions</h2>
                    </div>
                     <?php 
                        $query = "SELECT * FROM `settings` WHERE setting_id = '141' ";
                        $result = mysqli_query($con, $query);

                        if(mysqli_num_rows($result)){
                            $row = mysqli_fetch_assoc($result);
                        }
                     ?>
                        <h3><?php echo isset($row['p_one']) ? $row['p_one']: '' ?></h3>
                        <h4><?php echo isset($row['p_two']) ? $row['p_two']: '' ?></h4>
                        <br>
                        <p><?php echo isset($row['p_three']) ? $row['p_three']: '' ?></p>
                        <br>
                        <p><?php echo isset($row['p_four']) ? $row['p_four']: '' ?></p>
                        <br>
                        <p><?php echo isset($row['p_five']) ? $row['p_five']: '' ?></p>
                        <br>
                        <p><?php echo isset($row['p_six']) ? $row['p_six']: '' ?></p>
        
                 
                </div>
                
            </div>
        </div>
    </div>
    <!-- About End -->


    

 <?php require('assets/footer.php'); ?>

 <script type="text/javascript">
    //To stop scrolling to the top when clicking the trainor pic
     $('.trainor_details').click(function($e) {
        $e.preventDefault();
    });
 </script>