<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_settings = "nav-expanded";
  $nav_active_dashboard_settings  = "nav-active";
  $nav_active_dashboard_settings_set_1  = "nav-active";

 ?>
 
<?php include('head.php'); ?>


<?php 
	if(isset($_POST['submit'])){

    //First section 
    $first_section_p = mysqli_real_escape_string($con, trim($_POST['first_section_p']));
    $first_section_headline = mysqli_real_escape_string($con, trim($_POST['first_section_headline']));
    $first_section_p_2 = mysqli_real_escape_string($con, trim($_POST['first_section_p_2']));
    $first_section_headline_2 = mysqli_real_escape_string($con, trim($_POST['first_section_headline_2']));

    //Tuesday
    $query = "UPDATE `settings` 
       SET p_one = '$first_section_p',
           p_two = '$first_section_headline',
           p_three = '$first_section_p_2',
           p_four = '$first_section_headline_2'
         WHERE setting_id = '131'";
    mysqli_query($con, $query); 
    //End

		$monday_time_from = $_POST['monday_time_from'];
		$monday_time_to = $_POST['monday_time_to'];

		$tuesday_time_from = $_POST['tuesday_time_from'];
		$tuesday_time_to = $_POST['tuesday_time_to'];

		$wednesday_time_from = $_POST['wednesday_time_from'];
		$wednesday_time_to = $_POST['wednesday_time_to'];

		$thursday_time_from = $_POST['thursday_time_from'];
		$thursday_time_to = $_POST['thursday_time_to'];

		$friday_time_from = $_POST['friday_time_from'];
		$friday_time_to = $_POST['friday_time_to'];

		$saturday_time_from = $_POST['saturday_time_from'];
		$saturday_time_to = $_POST['saturday_time_to'];

		$sunday_time_from = $_POST['sunday_time_from'];
		$sunday_time_to = $_POST['sunday_time_to'];

		//Monday
		$query = "UPDATE `settings` 
			 SET time_from = '$monday_time_from',
			 	 time_to = '$monday_time_to'
				 WHERE setting_id = '124'";

		mysqli_query($con, $query); 

		//Tuesday
		$query = "UPDATE `settings` 
			 SET time_from = '$tuesday_time_from',
			 	 time_to = '$tuesday_time_to'
				 WHERE setting_id = '125'";

		mysqli_query($con, $query); 

		//Wednesday
		$query = "UPDATE `settings` 
			 SET time_from = '$wednesday_time_from',
			 	 time_to = '$wednesday_time_to'
				 WHERE setting_id = '126'";

		mysqli_query($con, $query); 

		//Thursday
		$query = "UPDATE `settings` 
			 SET time_from = '$thursday_time_from',
			 	 time_to = '$thursday_time_to'
				 WHERE setting_id = '127'";

		mysqli_query($con, $query); 

		//Friday
		$query = "UPDATE `settings` 
			 SET time_from = '$friday_time_from',
			 	 time_to = '$friday_time_to'
				 WHERE setting_id = '128'";

		mysqli_query($con, $query); 

		//Saturday
		$query = "UPDATE `settings` 
			 SET time_from = '$saturday_time_from',
			 	 time_to = '$saturday_time_to'
				 WHERE setting_id = '129'";

		mysqli_query($con, $query); 

		//Sunday
		$query = "UPDATE `settings` 
			 SET time_from = '$sunday_time_from',
			 	 time_to = '$sunday_time_to'
				 WHERE setting_id = '130'";

		 mysqli_query($con, $query); 

    //About us
    // $about_us = mysqli_real_escape_string($con, trim($_POST['about_us']));
    // $query = "UPDATE `settings` 
    //    SET p_one = '$about_us'
    //      WHERE setting_id = '132'";

    // mysqli_query($con, $query); 

    //Address
    $address = mysqli_real_escape_string($con, trim($_POST['address']));
    $query = "UPDATE `settings` 
       SET p_one = '$address'
         WHERE setting_id = '138'";

    mysqli_query($con, $query); 

    //==========Start Bullet
    // $p_one = mysqli_real_escape_string($con, trim($_POST['bullet_1']));
    // $query = "UPDATE `settings` 
    //    SET p_one = '$p_one'
    //      WHERE setting_id = '139'";

    // mysqli_query($con, $query); 
    // //---------
    // $p_two = mysqli_real_escape_string($con, trim($_POST['bullet_2']));
    // $query = "UPDATE `settings` 
    //    SET p_two = '$p_two'
    //      WHERE setting_id = '139'";

    // mysqli_query($con, $query);
    // //---------
    // $p_three = mysqli_real_escape_string($con, trim($_POST['bullet_3']));
    // $query = "UPDATE `settings` 
    //    SET p_three = '$p_three'
    //      WHERE setting_id = '139'";

    // mysqli_query($con, $query);
    // //-----------
    // $p_four = mysqli_real_escape_string($con, trim($_POST['bullet_4']));
    // $query = "UPDATE `settings` 
    //    SET p_four = '$p_four'
    //      WHERE setting_id = '139'";

    // mysqli_query($con, $query);
    // //---------------
    // $p_five = mysqli_real_escape_string($con, trim($_POST['bullet_5']));
    // $query = "UPDATE `settings` 
    //    SET p_five = '$p_five'
    //      WHERE setting_id = '139'";

    // mysqli_query($con, $query);
    //--------
    //==========End Bullet

    //Contact
    $contact = mysqli_real_escape_string($con, trim($_POST['contact']));
    $query = "UPDATE `settings` 
       SET p_one = '$contact'
         WHERE setting_id = '133'";

     mysqli_query($con, $query); 

   //Email
    // $email = $_POST['email'];
    // $query = "UPDATE `settings` 
    //    SET p_one = '$email'
    //      WHERE setting_id = '134'";

    // $result = mysqli_query($con, $query); 


    //Social Media
    //Facebook
    $facebook = mysqli_real_escape_string($con, trim($_POST['facebook']));
    $query = "UPDATE `settings` 
       SET p_one = '$facebook'
         WHERE setting_id = '135'";

   mysqli_query($con, $query); 

    //Instagram
   $instagram = mysqli_real_escape_string($con, trim($_POST['instagram']));
    $query = "UPDATE `settings` 
       SET p_one = '$instagram'
         WHERE setting_id = '136'";

    mysqli_query($con, $query); 

   //Youtube
    $youtube = mysqli_real_escape_string($con, trim($_POST['youtube']));
    $query = "UPDATE `settings` 
       SET p_one = '$youtube'
         WHERE setting_id = '137'";

    $result = mysqli_query($con, $query); 
    //End


    //Start Gcash
   $gcash_number = mysqli_real_escape_string($con, trim($_POST['gcash_number']));
    $query = "UPDATE `settings` 
       SET p_one = '$gcash_number'
         WHERE setting_id = '140'";

    mysqli_query($con, $query); 

   //Youtube
    $gcash_name = mysqli_real_escape_string($con, trim($_POST['gcash_name']));
    $query = "UPDATE `settings` 
       SET p_two = '$gcash_name'
         WHERE setting_id = '140'";

    $result = mysqli_query($con, $query); 
    //End


		if($result){
			?>
				<script type="text/javascript">
					Swal.fire({
						icon: 'success',
						title: 'Updated Successfully!',
						showConfirmButton: false,
						timer: 1500
				}).then((result) => {
				// if (result.value) {
							window.location.href = 'settings_set_1';
				// }
								        		
				})
				</script>
			<?php
		}

	}
 ?>

