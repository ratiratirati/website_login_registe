<html>
<head>
    <title>მომხმარებლის გვერდი</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/verified_user.css">
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
            <a href="home.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="verified">
    <p><?php echo $_SESSION['username'];?>  თქვენ არ ხართ ვერიფიცირებული <br>უმოკლეს ხანებში ადმინი მიგანიჭებთ ვერიფიკაციას </p>
</div>
</body>
</html>