<?php 
session_start();
$qt=$_POST["quantity"]; 
if(isset($_POST['Update'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['item_name']==$_POST['item_name']){
            $_SESSION['cart'][$key]['quantity']=$qt;
            
            header("location:cart2.php");
            $_SESSION['status']=" Product Updated ";
            $_SESSION['status_code']="success";
        
        }
    }
}