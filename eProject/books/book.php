<html>
<?php
header('Content-type: text/html; charset=utf-8');
	#Connecting to MySQL zooooooom. >~<
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("gogo", $con);
	mysql_query("set charset utf8");
#Checking Logged in
$user = $_COOKIE['user'];
?>
<head>
<title>EDEN Ном</title>
<link href="../style/bookCssHeader.css" type="text/css" rel="stylesheet"/>
<link href="../style/profile.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script>
function guess(word) {
    var value = word;
    if (value === '') {
        $('#search_guess').hide();
    } else {
        $('#search_guess').show();
        $.post("../classes/bookSearch.php", {input: value}, function(data) {
            $("#search_guess").html(data);
        });
    }
}
</script>
</head>
<body>
<div class="book">
 <div class=header">
   <div class="top-nav"> <!-- Shortcut links ends-->
 		<div class="top-container">
  		 <ul class="left">
		    	<li><a href="">EDEN</a></li>
			<li><a href="http://www.eden.com/news/news.php">МЭДЭЭ</a></li>
			<li><a href="http://www.eden.com/mail/index.php">Э-ШУУДАН</a></li>
			<li><a href="http://www.eden.com/movies/index.php">КИНО</a></li>
			<li><a href="http://www.eden.com/musics/music-Index.php">ХӨГЖИМ</a></li>
			<li class="active"><a class="sel" href="javascript:void(0)">Э-НОМ</a></li>
		 </ul>
		 <ul class="right">
			<li><a href="http://www.facebook.com"><img src="../images/icons/facebook.png"/></a></li>
			<li><a href="http://www.twitter.com"><img src="../images/icons/twitter.png"/></a></li>
			<li><a href="http://www.gmail.com"><img src="../images/icons/gmail.png"/></a></li>
			<li><a href="http://www.yahoo.com"><img src="../images/icons/yahoo.png"/></a></li>
			<li><a href="http://www.linkedin.com"><img src="../images/icons/linkedin.png"/></a></li>
			<li><a href="http://www.youtube.com"><img src="../images/icons/youtube.png"/></a></li>
		 </ul>
  	</div>
 	</div> <!-- Shortcut links ends-->

	<div class="head"> <!-- logo search Interface-->
  <div class="head-container">
   <div class="logo">
    <a href="http://www.eden.com/books/book.php"><img src="../images/icons/eden.png"></a>
   </div>
   <form action="" method="GET">
    <select class='styled-select'>
     <option>Бүгдээс</option>
     <option>Мэдээ</option>
     <option>Шуудан</option>
     <option>Кино</option>
     <option>Хөгжим</option>
     <option>Ном</option>
    </select>
    <input type="text" name="search" placeholder=" Хайх..." onkeyup="guess(this.value)" autocomplete="off"/>
    <input type="submit" value='' />
    <div id="search_guess"></div>
   </form>
		<?php
		session_start();
		$logout = $_GET['logout'];
		if($logout != null){session_destroy();}
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
			            <h1> " . $me[2][0] . ".$me[1]</h1>
			            <a href='cart.php'>Cart</a> 
				    <a href='../classes/logout.php'>Logout</a>
			        </div>
				<div style='clear: both;'></div>
			    </div>
			</div>";
		}
		?>   
  </div>
 </div> <!-- logo search Interface ends-->
 </div>
  <div class="body"><hr>
    <div class="bodyHeader">
      <ul>
        <li><a href="book.php?type=Боловсрол">Боловсрол</a></li>
        <li><a href="book.php?type=Бизнес">Бизнес</a></li>
        <li><a href="book.php?type=Философи">Философи</a></li>
        <li><a href="book.php?type=Эдийн засаг">Эдийн засаг</a></li>
        <li><a href="book.php?type=Шинжлэх ухаан">Шинжлэх ухаан</a></li>
        <li><a href="book.php?type=Урлаг, Спорт">Урлаг, Cпорт</a></li>
        <li><a href="book.php?type=Уран зохиол">Уран зохиол</a></li>
        <li><a href="book.php?type=Хүүхэд">Хүүхэд</a></li>
      </ul>
      <div class="theLine">&nbsp;</div>
    </div>
