<?php
$con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
mysqli_query($con, 'set charset utf8');
$result;
$input = $_POST['input'];
$sel = $_POST['select'];

echo '<table border=0 cellspacing="3" id="admin_table">';
    echo '<tr>'
    . '<th>Tweet ID</th>'
    . '<th>User ID</th>'
    . '<th style="word-wrap: break-word; width: 350px;">Tweet</th>'
    . '<th>Tweet Date</th>'
    . '<th>Like No</th>'
    . '<th>Reply No</th>'
    . '<th>Actions</th>'
    . '</tr>';

if ($input != '') {
    $result = mysqli_query($con, 'select * from tweets where '.$sel.' like "%'.$input.'%";');
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td style="word-wrap: break-word; width: 350px;">' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td>' . $row[5] . '</td>'
        . '<td><button onclick="deleteAction(' . $row[0] . ', 40)">Delete</button></td>'
        . '</tr>';
    }
    echo '</table>';
} else {
    $result = mysqli_query($con, 'select * from tweets');

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>'
        . '<td>' . $row[0] . '</td>'
        . '<td>' . $row[1] . '</td>'
        . '<td style="word-wrap: break-word; width: 350px;">' . $row[2] . '</td>'
        . '<td>' . $row[3] . '</td>'
        . '<td>' . $row[4] . '</td>'
        . '<td>' . $row[5] . '</td>'
        . '<td><button onclick="deleteAction(' . $row[0] . ', 40)">Delete</button></td>'
        . '</tr>';
    }
    echo '</table>';
}
mysqli_close($con);
