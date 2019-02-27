<html>
<head>
    <title>ავტორიზაცია</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body>
<?php
include ('server_conect.php');
include ('proces.php');
?>
    <div class="login_form">
        <form method="post" action="index.php">
        <img src="img/login_user.png">
        <div class="login_forms">
        <input type="text" name="username" placeholder="მომხმარებელი">
        <br>
        <input type="password" name="password" placeholder="პაროლი">
        <br>
        <button name="login">შესვლა</button>
        <br>
        <a href="register.php">რეგისტრაცია</a>
        <div class="shecdoma">
            <?php include ('error.php');?>
        </div>
        </div>
        </form>
    </div>
</body>
</html>