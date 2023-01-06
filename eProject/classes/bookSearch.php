<?php

$input = $_POST['input'];

$con = mysqli_connect('localhost', 'root', '', 'gogo');
mysqli_query($con, 'set charset utf8');
$result = mysqli_query($con, 'select name, b_id, picture from books where name like "'.$input.'%" limit 3');

while ($row = mysqli_fetch_array($result)) {
	echo '<a href="abook.php?book='.$row[1].'"><div>';
	echo '<img src="../images/books/'.$row[2].'" />';
	echo '<span>'.$row[0].'</span>';
	echo '</div></a>';
}

mysqli_close($con); 
?>
