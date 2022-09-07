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

$physical_fitness_id = $_GET['value'];


	$query = "SELECT * FROM physical_fitness_packages_rates WHERE physical_fitness_id = '$physical_fitness_id' ";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	if(mysqli_num_rows($result) <  1){

		echo "<div class='form-group'>
			    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>NOT AVAILABLE:</label>
			        <div class='col-md-6' >
			        	<select type='text' class='form-control dropdown' id='not_available' name='not_available' required>
							<option></option>
						</select>
			          <input type='text' class='form-control readonly >
			        </div>
			  </div>";

	}else{

		//Check if the client is pending or not : status = null
		if(isset($_SESSION['email'])){
				$email = $_SESSION['email'];

				$query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
				$result = mysqli_query($con, $query);

				if(mysqli_num_rows($result) == 1){
					$row = mysqli_fetch_assoc($result);
					$status = $row['status'];
				}else{
					$query = "SELECT * FROM `members` WHERE email = '$email' ";
				    $result = mysqli_query($con, $query);

					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);
						$status = $row['status'];
					}
				}
		}
		//For registration only
		if(empty($status) == TRUE){
			echo "<div class='form-group'>	
				        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Package</label>
				            <div class='col-md-6'>
				                <select class='form-control'  id='package' name='package'  onchange='fitnessInfo2Reg(this.value)' required>
				                    <option></option>";

				             		$query = "SELECT * FROM physical_fitness_packages_rates WHERE physical_fitness_id = '$physical_fitness_id' order by id asc";
				             		$result = mysqli_query($con, $query);

				                    while($row = mysqli_fetch_array($result)):

				             echo "<option value='".$row['package_id']."'>".ucwords($row['package_name'])."</option>";
				                  endwhile;
				echo "</select> 
				    </div>
				</div>";
		}else{
			//For renewal
			echo "<div class='form-group'>	
				        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Package</label>
				            <div class='col-md-6'>
				                <select class='form-control'  id='package' name='package'  onchange='fitnessInfo2(this.value)' required>
				                    <option></option>";

				             		$query = "SELECT * FROM physical_fitness_packages_rates WHERE physical_fitness_id = '$physical_fitness_id' order by id asc";
				             		$result = mysqli_query($con, $query);

				                    while($row = mysqli_fetch_array($result)):

				             echo "<option value='".$row['package_id']."'>".ucwords($row['package_name'])."</option>";
				                  endwhile;
				echo "</select> 
				    </div>
				</div>";
		}
	}

		


//}
 ?>