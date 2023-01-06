<?php
session_start();
if($_GET['logout'] == "true"){session_destroy(); header("Location: http://www.eden.com/intro.php");}
$user = $_SESSION['user'];
if($user != null){header("Location: http://www.eden.com/news/news.php");};
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>EDEN Intro</title>
        <link rel="stylesheet" href="style/global_style.css" type="text/css"/>
        <link rel="stylesheet" href="style/validator_style.css" type="text/css"/>
        <link rel="stylesheet" href="style/index.css" type="text/css"/>
        <script src="js/jquery-2.1.1.min.js"></script>
        <script>
            function switchLogin() {
                $("#credent_login").show();
                $("#credent_regist").hide();
            }
            function switchRegister() {
                $("#credent_login").hide();
                $("#credent_regist").show();
            }
        </script>
    </head>
    <body>
        <div id="big_wrapper">
            <section id="main_links">
                <a href="http://www.eden.com/admin/index.php"><div class="link">
                        <img src="images/icons/main-admin.png"/>
                        <div class="deactive">Adminstrator</div>
                    </div></a>
                <a href="http://www.eden.com/news/news.php"><div class="link">
                        <img src="images/icons/main-news.png"/><br/>
                        <div>News</div>
                    </div></a>
                <a href="http://www.eden.com/books/book.php"><div class="link">
                        <img src="images/icons/main-ebook.png"/><br/>
                        <div>E-Book</div>
                    </div></a>
                <a href="http://www.eden.com/musics/music-Index.php"><div class="link">
                        <img src="images/icons/main-music.png"/><br/>
                        <div>Music</div>
                    </div></a>
                <a href="http://www.eden.com/movies/index.php"><div class="link">
                        <img src="images/icons/main-movie.png"/><br/>
                        <div>Movie</div>
                    </div></a>
                <a href="http://www.eden.com/mail/index.php"><div class="link">
                        <img src="images/icons/main-tweet.png"/><br/>
                        <div class="deactive">Tweet</div>
                    </div></a>
                <div style="clear: both"/>
            </section>
            <div id="center">
                <div id="val_contain">
                    <img src="images/cloud.png" id="cloud_logo"/>
                    <div id="credent_login">
                        <div class="text_head"><a href=""><img src='images/icons/eden.png'/></a><br/>Your own Garden</div>
                        <form method="POST" action="classes/loginValidator.php">
                            <input type="text" name="username" placeholder="Username" class="text" id="log-user"/><br/>
                            <input type="password" name="password" placeholder="Password" class="text" id="log-pass"/><br/>
                            <input type="submit" value="Sign in" class="button" style="margin-right: 4px" />
                            <input type="button" value="Register" class="button" onclick="switchRegister()"/><br/>
                        </form>
                        <a href="" class="trouble">Trouble Signing in? Click Here!</a>
                    </div>
                    <div id="credent_regist">
                        <div class="text_head"><a href=""><img src="images/icons/eden.png"/></a><br/>Create Your Garden</div>
                        <form method="POST" action="classes/validator.php" enctype="multipart/form-data">
                            <input type="text" name="firstname" placeholder="Firstname" class="text" id="reg-first"/><br/>
                            <input type="text" name="lastname" placeholder="Lastname" class="text" id="reg-last"/><br/>
                            <input type="text" name="username" placeholder="Username" class="text" id="reg-user"/><br/>
                            <input type="password" name="password" placeholder="Password" class="text" id="reg-pass"/><br/>
                            <input type="password" name="retype" placeholder="Retype Password" class="text" id="reg-repass"/><br/>
                            <input type="email" name="email" placeholder="Email" class="text" id="reg-email"/><br/>
			    <input type="text" name="address" class="text" id="reg-address" placeholder="Address"/>
			    <input type="text" name="birthdate" class="text" id="reg-birthdate" placeholder="Birthdate"/>
			    <input type="text" name="intro" class="text" id="reg-intro" placeholder="Intro description"/><br/>
                            <input type="checkbox" style="margin-top: 10px; margin-bottom: 10px;" id="reg-check" name="check" value="check"/> I have read and agree to the <a href="" class="trouble" style="margin-left: 0px">Terms of Use</a>
                            <input type="file" required="1" name="file" class="file"/>
                            <input type="submit" value="Register" class="button" style="margin-right: 4px"/>
                            <input type="button" value="Cancel" class="button" onclick="switchLogin()"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom">
            <a href="">Pricing</a>
            <a href="">Business</a>
            <a href="">Privacy & Terms</a>
            <a href="">Help</a>
        </div>
    </body>
</html>
