<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>

<?php require('client_session.php'); ?>

<?php 
	unset($_SESSION['loading']);
 ?>
<script>
	window.location.href = 'index';
</script>
		