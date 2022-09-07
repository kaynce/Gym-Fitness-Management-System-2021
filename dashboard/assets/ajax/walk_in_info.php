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


// include "../admin/assets/db_connect.php";
include(dirname(__FILE__).'/../../../admin/assets/db_connect.php');

$walk_in = $_GET['value'];

// $query= "SELECT * FROM `training_classes_packages_rates` WHERE training_class_id='".$training_class_id."'";

// $result = mysqli_query($con,$query);
// if($result){

// 	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

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

if($walk_in == 'YES'){

	//Registartion
	if(empty($status) == TRUE){
		echo "<div class='form-group'>	
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Fitness Training</label>
	            <div class='col-md-6'>
	                 <select class='form-control'  id='physical_fitness' name='physical_fitness' required='required' class='custom-select select2'  onchange='walkInInfo2Reg(this.value)''>
	                 	<option></option>";

	                 	$query = "SELECT * FROM physical_fitness ORDER BY physical_fitness_name ASC";

	             		$result = mysqli_query($con, $query);

	                    while($row = mysqli_fetch_array($result)):

	             echo "<option type='hidden' value='".$row['physical_fitness_id']."'>".ucwords($row['physical_fitness_name'])."</option>";
	                  endwhile;
		echo "</select> 
			 </div>
		</div>";
	}else{
		echo "<div class='form-group'>	
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Fitness Training</label>
	            <div class='col-md-6'>
	                 <select class='form-control'  id='physical_fitness' name='physical_fitness' required='required' class='custom-select select2'  onchange='walkInInfo2(this.value)''>
	                 	<option></option>";

	                 	$query = "SELECT * FROM physical_fitness ORDER BY physical_fitness_name ASC";

	             		$result = mysqli_query($con, $query);

	                    while($row = mysqli_fetch_array($result)):

	             echo "<option type='hidden' value='".$row['physical_fitness_id']."'>".ucwords($row['physical_fitness_name'])."</option>";
	                  endwhile;
		echo "</select> 
			 </div>
		</div>";
	}

}else{

	//Registration
	if(empty($status) == TRUE){
			echo "<div class='form-group'>	
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Fitness Training</label>
		            <div class='col-md-6'>
		                 <select class='form-control'  id='physical_fitness' name='physical_fitness' required='required' class='custom-select select2'  onchange='fitnessInfoReg(this.value)''>
		                 	<option></option>";

		                 	$query = "SELECT * FROM physical_fitness ORDER BY physical_fitness_name ASC";

		             		$result = mysqli_query($con, $query);

		                    while($row = mysqli_fetch_array($result)):

		             echo "<option id='' value='".$row['physical_fitness_id']."'>".ucwords($row['physical_fitness_name'])."</option>";
		                  endwhile;
		echo "</select> 
			 </div>
		</div>";
	}else{
		echo "<div class='form-group'>	
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase' >Fitness Training</label>
		            <div class='col-md-6'>
		                 <select class='form-control'  id='physical_fitness' name='physical_fitness' required='required' class='custom-select select2'  onchange='fitnessInfo(this.value)''>
		                 	<option></option>";

		                 	$query = "SELECT * FROM physical_fitness ORDER BY physical_fitness_name ASC";

		             		$result = mysqli_query($con, $query);

		                    while($row = mysqli_fetch_array($result)):

		             echo "<option id='' value='".$row['physical_fitness_id']."'>".ucwords($row['physical_fitness_name'])."</option>";
		                  endwhile;
		echo "</select> 
			 </div>
		</div>";
	}
}

//}
 ?>

<script type="text/javascript">
	 $(document).ready(function() {
   $('#fitness').prop('disabled', true).prop('hidden', true);

} );
</script>