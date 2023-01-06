<?php
	#Checking Logged in
	session_start();
	$user = $_SESSION['user'];
	if($user == null){
		header("Location: http://www.eden.com/login.php");
	}
	$con = mysql_connect("localhost", "root", "");
	mysql_select_db("gogo", $con);
	$me = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$user"));
echo "<div class=\"addHeader\" style=\"background-color: #96F;\"><center>People</center></div>
                            <center>
                            <table border=\"0\" width=\"100%\">";
$peo = $_GET['people'];
if($peo != "more"){
	$fol = mysql_query("select following_id from follow where user_id=$user");
	$arr = "select * from accounts where acc_id != $user";
	while($row = mysql_fetch_array($fol)){
		$arr = $arr . " AND acc_id != $row[0]";
	}
	$fol = mysql_query($arr);
	$arr = 0;
	while($row = mysql_fetch_array($fol)){
		if($arr<5){
		echo "<tr><td><img src='../images/userIcons/$row[6].png'></td>
				   <td><a href='index.php?user=$row[0]'>$row[1] $row[2]</a></td>
				   <td><form action='index.php'><input type='hidden' name='follow' value='$row[0]'/><input type='submit' value='F' class='f'/></form></td>
				  </tr>";
		}
		$arr++;
	}
} else {
	$fol = mysql_query("select * from accounts where acc_id != $me[0]");
	while($row = mysql_fetch_array($fol)){
		echo "<tr><td><img src='../images/userIcons/$row[6].png'></td>
				   <td><a href='index.php?user=$row[0]'>$row[1] $row[2]</a></td>";
		echo "<td><form action='index.php'>";
		$nuim = mysql_num_rows(mysql_query("select * from follow where user_id = $me[0] AND following_id = $row[0]"));
		if($nuim == 0){
			echo "<input type='hidden' name='follow' value='$row[0]'/><input type='submit' value='F' class='f'/>";
		} else {
			echo "<input type='hidden' name='unfollow' value='$row[0]'/><input type='submit' value='U' class='l'/>";
		}
		echo "</form></td></tr>";
		$arr++;
	}	
}
echo "<tr><td colspan='3'><center><span style='color: #03C; font-size: 18px; font-weight: bold'>.:";
if($peo == "more"){
	echo "<a href='javascript:void(0)' onclick='people(0)' style='color: #03C;'>Show less people</a>:.";
} else {
	echo "<a href='javascript:void(0)' onclick='people(1)' style='color: #03C;'>All $arr people</a>:.";
}
echo "</span></center></td></tr>";
echo "</table></center>";
?>
