<?php 
session_start();
if(empty($_SESSION['emailadmin'] AND $_SESSION['passwordadmin'])){
    header('location: login.php');
}

if(isset($_POST['signout'])){
    session_start();
    session_destroy();
header('location:../login.php');
}