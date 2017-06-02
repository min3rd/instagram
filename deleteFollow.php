<?php
include("config.inc.php");
$sql="DELETE FROM `follow` WHERE follower=".$_GET["follower"]." AND following = ".$_GET["following"];
$rs = $mysqli->query($sql);
header("Location: profile.php?userID=".$_GET["following"]);
?>