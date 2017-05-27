<?php
	session_start();
?>

<?php
	include("config.inc.php");
	$sql = "INSERT INTO `comment`(`commentID`, `userID`, `postID`, `comment`, `time`, `seen`) VALUES (NULL,?,?,?,?,?)";
	$rs=$mysqli->prepare($sql);
	$i=0;
	$rs->bind_param("iissi",$_SESSION["userID"],$_GET["postID"],$_GET["comment"],date("Y/m/d H:i:s"),$i);
	$rs->execute();
	header("Location: index.php");
?>