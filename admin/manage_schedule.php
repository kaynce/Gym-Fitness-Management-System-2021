<?php 
	if (session_status() === PHP_SESSION_NONE){ session_start(); }

	$nav_dashboard_expanded_schedules = "nav-expanded";
    $nav_active_dashboard_schedules  = "nav-active";
    $nav_active_schedules  = "nav-active";
?>
 
<?php include('head.php'); ?>
	
	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php require('sidebar.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Schedule</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Schedule</span></li>
								<li><span>Edit Schedule</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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

<?php
if(isset($_GET['id'])){
$qry = $con->query("SELECT * FROM schedules where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
$dow_arr = !empty($dow) ? explode(',',$dow) : '';
}

?>

					<div class="row">
						
						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<!-- <a href="#" class="fa fa-times"></a> -->
										</div>
							
										<h2 class="panel-title"><a href="schedules" class="fa fa-chevron-left">&nbsp; &nbsp;</a>Back</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST" id="manage-schedule">

												<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '' ?>">

											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark">Member</label>
												<div class="col-md-6">


													 <select name="member_id" id="member_id" class="form-control select2" required>
													<option value=""></option>
													<?php 
														$members = $con->query("SELECT *,concat(lastname,', ',firstname) as name FROM members order by concat(lastname,', ',firstname) asc");
														while($row= $members->fetch_array()):
													?>
														<option value="<?php echo $row['member_id'] ?>" <?php echo isset($member_id) && $member_id == $row['member_id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
													<?php endwhile; ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Days of the Week</label>
												<div class="col-md-6">

													 <select name="dow[]" id="" class="form-control select2" multiple="multiple">
														<?php 
														$dow = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
														for($i = 0; $i < 7;$i++):
														?>
														<option value="<?php echo $i ?>" <?php echo !empty($dow_arr) && in_array($i,$dow_arr) ? 'selected' : '' ?>><?php echo $dow[$i] ?></option>
													<?php endfor; ?>
													</select>
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Month From</label>
												<div class="col-md-6">
													 <input type="month" name="date_from" id="date_from" class="form-control" value="<?php echo isset($date_from) ? date('Y-m',strtotime($date_from)):'' ?>">
												</div>
											</div>


											<div class="form-group">
									           <label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Month To</label>
									           <div class="col-md-6">
									           <input type="month" name="date_to" id="date_to" class="form-control" value="<?php echo isset($date_to) ? date('Y-m',strtotime($date_to)) :'' ?>">
									        	</div>
									          </div>



											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark" >Time From</label>
												<div class="col-md-6">
													<input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark">Time To</label>
												<div class="col-md-6">
												<input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
												</div>
											</div>

												<button type="submit"  id="submit" name="submit" class="mb-xs mt-xs mr-xs btn btn-success">Save</button>

												<!-- <button type="button"  id="reset" name="reset" class="mb-xs mt-xs mr-xs btn btn-primary reset">Reset</button> -->


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

<script>


 $(document).ready(function(){  

 		$('.select2').select2({
		placeholder:'Please Select Here',
		})


	$('#manage-schedule').submit(function(e){
		e.preventDefault();
		// start_load()
		// $('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_schedule',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
		    cache: false, 
			success:function(resp){

		 if(resp==1){

	 	   	// Swal.fire({
	      //      title: 'Are you sure?',
	      //       text: "",
	      //       icon: 'question',
	      //       showCancelButton: true,
	      //       confirmButtonColor: '#3085d6',
	      //       cancelButtonColor: '#d33',
	      //       confirmButtonText: 'Yes'            
	      //   }).then((result) => {
	      //       if (result.value) {   	

		             Swal.fire({
					    icon: 'success',
					    title: 'Saved Successfully!',
					    showConfirmButton: false,
					     timer: 1500
					 }).then((result) => {
					        	 // if (result.value) {
					   // window.location.href = 'manage_schedule.php?id=<?php echo $_GET['id'] ?>';
					     window.location.href = 'schedules';
					        	 // }
					        		
					})             	        
		            // End ajax
	            //}
	            // End Swal if

	        //})   
	       // End Swal

						

				}
				
			}
		})
		//End ajax
	})
	


 });


 
</script>

<?php include('footer.php'); ?>