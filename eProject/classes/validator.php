<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$retype = $_POST['retype'];
$email = $_POST['email'];
$check = $_POST['check'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];
$intro = $_POST['intro'];
$pic = $_FILES['file'];

$pic_name = $pic['name'];
$pic_tmp = $pic['tmp_name'];

if ($firstname == null) {

} else
if ($lastname == null) {

} else
if ($username == null) {

} else 
if ($password == null) {

} else
if ($retype == null) {

} else
if ($password != $retype) {

} else
if ($check == null) {

} else 
if ($address == null) {

} else
if ($birthdate == null) {

} else
if ($intro == null) {

} else {

$con = mysqli_connect('localhost', 'root', '', 'gogo');    
    $hash = password_hash($password, PASSWORD_BCRYPT);
    move_uploaded_file($pic_tmp, '../images/userIcons/'.$pic_name);
list($picname, $bla) = explode(".", $pic_name);
    $query = "insert into accounts values(0, '$firstname', '$lastname', '" . strtolower($username) . "', '$hash', '$email', '$picname', 'user', '$address', '$birthdate', '$intro')";
    mysqli_query($con, $query);
    
header('Location: http://www.eden.com/');	
}
?>
