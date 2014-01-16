<?php
	session_start();
	unset($_SESSION[authen]);
	header("location:index.php");
?>