<?php session_start();


if(isset($_POST['remove'])){
    foreach($_SESSION['cart'] as $key => $value){
        if($value['item_name']==$_POST['item_name']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            header("location:cart.php");
            $_SESSION['status']=" Product Deleted ";
            $_SESSION['status_code']="success";
        
        }
    }
}

if(isset($_POST['Update'])){
    $qt=$_POST["quantity"]; 
    foreach($_SESSION['cart'] as $key => $value){
        if($value['item_name']==$_POST['item_name']){
            $_SESSION['cart'][$key]['quantity']=$qt;
            
            header("location:cart.php");
            $_SESSION['status']=" Quantity Updated ";
            $_SESSION['status_code']="success";
        
        }
    }
}