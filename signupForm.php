<?php
include("config.inc.php");
include('class.smtp.php');
include "class.phpmailer.php";
$term = "".trim($_POST["email"]);
$check = $mysqli->query('SELECT * FROM user WHERE username = "'.$_POST["username"].'" OR email = "'.$term.'"');
if($check->num_rows > 0){
	header("Location: signup.php?error=isExist");
}else{
	$rs=$mysqli->prepare("INSERT INTO `user`(`userID`, `username`, `password`, `fullname`, `mediaPath`, `email`, `sex`, `dob`) VALUES (NULL,'".$_POST["username"]."','".$_POST["password"]."','".$_POST["fullname"]."','./images/default.png','".$_POST["email"]."',0,'')");
	$rs->execute();
	$rs = $mysqli->query('SELECT * FROM user WHERE username = "'.$_POST["username"].'" AND password = "'.$_POST["password"].'"');
	if ($rs->num_rows > 0) {
		while($row = $rs->fetch_assoc()) {
			session_start();
			$_SESSION["userID"] = $row["userID"];
			header("Location: index.php");
			$rs=$mysqli->prepare("INSERT INTO `follow`(`follower`, `following`, `seen`) VALUES (".$_SESSION["userID"].",".$_SESSION["userID"].",1)");
			$rs->execute();
		}
	} else {
		header("Location: login.php?error=failed");
	}
}


?>