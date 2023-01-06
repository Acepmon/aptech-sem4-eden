<html>
<head>
<title>Mongolian Portal Site</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../style/newsCssHeader.css" type="text/css" rel="stylesheet"/>
<link href="../style/newsCssBody.css" type="text/css" rel="stylesheet"/>
<link href="../style/newsCssFooter.css" type="text/css" rel="stylesheet"/>
<link href="../style/profile.css" type="text/css" rel="stylesheet"/>
<link href="../style/login.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/menuFix.js"></script>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jssor.core.js"></script>
<script type="text/javascript" src="../js/jssor.utils.js"></script>
<script type="text/javascript" src="../js/jssor.slider.js"></script>
<script>
 jQuery(document).ready(function ($) {
  var options = {
   $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
   $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
    $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
   }
  };
  var jssor_slider1 = new $JssorSlider$("slider1_container", options);
 });
function guess(word) {
    var value = word;
    if (value === '') {
        $('#search_guess').hide();
    } else {
        $('#search_guess').show();
        $.post("../classes/newsSearch.php", {input: value}, function(data) {
            $("#search_guess").html(data);
        });
    }
}
</script>
</head>
<body>
<div style="width:1250px; height:auto; margin: 0 auto;">
<div class="newshead"> <!-- Header-->

<center>
 <div class="topnav"> <!-- Shortcut links ends-->
  <div class="top-container">
   <ul class="left">
    <li><a href="http://www.eden.com/mail/index.php"><img src="../images/icons/appbar.home.empty.png" style="background-color: #0C509E; border-radius: 30px;"/></a></li>
		<li class="active"><a class="sel" href="http://www.eden.com/news/news.php"><img src="../images/icons/main-news.png"/></a></li>
		<li><a href="http://www.eden.com/mail/index.php"><img src="../images/icons/main-tweet.png"/></a></li>
		<li><a href="http://www.eden.com/movies/index.php"><img src="../images/icons/main-movie.png"/></a></li>
		<li><a href="http://www.eden.com/musics/music-Index.php"><img src="../images/icons/main-music.png"/></a></li>
		<li><a href="http://www.eden.com/books/book.php"><img src="../images/icons/main-ebook.png"/></a></li>
<?php
		session_start();
		$logout = $_GET['logout'];
		if($logout != null){session_destroy();}
		$connection = mysql_connect("localhost","root", "");
		mysql_set_charset('utf8',$connection);
		$database = mysql_select_db("gogo");
		$user = $_SESSION['user'];
			$me = mysql_fetch_array(mysql_query("SELECT role FROM accounts WHERE acc_id=$user"));
if($me[0] == "admin"){
	echo '<li><a href="http://www.eden.com/admin/index.php"><img src="../images/icons/main-admin.png"/></a></li>';
}
?>
   </ul>
  </div>
 </div>
</center> <!-- Shortcut links ends-->

 <div class="head"> <!-- Search Interface-->
  <div class="head-container">
   <div class="logo">
    <a href="http://www.eden.com/news/news.php"><img src="../images/icons/eden.png"></a>
   </div>
   <form action="newsSearch.php" method="GET">
    <select class='styled-select'>
     <option value="мэдээ">Мэдээ</option>
     <option value="кино">Кино</option>
     <option value="хөгжим">Хөгжим</option>
     <option value="ном">Ном</option>
    </select>
    <input type="text" name="search" placeholder=" Хайх..." onkeyup="guess(this.value)" autocomplete="off"/>
    <input type="submit" value='' />
    <div id="search_guess"></div>
   </form>
		<?php
		if($user != null){
			$me = mysql_fetch_array(mysql_query("SELECT * FROM accounts WHERE acc_id=$user"));
		echo "<div id=\"profile\">
			    <div id=\"loggedin\">
			        <div class=\"profile_column\"><img src=\"../images/userIcons/$me[6].png\"/></div>
			        <div class=\"profile_column\">
			            <h1> " . $me[2][0] . ".$me[1]</h1>
     				<a href='newsAdd.php'><span>Мэдээ Нэмэх</span></a><br/>
				    <a href='../classes/logout.php'>Logout</a>
			        </div>
				<div style='clear: both;'></div>
			    </div>
			</div>";
		}
		?>
  </div>
 </div> <!-- Search Interface ends-->
  <!-- Menu container ends-->
 
</div> <!-- Header ends -->

