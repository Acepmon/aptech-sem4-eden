<?php

$con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
mysqli_query($con, 'set charset utf8');
$id = $_POST['id'];
$table = $_POST['num'];

if ($table == 0) {
    mysqli_query($con, 'delete from accounts where acc_id = ' . $id);
} else
if ($table == 1) {
} else
if ($table == 10) {
    mysqli_query($con, 'delete from musics where music_id = ' . $id);
} else
if ($table == 11) {
    mysqli_query($con, 'delete from artist where artist_id = ' . $id);
} else
if ($table == 12) {
    mysqli_query($con, 'delete from albums where albums_id = ' . $id);
}else 
if ($table == 20) {
    mysqli_query($con, 'delete from movies where movie_id = ' . $id);
} else
if ($table == 21) {
    mysqli_query($con, 'delete from shorts where short_id = ' . $id);
} else
if ($table == 30) {
    mysqli_query($con, 'delete from books where b_id = ' . $id);
} else
if ($table == 31) {
    mysqli_query($con, 'delete from author where a_id = ' . $id);
} else
if ($table == 40) {
    mysqli_query($con, 'delete from tweets where tweet_id = ' . $id);
} else
if ($table == 50) {
    mysqli_query($con, 'delete from comments where m_id = '. $id);
    mysqli_query($con, 'delete from news where m_id = ' . $id);
}
if ($table == 51) {
    mysqli_query($con, 'delete from comments where c_id = ' . $id);
}

mysqli_close($con);
