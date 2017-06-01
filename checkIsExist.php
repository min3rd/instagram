<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "instagram");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = 'SELECT * FROM user WHERE username = "'.trim($_REQUEST['term']).'"';
    $check = $link->query($sql);
	if($check->num_rows > 0){
		echo '<article class="_h2d1o _j5hrx _pieko">';
		echo "Tài khoản đã được sử dụng";
		echo '</article>';
	}else{

	}
}
 
// close connection
mysqli_close($link);
?>