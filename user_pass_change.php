<html>
<head>
    <title>პაროლი შეცვლა</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/user_pass_change.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script src="js/dropdown.js"></script>
</head>
<body>
<?php
include ('server_conect.php');
include ('proces.php');

if(empty($_SESSION['username'])){
    header ('location:index.php');
}

if(isset($_GET['logout'])){
    session_destroy ();
    unset($_SESSION['username']);
    header ('location:index.php');
}

?>
<div class="header">
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['username'];?></button>
        <div id="myDropdown" class="dropdown-content">
            <a href="home.php">უკან დაბრუნება</a>
            <a href="home.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="password_change">
    <form method="post" action="user_pass_change.php">
    <input type="text" name="dzvel" placeholder="ძველი პაროლი">
    <br>
    <input type="text" name="axali" placeholder="ახალი პაროლი">
    <br>
    <button name="change_pass">შეცვლა</button>
    <div class="warmatebit">
        <?php echo $warmatebit;?>
    </div>
    <div class="error">
        <?php include ('error.php');?>
    </div>
    </form>
</div>
</body>
</html>