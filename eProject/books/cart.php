<html>
<?php
header('Content-type: text/html; charset=utf-8');
	#Connecting to MySQL zooooooom. >~<
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("gogo", $con);
	mysql_query("set charset utf8");

		session_start();
		$connection = mysql_connect("localhost","root", "");
		mysql_set_charset('utf8',$connection);
		$database = mysql_select_db("gogo");

$user = $_SESSION['user'];
$adding = $_GET['add'];
$rem = $_GET['remove'];
$remall = $_POST['removeAll'];
$rema = $_GET['rema'];
if($adding != null){
	$query = mysql_query("insert into cart values($user, $adding, 1)");
	if($query){
		header("Location: cart.php");
	}
} else if($rem != null){
	$query = mysql_query("delete from cart where acc_id = $user AND b_id = $rem");
	if($query){
		header("Location: cart.php");
	}
} else if($remall != null){
	$qua = $_POST['qua'];
	$qua = explode("-", $qua);
	$all = mysql_query("select * from cart where acc_id = $user");
	$j = 0;
	while($row = mysql_fetch_array($all)){
		$test = mysql_fetch_array(mysql_query("select quantity, price, name from books where b_id = $row[1]"));
		if(($test[0] - $qua[$j]) < 0){
			echo "<script>alert('$test[2] ном одоо $test[0] ширхэг л байна.')</script>";
			break;
		}
		$test = $test[0] - $qua[$j];
		$update = mysql_query("update books set quantity=$test where b_id=$row[1]");
		$insert = mysql_query("insert into inbox values(0, $user, $row[1], $qua[$j], " . ($test[1]*$qua[$j]) . ")");
		$j++;
	}
	$query = mysql_query("delete from cart where acc_id = $user");
	if($query){
		#header("Location: cart.php");
	}
}
?>
<head>
<title>EDEN Ном</title>
<link href="../style/bookCssHeader.css" type="text/css" rel="stylesheet"/>
<link href="../style/bookCart.css" type="text/css" rel="stylesheet"/>
<link href="../style/profile.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	function changePrice(id, price){
		var vari = document.getElementById("qua" + id).value;
		if(vari == 0){
			vari = 1;
			document.getElementById("qua" + id).value = vari;
		}
		document.getElementById("price" + id).innerHTML = vari * price.substring(0, price.length - 1) + "₮";
		setTotal();
	}
	function setOne(){
		var nos = document.getElementById('theTable').getElementsByTagName('tr').length;
		for(i = 0; i < (nos - 3) / 2; i++) {
			document.getElementById("qua" + i).value = 1;
		}
		setTotal();
	}
	function setTotal(){
		var total = 0;
		var i;
		var qua = "";
		var nos = document.getElementById('theTable').getElementsByTagName('tr').length;
		for(i = 0; i < (nos - 3) / 2; i++) {
			var lip = document.getElementById("price" + i).innerHTML;
			lip = lip.substring(0, lip.length - 1);
			qua += document.getElementById("qua" + i).value + "-";
			document.getElementById("qua").value = qua;
			total += parseInt(lip);
		}
		document.getElementById("total").innerHTML = "Total: " + total + "₮";
	}
