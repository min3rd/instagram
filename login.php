<form action="login1.php" method="POST">
<?php
	if($_GET["message"] == "Error"){
		echo "Username or Password Invalid!</br>";
	}
?>
Username: <input type = "text" name = "username"></br>
Password: <input type = "password" name="password"></br>
<input type="submit" value="Login">
</form>