<?php 
include('../assets/db_connect.php'); 

if (isset($_POST['member_id'])) {
	
	$member_id = $_POST['member_id'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$date_of_birth = $_POST['date_of_birth'];
	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$training_classes = $_POST['training_classes'];
	$client_type = $_POST['client_type'];
	$plan = $_POST['plan'];
	$package = $_POST['package'];
	$trainor = $_POST['trainor'];

	$query = "UPDATE `members` 
			 SET lastname = '$lastname',
			 	 firstname = '$firstname', 
				 age = '$age', 
				 gender = '$gender',
				 date_of_birth = '$date_of_birth', 
				 height = '$height',
			 	 weight = '$weight', 
				 address = '$address', 
				 contact = '$contact',
				 email = '$email', 
				 training_classes = '$training_classes',
			 	 client_type = '$client_type', 
				 plan = '$plan', 
				 package = '$package',
				 trainor = '$trainor'
				 WHERE member_id = '$member_id'";

			$query = mysqli_query($con, $query);

			if (!$query) {
						?>
							<script>
								alert("Failed to edit!");
								window.location.href = '../edit_member.php';
							</script>
						<?php
					} 

	
}else{
?>
							<script>
								alert("CANNOT FOUND ID!");
								window.location.href = '../edit_member.php';
							</script>
						<?php
}

?>