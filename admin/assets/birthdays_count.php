<?php 
	$type = $_SESSION['type'];

	if ($type == 'admin') {
			// $row = mysqli_fetch_assoc($result);

	?>
	
	<?php 
		$date_bc = new DateTime();
		$today_bc = substr($date_bc->format('M d, Y'), 0, 6);

		$total_birthday_bc = 0;
		// Clients start
		// count the total birthday this month in the database
        $query_bc = "SELECT * FROM `members`";
        $result_bc = mysqli_query($con, $query_bc);
        
        if(mysqli_num_rows($result_bc) > 0){
        	while($row_bc = mysqli_fetch_assoc($result_bc)){
        		$date_db_bc = date("M d, Y", strtotime($row_bc['date_of_birth']));
        		$date_of_birth_bc = substr($date_db_bc, 0, 6);

        		if($today_bc == $date_of_birth_bc){
        			$total_birthday_bc += 1;
        		}
        	}
        }
       // Clients End

        // Admin start
		// count the total birthday this month in the database
        $query_bc = "SELECT * FROM `users` WHERE type != 'admin' ";
        $result_bc = mysqli_query($con, $query_bc);
        
        if(mysqli_num_rows($result_bc) > 0){
        	while($row_bc = mysqli_fetch_assoc($result_bc)){
        		$date_db_bc = date("M d, Y", strtotime($row_bc['date_of_birth']));
        		$date_of_birth_bc = substr($date_db_bc, 0, 6);

        		if($today_bc == $date_of_birth_bc){
        			$total_birthday_bc += 1;
        		}
        	}
        }
       // Admin End


	 ?>

	<a class="sidebar-right-toggle" data-open="sidebar-right"><span class="badge label label-success"><?php echo $total_birthday_bc ?></span><i class="fa fa-chevron-left"></i></a>

	<?php 
	} else {
	 ?>
	<a class="sidebar-right-toggle" data-open=""><i class=""></i></a>
	<?php 
	}
?>