<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php include('head.php'); ?>
  
    <div id="main-wrapper">

        <?php include('header.php'); ?>


        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="container-fluid"> 
                <div class="card">


                	<div class="col-md-10 mt-5 pt-5">
                		<div class="row z-depth-3">
                			<div class="col-sm-4 bg-info rounded-left">
                				<div class="card-block text-center text-white">
                					<i class="fas fa-user-tie fa-7x mt-5"></i>
                					<h2 class="font-weight-bold mt-4">Nick</h2>
                					<p>Web Designer</p>
                					<i class="far fa-edit fa-2x mt-4"></i>
                				</div>
                			</div>

                			<div class="col-sm-8 bg-white rounded-right">
                				<h3 class="mt-3 text-center">Information</h3>
                				<hr class="badge-primary mt-0 w-25">
                				<div class="row">
                					<div class="col-sm-6">
                						<p class="font-weight-bold">Email</p>
                						<h2 class="text-muted">ni@gmail.com</h2>
                					</div>
                					<div class="col-sm-6">
                						<p class="font-weight-bold">asda</p>
                						<h2 class="text-muted">0999999999</h2>
                					</div>
                				</div>

                				<h4 class="mt-3">Projects</h4>
                				<hr class="bg-primary">
                				<div class="row">
                					<div class="col-sm-6">
                						<p class="font-weight-bold">Email</p>
                						<h2 class="text-muted">ni@gmail.com</h2>
                					</div>
                					<div class="col-sm-6">
                						<p class="font-weight-bold">asda</p>
                						<h2 class="text-muted">0999999999</h2>
                					</div>
                				</div>

                				<hr class="bg-primary">
                				<ul class="list-unstyled d-flex justify-content-center mt-4">
                					<li><a href="#"><i class="fab fa-facebook px-3 h4 text"></i></a></li>
                					<li><a href="#"><i class="fab fa-youtube px-3 h4 text"></i></a></li>
                					<li><a href="#"><i class="fab fa-twitter px-3 h4 text"></i></a></li>
                				</ul>
                			</div>
                		</div>
                	</div>

                </div>
            </div>   <!-- End Container fluid  -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End main wrapper -->



<?php include('footer.php'); ?>