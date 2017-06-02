<?php
	include("config.inc.php");
	session_start();
	if($_SESSION["userID"] == null){
		header("Location: login.php");	
	}else{
		session_destroy();
		header("Location: login.php");
	}
	
?>