<div class='body'> <!-- Body -->
 <div class='gap'>&nbsp;</div> <!-- Gap before news column -->
 <div class='ad'> <!-- Advertisement Column -->
   
  <div class='adver'>
		<h4>Төрөл</h4>
    <ul>
     <li><a href="menus.php?type=Нийгэм"><span>Нийгэм</span></a></li>
     <li><a href="menus.php?type=Улс төр"><span>Улс төр</span></a></li>
     <li><a href="menus.php?type=Эдийн засаг"><span>Эдийн засаг</span></a></li>
     <li><a href="menus.php?type=Дэлхийд"><span>Дэлхийд</span></a></li>
     <li><a href="menus.php?type=Нийтлэл"><span>Нийтлэл</span></a></li>
		</ul><ul>
     <li><a href="menus.php?type=Спорт"><span>Спорт</span></a></li>
       <li><a href='menus.php?type=Боловсрол'><span>Боловсрол</span></a></li>
       <li><a href='menus.php?type=Эрүүл мэнд'><span>Эрүүл мэнд</span></a></li>
       <li><a href='menus.php?type=Соёл урлаг'><span>Соёл урлаг</span></a></li>
       <li><a href='menus.php?type=Бизнес'><span>Бизнес</span></a></li>
    </ul>    
   </div>
  
  <div class='adver'>
   <h4>Шинэ</h4>
   <div class='scrollpane'>
		<?php
      $newsA = mysql_query("select * from news order by m_id desc");
      while($rows = mysql_fetch_array($newsA)){
			echo "<a href='article1.php?id=$rows[M_ID]' style='text-decoration: none; color:black'><div style='padding-bottom: 8px; width: 100%; min-height: 90px; max-height: auto; float: left; border-bottom: 1px lightgray solid;'>";
     		echo "<div>";
        echo "<img src='../images/articles/article$rows[M_ID].jpg' style='width:37%; height: 13%; margin-top: 2%; float:left; padding-right: 8px;'/>";
        echo "</div>";

        echo "<div style='margin-top: 6px; height: 92px;'>";
        echo "<div style='height: 85%; font-family: arial; font-size: 15px; float:top'>$rows[TITLE]</div>";
        echo "<div style='height: 15%; font-size: 12px; color:#00AEEB'>";
$tsag = getDate();
          list($date, $time) = explode(" ", $rows['TIME']);
          list($year, $mon, $day) = explode("-", $date);
          list($h, $min, $sec) = explode(":", $time);
          
          echo "<span style='float: right; padding-right: 0px; width: 120px; height: 18px;'>";
          $countC = mysql_num_rows(mysql_query("select * from comments where M_ID=$rows[M_ID]"));
          echo "$countC сэтгэгдэлтэй";
          echo "</span>";
          echo "<span>";
          if($tsag["year"] == $year){
	          if($tsag["mday"] == $day){
		          if($tsag["hours"] == $h){
			          if($tsag["minutes"] == $min){
		             echo "" . ($tsag["seconds"] - $sec) . "s ago";
			          } else {
            		 echo "" . ($tsag["minutes"] - $min) . "min ago";
			          }
		          } else {
			          $timeago = (($tsag["hours"] - $h) * 60) + ($tsag["minutes"] - $min);
			          $tsagago = intval($timeago/60);
			          $minago = $timeago%60;
								if($tsagago != 0){
									if($minago != 0){
										echo "$tsagago цаг $minago минутын өмнө";		
									}else{
										echo "$tsagago цагын өмнө";
									}
								}else{
										echo "$minago минутын өмнө";
								}
		          }
	          } else {
             $day++;
                if($day == $tsag["mday"]){
                    echo "өчигдөр";
                }else{
                  $day++;
                  if($day == $tsag["mday"]){
                    echo "уржигдар";
                  }else{
                    echo "$date";
                  }                
                }
	          }
          }
          echo "</span>";
        echo "</div>";
        echo "</div>";
			echo "</div></a>";
      }
		?>
   </div>
  </div>
   
  <a href=''>
   <div class='adver'><img src='../images/ads/ad2.png' /></div>
  </a>
   
  <a href=''>
   <div class='adver'><img src='../images/ads/ad3.jpg' /></div>
  </a>
   
  <div class='adver'>
   <h4>Санал асуулга</h4>
   <div class='scrollpane'>
		<h5>Бидний сайт таалагдаж байна уу? Та хариултаа үлдээнэ үү!!!</h5><br>
    <form action="" method="post">
			<input type="radio" name="yes"> Тийм<br>
			<input type="radio" name="no"> Үгүй<br>
			<input type="radio" name="maybe"> Магадгүй
		</form>
   </div>
  </div>
   
 </div> <!-- Advertisement Column ends -->
 <div class='news'> <!-- News Column -->
  
  <div id="slider1_container" class='bigAdvertisement'>
   <div u="slides">
    <div><img u="image" src="../images/articles/article2.jpg" /></div>
    <div><img u="image" src="../images/articles/article7.jpg" /></div>
    <div><img u="image" src="../images/articles/article13.jpg" /></div>
    <div><img u="image" src="../images/articles/article18.jpg" /></div>
    <div><img u="image" src="../images/articles/article25.jpg" /></div>
    <div><img u="image" src="../images/articles/article33.jpg" /></div>
    <div><img u="image" src="../images/articles/article39.jpg" /></div>
   </div>
    
   <style>
    /*
    .jssora03l              (normal)
    .jssora03r              (normal)
    .jssora03l:hover        (normal mouseover)
    .jssora03r:hover        (normal mouseover)
    .jssora03ldn            (mousedown)
    .jssora03rdn            (mousedown)
    */
    .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn {
     position: absolute;
     cursor: pointer;
     display: block;
     background: url(../images/icons/a03.png) no-repeat;
     overflow:hidden;
    }
    .jssora03l { background-position: -3px -33px; }
    .jssora03r { background-position: -63px -33px; }
    .jssora03l:hover { background-position: -123px -33px; }
    .jssora03r:hover { background-position: -183px -33px; }
    .jssora03ldn { background-position: -243px -33px; }
    .jssora03rdn { background-position: -303px -33px; }
   </style>
   <!-- Arrow Left -->
   <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;"></span>
   <!-- Arrow Right -->
   <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px"></span>
  </div><br/>

  <h4>Өнөөдрийн мэдээ</h4>

