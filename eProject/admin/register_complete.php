<?php

$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

$con = mysqli_connect('localhost', 'root', 'acep123', 'cloud');

if (mysqli_connect_errno()) {
    echo "<script>alert('Failed to connect to MySQL');</script>";
}

$id;
$result = mysqli_query($con, 'select acc_id from accounts');

$hash = password_hash($pass, PASSWORD_BCRYPT);
$id = $id+1;

if (mysqli_query($con, 'insert into accounts values (4, "'.$user.'", "'.$hash.'", "'.$email.'");')) {
    echo 'Registered';
} else {
    echo 'Failed to Register';
}