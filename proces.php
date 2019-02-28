<?php
$warmatebit = '';

if(isset($_POST['register'])){
    $username = mysqli_real_escape_string ($con,$_POST['username']);
    $password = mysqli_real_escape_string ($con,$_POST['password']);
    $password_2 = $_POST['password_2'];

    if(empty($username)){
        array_push ($errors,'მომხმარებლის ველი ცარიელია');
    }

    if(empty($password)){
        array_push ($errors,'პაროლის ველი ცარიელია');
    }

    if($password != $password_2){
        array_push ($errors,'პაროლები არ ემთხვევა');
    }

    $select = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query ($con,$select);
    if(mysqli_num_rows ($result)){
        array_push ($errors,'ესეთი მომხმარებელი უკვე არსებობს');
    }

    if(count ($errors) == 0 ){
        $password = md5 ($password);
        $select = "INSERT INTO users (username,password) VALUES ('$username','$password')";
        if(mysqli_query ($con,$select)){
            $warmatebit = 'რეგისტრაცია წარამტებულია';
        }
    }
}

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string ($con,$_POST['username']);
    $password = mysqli_real_escape_string ($con,$_POST['password']);


    if(empty($username)){
        array_push ($errors,'მომხმარებლის ველი ცარიელია');
    }

    if(empty($password)){
        array_push ($errors,'პაროლის ველი ცარიელია');
    }

    if(count ($errors) == 0 ){
        $password = md5 ($password);
        $select = "SELECT * FROM users WHERE username='$username' and password='$password'";
        $result = mysqli_query ($con,$select);
        if(mysqli_num_rows ($result)){
            $row = mysqli_fetch_assoc ($result);
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id'];
            if($username == 'admin'){
                header ('location:admin.php');
            }else{
                $select = "UPDATE users SET status='საიტზეა' WHERE id='".$_SESSION['user_id']."'";
                mysqli_query ($con,$select);
                if($row['verified'] == 'არა ვერიფიცირებული'){
                    header ('location:verified_user.php');
                }else{
                    header ('location:home.php');
                }
                if($row['block'] == 'დაბლოკილია'){
                    header ('location:block.php');
                }
            }
        }else{
            array_push ($errors,'მომხმარებლის სახელი ან პაროლი არასწორია');
        }
    }
}


if(isset($_POST['verifbut'])){
    $select = "UPDATE users SET verified='ვერიფიცირებული' WHERE id='".$_POST['verifuser']."'";
    mysqli_query ($con,$select);
}


if(isset($_POST['block'])){
    $select = "UPDATE users SET block='დაბლოკილია' WHERE id='".$_POST['block_user']."'";
    mysqli_query ($con,$select);
}

if(isset($_POST['unblock'])){
    $select = "UPDATE users SET block='არ არის დაბლოკილი' WHERE id='".$_POST['block_user']."'";
    mysqli_query ($con,$select);
}


if(isset($_POST['change_pass'])){
    $dzvel = mysqli_real_escape_string ($con,$_POST['dzvel']);
    $axali = mysqli_real_escape_string ($con,$_POST['axali']);

    if(empty($dzvel)){
        array_push ($errors,'ძველი პაროლის ველი ცარიელია');
    }

    if(empty($axali)){
        array_push ($errors,'ახალი პაროლის ველი ცარიელია');
    }

    if(count ($errors) == 0 ){
        $sql = "SELECT password FROM users WHERE id='".$_SESSION['user_id']."'";
        $result = mysqli_query ($con,$sql);

        if(mysqli_num_rows ($result)){
            $row = mysqli_fetch_assoc ($result);
            $dzveli_pass = $row['password'];
        }

        if($dzveli_pass == md5($dzvel)){

            $axali = md5 ($axali);
            $select = "UPDATE  users SET password='$axali' WHERE id='".$_SESSION['user_id']."'";
            if(mysqli_query ($con,$select)){
                $warmatebit = 'პაროლი წარმატებით შეიცვალა';

            }

        }elseif($dzveli_pass != md5($dzvel)){
            array_push ($errors,'ძველი პაროლი არასწორია');
        }


    }
}

if(isset($_GET['logout'])){
    $select = "UPDATE users SET status='არ არის საიტზე' WHERE id='".$_SESSION['user_id']."'";
    mysqli_query ($con,$select);
}

$msg='';
if(isset($_POST['delete_user'])){
    $select = "DELETE FROM users WHERE id='".$_POST['delete_user_id']."'";
    mysqli_query ($con,$select);
}

if(isset($_POST['yidva'])){
    $num = $_POST['num'];
    $msg = 'თქვენ შეიძინეთ '.$num .' ცალი ჯამი: '.($num * 150)." ₾" ;
    $ms = ($num * 150);
    $sql = "UPDATE users SET product='$num' ,price='$ms' WHERE id='".$_SESSION['user_id']."'";
    mysqli_query ($con,$sql);
}


if(isset($_POST['deleteprod'])){
    $sql = "DELETE  FROM users WHERE id='".$_SESSION['user_id']."'";
    mysqli_query ($con,$sql);
}

?>