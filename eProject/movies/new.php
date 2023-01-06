<!DOCTYPE html>
<html>
    <head>
        <title>Project Eden</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/global_style.css"/>
        <link rel="stylesheet" type="text/css" href="css/header.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
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
            <?php include './classes/header.php'; getHeader(); ?>
            <section id="new">
                
            </section>
            <footer id="main_footer">
                Copyright@ Project Eden by ACEP
            </footer>
        </div>
    </body>
</html>
