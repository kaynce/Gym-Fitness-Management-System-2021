<?php 
if (session_status() === PHP_SESSION_NONE){ 
 	session_start(); 
 }
 
require(dirname(__FILE__).'/../../../admin/assets/db_connect.php');


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

// unset($_SESSION['for_receipt_amount'] );

//For 1 Day Fitness
$physical_fitness_id = substr($_GET['value'], 0, 5);
$client_type = substr($_GET['value'], 5);


$query = "SELECT * FROM physical_fitness_walk_in_rates WHERE physical_fitness_id='$physical_fitness_id' ";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) !=  1){

	echo "<div class='form-group'>
		    <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >NOT AVAILABLE:</label>
		        <div class='col-md-6' >
		        	<select type='text' class='form-control dropdown' id='not_available' name='not_available' required>
						<option></option>
					</select>
		          <input type='text' class='form-control readonly >
		        </div>
		  </div>";

}else{

	$row = mysqli_fetch_assoc($result);
 	
 	$amount = '';
 	if($client_type == 'STUDENT'){
 		$amount = number_format($row['student_amount'], 2);
 		$amount_default = $row['student_amount'];
 	}else{
 		$amount = number_format($row['non_student_amount'], 2);
 		$amount_default = $row['non_student_amount'];
 	}

 	echo "<hr class='separator'>";
	echo "<h4 class='center  text-semibold text-dark text-uppercase'>Fitness Info</h3>";
	
 	echo "<div class='form-group'>
		    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Duration:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'> 1 Day </label>
		        </div>
		  </div>";
		  $_SESSION['for_receipt_one_day'] = '1 Day';

 	echo "<div class='form-group'>
		    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Amount:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'> ".$amount."</label>
		          <input type='hidden' id='amount' name='amount' value='".$amount_default."'>
		          <input type='hidden' id='for_receipt_amount' name='for_receipt_amount' value='".$amount_default."'>
		        </div>
		  </div>";
		  $_SESSION['for_receipt_amount'] = $amount_default.'.00';
	}


	
	// echo "<div class='form-group'>
	// 	<label class='col-md-3 control-label' >Personal Training?</label>
	// 		<div class='col-md-6'>
	// 			<select type='text' id='personal_training_walk_in'  name='personal_training_walk_in' class='form-control dropdown' onchange='walk_in_info(this.value)' required>
	// 				<option></option>
	// 				 <option value='YES'>YES</option>
	// 				<option value='NO' >NO</option>
	// 			</select>
	// 		</div>
	// </div>";

 //if($result){

//}
 ?>