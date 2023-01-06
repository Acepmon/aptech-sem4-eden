<?php

$con = mysqli_connect('www.eden.com', 'root', '', 'gogo') or die(mysql_error());
mysqli_query($con, 'set charset utf8');
$input = $_POST['input'];
$sel = $_POST['select'];

echo '<table border=0 cellspacing="3" id="admin_table">';
echo '<tr>'
 . '<th>Comment ID</th>'
 . '<th>News ID</th>'
 . '<th>Name</th>'
 . '<th>Comment</th>'
 . '<th>Actions</th>'
 . '</tr>';

if ($input != '') {
    $result = mysqli_query($con, 'select * from comments where ' . $sel . ' like "%' . $input . '%";');
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td><button onclick="deleteAction(' . $row[0] . ', 51)">Delete</button></td>'
        . '</tr>';
    }
} else {
    $result = mysqli_query($con, 'select * from comments');
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td><button onclick="deleteAction(' . $row[0] . ', 51)">Delete</button></td>'
        . '</tr>';
    }
}
echo '</table>';
mysqli_close($con);
