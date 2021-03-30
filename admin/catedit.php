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
        
             <h1>Edit category</h1>
             <?php if(isset($_POST['edit_btn'])){
                    $id=$_POST['edit_id'];
                   $query="SELECT * from categories where id='$id'";
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
                 <form action="cathandler" method="post" style="background-color: #EFEFEF">
              <div class="box-body" style="padding:6px">
                <div class="form-group" style="margin-bottom:0px">
                <input type="hidden" name="edit_id"  value="<?php echo  $row['id']; ?>">
                  <label for="category">Enter a category name</label>
                  <input name="edit_category" type="text" class="form-control" id="category" placeholder="Enter category" value="<?php echo  $row['name']; ?>" required>
                </div>
                
              </div>
              <!-- /.box-body -->
             
             <div>
             <a href="categories.php" class="btn btn-secondary"> Cancel</a>
             <button type="submit" class="btn btn-primary" style="margin-left:6px" name="save">Save</button></div> 
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










