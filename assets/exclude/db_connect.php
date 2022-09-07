<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'hmg_db';

	$con = mysqli_connect($host, $username, $password, $database);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL" . mysqli_connect_error();
	}
	date_default_timezone_set('Asia/Manila');
?>

<?php
  //  $host_name = 'db5006403930.hosting-data.io';
  // $database = 'dbs5330896';
  // $user_name = 'dbu2363332';
  // $password = 'hmgfitnesscenter2021';

  // $con = new mysqli($host_name, $user_name, $password, $database);

  // if ($con->connect_error) {
  //   die('<p>Failed to connect to MySQL: '. $con->connect_error .'</p>');
  // } 
// date_default_timezone_set('Asia/Manila');
?>

<?php 
	$query_p = "SELECT p_one FROM `settings` WHERE setting_id = '142' ";
	$result_p = mysqli_query($con, $query_p);

	if(mysqli_num_rows($result_p) > 0){
		$row_p = mysqli_fetch_assoc($result_p);
		$pass = $row_p['p_one'];
	}
	
 ?>