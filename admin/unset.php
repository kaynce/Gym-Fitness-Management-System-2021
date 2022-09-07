<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
 
<?php require('admin_session.php'); ?>

<?php 
	unset($_SESSION['loading']);
 ?>
<script>
	window.location.href = 'index';
</script>
		