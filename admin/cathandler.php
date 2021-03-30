<?php 
session_start();
include ("../storage/connect.php");
if(isset($_POST['registerbtn'])){
$category=$_POST['name'];
$sql="INSERT INTO categories(name) VALUES('$category') ";
$qeury_run=mysqli_query($connect,$sql);
if($qeury_run){
    $_SESSION['status']="Category Added";
    $_SESSION['status_code']="success";
    header('location:categories.php');
}
else{
    $_SESSION['status']="Category not Added";
    $_SESSION['status_code']="error";
    header('location:categories.php');
}
}
if(isset($_POST['save'])){
    $id=$_POST['edit_id'];
    $name=$_POST['edit_category'];
    
    
    $query="UPDATE  categories SET name='$name' WHERE id='$id' ";
     $query_run=mysqli_query($connect,$query);
     if($query_run){
        $_SESSION['status']="Category Updated";
        $_SESSION['status_code']="success";
         header('location:categories.php');

     }
     else {
        $_SESSION['status']="Category is  not Updated";
        $_SESSION['status_code']="error";
        header('location:categories.php');
    
     }
}

if(isset($_POST['delete_btn'])){
    $id=$_POST['delete_id'];
   
    $query=" DELETE   FROM categories  WHERE id='$id' ";
     $query_run=mysqli_query($connect,$query);

     if($query_run){
        $_SESSION['status']="Category Deleted";
        $_SESSION['status_code']="success";
         header('location:categories.php');

     }
     else {
        $_SESSION['status']="Category is  not DELETED";
        $_SESSION['status_code']="error";
        header('location:categories.php');
    
     }
}

if(isset($_POST['product_update'])){

$id=$_POST['id_update'];
$new_name=$_POST['name'];
$new_price=$_POST['price'];
$file_name=$_FILES['pic']['name'];
$new_desc=$_POST['description'];
$target="uploads/";
$file_path=$target.basename($_FILES['pic']['name']);
$file_tmp=$_FILES['pic']['tmp_name'];
$file_store="uploads/".$file_name; 

$sql="SELECT * FROM products WHERE id='$id'";
$sql_run=mysqli_query($connect,$sql);
foreach($sql_run as $result){
    if($file_name==NULL){
        $import_data=$result['picture'];
    }
    else{
        if($img_path=$result['picture']){
            unlink($img_path);
            $import_data=$target.$file_name;
        }
    }
}

$query="UPDATE  products SET name='$new_name' ,price='$new_price',description='$new_desc',picture='$import_data' WHERE id='$id' ";
$query_run=mysqli_query($connect,$query);


if($query_run){
    if($file_name==NULL){
     move_uploaded_file($file_tmp,$file_store);
    $_SESSION['status']="Product Updated with existing image";
    $_SESSION['status_code']="error";
    header('location:products.php');}
    else{
        move_uploaded_file($file_tmp,$file_store);
        $_SESSION['status']="Product Updated ";
        $_SESSION['status_code']="success";
        header('location:products.php');

    }
}

else{
    $_SESSION['status']="product is  not Updated";
    $_SESSION['status_code']="error";
    header('location:products.php');
}
}
if(isset($_POST['product_delete_btn'])){
    $id=$_POST['delete_id'];
   
    $query=" DELETE   FROM products  WHERE id='$id' ";
     $query_run=mysqli_query($connect,$query);

     if($query_run){
        $_SESSION['status']="Product Deleted";
        $_SESSION['status_code']="success";
         header('location:products.php');

     }
     else {
        $_SESSION['status']="Product is  not DELETED";
        $_SESSION['status_code']="error";
        header('location:products.php');
    
     }
}
?>
