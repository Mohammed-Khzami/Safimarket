<!DOCTYPE html>
<html>
<?php include ("adminstorage/head.php");
 include ("adminstorage/session.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ("adminstorage/header.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include ("adminstorage/aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
           <div class="col-sm-3"></div>
           <div class="col-sm-6">
          <form role="form" action="productupdatehandler.php" method="POST" enctype="multipart/form-data">
          <?php 
          $new_id=$_GET['pro_up'];
          include ("../storage/connect.php");
          $sql="SELECT * From products WHERE id='$new_id' ";
          $result=$connect->query($sql);
          $row=$result->fetch_assoc();
          
          
          ?>
           <h1>Products</h1>
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" value="<?php echo $row['name'] ?>">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="<?php echo $row['price'] ?>">
                </div>
                <div class="form-group">
                
                  <label for="picture">Picture</label>
                  <input type="file" id="picture" name="file" >
                  
                </div>
                <div class="form-group">
                
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control" rows="10" placeholder="Enter Description" name="description" required ><?php echo $row['description'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="category" value="<?php echo $row['category_id'] ?>">
                    <?php 
                    include ("../storage/connect.php");
                    $req="SELECT * from categories";
                    $result=mysqli_query($connect,$req);
                    while($rows=mysqli_fetch_assoc($result)){
                    echo "<option  value=".$rows['id'].">".$rows['name']."</option>";
                    }
                    ?>
                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="form_id" value="<?php echo $row['id'] ?>">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
              </div>
            </form>
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
