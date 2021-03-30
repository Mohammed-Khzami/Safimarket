<?php 
include ("../storage/connect.php");
session_start();


  if(isset($_POST['add']))
{
    $name=$_POST['name'];

    $price=$_POST['price'];
    
    $description=$_POST['description'];
    
    $category=$_POST['category'];

    $file_name=$_FILES['pic']['name'];
    $target="uploads/";
 if(file_exists($target.$_FILES['pic']['name'])){
         $store=$_FILES['pic']['name'];
         $_SESSION['erreur']="images already exist. .'$store'.";
         header('location:products.php');
    
}else {
    $file_path=$target.basename($_FILES['pic']['name']);
    $sql="INSERT INTO products(name,price,picture,description,category_id) VALUES ('$name','$price','$file_path','$description','$category')" ;
    $query_run=mysqli_query($connect,$sql);


    if($query_run){ 
      $sql1='SELECT id FROM products ORDER BY id DESC LIMIT 1';
      $res=mysqli_query($connect,$sql1);
      $row=mysqli_fetch_assoc($res);
      $id=$row['id'];
  
	  $extension=array('jpeg','jpg','png','gif');
	  foreach ($_FILES['file']['tmp_name'] as $key => $value) {
		  $filename=$_FILES['file']['name'][$key];
		  $filename_tmp=$_FILES['file']['tmp_name'][$key];
		  echo '<br>';
		  $ext=pathinfo($filename,PATHINFO_EXTENSION);
  
		  $finalimg='';
		  if(in_array($ext,$extension))
		  {
			  if(!file_exists('uploads/'.$filename))
			  {
			  move_uploaded_file($filename_tmp, 'uploads/'.$filename);
			  $finalimg=$target.$filename;
			  }else
			  {
				   $filename=str_replace('.','-',basename($filename,$ext));
				   $newfilename=$filename.time().".".$ext;
				   move_uploaded_file($filename_tmp, 'uploads/'.$newfilename);
				   $finalimg=$target.$newfilename;
			  }
			  
			  //insert
			  $insertqry="INSERT INTO prod(product_id,path) VALUES ('$id','$finalimg')";
			  mysqli_query($connect,$insertqry);
  
		  }
		}
        $file_tmp=$_FILES['pic']['tmp_name'];
        $file_store="uploads/".$file_name; 
        move_uploaded_file($file_tmp,$file_store);
        $_SESSION['status']="Product Updated";
        $_SESSION['status_code']="success";
         header('location:products.php'); }
    
     else{
         $_SESSION['status']="Product Not Updated";
         $_SESSION['status_code']="error";
         header('location:products.php');}
     
}
  }


