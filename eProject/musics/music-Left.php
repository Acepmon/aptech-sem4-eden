<?php
$con = mysql_connect("localhost", "root", "");
mysql_select_db("gogo", $con);
mysql_query("set charset utf8");
$ano = $_GET['info'];
$show = $_GET['show'];
	#SESSION SECTION
	session_start();
	if($ano== null || $ano == "undefined"){if($_SESSION['ano'] == null){$ano= 1;}else{$ano = $_SESSION['ano'];}}
	$_SESSION['ano'] = $ano;
	if($show == null || $show == "undefined"){if($_SESSION['show'] == null){$show = "albums";}else{$show = $_SESSION['show'];}}
	$_SESSION['show'] = $show;
echo "<img src=\"../images/$show/$ano.jpg\" style='width: 99%; height: 300px; margin-left: 0%;'/>";
if($show == "albums"){
	$album = mysql_fetch_array(mysql_query("select * from albums WHERE albums_id=$ano"));
	$artist = mysql_fetch_array(mysql_query("select * from artist WHERE artist_id=$album[2]"));
	$son = mysql_num_rows(mysql_query("SELECT * FROM musics WHERE music_artist_id=$album[2]"));
	$alb = mysql_num_rows(mysql_query("select * from albums WHERE album_artist_id=$album[2]"));
echo "<span style='font-size: 26px; font-weight: bold;'> &nbsp; $album[1]</span><br>&nbsp;by: <b>$artist[1]</b> - All <b>$son</b> songs, <b>$alb</b> albums<p>";
}
if($show == "artist"){
	$artist = mysql_fetch_array(mysql_query("select * from artist WHERE artist_id=$ano"));
	$album = mysql_fetch_array(mysql_query("select * from albums WHERE album_artist_id=$ano"));
	$son = mysql_num_rows(mysql_query("SELECT * FROM musics WHERE music_artist_id=$album[2]"));
	$alb = mysql_num_rows(mysql_query("select * from albums WHERE album_artist_id=$album[2]"));
echo "<span style='font-size: 26px; font-weight: bold;'> &nbsp; $artist[1]</span><br>&nbsp;All <b>$son</b> songs, <b>$alb</b> albums<p>";
}
echo "<div class='leftSec' style='height: " . (-1 + mysql_num_rows($mus) * 60) ."px'>";
$mus = mysql_query("select * from musics where music_album_id=$ano");
$no = 1;
if($show != "artist"){
	while($muno = mysql_fetch_array($mus)){
		if($no % 2 == 0){$col= 555; $col2 = 'FFF';}else{$col = 222; $col2 = 333;}
		echo "<div style='background-color: #$col; height; 50px; margin-left: -5px; text-align: left;'>";
		echo "&nbsp;$no. $muno[1]<audio controls style='width: 100%; margin-left: 0%; margin-top: 10px; margin-bottom: 5px; background-color: #$col2;'><source src=\"musics/$muno[0].mp3\" type=\"audio/mpeg\"></audio></div>";
		$no++;
	}
}
echo "</div>
<div class=\"leftSec\" style='margin-top: 30px;'>";
echo "<b>&nbsp; &nbsp;About Artist:</b> $artist[2]</p>";
echo "</div>";
echo "<div class=\"leftSec\" style=\"background-color: #999; padding-bottom: -5px;\"><b>Other $show</b><br>";
$show_id = $show . "_id";
$rand = mysql_query("select * from $show where $show_id <> $ano ORDER BY RAND() LIMIT 6");
while($ran = mysql_fetch_array($rand)){
echo "<a href='music-Index.php?goinfo=$ran[0]&goshow=$show'><img src=\"../images/$show/$ran[0].jpg\" style='width: 32%; height: 100px; margin-left: 1%; margin-top: 1%;'/></a>";
}
echo "</div>";
?>
