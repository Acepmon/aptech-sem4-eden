<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Cloud Storage</title>
        <link rel="stylesheet" href="css/global_style.css" type="text/css"/>
        <link rel="stylesheet" href="css/file_manager.css" type="text/css"/>
        <script src="js/login_script.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        $param = $_GET['ay5s'];
        $view = $_GET['fm_view'];
        $id = $_COOKIE['user'];
        $con = mysqli_connect('www.site.com', 'root', 'acep123', 'cloud');
        $result = mysqli_query($con, "select username from accounts where acc_id = '$id';");
        while ($row = mysqli_fetch_array($result)) {
            $user = $row[0];
        }
        ?>
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
        <div id="side" class="Side1" ></div>
        <div id="center" style="padding-top: 0px; padding-bottom: 0px;">
            <div id="file_manager">
                <div id="fm_menu">
                    <div id="fm_menu_left">
                        <img src='images/icons/appbar.people.png'/>
                        <h1><?php echo strtoupper($user); ?></h1><br/>
                        <a href=''>Options</a>
                        <a href='process.php?logout=false'>Logout</a>
                    </div>
                    <div id="fm_menu_center">
                        <a href=''><img src="images/icons/appbar.chevron.left.png" alt='Back'/></a>
                        <a href='' style="margin-left: 0px;"><img src="images/icons/appbar.chevron.right.png" alt='Next'/></a>

                        <a href='' style='float: right; margin-right: 1%;'><img src="images/icons/appbar.chevron.down.png" alt='Options'/></a>
                        <a href='process.php?fm_view=grid' style='margin-left: 0px; float: right;'><img src="images/icons/appbar.draw.pixel.grid.png" alt='Grid View'/></a>
                        <a href='process.php?fm_view=list' style='float: right;'><img src="images/icons/appbar.list.png" alt='List View'/></a>
                        <a href='' style='float: right'><img src="images/icons/appbar.delete.png" alt="Delete"/></a>

                        <form method='POST'>
                            <input type='text' name='search_value'/>
                        </form>
                        <a href='' style='margin-left: 0px;'><img src="images/icons/search-icon.png" alt='Search'/></a>

                    </div>
                    <div id="fm_menu_right">
                        <?php
                        if ($_COOKIE['screen'] == 'fscreen') {
                            print "<a href='process.php?screen=nscreen'>";
                            print "<b id='fscreen_on'>ON</b>";
                        } else if ($_COOKIE['screen'] == 'nscreen') {
                            print "<a href='process.php?screen=fscreen'>";
                            print "<b id='fscreen_off'>OFF</b>";
                        } else {
                            setcookie('screen', 'nscreen', time() + 60 * 60 * 24 * 3);
                            print "<a href='process.php?screen=fscreen'>";
                            print "<b id='fscreen_off'>OFF</b>";
                        }
                        ?>
                        <img src="images/icons/appbar.fullscreen.box.png"/>
                        <?php print "</a>"; ?>

                        <a href=''><img src="images/icons/appbar.upload.png" alt="Upload"/></a>
                        <a href=''><img src="images/icons/appbar.download.png" alt="Download"/></a>
                    </div>
                </div>
                <div id="fm_nav">
                    <ul>
                        <li class="hasSub"><span>Places</span>
                            <ul>
                                <li><a href=''><img src='images/icons/appbar.home.empty.png'/><span>Home</span></a></li>
                                <li><a href=''><img src='images/icons/appbar.page.bold.png'/><span>Documents</span></a></li>
                                <li><a href=''><img src='images/icons/appbar.camera.png'/><span>Pictures</span></a></li>
                                <li><a href=''><img src='images/icons/appbar.video.png'/><span>Videos</span></a></li>
                                <li><a href=''><img src='images/icons/appbar.music.png'/><span>Music</span></a></li>
                                <li><a href=''><img src='images/icons/appbar.folder.png'/><span>Projects</span></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li class="hasSub"><span>Shared Services</span>
                            <ul>
                                <li><a href=""><img src='images/icons/appbar.share.png'/><span>Server</span></a></li>
                                <li><a href=""><img src='images/icons/appbar.share.png'/><span>John Smith</span></a></li>
                                <li><a href=""><img src='images/icons/appbar.share.png'/><span>Guy Fawkes</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="fm_content">
                    <div class='fm_entity' id='folder_1' onclick='ASD(1)'>
                        <img src='images/fileManager_icons/Default Folder.png'/><br/>
                        <span>Documents</span>
                    </div>
                    <div class='fm_entity' id='folder_2' onclick='ASD(2)'>
                        <img src='images/fileManager_icons/Default Folder.png'/><br/>
                        <span>Pictures</span>
                    </div>
                    <div class='fm_entity' id='folder_3' onclick='ASD(3)'>
                        <img src='images/fileManager_icons/Default Folder.png'/><br/>
                        <span>Videos</span>
                    </div>
                    <div class='fm_entity' id='folder_4' onclick='ASD(4)'>
                        <img src='images/fileManager_icons/Default Folder.png'/><br/>
                        <span>Music</span>
                    </div>
                    <div class='fm_entity' id='folder_5' onclick='ASD(5)'>
                        <img src='images/fileManager_icons/Default Folder.png'/><br/>
                        <span>Projects</span>
                    </div>
                </div>
                <div id="fm_content_list">
                    <form>
                        <div id="fm_list_header">
                            <div class='list_check' style="margin-left: 0px;"><input type='checkbox'/> All</div>
                            <div class='list_name'>Name</div>
                            <div class='list_size'>Size</div>
                            <div class='list_type'>Type</div>
                        </div>
                        <?php
                        $result_file = mysqli_query($con, "select file_name, file_size, file_type from files where acc_id = '$id';");
                        while ($a = mysqli_fetch_array($result_file)) {

                            $file_name = $a[0];
                            $file_size = $a[1];
                            $file_type = $a[2];
                            
                            if ($file_type == 'folder') {
                                $file_icon = 'Default Folder.png';
                            }
                            
                            print "<div id='fm_list_entity'>";
                            print "<div class='list_check'><input type='checkbox'/></div>";
                            print "<div class='list_name' style='cursor: pointer'><img src='images/fileManager_icons/$file_icon' align='center'/>&nbsp;$file_name</div>";
                            print "<div class='list_size'>$file_size</div>";
                            print "<div class='list_type'>$file_type</div></div>";
                        }
                        ?>
                    </form>
                </div>
                        <?php
                        if ($_COOKIE['fm_view'] == 'grid') {
                            print "<script>document.getElementById('fm_content_list').style.display = 'none';</script>";
                            print "<script>document.getElementById('fm_content').style.display = 'block';</script>";
                        }
                        if ($_COOKIE['fm_view'] == 'list') {
                            print "<script>document.getElementById('fm_content').style.display = 'none';</script>";
                            print "<script>document.getElementById('fm_content_list').style.display = 'block';</script>";
                        }
                        ?>
            </div>
        </div>
        <div id="bottom">
            <a href="">Pricing</a>
            <a href="">Business</a>
            <a href="">Privacy & Terms</a>
            <a href="">Help</a>
        </div>
        <div id="side" class="Side2"></div>
<?php
if ($_COOKIE['screen'] == 'fscreen') {
    print "<script>Fm_fullscreen(1);</script>";
} else if ($_COOKIE['screen'] == 'nscreen') {
    print "<script>Fm_fullscreen(0);</script>";
}
?>
    </body>
</html>
