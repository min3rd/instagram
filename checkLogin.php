<?php
	session_start();
	include("config.inc.php");
	$rs = $mysqli->query('SELECT * FROM user WHERE username = "'.$_GET["username"].'" AND password = "'.$_GET["password"].'"');
	if ($rs->num_rows > 0) {
		while($row = $rs->fetch_assoc()) {
			$_SESSION["userID"]=$row["userID"];
			header("Location: instagram.php");
		}
	} else {
		header("Location: login.php");
	}
	
?>