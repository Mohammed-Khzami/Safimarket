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
  <div class="center" style="margin-bottom:20px"><h1 style="margin-bottom:20px">categories</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add Category
            </button>
</div>
 <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="cathandler.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Category Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Category" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Add</button>
        </div>
      </form>
      

    </div>
  </div>
</div>
<div class="card-body">
         <div class="table-responsive" style="background-color: #EFEFEF">
            <?php 
            include ("../storage/connect.php");
            $query="SELECT * FROM categories";
            $query_run=mysqli_query($connect, $query);

            ?>
           
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #3c8dbc ;color:#fff">
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(mysqli_num_rows($query_run) >0)
                    {
                      while($row=mysqli_fetch_assoc($query_run)){?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td> <?php echo $row['name']; ?></td>
                               

                                <td>
                                    <form action="catedit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-primary"> UPDATE</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="cathandler.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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
