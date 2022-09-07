<?php $schedule = 'active'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule - HMG Fitness Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <meta name="description" content="Classes Timetable Schedule">
    <meta name="keywords" content="schedule, classes tiemtable">

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
                    <h1 class="display-4 text-white animated slideInDown">Schedule</h1>
                    <label class="h5 text-white">HOME / PAGES / <span class="text-primary">SCHEDULE</span></label>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    
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
 

 <?php require('assets/footer.php'); ?>
 