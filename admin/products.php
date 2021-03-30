<!DOCTYPE html>
<html>
<?php  include ("adminstorage/head.php"); 
 include ("adminstorage/session.php");?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ("adminstorage/header.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include ("adminstorage/aside.php"); ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #fff">
    <!-- Content Header (Page header) -->

    

    <!-- Main content -->
<section class="content">
<div class="container">
  <div class="center" style="margin-bottom:20px"><h1 style="margin-bottom:20px">Products List</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add Product
            </button>
</div>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="productshandler.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" required>
              </div>
              <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price"required>
                </div>
                <div class="form-group">
                  <label for="picture">Upload Image</label>
                  <input type="file" id="picture" name="pic"required accept="image/*">
                  <label for="picture">Upload Image(1)</label>
                  <input type="file" id="picture" name="file[]" accept="image/*">
                  <label for="picture">Upload Image(2)</label>
                  <input type="file" id="picture" name="file[]" accept="image/*">
                  <label for="picture">Upload Image(3)</label>
                  <input type="file" id="picture" name="file[]" accept="image/*">
                 </div>
             <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control" rows="5" placeholder="Enter Description" name="description" required ></textarea>
            </div>
            <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="category" required>
                    <?php 
                    include ("../storage/connect.php");
                    $req="SELECT * from categories";
                    $result=mysqli_query($connect,$req);
                    while($rows=mysqli_fetch_assoc($result)){?>
                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?></option>;
                    <?php }?>
                    
                  </select>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add"  class="btn btn-primary">Add</button>
        </div>
      </form>
      

    </div>
  </div>
</div>
<div class="card-body">
<?php if(isset( $_SESSION['succes'])){
  echo '<h2 class="bg-info">'. $_SESSION['succes'].'</h2>';
  unset($_SESSION['succes']);
}?>
                 <?php if(isset( $_SESSION['erreur'])){
  echo '<h2 class="bg-info">'. $_SESSION['erreur'].'</h2>';
  unset($_SESSION['erreur']);
}?>
            <div class="table-responsive" style="background-color: #EFEFEF">
            <?php 
            include ("../storage/connect.php");
            $query="SELECT * FROM products";
            $query_run=mysqli_query($connect, $query);
            $sql="SELECT * FROM categories where id ='' "

            ?>
           
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #3c8dbc ;color:#fff">
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th>Price </th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>categories</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(mysqli_num_rows($query_run) >0)
                    {
                      while($row=mysqli_fetch_assoc($query_run)){?>
                      <?php $id=$row['category_id']; 
                                   $sql="SELECT * FROM categories where id ='$id'";
                                   $query=mysqli_query($connect,$sql);
                                   $result=mysqli_fetch_assoc($query); ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['price'];  ?> DH</td>
                                <td><?php echo $row['description']; ?></td>
                                <td><img src="<?php echo $row['picture']; ?>" alt="" height="100px" width="100px"></td>
                                <td><?php echo $result['name']; ?></td>
                                
                                <td>
                                    <form action="product_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-primary"> UPDATE</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="cathandler.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="product_delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            <?php }
                    }?>
                        
                        
                    </tbody>
                </table>

            </div>
        </div>
        </div>
     </section>
    <!-- /.content -->
     </div>
  <!-- /.content-wrapper -->
  <?php include("adminstorage/footer.php") ;?>
</body>
</html>
