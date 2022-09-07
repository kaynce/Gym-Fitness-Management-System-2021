
    <!-- Footer Start -->
    <div class="rp_footer">
        <div class="container-fluid text-light mt-5 wow fadeInUp" data-wow-delay="0.1s" style="background-color: #252525; border-bottom: 1px solid #fff;">
            <div class="container">
                <div class="row gx-5">

                    <div class="col-lg-12 col-md-6">
                        <div class="row gx-5">
                        
                          <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                    <h3 class="text-light mb-0">Find Out More</h3>
                                </div>
                                <div class="link-animated d-flex flex-column justify-content-start">
                                    <a class="text-light mb-2" href="privacy-policy"><i class="bi bi-arrow-right text-primary me-2"></i>Privacy Policy</a>
                                    <a class="text-light mb-2" href="terms-and-conditions"><i class="bi bi-arrow-right text-primary me-2"></i>Terms & Conditions</a>
                                    <a class="text-light mb-2" href="admin/login"><i class="bi bi-arrow-right text-primary me-2"></i>Admin-Trainor Login</a>
                                   <!--  <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Dark Mode</a> -->
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                    <h3 class="text-light mb-0">Popular Links</h3>
                                </div>
                                <div class="link-animated d-flex flex-column justify-content-start">
                                    <a class="text-light mb-2" href="index"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                    <a class="text-light mb-2" href="about-us"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                    <a class="text-light mb-2" href="services"><i class="bi bi-arrow-right text-primary me-2"></i>Services</a>
<?php 
$query = "SELECT * FROM `settings` WHERE setting_id = '123' ";

$result = mysqli_query($con, $query);
$row_setting = mysqli_fetch_assoc($result);

if($row_setting['status'] == 1){ ?>
                                     <a class="text-light mb-2" href="schedule"><i class="bi bi-arrow-right text-primary me-2"></i>Schedule</a>
<?php } ?>
                                   
                                    <a class="text-light mb-2" href="pricing"><i class="bi bi-arrow-right text-primary me-2"></i>Pricing</a>
                                    <a class="text-light" href="contact"><i class="bi bi-arrow-right text-primary me-2"></i>Contact</a>
                                    <a class="text-light" href="login"><i class="bi bi-arrow-right text-primary me-2"></i>Login</a>
                                </div>
                            </div>

                              <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                    <h3 class="text-light mb-0">Get In Touch</h3>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-geo-alt text-primary me-2"></i>
                                     <?php 
                                         $query = "SELECT * FROM settings WHERE setting_id = '138'";
                                         $result = mysqli_query($con, $query);
                                         $result_2 = mysqli_fetch_array($result);
                                         foreach($result_2 as $store =>$catch){
                                                      $$store = $catch;
                                         }
                                    ?>
                                    <p class="mb-0"><?php echo isset($p_one) ? $p_one : '' ?></p>
                                </div>

                                <div class="d-flex mb-2">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <?php 
                                         $query = "SELECT * FROM settings WHERE setting_id = '134'";
                                         $result = mysqli_query($con, $query);
                                         $result_2 = mysqli_fetch_array($result);
                                         foreach($result_2 as $store =>$catch){
                                                      $$store = $catch;
                                         }
                                   ?>

                                    <p class="mb-0"><?php echo isset($p_one) ? $p_one:'' ?></p>
                                </div>

                                <div class="d-flex mb-2">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <?php 
                                         $query = "SELECT * FROM settings WHERE setting_id = '133'";
                                         $result = mysqli_query($con, $query);
                                         $result_2 = mysqli_fetch_array($result);
                                         foreach($result_2 as $store =>$catch){
                                                      $$store = $catch;
                                         }
                                    ?>

                                    <p class="mb-0"><?php echo isset($p_one) ? $p_one:'' ?></p>
                                </div>
                                
                             
                                <div class="d-flex mt-4">
                                   <?php 
                                       $query = "SELECT * FROM settings WHERE setting_id = '135'";
                                       $result = mysqli_query($con, $query);
                                       $row = mysqli_fetch_array($result);
                                   ?>
                                    <a class="btn btn-primary btn-square me-2" target='_blank' href="https://<?php echo $row['p_one'] ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <?php 
                                       $query = "SELECT * FROM settings WHERE setting_id = '136'";
                                       $result = mysqli_query($con, $query);
                                       $row = mysqli_fetch_array($result);
                                   ?>
                                    <a class="btn btn-primary btn-square me-2" target='_blank' href="https://<?php echo $row['p_one'] ?>"><i class="fab fa-instagram fw-normal"></i></a>
                                    <?php 
                                       $query = "SELECT * FROM settings WHERE setting_id = '137'";
                                       $result = mysqli_query($con, $query);
                                       $row = mysqli_fetch_array($result);
                                    ?>
                                     <a class="btn btn-primary btn-square me-2"  target='_blank' href="https://<?php echo $row['p_one'] ?>"><i class="fab fa-youtube fw-normal"></i></a>
                                   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-white"  style="background-color: #151515;">
            <div class="container text-center">
                <div class="row justify-content-end">
                    <div class="col-lg-8 col-md-6">
                        <div class="d-flex align-items-center  text-center" style="height: 50px;">
                            <p class="mb-0">©2022 HMG Fitness Center</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>


   

    <!-- Back to Top Button -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a> -->
     <a href="#" class="back-to-top btn btn-lg btn-primary"><i class="bi bi-arrow-up"></i></a>



   <!-- JavaScript Libraries -->
   <!--  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/wow/wow.min.js"></script>
   <!--  <script src="assets/libs/easing/easing.min.js"></script> -->
    <script src="assets/libs/waypoints/waypoints.min.js"></script>
    <script src="assets/libs/counterup/counterup.min.js"></script>
    <script src="assets/libs/owlcarousel/owl.carousel.min.js"></script>

    <!--  Javascript -->
    <script src="assets/javascript/main.js"></script>

    <!-- Back to top code -->
    <script src="assets/libs/jquery.easing/jquery.easing.min.js"></script>
</body>

</html>

