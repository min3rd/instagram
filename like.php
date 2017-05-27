<?php
	session_start();
?>
<?php
	include("config.inc.php");
	$sql = "SELECT * FROM liked WHERE postID = ".$_GET["postID"]." AND userID = ".$_SESSION["userID"];
	$liked = $mysqli->query($sql);
	if($liked->num_rows > 0){
		$sql="DELETE FROM `liked` WHERE postID=? AND userID=?";
		$rs = $mysqli->prepare($sql);
		$rs->bind_param("ii",$_GET["postID"],$_SESSION["userID"]);
		$rs->execute();
		header("Location: index.php");
	}else{
		$sql="INSERT INTO `liked`(`likeID`, `postID`, `userID`, `time`, `seen`) VALUES (NULL,?,?,?,?)";
		$rs = $mysqli->prepare($sql);
		$i =0;
		$rs->bind_param("iisi",$_GET["postID"],$_SESSION["userID"],date("Y/m/d H:i:s"),$i);
		$rs->execute();
		header("Location: index.php");
	}
?>