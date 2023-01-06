<?php

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

$loc = 'uploads/';
$max_size = 3145728;

if ($error == 0) {
    if (isset($name)) {
        if (!empty($name)) {
            if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png')) {
                if ($size <= $max_size) {
                    if (move_uploaded_file($tmp_name, $loc . $name)) {
                        echo 'Uploaded<br/>';
                        echo 'Name: ' . $name . '<br/>';
                        echo 'Extension: ' . $extension . '<br/>';
                        echo 'Size: ' . formatBytes($size) . '<br/>';
                        echo 'Location: ' . $loc . '<br/>';
                    }
                } else {
                    echo 'Not Valid Size';
                }
            } else {
                echo 'Not valid Image';
            }
        } else {
            echo 'Please Choose a File';
        }
    }
} else {
    echo 'Error Occured!';
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required="1"/>
    <input type="submit"/>
</form>