<?php

$num=$_POST['num'];
if($num == null){$num = 1;}
 $all = mysql_num_rows(mysql_query("select * from news"));
 $newsT = mysql_query("select * from news WHERE M_ID > $all - $num*6 AND M_ID <= $all - ($num - 1)*6 order by m_id DESC");
 $char_limit = 750;
 while($row = mysql_fetch_array($newsT)){
 $article1_desc = " $row[MEDEE]";
 $result = substr($article1_desc, "0", $char_limit) . "...";
  echo "<div class='nws'>";
   echo "<h4>$row[TITLE]</h4>";
   echo "<img src='../images/articles/article$row[M_ID].jpg' />";
   echo "<p>$result</p>";
	 $tsag = getDate();
list($date, $time) = explode(" ", $row['TIME']);
list($year, $mon, $day) = explode("-", $date);
list($h, $min, $sec) = explode(":", $time);

if($tsag["year"] == $year){
#if($tsag["month"] == $mon){
	if($tsag["mday"] == $day){
		if($tsag["hours"] == $h){
			if($tsag["minutes"] == $min){
		   echo "<span>" . ($tsag["seconds"] - $sec) . "s ago</span>";
			} else {
  		 echo "<span>" . ($tsag["minutes"] - $min) . "min ago</span>";
			}
		} else {
			$timeago = (($tsag["hours"] - $h) * 60) + ($tsag["minutes"] - $min);
			$tsagago = intval($timeago/60);
			$minago = $timeago%60;
	   echo "<span> $tsagago цаг $minago минутын өмнө</span>";
		}
	} else {
   $day++;
                if($day == $tsag["mday"]){
                    echo "<span>өчигдөр</span>";
                }else{
                  $day++;
                  if($day == $tsag["mday"]){
                    echo "<span>уржигдар</span>";
                  }else{
                    echo "<span>$date</span>";
                  }                
                }
	}
}
   echo "<a href='article1.php?id=$row[M_ID]'>Дэлгэрэнгүй...</a>";
  echo "</div>";
 }
echo "<center>";
$val = $all/6;
if($all % 6 != 0){
$val++;
}
for($i=1; $i<=$val; $i++){
echo "<form method=post style='float: left'>";
echo "<input type='hidden' name='num' value='$i'/>";
	echo "<input type='submit' class='but' value='$i' style='background-color: #01AEF0; width: 35px; height: 25px; border: 0px; border-radius: 2px; margin-left: 3px; color: white;";
	if($num==$i){
		echo "background-color:#0C509E;\;";
	} 
	echo " cursor: pointer;'/></form>";
}
echo "</center>";
?>
 </div> <!-- News Column ends -->
  
</div> <!-- Body ends-->
</div>
<div class='footer'> <!-- Footer -->
 <div class='content'>
  
  <img src='../images/icons/eden-footer.png' alt='website name' />
  
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
</script>
</html>
