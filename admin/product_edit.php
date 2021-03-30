<!DOCTYPE html>
<html>
<?php  include ("adminstorage/head.php"); 
 include ("adminstorage/session.php");
 include ("../storage/connect.php");?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ("adminstorage/header.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include ("adminstorage/aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #FFF">
    <!-- Content Header (Page header) -->
    
         

    <!-- Main content -->
<section class="content" >
<div class="row" >
           <div class="col-sm-3"></div>
           <div class="col-sm-6" >
        
             <h1>Update Product</h1>
             <?php if(isset($_POST['edit_btn'])){
                    $id=$_POST['edit_id'];
                   $query="SELECT * from products where id='$id'";
                   $query_run=mysqli_query($connect,$query);
                   foreach($query_run as $row){
                 ?>
                 <?php if(isset( $_SESSION['succes'])){
                    echo '<h2 class="bg-info">'. $_SESSION['succes'].'</h2>';
                     unset($_SESSION['succes']);
                      }?>
                 <?php if(isset( $_SESSION['erreur'])){
                     echo '<h2 class="bg-info">'. $_SESSION['erreur'].'</h2>';
                     unset($_SESSION['erreur']);
                     }?>
                 <form action="cathandler.php" method="POST" enctype="multipart/form-data" style="background-color: #EFEFEF">
              <div class="form-group">
              <input type="hidden" name="id_update" id="" value="<?php echo  $row['id']; ?>">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" value="<?php echo  $row['name']; ?>" required>
              </div>
              <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="<?php echo  $row['price']; ?>"required>
                </div>
                <div class="form-group">
                  <label for="picture">upload Picture</label>
                  <input type="file" id="picture" name="pic"  accept="image/*" value="<?php echo  $row['picture']; ?>">
                 <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control" rows="5" placeholder="Enter Description" name="description" required ><?php echo  $row['description']; ?></textarea>
                 </div>
                 <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="category" value="<?php  ?>" required>
                    <?php  
                    $req="SELECT * from categories";
                    $result=mysqli_query($connect,$req);
                    while($rows=mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?></option>;
                    <?php }?>
                    
                  </select>
                </div>
                <a href="products.php" class="btn btn-secondary">Cancel</a>
                <button class="btn  btn-primary" type="submit" name="product_update">Update</button>
      </form>
              
              <?php }
                  
                
                }?>
             
            
        </div>
        <div class="col-sm-3"></div>
    
       
         </div>
     </section>
    <!-- /.content -->
     </div>
  <!-- /.content-wrapper -->
  <?php include("adminstorage/footer.php") ;?>
</body>
</html>










