<?php
include("config.inc.php");
$sql="INSERT INTO `follow`(`follower`, `following`, `seen`) VALUES (".$_GET["follower"].",".$_GET["following"].",0)";
$rs = $mysqli->query($sql);
header("Location: profile.php?userID=".$_GET["following"]);
?>