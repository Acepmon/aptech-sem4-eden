<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/popup.css"/>
        <title>Project Eden</title>
        <style>
            .correct {
                background: green;
            }
            .alert {
                background: red;
            }
            .normal {
                background: lightgray;
            }
        </style>
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script>
            function validate(value) {
                var value = value;
                var out;
                if (value != '') {
                    $.post('upload_test_class.php', {input: value}, function(data) {
                        $('#test').html(data);
                    });
                    if (out == 'error') {
                        $('#access').html('');
                        $('#alert').html('Your not registered');
                        $('#input_value').removeClass('correct');
                        $('#input_value').removeClass('normal');
                        $('#input_value').addClass('alert');
                    } else if (out == 'correct') {
                        $('#access').html('Welcome');
                        $('#alert').html('');
                        $('#input_value').removeClass('alert');
                        $('#input_value').removeClass('normal');
                        $('#input_value').addClass('correct');
                    }
                } else {
                    $('#access').html('');
                    $('#alert').html('');
                    $('#input_value').removeClass('alert');
                    $('#input_value').removeClass('correct');
                    $('#input_value').addClass('normal');
                }
            }
            function loginRegister(value) {
                $.post('login.php', {input: id}, function(data) {
                    $('#light').html(data);
                    $('#light').fadeIn(150);
                    $('#fade').fadeIn(150);
                });
            }
        </script>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" id="input_value" onkeyup="validate(this.value)" class="normal"/>
            <b style="color: red" id="alert"></b>
            <b style="color: green" id="access"></b><Br/>
            <p id="test"></p>
            <input type="file" name="profile" required="1"/><br/>
            <input type="submit" />
        </form>
        <a href="javascript:void(0)" onclick="loginRegister(1)">Login</a>
        <div id="profile">
            <?php
            $name = $_POST['name'];
            $file = $_FILES['profile'];

            if ($name != null && $file != null) {

                $f_name = $file['name'];
                $f_tmp = $file['tmp_name'];

                $destination = '';

		echo $f_name . '<br/>';
		echo $f_tmp . '<br/>';

                move_uploaded_file($f_tmp, $destination . $f_name);

                if ($name != null && $f_name != null) {
                    echo '<img src="' . $f_name . '" /><br/>Name: ' . $name;
                }
            }
            ?>
        </div>
        <div id="fade" class="black_overlay"></div>
        <div id="light" class="white_content"></div>
    </body>
</html>
