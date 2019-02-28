<html>
<head>
    <title>მომხმარებლის გვერდი</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/kalati.css">
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
            <a href="user_pass_change.php">პაროლის შეცვლა</a>
            <a href="home.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="shenadzeni">
    <table>
        <tr>
            <th>რაოდენობა</th>
            <th>ფასი</th>
            <th>წაშლა</th>
        </tr>
   <?php
   $sql = "SELECT * FROM users WHERE id='".$_SESSION['user_id']."'";
   $result = mysqli_query ($con,$sql);
   if(mysqli_num_rows ($result)){
       $row = mysqli_fetch_assoc ($result);
       echo '<tr>'.'<td>'.$row['product'].'</td>'.'<td>'.$row['price'].' ₾</td>'.'<td><form method="post" action="kalati.php">
    <input type="hidden" value="'.$row['id'].'" name="deleteprodid">
    <button id="delprod" name="deleteprod">წაშლა</button>
</form></td></tr>';
   }
   ?>
    </table>
</div>
</body>
</html>