<?php

function getHeader() {
print '
<header id="main_header">
    <div id="logo">
        <a href="index.php">
        <img src="../images/icons/eden.png"/>
        </a>
    </div>
    <div id="search">
        <form method="GET" action="result.php">
            <input type="text" name="keyword" placeholder="Search..." onkeyup="guess(this.value)" autocomplete="off"/>
            <input type="submit" value=" "/>
            <div id="search_guess">
            </div>
        </form>
    </div>';
		session_start();
		$logout = $_GET['logout'];
		if($logout != null){session_destroy();}
		$connection = mysql_connect("localhost","root", "");
		mysql_set_charset('utf8',$connection);
		$database = mysql_select_db("gogo");
		session_start();
		$user = $_SESSION['user'];
		if($user != null){
			$me = mysql_fetch_array(mysql_query("SELECT * FROM accounts WHERE acc_id=$user"));
		echo "<div id=\"profile\">
			    <div id=\"loggedin\">
			        <div class=\"profile_column\"><img src=\"../images/userIcons/$me[6].png\"/></div>
			        <div class=\"profile_column\">
			            <h1> " . $me[2][0] . ".$me[1]</h1>
				    <a href='../classes/logout.php'>Logout</a>
			        </div>
			    </div>
			</div>";
		}
print '<section>
        <nav id="menu">
        <ul>
            <li><a href="list.php?cat=movie&genre=all">Movies</a></li>
            <li><a href="list.php?cat=short&genre=all">Shorts</a></li>
        </ul>
        </nav>
    </section>
</header>';
} 
