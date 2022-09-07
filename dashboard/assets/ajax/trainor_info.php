<?php 
if (session_status() === PHP_SESSION_NONE){ 
 	session_start(); 
 }
 
require(dirname(__FILE__).'/../../../admin/assets/db_connect.php');
    
	$user_id = $_GET['value'];

	 $query= "SELECT *, concat(lastname, ', ', firstname) as name FROM `users` WHERE user_id='".$user_id."'";

	 $result = mysqli_query($con, $query);

	 if($result){

	 	$row = mysqli_fetch_assoc($result);

	 	echo "<hr class='separator'>";
	 	echo "<h4 class='center  text-semibold text-dark text-uppercase'>Trainor Info</h3>";
	 	if(!empty($row['name'])){
			echo "<div class='form-group'>

				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Name:</label>
				        <div class='col-md-6' >
				           <label class='control-label'>".$row['name']."</label>
				        </div>
				  </div>";
			$_SESSION['for_receipt_trainor_name'] = $row['name'];
		}	

	 	if(!empty($row['about_me'])){
			echo "<div class='form-group'>

				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>About:</label>
				        <div class='col-md-6' >
				           <label class='control-label'>".$row['about_me']."</label>
				        </div>
				  </div>";
			$_SESSION['for_receipt_about_me'] = $row['about_me'];
		}	

		if(!empty($row['motto'])){
			echo "<div class='form-group'>

				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Motto:</label>
				        <div class='col-md-6' >
				           <label class='control-label'>".$row['motto']."</label>
				        </div>
				  </div>";
			$_SESSION['for_receipt_motto'] = $row['motto'];
		}

		if(!empty($row['weight'])){
			echo "<div class='form-group'>

				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Weight:</label>
				        <div class='col-md-6' >
				           <label class='control-label'>".$row['weight']." kg</label>
				        </div>
				  </div>";
			$_SESSION['for_receipt_weight'] = $row['weight'];
		}

		if(!empty($row['height'])){
			echo "<div class='form-group'>

				    <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Height:</label>
				        <div class='col-md-6' >
				           <label class='control-label'>".$row['height']." cm</label>
				        </div>
				  </div>";
			$_SESSION['for_receipt_height'] = $row['height'];
		}

	}

?>