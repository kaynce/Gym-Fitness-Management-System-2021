<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_a_t = "nav-expanded";
  $nav_active_dashboard_a_t  = "nav-active";

  $nav_dashboard_expanded_client_trainor = "nav-expanded";
  $nav_active_dashboard_client_trainor = "nav-active";

  if(isset($_GET['action'])){
  	$action = $_GET['action'];
  	if($action == 'clients'){
  		$nav_active_a_clients  = "nav-active";
  	}else{
  		$nav_active_a_trainors  = "nav-active";
  	}
  }else{
  	$nav_active_trainor  = "nav-active";
  }
  

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
				<h2>Attendance</h2>
			
				<div class="right-wrapper pull-right">
					<ol class="breadcrumbs">
						<!-- <li>
							<a href="index.php">
								<i class="fa fa-home"></i>
							</a>
						</li> -->
						<li><span>Attendance</span></li>
						<li><span>List of Attendance</span></li>
					</ol>
			
					<?php require('assets/birthdays_count.php'); ?>
				</div>
			</header>

			<?php $type = isset($_GET['action']) ? $_GET['action']: '' ?>

			<?php if($type == 'clients'){ ?>
			<div class="row">
				
				<div class="col-xl-12">
						<section class="panel">

							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="attendance"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
								</div>
				
								<h2 class="panel-title">List of Attendance | Clients</h2>
							</header>

							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<colgroup>
                                            <col width="1%">
                                            <col width="1%">
                                            <col width="5%">
                                            <col width="5%">
                                            <col width="5%">
                                          </colgroup>

                                        <thead class="text-uppercase text-semibold text-dark" style="">
                                            <tr>
                                                <th scope="col"  class="center" >#</th>
                                                <th scope="col" class="center">Action</th>
                                                <th scope="col" class="center">Member/Trainor ID</th>
                                                <th scope="col" class="center">Name</th>
                                                <th scope="col" class="center">Attendance Count</th>
                                            </tr>
                                        </thead>
                                       <tbody>
										
                                       <?php 
                                        $i = 1;
                                        // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                        // $member = "SELECT * FROM `members` ORDER BY id DESC ";
  

                                         $query = "SELECT * FROM `members` ORDER BY id DESC ";

                                         $result = mysqli_query($con, $query);
                                        

                                        while ($row = mysqli_fetch_array($result)):
                                       ?>
		                                    <tr>
		                                        <td class="center"><?php echo $i++ ?></td>
		                                 		  
		                                 		  <td class="center">
		                                             <a type="button" href="assets/ajax/view_attendance.php?member_user_id=<?php echo $row['member_id']; ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" ><i class="fa fa-folder-open"></i>&nbsp;View</a>
		                                          </td>

		                                          <td class="center">
		                                            <?php
		                                             	echo $row['member_id'];
		                                            ?>
		                                          </td>

		                                          <td class="center">
		                                            <?php 
		                                            	$member_id = $row['member_id'];

                                                  		$query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `members` WHERE member_id = '$member_id' ";
                                                  		$result_name = mysqli_query($con, $query_name);

                                                  		
                                                  		$row_name = mysqli_fetch_assoc($result_name); 
                                                  		
                                                  		 echo $row_name['name'];
                                                  	 ?>
		                                          </td>

		                                          <td class="center">
		                                            <?php 
		                                            	$member_id = $row['member_id'];

                                                  		$select_days = "SELECT DISTINCT log_date FROM `attendance` WHERE member_user_id = '$member_id' ";
							 
												        $result_days = mysqli_query($con, $select_days);

												        $total_days  = mysqli_num_rows($result_days); 
                                                  		
                                                  		 echo $total_days;
                                                  	 ?>
		                                          </td>

		                                    </tr>
		                                     <?php endwhile; ?>


		                                </tbody>

									</table>
								</div>
							</div>

						</section>	

				</div>

			</div>
			<?php }else{ ?>
			<div class="row">
				
				<div class="col-xl-12">
						<section class="panel">

							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="attendance"><button type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button></a>
								</div>
				
								<h2 class="panel-title">List of Attendance | Trainors</h2>
							</header>

							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<colgroup>
                                            <col width="1%">
                                            <col width="1%">
                                            <col width="5%">
                                            <col width="5%">
                                            <col width="5%">
                                          </colgroup>

                                        <thead class="text-uppercase text-semibold text-dark" style="">
                                            <tr>
                                                <th scope="col"  class="center" >#</th>
                                                <th scope="col" class="center">Action</th>
                                                <th scope="col" class="center">Member/Trainor ID</th>
                                                <th scope="col" class="center">Name</th>
                                                <th scope="col" class="center">Attendance Count</th>
                                            </tr>
                                        </thead>
                                       <tbody>
										
                                       <?php 
                                        $i = 1;
                                         $query = "SELECT * FROM `users` WHERE status = 'approved' ORDER BY id DESC ";
                                         $result = mysqli_query($con, $query);
                                        
                                        while ($row = mysqli_fetch_array($result)):
                                       ?>
		                                    <tr>
		                                        <td class="center"><?php echo $i++ ?></td>
		                                 		  
		                                 		  <td class="center">
		                                             <a type="button" href="assets/ajax/view_attendance.php?member_user_id=<?php echo $row['user_id']; ?>" class="modal-with-zoom-anim simple-ajax-modal  btn-sm btn-info" >View</a>
		                                          </td>

		                                          <td class="center">
		                                            <?php
		                                             	echo $row['user_id'];
		                                            ?>
		                                          </td>

		                                          <td class="center">
		                                            <?php 
		                                            	$user_id = $row['user_id'];

                                                  		$query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `users` WHERE user_id = '$user_id' ";
                                                  		$result_name = mysqli_query($con, $query_name);

                                                  		
                                                  		$row_name = mysqli_fetch_assoc($result_name); 
                                                  		
                                                  		 echo $row_name['name'];
                                                  	 ?>
		                                          </td>

		                                          <td class="center">
		                                            <?php 
		                                            	$user_id = $row['user_id'];

                                                  		$select_days = "SELECT DISTINCT log_date FROM `attendance` WHERE member_user_id = '$user_id' ";
							 
												        $result_days = mysqli_query($con, $select_days);

												        $total_days  = mysqli_num_rows($result_days); 
                                                  		
                                                  		 echo $total_days;
                                                  	 ?>
		                                          </td>

		                                    </tr>
		                                     <?php endwhile; ?>


		                                </tbody>

									</table>
								</div>
							</div>

						</section>	

				</div>

			</div>
			<?php } ?>
		</section>
	</div>

	<?php require('assets/calendar.php'); ?>


</section>

<?php include('footer.php'); ?>

<style type="text/css">
	 

.modal-dialog {
 
          width: 1000px;
 
          height: 600px!important;
 
        }

.modal-content {
 
    /* 80% of window height */
 
    height: 60%;
 
 /*   background-color:#BBD6EC;*/
 
}

.modal-header {
    background-color: #337AB7;
 
    padding:16px 16px;
 
    color:#FFF;
 
    border-bottom:2px dashed #337AB7;
 
 }
}    

</style>