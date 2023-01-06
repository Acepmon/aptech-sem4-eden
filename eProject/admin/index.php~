<?php
session_start();
$user = $_SESSION['user'];

		$connection = mysql_connect("localhost","root", "");
		mysql_set_charset('utf8',$connection);
		$database = mysql_select_db("gogo");

$query = mysql_fetch_array(mysql_query("select role from accounts where acc_id = $user"));
$query = $query[0];
if($query != "admin"){
	header("Location: http://www.eden.com/intro.php");
}
?>
<title>Project Eden</title>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="css/admin_style.css" type="text/css"/>
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/jquery-2.1.1.min.js"></script>

<?php
$tab = $_GET['switchTab'];
$panel = $_GET['switchPanel'];
$con = mysqli_connect('localhost', 'root', '', 'gogo');
session_start();
$user = $_SESSION['user'];
$result = $con->query("select role from accounts where acc_id=$user");
$row = mysqli_fetch_row($result);
if($row[0] != "admin"){
	header('Location: http://www.eden.com/news/news.php');
}
?>

<div id="admin_head">
    <div id="admin_logo">
        <img src="../images/icons/eden-footer.png"/>
    </div>
    <div id="admin_top">
        <ul id="Tabs">
            <li onclick="switchTab(0)" <?php if ($tab == 0) echo 'class="active"'; ?> ><a>Admin</a></li>
            <li onclick="switchTab(1)" <?php if ($tab == 1) echo 'class="active"'; ?> ><a>Music</a></li>
            <li onclick="switchTab(2)" <?php if ($tab == 2) echo 'class="active"'; ?> ><a>Movies</a></li>
            <li onclick="switchTab(3)" <?php if ($tab == 3) echo 'class="active"'; ?> ><a>Ebooks</a></li>
            <li onclick="switchTab(4)" <?php if ($tab == 4) echo 'class="active"'; ?> ><a>Tweet</a></li>
            <li onclick="switchTab(5)" <?php if ($tab == 5) echo 'class="active"'; ?> ><a>News</a></li>
            <li onclick="<?php echo 'logout(' . $user_id . ')'; ?>" style="float: right;"><a>Logout</a></li>
        </ul>
    </div>
</div>
<div id="admin_menu">
    <ul class="admin_tabs" id="first">
        <li onclick="switchPanel(0, 0)" <?php if ($tab == 0 && $panel == 0) echo 'class="panelActive"'; ?> ><a>Accounts</a></li>
        <li onclick="switchPanel(0, 1)" <?php if ($tab == 0 && $panel == 1) echo 'class="panelActive"'; ?> ><a>Track</a></li>
    </ul>
    <ul class="admin_tabs">
        <li onclick="switchPanel(1, 0)" <?php if ($tab == 1 && $panel == 0) echo 'class="panelActive"'; ?> ><a>Musics</a></li>
        <li onclick="switchPanel(1, 1)" <?php if ($tab == 1 && $panel == 1) echo 'class="panelActive"'; ?> ><a>Artists</a></li>
        <li onclick="switchPanel(1, 2)" <?php if ($tab == 1 && $panel == 2) echo 'class="panelActive"'; ?> ><a>Albums</a></li>
    </ul>
    <ul class="admin_tabs">
        <li onclick="switchPanel(2, 0)" <?php if ($tab == 2 && $panel == 0) echo 'class="panelActive"'; ?> ><a>Movies</a></li>
        <li onclick="switchPanel(2, 1)" <?php if ($tab == 2 && $panel == 1) echo 'class="panelActive"'; ?> ><a>Shorts</a></li>
    </ul>
    <ul class="admin_tabs">
        <li onclick="switchPanel(3, 0)" <?php if ($tab == 3 && $panel == 0) echo 'class="panelActive"'; ?> ><a>Books</a></li>
        <li onclick="switchPanel(3, 1)" <?php if ($tab == 3 && $panel == 1) echo 'class="panelActive"'; ?> ><a>Authors</a></li>
    </ul>
    <ul class="admin_tabs">
        <li onclick="switchPanel(4, 0)" <?php if ($tab == 4 && $panel == 0) echo 'class="panelActive"'; ?> ><a>Tweets</a></li>
    </ul>
    <ul class="admin_tabs">
        <li onclick="switchPanel(5, 0)" <?php if ($tab == 5 && $panel == 0) echo 'class="panelActive"'; ?> ><a>News</a></li>
        <li onclick="switchPanel(5, 1)" <?php if ($tab == 5 && $panel == 1) echo 'class="panelActive"'; ?> ><a>Comments</a></li>
    </ul>
</div>

