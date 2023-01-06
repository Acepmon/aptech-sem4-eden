<?php

$con = mysqli_connect('localhost', 'root', '', 'gogo') or die(mysql_error());
mysqli_query($con, 'set charset utf8');
$input = strtolower($_POST['input']);
$sel = $_POST['select'];

echo '<table border=0 cellspacing="3" id="admin_table">';
    echo '<tr>'
    . '<th>Movie ID</th>'
    . '<th>Movie Title</th>'
    . '<th>Movie Type</th>'
    . '<th>Movie length</th>'
    . '<th>Movie Location</th>'
    . '<th>Movie Poster</th>'
    . '<th>Actions</th>'
    . '</tr>';

if ($input != '') {
    $result = mysqli_query($con, 'select * from shorts where '.$sel.' like "%' . $input . '%";');
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td>' . $row[5] . '</td>'
        . '<td><button onclick="editAction(' . $row[0] . ', 21)">Edit</button>&nbsp;<button onclick="deleteAction(' . $row[0] . ', 21)">Delete</button></td>'
        . '</tr>';
    }
} else {
    $result = mysqli_query($con, 'select * from shorts');
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td>' . $row[5] . '</td>'
        . '<td><button onclick="editAction(' . $row[0] . ', 21)">Edit</button>&nbsp;<button onclick="deleteAction(' . $row[0] . ', 21)">Delete</button></td>'
        . '</tr>';
    }
}
echo '</table>';
mysqli_close($con);
