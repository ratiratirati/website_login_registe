<html>
<head>
    <title>მომხმარებლის დაბლოკვა</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/block_user.css">
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
            <a href="verified_admin.php">ვერიფიკაცია</a>
            <a href="saitzea.php">საიტზეა</a>
            <a href="admin.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="block_user">
    <table>
        <tr>
            <th>მომხმარებელი</th>
            <th>სტატუსი</th>
            <th>დაბლოკვა / განბლოკვა</th>
        </tr>
        <?php
        $select = "SELECT * FROM users";
        $result = mysqli_query ($con,$select);
        if(mysqli_num_rows ($result)){
            while ($row = mysqli_fetch_assoc ($result)){
                if($row['username'] == 'admin'){

                }else{
                    echo '<tr>'.'<td>'.$row['username'].'</td>'.'<td>'.$row['block'].'</td>'.'<td>
                <form method="post" action="block_user.php">
                <input type="hidden" name="block_user" value="'.$row['id'].'">
                 <button id="block" name="block">დაბლოკვა</button>
                 <button id="block" name="unblock">განბლოკვა</button>
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