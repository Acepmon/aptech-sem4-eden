<?php

$table = $_POST['table'];
$print = null;
$apply = $_GET['apply'];
$w = $_GET['w'];

if ($apply) {
    switch ($w) {
        case '0': accountsApply(); echo '<script>alert("asds");</script>';
            break;
        case '1': break;
        case '10': musicsApply(); 
            break;
        case '11': artistsApply();
            break;
        case '12': albumsApply();
            break;
	case '20': moviesApply();
            break;
	case '21': shortsApply();
            break;
        case '30': booksApply();
            break;
        case '31': authorsApply();
            break;
        case '50': newsApply();
            break;
    }
}
switch ($table) {
    case '0': $print = accounts();
        break;
    case '1': break;
    case '10': $print = musics();
        break;
    case '11': $print = artists();
        break;
    case '12': $print = albums();
        break;
    case '20': $print = movies();
        break;
    case '21': $print = shorts();
        break;
    case '30': $print = books();
        break;
    case '31': $print = authors();
        break;
    case '50': $print = news();
        break;
}

/*
function accounts() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');

    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&w=0' enctype='multipart/form-data'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Create Account</td></tr>"
            . "<tr><th style='text-align: right;'>Firstname</th><td><input type='text' name='accounts_first' /></td></tr>"
            . "<tr><th style='text-align: right;'>Lastname</th><td><input type='text' name='accounts_last' /></td></tr>"
            . "<tr><th style='text-align: right;'>Username</th><td><input type='text' name='accounts_name' /></td></tr>"
            . "<tr><th style='text-align: right;'>Password</th><td><input type='password' name='accounts_newpass' /></td></tr>"
            . "<tr><th style='text-align: right;'>Retype Password</th><td><input type='password' name='accounts_retype' /></td></tr>"
            . "<tr><th style='text-align: right;'>Email</th><td><input type='email' name='accounts_email' /></td></tr>"
            . "<tr><th style='text-align: right;'>Profile Picture</th><td><input type='file' name='accounts_pic' /></td></tr>"
	    . "<tr><th style='text-align: right;'>Address</th><td><input type='text' name='accounts_address' /></td></tr>"
	    . "<tr><th style='text-align: right;'>Birthdate</th><td><input type='text' name='accounts_birthdate' /></td></tr>"
	    . "<tr><th style='text-align: right;'>Intro</th><td><input type='text' name='accounts_intro' /></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(0)' style='float: left'/><input type='submit' value='Create' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function accountsApply() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_first = $_POST['accounts_first'];
    $edit_last = $_POST['accounts_last'];
    $edit_name = $_POST['accounts_name'];
    $edit_newpass = $_POST['accounts_newpass'];
    $edit_retype = $_POST['accounts_retype'];
    $edit_email = $_POST['accounts_email'];
    $file = $_FILES['accounts_pic'];
    $edit_address = $_POST['accounts_address'];
    $edit_birthdate = $_POST['accounts_birthdate'];
    $edit_intro = $_POST['accounts_intro'];

    $name = $file['name'];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));
    $type = $file['type'];
    $size = $file['size'];
    $title = $file['title'];
    $tmp_name = $file['tmp_name'];
    $location = '../../images/userIcons/';

    if ($edit_first == null) {
        echo '<script>alert("Firstname is empty!");</script>';
    } else
    if ($edit_last == null) {
        echo '<script>alert("Lastname is empty");</script>';
    } else
    if ($edit_name == null) {
        echo '<script>alert("Username is empty");</script>';
    } else
    if ($edit_newpass == null) {
        echo '<script>alert("Password is empty");</script>';
    } else
    if ($edit_retype == null) {
        echo '<script>alert("Retype your password");</script>';
    } else
    if ($edit_newpass != $edit_retype) {
        echo '<script>alert("Passwords do not match");</script>';
    } else
    if ($edit_email == null) {
        echo '<script>alert("Email is empty");</script>';
    } else
    if ($edit_pic == null || $pic_size > 3000000 || $extension != 'png') {
        echo '<script>alert("Upload a Picture");</script>';
    } else {
	move_uploaded_file($tmp_name, $location . $edit_name);
        $hash = password_hash($edit_newpass, PASSWORD_BCRYPT);
        mysqli_query($con, 'insert into accounts(firstname, lastname, username, hash, email, profile_pic) '
                . 'values ("' . $edit_first . '", "' . $edit_last . '", "' . $edit_name . '", "' . $hash . '", "' . $edit_email . '", "'.$edit_name.'");');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=0&switchPanel=0');
}
*/
function musics() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&w=10'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add Music</td></tr>"
            . "<tr><th style='text-align: right;'>Music Name</th><td><input type='text' name='musics_name'/></td></tr>"
            . "<tr><th style='text-align: right;'>Music Artist ID</th><td><input type='text' name='musics_artistid'/></td></tr>"
            . "<tr><th style='text-align: right;'>Genre</th><td><input type='text' name='musics_genre'/></td></tr>"
            . "<tr><th style='text-align: right;'>Music Album ID</th><td><input type='text' name='musics_albumid'/></td></tr>"
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
    $edit_name = $_POST['musics_name'];
    $edit_artistid = $_POST['musics_artistid'];
    $edit_genre = $_POST['musics_genre'];
    $edit_albumid = $_POST['musics_albumid'];
    
    if ($edit_name == null) {
        
    } else
    if ($edit_artistid == null) {
        
    } else
    if ($edit_genre == null) {
        
    } else 
    if ($edit_albumid == null) {
        
    } else {
        mysqli_query($con, 'insert into musics(music_name, music_artist_id, genre, music_album_id) '
                . 'values ("'.$edit_name.'", "'.$edit_artistid.'", "'.$edit_genre.'", "'.$edit_albumid.'");');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=1&switchPanel=0');
}

