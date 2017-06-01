<?php
include("config.inc.php");
$target_dir = "images/";
$target_file = $target_dir .$_POST["userIDupload"].date("Y-m-d-H-i-s"). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $rs=$mysqli->prepare("INSERT INTO `post`(`postID`, `userID`, `time`, `mediaPath`, `caption`) VALUES (NULL,?,?,?,?)");
	$rs->bind_param("isss",$_POST["userIDupload"],date("Y/m/d H:i:s"),$target_file,$_POST["caption"]);
	$rs->execute();
	header("Location: index.php");
}else{
	header("Location: index.php");
	$_SESSION["error"] = "Failed uploading your image!";
}
?> 
