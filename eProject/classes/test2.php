<?php
$id = $_POST['code'];
$name = $_POST['ner'];
$comment = $_POST['set'];
echo $id;
utf8_encode($name);
utf8_encode($comment);

$con = mysqli_connect('localhost', 'root', '', 'gogo');
mysqli_query($con, 'set charset utf8');
$result = mysqli_query($con, "insert into comments values(0, $id, '$name', '$comment')");

if($result){
 while($row = mysql_fetch_array($result)){
         echo "<div class='commentContainer'>";
         echo "<table border='0' cellspacing='0'>";
         echo "<tr>";
         echo "<td><img src='../images/profiles/profile.jpg' /><h5>$name</h5></td>";
         echo "<td class='comm'><p>$comment</p></td>";
         echo "</tr>";
         echo "</table>";	
         echo "</div>"; 
        }  
}

mysqli_close($con); 
?>