function artists() {
    $id = $input_id;
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&w=11'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add Artist</td></tr>"
            . "<tr><th style='text-align: right;'>Artist Name</th><td><input type='text' name='artists_name'/></td></tr>"
            . "<tr><th style='text-align: right;'>Artist Description</th><td><textarea name='artists_desc'></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Genre</th><td><input type='text' name='artists_genre'/></td></tr>"
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
    $edit_name = $_POST['artists_name'];
    $edit_desc = $_POST['artists_desc'];
    $edit_genre = $_POST['artists_genre'];
    
    if ($edit_name == null) {
        
    } else
    if ($edit_desc == null) {
        
    } else
    if ($edit_genre == null) {
        
    } else {
        mysqli_query($con, 'insert into artist(artist_name, artist_desc, genre) '
                . 'values ("'.$edit_name.'", "'.$edit_desc.'", "'.$edit_genre.'");');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=1&switchPanel=1');
}

function albums() {
    $con = mysqli_connect('www.eden.com', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&albums_id=$id&w=12'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add Album</td></tr>"
            . "<tr><th style='text-align: right;'>Album Name</th><td><input type='text' name='albums_name' /></td></tr>"
            . "<tr><th style='text-align: right;'>Album Artist Id</th><td><input type='text' name='albums_artistid' /></td></tr>"
            . "<tr><th style='text-align: right;'>Album Art</th><td><input type='file' name='albums_art' /></td></tr>"
            . "<tr><th style='text-align: right;'>Genre</th><td><input type='text' name='albums_genre' /></td></tr>"
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
    $edit_name = $_POST['albums_name'];
    $edit_artistid = $_POST['albums_artistid'];
    $edit_art = $_POST['albums_art'];
    $edit_genre = $_POST['albums_genre'];

    if ($edit_name != null) {
        
    } else
    if ($edit_name != null) {
        
    } else
    if ($edit_art != null) {
        
    } else
    if ($edit_genre != null) {
        
    } else {
        mysqli_query($con, 'insert into albums(album_name, album_artist_id, album_art, genre) '
                . 'values ("'.$edit_name.'", "'.$edit_artistid.'", "'.$edit_art.'", "'.$edit_genre.'");');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=1&switchPanel=2');
}

function books() {
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&w=30' enctype='multipart/form-data'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add Book</td></tr>"
            . "<tr><th style='text-align: right;'>Book Author ID</th><td><input type='text' name='books_authorsid' /></td></tr>"
            . "<tr><th style='text-align: right;'>Book Name</th><td><input type='text' name='books_name' /></td></tr>"
            . "<tr><th style='text-align: right;'>Book Type</th><td><input type='text' name='books_type' /></td></tr>"
            . "<tr><th style='text-align: right;'>Book Description</th><td><textarea name='books_desc' ></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Book Picture</th><td><input type='file' name='books_pic' required='1'/></td></tr>"
            . "<tr><th style='text-align: right;'>Book Page</th><td><input type='text' name='books_page' /></td></tr>"
            . "<tr><th style='text-align: right;'>Book Price</th><td><input type='text' name='books_price' /></td></tr>"
	    . "<tr><th style='text-align: right;'>Book Quantity</th><td><input type='text' name='books_quantity' /></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(30)' style='float: left' /><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function booksApply() {
    $con = mysqli_connect('localhost', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_authorsid = $_POST['books_authorsid'];
    $edit_name = $_POST['books_name'];
    $edit_type = $_POST['books_type'];
    $edit_desc = $_POST['books_desc'];
    $edit_pic = $_FILES['books_pic'];
    $edit_page = $_POST['books_page'];
    $edit_price = $_POST['books_price'];
    $edit_quantity = $_POST['books_quantity'];

    if ($edit_name == null) {
        
    } else
    if ($edit_type == null) {
        
    } else 
    if ($edit_desc == null) {
        
    } else 
    if ($edit_pic == null) {
        
    } else 
    if ($edit_page == null) {
        
    } else 
    if ($edit_price == null) {
        
    } else
    if ($edit_quantity == null) {
        
    } else {
	header('Location: http://www.eden.com/');
        mysqli_query($con, 'insert into books(a_id, type, name, description, picture, page, price, quantity) '
                . 'values ('.$edit_authorsid.', "'.$edit_name.'", "'.$edit_desc.'", "'.$edit_pic.'", '.$edit_page.', "'.$edit_price.'", '.$edit_quantity.');');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=3&switchPanel=0');
}

function authors() {
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&authors_id=$id&w=31'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add Author</td></tr>"
            . "<tr><th style='text-align: right;'>Author Firstname</th><td><input type='text' name='authors_first'/></td></tr>"
            . "<tr><th style='text-align: right;'>Author Lastname</th><td><input type='text' name='authors_last' /></td></tr>"
            . "<tr><th style='text-align: right;'>Author Description</th><td><textarea name='authors_desc' ></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Author Picture</th><td><input type='file' name='authors_pic' /></td></tr>"
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
    $edit_first = $_POST['authors_first'];
    $edit_last = $_POST['authors_last'];
    $edit_desc = $_POST['authors_desc'];
    $edit_pic = $_POST['authors_pic'];

    if ($edit_first == null) {
        
    } else 
    if ($edit_last == null) {
        
    } else
    if ($edit_desc == null) {
        
    } else
    if ($edit_pic == null) {
        
    } else {
        mysqli_query($con, 'insert into author(firstname, lastname, description, picture) '
                . 'values ("'.$edit_first.'", "'.$edit_last.'", "'.$edit_desc.'", "'.$edit_pic.'");');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=3&switchPanel=1');
}

function news() {
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&news_id=$id&w=50'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add News</td></tr>"
            . "<tr><th style='text-align: right;'>News Type</th><td><input type='text' name='news_type' /></td></tr>"
            . "<tr><th style='text-align: right;'>News Title</th><td><input type='text' name='news_title' /></td></tr>"
            . "<tr><th style='text-align: right;'>News Description</th><td><textarea name='news_medee' ></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Name</th><td><input type='text' name='news_name' /></td></tr>"
            . "<tr>"
            . "<td><input type='reset' value='Clear' style='float: right;'/></td>"
            . "<td><input type='button' value='Cancel' onclick='editCancel(50)' style='float: left'/><input type='submit' value='Apply' style='float: right;'/>&nbsp;</td>"
            . "</tr>"
            . "</table>"
            . "</form>";
    return $final;
}
function newsApply() {
    $con = mysqli_connect('localhost', 'root', '', 'gogo');
    mysqli_query($con, 'set charset utf8');
    $edit_type = $_POST['news_type'];
    $edit_title = $_POST['news_title'];
    $edit_medee = $_POST['news_medee'];
    $edit_name = $_POST['news_name'];

    if ($edit_type == null) {
        
    } else
    if ($edit_title == null) {
        
    } else
    if ($edit_medee == null) {
        
    } else
    if ($edit_name == null) {
        
    } else {
        mysqli_query($con, 'insert into news(type, title, medee, time, name) '
                . 'values ("'.$edit_type.'","'.$edit_title.'","'.$edit_medee.'", "'.time().'", "'.$edit_name.'",);');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=5&switchPanel=0');
}

function movies() {
    $final = "<form method='POST' action='classes/admin_action_add.php?apply=true&w=20'>"
            . "<table id='admin_table'>"
            . "<tr><th colspan=2>Add Movie</td></tr>"
            . "<tr><th style='text-align: right;'>Movie Title</th><td><input type='text' name='movies_title'/></td></tr>"
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
            . "<tr><th style='text-align: right;'>Move Description</th><td><textarea name='movies_desc' ></textarea></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Location</th><td><input type='text' name='movies_loc' /></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Poster</th><td><input type='text' name='movies_poster' /></td></tr>"
            . "<tr><th style='text-align: right;'>Movie Length</th><td><input type='text' name='movies_length' /></td></tr>"
	    . "<tr><th style='text-align: right;'>Movie Trailer</th><td><input type='text' name='movies_trailer' /></td></tr>"
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
    $edit_title = $_POST['movies_title'];
    $edit_type = $_POST['movies_type'];
    $edit_desc = $_POST['movies_desc'];
    $edit_loc = $_POST['movies_loc'];
    $edit_poster = $_POST['movies_poster'];
    $edit_length = $_POST['movies_length'];
    $edit_trailer = $_POST['movies_trailer'];

    if ($edit_title == null) {
    } else
    if ($edit_type == null) {
    } else
    if ($edit_desc == null) {
    } else
    if ($edit_loc == null) {
    } else
    if ($edit_poster == null) {
    } else
    if ($edit_length == null) {
    } else {
        mysqli_query($con, 'insert into movies(movie_title, movie_type, movie_desc, movie_loc, movie_poster, movie_length, movie_trailer) values ("'.$edit_title.'", "'.$edit_type.'", "'.$edit_desc.'", "'.$edit_loc.'", "'.$edit_poster.'", "'.$edit_length.'", "'.$edit_trailer.'")');
    }
    header('Location: http://www.eden.com/admin/index.php?switchTab=2&switchPanel=0');
}

echo $print;
