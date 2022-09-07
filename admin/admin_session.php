<?php  if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php 
include 'assets/db_connect.php';

if(!isset($_SESSION['user_id'])) {
    ?>
		<script>
			// alert("Login first before entering the page!");
			window.location.href = 'login';
		</script>
	<?php
}

// if(!isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) 
 ?>
