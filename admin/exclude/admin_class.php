<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();

   	include('assets/db_connect.php');
	include('phpqrcode/qrlib.php'); 

    $this->db = $con;
	}

	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}
	// Start schedule
	function get_schedule(){

			extract($_POST);

			$data = array();

			$qry = $this->db->query("SELECT s.*,concat(m.lastname,',',m.firstname) AS name FROM schedules s INNER JOIN members m ON m.member_id = s.member_id");

			while($row=$qry->fetch_assoc()){
				$data[] = $row;
			}

			return json_encode($data);
	}

	function save_schedule(){
		extract($_POST);
		$data = " member_id = '$member_id' ";
		$data .= ", date_from = '{$date_from}-1' ";
		$data .= ", date_to = '".(date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')))."' ";
		$data .= ", time_from = '$time_from' ";
		$data .= ", time_to = '$time_to' ";
		$data .= ", dow = '".(implode(",",$dow))."'";

		if(empty($id)){
			$save = $this->db->query("INSERT INTO `schedules` SET ".$data);
		}else{
			$save = $this->db->query("UPDATE `schedules` SET ".$data." WHERE id=".$id);
		}
		
		if($save)
			return 1;
	}
	// End Schedule

	//Start 
	function insert_new_classes_timetable_schedule(){

		$time_from = $_POST['time_from'];
		$time_to = $_POST['time_to'];
		$monday = $_POST['monday'];
		$monday_trainor = $_POST['monday_trainor'];
		$tuesday = $_POST['tuesday'];
		$tuesday_trainor = $_POST['tuesday_trainor'];
		$wednesday = $_POST['wednesday'];
		$wednesday_trainor = $_POST['wednesday_trainor'];
		$thursday = $_POST['thursday'];
		$thursday_trainor = $_POST['thursday_trainor'];
		$friday = $_POST['friday'];
		$friday_trainor = $_POST['friday_trainor'];
		$saturday = $_POST['saturday'];
		$saturday_trainor = $_POST['saturday_trainor'];
		$sunday = $_POST['sunday'];
		$sunday_trainor = $_POST['sunday_trainor'];

		$query = "INSERT INTO `classes_timetable_schedule` ( 
														time_from, 
														time_to, 
														monday,
														monday_trainor,
														tuesday,
														tuesday_trainor,
														wednesday,
														wednesday_trainor,
														thursday,
														thursday_trainor,
														friday,
														friday_trainor,
														saturday,
														saturday_trainor,
														sunday,
														sunday_trainor)
								  VALUES ('$time_from',
										  '$time_to',
										  '$monday',
										  '$monday_trainor',
										  '$tuesday',
										  '$tuesday_trainor',  
										  '$wednesday',
										  '$wednesday_trainor',
										  '$thursday',
										  '$thursday_trainor',
									      '$friday',
									      '$friday_trainor',
										  '$saturday',
										  '$saturday_trainor',
										  '$sunday',
										  '$sunday_trainor')";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}

	}

	//Start 
	function delete_classes_timetable_schedule(){

		$id = $_POST['id'];

		$query = "DELETE FROM `classes_timetable_schedule` WHERE id = '$id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}

	}
	//End

	
	//Start 
	function edit_classes_timetable_schedule(){

		$id = $_POST['id'];
		$time_from = $_POST['time_from'];
		$time_to = $_POST['time_to'];
		$monday = $_POST['monday'];
		$monday_trainor = $_POST['monday_trainor'];
		$tuesday = $_POST['tuesday'];
		$tuesday_trainor = $_POST['tuesday_trainor'];
		$wednesday = $_POST['wednesday'];
		$wednesday_trainor = $_POST['wednesday_trainor'];
		$thursday = $_POST['thursday'];
		$thursday_trainor = $_POST['thursday_trainor'];
		$friday = $_POST['friday'];
		$friday_trainor = $_POST['friday_trainor'];
		$saturday = $_POST['saturday'];
		$saturday_trainor = $_POST['saturday_trainor'];
		$sunday = $_POST['sunday'];
		$sunday_trainor = $_POST['sunday_trainor'];


		$query = "UPDATE `classes_timetable_schedule` 
			     SET time_from = '$time_from',
			     	 time_to = '$time_to',
			     	 monday = '$monday',
			     	 monday_trainor = '$monday_trainor',
			     	 tuesday = '$tuesday',
			     	 tuesday_trainor = '$tuesday_trainor',
			     	 wednesday = '$wednesday',
			     	 wednesday_trainor = '$wednesday_trainor',
			     	 thursday = '$thursday',
			     	 thursday_trainor = '$thursday_trainor',
			     	 friday = '$friday',
			     	 friday_trainor = '$friday_trainor',
			     	 saturday = '$saturday',
			     	 saturday_trainor = '$saturday_trainor',
			     	 sunday = '$sunday',
			     	 sunday_trainor = '$sunday_trainor'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}

	}
	//End

	//End classes timetable schedule
	function approve_member_action(){

		//if (isset($_POST['id'])) {

			$email = '';
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

				$query = "SELECT * FROM `member_and_trainor_id` WHERE unique_id='$member_id'";			

				$result = mysqli_query($this->db , $query); 

				if (mysqli_num_rows($result) != 1) {
					 $foo = False;

					 $query = "INSERT INTO `member_and_trainor_id` (unique_id)
							VALUES ('$member_id')";

					$result = mysqli_query($this->db, $query);

				}
			}

			$id = $_POST['id'];

			
			$query = "SELECT * FROM `pending_members` WHERE id='$id'";	
			$result = mysqli_query($this->db, $query); 
			$row = mysqli_fetch_assoc($result);

			$screenshot_id = '';
			if (!empty($row['screenshot_id'])) {
				$screenshot_id = $row['screenshot_id'];
			}

		   	
		   	$screenshot_payment = '';
			if (!empty($row['screenshot_payment'])) {
				  $screenshot_payment = $row['screenshot_payment'];
			}

			$lastname = $row['lastname'];
			$firstname = $row['firstname'];
			$password = $row['password'];
			$age = $row['age'];
			$gender = $row['gender'];
			$date_of_birth = $row['date_of_birth'];
			$height = $row['height'];
			$weight = $row['weight'];
			$region = $row['region'];
			$house_no = $row['house_no'];
			$street_name = $row['street_name'];
			$province = $row['province'];
			$city = $row['city'];
			$barangay = $row['barangay'];
			$postal_code = $row['postal_code'];
			$contact = $row['contact'];
			$email = $row['email'];

			// for mailbox_action
			// $_SESSION['email_name'] = $row['email'];

			$physical_fitness_name = $row['physical_fitness_name'];
			$physical_fitness_id = $row['physical_fitness_id'];
			$client_type = $row['client_type'];

			$walk_in = $row['walk_in'];
			$package_name = $row['package'];
			$package_id = $row['package_id'];
			$session = $row['session'];
			$amount = $row['amount'];

			$day ='';
			$week ='';
			$month ='';

			$date = new DateTime();
			$start_date = $date->format('Y-m-d');
			$paid_date = $date->format('Y-m-d');

			//Check of walk in
			if($row['walk_in'] == 'YES'){
				//==================Start membership expiry date
						$query_start_date = "SELECT * FROM `physical_fitness_walk_in_rates` WHERE physical_fitness_id='$physical_fitness_id'";

						$result_start_date  = mysqli_query($this->db, $query_start_date);

						$value=mysqli_fetch_row($result_start_date);
						//get the value
						$day = $value[2];
						//===============
			           //  $d=strtotime("+".$value[2]." Days");
			           //  //$cdate=date("Y-m-d"); //current date
			           //  $end_date=date("Y-m-d",$d); //adding validity retrieve from plan to current date
			           // //inserting into enrolls_to table of corresponding userid
			           // ================== End membership expiry date
			            $end_date=date("Y-m-d"); 
			}else{

				//If the walk in is equal to NO
				$query_start_date = "SELECT * FROM physical_fitness_packages_rates WHERE package_id = '$package_id'";
				$result_start_date = mysqli_query($this->db, $query_start_date);

				$value = mysqli_fetch_row($result_start_date);

				if(mysqli_num_rows($result_start_date) >= 1){

					 if(!empty($value[5])){ 	
						 	//==================Start membership expiry date
							
							$day = $value[5];
							$result_start_date  = mysqli_query($this->db, $query_start_date);

							$value=mysqli_fetch_row($result_start_date);

				            $d=strtotime("+".$value[5]." Days");
				            //$cdate=date("Y-m-d"); //current date
				            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
				           //inserting into enrolls_to table of corresponding userid
				           // ================== End membership expiry date
				     }else if(!empty($value[6])) { 
				            //==================Start membership expiry date
							
							$week = $value[6];
							$result_start_date  = mysqli_query($this->db, $query_start_date);

							$value=mysqli_fetch_row($result_start_date);

				            $d=strtotime("+".$value[6]." Weeks");
				            //$cdate=date("Y-m-d"); //current date
				            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
				           //inserting into enrolls_to table of corresponding userid
				           // ================== End membership expiry date
				     }else if(!empty($value[7])) {  
				            //==================Start membership expiry date
							
							$month = $value[7];
							$result_start_date  = mysqli_query($this->db, $query_start_date);

							$value=mysqli_fetch_row($result_start_date);

				            $d=strtotime("+".$value[7]." Months");
				            //$cdate=date("Y-m-d"); //current date
				            $end_date=date("Y-m-d",$d); //adding validity retrieve from training_classes_packages_rates to current date
				           //inserting into enrolls_to table of corresponding userid
				           // ================== End membership expiry date
				     }else{ 
				     	$start_date = '';
					    //$paid_date = '';
						$end_date = '';
				     } 
			}
		}
	

			//$end_date = '';
			
			$trainor = $row['trainor'];

			$date = new DateTime();
			$date_created = $date->format('Y-m-d');

			$type = $row['type'];
			$status = "approved";
			// $status = $row['status'];

			// Start qrcode 

			$tempDir = 'qrcodes/'; 
			// $email = $_POST['mail'];
			// $subject =  $_POST['subject'];
			// $filename = getUsernameFromEmail($email);
			$filename = $member_id;


			$codeContents = $member_id;
			
			QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
			// End qrcode

			$query = "INSERT INTO `members`
												   (membership_expiry,
												    member_id,
													password,  
													lastname, 
													firstname, 
													age, 
													gender, 
													date_of_birth, 
													height, 
													weight, 
													region,
													house_no, 
													street_name, 
													province, 
													city, 
													barangay, 
													postal_code,  
													contact, 
													email,
													date_created,
													status)
								VALUES ('$end_date',
								        '$member_id',
										'$password', 
										'$lastname', 
										'$firstname', 
									    '$age', 
									    '$gender', 
										'$date_of_birth', 
										'$height', 
									    '$weight',	
									    '$region', 
									    '$house_no', 
									    '$street_name', 
									    '$province', 
									    '$city', 
									    '$barangay', 
									    '$postal_code', 
										'$contact', 
										'$email',
									    '$date_created',
										'$status')";

			$result = mysqli_query($this->db, $query);

			if ($result) {


				$query = "DELETE FROM `pending_members` WHERE id = '$id'";

				$save = mysqli_query($this->db, $query);

				$status = "1";
				$add_renew_status = "approved";

				$query = "INSERT INTO `enrolls_to` ( 
														member_id, 
														screenshot_id, 
														screenshot_payment,
														client_type,
														walk_in,
														physical_fitness_id,
														physical_fitness_name,
														day, 
														week,
														month, 
														package,
														package_id,
														session,
														remaining_session,
														amount, 
														paid_date, 
														start_date,
														end_date,
														trainor_id,
														status, 
														date_created,
														add_renew_status)
									VALUES ('$member_id',
											'$screenshot_id',  
											'$screenshot_payment',
											'$client_type',
											'$walk_in',
											'$physical_fitness_id',
											'$physical_fitness_name',
											'$day', 
											'$week', 
											'$month',   
											'$package_name',   
											'$package_id',
											'$session',
											'$session',
											'$amount',  
										    '$paid_date', 
										    '$start_date', 
										    '$end_date',
										    '$trainor',  
										    '$status', 
										   	'$date_created',
										    '$add_renew_status')";

			
			   $save = mysqli_query($this->db, $query);	

				$alert_title = "Account approved";
				$alert_message = "Your account has been approved";
				$status = "0";
				$type = "to_client";

				$query = "INSERT INTO `notifications` ( 
												email, 
												alert_title, 
												alert_message,
												status,
												type,
												date_created)
							VALUES ('$email',
									'$alert_title',
									'$alert_message',
									'$status',  
									'$type',
								    '$date_created')";

			   $save = mysqli_query($this->db, $query);	

			    include('mailbox_action.php');
			   
				if($save){

					return 1;
				}


			}
	//}

	}
	//End

	function approve_add_renew_member_action(){

		$id = $_POST['id'];

		$status = "1";
		$add_renew_status = 'approved';
		$query = "UPDATE `enrolls_to` 
			     SET status = '$status',
			     	add_renew_status = '$add_renew_status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		//Get the member id
		$query = "SELECT * FROM `enrolls_to` WHERE id = '$id' ";
		$result = mysqli_query($this->db, $query);
		$row = mysqli_fetch_array($result);
		$member_id = $row['member_id'];

		//Get the email from members table
		$query = "SELECT * FROM `members` WHERE member_id = '$member_id' ";
		$result = mysqli_query($this->db, $query);
		$row = mysqli_fetch_array($result);
		$email = $row['email'];

		$save = mysqli_query($this->db, $query);		
		
		$alert_title = "Account updated";
		$alert_message = "Your account has been successfully updated!";
		$status = "0";
		$type = "to_client";
		$date = new DateTime();
		$date_created = $date->format('Y-m-d');

		$query = "INSERT INTO `notifications` ( 
												email, 
												alert_title, 
												alert_message,
												status,
												type,
												date_created)
							VALUES ('$email',
									'$alert_title',
									'$alert_message',
									'$status',  
									'$type',
								    '$date_created')";
		$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}

	}
	//End

	function decline_member_action(){

			$id = $_POST['id'];

			$status = 'archived';

			$query = "UPDATE `pending_members` 
			     SET status = '$status'
				 WHERE id = '$id' ";

			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}
	}
	//End

	function archive_member_action(){

		$id = $_POST['id'];

		$status = 'archived';

		$query = "UPDATE `members` 
			     SET status = '$status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function restore_member_action(){

		$id = $_POST['id'];

		$status = 'approved';

		$query = "UPDATE `members` 
			     SET status = '$status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function archive_decline_member_action(){

			$id = $_POST['id'];

			$status = 'pending';

			$query = "UPDATE `pending_members` 
			     SET status = '$status'
				 WHERE id = '$id' ";

			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}
	}
	//End


	function insert_new_user_action(){

       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $email = $_POST['email'];
       $password = md5($_POST['password']);

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
			$user_id = substr(str_shuffle($numbers), 0, 5);
			//End creating employeeid

			$query = "SELECT * FROM member_and_trainor_id WHERE unique_id='$user_id'";			

			$result = mysqli_query($this->db, $query); 

			if (mysqli_num_rows($result) != 1) {
				 $foo = False;
			}
		}
			
		$query = "INSERT INTO `member_and_trainor_id` (unique_id)
							VALUES ('$user_id')";

		$result = mysqli_query($this->db, $query); 

		//Check if the email is already registered
		$query = "SELECT * FROM `users` WHERE email='$email'";
		$result = mysqli_query($this->db, $query);

		$same_email = '';
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$same_email = $row['email'];
		}else{
			$query = "SELECT * FROM `verified_email` WHERE email='$email'";
			$result = mysqli_query($this->db, $query);

			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				$same_email = $row['email'];
			}
					
		}

		if($email == $same_email){
			return 2;
		}else if (mysqli_num_rows($result) < 1) {
		    //if (mysqli_num_rows($result) != 1) {

			//Verification code
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
				
				$verification_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);

				// $member_id = substr(str_shuffle($numbers), 0, 5);

				//End creating employeeid
				$query = "SELECT * FROM `verified_email` WHERE verification_code='$verification_code'";			
				$result = mysqli_query($this->db , $query); 

				if (mysqli_num_rows($result) != 1) {
					 $foo = False;
				}
			}

			//Reset code
			$foo = True;

			while($foo){

				//Start creating reset code
				$letters = '';
				$numbers = '';
				foreach (range('A', 'Z') as $char) {
				    $letters .= $char;
				}
				for($i = 0; $i < 10; $i++){
					$numbers .= $i;
				}
				
				$reset_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 2);

				// $member_id = substr(str_shuffle($numbers), 0, 5);

				//End creating reset code
				$query = "SELECT * FROM `verified_email` WHERE reset_code='$reset_code'";			

				$result = mysqli_query($this->db , $query); 

				if (mysqli_num_rows($result) != 1) {
					 $foo = False;

				}
			}
			
		$number_of_reset_password = 0;
		$status = 0;
		$query = "INSERT INTO `verified_email` (
									    email,
										verification_code,
										reset_code,
										number_of_reset_password,
										status)
						VALUES ('$email',
								'$verification_code', 
								'$reset_code', 
								'$number_of_reset_password',
								'$status')";

		$result = mysqli_query($this->db, $query);
		//End verification code

		$status = 'pending';
		$avl = "1";
		$type = 'trainor';

			$query = "INSERT INTO `users` (user_id, 
											lastname, 
											firstname,
											email,
											password, 
											status, 
											availability, 
											type)
							VALUES ('$user_id',
								    '$lastname', 
								    '$firstname', 
								    '$email', 
								    '$password', 
								    '$status', 
								    '$avl', 
								    '$type')";

			$save = mysqli_query($this->db, $query);

			if($save){
				include("../mailbox_action.php");
				return 1;
			}
		}

	}
	//End

	
	function approve_user_action(){

		$id = $_POST['id'];
		$status = 'approved';

		$query = "UPDATE `users` 
			     SET status = '$status'
				 WHERE id = '$id'";
		
		$save = mysqli_query($this->db, $query);

		if (!$save) {
			return 1;
		}
   
	}
	//End


	function trainor_fetch_id_data_action(){

      $id = $_POST['id'];

      $query = "SELECT * FROM enrolls_to WHERE id = '$id'";  
      $result = mysqli_query($this->db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row); 
 
	}
	//End

	function save_trainor_action(){

       $id = $_POST['id'];
       $change_trainor_id = $_POST['change_trainor_id'];

	   $query = "UPDATE `enrolls_to` 
			     SET trainor_id = '$change_trainor_id'
				 WHERE id = '$id' ";

	   $save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		} 
	}
	//End

	function insert_new_rate_action(){

			$physical_fitness_id = trim($_POST['physical_fitness_id']);
			$duration = '1';
			$student_amount = trim($_POST['student_amount']);
			$non_student_amount = trim($_POST['non_student_amount']);

			$query = "SELECT * FROM physical_fitness_walk_in_rates WHERE physical_fitness_id = '$physical_fitness_id' ";
			$save = mysqli_query($this->db, $query);

			if(mysqli_num_rows($save) == 1){
				return 2;
			}else{
				$query = "INSERT INTO `physical_fitness_walk_in_rates` (physical_fitness_id,
												  duration,
												  student_amount,
												  non_student_amount)
							VALUES ('$physical_fitness_id',
									'$duration',
									'$student_amount',
									'$non_student_amount')";

				$save = mysqli_query($this->db, $query);

				if($save){
						return 1;
				}
			}

		//}
	}
	//End

	function filter_action(){
		 $output = '';  

		      $from_date = $_POST['from_date'];
		      $to_date = $_POST['to_date'];

		      $_SESSION['from_date'] = $from_date;
		      $_SESSION['to_date'] = $to_date;
		      // $product = $_POST['product'];

		      // $query = "  
		      //      SELECT * FROM `enrolls_to`  
		      //      WHERE date_created BETWEEN '$from_date' AND '$to_date'  
		      // AND  order_item = '$product' "; 

		      $query = "  
		           SELECT * FROM `enrolls_to`  
		           WHERE date_created BETWEEN '$from_date' AND '$to_date'  AND add_renew_status = 'approved' "; 

		      $result = mysqli_query($this->db, $query); 

		      $i = 1;

		      $output .= " 
		        <div class='table-responsive'>
                  <table class='table invoice-items'>
                    <thead>
                      <tr class='h5  text-dark '>
                        <th id='cell-id' class='center text-semibold'>#</th>
                        <th id='cell-id' class='center text-semibold'>Member ID</th>
                        <th id='cell-id' class='center text-semibold'>Name</th>
                        <th id='cell-id' class='center text-center text-semibold'>Walk In</th>
                        <th id='cell-id' class='center text-center text-semibold'>Package</th>
                        <th id='cell-id' class='center text-center text-semibold'>Start</th>
                        <th id='cell-id' class='center text-center text-semibold'>End</th>
                        <th id='cell-id' class='center text-center text-semibold'>Date Created</th>
                        <th id='cell-id' class='center text-center text-semibold'>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
		      ";  

		      $total = 0;


		      if(mysqli_num_rows($result) > 0)  
		      {  
		           while($row = mysqli_fetch_array($result))  
		           {  

		                $output .= " 
		                        <tr class='center'>  
		                          <td>". $i++ ."</td>  
		                          <td>". $row['member_id']."</td>  
		                          <td>";
		                          $member_id = $row['member_id'];
		                          $query_name = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `members`WHERE member_id = $member_id";

		                          $result_name = mysqli_query($this->db, $query_name); 

		                       	if(mysqli_num_rows($result_name)){
		                       		$row_name = mysqli_fetch_assoc($result_name);
		                            $output .="".$row_name['name']."";
		                       	}
		                $output .= "</td>";

		                $output .= "<td>"; 

		                		if(!empty($row['day'])){  
		                          	$output .=" <span class='label label-success'>Walk in</span>";
		                        }

		                $output .= "</td>";
		                $output .= "           
		                          <td>". $row['package'] ."</td>
		                       
		                          <td>". $row['start_date'] ."</td>  
		                          <td>". $row['end_date'] ."</td>
		                          <td>". date("M d,Y",strtotime($row['date_created']))  ."</td>  
		                          <td>". number_format($row['amount'], 2) ."</td>  
		                          
		                     </tr>  
		                ";  

		                  $total = $total + floatval($row['amount']);

		               

		                //$total_error = $total_order + floatval($row["order_value"]);
		           }  

		           $output .= "<tr align= 'center'>
		               <th colspan='8' style='text-align: right;'>Total</th>
		               <td ><b>". $total.".00</b></td>
		               
		                </tr>";

		      }  
		      else  
		      {  
		           $output .= "
		                <tr class='center'>  
		                     <td colspan='9'>No data Found</td>  
		                </tr>  
		           ";  
		      }  
		      $output .= "</table>
		                  </div>";  


		      echo $output;  
		// }  
	}
	//End

	function edit_walk_in_rate(){

		$edit_physical_fitness_id = $_POST['edit_physical_fitness_id'];
		$edit_student_amount = $_POST['edit_student_amount'];
		$edit_non_student_amount = $_POST['edit_non_student_amount'];

		$query = "UPDATE physical_fitness a 
				  -- INNER JOIN training_classes_rate b ON (a.training_class_id = b.training_class_id)
				  INNER JOIN physical_fitness_walk_in_rates b ON (a.physical_fitness_id = b.physical_fitness_id)
				SET b.student_amount = '$edit_student_amount',
					b.non_student_amount = '$edit_non_student_amount'
				WHERE a.physical_fitness_id = '$edit_physical_fitness_id' AND b.physical_fitness_id =  '$edit_physical_fitness_id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}


	}
	//End

	function delete_walk_in(){

		$id = $_POST['id'];
		
		$query = "DELETE FROM `physical_fitness_walk_in_rates` WHERE id = '$id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}


	}
	//End


	function edit_package_action(){

		$edit_physical_fitness_id = $_POST['edit_physical_fitness_id'];
		// $edit_physical_fitness_name = $_POST['edit_physical_fitness_name'];
		$edit_package_id = $_POST['edit_package_id'];
		$edit_package_name = $_POST['edit_package_name'];
		$edit_session = $_POST['edit_session'];
		$edit_number = $_POST['edit_number'];
		$edit_required_trainor = $_POST['edit_required_trainor'];
		$edit_day_week_month = $_POST['edit_day_week_month'];
		$edit_description = $_POST['edit_description'];
		$edit_package_student_amount = $_POST['edit_package_student_amount'];
		$edit_package_non_student_amount = $_POST['edit_package_non_student_amount'];

		// $edit_package_student_amount = '';
		// $edit_package_non_student_amount = '';
		$zero = '';
		$none = '';

		   if($edit_day_week_month == 'Day/s'){    

		       $query = "UPDATE physical_fitness pf 
				  INNER JOIN physical_fitness_packages_rates pfpr ON (pf.physical_fitness_id = pfpr.physical_fitness_id)
				SET 
					pfpr.package_name = '$edit_package_name',
					pfpr.session = '$edit_session',
					pfpr.day = '$edit_number',
					pfpr.week = '$zero',
					pfpr.month = '$zero',
					pfpr.required_trainor = '$edit_required_trainor',
					pfpr.description = '$edit_description',
					pfpr.package_student_amount = '$edit_package_student_amount',
					pfpr.package_non_student_amount = '$edit_package_non_student_amount'
				WHERE pf.physical_fitness_id = '$edit_physical_fitness_id' AND pfpr.package_id = '$edit_package_id'";

				$save = mysqli_query($this->db, $query);

		   }else if($edit_day_week_month == 'Week/s'){   

		       $query = "UPDATE physical_fitness pf 
				  INNER JOIN physical_fitness_packages_rates pfpr ON (pf.physical_fitness_id = pfpr.physical_fitness_id)
				SET 
					pfpr.package_name = '$edit_package_name',
					pfpr.session = '$edit_session',
					pfpr.day = '$zero',
					pfpr.week = '$edit_number',
					pfpr.month = '$zero',
					pfpr.required_trainor = '$edit_required_trainor',
					pfpr.description = '$edit_description',
					pfpr.package_student_amount = '$edit_package_student_amount',
					pfpr.package_non_student_amount = '$edit_package_non_student_amount'
				WHERE pf.physical_fitness_id = '$edit_physical_fitness_id' AND pfpr.package_id = '$edit_package_id'";

				$save = mysqli_query($this->db, $query);

		   }else if($edit_day_week_month == 'Month/s'){   

		       $query = "UPDATE physical_fitness pf 
				  INNER JOIN physical_fitness_packages_rates pfpr ON (pf.physical_fitness_id = pfpr.physical_fitness_id)
				SET 
					pfpr.package_name = '$edit_package_name',
					pfpr.session = '$edit_session',
					pfpr.day = '$zero',
					pfpr.week = '$zero',
					pfpr.month = '$edit_number',
					pfpr.required_trainor = '$edit_required_trainor',
					pfpr.description = '$edit_description',
					pfpr.package_student_amount = '$edit_package_student_amount',
					pfpr.package_non_student_amount = '$edit_package_non_student_amount'
				WHERE pf.physical_fitness_id = '$edit_physical_fitness_id' AND pfpr.package_id = '$edit_package_id'";

				$save = mysqli_query($this->db, $query);
		   }else if($edit_day_week_month == ''){   
			   	$query = "UPDATE physical_fitness pf 
					  INNER JOIN physical_fitness_packages_rates pfpr ON (pf.physical_fitness_id = pfpr.physical_fitness_id)
					SET 
						pfpr.package_name = '$edit_package_name',
						pfpr.session = '$edit_session',
						pfpr.required_trainor = '$edit_required_trainor',
						pfpr.description = '$edit_description',
						pfpr.package_student_amount = '$edit_package_student_amount',
						pfpr.package_non_student_amount = '$edit_package_non_student_amount'
					WHERE pf.physical_fitness_id = '$edit_physical_fitness_id' AND pfpr.package_id = '$edit_package_id'";

					$save = mysqli_query($this->db, $query);
			}else{
		   		$none = 1;
		   }

		if(isset($save)){
			return 1;
		}else if($none == 1){
			return 1;
		}else{

		}
		

	}
	//End

	function delete_package_action(){

		$id = $_POST['id'];

		$query = "DELETE FROM `physical_fitness_packages_rates` WHERE id = '$id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
		

	}
	//End
	function insert_new_package_rate_action(){
			
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
				$package_id = substr(str_shuffle($numbers), 0, 3);
				//End creating employeeid

				$query = "SELECT * FROM `package_id` WHERE unique_id='$package_id'";			

				$result = mysqli_query($this->db , $query); 

				if (mysqli_num_rows($result) != 1) {
					 $foo = False;

					 $query = "INSERT INTO `package_id` (unique_id)
							VALUES ('$package_id')";

					$result = mysqli_query($this->db, $query);

				}
			}

			$physical_fitness_id = trim($_POST['physical_fitness_id']);
			$package_name =  trim($_POST['package_name']);
			$description =  trim($_POST['description']);
			$number = trim($_POST['number']);
			$day_week_month = trim($_POST['day_week_month']);
			$required_trainor = trim($_POST['required_trainor']);
			$session = trim($_POST['session']);
			$student_amount = trim($_POST['student_amount']);
			$non_student_amount = trim($_POST['non_student_amount']);
			
			if ($day_week_month == 'Day/s') {

				$query = "INSERT INTO `physical_fitness_packages_rates` 
											(physical_fitness_id,
											package_id,
											package_name,
											description,
											day,
											required_trainor,
											session,
											package_student_amount,
											package_non_student_amount)
						VALUES ('$physical_fitness_id',
								'$package_id',
								'$package_name',
								'$description',
								'$number',
								'$required_trainor',
								'$session', 
								'$student_amount',  
								'$non_student_amount')";

			} else if ($day_week_month == 'Week/s') {
				
				$query = "INSERT INTO `physical_fitness_packages_rates` 
											(physical_fitness_id,
											package_id,
											package_name,
											description,
											week,
											required_trainor,
											session,
											package_student_amount,
											package_non_student_amount)
						VALUES ('$physical_fitness_id',
								'$package_id',
								'$package_name',
								'$description',
								'$number',
								'$required_trainor',
								'$session', 
								'$student_amount',  
								'$non_student_amount')";


			} else {
				
				$query = "INSERT INTO `physical_fitness_packages_rates` 
											(physical_fitness_id,
											package_id,
											package_name,
											description,
											month,
											required_trainor,
											session,
											package_student_amount,
											package_non_student_amount)
						VALUES ('$physical_fitness_id',
								'$package_id',
								'$package_name',
								'$description',
								'$number',
								'$required_trainor',
								'$session', 
								'$student_amount',  
								'$non_student_amount')";
			}

			$save = mysqli_query($this->db, $query);

			if($save){
					return 1;
				}

		//}
	}
	//End


	function insert_new_personal_training_rate_action(){
			
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
				$package_id = substr(str_shuffle($numbers), 0, 3);
				//End creating employeeid

				$query = "SELECT * FROM `package_id` WHERE unique_id='$package_id'";			

				$result = mysqli_query($this->db , $query); 

				if (mysqli_num_rows($result) != 1) {
					 $foo = False;

					 $query = "INSERT INTO `package_id` (unique_id)
							VALUES ('$package_id')";

					$result = mysqli_query($this->db, $query);

				}
			}

			$training_class_id = trim($_POST['training_class_id']);
			$package_name =  trim($_POST['package_name']);
			$description =  trim($_POST['description']);
			$number = trim($_POST['number']);
			$day_week_month = trim($_POST['day_week_month']);
			$session = trim($_POST['session']);
			$amount = trim($_POST['amount']);

			
			if ($day_week_month == 'Day/s') {

				$query = "INSERT INTO `training_classes_personal_training_rates` 
											(training_class_id,
											 package_id,
											 package_name,
											 description,
											 day,
											 session,
											 amount)
						VALUES ('$training_class_id',
								'$package_id',
								'$package_name',
								'$description',
								'$number',
								'$session', 
								'$amount')";

			} else if ($day_week_month == 'Week/s') {
				
				$query = "INSERT INTO `training_classes_personal_training_rates` 
											(training_class_id,
											package_id,
											package_name,
											description,
											week,
											session,
											amount)
						VALUES ('$training_class_id',
								'$package_id',
								'$package_name',
								'$description',
								'$number',
								'$session', 
								'$amount')";


			} else {
				
				$query = "INSERT INTO `training_classes_personal_training_rates` 
											(training_class_id,
											package_id,
											package_name,
											description,
											month,
											session,
											amount)
						VALUES ('$training_class_id',
								'$package_id',
								'$package_name',
								'$description',
								'$number',
								'$session', 
								'$amount')";
			}

			$save = mysqli_query($this->db, $query);

			if($save){
					return 1;
				}

		//}
	}
	//End
	
	function edit_package_rate_action(){

		$training_class_id = $_POST['training_class_id'];
		$training_classes_name = $_POST['training_classes_name'];
		$student_amount = $_POST['student_amount'];
		$non_student_amount = $_POST['non_student_amount'];
		$month = $_POST['month'];
		$session = $_POST['session'];
		$package_student_amount = $_POST['package_student_amount'];
		$package_non_student_amount = $_POST['package_non_student_amount'];
		
		// $query = "UPDATE `training_classes` 
		// 	     SET training_classes_name = '$training_classes_name'
		// 		 WHERE training_class_id = '$training_class_id' ";

		// $save = mysqli_query($this->db, $query);

		// $query = "UPDATE `training_classes_rate` 
		// 	     SET student_amount = '$student_amount',
		// 	         non_student_amount = '$non_student_amount',
		// 		 WHERE training_class_id = '$training_class_id' ";
		
		// $save = mysqli_query($this->db, $query);

		// $query = "UPDATE `training_classes_packages_rates` 
		// 	     SET month = '$month',
		// 	         session = '$session',
		// 	         package_student_amount = '$package_student_amount',
		// 	         package_non_student_amount = '$package_non_student_amount',
		// 		 WHERE training_class_id = '$training_class_id' ";
		
		// $save = mysqli_query($this->db, $query);

		$query = "UPDATE training_classes a 
				  INNER JOIN training_classes_rate b ON (a.training_class_id = b.training_class_id)
				  INNER JOIN training_classes_packages_rates c ON (a.training_class_id = c.training_class_id)
				SET training_classes.training_classes_name = '$training_classes_name', 
					training_classes_rate.student_amount = '$student_amount',
					training_classes_rate.non_student_amount = '$non_student_amount',  
					training_classes_packages_rates.month = '$month',
					training_classes_packages_rates.session = '$session',
					training_classes_packages_rates.package_student_amount = '$package_student_amount',
					training_classes_packages_rates.package_non_student_amount = '$package_non_student_amount',
				WHERE training_classes.training_class_id = '$training_class_id' AND training_classes_rate.training_class_id =  '$training_class_id' AND training_classes_packages_rates.training_class_id = '$training_class_id'";

			$save = mysqli_query($this->db, $query);

			if($save){
					return 1;
				}


	}

	// 	function insert_new_personal_training_rate_action(){
	// 		//if (isset($_POST['add'])){

	// 		$foo = True;

	// 		while($foo){

	// 			//Start creating employeeid
	// 			$letters = '';
	// 			$numbers = '';
	// 			foreach (range('A', 'Z') as $char) {
	// 			    $letters .= $char;
	// 			}
	// 			for($i = 0; $i < 10; $i++){
	// 				$numbers .= $i;
	// 			}
				
	// 			// $value_member_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);
	// 			$package_id = substr(str_shuffle($numbers), 0, 5);
	// 			//End creating employeeid

	// 			$query = "SELECT * FROM `member_and_trainor_id` WHERE unique_id='$package_id'";			

	// 			$result = mysqli_query($this->db, $query);

	// 			if (mysqli_num_rows($result) != 1) {
	// 				 $foo = False;

	// 				 $query = "INSERT INTO `member_and_trainor_id` (unique_id)
	// 						VALUES ('$package_id')";

	// 				$result = mysqli_query($this->db, $query);

	// 			}
	// 		}

	// 		$class_name = trim($_POST['class_name']);
	// 		$session = trim($_POST['session']);
	// 		$description = trim($_POST['description']);
	// 		$amount = trim($_POST['amount']);
	// 		$validity = trim($_POST['validity']);
	// 		$week_month_year = trim($_POST['week_month_year']);
	// 		$type =  strtolower(trim($_POST['type']));
			
	// 		$organize = '3';

	// 		$query = "INSERT INTO `packages` (package_id,
	// 										class_name,
	// 										session,
	// 										description,
	// 										amount,
	// 										validity,
	// 										week_month_year,
	// 										type,
	// 										organize)
	// 					VALUES ('$package_id',
	// 							'$class_name',
	// 							'$session', 
	// 							'$description', 
	// 							'$amount',  
	// 							'$validity',
	// 						    '$week_month_year',
	// 						    '$type',
	// 						    '$organize')";

	// 		$save = mysqli_query($this->db, $query);

	// 		if($save){
	// 				return 1;
	// 			}

	// 	//}
	// }
	// //End
	
	function owner_trainor_percent(){

	
	}
	//End

	function edit_member_action(){

		$id = $_POST['id'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		// $address = $_POST['address'];
		$region = $_POST['region'];
		$house_no = $_POST['house_no'];
		$street_name = $_POST['street_name'];
		$province = $_POST['province'];
		$city = $_POST['city'];
		$barangay = $_POST['barangay'];
		$postal_code = $_POST['postal_code'];

		$contact = $_POST['contact'];

		if(!empty($_POST['new_password'])){
             $new_password = md5($_POST['new_password']);
        }else{
             $query = "SELECT * FROM `members` WHERE id = '$id'";
             $result =mysqli_query($this->db, $query);
             $row = mysqli_fetch_assoc($result);
             $new_password = $row['password'];
        }

		$query = "UPDATE `members` 
				 SET lastname = '$lastname',
				 	 firstname = '$firstname', 
					 age = '$age', 
					 gender = '$gender',
					 date_of_birth = '$date_of_birth', 
					 height = '$height',
				 	 weight = '$weight', 
					 region = '$region',
					 house_no = '$house_no',
					 street_name = '$street_name',
					 province = '$province',
					 city = '$city',
					 barangay = '$barangay',
					 postal_code = '$postal_code',
					 contact = '$contact',
					 password = '$new_password'
					 WHERE id = '$id'";

				$save = mysqli_query($this->db, $query);

				if($save){
						return 1;
				}

	}
	//End

	

		function insert_progress_action(){

			$member_id = $_POST['member_id'];
			$weight = $_POST['weight'];
			$body_fats = $_POST['body_fats'];
			$bone_density = $_POST['bone_density'];
			$body_water = $_POST['body_water'];
			$muscle_mass = $_POST['muscle_mass'];
			$body_structure = $_POST['body_structure'];
			$basal_metabolic = $_POST['basal_metabolic'];
			$metabolic_age = $_POST['metabolic_age'];
			$visceral_fats = $_POST['visceral_fats'];


			$date = new DateTime();
			$date_created = $date->format('Y-m-d');

			$query = "INSERT INTO `health_status` (member_id,
											weight,  
											body_fats, 
											bone_density, 
											body_water, 
											muscle_mass, 
											body_structure, 
											basal_metabolic, 
											metabolic_age, 
											visceral_fats,
											date_created)
						VALUES ('$member_id', 
								'$weight', 
								'$body_fats', 
								'$bone_density', 
							    '$body_water', 
							    '$muscle_mass', 
								'$body_structure', 
								'$basal_metabolic', 
							    '$metabolic_age',
							    '$visceral_fats',
								'$date_created')";

		
			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}
	}
	//End

	function delete_progress(){

		$id = $_POST['id'];

		$query = "DELETE FROM `health_status` WHERE id = '$id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End


	function edit_progress_action(){

		$id = $_POST['id'];

		$weight = $_POST['weight'];
		$body_fats = $_POST['body_fats'];
		$bone_density = $_POST['bone_density'];
		$body_water = $_POST['body_water'];
		$muscle_mass = $_POST['muscle_mass'];
		$body_structure = $_POST['body_structure'];
		$basal_metabolic = $_POST['basal_metabolic'];
		$metabolic_age = $_POST['metabolic_age'];
		$visceral_fats = $_POST['visceral_fats'];
		
		$query = "UPDATE `health_status` 
			     SET weight = '$weight',
			      	 body_fats = '$body_fats',
			      	 bone_density = '$bone_density',
			      	 body_water = '$body_water',
			      	 muscle_mass = '$muscle_mass',
			      	 body_structure = '$body_structure',
			      	 basal_metabolic = '$basal_metabolic',
			      	 metabolic_age = '$metabolic_age',
			      	 visceral_fats = '$visceral_fats'
				 WHERE id = '$id' ";
		
		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End


	function availability_action(){

		$user_id = $_POST['user_id'];

		$query = "SELECT * FROM `users` WHERE user_id = '$user_id'";	

		$result = mysqli_query($this->db, $query);

		$row = mysqli_fetch_assoc($result);

		$avl = $row['availability'];

		$avl_yes = '1';
		$avl_no = '0';

		if($avl == 0){
			$query = "UPDATE `users` 
			     SET availability = '$avl_yes'
				 WHERE user_id = '$user_id' ";
		}else{
			$query = "UPDATE `users` 
			     SET availability = '$avl_no'
				 WHERE user_id = '$user_id' ";
		}


		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function classes_time_table_action(){

		$setting_id = $_POST['setting_id'];

		$query = "SELECT * FROM `settings` WHERE setting_id = '$setting_id'";	

		$result = mysqli_query($this->db, $query);

		$row = mysqli_fetch_assoc($result);

		$status = $row['status'];

		$status_yes = '1';
		$status_no = '0';

		if($status == 0){
			$query = "UPDATE `settings` 
			     SET status = '$status_yes'
				 WHERE setting_id = '$setting_id' ";

			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}

		}else{
			$query = "UPDATE `settings` 
			     SET status = '$status_no'
				 WHERE setting_id = '$setting_id' ";
			$save = mysqli_query($this->db, $query);

			if($save){
				return 2;
			}
		}


		
	}
	//End


	function insert_new_goals_action(){

		$member_id = $_POST['member_id'];
		$goal = mysqli_real_escape_string($this->db, trim($_POST['goal']));
		$date_goal = mysqli_real_escape_string($this->db, trim($_POST['date_goal']));
	
		$date = new DateTime();
		$date_created = $date->format('Y-m-d');


		$query = "INSERT INTO `fitness_goals` (member_id,
											goal,
											date_goal,
											date_created)
						VALUES ('$member_id', 
								'$goal',
								'$date_goal',
								'$date_created')";
								

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	 function view_goals_action(){

	 	  $id = $_POST['id'];

		  $query = "SELECT * FROM `fitness_goals` WHERE id = '$id'";  
	      $result = mysqli_query($this->db, $query);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);  
	}
	//End

	//Start============Physical Fitness==============
	//If the physical fitness deleted, the packages associated with the physical fitness will also be deleted
	function delete_physical_fitness_action(){

		$physical_fitness_id = $_POST['physical_fitness_id'];

		$query = "DELETE FROM `physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id'";

		$save = mysqli_query($this->db, $query);

		if($save){

			$query = "DELETE FROM `physical_fitness_walk_in_rates` WHERE physical_fitness_id = '$physical_fitness_id'";

			$save = mysqli_query($this->db, $query);
			
			$query = "DELETE FROM `physical_fitness_packages_rates` WHERE physical_fitness_id = '$physical_fitness_id'";

			$save = mysqli_query($this->db, $query);

			$query = "DELETE FROM `trainor_physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id'";

			$save = mysqli_query($this->db, $query);

			return 1;
		}
	}
	//End

	//End============Physical Fitness==============

	function edit_fitness_goals_action(){

		$id = $_POST['id'];

		$goal = $_POST['goal'];
		$date_goal = $_POST['date_goal'];

		$query = "UPDATE `fitness_goals` 
			     SET goal = '$goal',
			         date_goal = '$date_goal'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function delete_fitness_goals_action(){

		$id = $_POST['id'];

		$query = "DELETE FROM `fitness_goals` WHERE id = '$id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
		

	}
	//End

	function assign_phyiscal_fitness(){

		$trainor_id = $_POST['trainor_id'];
		$physical_fitness_id = $_POST['physical_fitness_id'];

		$query = "SELECT * FROM trainor_physical_fitness WHERE user_id = '$trainor_id' AND physical_fitness_id = '$physical_fitness_id' ";
		$save = mysqli_query($this->db, $query);

		if(mysqli_num_rows($save) == 1){
			return 2;
		}else{
			$query = "INSERT INTO `trainor_physical_fitness` (
												user_id,
												physical_fitness_id)
							VALUES (
									'$trainor_id',
									'$physical_fitness_id')";
									

			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}
		}
	}
	//End

	function delete_trainor_physical_fitness(){

		$id = $_POST['id'];

		$query = "DELETE FROM `trainor_physical_fitness` WHERE id = '$id'";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
		

	}
	//End

	function edit_trainor_physical_fitness(){

		$edit_id = $_POST['edit_id'];
		$edit_physical_fitness_id = $_POST['edit_physical_fitness_id'];

		$query = "UPDATE `trainor_physical_fitness` 
			     SET physical_fitness_id = '$edit_physical_fitness_id'
				 WHERE id = '$edit_id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function save_new_password_action(){

		$user_id = $_POST['user_id'];
		$password = md5(trim($_POST['new_password']));

		$query = "UPDATE `users` 
			     SET password = '$password'
				 WHERE user_id = '$user_id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
		

	}
	//End

	//============================TRAINOR========================
	function session_start_action(){

		$id = $_POST['id'];

		$query = "SELECT * FROM `enrolls_to` WHERE id='$id'";			
		$result = mysqli_query($this->db , $query); 
		$row = mysqli_fetch_assoc($result);

		//If the remaining session is equal to zero then closed
		if($row['remaining_session'] == 'UNLIMITED'){
			    //Active
				return 1;
			
		}else if($row['remaining_session'] == ''){

			//No Session
			return 3;
			
			
		}else if($row['remaining_session'] == 0){

			//Closed
			$status = 2;
			$query = "UPDATE `enrolls_to` 
			     SET status = '$status'
				 WHERE id = '$id' ";

			$save = mysqli_query($this->db, $query);

			if($save){
				return 2;
			}
			
		}else{
			//Session start -
			$remaining_session_db = $row['remaining_session'];

			$remaining_session = $remaining_session_db - 1;

			$date = new DateTime();
			$start_date = $date->format('Y-m-d');

			$query = "UPDATE `enrolls_to` 
			     SET remaining_session = '$remaining_session',
			     	 start_date = '$start_date'
				 WHERE id = '$id' ";

			$save = mysqli_query($this->db, $query);

			//if session is equal to zero then the date of end is today
			$query = "SELECT * FROM `enrolls_to` WHERE id = '$id' ";
			$result = mysqli_query($this->db, $query);
			$row = mysqli_fetch_assoc($result);

			if($row['remaining_session'] == 0){
				//Closed
				$status = 2;
				$query = "UPDATE `enrolls_to` 
				     SET status = '$status'
					 WHERE id = '$id' ";

				mysqli_query($this->db, $query);

				$date = new DateTime();
				$end_date = $date->format('Y-m-d');

				$query = "UPDATE `enrolls_to` 
			     SET end_date = '$end_date'
				 WHERE id = '$id' ";
				 mysqli_query($this->db, $query);
				 if($save){
					return 1;
				}
			}else{
				if($save){
					return 1;
				}
			}

			
		}
		

	}
	//End

	function edit_trainor_action(){

		$id = $_POST['id'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$region = $_POST['region'];
		$house_no = $_POST['house_no'];
		$street_name = $_POST['street_name'];
		$province = $_POST['province'];
		$city = $_POST['city'];
		$barangay = $_POST['barangay'];
		$postal_code = $_POST['postal_code'];
		$contact = $_POST['contact'];
		$rate = $_POST['rate'];
		$new_password = md5(trim($_POST['new_password']));

		$query = "UPDATE `users` 
				 SET lastname = '$lastname',
				 	 firstname = '$firstname', 
					 age = '$age', 
					 gender = '$gender',
					 date_of_birth = '$date_of_birth', 
					 height = '$height',
				 	 weight = '$weight', 
					 region = '$region',
					 house_no = '$house_no',
					 street_name = '$street_name',
					 province = '$province',
					 city = '$city',
					 barangay = '$barangay',
					 postal_code = '$postal_code',
					 contact = '$contact',
					 password = '$new_password',
					 rate = '$rate'
					 WHERE id = '$id'";

			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}
	}
	//End

	function archive_trainor_action(){

		$id = $_POST['id'];

		$status = 'archived';

		$query = "UPDATE `users` 
			     SET status = '$status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function restore_trainor_action(){

		$id = $_POST['id'];
		$status = 'approved';

		$query = "UPDATE `users` 
			     SET status = '$status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function user_decline_action(){

		$id = $_POST['id'];
		$status = 'declined';

		$query = "UPDATE `users` 
			     SET status = '$status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	function restore_decline_user_action(){

		$id = $_POST['id'];
		$status = 'pending';

		$query = "UPDATE `users` 
			     SET status = '$status'
				 WHERE id = '$id' ";

		$save = mysqli_query($this->db, $query);

		if($save){
			return 1;
		}
	}
	//End

	//End============================TRAINOR========================

	function user_create_new_password(){
		
		$email = mysqli_real_escape_string($this->db, trim($_POST['email']));
		$new_password = md5(mysqli_real_escape_string($this->db, trim($_POST['new_password'])));

		$query = "SELECT * FROM `users` WHERE email='$email'";
		$result = mysqli_query($this->db, $query);

		if (mysqli_num_rows($result) == 1) {

			$query = "UPDATE `users` SET password = '$new_password' WHERE email = '$email' ";
			$save = mysqli_query($this->db, $query);

			if($save){
				return 1;
			}else{
				return 2;
			}
			//End
		}
	
	
	}
	//End

}