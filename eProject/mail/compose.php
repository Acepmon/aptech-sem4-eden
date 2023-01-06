<?php
$tweet = $_GET['tweet'];
session_start();
$user = $_SESSION['user'];
$reply = $_GET['reply'];
$date = getDate();
$days = substr($date["month"], 0, 3) . "-" . $date["mday"] . "-" . $date["year"] . ":" . $date["hours"] . ":" . $date["minutes"] . ":" . $date["seconds"];

$con = mysqli_connect("localhost", "root", "", "gogo");
if($tweet != null){
	if($reply != null || $reply != ""){
		$me = mysqli_query($con, "insert into tweets values(0, $user, '$tweet', '$days', 0, $reply)");
	} else{
		$me = mysqli_query($con, "insert into tweets values(0, $user, '$tweet', '$days', 0, null)");
	}
}
#Retweeting
$ret = $_GET['retweet'];
if($ret != null){
	$me = mysqli_fetch_array(mysqli_query($con, "select tweet from tweets where tweet_id=$ret"));
	$me = $me[0] . "-0retweetB00M-" . $ret;
	$meah = mysqli_query($con, "insert into tweets values(0, $user, '$me', '$days', 0, null)");
}
			#Checking Logged in
			if($user == null){
				header("Location: login.php");
			}
			$me = mysqli_fetch_array(mysqli_query($con, "select * from accounts where acc_id=$user"));
			$watchUser = $user;
			if($watchUser == null && $_COOKIE['watchUser'] == null){$watchUser = $user;}
			if($watchUser == null){$watchUser = $_COOKIE['watchUser'];}
			setCookie('watchUser', $watchUser, -1);
			#View by
			$view = $_GET['view'];
			if($view == null){$view = $_COOKIE['view'];}
			setCookie('view', $view, -1);
			#Checking Logging Out
			if($_GET['logout'] == "true"){
				session_destroy();
				header("Location: http://www.eden.com/intro.php");
			}
			#Checking Like
			$like = $_GET['like'];
			if($like != null){
			$man = mysqli_num_rows(mysqli_query($con, "select * from likeun where tweet_id=$like and user_id=$me[0]"));
			if($man == 0){
				$men = mysqli_fetch_array(mysqli_query($con, "select * from tweets where tweet_id=$like"));
				$men = $men[4] + 1;
				$men = mysqli_query($con, "update tweets set likeNo='$men' where tweet_id=$like");
				$men = mysqli_query($con, "insert into likeun values($me[0], $like)");
			} else {
				$men = mysqli_fetch_array(mysqli_query($con, "select * from tweets where tweet_id=$like"));
				$men = $men[4] - 1;
				$men = mysqli_query($con, "update tweets set likeNo='$men' where tweet_id=$like");
				$men = mysqli_query($con, "Delete from likeun where tweet_id=$like and user_id=$me[0]");
			}
			}

	#Tweets Section
	$result = mysqli_query($con, "select * from tweets order by tweet_id desc");
	if($view == 'pop'){
	$result = mysqli_query($con, "select * from tweets order by likeNo desc");
	}
	$no = 0;
	while($row = mysqli_fetch_array($result)){
		$names = mysqli_fetch_array(mysqli_query($con, "select * from accounts where acc_id=$row[1]"));
		if($user != null && $user != $me[0]){
			$fol = 1;
		} else {
			$fol = mysqli_num_rows(mysqli_query($con, "select * from follow where following_id=$names[0] and user_id=$me[0]"));
		}
		if($names[7] == "admin"){$fol=1;}
		if($names[0] == $me[0]){$fol = 1;}
		$repno = mysqli_num_rows(mysqli_query($con, "select * from tweets where reply_Id=$row[0]"));
		$date = generateDate($row[3]);
		$style = "";

	list($tweet, $ret) = explode("-0retweetB00M-", $row[2]);
	if($row[5] == null && $fol != 0){
			if($row[4]>199){
				$style = $style . "background-color: #FF9;";
			} else if($row[4]>99){
				$style = $style . "background-color: #CFB;";
			}
			if($names[7] == "admin"){
				$style = $style . "background-color: #BFF;";
			}
			if($ret != null){
				$style = $style . "background-color: #FCC;";
			}
			echo "<div class='tweet' style='$style'>";
				echo "<div class='tweetHeader'>";
					echo "<img src='../images/userIcons/$names[6].png' class='usericon'/> <a href='index.php?user=$names[0]'>$names[1] $names[2]</a>";
if($ret != null){
	$retro = mysqli_fetch_array(mysqli_query($con, "select user_id from tweets where tweet_id = $ret"));
	$names = mysqli_fetch_array(mysqli_query($con, "select * from accounts where acc_id=$retro[0]"));
	$retro = $names[2];
	echo " retweet by <a href='index.php?user=$names[0]' style='color: blue;'>$retro[0].$names[1] </a>";
} else {
	$tweet = $row[2];
}
					echo " <span style='color: #333; float:right;'>$date</span></div>";
			echo $tweet;
			echo "		<div class='tweetFooter'>
				    <div class='twefooLeft'>$row[4] Like | $repno Replies
				    </div>
				    <div class='twefooRight'>
									<a onclick='over($row[0])'>Reply</a> ";
$test = mysqli_fetch_array(mysqli_query($con, "select role from accounts where acc_id = $names[0]"));
if($names[0] != $me[0] && $test[0] != "admin"){
	echo "<a href='javascript:void(0)' onclick='retweet($row[0])'>Retweet</a>";
}
		$man = mysqli_num_rows(mysqli_query($con, "select * from likeun where tweet_id=$row[0] and user_id=$me[0]"));
		if($man == 0){
			echo " <a href='javascript:void(0)' onclick='likeIt($row[0])'>Like</a>";
		} else {
			echo " <a href='javascript:void(0)' onclick='likeIt($row[0])'>Dislike</a>";
		}
			echo "</div></div></div>";
			#ReplySection
						echo "<div class='Reply' style='display: none;' id='reply$row[0]'>
							<div class='ReplyHeader'>	
								<img src='../images/userIcons/$me[6].png' class='usericon'></img> $me[1] $me[2]
				      </div>
						<form>
							<input type='hidden' name='reply' value='$row[0]'/>
							<textarea name='tweet'></textarea>
							<input type='button' value='Reply' onclick='compose2($user)' id='composubmit2'/>
							<input type='button' value='Cancel' onclick='overs($row[0])'>
						</form>
						</div>";


		#Replist
		$replies = mysqli_query($con, "select * from tweets where reply_id=$row[0]");
		while($rep = mysqli_fetch_array($replies)){
			$names = mysqli_fetch_array(mysqli_query($con, "select * from accounts where acc_id=$rep[1]"));
			$date = generateDate($rep[3]);
			$style = " width: 88%; margin-left: 7%;";
				if($rep[4]>199){
					$style = $style . "background-color: #FF9;";
				} else if($rep[4]>99){
					$style = $style . "background-color: #CFB;";
				}
				echo "<div class='tweet' style='$style'>";
					echo "<div class='tweetHeader'>";
						echo "<img src='../images/userIcons/$names[6].png' class='usericon'/> <a href='index.php?user=$names[0]'>$names[1] $names[2]</a> <span style='color: #333; float:right;'>$date</span></div>";
				echo $rep[2];
				echo "		<div class='tweetFooter'>
						  <div class='twefooLeft'>$rep[4] Like
						  </div>
						  <div class='twefooRight'>";
			$man = mysqli_num_rows(mysqli_query($con, "select * from likeun where tweet_id=$rep[0] and user_id=$me[0]"));
			if($man == 0){
				echo " <a href='javascript:void(0)' onclick='likeIt($rep[0])'>Like</a>";
			} else {
				echo " <a href='javascript:void(0)' onclick='likeIt($rep[0])'>Dislike</a>";
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
