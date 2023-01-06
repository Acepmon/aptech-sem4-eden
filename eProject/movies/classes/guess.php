<?php

$val = $_POST['input'];

$input = strtolower($val);

$con = mysqli_connect('localhost', 'root', '', 'gogo');
$result = mysqli_query($con, 'select movie_title, movie_poster, movie_id from movies where movie_title like "'.$input.'%" limit 3');

$print = null;

while ($row = mysqli_fetch_array($result)) {
    echo '<a href="watch.php?cat=movie&m='.$row[2].'"><div>';
    echo '<img src="../images/'.$row[1].'" /><span>'.$row[0].'</span>';
    echo '</div></a>';
}

mysqli_close($con);