<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

	
	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php require('sidebar.php'); ?>
				<!-- end: sidebar -->


				

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Settings</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Settings</span></li>
							<!-- 	<li><span>Add Trainor</span></li> -->
							</ol>
					
						  <?php require('assets/birthdays_count.php'); ?> 
						</div>
					</header>

				<div class="row">

					<!-- start: page -->
					<div class="row">
					
						<!-- <div class="col-md-6 col-lg-12 col-xl-6"> -->
						<div class="">
							<div class="row">
							<!-- 	<div class="col-md-12 col-lg-4 col-xl-4"> -->
								
								
							

							</div>
						</div>
					</div>

					<div class="row">
						

						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<!-- <a href="#" class="fa fa-times"></a> -->
										</div>
							
										<h2 class="panel-title">Update</h2>


									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST"  enctype="multipart/form-data">

											<p id="errorMs"></p>

											

										<!-- 	<br> -->

											<!-- <div class="form-group">
												<label class="col-md-3 control-label"></label>
												<div class="col-md-6">

													 <div class="gallery">
														<img src="../assets/images/default-image.png" id="preImg">
													</div>
												</div>
											</div> -->

											

											<!--  <h3 class="panel-title">First Section</h3>
											 <?php 
       
											  
											       $id = $_GET['id'];
											       $query = "SELECT * FROM settings";
											       $result = mysqli_query($con, $query);
											       $result_2 = mysqli_fetch_array($result);
											       foreach($result_2 as $store =>$catch){
											                    $$store = $catch;
											       }
											    
											 ?>

											<div class="form-group">
												<label class="col-md-3 control-label">Paragraph</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="50" id="lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname:'' ?>" placeholder="Last name" onclick="document.getElementById('lastname').value = ''">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >H2</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"   maxlength="50"  id="firstname" name="firstname" value="<?php echo isset($firstname) ? $firstname:'' ?>" placeholder="First name" >
												</div>
											</div>
 -->											


											<!--  <h3 class="panel-title">Second Section Left</h3>
											<div class="form-group">
												<label class="col-md-3 control-label">Left Column</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="50" id="lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname:'' ?>" placeholder="Last name" onclick="document.getElementById('lastname').value = ''">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" >H2</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"   maxlength="50"  id="firstname" name="firstname" value="<?php echo isset($firstname) ? $firstname:'' ?>" placeholder="First name" >
												</div>
											</div> -->

											<h3 class="panel-title">First Section</h3>

                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '131'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                $$store = $catch;
                             }
                       ?>


                      <center><h3>First Pic</h3></center>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Paragraph</label>
                        <div class="col-md-6">
                        <textarea rows="2" id="first_section_p" name="first_section_p"  maxlength="100" class="form-control" placeholder="Input text here"><?php echo isset($p_one) ? $p_one : '' ?></textarea>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Headline</label>
                        <div class="col-md-6">
                         <textarea rows="3" id="first_section_headline" name="first_section_headline"  maxlength="100" class="form-control" placeholder="Input text here"><?php echo isset($p_two) ? $p_two : '' ?></textarea>
                        </div>
                      </div>

                      <center><h3>Second Pic</h3></center>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Paragraph</label>
                        <div class="col-md-6">
                        <textarea rows="2" id="first_section_p_2" name="first_section_p_2"  maxlength="100" class="form-control" placeholder="Input text here "><?php echo isset($p_three) ? $p_three : '' ?></textarea>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Headline</label>
                        <div class="col-md-6">
                         <textarea rows="3" id="first_section_headline_2" name="first_section_headline_2"  maxlength="100" class="form-control" placeholder="Input text here"><?php echo isset($p_four) ? $p_four : '' ?></textarea>
                        </div>
                      </div>

                     <!--   <hr class="separator">  
                      <h3 class="panel-title">Second Section Left</h3>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '139'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);

                              $row_bullet_1 = mysqli_real_escape_string($con, $result_2['p_one']);
                              $row_bullet_2 = mysqli_real_escape_string($con, $result_2['p_two']);
                              $row_bullet_3 = mysqli_real_escape_string($con, $result_2['p_three']);
                              $row_bullet_4 = mysqli_real_escape_string($con, $result_2['p_four']);
                              $row_bullet_5 = mysqli_real_escape_string($con, $result_2['p_five']);
                    
                       ?>
                       <br>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Bullet 1</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  maxlength="100" id="bullet_1" name="bullet_1" value="<?php echo $row_bullet_1; ?>" placeholder="Input bullet 1 here">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Bullet 2</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  maxlength="100" id="bullet_2" name="bullet_2" value="<?php echo $row_bullet_2; ?>" placeholder="Input bullet 2 here">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Bullet 3</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  maxlength="100" id="bullet_3" name="bullet_3" value="<?php echo  $row_bullet_3; ?>" placeholder="Input bullet 3 here">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Bullet 4</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  maxlength="100" id="bullet_4" name="bullet_4" value="<?php echo  $row_bullet_4; ?>" placeholder="Input bullet 4 here">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Bullet 5</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  maxlength="100" id="bullet_5" name="bullet_5" value="<?php echo  $row_bullet_5; ?>" placeholder="Input bullet 5 here">
                        </div>
                      </div> -->
                      <!--     -------------- -->


                      <hr class="separator">  
											<h3 class="panel-title">Second Section Right</h3>

                      <center><h3>Gym Hours</h3></center>
                       

                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '124'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Monday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </span>
                            <input type="time" class="form-control" name="monday_time_from" id="monday_time_from" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="monday_time_to" id="monday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '125'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Tuesday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                              <input type="time" class="form-control" name="tuesday_time_from" id="tuesday_time_from" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="tuesday_time_to" id="tuesday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '126'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Wednesday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                              <input type="time" class="form-control" name="wednesday_time_from" id="wednesday_time_from" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="wednesday_time_to" id="wednesday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '127'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Thursday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                              <input type="time" class="form-control" name="thursday_time_from" id="thursday_time_from" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="thursday_time_to" id="thursday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '128'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Friday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                              <input type="time" class="form-control" name="friday_time_from" id="friday_time_from" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="friday_time_to" id="friday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '129'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Saturday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                              <input type="time" class="form-control" name="saturday_time_from" id="saturday_time_to" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="saturday_time_to" id="saturday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>

                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '130'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Sunday</label>
                        <div class="col-md-6">
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                              <input type="time" class="form-control" name="sunday_time_from" id="sunday_time_from" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                            <span class="input-group-addon">to</span>
                            <input type="time" class="form-control" name="sunday_time_to" id="sunday_time_to" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                          </div>
                        </div>
                      </div>
                  <!--     -------------- -->
                      <!--  <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '132'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >About Us</label>
                        <div class="col-md-6">
                          <textarea rows="10" id="about_us" name="about_us"   class="form-control" placeholder="Input about us here"><?php echo isset($p_one) ? $p_one : '' ?></textarea>
                        </div>
                      </div> -->
                     <!--     -------------- -->
                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '138'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Address</label>
                        <div class="col-md-6">
                          <textarea rows="10" id="address" name="address"  maxlength="100" class="form-control" placeholder="Input address here"><?php echo isset($p_one) ? $p_one : '' ?></textarea>
                        </div>
                      </div>
                      <!--     -------------- -->
                      <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '133'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Contact</label>
                        <div class="col-md-6">
                         <input type="number" class="form-control"  maxlength="50" id="contact" name="contact" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input contact here">
                        </div>
                      </div>
                      <!--     -------------- -->
                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '134'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <!-- <div class="form-group">
                        <label class="col-md-3 control-label" >Email</label>
                        <div class="col-md-6">
                         <input type="email" class="form-control"  maxlength="50" id="email" name="email" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input email here">
                        </div>
                      </div> -->

                      <!--     -------------- -->
                      <!-- Start Social Media -->
                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '135'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Facebook</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  id="facebook" name="facebook" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input Facebook link here">
                        </div>
                      </div>
                      <!--     -------------- -->
                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '136'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Instagram</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  id="instagram" name="instagram" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input Instagram link here">
                        </div>
                      </div>
                      <!--     -------------- -->
                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '137'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Youtube</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input Youtube link here">
                        </div>
                      </div>
                      <!-- End Social Media -->
                      <!--     -------------- -->

                       <!-- Start Gcash -->
                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '140'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >HMG Business Gcash Number</label>
                        <div class="col-md-6">
                         <input type="number" class="form-control"  id="gcash_number" name="gcash_number" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input gcash number here">
                        </div>
                      </div>

                       <?php 
                             $query = "SELECT * FROM settings WHERE setting_id = '140'";
                             $result = mysqli_query($con, $query);
                             $result_2 = mysqli_fetch_array($result);
                             foreach($result_2 as $store =>$catch){
                                          $$store = $catch;
                             }
                       ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Name</label>
                        <div class="col-md-6">
                         <input type="text" class="form-control"  maxlength="50" id="gcash_name" name="gcash_name" value="<?php echo isset($p_two) ? $p_two:'' ?>" placeholder="Input gcash name here">
                        </div>
                      </div>
                      <!-- End Gcash -->

                      <?php 
                        

                      ?>

                    
                          
                       <div class="form-group">
                        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Maintenance Switch</label>
                        <div class="col-md-6">
                            <?php 
                                $query_maintenance = "SELECT * FROM `settings` WHERE setting_id = '143'";
                                $result_maintenance = mysqli_query($con, $query_maintenance);
                                $row_maintenance = mysqli_fetch_assoc($result_maintenance);

                                if ($row_maintenance['p_one'] == 1) {
                                ?>
                                  <a class="mb-xs mt-xs mr-xs  btn btn-success switch" >: ON</a>
                                <?php 
                                }else{
                                 ?>
                                  <a class="mb-xs mt-xs mr-xs  btn btn-danger switch" >: OFF</a>
                                <?php 
                          
                              }
                            ?>

                            <input type="hidden" id="maintenance_p_one" name="maintenance_p_one" value="<?php echo $row_maintenance['p_one'] ?>">

                            <input type="hidden" id="maintenance_id" name="maintenance_id" value="<?php echo $row_maintenance['id'] ?>">
                        </div>
                      </div>

                      <br>

											<button type="submit"  id="add" name="submit" class="mb-xs mt-xs mr-xs btn btn-success ">Update</button>

											

										</form>
									</div>
								</section>

						</div>

						
					</div>
					
					<!-- end: page -->
				</section>

			</div>
		
		<?php require('assets/calendar.php'); ?>


		</section>

