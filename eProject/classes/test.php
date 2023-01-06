<?php

$input = $_POST['input'];

$con = mysqli_connect('localhost', 'root', '', 'gogo');
mysqli_query($con, 'set charset utf8');
$result = mysqli_query($con, 'select music_name, music_album_id from musics where music_name like "'.$input.'%" limit 3');

while ($row = mysqli_fetch_array($result)) {
	$albums = mysqli_fetch_array(mysqli_query($con, "select album_art from albums where albums_id =$row[1]"));
	echo '<a href="javascript:void(0)" onClick="recp('.$row[1].', \'albums\')"><div>';
	echo '<img src="../images/albums/'.$albums[0].'.jpg" />';
	echo '<span>'.$row[0].'</span>';
	echo '</div></a>';
}

mysqli_close($con); 
?>
