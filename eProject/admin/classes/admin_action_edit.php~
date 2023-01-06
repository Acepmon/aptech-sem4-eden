<?php

$input_id = $_POST['id'];
$table = $_POST['table'];
$print = null;
$apply = $_GET['apply'];
$w = $_GET['w'];

switch ($table) {
    case '0': $print = accounts($input_id); break;
    case '1':  break;
    case '10': $print = musics($input_id); break;
    case '11': $print = artists($input_id); break;
    case '12': $print = albums($input_id); break;
    case '20': $print = movies($input_id); break;
    case '21': $print = shorts($input_id); break;
    case '30': $print = books($input_id); break;
    case '31': $print = authors($input_id); break;
    case '50': $print = news($input_id); break;
}
if ($apply) {
    switch ($w) {
        case '0': accountsApply(); break;
        case '1':  break;
        case '10': musicsApply(); break;
        case '11': artistsApply(); break;
        case '12': albumsApply(); break;
        case '20': moviesApply(); break;
        case '21': shortsApply(); break;
        case '30': booksApply(); break;
        case '31': authorsApply(); break;
        case '50': newsApply(); break;
    }
}
function accounts($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from accounts where acc_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $firstname = $row[1];
        $lastname = $row[2];
        $username = $row[3];
        $email = $row[5];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&accounts_id=$id&w=0'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT ACCOUNT No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Firstname</th><td><input type='text' name='accounts_first' placeholder='Old: $firstname'/></td></tr>"
            . "<tr><th style='text-align: right;'>Lastname</th><td><input type='text' name='accounts_last' placeholder='Old: $lastname'/></td></tr>"
            . "<tr><th style='text-align: right;'>Username</th><td><input type='text' name='accounts_name' placeholder='Old: $username'/></td></tr>"
            . "<tr><th style='text-align: right;'>New Password</th><td><input type='password' name='accounts_newpass' placeholder='New Password'/></td></tr>"
            . "<tr><th style='text-align: right;'>Retype Password</th><td><input type='password' name='accounts_retype' placeholder='Retype Password'/></td></tr>"
            . "<tr><th style='text-align: right;'>Email</th><td><input type='email' name='accounts_email' placeholder='Old: $email'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(0)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function accountsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['accounts_id'];
    $edit_first = $_POST['accounts_first'];
    $edit_last = $_POST['accounts_last'];
    $edit_name = $_POST['accounts_name'];
    $edit_newpass = $_POST['accounts_newpass'];
    $edit_retype = $_POST['accounts_retype'];
    $edit_email = $_POST['accounts_email'];

    if ($edit_first != null) {
        mysqli_query($con, 'update accounts set firstname = "' . $edit_first . '" where acc_id = ' . $edit_id);
    }
    if ($edit_last != null) {
        mysqli_query($con, 'update accounts set lastname = "' . $edit_last . '" where acc_id = ' . $edit_id);
    }
    if ($edit_name != null) {
        mysqli_query($con, 'update accounts set username = "' . $edit_name . '" where acc_id = ' . $edit_id);
    }
    if (($edit_newpass != null && $edit_retype != null) && ($edit_newpass == $edit_retype)) {
        $hash = password_hash($edit_newpass, PASSWORD_BCRYPT);
        mysqli_query($con, 'update accounts set hash = "' . $hash . '" where acc_id = ' . $edit_id);
    }
    if ($edit_email != null) {
        mysqli_query($con, 'update accounts set email = "' . $edit_email . '" where acc_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=0&switchPanel=0');
}

function musics($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from musics where music_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $songname = $row[1];
        $genre = $row[3];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&musics_id=$id&w=10'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT ACCOUNT No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Music Name</th><td><input type='text' name='musics_name' placeholder='Old: $songname'/></td></tr>"
            . "<tr><th style='text-align: right;'>Genre</th><td><input type='text' name='musics_genre' placeholder='Old: $genre'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(10)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function musicsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['musics_id'];
    $edit_name = $_POST['musics_name'];
    $edit_genre = $_POST['musics_genre'];

    if ($edit_name != null) {
        mysqli_query($con, 'update musics set music_name = "' . $edit_name . '" where music_id = ' . $edit_id);
    }
    if ($edit_artist != null) {
        mysqli_query($con, 'update musics set genre = "' . $edit_genre . '" where music_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=1&switchPanel=0');
}

function artists($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from artist where artist_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $artistname = $row[1];
        $artistdesc = $row[2];
        $genre = $row[3];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&artists_id=$id&w=11'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT ARTIST No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Artist Name</th><td><input type='text' name='artists_name' placeholder='Old: $artistname'/></td></tr>"
            . "<tr><th style='text-align: right;'>Artist Description</th><td><textarea name='artists_desc' placeholder='Old: $artistdesc'></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Genre</th><td><input type='text' name='artists_genre' placeholder='Old: $genre'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(11)' style='float: left' /><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function artistsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['artists_id'];
    $edit_name = $_POST['artists_name'];
    $edit_desc = $_POST['artists_desc'];
    $edit_genre = $_POST['artists_genre'];
    
    if ($edit_name != null) {
        mysqli_query($con, 'update artist set artist_name = "' . $edit_name . '" where artist_id = ' . $edit_id);
    }
    if ($edit_desc != null) {
        mysqli_query($con, 'update artist set artist_desc = "' . $edit_desc . '" where artist_id = ' . $edit_id);
    }
    if ($edit_genre != null) {
        mysqli_query($con, 'update artist set genre = "' . $edit_genre . '" where artist_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=1&switchPanel=1');
}

function albums($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from albums where albums_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $albumname = $row[1];
        $albumart = $row[3];
        $genre = $row[4];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&albums_id=$id&w=12'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT ALBUM No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Album name</th><td><input type='text' name='albums_name' placeholder='Old: $albumname'/></td></tr>"
            . "<tr><th style='text-align: right;'>Album art</th><td><input type='text' name='albums_art' placeholder='Old: $albumart'/></td></tr>"
            . "<tr><th style='text-align: right;'>Genre</th><td><input type='text' name='albums_genre' placeholder='Old: $genre'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(12)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function albumsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['albums_id'];
    $edit_name = $_POST['albums_name'];
    $edit_art = $_POST['albums_art'];
    $edit_genre = $_POST['albums_genre'];

    if ($edit_name != null) {
        mysqli_query($con, 'update albums set album_name = "' . $edit_name . '" where albums_id = ' . $edit_id);
    }
    if ($edit_art != null) {
        mysqli_query($con, 'update albums set album_art = "' . $edit_art . '" where albums_id = ' . $edit_id);
    }
    if ($edit_genre != null) {
        mysqli_query($con, 'update albums set genre = "' . $edit_genre . '" where albums_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=1&switchPanel=2');
}

function books($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from books where b_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $type = $row[2];
        $name = $row[3];
        $desc = $row[4];
        $pic = $row[5];
        $page = $row[6];
        $price = $row[7];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&books_id=$id&w=30'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT BOOK No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Book Name</th><td><input type='text' name='books_name' placeholder='Old: $name'/></td></tr>"
            . "<tr><th style='text-align: right;'>Book Type</th><td><input type='text' name='books_type' placeholder='Old: $type'/></td></tr>"
            . "<tr><th style='text-align: right;'>Book Description</th><td><textarea name='books_desc' placeholder='Old: $desc'></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Book Picture</th><td><input type='file' name='books_pic' placeholder='Old: $pic'/></td></tr>"
            . "<tr><th style='text-align: right;'>Book Page</th><td><input type='text' name='books_page' placeholder='Old: $page'/></td></tr>"
            . "<tr><th style='text-align: right;'>Book Price</th><td><input type='text' name='books_price' placeholder='Old: $price'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(30)' style='float: left' /><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function booksApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['books_id'];
    $edit_name = $_POST['books_name'];
    $edit_type = $_POST['books_type'];
    $edit_desc = $_POST['books_desc'];
    $edit_pic = $_POST['books_pic'];
    $edit_page = $_POST['books_page'];
    $edit_price = $_POST['books_price'];

    if ($edit_name != null) {
        mysqli_query($con, 'update books set name = "' . $edit_name . '" where b_id = ' . $edit_id);
    }
    if ($edit_type != null) {
        mysqli_query($con, 'update books set type = "' . $edit_type . '" where b_id = ' . $edit_id);
    }
    if ($edit_desc != null) {
        mysqli_query($con, 'update books set description = "' . $edit_desc . '" where b_id = ' . $edit_id);
    }
    if ($edit_pic != null) {
        mysqli_query($con, 'update books set picture = "' . $edit_pic . '" where b_id = ' . $edit_id);
    }
    if ($edit_page != null) {
        mysqli_query($con, 'update books set page = "' . $edit_page . '" where b_id = ' . $edit_id);
    }
    if ($edit_price != null) {
        mysqli_query($con, 'update books set price = "' . $edit_price . '" where b_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=3&switchPanel=0');
}

function authors($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from author where a_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $first = $row[1];
        $last = $row[2];
        $desc = $row[3];
        $pic = $row[4];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&authors_id=$id&w=31'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT Author No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Author Firstname</th><td><input type='text' name='authors_first' placeholder='Old: $first'/></td></tr>"
            . "<tr><th style='text-align: right;'>Author Lastname</th><td><input type='text' name='authors_last' placeholder='Old: $last'/></td></tr>"
            . "<tr><th style='text-align: right;'>Author Description</th><td><textarea name='authors_desc' placeholder='Old: $desc'></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Author Picture</th><td><input type='file' name='authors_pic' placeholder='Old: $pic'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(31)' style='float: left' /><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function authorsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['authors_id'];
    $edit_first = $_POST['authors_first'];
    $edit_last = $_POST['authors_last'];
    $edit_desc = $_POST['authors_desc'];
    $edit_pic = $_POST['authors_pic'];

    if ($edit_first != null) {
        mysqli_query($con, 'update author set firstname = "' . $edit_first . '" where a_id = ' . $edit_id);
    }
    if ($edit_last != null) {
        mysqli_query($con, 'update author set lastname = "' . $edit_last . '" where a_id = ' . $edit_id);
    }
    if ($edit_desc != null) {
        mysqli_query($con, 'update author set description = "' . $edit_desc . '" where a_id = ' . $edit_id);
    }
    if ($edit_pic != null) {
        mysqli_query($con, 'update author set picture = "' . $edit_pic . '" where a_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=3&switchPanel=1');
}

function news($input_id) {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from news where m_id = ' . $id);
    while ($row = mysqli_fetch_array($result)) {
        $type = $row[1];
        $title = $row[2];
        $medee = $row[3];
        $name = $row[5];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&news_id=$id&w=50'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT NEWS No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>News Type</th><td><input type='text' name='news_type' placeholder='Old: $type'/></td></tr>"
            . "<tr><th style='text-align: right;'>News Title</th><td><input type='text' name='news_title' placeholder='Old: $title'/></td></tr>"
            . "<tr><th style='text-align: right;'>News Description</th><td><textarea name='news_medee' placeholder='Old: $medee'></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Name</th><td><input type='text' name='news_name' placeholder='Old: $name'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(50)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function newsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['news_id'];
    $edit_type = $_POST['news_type'];
    $edit_title = $_POST['news_title'];
    $edit_medee = $_POST['news_medee'];
    $edit_name = $_POST['news_name'];

    if ($edit_type != null) {
        mysqli_query($con, 'update news set type = "' . $edit_type . '" where m_id = ' . $edit_id);
    }
    if ($edit_title != null) {
        mysqli_query($con, 'update news set title = "' . $edit_title . '" where m_id = ' . $edit_id);
    }
    if ($edit_medee != null) {
        mysqli_query($con, 'update news set medee = "' . $edit_medee . '" where m_id = ' . $edit_id);
    }
    if ($edit_name != null) {
        mysqli_query($con, 'update news set name = "' . $edit_name . '" where m_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=5&switchPanel=0');
}

function movies($input_id) {
    $id = $input_id;
    $con = mysqli_connect('localhost', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from movies where movie_id = "'.$id.'"');
    while ($row = mysqli_fetch_array($result)) {
        $title = $row[1];
        $type = $row[2];
        $desc = $row[3];
        $loc = $row[4];
        $poster = $row[5];
        $length = $row[6];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&movies_id=$id&w=20'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT MOVIE No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Movie Title</th><td><input type='text' name='movies_title' placeholder='Old: $title'/></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Type</th><td><select name='movies_type'>"
            . "<option>action</option>"
            . "<option>adventure</option>"
            . "<option>animation</option>"
            . "<option>comedy</option>"
            . "<option>crime</option>"
            . "<option>documentary</option>"
            . "<option>drama</option>"
            . "<option>family</option>"
            . "<option>fantasy</option>"
            . "<option>horror</option>"
            . "<option>musical</option>"
            . "<option>mystery</option>"
            . "<option>romance</option>"
            . "<option>sci-fi</option>"
            . "<option>sport</option>"
            . "<option>thriller</option>"
            . "<option>war</option>"
            . "<option>western</option>"
            . "</select></td></tr>"
            . "<tr><th style='text-align: right;'>Move Description</th><td><textarea name='movies_desc' placeholder='Old: $desc'></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Location</th><td><input type='text' name='movies_loc' placeholder='Old: $loc'/></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Poster</th><td><input type='text' name='movies_poster' placeholder='Old: $poster'/></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Length</th><td><input type='text' name='movies_length' placeholder='Old: $length'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(20)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function moviesApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['movies_id'];
    $edit_title = $_POST['movies_title'];
    $edit_type = $_POST['movies_type'];
    $edit_desc = $_POST['movies_desc'];
    $edit_loc = $_POST['movies_loc'];
    $edit_poster = $_POST['movies_poster'];
    $edit_length = $_POST['movies_length'];

    if ($edit_title != null) {
        strtolower($edit_title);
        mysqli_query($con, 'update movies set movie_title = "' . $edit_title . '" where movie_id = ' . $edit_id);
    }
    if ($edit_type != null) {
        mysqli_query($con, 'update movies set movie_type = "' . $edit_type . '" where movie_id = ' . $edit_id);
    }
    if ($edit_desc != null) {
        mysqli_query($con, 'update movies set movie_desc = "' . $edit_desc . '" where movie_id = ' . $edit_id);
    }
    if ($edit_loc != null) {
        strtolower($edit_loc);
        mysqli_query($con, 'update movies set movie_loc = "' . $edit_loc . '" where movie_id = ' . $edit_id);
    }
    if ($edit_poster != null) {
        strtolower($edit_poster);
        mysqli_query($con, 'update movies set movie_poster = "' . $edit_poster . '" where movie_id = ' . $edit_id);
    }
    if ($edit_length != null) {
        mysqli_query($con, 'update movies set movie_length = "' . $edit_length . '" where movie_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=2&switchPanel=0');
}
function shorts() {
    $id = $input_id;
    $con = mysqli_connect('localhost', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $result = mysqli_query($con, 'select * from shorts where short_id = "'.$id.'"');
    while ($row = mysqli_fetch_array($result)) {
        $title = $row[1];
        $type = $row[2];
        $desc = $row[3];
        $loc = $row[4];
        $poster = $row[5];
        $length = $row[6];
    }
    $final = "<form method='POST' action='classes/admin_action_edit.php?apply=true&movies_id=$id&w=21'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>EDIT SHORT MOVIE No: $id</td></tr>"
            . "<tr><th style='text-align: right;'>Movie Title</th><td><input type='text' name='movies_title' placeholder='Old: $title'/></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Type</th><td><select name='movies_type'>"
            . "<option>action</option>"
            . "<option>adventure</option>"
            . "<option>animation</option>"
            . "<option>comedy</option>"
            . "<option>crime</option>"
            . "<option>documentary</option>"
            . "<option>drama</option>"
            . "<option>family</option>"
            . "<option>fantasy</option>"
            . "<option>horror</option>"
            . "<option>musical</option>"
            . "<option>mystery</option>"
            . "<option>romance</option>"
            . "<option>sci-fi</option>"
            . "<option>sport</option>"
            . "<option>thriller</option>"
            . "<option>war</option>"
            . "<option>western</option>"
            . "</select></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Location</th><td><input type='text' name='movies_loc' placeholder='Old: $loc'/></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Poster</th><td><input type='text' name='movies_poster' placeholder='Old: $poster'/></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Length</th><td><input type='text' name='movies_length' placeholder='Old: $length'/></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(21)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function shortsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_id = $_GET['movies_id'];
    $edit_title = $_POST['movies_title'];
    $edit_type = $_POST['movies_type'];
    $edit_loc = $_POST['movies_loc'];
    $edit_poster = $_POST['movies_poster'];
    $edit_length = $_POST['movies_length'];

    if ($edit_title != null) {
        strtolower($edit_title);
        mysqli_query($con, 'update shorts set movie_title = "' . $edit_title . '" where short_id = ' . $edit_id);
    }
    if ($edit_type != null) {
        mysqli_query($con, 'update shorts set movie_type = "' . $edit_type . '" where short_id = ' . $edit_id);
    }
    if ($edit_loc != null) {
        strtolower($edit_loc);
        mysqli_query($con, 'update shorts set movie_loc = "' . $edit_loc . '" where short_id = ' . $edit_id);
    }
    if ($edit_poster != null) {
        strtolower($edit_poster);
        mysqli_query($con, 'update shorts set movie_poster = "' . $edit_poster . '" where short_id = ' . $edit_id);
    }
    if ($edit_length != null) {
        mysqli_query($con, 'update shorts set movie_length = "' . $edit_length . '" where short_id = ' . $edit_id);
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=2&switchPanel=1');
}

echo $print;