<?php include('footer.php'); ?>

<script type="text/javascript">

   $(document).on('click', '.switch', function(){  
        
        Swal.fire({
           title: 'Do you want to alter the switch?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              var id = $("#maintenance_id").val();
              var p_one = $("#maintenance_p_one").val();
             
              $.ajax({  
                  url:'ajax.php?action=maintenance_action',
                  type:'post',
                  data:{
                      id:id,
                      p_one:p_one
                  },
                  cache: false, 
                  success:function(data, resp){

                  console.log(data);
                  console.log(resp);

                  if(data == 1){

                    Swal.fire({
                          icon: 'success',
                          title: 'Maintenance has been successfully switched on!',
                          showConfirmButton: false,
                          timer: 1500
                        }).then((result) =>{
                             window.location.href = 'settings_set_1';
                        })

                  }else if(data == 2){

                    Swal.fire({
                          icon: 'success',
                          title: 'Classes timetable has been successfully switched off!',
                          showConfirmButton: false,
                          timer: 1500
                        }).then((result) =>{
                             window.location.href = 'settings_set_1';
                        })

                  }else{

                    Swal.fire({
                          icon: 'warning',
                          title: 'Something went wrong!',

                        })

                  }
            }

      }); 

     

      }
  })     
}); 
//End
</script>

