<?php

/*
        $tab = $_GET['switchTab'];
        $panel = $_GET['switchPanel'];
        $con = mysqli_connect('localhost', 'root', '', 'gogo');
        session_start();
        $user = $_SESSION['user'];
        $result = $con->query("select role from accounts where acc_id=$user");
        $row = mysqli_fetch_row($result);
        if ($row[0] != "admin") {
            header('Location: http://www.eden.com/news/news.php');
        }*/

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // $bytes /= pow(1024, $pow);
    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

$file = $_FILES['file'];

$name = $file['name'];
$extension = strtolower(substr($name, strpos($name, '.') + 1));
$type = $file['type'];
$size = $file['size'];
$title = $file['title'];
$error = $file['error'];
$tmp_name = $file['tmp_name'];

$loc = 'Pictures/';
$max_size = 3145728;


                
       
                        echo 'Uploaded<br/>';
                        echo 'Name: ' . $name . '<br/>';
                        echo 'Extension: ' . $extension . '<br/>';
                        echo 'Size: ' . formatBytes($size) . '<br/>';
                        echo 'Location: ' . $loc . '<br/>';
			echo $tmp_name;
			move_uploaded_file($tmp_name, '/home/uchral/Pictures/ds.jpg');
                    
                
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required="1"/>
    <input type="submit"/>
</form>
