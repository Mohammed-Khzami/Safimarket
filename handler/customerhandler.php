<?php 
session_start();
include ("../storage/connect.php");

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * from customer WHERE username='$email' AND password='$password'";
    $query_run=mysqli_query($connect,$sql);
    if($query_run){
       $row=mysqli_fetch_assoc($query_run);
        $_SESSION['email']=$row['username'];
       $_SESSION['password']=$row['password'];
       $_SESSION['customerid']=$row['id'];
       if($email==$row['username'] AND $password==$row['password']){
           
            $_SESSION['status']="Welcome Back";
            $_SESSION['status_code']="success";
            header('location: ../cart.php');
       }
       else {
            $_SESSION['status']="Invalid email  or password";
            $_SESSION['status_code']="error";
            header('location: ../customerform.php');
     }

    }
    
    
        
}
if(isset($_POST['registre'])){

$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
if($password==$password2){
    $sql="INSERT INTO customer(username,password) VALUES ('$email','$password')";
    $query_run=mysqli_query($connect,$sql);
     
     $_SESSION['status']="registered successfully";
     $_SESSION['status_code']="success";
     header('location: ../customerform.php');
    // header('location:../customerform.php');
}
else{
    $_SESSION['status']="Failed password";
     $_SESSION['status_code']="error";
     header('location: ../customerform.php');
}

    
    }
