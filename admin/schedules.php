<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_schedules = "nav-expanded";
  $nav_active_dashboard_schedules  = "nav-active";
  $nav_active_schedules  = "nav-active";

 ?>
 
<?php include('head.php'); ?>

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php 
					require('sidebar.php');
				 ?>
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
								<li><span>List of Schedules</span></li>
							</ol>
							
							<?php require('assets/birthdays_count.php'); ?>

						</div>
					</header>
	
				<!-- Start -->

					<div class="row">
						
						<div class="col-xl-12">
								<section class="panel">

									<header class="panel-heading">
										<div class="panel-actions">
											<!-- <a href="#" class="fa fa-caret-down"></a> -->
											<button type="button" class="mb-xs mt-xs mr-xs btn btn-success"  data-toggle="modal" href="#addModal"><i class="fa fa-plus"></i> New Entry</button>
											<a href="schedules"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
										</div>
						
										<h2 class="panel-title">List of Schedules</h2>
									</header>

									<div class="panel-body">
										<div id="calendar" >
											
										</div>
									</div>

								</section>	

						</div>

						
					</div>

				<!-- End -->


			</section>

			<?php require('assets/calendar.php'); ?>

		</section>




	<!-- Start  Add modal -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">New Schedule</h4>
                </div>
                 <div class="modal-body">
              
          <?php 

            // $id = $_POST['id'];;
            // $query = "SELECT * FROM members WHERE id = $id";
            // $result = mysqli_query($con, $query);
            // $row = mysqli_fetch_assoc($result);
           ?>


            <form method="POST"  autocomplete="off" enctype="multipart/form-data" id="manage-schedule">

              <div class="row form-group">

              	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '' ?>">


                <div class="col-md-12">
                  <label class="control-label text-uppercase text-semibold text-dark">Member</label>
                  <select name="member_id" id="member_id" class="form-control select2" required>
						<option value=""></option>
						<?php 
							$members = $con->query("SELECT *,concat(lastname,', ',firstname) as name FROM members order by concat(lastname,', ',firstname) asc");
							while($row= $members->fetch_array()):
						?>
							<option value="<?php echo $row['member_id'] ?>" <?php echo isset($member_id) && $member_id == $row['member_id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
						<?php endwhile; ?>
						</select>
                  <br>
                </div>

                 <div class="col-md-12">
                  <label class="control-label text-uppercase text-semibold text-dark">Days of Week</label>
                  <select name="dow[]" id="" class="form-control select2" multiple="multiple" required>
					<?php 
					$dow = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
					for($i = 0; $i < 7;$i++):
					?>
					<option value="<?php echo $i ?>" <?php echo !empty($dow_arr) && in_array($i,$dow_arr) ? 'selected' : '' ?>><?php echo $dow[$i] ?></option>
				<?php endfor; ?>
				</select>
                </div>


                 <div class="col-md-12">
                  <label class="control-label text-uppercase text-semibold text-dark">Month From</label>
                 <input type="month" name="date_from" id="date_from" class="form-control" value="<?php echo isset($date_from) ? date('Y-m',strtotime($date_from)):'' ?>" required>
                  <br>
                </div>

                 <div class="col-md-12">
                  <label class="control-label text-uppercase text-semibold text-dark">Month To</label>
                 <input type="month" name="date_to" id="date_to" class="form-control" value="<?php echo isset($date_to) ? date('Y-m',strtotime($date_to)) :'' ?>" required>
                </div>

                 <div class="col-md-12">
                  <label class="control-label text-uppercase text-semibold text-dark">Time From</label>
                 <input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>" required>
                  <br>
                </div>

                 <div class="col-md-12">
                  <label class="control-label text-uppercase text-semibold text-dark" >Time To</label>
               		<input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>" required>
                </div>

             </div>
                  
                </div>
                    <div class="modal-footer">
                       
                       <button type="submit" class="btn btn-success ">Save</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      
                    </div>

              </form>



              </div>
             
              </div>
            </div>
        </div>
<!-- End Add modal -->

<style type="text/css">
	a {
		color: black;
		
	}	

	.fc-daygrid-event{
		background-color: #fff;
	}

	.fc-sticky{
		background-color: red;
	}

	.fc-list-event-time,
	.fc-list-event-graphic,
	.fc-list-event-title{
		background-color: #fff;
	}


</style>

<script>
	 $(document).ready(function(){  


		$('.select2').select2({
		placeholder:'Please Select Here',
		})

		// $(document).on('click', '.save', function(){  
		// 	// e.preventDefault();
		// 	// start_load()
		// 	//$('#msg').html('')
		// 	$.ajax({
		// 		url:'ajax.php?action=save_schedule',
		// 		data: new FormData($(this)[0]),
		// 	    cache: false,
		// 	    contentType: false,
		// 	    processData: false,
		// 	    method: 'POST',
		// 	    type: 'POST',
		// 		success:function(resp){
		// 			if(resp==1){
		// 				// alert_toast("Data successfully saved",'success')
		// 				// setTimeout(function(){
		// 				// 	location.reload()
		// 				// },1500)
		// 				Swal.fire({
		// 			          icon: 'success',
		// 			          title: 'Updated Successfully!',
		// 			          showConfirmButton: false,
		// 			          timer: 1500
		// 			        }).then((result) => {
		// 			        	 // if (result.value) {
		// 			        	  	 window.location.href = 'schedule.php';
		// 			        	 // }
					        		
		// 			        })

		// 			}
					
		// 		}
		// 	})
		// });

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
			success:function(resp){
				if(resp==1){
					// alert_toast("Data successfully saved",'success')
					// setTimeout(function(){
					// 	location.reload()
					// },1500)

					Swal.fire({
					          icon: 'success',
					          title: 'Saved Successfully!',
					          showConfirmButton: false,
					          timer: 1500
					        }).then((result) => {
					        	 // if (result.value) {
					        	  	 window.location.href = 'schedules';
					        	 // }
					        		
					        })

				}
				
			}
		})
	})
	



	 });  
	// $('#new_schedule').click(function(){
	// 	uni_modal('New Schedule','manage_schedule.php')
	// })

	$('.view_alumni').click(function(){
		uni_modal("Bio","view_alumni.php?id="+$(this).attr('data-id'),'mid-large')
		
	})

	$('.delete_alumni').click(function(){
		_conf("Are you sure to delete this alumni?","delete_alumni",[$(this).attr('data-id')])
	})
	
	function delete_alumni($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_alumni',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

// 		var calendar = new Calendar(calendarEl, {
//   height: 650
// })

	var calendarEl = document.getElementById('calendar');
    var calendar;
	document.addEventListener('DOMContentLoaded', function() {
   
        // start_load();
		 $.ajax({
		 	url:'ajax.php?action=get_schedule',
		 	method:'POST',
		 	data:{
		 		faculty_id: $(this).val()
		 	},
		 	success:function(resp){
		 		if(resp){
		 			resp = JSON.parse(resp);
		 					var evt = [];
		 			if(resp.length > 0){

		 					Object.keys(resp).map(k=>{
		 						var obj = {};

		 							obj['title'] = resp[k].name;
		 							obj['data_id'] = resp[k].id;
		 							obj['daysOfWeek'] = resp[k].dow;
		 							obj['startRecur'] = resp[k].date_from;
		 							obj['endRecur'] = resp[k].date_to;
		 							obj['startTime'] = resp[k].time_from;
		 							obj['endTime'] = resp[k].time_to;
		 							evt.push(obj);
		 					})

		 			}

		 				  calendar = new FullCalendar.Calendar(calendarEl, {
				          headerToolbar: {
				            left: 'prev,next today',
				            center: 'title',
				            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
				          },
				          // color
				          height: 1000,		           
				          eventColor: '#378006',
				          initialDate: '<?php echo date('Y-m-d') ?>',
				          weekNumbers: true,
				          navLinks: true,
				          editable: false,
				          selectable: true,
				          nowIndicator: true,
				          dayMaxEvents: true, 
				          events: evt,
				          eventClick: function(e,el) {
							   var data =  e.event.extendedProps;
								// uni_modal('Manage Schedule Details','manage_schedule.php?id='+data.data_id);

								let id = data.data_id; 

					           // $.ajax({  
					           //      url:"schedules_fetch_data.php",  
					           //      method:"POST",  
					           //      data:{id:id},  
					           //      dataType:"json",  
					           //      success:function(data){  	
					           //           $('#edit_id').val(data.id);
					           //           $('#member_id').val(data.member_id); 
					           //            $('#date_from').val(data.date_from);    
					              
					           //           $('#editModal').modal('show');  
					           //      }  
					           // });  

								window.location.href = 'manage_schedule?id='+id;
								// $('#edit_id').val(data.data_id);

								// $('#member_id').val(data.title);


								// console.log(data.data_id);
								// $('#addModal').modal('show');  
							  }
				        });
		 	}
		 	},complete:function(){
		 		calendar.render();
		 		// end_load();
		 	}
		 })

  });

	  // document.addEventListener('DOMContentLoaded', function() {
   //      var calendarEl = document.getElementById('calendar');
   //       calendar = new FullCalendar.Calendar(calendarEl, {
			// 	          headerToolbar: {
			// 	            left: 'prev,next today',
			// 	            center: 'title',
			// 	            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
			// 	          },
			// 	          initialDate: '<?php echo date('Y-m-d'); ?>',
			// 	          weekNumbers: true,
			// 	          navLinks: true,
			// 	          editable: false,
			// 	          selectable: true,
			// 	          nowIndicator: true,
			// 	          dayMaxEvents: true, 
			// 	          events: evt,
			// 	          eventClick: function(e,el) {
			// 				   var data =  e.event.extendedProps;
			// 					uni_modal('Manage Schedule Details','manage_schedule.php?id='+data.data_id)

			// 				  }
			// 	        });
   //      calendar.render();
   //    });



</script>



<?php include('footer.php'); ?>