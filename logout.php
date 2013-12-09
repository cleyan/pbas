<!--PHP Script for logout the user by unsetting session variables -->
<?php
	session_start();
	//store to test if they 'were' logged in
	$old_user = $_SESSION['username'];
	$old_year = $_SESSION['pbasYear'];
	unset($_SESSION['username']);
	unset($_SESSION['username']);
	session_destroy();
	header('location:index.php');
?>
