<?php

$input = $_POST['input'];

$con = mysqli_connect('localhost', 'root', '', 'gogo');
mysqli_query($con, 'set charset utf8');
$result = mysqli_query($con, 'select title, m_id from news where title like "'.$input.'%" limit 3');

while ($row = mysqli_fetch_array($result)) {
	echo '<a href="article1.php?id='.$row[1].'"><div>';
	echo '<img src="../images/articles/article'.$row[1].'.jpg" />';
	echo '<span>'.$row[0].'</span>';
	echo '</div></a>';
}

mysqli_close($con); 
?>
