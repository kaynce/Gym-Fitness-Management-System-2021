<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
<?php 
	include('assets/db_connect.php'); 

	//extract($_POST);	

	if (isset($_POST['member_id'])){

		$foo = True;

		while($foo){

			//Start creating employeeid
			$letters = '';
			$numbers = '';
			foreach (range('A', 'Z') as $char) {
			    $letters .= $char;
			}
			for($i = 0; $i < 10; $i++){
				$numbers .= $i;
			}
			
			// $value_member_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);
			$member_id = substr(str_shuffle($numbers), 0, 5);
			//End creating employeeid

			$query = "SELECT * FROM member_and_trainor_id WHERE unique_id='$member_id'";			

			$result = mysqli_query($con, $query); 

			if (mysqli_num_rows($result) != 1) {
				 $foo = False;
			}
		}

		$password =md5($_POST['password']);

		//Start membership expiry
			$package = $_POST['package'];
		  $query="SELECT * FROM packages WHERE package_id='$package'";
          $result=mysqli_query($con,$query);

		  $value=mysqli_fetch_row($result);
	
          $d=strtotime("+".$value[5]." Months");
          //$cdate=date("Y-m-d"); //current date
          //$expiredate=date("Y-m-d",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid

		$membership_expiry = date("Y-m-d",$d);
		// End membership expiry

		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$address = $_POST['address'];
		$phone = $_POST['contact'];
		$email = $_POST['email'];

		$training_classes = $_POST['training_classes'];
		$client_type = $_POST['client_type'];
		$plan = $_POST['plan'];
		$package = $_POST['package'];
		$trainor = $_POST['trainor'];

		$type = "client";
		$status = "approved";

		$date = new DateTime();
		$date_created = $date->format('Y-m-d');

		$query = "INSERT INTO `member_and_trainor_id` (unique_id)
					VALUES ('$member_id')";

		$result = mysqli_query($con, $query); 
							
		$query = "INSERT INTO `members` (membership_expiry,
										member_id,
										password,  
										lastname, 
										firstname, 
										age, 
										gender, 
										date_of_birth, 
										height, 
										weight, 
										address, 
										contact, 
										email,
										training_classes, 
										client_type, 
										package,
										plan,  
										trainor,    
										date_created,
										type,
										status)
					VALUES ('$membership_expiry', 
							'$member_id', 
							'$password', 
							'$lastname', 
							'$firstname', 
						    '$age', 
						    '$gender', 
							'$date_of_birth', 
							'$height', 
						    '$weight',
						    '$address', 
							'$phone', 
							'$email',
							'$training_classes', 
							'$client_type', 
							'$package',
							'$plan', 
							'$trainor',  
						    '$date_created',
						    '$type',
							'$status')";

	
		$result = mysqli_query($con, $query); 

		if ($result) {

		

			$trainor_id =$_POST['trainor'];
			$plan_name = $_POST['plan'];
			$package_name =$_POST['package'];
			$start_date = $date_created;
			$end_date = $date_created;
			$trainor_id = $_POST['trainor'];
			$status = '1';
			$date_created = $date_created;

			$query = "INSERT INTO `enrolls_to` (member_id, 
												plan_name,
												package_name, 
												start_date, 
												end_date,
												trainor_id, 
												status,  
												date_created)
									 VALUES ('$member_id',
											 '$plan_name', 
											 '$package_name', 
											 '$start_date', 
											 '$end_date', 
											 '$trainor_id', 
											 '$status',
											 '$date_created')";

			$result = mysqli_query($con, $query);

			if (!$result) {
				?>
					<script>
						alert("Failed to save! Contact the developer");
						window.location.href = '../members.php';
					</script>
				<?php
			}
		}

	}


 ?>

