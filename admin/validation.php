<?php 
session_start();
include ("../storage/connect.php");
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * from admins WHERE username='$email' AND password='$password'";
    $query_run=mysqli_query($connect,$sql);
    if(mysqli_fetch_array($query_run))
    {

        $_SESSION['emailadmin']= $email;
        $_SESSION['passwordadmin']= $password;
        
         header('location:index.php');


    }
    else {
        $_SESSION['erreur']="invalid email or password";
        header('location:login.php');
    }


}

    
    
    
    ?>