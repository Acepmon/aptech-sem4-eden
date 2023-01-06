<?php

$user = $_POST['username'];
$pass = $_POST['password'];

$bool = false;

if ($user != null && $pass != null) {
$con = mysqli_connect("localhost", "root", "", "gogo");
$result = $con->query("select acc_id, hash, role from accounts where username='$user'");

while ($row = mysqli_fetch_array($result)) {
    if (password_verify($pass, $row[1])) {
	$bool = true;
	session_start();
	$_SESSION['user'] = $row[0];
	if($row[2] == "admin"){
		header('Location: http://www.eden.com/admin/index.php');
	} else {
		$book = $_POST['book'];
		if($book != null){
			header('Location: http://www.eden.com/books/cart.php?add=' . $book);
		}
		header('Location: http://www.eden.com/news/news.php');
	}
    }
}
mysqli_close($con);
}
if($bool == false){
	echo "<script>alert('Wrong username or password');</script>";
	header('Location: http://www.eden.com/intro.php');
}
?>
