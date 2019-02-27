<?php

session_start ();

$con = mysqli_connect ('localhost','root','','registerdatabase');

$con ->set_charset ('utf8');

$errors = array ();

if(!$con){
    echo 'მონაცემთა ბაზასთან დაკავშირება ვერ ხერხდება';
}

?>