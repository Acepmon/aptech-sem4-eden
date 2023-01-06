<!DOCTYPE html>
<html>
    <head>
        <title>Eden</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/global_style.css"/>
        <link rel="stylesheet" type="text/css" href="css/header.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
        <link rel="stylesheet" type="text/css" href="css/watch.css"/>
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
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
            <?php include './classes/header.php'; getHeader(); ?><section id="watch">
                <?php
                $mov_id = $_GET['m'];
                $con = mysqli_connect('localhost', 'root', '', 'gogo');
                mysqli_set_charset($con, 'utf8');
                if ($_GET['cat'] == 'movie') {
                    $result = mysqli_query($con, 'select * from movies where movie_id = "' . $mov_id . '"');
                    $mov_title = 'Undefined';
                    $mov_type = 'Undefined';
                    $mov_desc = 'Undefined';
                    $mov_loc = 'Undefined';
                    $mov_poster = 'Undefined';
                    while ($row = mysqli_fetch_array($result)) {
                        $mov_title = $row['movie_title'];
                        $mov_type = $row['movie_type'];
                        $mov_desc = $row['movie_desc'];
                        $mov_loc = $row['movie_loc'];
                        $mov_poster = $row['movie_poster'];
                    }
                    echo '<section id="media">';
                    echo '<video src="' . $mov_loc . '" poster="../images/' . $mov_poster . '" controls></video>';
                    echo '</section>';
                    echo '<aside id="desc">';
                    echo '<div id="mov-title">' . $mov_title . '</div>';
                    echo '<div id="mov-type"><a href="list.php?cat=movie&genre=' . $mov_type . '">' . $mov_type . '</a></div>';
                    echo '<div id="mov-trailer"><a href="watch.php?cat=trailer&m='.$mov_id.'">Watch Trailer</a></div>';
                    echo '<div id="mov-desc"><p>' . $mov_desc . '</p></div>';
                    echo '<div></div>';
                    echo '</aside>';
                } else if ($_GET['cat'] == 'short') {
                    $result = mysqli_query($con, 'select * from shorts where short_id = "' . $mov_id . '"');
                    $mov_title = 'Undefined';
                    $mov_type = 'Undefined';
                    $mov_desc = 'Undefined';
                    $mov_loc = 'Undefined';
                    $mov_poster = 'Undefined';
                    while ($row = mysqli_fetch_array($result)) {
                        $mov_title = $row['short_title'];
                        $mov_type = $row['short_type'];
                        $mov_loc = $row['short_loc'];
                        $mov_poster = $row['short_poster'];
                    }
                    echo '<section id="media">';
                    echo '<video src="' . $mov_loc . '" poster="../images/' . $mov_poster . '" controls></video>';
                    echo '</section>';
                    echo '<aside id="desc">';
                    echo '<div id="mov-title">' . $mov_title . '</div>';
                    echo '<div id="mov-type"><a href="list.php?cat=short&genre=' . $mov_type . '">' . $mov_type . '</a></div>';
                    echo '<div></div>';
                    echo '</aside>';
                } else if ($_GET['cat'] == 'trailer') {
                    $result = mysqli_query($con, 'select * from movies where movie_id = "' . $mov_id . '"');
                    $mov_title = 'Undefined';
                    $mov_type = 'Undefined';
                    $mov_desc = 'Undefined';
                    $mov_loc = 'Undefined';
                    $mov_poster = 'Undefined';
                    while ($row = mysqli_fetch_array($result)) {
                        $mov_title = $row['movie_title'];
                        $mov_type = $row['movie_type'];
                        $mov_desc = $row['movie_desc'];
                        $mov_loc = $row['movie_trailer'];
                        $mov_poster = $row['movie_poster'];
                    }
                    echo '<section id="media">';
                    echo '<video src="' . $mov_loc . '" poster="../images/' . $mov_poster . '" controls></video>';
                    echo '</section>';
                    echo '<aside id="desc">';
                    echo '<div id="mov-title">' . $mov_title . ' (Trailer)</div>';
                    echo '<div id="mov-type"><a href="list.php?cat=movie&genre=' . $mov_type . '">' . $mov_type . '</a></div>';
                    echo '<div id="mov-trailer"><a href="watch.php?cat=movie&m='.$mov_id.'">Watch Movie</a></div>';
                    echo '<div id="mov-desc"><p>' . $mov_desc . '</p></div>';
                    echo '<div></div>';
                    echo '</aside>';
                }
                ?>
                <section id="related">
                    <header>
                        <?php  
                            if ($_GET['cat'] == 'movie') {
                                echo $mov_type . ' movies';
                            } else if ($_GET['cat'] == 'short') {
                                echo $mov_type . ' shorts';
                            }
                        ?>
                    </header>
                    <section>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'gogo');
                        if ($_GET['cat'] == 'movie') {
                            $result = mysqli_query($con, 'select * from movies where movie_type = "' . $mov_type . '" && movie_id <> "' . $mov_id . '" order by movie_id desc limit 5');
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<article>'
                                . '<a href="watch.php?cat=movie&m=' . $row['movie_id'] . '"><img src="../images/' . $row['movie_poster'] . '"/></a>'
                                . '</article>';
                            }
                        } else if ($_GET['cat'] == 'short') {
                            $result = mysqli_query($con, 'select * from shorts where short_type = "' . $mov_type . '" && short_id <> "' . $mov_id . '" order by short_id desc limit 5');
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<article id="short_article">'
                                . '<a href="watch.php?cat=short&m=' . $row['short_id'] . '"><img src="../images/' . $row['short_poster'] . '"/></a>'
                                . '</article>';
                            }
                        }
                        ?>
                    </section>
                    <div></div>
                </section>
            </section>
            <footer id="main_footer">
                Copyright@ Project Eden by ACEP
            </footer>
        </div>
    </body>
</html>
