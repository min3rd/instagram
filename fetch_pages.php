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
$post = $mysqli->prepare("SELECT * FROM `post` WHERE userID IN ( SELECT userID FROM follow WHERE follow.follower = ?) ORDER by time  LIMIT ?, ?");

//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
//for more info https://www.sanwebe.com/2013/03/basic-php-mysqli-usage
$post->bind_param("idd",$userID, $position, $item_per_page); 
$post->execute(); //Execute prepared Query
// sua id name message, thay vao la cac thuoc tinh cua post
$post->bind_result($postID, $userID, $time); //bind variables to prepared statement

//output results from database
while($post->fetch()){ //fetch values
    // day la doan div bai viet. gom nguoi dang, caption, so luot like, anh,...
	$user=$mysqli->prepare("SELECT * FROM user WHERE userID = ?");
	$user->bind_param("i",$userID);
	$user.execute();
	echo '<header class="_s6yvg">
                              <a class="_5lote _pss4f _vbtk2" href="https://www.instagram.com/xxxibgdrgn/" style="width: 30px; height: 30px;"><img class="_a012k" src="./Instagram_files/18162043_172383386620119_6892177918751932416_a.jpg"></a>
                              <div class="_dzy0a">
                                 <a class="_4zhc5 notranslate _ook48" title="xxxibgdrgn" href="https://www.instagram.com/xxxibgdrgn/">'..'</a>
                                 <div class="_bm6zw">
                                    <!-- react-empty: 741 -->
                                 </div>
                              </div>
                              <a class="_ljyfo" href="https://www.instagram.com/p/BT-dncBgJLG/"><time class="_379kp" datetime="2017-05-12T02:44:26.000Z" title="12 Tháng 5 2017">13 giờ</time></a>
                           </header>';
}