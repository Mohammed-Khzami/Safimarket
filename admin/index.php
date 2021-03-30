<!DOCTYPE html>
<html>
<?php include ("adminstorage/head.php");
 include ("adminstorage/session.php");
      
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ("adminstorage/header.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include ("adminstorage/aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <div class="content-wrapper" style="background-color: #fff">
    <!-- Content Header (Page header) -->

    

    <!-- Main content -->
<section class="content">
<div class="container">
  <div class="center" style="margin-bottom:20px"><h1 style="margin-bottom:20px">Latest Orders </h1>
            
</div>

 
<div class="card-body">
<?php 
include ("../storage/connect.php");
$query="SELECT * FROM orders";
$query_run=mysqli_query($connect, $query);

?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color: #EFEFEF">
                    <thead style="background-color: #3c8dbc ;color:#fff">
                      <tr>
                      <th> ID </th>
                      <th> Customer Name </th>
                      <th>Adress</th>
                      <th>Phone</th>
                      <th>Total</th>
                      <th>Payment Method</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(mysqli_num_rows($query_run) >0)
                    {
                      while($row=mysqli_fetch_assoc($query_run)){?>
                      <?php $id=$row['customer_id']; 
                       $sql="SELECT * FROM customer where id ='$id'";
                       $query=mysqli_query($connect,$sql);
                       $result=mysqli_fetch_assoc($query); ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td> <?php echo $result['username']; ?></td>
                            <td> <?php echo $row['adress']; ?></td>
                            <td> <?php echo $row['phone']; ?></td>
                            <td> <?php echo $row['total']; ?></td>
                            <td> <?php echo $row['pay_methode']; ?></td>
                            </tr>
                            <?php }
                    }?>
                        
                        
                    </tbody>
                </table>

            </div>
        </div>
<div class="container">
  <div class="center" style="margin-bottom:20px"><h1 style="margin-bottom:20px">Orders Details </h1>
            
</div>

 
<div class="card-body">
<?php 
include ("../storage/connect.php");
$query="SELECT * FROM orders_details";
$query_run=mysqli_query($connect, $query);

?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color: #EFEFEF">
                    <thead style="background-color: #3c8dbc ;color:#fff">
                      <tr>
                      <th> ID </th>
                      <th> Order Id </th>
                      <th>Product</th>
                      <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(mysqli_num_rows($query_run) >0)
                    {
                      while($row=mysqli_fetch_assoc($query_run)){?>
                      <?php $id=$row['product_id']; 
                       $sql="SELECT * FROM products where id ='$id'";
                       $query=mysqli_query($connect,$sql);
                       $result=mysqli_fetch_assoc($query); ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td> <?php echo $row['order_id']; ?></td>
                            <td> <?php echo $result['name']; ?></td>
                            <td> <?php echo $row['quantite']; ?></td>
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
