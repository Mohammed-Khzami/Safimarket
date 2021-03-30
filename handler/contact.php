<?php 
session_start();
include ("../storage/connect.php");
if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $msg=$_POST['msg'];
   $sql="INSERT INTO contact(email,msg) VALUES('$email','$msg') ";
    $query_run=mysqli_query($connect,$sql);
      if($query_run){ 
        header('location:../contact.php');
        $_SESSION['status']="MESSAGE SENT";
         $_SESSION['status_code']="success";
        
        }
        else{
            header('location:../contact.php');
        $_SESSION['status']="MESSAGE NOT SENT";
         $_SESSION['status_code']="error";
        }
    }


?>
