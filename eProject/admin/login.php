<html>
    <body>
        <?php
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $expire=time()+60*60*24*30;
        if ($user == null || $pass == null) {
            echo "Null";
        } else {
            setcookie("user", "$user", $expire);
        }
        if (isset($_COOKIE["user"])) {
            echo "Welcome " . $_COOKIE["user"] . "!<br>";
        } else {
            echo "Welcome guest!<br>";
        }
        $con = mysql_connect('localhost', 'root', 'acep123', 'cloud');
        print mysqli_query($con, 'select acc_id from accounts');
        ?>
        <form action="login.php#user" method='POST'>
            <input type='text' name="user" /><br/>
            <input type="password" name='password' /><br/>
            <input type="submit"/>
        </form>
    </body>
</html>