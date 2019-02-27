<html>
<head>
    <title>ადმინის გვერდი</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
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
            <a href="verified_admin.php">ვერიფიკაცია</a>
            <a href="block_user.php">მომხმარებლის დაბლოკვა</a>
            <a href="saitzea.php">საიტზეა</a>
            <a href="home.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
</body>
</html>