<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Cloud Storage</title>
        <link rel="stylesheet" href="css/global_style.css" type="text/css"/>
        <link rel="stylesheet" href="css/validator_style.css" type="text/css"/>
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
        <div id="topnav"> <!-- Shortcut links ends-->
            <div id="top-container">
                <ul id="left">
                    <li><a href="">GOGO</a></li>
                    <li><a href="">NEWS</a></li>
                    <li><a href="">E-MAIL</a></li>
                    <li><a href="">MOVIE</a></li>
                    <li><a href="">MUSIC</a></li>
                    <li><a href="">EBOOK</a></li>
                    <li id="active"><a id="sel" href="">CLOUD STORAGE</a></li>
                </ul>
                <ul id="right">
                    <li><a href="http://www.facebook.com"><img src="images/icons/facebook.png"/></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/icons/twitter.png"/></a></li>
                    <li><a href="http://www.gmail.com"><img src="images/icons/gmail.png"/></a></li>
                    <li><a href="http://www.yahoo.com"><img src="images/icons/yahoo.png"/></a></li>
                    <li><a href="http://www.linkedin.com"><img src="images/icons/linkedin.png"/></a></li>
                    <li><a href="http://www.youtube.com"><img src="images/icons/youtube.png"/></a></li>
                </ul>
            </div>
        </div> <!-- Shortcut links ends-->
        <div id="center">
            <div id="val_contain">
                <img src="images/cloud.png" id="cloud_logo"/>
                <div id="credent_login">
                    <div class="text_head"><a href=""><img src='images/icons/logo.png'/></a><br/>Your own Garden</div>
                    <form method="POST" action="classes/loginValidator.php">
                    <input type="text" name="username" placeholder="Username" class="text" id="log-user"/><br/>
                    <input type="password" name="password" placeholder="Password" class="text" id="log-pass"/><br/>
                    <input type="submit" value="Sign in" class="button" style="margin-right: 4px" />
                    <input type="button" value="Register" class="button" onclick="switchRegister()"/><br/>
                    </form>
                    <a href="" class="trouble">Trouble Signing in? Click Here!</a>
                </div>
                <div id="credent_regist">
                    <div class="text_head"><a href=""><img src="images/icons/logo.png"/></a><br/>Create Your Garden</div>
                    <form method="POST" action="classes/validator.php" enctype="multipart/form-data">
                        <input type="text" name="firstname" placeholder="Firstname" class="text" id="reg-first"/><br/>
                        <input type="text" name="lastname" placeholder="Lastname" class="text" id="reg-last"/><br/>
                        <input type="text" name="username" placeholder="Username" class="text" id="reg-user"/><br/>
                        <input type="password" name="password" placeholder="Password" class="text" id="reg-pass"/><br/>
                        <input type="password" name="retype" placeholder="Retype Password" class="text" id="reg-repass"/><br/>
                        <input type="email" name="email" placeholder="Email" class="text" id="reg-email"/><br/>
                        <input type="checkbox" id="reg-check" name="check" value="check"/> I have read and agree to the <a href="" class="trouble" style="margin-left: 0px">Terms of Use</a>
                        <div class="profile_upload">
                            <span>Profile Picture (Optional)</span><br/>
                            <img src="images/icons/unknown-person.png" /><br/>
                            <input type="file" required="1" name="file" />
                        </div>
                        <input type="submit" value="Register" class="button" style="margin-right: 4px"/>
                        <input type="button" value="Cancel" class="button" onclick="switchLogin()"/>
                    </form>
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
