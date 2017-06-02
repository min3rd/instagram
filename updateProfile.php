<?php
	include("config.inc.php");
	session_start();
	$sql = "UPDATE user SET username='".$_GET["username"]."', fullname='".$_GET["fullname"]."',mediaPath='".$_GET["mediapath"]."',email='".$_GET["email"]."',sex=".$_GET["sex"].",dob='".$_GET["dob"]."' WHERE userID = ".$_SESSION["userID"];
	$rs = $mysqli->query($sql);
	header("Location: editProfile.php?userID=".$_SESSION["userID"]);
	?>