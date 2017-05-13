<?php
include("config.inc.php"); //include config file
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
    header('HTTP/1.1 500 Invalid page number!');
    exit();
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);

//fetch records using page position and item per page. 
$post = $mysqli->prepare("SELECT * FROM post INNER JOIN postdetail ON post.postID = postdetail.postID ORDER BY time DESC LIMIT ?, ?");

//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
//for more info https://www.sanwebe.com/2013/03/basic-php-mysqli-usage
$post->bind_param("dd", $position, $item_per_page); 
$post->execute(); //Execute prepared Query
// sua id name message, thay vao la cac thuoc tinh cua post
$post->bind_result($id, $userID, $time,$id2,$postID,$path,$caption); //bind variables to prepared statement

//output results from database
while($post->fetch()){ //fetch values
	echo $id."</br>". "<img src=".$path."></br>".$caption."</br>";
    // day la doan div bai viet. gom nguoi dang, caption, so luot like, anh,...
}