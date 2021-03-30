<?php 
include('../storage/connect.php');
 $new_id=$_GET['del_up'];
 $sql="DELETE from products Where id='$new_id'";
 $sql2="DELETE from prod Where product_id='$new_id'";
  $connect->query($sql);
  $connect->query($sql2);
    
  header("location:productshow.php");
 

 



