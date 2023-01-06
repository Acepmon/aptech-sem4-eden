<html>
	<head>
		<title>EDEN Tweet Settings</title>
		<link href="../style/sheet.css" type="text/css" rel="stylesheet">
		<link href="../style/sheetSet.css" type="text/css" rel="stylesheet">
    <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
	<body>
		<?php
			#Checking Logged in
			session_start();
			$user = $_SESSION['user'];
			if($user == null){
				header("Location: login.php");
			}
			$con = mysql_connect("localhost", "root", "");
			mysql_select_db("gogo", $con);
			$me = mysql_fetch_array(mysql_query("select * from accounts where acc_id=$user"));
		?>
		<div class="big">
			<div class="header">
				<div class="left">
					<img src='../images/icons/eden.png' width='150' height='75'></img><span>tweet</span>
				</div>
						<table>
							<tr><td id="one"><a href="index.php?view=last">&nbsp;Last&nbsp;</a></td>
									<td id="two"><a href="index.php?view=pop">&nbsp;Top&nbsp;</a></td>
									</tr>
						</table>
				<div class="right">
<!--<ul>
					<li><a href="#"><img src='../images/icons/message.png'></img></a>
						<ul><li>
<form action="compose.php">
<textarea name="tweet" width="150"></textarea>
<input type="submit" value="Compose"/>
</form>
						</li></ul>
					</li>
					<li><a href="index.php?user=<?php echo $me[0]?>"><img src="../images/userIcons/<?php echo $me[6]?>.png"></img></a>
						<ul>
							<li><a href="index.php?user=<?php echo $me[0]?>">Profile</a></li>
							<li><a href="setting.php">Settings</a></li>
							<li><a href="../classes/logout.php">Sign out</a></li>
						</ul>
				</li>
				</ul>--></div>
			</div>
			<!--Body Section-->
			<div class="bodySection">
            	<div class="setPro">
                	<center><a href="index.php?user=<?php echo $me[0]?>" style="color: black"><img src="../images/userIcons/<?php echo $me[6]?>.png" width="400" height="400"><br><?php echo "$me[1] $me[2]"?></center></a>
            	</div><center>
            	<div class="settingSection">
<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$icon = $_POST['icon'];
$loc = $_POST['loc'];
$email = $_POST['email'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$pword = $_POST['pword'];
$repass = $_POST['repass'];
$intro = $_POST['intro'];
echo "Profile Settings";
$one = 0;
if($month != "---"){
	$update = mysql_query("UPDATE accounts SET birth_date='$month . "-" . $day . "-" . $year' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
	echo " Successfully Updated";
	$one = 1;
	}
}
if($fname != null){
	$update = mysql_query("UPDATE accounts SET firstname='$fname' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
	echo " Successfully Updated";
	$one = 1;
	}
}
if($lname != null){
	$update = mysql_query("UPDATE accounts SET lastname='$lname' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
	echo " Successfully Updated";
	$one = 1;
	}
}
if($icon != null){
	$update = mysql_query("UPDATE accounts SET icon='$icon' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
	echo " Successfully Updated";
	$one = 1;
	}
}
if($intro != null){
	$update = mysql_query("UPDATE accounts SET intro='$intro' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
	echo " Successfully Updated";
	$one = 1;
	}
}
if($pword != null && $repass != null && $pword == $repass){
  $hash = password_hash($pword, PASSWORD_BCRYPT);
	$update = mysql_query("UPDATE accounts SET hash='$hash' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
		echo " Successfully Updated";
		$one = 1;
	}
}
if($email != null){
	$update = mysql_query("UPDATE accounts SET email='$email' WHERE acc_id=$me[0]");
	if($one != 1 && $update){
	echo " Successfully Updated";
	$one = 1;
	}
}
?>
            	    <form method="post" action="setting.php">
            	      <table width="100%">
            	        <tr>
            	          <td>First Name:</td>
            	          <td><input type="text" name="fname"></td>
            	          <td>Last Name:</td>
            	          <td><input type="text" name="lname"></td>
          	          </tr>
            	        <tr>
            	          <td>Image URL:</td>
            	          <td><input type="text" name="icon"></td>
            	          <td>Location:</td>
            	          <td><input type="text" name="loc"></td>
          	          </tr>
            	        <tr>
            	          <td>EMail:</td>
            	          <td><input type="text" name="email"></td>
            	          <td>Birth Date:</td>
            	          <td><select name="month">
            	            <option value="---">---</option>
            	            <option value="Jan">Jan</option>
            	            <option value="Feb">Feb</option>
            	            <option value="Mar">Mar</option>
            	            <option value="Apr">Apr</option>
            	            <option value="May">May</option>
            	            <option value="Jun">Jun</option>
            	            <option value="Jul">Jul</option>
            	            <option value="Aug">Aug</option>
            	            <option value="Sep">Sep</option>
            	            <option value="Oct">Oct</option>
            	            <option value="Nov">Nov</option>
            	            <option value="Dec">Dec</option>
          	            </select>
                        <select name="day">
<?php
for($i = 1; $i<32; $i++){
	echo "<option value='$i'>$i</option>";
}
?>
                        </select>
                          <select name="year">
<?php
for($i = 2014; $i>1950; $i--){
	echo "<option value='$i'>$i</option>";
}
?>
                          </select></td>
          	          </tr>
                      <tr>
	                      <td>Password: </td>
    	                  <td><input type="password" name="pword"></td>
        	              <td>Re-Type Password: </td>
            	          <td><input type="password" name="repass"></td>
                      </tr>
					  <tr>
<td>Intro</td><td colspan="3"><textarea style="width: 100%; height: 50px; min-width: 100%; max-width: 100%; max-height: 50px; min-height: 50px;" name="intro"></textarea></td>
						</tr>
                      <tr>
                      <td colspan="4"><center><input type="submit" value="Change"></center></td>
                      </tr>
                      </table>
           	      </form>
           	    </div>
          	</center>
            <center><span style="font-size: 26px;">Tweets</span></center>
            <div class="setTweet">
              <table width="100%" border="1">
                <tr>
                  <th>ID</th>
                  <th>Tweet</th>
                  <th>Tweet Date</th>
                  <th>Likes</th>
                  <th>x</th>
                </tr>
<?php
$tweid = $_POST['tweid'];
if($tweid != null){
	$delete = mysql_query("Delete from tweets where tweet_id=$tweid and user_id=$me[0]");
}
$fol = mysql_query("select * from tweets where user_id=$me[0]");
if(mysql_num_rows($fol) == 0){
	echo "<tr><td colspan='5'>No tweets</td></tr>";
}
while($row = mysql_fetch_array($fol)){
	list($tweet, $ret) = explode("-0retweetB00M-", $row[2]);
if($ret == null){
	$tweet = $row[2];
}
	echo "<tr>";
	echo "<td>$row[0]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td width='30'>
<form action='setting.php' method='post' style='height: 20px;'><input type='hidden' name='tweid' value='$row[0]'><input type='submit' value='X' style='width: 25px;'/></form></td>";
	echo "</tr>";
}
?>
              </table>
			</div>
		  </div>
    </div>
	</body>
</html>
