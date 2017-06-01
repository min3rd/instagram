<?php
	session_start();
?>
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
$post = $mysqli->prepare("SELECT * FROM `post` WHERE userID IN ( SELECT userID FROM follow WHERE follow.follower = ?) ORDER by time DESC LIMIT ?, ?");

//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
//for more info https://www.sanwebe.com/2013/03/basic-php-mysqli-usage
$post->bind_param("idd",$_SESSION["userID"], $position, $item_per_page); 
$post->execute(); //Execute prepared Query
// sua id name message, thay vao la cac thuoc tinh cua post
$post->bind_result($postID, $userID, $time,$mediaPath,$caption); //bind variables to prepared statement

//output results from database
while($post->fetch()){ //fetch values
    // day la doan div bai viet. gom nguoi dang, caption, so luot like, anh,...
	// timePost so sánh timeCurrent 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "instagram";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM user WHERE userID = ".$userID;
	//Tim nguoi dang bai
	$user = $conn->query($sql);
	$row = $user->fetch_assoc();
	//Tim so luong like cua bai viet
	$sql = "SELECT * FROM liked WHERE postID = ".$postID;
	$like = $conn->query($sql);
	
	//kiem tra xem nguoi dung da like bai viet chua
	$sql = "SELECT * FROM liked WHERE postID = ".$postID." AND userID = ".$_SESSION["userID"];
	$liked = $conn->query($sql);
	
	
	//Tim comment
	$sql = "SELECT * FROM comment WHERE postID = ".$postID;
	$comment = $conn->query($sql);
	
	//Ham tinh thoi gian dang bai
	$timePost	= $time;
	$timeReply	= date('Y/m/d H:i:s');

	$datePost	= date_parse_from_format('Y/m/d H:i:s', $timePost);
	$dateReply	= date_parse_from_format('Y/m/d H:i:s', $timeReply);

	$tsPost		= mktime($datePost['hour'], $datePost['minute'], $datePost['second'], $datePost['month'], $datePost['day'], $datePost['year']);
	$tsReply	= mktime($dateReply['hour'], $dateReply['minute'], $dateReply['second'], $dateReply['month'], $dateReply['day'], $dateReply['year']);

	$distance 	= $tsReply - $tsPost;

	// 23 seconds ago
	// 23 minutues ago
	// 2 hours ago
	// Yesterday at 09:20:23
	// 18/06/2013 at 09:20:23


	switch ($distance){
		case ($distance < 60): 
			$result = ($distance == 1) ? $distance . ' second ago' : $distance . ' seconds ago';
			break;
		case ($distance >= 60 && $distance < 3600):
			$minute	= round($distance/60);
			$result = ($minute == 1) ? $minute . ' minute ago' : $minute . ' minutes ago';
			break;
		case ($distance >= 3600 && $distance < 86400):
			$hour	= round($distance/3600);
			$result = ($hour == 1) ? $hour . ' hour ago' : $hour . ' hours ago';
			break;
		default:
			$day = round($distance/86400);
			$result = $day.' days ago';
			break;
	}
	echo '<article class="_h2d1o _j5hrx _pieko">';
	echo '<header class="_s6yvg">';
	echo '<a class="_5lote _pss4f _vbtk2" href="'.'" style="width: 30px; height: 30px;"><img class="_a012k" src="'.$row["mediaPath"].'"></a>';
	echo '<div class="_dzy0a">';
	echo '<a class="_4zhc5 notranslate _ook48" title="'.$userID.'" href="'.'">'.$row["username"].'</a>';
	echo '<div class="_bm6zw">
				<!-- react-empty: 741 -->
					</div>
				</div>
		 ';
	echo '<a class="_ljyfo" href="#"><time class="_379kp" datetime="'.$time.'">'.$result.'</time></a>';
	echo '</header>';
	echo '<div>';
	echo 	'<div class="_9f9pr">';
	echo 		'<div>';
	echo 			'<div class="_22yr2 _e0mru">';
	echo				'<div class="_jjzlb" style="padding-bottom: 100%;"><img alt="@'.$row["username"].'" class="_icyx7" id="pImage_10" src="'.$mediaPath.'"></div>';
	echo	'
							<!-- react-empty: 750 -->
						   <div class="_ovg3g"></div>
						</div>
					 </div>
	';
	echo '</div></div>';
	echo '
			<div class="_es1du _rgrbt">
                              <section class="_tfkbw _hpiil">
                                 <div class="_iuf51 _oajsw">
                                    <span class="_tf9x3">
                                       <!-- react-text: 777 --><!-- /react-text --><span>'.$like->num_rows.'</span><!-- react-text: 779 --> lượt thích<!-- /react-text -->
                                    </span>
                                 </div>
                              </section>
                              <ul class="_mo9iw _pnraw">
                                 <li class="_nk46a">
                                    <h1><a class="_4zhc5 notranslate _iqaka" title="'.$row["username"].'" href="profile.php/?username='.$row["username"].'">'.$row["username"].'</a><span>'.$caption.'</span></h1>
                                 </li>';
								 if ($comment->num_rows > 0) {
									// output data of each row
									$i=0;
									while($row = $comment->fetch_assoc()) {
										if($i<5){
											$servername2 = "localhost";
											$username2 = "root";
											$password2 = "";
											$dbname2 = "instagram";
											// Create connection
											$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);
											$sql2 = "SELECT * FROM user WHERE userID = ".$row["userID"];
											//Tim nguoi dang bai
											$user2 = $conn2->query($sql2);
											$row2 = $user2->fetch_assoc();
											echo '<li class="_nk46a"><a class="_4zhc5 notranslate _iqaka" title="'.$row2["username"].'" href="profile.php/?username='.$row2["username"].'">'.$row2["username"].'</a><span><span>'.$row["comment"].'</span></span></li>';
											$conn2->close();
										}
										$i++;
									}
								}
	echo '
								 <li class="_nk46a"><a href="postDetail.php"><button class="_l086v _ifrvy">tải thêm bình luận</button></a></li>
							  </ul>
							  <section class="_jveic _dsvln">
								 <a class="_ebwb5 _1tv0k" href="like.php?postID='.$postID.'" role="button" aria-disabled="true"><span class="_soakw ';
	if($liked->num_rows > 0){
		echo 'coreSpriteHeartFull';
	}else{
		echo 'coreSpriteHeartOpen';
	}							 
	echo 						'">Like Or Dislike</span></a>
								
								 <form class="_k3t69" action = "comment.php" method="GET">
								 <input type="hidden" name="postID" value="'.$postID.'">
								 <input type="text" class="_7uiwk _qy55y" aria-label="Thêm bình luận…" placeholder="Thêm bình luận…" value="" name="comment">
								 <input class="_9q0pi" type="submit" id="comment">
								 </form>
							  </section>
							</div>
							';
	
	echo '</article>';
	$conn->close();
}
?>