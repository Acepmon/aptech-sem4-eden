<!DOCTYPE html>
<html>
	<head>
<?php header("Content-type: text/html; charset=utf-8");?>
		<title>EDEN Tweet</title>
		<link href="../style/sheet.css" type="text/css" rel="stylesheet">
		<script type="text/javascript"> 
			var user;
			var maxli = 100;
			var things = ("big", "test");
			function composers(){
				compose("compose.php", "tweets");
				compose("people.php", "People");
			}
			function compose1(user){
				user = user;
				var tweet = document.getElementById("composubmit").form.tweet.value;
				var check = 0;
				for(var i=0; i<things.length; i++){	
					if(tweet.contains(things[i])){
						check = 1;
					}
				}
				if(check == 0){
					if(tweet.length < maxli){
						compose("compose.php?tweet=" + tweet + "&user=" + user, "tweets");
					}
				} else {
					alert("Sorry, your tweet may contain rude words.");
				}
			}
			function compose2(user){
				user = user;
				var tweet = document.getElementById("composubmit2").form.tweet.value;
				var reply = document.getElementById("composubmit2").form.reply.value + "";
				if(tweet.length < maxli){
					compose("compose.php?tweet=" + tweet + "&reply=" + reply + "&user=" + user, "tweets");
				}
			}
			function retweet(tweetNo){
				compose("compose.php?retweet=" + tweetNo, "tweets");
			}
			function likeIt(likeNo){
				compose("compose.php?like=" + likeNo, "tweets");
			}
			function viewIt(view){
				compose("compose.php?view=" + view, "tweets");
			}
			function people(lere){
				if(lere == '1'){
					compose("people.php?people=more", "People");
				} else {
					compose("people.php?people=less", "People");
				}
			}
			function compose(link, div){
				var xmlhttp;
				if (window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
				} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.open("GET", link, true);
				xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById(div).innerHTML=xmlhttp.responseText;
						}
					};
				xmlhttp.send(null);
			}

		 	function over(a) {
					document.getElementById("reply" + a).style.display = "block";
		 	}
		 	function overs(a) {
					document.getElementById("reply" + a).style.display = "none";
		 	}
	</script>
	</head>
	<body onload="composers()">
		<?php
			#Checking Logged in
			session_start();
			#$_SESSION['user'] = 4;
			$user = $_SESSION['user'];
			if($user == null){
				header("Location: http://www.eden.com/intro.php");
			}
			$con = mysql_connect("localhost", "root", "");
			mysql_select_db("gogo", $con);
			$me = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$user"));
			$watchUser = $_GET['user'];
			if($watchUser == null && $_SESSION['watchUser'] == null){$watchUser = $me[0];}
			if($watchUser == null){$watchUser = $_SESSION['watchUser'];}
			$_SESSION['watchUser'] = $watchUser;
			$pro = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$watchUser"));
			#Checking Logging Out
			if($_GET['logout'] == "true"){
				session_destroy();
				header("Location: http://www.eden.com/intro.php");
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
	$topTweet = mysql_fetch_array(mysql_query("Select * from tweets order by likeNo DESC limit 1"));
	$tops = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$topTweet[1]"));
		?>
		<div class="big">
			<div class="header">
				<div class="left">
					<a href="http://www.eden.com/news/news.php"><img src='../images/icons/eden.png' width='150' height='75'></img></a><span>tweet</span>
				</div>
						<table>
							<tr>
									<td id="one"><a href="javascript:void(0)" onclick="viewIt('last')">&nbsp;Last&nbsp;</a></td>
									<td id="two"><a href="javascript:void(0)" onclick="viewIt('pop')">&nbsp;Top&nbsp;</a></td>
							</tr>
						</table>
				<div class="right"><ul>
					<li><a href="#"><img src='../images/icons/message.png'></img></a>
						<ul><li>
						<form>
							<textarea name="tweet" width="150" maxlength="100"></textarea>
							<input type="button" value="Compose" onclick="compose1(<?php echo $_GET['user'];?>)" id="composubmit"/>
						</form>
						</li></ul>
					</li>
					<li><a href="index.php?user=<?php echo $me[0]?>"><img src="../images/userIcons/<?php echo $me[6]?>.png"></img></a>
						<ul>
							<li><a href="index.php?user=<?php echo $me[0]?>">Profile</a></li>
							<li><a href="setting.php">Settings</a></li>
							<li><a href="../classes/logout.php">Sign out</a></li>
						</ul>
				</li>
				</ul></div>
			</div>
			<!--Body Section-->
			<div class="bodySection">
				<div id="tweets"></div>
				<!--Profile Section-->
				<div class="profile">
					<center>
						<img src="../images/userIcons/<?php echo $pro[6]?>.png" class="usericon"></img><br>
						<span class="username"><?php echo "$pro[1] $pro[2]"?></span>
						<br><span style="color: #03C;">@</span><a href="index.php?user=<?php echo $pro[0]?>"><?php echo "$pro[3]"?></a>
						<div class="quotes"><?php echo "$pro[10]"?></div>
					<center>
					<div class="bottomInfo">
						<div class="info">
							<img src="../images/icons/email.png"/> <?php echo "$pro[5]"?><br>
							<img src="../images/icons/location.png"/><?php echo "$pro[8]"?><br>
							<img src="../images/icons/birth.png"/> <?php echo "$pro[9]"?>
						</div>
						<div class="follow">
							<?php
$fol = mysql_num_rows(mysql_query("select * from follow where user_id=$watchUser"));
echo "$fol - Following<br>";
$fol = mysql_num_rows(mysql_query("select * from follow where following_id=$watchUser"));
echo "$fol - Followers<br>";
$fol = mysql_fetch_array(mysql_query("select * from follow where user_id=$user AND following_id=$watchUser"));
								if($pro[0] == $me[0]){
									echo "<form action='setting.php'><input type='submit' value='Setting'/></form>";
								} else if($fol == null){
									echo "<form action='index.php'><input type='hidden' name='follow' value='$watchUser'/><input type='submit' value='Follow'/></form>";
								} else {
									echo "<form action='index.php'><input type='hidden' name='unfollow' value='$watchUser'/><input type='submit' value='Unfollow'/></form>";
								}
							?>							
						</div>
					</div>
				</div>
				<div class="additionals">
						<div class="additional" style="background-color: #FF9;">
                        	<div class="addHeader" style="background-color: #FF0"><center>TOP Tweet</center></div>
                            <center>
                            	<a href="index.php?user=<?php echo $tops[0]?>" style="font-size: 20px; font-weight: bold; color: #000;"><img src="../images/userIcons/<?php echo $tops[6];?>.png" style="height: 160px; width: 180px; border-radius: 5px; border: white 2px solid; margin-top: 5px;"/>
                                <?php
if((strlen($tops[1]) + strlen($tops[2])) < 14){
	echo "$tops[1] $tops[2]";
}else{
	echo $tops[1];
}
?></a><br>
                                <div class="tweet"> <?php
if(strlen($topTweet[2]) < 61){
	echo $topTweet[2];
}else{
	echo substr($topTweet[2], 0, 45) . "<span style='color: red;'> .:more:.</span>";
}
?></div>
                                <?php
echo $topTweet[4];
echo " Like | ";
echo mysql_num_rows(mysql_query("select * from tweets where reply_Id=$topTweet[0]"));
?> Replies
                            </center>
                        </div>
						<div class="additional" style="background-color: #9FF;">
                        	<div class="addHeader" style="background-color: #3CF;"><center>Enjoy GoGo Tweet</center></div>
                            <center>
                            	<div style="border: 2px black solid; width: 200px; height: 265px;">
                            	  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200" height="265">
                            	    <param name="movie" value="../images/tweet.swf">
                            	    <param name="quality" value="high">
                            	    <param name="wmode" value="opaque">
                            	    <param name="swfversion" value="9.0.45.0">
                            	    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                            	    <param name="expressinstall" value="Scripts/expressInstall.swf">
                            	    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                            	    <!--[if !IE]>-->
                            	    <object type="application/x-shockwave-flash" data="../images/tweet.swf" width="200" height="265">
                            	      <!--<![endif]-->
                            	      <param name="quality" value="high">
                            	      <param name="wmode" value="opaque">
                            	      <param name="swfversion" value="9.0.45.0">
                            	      <param name="expressinstall" value="Scripts/expressInstall.swf">
                            	      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                            	      <div>
                            	        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                            	        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/../images/icons/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
                          	        </div>
                            	      <!--[if !IE]>-->
                          	      </object>
                            	    <!--<![endif]-->
                          	    </object>
                            	</div>
						  </center>
                        </div>
						<div class="additional" style="background-color: #F69;">
                        	<div class="addHeader" style="background-color: #F06"><center>Calendar</center></div>
<?php
$date = getDate();

echo "<center><span style='font-weight: 600; margin-top: 10px;'>" . $date["month"] . "</span>";
echo "<table style='background-color: white; margin-top: 5px;'>";
echo "<tr><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fri</th><th>Sa</th><th>Su</th></tr>";
$wait =  $date["mday"] - $date["wday"];
for($i = -1 * $wait; $i<=31; $i++){
	if(($i+$wait + 1) % 7 == 1){echo "<tr>";}
	echo "<td>";
	if($i > 0){
		$check = 0;
		$names = mysql_query("select * from accounts");
		while($row = mysql_fetch_array($names)){
			$fol = mysql_num_rows(mysql_query("select * from follow where following_id=$row[0] and user_id=$me[0]"));
			if($fol != 0){
				list($mon, $day, $year) = explode('-', $row[9]);
				if($mon == substr($date["month"], 0, 3)){
					if($day == $i){
						echo "<img src='../images/icons/birth.png'/>";
						if(strlen($tr)<100){
							$tr =  $tr . "<img src='../images/icons/birth.png'/> $i " . getWeek($i%7 + $wait + 1) . " $row[1]'s Birthday<br>";
						}
						$check = 1;
					}
				}
			}
		}
		if($check == 0){
			echo "$i";
		}
	}
	echo "</td>";
	if(($i+$wait + 2) % 7 == 1){echo "</tr>";}
}
echo "</table></center><br>$tr";
?>
                        </div>
						<div class="additional" style="background-color: #FFF;">
                        	<div class="addHeader" style="background-color: #CCC"><center>Brand New T-Shirt</center></div>
                            <center><img src="../images/ads/kfcSoGood.png" width="200" height="260"/></center>
                        </div>
						<div id="People" class="additional" style="background-color: #DBA6FF;">
                        	</div>
						<div class="additional" style="background-color: #3F6;">
                        	<div class="addHeader" style="background-color: #3C3;"><center>Group For U</center></div>
                            <center><span style="font-weight: 600; font-size: 20px; margin-top: 10px;">Adventure Time Fan Club</span><br>
<a href="">                            <img src="../images/ads/club.png" width="180" height="180"/></a>
                        </div>
				</div>
			</div>
	</div>
	</body>
</html>
<?php
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
