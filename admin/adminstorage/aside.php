<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar-01.jpg" class="img-circle" alt="User Image" >
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['emailadmin'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
      
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i>    <span>Home</span>
            
          </a>
        </li>
        <li>
          <a href="categories.php">
          <i class="fas fa-atom"></i> <span>    Category</span>
            
          </a>
        </li>
        <li>
          <a href="products.php">
          <i class="fab fa-product-hunt"></i>    <span>Products</span>
            
          </a>
        </li>
        
        <li>
          <a href="orders.php">
          <i class="fas fa-shopping-cart"></i>    <span>Orders</span>
            
          </a>
        </li>
        <li>
          <a href="customer.php">
          <i class="fas fa-users"></i>    <span>Customers</span>
            
          </a>
        </li>
        <li>
          <a href="contact.php">
          <i class="fas fa-envelope"></i>    <span>Contact</span>
            
          </a>
        </li>
       
        
       
        
        
        
       
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>