<?php 
$news = mysql_query("select * from books order by b_id limit 7");
$new = mysql_fetch_array($news);
$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
if($new[8] > 0){
?>
    <div class='leftior'>
<?php
echo "<img src=\"../images/books/$new[0].jpg\"/><h1>The Best Seller</h1> <a href='abook.php?book=$new[0]'>$new[3]</a> <br> <a href=''>$aut[2] $aut[1]</a> $new[7] ";
?>
    </div>
<?php
}
#Author
$auth = $_GET['auth'];
if($auth != null){
	$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$auth"));
	$newer = mysql_query("select * from books where a_id='$auth' ORDER BY b_id DESC");
	echo "<div class='new'><h2>&nbsp;Books of $aut[2] $aut[1]</h2> ";
	while($new = mysql_fetch_array($newer)){
	if($new[8] > 0){
		echo "<div class='smallBook'><a href='abook.php?book=$new[0]'><img src=\"../images/books/$new[5]\"/></a><br><center><b><a href='abook.php?book=$new[0]''>$new[3]</a></b><br><a href=''>$aut[2] $aut[1]</a> $new[7]</center></div>";
	}
}
	echo "</div>";
}
?>
<?php
#SEARCH RESULT
$search = $_GET['search'];
if($search != null){
	echo "<div class='new'><h2>Search Result</h2> ";
	$book = mysql_query("select * from books where name like '$search%'");
	while($new = mysql_fetch_array($book)){
	if($new[8] > 0){
		$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
		echo "<div class='smallBook'><a href='abook.php?book=$new[0]'><img src=\"../images/books/$new[5]\"/></a><br><center><b><a href='abook.php?book=$new[0]''>$new[3]</a></b><br><a href='book.php?auth=$aut[0]'>$aut[2] $aut[1]</a> $new[7]</center></div>";
	}
	}
	echo "</div>";
}
?>
<?php
#TYPE
$type = $_GET['type'];
if($type != null){
	echo "<div class='new'><h2>&nbsp;$type</h2> ";
	$newer = mysql_query("select * from books where TYPE='$type' ORDER BY b_id DESC");
	while($new = mysql_fetch_array($newer)){
		$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
	if($new[8] > 0){
		echo "<div class='smallBook'><a href='abook.php?book=$new[0]'><img src=\"../images/books/$new[5]\"/></a><br><center><b><a href='abook.php?book=$new[0]''>$new[3]</a></b><br><a href='book.php?auth=$aut[0]'>$aut[2] $aut[1]</a> $new[7]</center></div>";
	}
	}
	echo "</div>";
}
?>

    <div class='new'><h2>&nbsp;Best Sellers</h2>
<?php
while($new = mysql_fetch_array($news)){
	if($new[8] > 0){
	$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
	echo "<div class='smallBook'><a href='abook.php?book=$new[0]'><img src=\"../images/books/$new[5]\"/></a><br><center><b><a href='abook.php?book=$new[0]'>$new[3]</a></b><br><a href='book.php?auth=$aut[0]'>$aut[2] $aut[1]</a> $new[7]</center></div>";
}
}
?>
    </div>
    <div class='new'><h2>&nbsp;New Books</h2>
<?php 
$news = mysql_query("select * from books where TYPE <> 'coming soon' order by b_id desc limit 6");
while($new = mysql_fetch_array($news)){
	if($new[8] > 0){
	$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
	echo "<div class='smallBook'><a href='abook.php?book=$new[0]'><img src=\"../images/books/$new[5]\"/></a><br><center><b><a href='abook.php?book=$new[0]'>$new[3]</a></b><br><a href='book.php?auth=$aut[0]'>$aut[2] $aut[1]</a> $new[7]</center></div>";
}
}
?>
    </div>
    <div class='new'><h2>&nbsp;Coming Soon</h2>
<?php 
$news = mysql_query("select * from books where type='coming soon' order by b_id desc limit 6");
while($new = mysql_fetch_array($news)){
	$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
	echo "<div class='smallBook'><img src=\"../images/books/$new[5]\"/><br><center><b>$new[3]</b><br><a href='book.php?auth=$aut[0]'>$aut[2] $aut[1]</a> $new[7]</center></div>";
}
?>
    </div>
  </div>
</div>
<div class='footer'> <!-- Footer -->
 <div class='content'>
  
  <img src='../images/icons/eden-footer.png' alt="website name" />
  
  <ul>
   <li>Website Name</li>
   <li>@Copyright</li>
   <li>Address</li>
   <li>Contact information</li>
  </ul>
  
  <ul>
   <li>Social Network</li>
   <li><a href=''>Facebook</a></li>
   <li><a href=''>Twitter</a></li>
   <li><a href=''>Yahoo</a></li>
   <li><a href=''>Gmail</a></li>
   <li><a href=''>Youtube</a></li>
  </ul>
  
 </div>
</div> <!-- Footer ends -->

</body>
</html>
