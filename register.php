<html>
<head>
    <title>რეგისტრაცია</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body>
<?php
include ('server_conect.php');
include ('proces.php');
?>
<div class="register_form">
    <form method="post" action="register.php">
        <input type="text" name="username" placeholder="მომხმარებელი">
        <br>
        <input type="password" name="password" placeholder="პაროლი">
        <br>
        <input type="password" name="password_2" placeholder="გაიმეორეთ პაროლი">
        <br>
        <button name="register">რეგისტრაცია</button>
        <br>
        <a href="index.php">შესვლა</a>
        <div class="warmatebit">
            <?php echo $warmatebit;?>
        </div>
        <div class="shecdoma">
            <?php include ('error.php');?>
        </div>
    </form>
</div>
</body>
</html>