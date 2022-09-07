
 <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0" >
    <a href="index" class="navbar-brand p-0">
        <a href="index"><img src="assets/images/hmg-fitness-center-gym-logo.png" class="fadeIn" alt="HMG FItness Center Gym Logo" data-appear-animation="fadeInUpBig" style="min-height: 100%; height: 13vh; "></a>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index" class="nav-item nav-link <?php echo $home ?> text-uppercase text-semibold ">Home</a>
            <a href="blog" class="nav-item nav-link <?php echo $blog ?> text-uppercase text-semibold ">Blog</a>
            <a href="about-us" class="nav-item nav-link <?php echo $about_us ?> text-uppercase text-semibold">About Us</a>
            <a href="services" class="nav-item nav-link <?php echo $services ?> text-uppercase text-semibold">Services</a>

<!-- To know if the schedule is off -->
<?php 
$query = "SELECT * FROM `settings` WHERE setting_id = '123' ";

$result = mysqli_query($con, $query);
$row_setting = mysqli_fetch_assoc($result);

if($row_setting['status'] == 1){ ?>
            <a href="schedule" class="nav-item nav-link <?php echo $schedule ?> text-uppercase text-semibold">Schedule</a>
<?php } ?>
            <a href="pricing" class="nav-item nav-link <?php echo $pricing ?> text-uppercase text-semibold">Pricing</a>
            <a href="contact" class="nav-item nav-link <?php echo $contact ?> text-uppercase text-semibold">Contact</a>
            <a href="login" class="nav-item nav-link <?php echo $login ?> text-uppercase text-semibold">Login</a>
        </div>
       <!--  <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->

    </div>
</nav>