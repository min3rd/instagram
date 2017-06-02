<?php
	session_start();
?>

<?php
	include("config.inc.php");
	$u = $_SESSION["userID"];
	$sql = "select * from post where userID='$u'";
	$result = $mysqli->query($sql);
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$post = $row["postID"];
			$sql2= "select * from comment where postID = '$post'";
			$result2 = $mysqli->query($sql);
			if($result2->num_rows > 0){
				while($row2 = $result2->fetch_assoc()){
					$user = $row2["userID"];
					$result3 = $mysqli->query("select * from user where userID = '$user'");
					
					if($result3->num_rows > 0){
						while($row3 = $result3->fetch_assoc()){	
							echo '<article class="_h2d1o _j5hrx _pieko">';
							echo '<header class="_s6yvg">';
							echo '<div class="_dzy0a">';
							echo '<a class="_4zhc5 notranslate _ook48" title="'.$row3["userID"].'" href="profile.php?username='.$row3["username"].'">'.$row3["username"].' comment your post</a>';
							echo '</header>';
							echo '</article>';
						}
				}
			}
			
			$sql4 = "select * from liked where postID = '$post'";
			$result4 = $mysqli->query($sql);
			if($result4->num_rows > 0){
				while($row4 = $result4->fetch_assoc()){
					$user = $row4["userID"];
					$result5 = $mysqli->query("select * from user where userID = '$user'");
					
					if($result5->num_rows > 0){
						while($row5 = $result5->fetch_assoc()){	
							echo '<article class="_h2d1o _j5hrx _pieko">';
							echo '<header class="_s6yvg">';
							echo '<div class="_dzy0a">';
							echo '<a class="_4zhc5 notranslate _ook48" title="'.$row5["userID"].'" href="profile.php?username='.$row5["username"].'">'.$row5["username"].' like your post</a>';
							echo '</header>';
							echo '</article>';
						}
					}
				}
			}
		}
	}
	}
?>