</script>
<script>
function guess(word) {
    var value = word;
    if (value === '') {
        $('#search_guess').hide();
    } else {
        $('#search_guess').show();
        $.post("../classes/bookSearch.php", {input: value}, function(data) {
            $("#search_guess").html(data);
        });
    }
}
</script>
</head>
<body onload="setOne()">
<div class="head">
 <div class=header">
   <div class="top-nav"> <!-- Shortcut links ends-->
 		<div class="top-container">
  		 <ul class="left">
		    	<li><a href="">EDEN</a></li>
			<li><a href="http://www.eden.com/news/news.php">МЭДЭЭ</a></li>
			<li><a href="http://www.eden.com/mail/index.php">Э-ШУУДАН</a></li>
			<li><a href="http://www.eden.com/movies/index.php">КИНО</a></li>
			<li><a href="http://www.eden.com/musics/music-Index.php">ХӨГЖИМ</a></li>
			<li class="active"><a class="sel" href="javascript:void(0)">Э-НОМ</a></li>
		 </ul>
		 <ul class="right">
			<li><a href="http://www.facebook.com"><img src="../images/icons/facebook.png"/></a></li>
			<li><a href="http://www.twitter.com"><img src="../images/icons/twitter.png"/></a></li>
			<li><a href="http://www.gmail.com"><img src="../images/icons/gmail.png"/></a></li>
			<li><a href="http://www.yahoo.com"><img src="../images/icons/yahoo.png"/></a></li>
			<li><a href="http://www.linkedin.com"><img src="../images/icons/linkedin.png"/></a></li>
			<li><a href="http://www.youtube.com"><img src="../images/icons/youtube.png"/></a></li>
		 </ul>
  	</div>
 	</div> <!-- Shortcut links ends-->

	<div class="head"> <!-- logo search Interface-->
  <div class="head-container">
   <div class="logo">
    <a href="http://www.eden.com/books/book.php"><img src="../images/icons/eden.png"></a>
   </div>
   <form action="/" method="GET">
    <select class='styled-select'>
     <option>Бүгдээс</option>
     <option>Мэдээ</option>
     <option>Шуудан</option>
     <option>Кино</option>
     <option>Хөгжим</option>
     <option>Ном</option>
    </select>
    <input type="text" name="search" placeholder=" Хайх..." onkeyup="guess(this.value)" autocomplete="off"/>
    <input type="submit" value='' />
    <div id="search_guess"></div>
   </form>
		<?php
		$logout = $_GET['logout'];
		if($logout != null){session_destroy();}
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
				<div style='clear: both;'></div>
			    </div>
			</div>";
		} else {
			header("Location: http://www.gogo.com/intro.php");
		}
		?>   
  </div>
 </div> <!-- logo search Interface ends-->
 </div>
  <div class="body"><hr>
    <div class="bodyHeader">
      <ul>
        <li><a href="book.php?type=Боловсрол">Боловсрол</a></li>
        <li><a href="book.php?type=Бизнес">Бизнес</a></li>
        <li><a href="book.php?type=Философи">Философи</a></li>
        <li><a href="book.php?type=Эдийн засаг">Эдийн засаг</a></li>
        <li><a href="book.php?type=Шинжлэх ухаан">Шинжлэх ухаан</a></li>
        <li><a href="book.php?type=Урлаг, Спорт">Урлаг, Cпорт</a></li>
        <li><a href="book.php?type=Уран зохиол">Уран зохиол</a></li>
        <li><a href="book.php?type=Хүүхэд">Хүүхэд</a></li>
      </ul>
      <div class="theLine">&nbsp;</div>
    </div>
<?php
echo "<table id='theTable'>";
echo "<tr>";
	echo "<td colspan='2'>Product Details</td>";
	echo "<td width='200px'>Quantity</td>";
	echo "<td width='100px;'>Price</td>";
echo "</tr>";
echo "<tr><td colspan='4' class='hor'></td></tr>";

#Care Bears
$cart = mysql_query("select * from cart where acc_id = $user");
$no = 0;
while($row = mysql_fetch_array($cart)){
if($row[0] != null){
	$product = mysql_fetch_array(mysql_query("SELECT * FROM books WHERE b_id=$row[1]"));
	$author = mysql_fetch_array(mysql_query("SELECT * FROM author WHERE A_ID=$product[1]"));
	echo "<tr class='tr'>";
	echo "<td width='100px;'><a href='abook.php?book=$product[0]'><img src=\"../images/books/$product[5]\" style='width: 76px; height: 114px;'/></a></td><td>";
	echo "<span class='blue'>$product[3]</span><br>";
	echo "Зохиогч: $author[1] $author[2]<br><br>";
	echo "Хуудас: $product[6]<br><br>";
	echo "Ангилал: $product[2]";
	echo "</td>";
	echo "<td><input type='text' id='qua$no' value='$row[2]' onchange=\"changePrice($no, '$product[7]')\"><br><a href='cart.php?remove=$product[0]' style='color: #00aeef;'>Remove</a></td>";
	echo "<td><span id='price$no'>$product[7]</span></td>";
	echo "</tr>";
	echo "<tr><td colspan='4' class='hor'></td></tr>";
	$no++;
}
}
if($no == 0){
	echo "<tr><td colspan='4'><center>No more books</center></td></tr>";
}
echo "<tr><td colspan='4' style='text-align: right'>";
echo "<form action='' method=post><span id='total'>TOTAL: 0₮</span><input type='hidden' name='removeAll' value='yes'/><input type='hidden' name='qua' id='qua'/><input type='submit' value='Get Now'/></form>";
echo "</td></tr>";

echo "</table>";
if($rema != null){
	echo "<center>You will get your books soon! Wait in your house.</center>";
}
?>
</div>
<div class='footer'> <!-- Footer -->
 <div class='content'>
  
  <img src='../images/icons/eden-footer.png' alt="website name" />
  
  <ul>
   <li>Website Name</li>
   <li>@Copyright</li>
   <li>Address</li>
   <li>Contact information</li>
  </ul>
  
  <ul>
   <li>Social Network</li>
   <li><a href=''>Facebook</a></li>
   <li><a href=''>Twitter</a></li>
   <li><a href=''>Yahoo</a></li>
   <li><a href=''>Gmail</a></li>
   <li><a href=''>Youtube</a></li>
  </ul>
  
 </div>
</div> <!-- Footer ends -->

</body>
</html>
