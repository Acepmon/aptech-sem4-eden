<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$retype = $_POST['retype'];
$email = $_POST['email'];
$check = $_POST['check'];
$file = $_FILES['file'];

if ($firstname == null) {
    
} else if ($lastname == null) {
    
} else if ($username == null) {
    
} else if ($password == null) {
    
} else if ($retype == null) {
    
} else if ($password != $retype) {
    
} else if ($email == null) {
    
} else if ($check == null) {
    
} else if ($file == null) {
    
} else {
    register($firstname, $lastname, $username, $password, $email, $file);
}

function register($firstname, $lastname, $username, $password, $email, $file) {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $query = 'insert into accounts(firstname, lastname, username, hash, email) values ("'.$firstname.'","'.$lastname.'","'.strtolower($username).'","'.$hash.'","'.$email.'");';
    mysqli_query($con, $query);
    header('Location: http://www.eden.com/');
}

if ($user != null || $pass != null) {
    validate($user, $pass);
}
