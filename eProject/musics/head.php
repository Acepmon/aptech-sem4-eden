<?php
	#Connecting to MySQL zooooooom. >~<
header("Content-type: text/html; charset= utf-8");
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("gogo", $con);
	mysql_query("set charset utf8");
#Checking Logged in
session_start();
$user = $_SESSION['user'];
echo " <div class=\"header\">
   <div class=\"top-nav\"> <!-- Shortcut links ends-->
 		<div class=\"top-container\">
  		 <ul class=\"left\">
			<li><a href=\"\">EDEN</a></li>
			<li><a href=\"http://www.eden.com/news/news.php\">МЭДЭЭ</a></li>
			<li><a href=\"http://www.eden.com/mail/index.php\">Э-ШУУДАН</a></li>
			<li><a href=\"http://www.eden.com/movies/index.php\">КИНО</a></li>
			<li class=\"active\"><a class=\"sel\" href=\"http://www.eden.com/musics/music-Index.php\">ХӨГЖИМ</a></li>
			<li><a href=\"http://www.eden.com/books/book.php\">Э-НОМ</a></li>
		 </ul>
		 <ul class=\"right\">
			<li><a href=\"http://www.facebook.com\"><img src=\"../images/icons/facebook.png\"/></a></li>
			<li><a href=\"http://www.twitter.com\"><img src=\"../images/icons/twitter.png\"/></a></li>
			<li><a href=\"http://www.gmail.com\"><img src=\"../images/icons/gmail.png\"/></a></li>
			<li><a href=\"http://www.yahoo.com\"><img src=\"../images/icons/yahoo.png\"/></a></li>
			<li><a href=\"http://www.linkedin.com\"><img src=\"../images/icons/linkedin.png\"/></a></li>
			<li><a href=\"http://www.youtube.com\"><img src=\"../images/icons/youtube.png\"/></a></li>
		 </ul>
  	</div>
 	</div> <!-- Shortcut links ends-->

	<div class=\"head\"> <!-- logo search Interface-->
  <div class=\"head-container\">
   <div class=\"logo\">
    <a href=\"http://www.eden.com/musics/music-Index.php\"><img src=\"../images/icons/eden.png\"></a>
   </div>
   <form action=\"/\" method=\"GET\">
    <select class='styled-select'>
     <option>Мэдээ</option>
     <option>Кино</option>
     <option>Хөгжим</option>
     <option>Ном</option>
    </select>
    <input type='text' name='search' placeholder=' Хайх...' onkeyup='guess(this.value)' autocomplete='off'/>
    <input type='submit' value='' />
    <div id='search_guess'></div>
   </form>";
		$connection = mysql_connect("localhost","root", "");
		mysql_set_charset('utf8',$connection);
		$database = mysql_select_db("gogo");
		session_start();
		$user = $_SESSION['user'];
		if($user != null){
			$me = mysql_fetch_array(mysql_query("SELECT * FROM accounts WHERE acc_id=$user"));
		echo "<div id=\"profile\">
			    <div id=\"loggedin\">
			        <div class=\"profile_column\"><img src=\"../images/userIcons/$me[6].png\"/></div>
			        <div class=\"profile_column\">
			            <h1 style='color: white;'> " . $me[2][0] . ".$me[1]</h1>
				    <a href='../classes/logout.php'>Logout</a>
			        </div>
				<div style='clear: both;'></div>
			    </div>
			</div>";
		}
echo "</div>
 </div><hr/>
 </div>";
?>
