<?php $about_us = 'active'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - HMG Fitness Center</title>
    <meta name="description" content="We help our client to achieve their ideal physique by motivating, reminding how important exercise is. Take care of yourself. Eating healthy and staying active are excellent ways to stay connected to yourself and to your higher power. HMG Fitness Center is an fantastic place to begin.">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, ">


    <?php require(dirname(__FILE__) . '/assets/plugins.php'); ?>
    
     <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3691088628068468"
     crossorigin="anonymous"></script>

</head>

<body>
    <?php require('assets/head.php'); ?>

    <style type="text/css">
        
        label{
            font-size: 12.5px;
        }
    </style>

 


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
       
        <?php require('assets/navbar.php'); ?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 px-5">
                    <h1 class="display-4 text-white animated slideInDown">About Us</h1>
                    <label class="h5 text-white">HOME / PAGES / <span class="text-primary">ABOUT US</span></label>
                </div> 
            </div>
        </div>
    </div>
    <!-- Navbar End -->


 


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">HMG Fitness Center</h1>
                    </div>
                   <!--  <?php 
                        $query = "SELECT * FROM settings WHERE setting_id = '132'";
                        $result = mysqli_query($con, $query);
                        $row_about_us = mysqli_fetch_array($result);
                    ?>

                    

                    <p class="mb-4"><?php echo $row_about_us['p_one'] ?></p> -->
                    
                    <p class="mb-4"> We assist our clients in achieving their ideal physique by motivating and reminding them of the importance of exercise. Take proper care of yourself. Eating well and staying active are great ways to stay connected with yourself and your higher power. The HMG Fitness Center is an excellent place to start. </p> 

                    <p class="mb-4"><a href="services">Gym, Physical Fitness, Sports, Fitness Intruction</a> </p> 
                   

                 
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="assets/images/gym-fitness.jpg" style="object-fit: cover; border-radius: 25px!important;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Team</h5>
                <h1 class="mb-0">Professional Trainors </h1>
            </div>
            <div class="row g-5">

                <?php
                    $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `users` WHERE type ='trainor' AND status = 'approved' ";

                    $result = mysqli_query ($con, $query);
                    while($row = mysqli_fetch_assoc($result)):
                ?>

                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <?php 
                                    if(!empty($row['image'])){
                                ?>
                                    <img src="assets/images/team/<?php echo $row['image'];?>" alt="Physical  Fitness Trainor" class="img-fluid w-100" style="min-height: 100%; height: 100%; min-width: 100%;" >
                                <?php }else{ ?>
                                    <img src="assets/images/default-avatar.jpg ?>" class="img-fluid w-100" style="min-height: 100%; height: 100%; min-width: 100%;">
                                <?php } ?>

                                <img class="img-fluid w-100" src="assets/img/team-1.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-lg rounded trainor_details" href="#">

                                        <label class="text-white "><span class="text-primary">Client/s:</span>
                                     
                                            <!-- Start Count the total clients per trainor -->
                                            <?php 
                                                $user_id = $row['user_id'];

                                                $select_list = "SELECT * FROM enrolls_to WHERE status = 'approved' AND trainor_id = '$user_id'";
                                         
                                                $result_list = mysqli_query($con, $select_list);
                                                 
                                                $total_clients = mysqli_num_rows($result_list);

                                             ?>
                                             <!-- End    -->

                                             <?php echo $total_clients ?>
                                        </label>
                                        <br>
                                        <label class="text-white"><span  class="text-primary">Availability:</span>
                                            <?php 
                                         $avl = $row['availability'];
                                        
                                         if($avl == 1){
                                            echo 'YES';
                                         }else{
                                            echo 'NO';
                                         } 
                                    ?>
                                        </label>
                                       
                                        <label class="text-white"><span  class="text-primary"></span>
                                       
                                            <label>
                                                <span  class="text-primary">Name:</span>
                                                <br>
                                                <?php echo ucwords($row['name']); ?>
                                            </label>
                                            <br>
                                            <label>
                                                <span  class="text-primary">About:</span>
                                            <br>
                                                 <?php echo isset($row['about_me']) ? $row['about_me']: '' ?>
                                             </label>
                                            <br>
                                            <label>
                                                <span  class="text-primary">Motto:</span>
                                             <br>
                                                <?php echo isset($row['motto']) ? $row['motto']: '' ?>
                                             <br>
                                            </label>
                                            <br>
                                            <label><span  class="text-primary">Weight:</span>
                                            <br>
                                                <?php
                                                    if(!empty($row['weight'])){
                                                         echo $row['weight']; 
                                                         echo ' kg';
                                                    }
                                                ?> 
                                            </label>
                                            <br>
                                            <label><span  class="text-primary">Height:</span>
                                            <br>
                                                <?php
                                                    if(!empty($row['height'])){
                                                         echo $row['height']; 
                                                         echo ' cm';
                                                    }
                                                 ?> 
                                            </label>
                                        </label>

                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary"><?php echo ucwords($row['name']); ?></h4>
                                <p class="text-uppercase m-0">Trainor</p>
                            </div>
                        </div>
                    </div>

              <?php endwhile; ?>
              
            </div>
        </div>
    </div>
    <!-- Team End -->

    

 <?php require('assets/footer.php'); ?>
     
 <script type="text/javascript">
    //To stop scrolling to the top when clicking the trainor pic
     $('.trainor_details').click(function($e) {
        $e.preventDefault();
    });
 </script>