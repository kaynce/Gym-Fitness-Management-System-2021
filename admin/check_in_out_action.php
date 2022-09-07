<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php


    include('assets/db_connect.php');

  
    if(isset($_POST['member_user_id']) || isset($_SESSION['member_user_id'])){
        
        $member_user_id = '';
        if(isset($_POST['member_user_id'])){
        	$member_user_id = $_POST['member_user_id'];
        }else{
        	$member_user_id = $_SESSION['member_user_id'];
        }



		$date = date('Y-m-d');
		// $time = date('H:i:s A');
		$time = date('H:i:s');

		// ====================================
		$x = 0;
		//statyus - inactive/expired
		$query = "SELECT * FROM `enrolls_to` WHERE member_id = '$member_user_id' AND status = '1' ";
		$result = mysqli_query($con, $query); 

		//If there is no data in members table go to users table
		if(mysqli_num_rows($result)<1){
			$query = "SELECT * FROM `users` WHERE user_id = '$member_user_id' AND status = 'approved' ";
		    $result = mysqli_query($con, $query);
		    $x = 1;
		}
		// ====================================

		// $sql = "SELECT * FROM student WHERE STUDENTID = '$member_user_id'";
		// $query = $conn->query($sql);

		if(mysqli_num_rows($result)<1){

			$_SESSION['error'] = 'Cannot find Code Number: ';

		}else{
				$row_user_member = mysqli_fetch_assoc($result);
				//Get the id to update the attendance
				$id = $row_user_member['id'];

				//Member
				if($x == 0){
					$member_user_id = $row_user_member['member_id'];

					//Get the name
					$query_name = "SELECT * FROM `members` WHERE member_id = '$member_user_id' ";
					$result_name = mysqli_query($con, $query_name);
					$row_user_member = mysqli_fetch_assoc($result_name);
					
					// GET THE FIRSTNAME AND LASTANAME

				}else{
					//admin/trainor
					$member_user_id = $row_user_member['user_id'];
				}
				

				$query ="SELECT * FROM `attendance` WHERE member_user_id='$member_user_id' AND log_date='$date' AND status='0'";

				$result = mysqli_query($con, $query);

				if(mysqli_num_rows($result)>0){
					#1. Put the member_id to session
					$_SESSION['member_user_id'] = $member_user_id;
					#2. Query session for sweet alert
					// $_SESSION['query_time_out'] = 'query_time_out';

					//To know if the client/user yes the query
					// $sure_time_out ='';
			  //       if(isset($_POST['sure_time_out'])){
			  //       	$sure_time_out = $_POST['sure_time_out'];
			  //       }

					// if(!empty($sure_time_out) == 'sure_time_out'){
						$row = mysqli_fetch_assoc($result);
						$id = $row['id'];

						$query = "UPDATE `attendance` SET time_out='$time', status='1' WHERE member_user_id='$member_user_id' AND log_date='$date' AND id = $id";

						$result = mysqli_query($con, $query);


						// unset($_SESSION['query_time_out']);
      //           		unset($_SESSION['time_out']);
      //           		unset($_SESSION['member_user_id']);

						$_SESSION['time_out'] = 'time_out';
						$_SESSION['success'] = 'Time Out Successfuly: '.$row_user_member['firstname'].', '.$row_user_member['lastname'];

                		
					//}

				}else{


					$query = "INSERT INTO attendance(
													member_user_id, 
													time_in, 
													log_date, 
													status) 
									VALUES('$member_user_id',
									       '$time',
									       '$date',
									       '0')";

					$result = mysqli_query($con, $query);

					if($result === TRUE){

						$_SESSION['time_in'] = 'time_in';
						$_SESSION['success'] = 'Time In Successfuly: '.$row_user_member['firstname'].', '.$row_user_member['lastname'];

					}else{

						$_SESSION['error'] = $con->error;

				   }	
				}
		}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number/Member ID';
    }

// header("location: attendance_qrcode.php");

?>

	<script type="text/javascript">
		window.location.href = 'attendance_qrcode';
	</script>
<?php
	   
$con->close();
?>