<html>
<?php
header('Content-type: text/html; charset=utf-8');
	#Connecting to MySQL zooooooom. >~<
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("gogo", $con);
	mysql_query("set charset utf8");
?>
<head>
<title>EDEN Ном</title>
<link href="../style/bookCssHeader.css" type="text/css" rel="stylesheet"/>
<link href="../style/profile.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	function addToCart(id){
		window.location.href = "http://www.eden.com/books/cart.php?add=" + id;
	}
	function showIt(){
		document.getElementById('hidden').style.display = 'block';
	}
	function hideIt(){
		document.getElementById('hidden').style.display = 'none';
	}
</script>
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
   <form action="http://www.eden.com/books/book.php" method="GET">
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
		if($logout != null){session_destroy(); header("Location: http://www.eden.com/books/book.php");}
		$connection = mysql_connect("localhost","root", "");
		mysql_set_charset('utf8',$connection);
		$database = mysql_select_db("gogo");
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
$bono = $_GET['book'];
$new = mysql_fetch_array(mysql_query("select * from books where b_id=$bono"));
$aut = mysql_fetch_array(mysql_query("select * from author where a_id=$new[1]"));
?>
    <div class='leftior'>
<?php echo "<img src=\"../images/books/$new[5]\"/>"; ?>
    </div>
    <div class='abook'><h2>&nbsp;
	<?php 
echo "$new[3] </h2>&nbsp; Зохиогч: $aut[2] $aut[1]";
echo "<br><span style='font-size: 14px;'><b><br>&nbsp; &nbsp; Агуулга - </b>$new[4]</span><br>&nbsp;<hr style='color: #DDD;'/>";

echo "<table style='margin-top: 30px; margin-left: 5%; margin-bottom: 30px; width: 100%;'><tr>";
echo "<td width='40%; '>";
echo "<span style='color: #999;'>Ангилал: $new[2]<br>Үнэ: $new[7]<br>Хуудас: $new[6]<br>Тоо ширхэг: $new[8]</span>";
echo "</td><td style='background-color: #DDD; height: 100%; width: 2px;'></td><td style='padding-left: 10%;'>";
echo "<span style='font-size: 16px;'>Үнэ</span><br>";
echo "<span style='color: #00aeef;'><span style='font-size: 26px; font-weight: 600;'>$new[7] </span> <span style='font-size: 16px;'> save 10%</span></span> &nbsp;<span style='color: #999'>|</span>&nbsp; " . $new[7] * 0.9 . "$";
if($user != null){
echo "<input type='button' value='Add to Cart' onclick='addToCart($new[0])' style='border: 0px; margin-top: 10px; width: 200px; height: 50px; background-color: #CCC; color: white; font-size: 24px;'/>";	
} else{
echo "<input type='button' value='Add to Cart' onclick='showIt()' style='border: 0px; margin-top: 10px; width: 200px; height: 50px; background-color: #CCC; color: white; font-size: 24px;'/>";
echo "<div id='hidden' style='color: red; display: none;'><br><form action='../classes/loginValidator.php' method='post'><input type='hidden' name='book' value='$bono'/> <input type='text' name='username' placeholder='Username..'/> <input type='password' name='password' placeholder='Password'/> <br/><input type='submit' value='Log in'/> <input type='button' value='Cancel' onclick='hideIt()'/></div>";
}
echo "</td>";
echo "</tr></table>";
	?>
    </div>
  </div>
<?php
echo "<div class='author'>";
echo "<hr/>";
echo "<br><b> $aut[2] $aut[1]</b><br>";
echo "<table><tr><td>$aut[3]</td><td><img src=\"../images/authors/$aut[2].jpg\"/></td></tr></table>";
echo "</div>";
?>
<?php
echo "<div class='sanal'>";
echo "<hr/>";
$news = mysql_query("select * from books where a_id = $aut[0] AND b_id <> $bono ORDER BY RAND() LIMIT 6");
while($new = mysql_fetch_array($news)){
	echo "<div class='smallBook'><a href='abook.php?book=$new[0]'><img src=\"../images/books/$new[5]\"/></a><br><center><b><a href='abook.php?book=$new[0]'>$new[3]</a></b><br><a href='book.php?auth=$aut[0]'>$aut[2] $aut[1]</a> $new[7]</center></div>";
}
echo "</div>";
?>
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
