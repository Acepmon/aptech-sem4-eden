<!DOCTYPE html>
<html>
    <head>
        <title>Project Eden</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/global_style.css"/>
        <link rel="stylesheet" type="text/css" href="css/header.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
        <link rel="stylesheet" type="text/css" href="css/list.css"/>
	<link rel="stylesheet" type="text/css" href="css/popup.css"/>
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <?php include 'classes/data.php'; ?>
        <div id="topnav"> <!-- Shortcut links ends-->
            <div id="top-container">
                <ul id="left">
	    	<li><a href="http://www.eden.com">EDEN</a></li>
		<li class="active"><a class="sel" href="http://www.eden.com/news/news.php">МЭДЭЭ</a></li>
		<li><a href="http://www.eden.com/mail/index.php">Э-ШУУДАН</a></li>
                <li id="active"><a href="http://www.eden.com/movies/index.php" id="sel">MOVIES</a></li>
		<li><a href="http://www.eden.com/musics/music-Index.php">ХӨГЖИМ</a></li>
		<li><a href="http://www.eden.com/books/book.php">Э-НОМ</a></li>
                </ul>
                <ul id="right">
                    <li><a href="http://www.facebook.com"><img src="../images/icons/facebook.png"/></a></li>
                    <li><a href="http://www.twitter.com"><img src="../images/icons/twitter.png"/></a></li>
                    <li><a href="http://www.gmail.com"><img src="../images/icons/gmail.png"/></a></li>
                    <li><a href="http://www.yahoo.com"><img src="../images/icons/yahoo.png"/></a></li>
                    <li><a href="http://www.linkedin.com"><img src="../images/icons/linkedin.png"/></a></li>
                    <li><a href="http://www.youtube.com"><img src="../images/icons/youtube.png"/></a></li>
                </ul>
            </div>
        </div> <!-- Shortcut links ends-->
        <div id="big_wrapper">
            <?php include './classes/header.php'; getHeader(); ?><aside id="categories">
                <header>Categories</header>
                <nav>
                    <ul>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'gogo');
                        if ($_GET['cat'] == 'movie') {
                            for ($loop = 0; $loop < count($movieGenre); $loop++) {
                                $result = mysqli_query($con, 'select count(movie_id) from movies where movie_type = "' . $movieGenre[$loop] . '";');
                                $row = mysqli_fetch_array($result);
                                echo '<li>'
                                . '<a href="?cat=movie&genre=' . $movieGenre[$loop] . '">' . $movieGenre[$loop] . '</a>'
                                . '<span>' . $row[0] . '</span>'
                                . '</li>';
                            }
                        } else if ($_GET['cat'] == 'short') {
                            for ($loop = 0; $loop < count($movieGenre); $loop++) {
                                $result = mysqli_query($con, 'select count(short_id) from shorts where short_type = "' . $movieGenre[$loop] . '";');
                                $row = mysqli_fetch_array($result);
                                echo '<li>'
                                . '<a href="?cat=short&genre=' . $movieGenre[$loop] . '">' . $movieGenre[$loop] . '</a>'
                                . '<span>' . $row[0] . '</span>'
                                . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </aside>
            <section id="list">
                <?php
                $genre = $_GET['genre'];
                if ($genre != 'all') {
                    if ($_GET['cat'] == 'movie') {
                        echo '<header>' . $genre . '<a href="list.php?cat=movie&genre=all">All</a></header>';
                    } else if ($_GET['cat'] == 'short') {
                        echo '<header>' . $genre . '<a href="list.php?cat=short&genre=all">All</a></header>';
                    }
                } else {
                    echo '<header>All</header>';
                }
                ?>
                <section>
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'gogo');
                    if ($genre != 'all') {
                        if ($_GET['cat'] == 'movie') {
                            $bool = false;
                            $result = mysqli_query($con, 'select * from movies where movie_type = "' . $genre . '" order by movie_id desc');
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<article>';
                                echo '<div class="item_poster"><a href="watch.php?cat=movie&m=' . $row["movie_id"] . '"><img src="../images/' . $row["movie_poster"] . '" /></a></div>';
                                echo '<div class="item_title"><a href="watch.php?cat=movie&m=' . $row["movie_id"] . '">' . $row["movie_title"] . '</a></div>';
                                echo '<div class="item_length"><span>Length: ' . $row["movie_length"] . '</span></div>';
                                echo '<div class="item_trailer"><a href="javascript:void(0)" onclick="lightbox('.$row["movie_id"].', 1)">Watch Trailer</a></div>';
                                echo '</article>';
                                $bool = true;
                            }
                            if (!$bool) {
                                echo '<h1>No Result</h1>';
                            }
                        } else if ($_GET['cat'] == 'short') {
                            $bool = false;
                            $result = mysqli_query($con, 'select * from shorts where short_type = "' . $genre . '" order by short_id desc');
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<article id="short_article">';
                                echo '<div class="item_poster" id="short_poster"><a href="watch.php?cat=short&m=' . $row["short_id"] . '"><img src="../images/' . $row["short_poster"] . '" /></a></div>';
                                echo '<div class="item_title"><a href="watch.php?cat=short&m=' . $row["short_id"] . '">' . $row["short_title"] . '</a></div>';
                                echo '<div class="item_length"><span>Length: ' . $row["short_length"] . '</span></div>';
                                echo '</article>';
                                $bool = true;
                            }
                            if (!$bool) {
                                echo '<h1>No Result</h1>';
                            }
                        }
                    } else {
                        if ($_GET['cat'] == 'movie') {
                            $result = mysqli_query($con, 'select * from movies order by movie_id desc');
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<article>';
                                echo '<div class="item_poster"><a href="watch.php?cat=movie&m=' . $row["movie_id"] . '"><img src="../images/' . $row["movie_poster"] . '" /></a></div>';
                                echo '<div class="item_title"><a href="watch.php?cat=movie&m=' . $row["movie_id"] . '">' . $row["movie_title"] . '</a></div>';
                                echo '<div class="item_length"><span>Length: ' . $row["movie_length"] . '</span></div>';
                                echo '<div class="item_trailer"><a href="javascript:void(0)" onclick="lightbox('.$row["movie_id"].', 1)">Watch Trailer</a></div>';
                                echo '</article>';
                            }
                        } else if ($_GET['cat'] == 'short') {
                            $result = mysqli_query($con, 'select * from shorts order by short_id desc');
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<article id="short_article">';
                                echo '<div class="item_poster" id="short_poster"><a href="watch.php?cat=short&m=' . $row["short_id"] . '"><img src="../images/' . $row["short_poster"] . '" /></a></div>';
                                echo '<div class="item_title"><a href="watch.php?cat=short&m=' . $row["short_id"] . '">' . $row["short_title"] . '</a></div>';
                                echo '<div class="item_length"><span>Length: ' . $row["short_length"] . '</span></div>';
                                echo '</article>';
                            }
                        }
                    }
                    ?>
                    <div />
                </section>
            </section>
            <footer id="main_footer">
                Copyright@ Project Eden by ACEP
            </footer>
        </div>
	<div id="fade" class="black_overlay"></div>
        <div id="light" class="white_content"></div>
    </body>
</html>
