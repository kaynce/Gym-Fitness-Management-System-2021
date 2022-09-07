<?php
	 if (session_status() === PHP_SESSION_NONE){ 
	 	session_start(); 
	 }

 
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'hmg_db';

	$con = mysqli_connect($host, $username, $password, $database);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL" . mysqli_connect_error();
	}

	date_default_timezone_set('Asia/Manila');
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
?>

<?php 
	$query_p = "SELECT * FROM `settings` WHERE setting_id = '142' ";
	$result_p = mysqli_query($con, $query_p);

	if(mysqli_num_rows($result_p) > 0){
		$row_p = mysqli_fetch_assoc($result_p);
		$pass = $row_p['p_one'];
	}
	
 ?>
