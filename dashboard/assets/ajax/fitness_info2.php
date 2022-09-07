<?php 
if (session_status() === PHP_SESSION_NONE){ 
 	session_start(); 
 }

//Unset walk in
unset($_SESSION['for_receipt_one_day']);
unset($_SESSION['for_receipt_amount']);

//Unset trainor info
unset($_SESSION['for_receipt_trainor_name'] );
unset($_SESSION['for_receipt_about_me']);
unset($_SESSION['for_receipt_motto']);
unset($_SESSION['for_receipt_weight']);
unset($_SESSION['for_receipt_height']);

//Unset Package info
unset($_SESSION['for_receipt_package_name']);
unset($_SESSION['for_receipt_duration']);
unset($_SESSION['for_receipt_session']);

require(dirname(__FILE__).'/../../../admin/assets/db_connect.php');
  
$package_id = substr($_GET['value'], 0, 3);
$client_type = substr($_GET['value'], 3);

 $query= "SELECT * FROM `physical_fitness_packages_rates` WHERE package_id='".$package_id."'";

 $result = mysqli_query($con,$query);

 if($result){

 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 	$duration = '';

 	if (!empty($row['day'])) {
 		$duration = $row['day'].' Day/s';
 	}else if(!empty($row['week'])){
 		$duration = $row['week'].' Week/s';
 	}else if(!empty($row['month'])){
 		$duration = $row['month'].' Month/s';
 	}else{}

 	if (!empty($row['session'])) {
 		$session = $row['session'];
 	}else if($row['session'] == '') {
 		$session = $row['session'];
 	}else{
 		$session = 'UNLIMITED';
 	}

 	$required_trainor = '';
 	if (!empty($row['required_trainor'])) {
 		$required_trainor = $row['required_trainor'];
 	}

 	if($client_type == 'STUDENT'){
 		$amount = number_format($row['package_student_amount'], 2);
 		$amount_default = $row['package_student_amount'];
 	}else{
 		$amount = number_format($row['package_non_student_amount'], 2);
 		$amount_default = $row['package_non_student_amount'];
 	}

 	if($required_trainor == 'YES'){

 		$physical_fitness_id = $row['physical_fitness_id'];

 		$query_trainor = "SELECT * FROM trainor_physical_fitness WHERE physical_fitness_id = '$physical_fitness_id' ORDER BY id ASC";

		$result_trainor = mysqli_query($con, $query_trainor);


 		if(mysqli_num_rows($result_trainor) <  1){

			echo "<div class='form-group'>
				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>NO AVAILABLE TRAINOR:</label>
				        <div class='col-md-6' >
				        	<select type='text' class='form-control dropdown' id='not_available' name='not_available' required>
								<option></option>
							</select>
				        </div>
				  </div>";

		}else{

			$row_availability = mysqli_fetch_assoc($result_trainor);
			$user_id = $row_availability['user_id'];

			//Check trainor availability 
			$query_availability = "SELECT * FROM users WHERE status ='approved' AND type = 'trainor' AND availability = '1' AND user_id = '$user_id' ORDER BY concat(lastname,', ',firstname) DESC ";
			$result_availability = mysqli_query($con, $query_availability);
			
			if(mysqli_num_rows($result_availability) != 1){
				echo "<div class='form-group'>
				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>NO AVAILABLE TRAINOR:</label>
				        <div class='col-md-6' >
				        	<select type='text' class='form-control dropdown' id='not_available' name='not_available' required>
								<option></option>
							</select>
				        </div>
				  </div>";
			}else{

					//Check if the client is pending or not : status = null
					if(isset($_SESSION['email'])){
							$email = $_SESSION['email'];

							$query_status = "SELECT * FROM `pending_members` WHERE email = '$email' ";
							$result_status = mysqli_query($con, $query_status);

							if(mysqli_num_rows($result_status) == 1){
								$row_status = mysqli_fetch_assoc($result_status);
								$status = $row_status['status'];
							}else{
								$query_status = "SELECT * FROM `members` WHERE email = '$email' ";
							    $result_status = mysqli_query($con, $query_status);

								if(mysqli_num_rows($result_status) == 1){
									$row_status = mysqli_fetch_assoc($result_status);
									$status = $row_status['status'];
								}
							}
					}
					//For registration only
					if(empty($status) == TRUE){
							echo "<div class='form-group'>
								<label class='col-md-3 control-label text-semibold text-dark text-uppercase' for='trainors_classes'>Choose Trainor</label>
									<div class='col-md-6'>
									    <select class='form-control' id='trainor' name='trainor'  class='custom-select select2'  onchange='trainorInfoReg(this.value)' required>
											<option></option>";
											
											// $query = "SELECT *,concat(lastname,', ',firstname) as name from users WHERE status ='approved' AND type = 'trainor' AND availability = '1' order by concat(lastname,', ',firstname) desc ";
											$query_trainor = "SELECT * FROM trainor_physical_fitness WHERE physical_fitness_id = '$physical_fitness_id' ORDER BY id ASC";

											$result_trainor = mysqli_query($con, $query_trainor);

											 while($row_trainor= mysqli_fetch_assoc($result_trainor)):
											 	  $user_id = $row_trainor['user_id'];

													$query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND type = 'trainor' AND availability = '1' AND user_id = '$user_id' ORDER BY concat(lastname,', ',firstname) DESC ";

													$result_name = mysqli_query($con, $query_name);
													$row_name = mysqli_fetch_assoc($result_name);	

											echo "<option value='".$row_name['user_id']."'>".ucwords($row_name['name'])."</option>";
											 endwhile;

							echo "</select>
							 </div>
						</div>";
					}else{
						//For renewal
							echo "<div class='form-group'>
								<label class='col-md-3 control-label text-semibold text-dark text-uppercase' for='trainors_classes'>Choose Trainor</label>
									<div class='col-md-6'>
									    <select class='form-control' id='trainor' name='trainor'  class='custom-select select2'  onchange='trainorInfo(this.value)' required>
											<option></option>";
											
											// $query = "SELECT *,concat(lastname,', ',firstname) as name from users WHERE status ='approved' AND type = 'trainor' AND availability = '1' order by concat(lastname,', ',firstname) desc ";
											$query_trainor = "SELECT * FROM trainor_physical_fitness WHERE physical_fitness_id = '$physical_fitness_id' ORDER BY id ASC";

											$result_trainor = mysqli_query($con, $query_trainor);

											 while($row_trainor= mysqli_fetch_assoc($result_trainor)):
											 	  $user_id = $row_trainor['user_id'];

													$query_name = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND type = 'trainor' AND availability = '1' AND user_id = '$user_id' ORDER BY concat(lastname,', ',firstname) DESC ";

													$result_name = mysqli_query($con, $query_name);
													$row_name = mysqli_fetch_assoc($result_name);	

											echo "<option value='".$row_name['user_id']."'>".ucwords($row_name['name'])."</option>";
											 endwhile;

							echo "</select>
							 </div>
						</div>";
					}

			 	 
			}
		}
	}

	echo "<hr class='separator'>";
	echo "<h4 class='center  text-semibold text-dark text-uppercase'>Fitness Info</h3>";

	echo "<div class='form-group'>

		       <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Package name:</label>
		        <div class='col-md-6' >
		           <label  class='control-label '> ".$row['package_name']."</label>
		            <input type='hidden' id='package_name' name='package_name' value='".$row['package_name']."' readonly >
		            <input type='hidden' id='package_id' name='package_id' value='".$row['package_id']."' readonly >
		            <input type='hidden' id='for_receipt_package' name='for_receipt_package' value='".$row['package_name']."' readonly >

		        </div>

		    </div>";
		$_SESSION['for_receipt_package_name'] = $row['package_name'];

    if(!empty($duration)){
		echo "<div class='form-group'>

			    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Duration:</label>
			        <div class='col-md-6' >
			           <label class='control-label'>".$duration."</label>
			           <input type='hidden' id='for_receipt_duration' name='for_receipt_duration' value='".$duration."' readonly >
			        </div>
			  </div>";
		$_SESSION['for_receipt_duration'] = $duration;
	}	

	if(!empty($session)){
		echo "<div class='form-group'>

		       <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Session:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'>".$session."</label>
		           <input type='hidden' id='session' name='session' value='".$session."' readonly >
		            <input type='hidden' id='for_receipt_session' name='for_receipt_session' value='".$session."' readonly >
		        </div>

		    </div>";
		$_SESSION['for_receipt_session'] = $session;
	}
	


	echo "<div class='form-group'>

		       <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Amount:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'>".$amount."</label>
		            <input type='hidden' name='amount' value='".$amount_default."'>
		            <input type='hidden' id='for_receipt_package_amount' name='for_receipt_package_amount' value='".$amount_default."' readonly >
		        </div>

		    </div>

		";

		$_SESSION['for_receipt_amount'] = $amount_default.'.00';


}
 ?>