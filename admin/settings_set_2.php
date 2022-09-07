<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_settings = "nav-expanded";
  $nav_active_dashboard_settings  = "nav-active";
  $nav_active_dashboard_settings_set_2  = "nav-active";

 ?>
 
<?php include('head.php'); ?>


<?php 
	if(isset($_POST['submit'])){

    //First section 
    $title = mysqli_real_escape_string($con, trim($_POST['title']));
    $sub_title = mysqli_real_escape_string($con, trim($_POST['sub_title']));
    $paragraph_1 = mysqli_real_escape_string($con, trim($_POST['paragraph_1']));
    $paragraph_2 = mysqli_real_escape_string($con, trim($_POST['paragraph_2']));
    $paragraph_3 = mysqli_real_escape_string($con, trim($_POST['paragraph_3']));
    $paragraph_4 = mysqli_real_escape_string($con, trim($_POST['paragraph_4']));

    //Tuesday
    $query = "UPDATE `settings` 
       SET p_one = '$title',
           p_two = '$sub_title',
           p_three = '$paragraph_1',
           p_four = '$paragraph_2',
           p_five = '$paragraph_3',
           p_six = '$paragraph_4'
         WHERE setting_id = '141'";
   $result =  mysqli_query($con, $query); 
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
							window.location.href = 'settings_set_2';
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
							
										<h2 class="panel-title"><a href="members"></a>Update</h2>


									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST"  enctype="multipart/form-data">

											<p id="errorMs"></p>

											

											<h3 class="panel-title">Client Waiver</h3>

										       <!--     -------------- -->
										      <?php 
										             $query = "SELECT * FROM settings WHERE setting_id = '141'";
										             $result = mysqli_query($con, $query);
										             $result_2 = mysqli_fetch_array($result);
										             foreach($result_2 as $store =>$catch){
										                          $$store = $catch;
										             }
										       ?>
										      <div class="form-group">
										        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Title</label>
										        <div class="col-md-6">
										         <input type="text" class="form-control"   id="title" name="title" value="<?php echo isset($p_one) ? $p_one:'' ?>" placeholder="Input title here">
										        </div>
										      </div>
										      <!--     -------------- -->
										       <!--     -------------- -->
										      <div class="form-group">
										        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Sub Title</label>
										        <div class="col-md-6">
										         <input type="text" class="form-control"   id="sub_title" name="sub_title" value="<?php echo isset($p_two) ? $p_two:'' ?>" placeholder="Input sub title here">
										        </div>
										      </div>
										      <!--     -------------- -->
										      <div class="form-group">
										        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Paragraph 1</label>
										        <div class="col-md-6">
										          <textarea rows="10" id="paragraph_1" name="paragraph_1"  class="form-control" placeholder="Input address here"><?php echo isset($p_three) ? $p_three : '' ?></textarea>
										        </div>
										      </div>
										      <!--     -------------- -->

										       <!--     -------------- -->
										      <div class="form-group">
										        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Paragraph 2</label>
										        <div class="col-md-6">
										          <textarea rows="10" id="paragraph_2" name="paragraph_2"  class="form-control" placeholder="Input address here"><?php echo isset($p_four) ? $p_four : '' ?></textarea>
										        </div>
										      </div>
										      <!--     -------------- -->

										       <!--     -------------- -->
										      <div class="form-group">
										        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Paragraph 3</label>
										        <div class="col-md-6">
										          <textarea rows="10" id="paragraph_3" name="paragraph_3"  class="form-control" placeholder="Input address here"><?php echo isset($p_five) ? $p_five : '' ?></textarea>
										        </div>
										      </div>
										      <!--     -------------- -->

										       <!--     -------------- -->
										      <div class="form-group">
										        <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Paragraph 4</label>
										        <div class="col-md-6">
										          <textarea rows="10" id="paragraph_4" name="paragraph_4"  class="form-control" placeholder="Input address here"><?php echo isset($p_one) ? $p_six : '' ?></textarea>
										        </div>
										      </div>
										      <!--     -------------- -->
                      


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