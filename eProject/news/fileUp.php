<?php

$image = $_GET['img'];
$tmp_name = $image['tmp_name'];

move_uploaded_file($tmp_name, 'images/articles/'.$image['name']);

echo "<img src=\"images/articles/$image\" style='width: 215px; height: 215px;'/>";
?>