<?php
echo '<script>showTab(' . $tab . ')</script>';
if ($tab == null && $panel == null) {
    echo '<script>document.getElementById("first").style.display = "block";</script>';
}
?>
<div id="admin_content">
    <div>
        <?php
        switch ($tab) {
            case 0:
                switch ($panel) {
                    case 0:
                        echo '<script>getAccountsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="accounts_search_input" onkeyup="getAccountsSearchResults()"/>';
                        echo '<select id="search_select" name="accounts_search_select">'
                        . '<option>acc_id</option>'
                        . '<option>firstname</option>'
                        . '<option>lastname</option>'
                        . '<option>username</option>'
                        . '<option>email</option>'
                        . '</select>';
                        echo '<div id="accounts_edit"></div>';
                        echo '<div id="accounts_search_results" class="search_results"></div>';
                        break;
                    case 1:
                        echo '<h2 style="color: red;">Under Development!</h2>';
                        break;
                }
                break;
            case 1:
                switch ($panel) {
                    case 0:
                        echo '<script>getMusicsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="musics_search_input" onkeyup="getMusicsSearchResults()"/>';
                        echo '<select id="search_select" name="musics_search_select">'
                        . '<option>music_id</option>'
                        . '<option>music_name</option>'
                        . '<option>music_artist_id</option>'
                        . '<option>genre</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Music" onclick="addAction(10)"/>';
                        echo '<div id="musics_edit"></div>';
                        echo '<div id="musics_search_results" class="search_results"></div>';
                        break;
                    case 1:
                        echo '<script>getArtistsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="artists_search_input" onkeyup="getArtistsSearchResults()"/>';
                        echo '<select id="search_select" name="artists_search_select">'
                        . '<option>artist_id</option>'
                        . '<option>artist_name</option>'
                        . '<option>genre</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Artist" onclick="addAction(11)"/>';
                        echo '<div id="artists_edit"></div>';
                        echo '<div id="artists_search_results" class="search_results"></div>';
                        break;
                    case 2:
                        echo '<script>getAlbumsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="albums_search_input" onkeyup="getAlbumsSearchResults()"/>';
                        echo '<select id="search_select" name="albums_search_select">'
                        . '<option>albums_id</option>'
                        . '<option>album_name</option>'
                        . '<option>album_artist_id</option>'
                        . '<option>genre</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Album" onclick="addAction(12)"/>';
                        echo '<div id="albums_edit"></div>';
                        echo '<div id="albums_search_results" class="search_results"></div>';
                        break;
                }
                break;
            case 2:
                switch ($panel) {
                    case 0:
                        echo '<script>getMoviesSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="movies_search_input" onkeyup="getMoviesSearchResults()"/>';
                        echo '<select id="search_select" name="movies_search_select">'
                        . '<option>movie_id</option>'
                        . '<option>movie_title</option>'
                        . '<option>movie_type</option>'
                        . '<option>movie_length</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Movie" onclick="addAction(20)"/>';
                        echo '<div id="movies_edit"></div>';
                        echo '<div id="movies_search_results" class="search_results"></div>';
                        break;
                    case 1:
                        echo '<script>getShortsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="shorts_search_input" onkeyup="getShortsSearchResults()"/>';
                        echo '<select id="search_select" name="shorts_search_select">'
                        . '<option>short_id</option>'
                        . '<option>short_title</option>'
                        . '<option>short_type</option>'
                        . '<option>short_length</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Short Movie" onclick="addAction(21)"/>';
                        echo '<div id="shorts_edit"></div>';
                        echo '<div id="shorts_search_results" class="search_results"></div>';
                        break;
                }
                break;
            case 3:
                switch ($panel) {
                    case 0:
                        echo '<script>getBooksSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="books_search_input" onkeyup="getBooksSearchResults()"/>';
                        echo '<select id="search_select" name="books_search_select">'
                        . '<option>b_id</option>'
                        . '<option>a_id</option>'
                        . '<option>type</option>'
                        . '<option>name</option>'
                        . '<option>page</option>'
                        . '<option>price</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Book" onclick="addAction(30)"/>';
                        echo '<div id="books_edit"></div>';
                        echo '<div id="books_search_results" class="search_results"></div>';
                        break;
                    case 1:
                        echo '<script>getAuthorsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="authors_search_input" onkeyup="getAuthorsSearchResults()"/>';
                        echo '<select id="search_select" name="authors_search_select">'
                        . '<option>a_id</option>'
                        . '<option>firstname</option>'
                        . '<option>lastname</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add Author" onclick="addAction(31)"/>';
                        echo '<div id="authors_edit"></div>';
                        echo '<div id="authors_search_results" class="search_results"></div>';
                        break;
                }
                break;
            case 4:
                switch ($panel) {
                    case 0:
                        echo '<script>getTweetsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="tweets_search_input" onkeyup="getTweetsSearchResults()"/>';
                        echo '<select id="search_select" name="tweets_search_select">'
                        . '<option>tweet_id</option>'
                        . '<option>user_id</option>'
                        . '<option>tweet</option>'
                        . '<option>tweetDate</option>'
                        . '<option>likeNo</option>'
                        . '<option>reply_Id</option>'
                        . '</select>';
                        echo '<div id="tweets_edit"></div>';
                        echo '<div id="tweets_search_results" class="search_results"></div>';
                        break;
                }
                break;
            case 5:
                switch ($panel) {
                    case 0:
                        echo '<script>getNewsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="news_search_input" onkeyup="getNewsSearchResults()"/>';
                        echo '<select id="search_select" name="news_search_select">'
                        . '<option>m_id</option>'
                        . '<option>type</option>'
                        . '<option>title</option>'
                        . '<option>time</option>'
                        . '<option>name</option>'
                        . '</select>';
                        echo '&nbsp;<input type="button" name="add" value="Add News" onclick="addAction(50)"/>';
                        echo '<div id="news_edit"></div>';
                        echo '<div id="news_search_results" class="search_results"></div>';
                        break;
                    case 1:
                        echo '<script>getCommentsSearchResults();</script>';
                        echo '<input type="text" placeholder="Search..." id="search_input" name="comments_search_input" onkeyup="getCommentsSearchResults()"/>';
                        echo '<select id="search_select" name="comments_search_select">'
                        . '<option>c_id</option>'
                        . '<option>m_id</option>'
                        . '<option>name</option>'
                        . '<option>comment</option>'
                        . '</select>';
                        echo '<div id="comments_edit"></div>';
                        echo '<div id="comments_search_results" class="search_results"></div>';
                        break;
                }
                break;
            default:
                echo $tab . $panel;
                break;
        }
        ?>
    </div>
</div>
