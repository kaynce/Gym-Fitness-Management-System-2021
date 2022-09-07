<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>

<?php 
	if(!isset($_SESSION['email'])) {

		$_SESSION['client_logout'] = 'client_logout';
		?>
			<script>
					window.location.href = '../login';
			
			</script>
		<?php
	}
 ?>