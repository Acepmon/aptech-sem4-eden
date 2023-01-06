<?php

$con = mysqli_connect('www.eden.com', 'root', '', 'gogo') or die(mysql_error());
mysqli_query($con, 'set charset utf8');
$input = $_POST['input'];
$sel = $_POST['select'];

echo '<table border=0 cellspacing="3" id="admin_table">';
    echo '<tr>'
    . '<th>Music ID</th>'
    . '<th>Music Name</th>'
    . '<th>Music Artist ID</th>'
    . '<th>Genre</th>'
    . '<th>Music Album ID</th>'
    . '<th>Actions</th>'
    . '</tr>';

if ($input != '') {
    $result = mysqli_query($con, 'select * from musics where '.$sel.' like "%' . $input . '%";');

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td><button onclick="editAction('.$row[0].', 10)">Edit</button>&nbsp;<button onclick="deleteAction(' . $row[0] . ', 10)">Delete</button></td>'
        . '</tr>';
    }
} else {
    $result = mysqli_query($con, 'select * from musics');

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td><button onclick="editAction('.$row[0].', 10)">Edit</button>&nbsp;<button onclick="deleteAction(' . $row[0] . ', 10)">Delete</button></td>'
        . '</tr>';
    }
}
echo '</table>';
mysqli_close($con);
