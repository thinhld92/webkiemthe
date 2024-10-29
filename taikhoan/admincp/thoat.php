<?php 
	include ('../config/config.php');
	unset($_SESSION['username_admin']);
	header('Location: index.php');
?>