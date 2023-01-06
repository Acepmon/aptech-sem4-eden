<?php
$title = $_POST['title'];
$news = $_POST['news'];
$type = $_POST['type'];
$pic = $_FILES['file'];

$pic_name = $pic['name'];
$pic_tmp = $pic['tmp_name'];

$loc = '../images/articles/article';

if($title != null && $news != null && $type != null){
	session_start();
	$user = $_SESSION['user'];
	$connection = mysql_connect("localhost","root", "");
	mysql_set_charset('utf8',$connection);
	$database = mysql_select_db("gogo");

$result = mysql_query('select m_id from news order by m_id desc limit 1');
$row = mysql_fetch_array($result);
$name = mysql_fetch_array(mysql_query("select firstname from accounts where acc_id = $user"));
$name = $name[0];
utf8_encode($name);
utf8_encode($title);
utf8_encode($type);
utf8_encode($news);
utf8_encode($pic);
	$date = getDate();
	$dates = $date["year"] . "-08-" . $date["mday"] . " " . $date["hours"] . ":" . $date["minutes"] . ":" . $date["seconds"];
$row = $row[0]+1;
	move_uploaded_file($pic_tmp, $loc.$row.'.jpg');
	$query = mysql_query("INSERT INTO news(m_id, type, title, medee, time, name) VALUES($row,'$type', '$title', '$news', '$dates', '$name')");
	if($query){
		header("Location: http://www.eden.com/news/news.php");
	} else {
		header("Location: http://www.eden.com/news/newsAdd.php");
	}
}
?>
