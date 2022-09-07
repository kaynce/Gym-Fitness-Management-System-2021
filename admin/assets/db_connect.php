<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }

 
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'hmg_db';

	$con = mysqli_connect($host, $username, $password, $database);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL" . mysqli_connect_error();
	}

	date_default_timezone_set('Asia/Manila');

	// $now = new DateTime();
	// $now->setTimezone(new DateTimeZone('Asia/Manila'));
	// echo $now->format('g:i A');
	// session_set_cookie_params(0, '/', '.htthmgfitnesscenter.com/');

	  // $host_name = 'db5002357126.hosting-data.io';
	  // $database = 'dbs1888535';
	  // $user_name = 'dbu1410054';
	  // $password = '@iloveBPC18';

	  // $con = new mysqli($host_name, $user_name, $password, $database);

	  // if ($con->connect_error) {
	  //   die('<p>Failed to connect to MySQL: '. $con->connect_error .'</p>');
	  // } else {
	  //   echo '<p>Connection to MySQL server successfully established.</p>';
	  // }

	// nofitnessnolifeRe@lity


	
	//Get the data from the database | get the email password
	$query_p = "SELECT * FROM `settings` WHERE id = '21' ";
	$result_p = mysqli_query($con, $query_p);

	if(mysqli_num_rows($result_p) > 0){
		$row_p = mysqli_fetch_assoc($result_p);
		$password_email_db = $row_p['p_one'];
	}
	

	//Start Time ====================	
	//Get the data from the database
	// $date = new DateTime();
	// $date_today = $date->format('l'); #l for full week day name
 	
 // 	//Get the date data from the database
 // 	#Monday
	// $query_time = "SELECT * FROM `settings` WHERE id = '2' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$monday = $row_time['time_to'];
	// }

	// #Tuesday
	// $query_time = "SELECT * FROM `settings` WHERE id = '3' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$tuesday = $row_time['time_to'];
	// }

	// #Wednesday
	// $query_time = "SELECT * FROM `settings` WHERE id = '4' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$wednesday = $row_time['time_to'];
	// }

	// #Thursday
	// $query_time = "SELECT * FROM `settings` WHERE id = '5' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$thursday = $row_time['time_to'];
	// }

	// #Friday
	// $query_time = "SELECT * FROM `settings` WHERE id = '6' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$friday = $row_time['time_to'];
	// }

	// #Saturday
	// $query_time = "SELECT * FROM `settings` WHERE id = '7' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$saturday = $row_time['time_to'];
	// }	

	// #Sunday
	// $query_time = "SELECT * FROM `settings` WHERE id = '8' ";
	// $result_time = mysqli_query($con, $query_time);

	// if(mysqli_num_rows($result_time) > 0){
	// 	$row_time = mysqli_fetch_assoc($result_time);
	// 	$sunday = $row_time['time_to'];
	// }

	//End Time ====================
