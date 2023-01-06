<?php
$tweet = $_GET['tweet'];
$user = $_COOKIE['user'];
$reply = $_GET['reply'];
$date = getDate();
$days = substr($date["month"], 0, 3) . "-" . $date["mday"] . "-" . $date["year"] . ":" . $date["hours"] . ":" . $date["minutes"] . ":" . $date["seconds"];
$con = mysql_connect("localhost", "root", "");
mysql_select_db("gogo", $con);
if($tweet != null){
	if($reply != null || $reply != ""){
	$me = mysql_query("insert into tweets values(0, $user, '$tweet', '$days', 0, $reply)", $con);
	} else{
	$me = mysql_query("insert into tweets values(0, $user, '$tweet', '$days', 0, null)", $con);
	}
}
			#Checking Logged in
			$user = $_COOKIE['user'];
			if($user == null){
				header("Location: login.php");
			}
			$me = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$user"));
			$watchUser = $_GET['user'];
			if($watchUser == null && $_COOKIE['watchUser'] == null){$watchUser = $user;}
			if($watchUser == null){$watchUser = $_COOKIE['watchUser'];}
			setCookie('watchUser', $watchUser, -1);
			#View by
			$view = $_GET['view'];
			if($view == null){$view = $_COOKIE['view'];}
			setCookie('view', $view, -1);
			$pro = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$watchUser"));
			#View People
			$peo = $_GET['people'];
			if($peo == null){$peo = $_COOKIE['people'];}
			setCookie('people', $peo, -1);
			#Checking Logging Out
			if($_GET['logout'] == "true"){
			setCookie('user', "", -1);
			setCookie('watchUser', "", -1);
			header("Location: login.php");
			}
			#Checking Like
			$like = $_GET['like'];
			if($like != null){
			$man = mysql_num_rows(mysql_query("select * from likeun where tweet_id=$like and user_id=$me[0]"));
			if($man == 0){
				$men = mysql_fetch_array(mysql_query("select * from tweets where tweet_id=$like"));
				$men = $men[4] + 1;
				$men = mysql_query("update tweets set likeNo='$men' where tweet_id=$like");
				$men = mysql_query("insert into likeun values($me[0], $like)");
			} else {
				$men = mysql_fetch_array(mysql_query("select * from tweets where tweet_id=$like"));
				$men = $men[4] - 1;
				$men = mysql_query("update tweets set likeNo='$men' where tweet_id=$like");
				$men = mysql_query("Delete from likeun where tweet_id=$like and user_id=$me[0]");
			}
			}
			#Checking Follow Or Unfollow
			$follow = $_GET['follow'];
			$unfollow = $_GET['unfollow'];
			if($unfollow != null){
				$unf = mysql_query("Delete from follow where user_id=$user AND following_id=$unfollow");	
			}
			if($follow != null){
				$fol = mysql_num_rows(mysql_query("Select * from follow where user_id=$user AND following_id=$follow"));
				if($fol == 0 || $fol == null){
				$fol = mysql_query("Insert into follow values($user, $follow)");	
				}
			}

	#Tweets Section
	$result = mysql_query("select * from tweets order by tweet_id desc");
	if($view == 'pop'){
	$result = mysql_query("select * from tweets order by likeNo desc");
	}
	$topTweet = mysql_fetch_array(mysql_query("Select * from tweets order by likeNo DESC limit 1"));
	$tops = mysql_fetch_array(mysql_query("select * from user where user_id=$topTweet[1]"));
	$no = 0;
	if($_GET['user'] != null && $_GET['user'] != $me[0]){
		$result = mysql_query("select * from tweets where user_id=$watchUser");
	}
	while($row = mysql_fetch_array($result)){
		$names = mysql_fetch_array(mysql_query("select * from user where user_id=$row[1]"));
		if($_GET['user'] != null && $_GET['user'] != $me[0]	){
			$fol = 1;
		} else {
			$fol = mysql_num_rows(mysql_query("select * from follow where following_id=$names[0] and user_id=$me[0]"));
		}
		if($row[1] == 13){$fol=1;}
		if($names[0] == $me[0]){$fol = 1;}
		$repno = mysql_num_rows(mysql_query("select * from tweets where reply_Id=$row[0]"));
		$date = generateDate($row[3]);
		$style = "";

	if($row[5] == null && $fol != 0){
			if($row[4]>199){
				$style = $style . "background-color: #FF9;";
			} else if($row[4]>99){
				$style = $style . "background-color: #CFB;";
			}
			if($row[1] == 13){
				$style = $style . "background-color: #BFF;";
			}
			echo "<div class='tweet' style='$style'>";
				echo "<div class='tweetHeader'>";
					echo "<img src='images/$names[11].png' class='usericon'/> <a href='index.php?user=$names[0]'>$names[1] $names[2]</a> <span style='color: #333; float:right;'>$date</span></div>";
			echo $row[2];
			echo "		<div class='tweetFooter'>
				    <div class='twefooLeft'>$row[4] Like | $repno Replies
				    </div>
				    <div class='twefooRight'>
									<a onclick='over($row[0])'>Reply</a>";
		$man = mysql_num_rows(mysql_query("select * from likeun where tweet_id=$row[0] and user_id=$me[0]"));
		if($man == 0){
			echo " <a href='index.php?like=$row[0]'>Like</a>";
		} else {
			echo " <a href='index.php?like=$row[0]'>Dislike</a>";
		}
			echo "</div></div></div>";
			#ReplySection
						echo "<div class='Reply' style='display: none;' id='reply$row[0]'>
							<div class='ReplyHeader'>	
								<img src='images/$me[11].png' class='usericon'></img> $me[1] $me[2]
				      </div>
							<form action='compose.php' method=get>
								<textarea name='tweet'></textarea>
								<input type='hidden' name='reply' value='$row[0]'/>
								<input type='submit' value='Reply'>
								<input type='button' value='Cancel' onclick='overs($row[0])'>
							</form>
						</div>";


		#Replist
		$replies = mysql_query("select * from tweets where reply_id=$row[0]");
		while($rep = mysql_fetch_array($replies)){
			$names = mysql_fetch_array(mysql_query("select * from user where user_id=$rep[1]"));
			$date = generateDate($rep[3]);
			$style = " width: 88%; margin-left: 7%;";
				if($rep[4]>199){
					$style = $style . "background-color: #FF9;";
				} else if($rep[4]>99){
					$style = $style . "background-color: #CFB;";
				}
				echo "<div class='tweet' style='$style'>";
					echo "<div class='tweetHeader'>";
						echo "<img src='images/$names[11].png' class='usericon'/> <a href='index.php?user=$names[0]'>$names[1] $names[2]</a> <span style='color: #333; float:right;'>$date</span></div>";
				echo $rep[2];
				echo "		<div class='tweetFooter'>
						  <div class='twefooLeft'>$rep[4] Like
						  </div>
						  <div class='twefooRight'>";
			$man = mysql_num_rows(mysql_query("select * from likeun where tweet_id=$rep[0] and user_id=$me[0]"));
			if($man == 0){
				echo " <a href='index.php?like=$rep[0]'>Like</a>";
			} else {
				echo " <a href='index.php?like=$rep[0]'>Dislike</a>";
			}
				echo "</div></div></div>";
		}
	}
}







#---------------------------------===================================================--------------------------------------

function generateDate($date){
	$date2 = getDate();
	list($days, $hour, $min, $sec) = explode(':', $date);
	list($mon, $day, $year) = explode('-', $days);
	
	if($date2["year"] == $year){
		if($date2["mday"] == $day){
			if($date2["hours"] == $hour){
				if($date2["minutes"] == $min){
					if($date2["seconds"] - $sec == 0){
						return "now";
					}
					return $date2["seconds"] - $sec . "s ago";
				}
				return $date2["minutes"] - $min . "min ago";
			}
			return $date2["hours"] - $hour . "h ago";
			}
			if($date2["mday"] - $day < 7){
				if($date2["mday"] - $day == 1){
					return "yesterday";
				}
				return $date2["mday"] - $day . " days ago";
			} else{
			return "$mon $day";
			}
	}
	return $date2["year"] - $year . " years ago";
}
function getWeek($date){
	if($date == 1){return "Mon";}
	if($date == 2){return "Tue";}
	if($date == 3){return "Wed";}
	if($date == 4){return "Thu";}
	if($date == 5){return "Fri";}
	if($date == 6){return "Sat";}
	if($date == 7){return "Sun";}
}
?>
