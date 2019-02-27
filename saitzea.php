<html>
<head>
    <title>საიტზეა</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/saitzea.css">
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
            <a href="block_user.php">მომხმარებლის დაბლოკვა</a>
            <a href="admin.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<div class="saitzea">
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
                if($row['status'] == 'საიტზეა' and $row['status'] != 'admin'){
                    echo '<tr>'.'<td>'.$row['username'].'</td>'.'<td>'.$row['status'].'</td>'.'<td>
                <form method="post" action="saitzea.php">
                <input type="hidden" name="delete_user_id" value="'.$row['id'].'">
                 <button id="delete" name="delete_user">მომხმარებლის წაშლა</button>
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