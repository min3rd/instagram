<?php
	include("config.inc.php");
	session_start();
	if($_SESSION["userID"] == null){
		header("Location: login.php");	
	}else{
		$rs = $mysqli->query('SELECT * FROM user WHERE userID = "'.$_SESSION["userID"].'"');
		if ($rs->num_rows > 0) {
			
		} else {
			session_destroy();
			header("Location: login.php");
		}
	}
	
	
	
	?>
<html lang="vi" class="js logged-in ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Instagram</title>
    <meta name="robots" content="noimageindex">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/is.css">

    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

</head>
<body class="">
    <span id="react-root">
        <section data-reactroot="" class="_8f735">
            <main class="_6ltyr _rnpza" role="main">
                <section class="_jx516">
                    <div class="_qj7yb">
                        <div>
                            <div class="wrapper">
							<?php
							$value = $_GET["val"];
	$post = $mysqli->prepare('select * from post WHERE postID='.$value);
	$post->execute(); //Execute prepared Query
	// sua id name message, thay vao la cac thuoc tinh cua post
	$post->bind_result($postID, $userID, $time,$mediaPath,$caption);
	while($post->fetch()){
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
								 echo'						  <section class="_jveic _dsvln">
								 <a class="_ebwb5 _1tv0k" href="like_1.php?postID='.$postID.'" role="button" aria-disabled="true"><span class="_soakw ';
	if($liked->num_rows > 0){
		echo 'coreSpriteHeartFull';
	}else{
		echo 'coreSpriteHeartOpen';
	}							 
	echo 						'">Like Or Dislike</span></a>
								
								 <form class="_k3t69" action = "comment_1.php" method="GET">
								 <input type="hidden" name="postID" value="'.$postID.'">
								 <input type="text" class="_7uiwk _qy55y" aria-label="Thêm bình luận…" placeholder="Thêm bình luận…" value="" name="comment">
								 <input class="_9q0pi" type="submit" id="comment" value="Send">
								 </form>
							  </section>';
								 if ($comment->num_rows > 0) {
									// output data of each row
									$i=0;
									while($row = $comment->fetch_assoc()) {
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
									}
	echo '
							  </ul>
	
							</div>
							';
	
	echo '</article>';
	$conn->close();
	}
							?>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <nav class="_onabe _5z3y6 menu" role="navigation">
                <div class="_fjpuc _sq03j">
                    <div class="_6v8vp">
                        <div class="_df358">
                            <div class="_jha5b">
                                <div class="_om391"><a class="_1b8in _soakw coreSpriteMobileNavHomeActive" href="index.php">Instagram</a></div>
                            </div>
                            <div class="_9pxkq _icv3j">
                                <div class="search-box">
                                    <input type="text" class="_9x5sw _qy55y" autocomplete="off" placeholder="Tìm kiếm" />
                                    <div class="result"></div>
                                </div>
                            </div>
                            <div class="_nhei4">
                                <div class="_pq5am">
                                    <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteMobileNavSearchInactive" href="search.php">Tìm người</a></div>
                                    <div class="_7smet"><span class="_im3et _vbtk2 coreSpriteDesktopNavActivity" id="noti" onclick="test()"></span><div id="noti_result"></div></div>
									
                                    <div class="_7smet"><a class="_soakw _vbtk2 coreSpriteDesktopNavProfile" href="profile.php?userID=<?php echo $_SESSION["userID"]?>">Trang cá nhân</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <footer class="_oofbn" role="contentinfo">
                <div class="_mhrsk _np0yb" style="max-width: 600px;">
                    <nav class="_p1gbi" role="navigation">
                        <ul class="_fh0f2">
                            <li class="_fw3ds"><a href="#">Giới thiệu về chúng tôi</a></li>
                            <li class="_fw3ds"><a href="#">Hỗ trợ</a></li>
                            <li class="_fw3ds"><a href="#">Blog</a></li>
                            <li class="_fw3ds"><a href="#">Báo chí</a></li>
                            <li class="_fw3ds"><a href="#">API</a></li>
                            <li class="_fw3ds"><a href="#">Việc làm</a></li>
                            <li class="_fw3ds"><a href="#">Quyền riêng tư</a></li>
                            <li class="_fw3ds"><a href="#">Điều khoản</a></li>
                            <li class="_fw3ds"><a href="">Thư mục</a></li>
                        </ul>
                    </nav>
                    <span class="_es4h6">© <?php echo date('Y');?> Instagram</span>
                </div>
            </footer>
            <!-- react-empty: 967 -->
            <div class="_s1xpw _44kmz">
                <div class="_plwoo"></div>
            </div>
        </section>
    </span>
	
	    <script type="text/javascript">
        $(document).ready(function () {
            $('.search-box input[type="text"]').on("keyup input", function () {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("livesearch.php", { term: inputVal }).done(function (data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function () {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
		
		

    </script>
	
	
    <script type="text/javascript">
		function test(){
			$(document).ready(function() {
				var resultDropdown22 = $(this).siblings(".result");
                    $.get("notification.php").done(function (data) {
                        resultDropdown22.html(data);
                    });
				});
				
		}
		
		
    </script>
	
    <script type="text/javascript">
        // Create a clone of the menu, right next to original.
        $('.menu').addClass('original').clone().insertAfter('.menu').addClass('cloned').css('position', 'fixed').css('top', '0').css('margin-top', '0').css('z-index', '500').removeClass('original').hide();

        scrollIntervalID = setInterval(stickIt, 10);


        function stickIt() {

            var orgElementPos = $('.original').offset();
            orgElementTop = orgElementPos.top;

            if ($(window).scrollTop() >= (orgElementTop)) {
                // scrolled past the original position; now only show the cloned, sticky element.

                // Cloned element should always have same left position and width as original element.
                orgElement = $('.original');
                coordsOrgElement = orgElement.offset();
                leftOrgElement = coordsOrgElement.left;
                widthOrgElement = orgElement.css('width');
                $('.cloned').css('left', leftOrgElement + 'px').css('top', 0).css('width', widthOrgElement).show();
                $('.original').css('visibility', 'hidden');
            } else {
                // not scrolled past the menu; only show the original menu.
                $('.cloned').hide();
                $('.original').css('visibility', 'visible');
            }
        }
    </script>
</body>
</html>