<?php  if (session_status() === PHP_SESSION_NONE){ session_start(); }?>
<?php require('assets/db_connect.php'); ?>
				<aside id="sidebar-right" class="sidebar-right" style="transition: 0.5s;">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Close <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Birthday</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<!-- <time datetime="2012-04-19T00:00+00:00">12/27/2022</time>
										<span>Birthday</span> -->
									</li>
								</ul>
							</div>
						
							<!-- <div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div> -->
							
							<div class="sidebar-widget widget-friends">
								<h6>Client's Birthdays</h6>
								<ul>
							
									<table class="table table-bordered mb-none" id="clients_table">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Clients</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$i = 1;
											$date = new DateTime();
											$certain_date = $date->format('M d, Y');

											//Get the date today 
										    $today = substr($date->format('M d, Y'), 0, 6);

											$query = "SELECT * FROM `members` WHERE CAST(date_of_birth AS Datetime) >= '$certain_date' ORDER BY date_of_birth ASC";

											// $query = "SELECT column_names FROM table1 CROSS JOIN table2";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_assoc($result)):
										 ?>
										 <tr class="text-center">
											 <td>
											 	<?php echo $i++; ?>
											 </td>
											 <td>
												<li class="">
												<!-- <li class="status-online"> -->
													<figure class="profile-picture">
														<?php if(!empty($row['image'])){ ?>
															<img src="../assets/images/users/<?php echo $row['image'] ?>" class="img-circle">
														<?php }else{ ?>
															<img src="../assets/images/default-avatar.jpg" class="img-circle">
														<?php } ?>
													</figure>
													<div class="profile-info">
														<span class="name"><?php echo ucwords($row['lastname']) ?>, <?php echo ucwords($row['firstname']) ?></span>
														<span class="title">Birthday: 
														<?php if(!empty($row['date_of_birth'])){ ?>
															<?php echo substr(date("M d, Y", strtotime($row['date_of_birth'])), 0, 6); ?>
															<?php 
																$date_db = date("M d, Y", strtotime($row['date_of_birth']));
									        					$date_of_birth = substr($date_db, 0, 6);
															 ?>

															<?php if($today == $date_of_birth){ ?>
																&nbsp;
																<span class="label label-success">TODAY</span>
															<?php } ?>
														<?php } ?>
														</span>
														<span class="">Age: <?php echo $row['age'] + 1;  ?></span>
													</div>
												</li>
												</td>
										</tr>
										<?php endwhile; ?>
										</tbody>
									</table>
								</ul>
							</div>
							<!-- End -->
							<hr class="separator">
							<div class="sidebar-widget widget-friends">
								<h6>Trainors & Sub-Admin Birthdays</h6>
								<ul>

									<table class="table table-bordered  mb-none" id="trainors_sub_admin_table">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Trainors & Sub-Admin</th>
											</tr>
										</thead>
										<tbody>

									<?php 
										$i = 1;
										// $query = "SELECT *
										//           FROM members 
										//           INNER JOIN users ";

										$query = "SELECT * FROM `users` WHERE type != 'admin' ORDER BY date_of_birth ASC";

										// $query = "SELECT column_names FROM table1 CROSS JOIN table2";
										$result = mysqli_query($con, $query);

										while($row = mysqli_fetch_assoc($result)):
									 ?>
									  <tr class="text-center">
										 
										  <td>
										 	<?php echo $i++; ?>
										 </td>

										 <td>
											<li class="">
											<!-- <li class="status-online"> -->
												<figure class="profile-picture">
													<?php if(!empty($row['image'])){ ?>
														<img src="../assets/images/users/<?php echo $row['image'] ?>" class="img-circle">
													<?php }else{ ?>
														<img src="../assets/images/default-avatar.jpg" class="img-circle">
													<?php } ?>
												</figure>
												<div class="profile-info">
													<span class="name"> <?php echo ucwords($row['lastname']) ?>, <?php echo ucwords($row['firstname']) ?></span>
													<span class="title">Birthday: 
													<?php if(!empty($row['date_of_birth'])){ ?>
														<?php echo substr(date("M d, Y", strtotime($row['date_of_birth'])), 0, 6); ?>
														<?php 
															$date_db = date("M d, Y", strtotime($row['date_of_birth']));
								        					$date_of_birth = substr($date_db, 0, 6);
														 ?>

														<?php if($today == $date_of_birth){ ?>
															&nbsp;
															<span class="label label-success">TODAY</span>
														<?php } ?>
													<?php } ?>
													</span>
													<span class="">Age: <?php echo $row['age'] ?></span>
												</div>
											</li>
										</td>
									</tr>
									<?php endwhile; ?>
									</tbody>
								</table>

								</ul>
							</div>

						</div>
					</div>
				</div>
			</aside>

<script type="text/javascript">
	$(document).ready(function(){
		$('#clients_table').DataTable();
		$('#trainors_sub_admin_table').DataTable();
	})
</script>