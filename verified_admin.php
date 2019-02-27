<html>
<head>
    <title>მომხმარებლის ვერიფიკაცია</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/verified_admin.css">
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
            <a href="admin.php">უკან დაბრუნება</a>
            <a href="block_user.php">მომხმარებლის დაბლოკვა</a>
            <a href="saitzea.php">საიტზეა</a>
            <a href="admin.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="admin_verification">
    <table>
        <tr>
            <th>მომხმარებელი</th>
            <th>სტატუსი</th>
            <th>ვერიფიკაცია</th>
        </tr>
        <?php
        $select = "SELECT * FROM users";
        $result = mysqli_query ($con,$select);
        if(mysqli_num_rows ($result)){
            while ($row = mysqli_fetch_assoc ($result)){
                if($row['username'] == 'admin'){

                }else{
                echo '<tr>'.'<td>'.$row['username'].'</td>'.'<td>'.$row['verified'].'</td>'.'<td>
                <form method="post" action="verified_admin.php">
                <input type="hidden" name="verifuser" value="'.$row['id'].'"> <button id="verifbut" name="verifbut">ვერიფიკაცია</button>
                </form>
            </td>'.'</tr>';
            }
            }
        }
        ?>
    </table>
</div>
</body>
</html>