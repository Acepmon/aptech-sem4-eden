<?php

$con = mysqli_connect('www.eden.com', 'root', '', 'gogo') or die(mysql_error());
mysqli_query($con, 'set charset utf8');
$input = $_POST['input'];
$sel = $_POST['select'];

echo '<table border=0 cellspacing="3" id="admin_table">';
echo '<tr>'
 . '<th>Book ID</th>'
 . '<th>Author ID</th>'
 . '<th>Type</th>'
 . '<th>Name</th>'
 . '<th>Description</th>'
 . '<th>Picture</th>'
 . '<th>Page</th>'
 . '<th>Price</th>'
 . '<th>Quantity</th>'
 . '<th>Actions</th>'
 . '</tr>';

if ($input != '') {
    $result = mysqli_query($con, 'select * from books where '.$sel.' like "%' . $input . '%";');
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td>' . $row[5] . '</td>'
        . '<td>' . $row[6] . '</td>'
        . '<td>' . $row[7] . '</td>'
	. '<td>' . $row[8] . '</td>'
        . '<td><button onclick="editAction(' . $row[0] . ', 30)">Edit</button>&nbsp;<button onclick="deleteAction(' . $row[0] . ', 30)">Delete</button></td>'
        . '</tr>';
    }
} else {
    $result = mysqli_query($con, 'select * from books');
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td>' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td>' . $row[5] . '</td>'
        . '<td>' . $row[6] . '</td>'
        . '<td>' . $row[7] . '</td>'
	. '<td>' . $row[8] . '</td>'
        . '<td><button onclick="editAction(' . $row[0] . ',30)">Edit</button>&nbsp;<button onclick="deleteAction(' . $row[0] . ', 30)">Delete</button></td>'
        . '</tr>';
    }
}
echo '</table>';
mysqli_close($con);

