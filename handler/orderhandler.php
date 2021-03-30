<?php 
session_start();
include ("../storage/connect.php");
if(!empty($_SESSION['cart'])){
$total=$_POST['total'];
$adress=$_POST['adress'];
$phone=$_POST['phone'];
$customerid=$_SESSION['customerid'];
$payment=$_POST['payment'];

$sql="INSERT INTO orders(customer_id,adress,phone,total,pay_methode) VALUES('$customerid','$adress','$phone','$total','$payment')";
$query_run=mysqli_query($connect,$sql);
$sql2="SELECT id from orders order by id DESC LIMIT 1";
$result=mysqli_query($connect,$sql2);
$row=mysqli_fetch_assoc($result);
$orderid=$row['id'];

foreach($_SESSION['cart'] as $key => $value){
    $pro_id=$value['item_id'];
    $quantity=$value['quantity'];
    $sql3="INSERT INTO orders_details(order_id,product_id,quantite) VALUES('$orderid','$pro_id','$quantity')";
    if (!mysqli_query($connect,$sql3)) {
        echo("Error description: " . mysqli_error($connect));
      }
    }
      if($payment=='paypal'){
        $_SESSION['total']=$total;
        header('location:paypal.php');
      }else {
        header("location:../index.php");
        $_SESSION['status']=" ORDER IS PLACED Thanks you for your Trust ";
        $_SESSION['status_code']="success";
    }
            unset($_SESSION['cart']);
          
         
}
else {
  header("location:../index.php");
  $_SESSION['status']=" The Cart Is Empty Nothing To Pay It ";
  $_SESSION['status_code']="error";

}
      
