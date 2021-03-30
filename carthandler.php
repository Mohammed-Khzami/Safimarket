
<?php 
session_start();
$id= $_GET['cart_id'];
if (isset($_SESSION['cart'])){
    
    $check=array_column($_SESSION['cart'],'item_name');
    if(in_array($_GET['cart_name'],$check)){
        header("location:details.php?detail_id=$id");
        $_SESSION['status']=" Product  not added item is already exist ";
        $_SESSION['status_code']="error";
      }else{
    
    $count=count($_SESSION['cart']);
    $_SESSION['cart'][$count]=array('item_id' => $_GET['cart_id'], 'item_name' => $_GET['cart_name'], 'item_price' => $_GET['cart_price'], 'item_img' => $_GET['cart_img'], 'quantity' =>1);
    header("location:details.php?detail_id=$id");
    $_SESSION['status']=" Product Added ";
    $_SESSION['status_code']="success";}
    
}    
   else{
    $_SESSION['cart'][0]=array('item_id' => $_GET['cart_id'], 'item_name' => $_GET['cart_name'], 'item_price' => $_GET['cart_price'], 'item_img' => $_GET['cart_img'],'quantity' =>1);
    header("location:details.php?detail_id=$id");
    $_SESSION['status']=" Product Added ";
    $_SESSION['status_code']="success";
}







