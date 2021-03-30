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
  <div class="center" style="margin-bottom:20px"><h1 style="margin-bottom:20px">Contact </h1>
            
</div>
 
<div class="card-body">
<?php 
            include ("../storage/connect.php");
            $query="SELECT * FROM contact";
            $query_run=mysqli_query($connect, $query);

            ?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color: #EFEFEF">
                    <thead style="background-color: #3c8dbc ;color:#fff">
                        <tr>
                            <th> ID </th>
                            <th> Username </th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(mysqli_num_rows($query_run) >0)
                    {
                      while($row=mysqli_fetch_assoc($query_run)){?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td> <?php echo $row['email']; ?></td>
                                <td> <?php echo $row['msg']; ?></td>
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
