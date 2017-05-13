<?php
	include("config.inc.php");
	$rs=$mysqli->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
	$rs->bind_param("ss",$_POST["username"],$_POST["password"]);
	$rs->execute();
	$rs->bind_result($id,$username,$password,$fullname,$email,$sex,$dob);
	$rs=$rs->fetch();
	if($rs > 0){
		//session_start();
		//$_SESSION[$username]=$fullname;
		//echo '<form action="logout.php" method="POST">'.'<input type = "submit" value="Logout">'.'</form>';
	}else{
		header("Location: login.php/?message=Error");
	}
?>