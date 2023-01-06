<html>
<head>
<?php header("Content-type: text/html; charset=utf-8");?>
	<title>Music</title>
	<link href="../style/musicSheet.css" type="text/css" rel="stylesheet">
	<link href="../style/musicHead.css" type="text/css" rel="stylesheet">
	<link href="../style/profile.css" type="text/css" rel="stylesheet"/>
	<script src="../js/jquery-1.5.2.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
			var cw = $('.squa').width();
			$('.squa').css({
					'height': cw + 'px'
			});
		});

		function recp(id, show) {
			var xmlhttp;
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.open("GET", "head.php", true);
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("Header").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.send(null);
			$('#Leftior').load('music-Left.php?info=' + id + '&show=' + show);
		}
function guess(word) {
    var value = word;
    if (value === '') {
        $('#search_guess').hide();
    } else {
        $('#search_guess').show();
        $.post("../classes/test.php", {input: value}, function(data) {
            $("#search_guess").html(data);
        });
    }
}
	</script>
</head>
<?php
	#GOMARK
	session_start();
	$goi = $_GET['goinfo'];
	$gos = $_GET['goshow'];
	if($goi != null && $gos != null){
		$_SESSION['ano'] = $goi;
		$_SESSION['show'] = $gos;
	}
?>
<body onload="recp()">
<?php
		session_start();
		$logout = $_GET['logout'];
		if($logout != null){session_destroy();}
	$user = $_COOKIE['user'];
	if($user == null){
		#header("Location: register.php");
	}
	#Header Testing
	session_start();
	$show = $_GET['show'];
	$genre = $_GET['genre'];
	$order = $_GET['order'];
	if($show == null){if($_SESSION['show'] == null){$show = "albums";}else{$show = $_SESSION['show'];}}
	$_SESSION['show'] = $show;
	if($genre == null){if($_SESSION['genre'] == null){$genre = "All";}else{$genre = $_SESSION['genre'];}}
	$_SESSION['genre'] = $genre;
	if($show == "albums"){$show1 = " style=\"text-decoration: underline;\"";}
	if($show == "artist"){$show2 = " style=\"text-decoration: underline;\"";}
	if($genre == "RB"){$genre = "R&B";}
	#Connecting to MySQL zooooooom. >~<
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("gogo", $con);
	mysql_query("set charset utf8");
	if($genre == "All"){
		$que = mysql_query("select * from $show");
	} else {
		$que = mysql_query("select * from $show where genre='$genre'");
	}
?>
<div id="Header" style="position: fixed; z-index: 1; width: 100%; margin: 0px;">&nbsp;
</div>
<div id="bigBody">
	<div id="Leftior"></div>
	<div id="Rightior">
		<div class="sorter">
			&nbsp;
			<a href="music-Index.php?show=albums" <?php echo $show1;?>>Albums</a> | <a href="music-Index.php?show=artist"<?php echo $show2;?>>Artist</a><!-- | <a href="index.php?show=musics">Song</a>
			<table border="1">
				<tr>
					<td <?php echo $order1; ?>><a href="index.php?order=last">Last</a></td>
					<td <?php echo $order2; ?>><a href="index.php?order=top">Top</a></td>
				</tr>
			</table> -->&nbsp;
			<div class="genres"><?php echo "$genre&nbsp;&nbsp;";?>
				<ul>
					<li><a href="music-Index.php?genre=All">All</a></li>
					<li><a href="music-Index.php?genre=Alternative">Alternative</a></li>
					<li><a href="music-Index.php?genre=Dubstep">Dubstep</a></li>
					<li><a href="music-Index.php?genre=Electro">Electro</a></li>
					<li><a href="music-Index.php?genre=House">House</a></li>
					<li><a href="music-Index.php?genre=Hip Hop">HipHop</a></li>
					<li><a href="music-Index.php?genre=Metal">Metal</a></li>
					<li><a href="music-Index.php?genre=Pop">Pop</a></li>
					<li><a href="music-Index.php?genre=RB">R&B</a></li>
					<li><a href="music-Index.php?genre=Rock">Rock</a></li>
				</ul>
			</div> 
		</div>
		<div class="squares">
			<?php
				while($hone = mysql_fetch_array($que)){
					echo "<div class=\"squa\" style=\"background-image: url('../images/$show/$hone[0].jpg');\">";
					echo "	<div class=\"gray\"><br><br><br>";
					echo "<a href='javascript:void(0)' onClick=\"recp($hone[0], '$show')\"><img src=\"../images/icons/play.png\"/></a>";
					echo "</div></div>";
				}
			?>
		</div>
	</div>
</div>
</body>
</html>
