 
<?php 
session_start();
if(!isset($_SESSION['email'])){
    
    $_SESSION['status']=" Please Connect First ";
    $_SESSION['status_code']="info";
    header("location:customerform.php");
    
}


?>
