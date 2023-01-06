<?php

$user = $_POST['username'];
$pass = $_POST['password'];

if ($user != null && $pass != null) {
$con = mysqli_connect('localhost', 'root', '', 'gogo');
$result = mysqli_query($con, "select acc_id, hash from accounts where username = '$user'");
$bool = false;

while ($row = mysqli_fetch_array($result)) {
    if (password_verify($pass, $row[1])) {
        $bool = true;
        $id = $row[0];
        setcookie('user', 'loggedin', time() + 60 * 60 * 24 * 3);
        header('Location: http://www.eden.com/news/news.php');
    }
}
if (!$bool) {
    header('Location: http://www.eden.com);
}
mysql_close($con);
}
