<?php
    $url_administrator = base_url() . 'administrator/';
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/adminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo isset($menu_mainactive) ? $menu_mainactive: '';?>">
            <a href="<?php echo $url_administrator;?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php echo isset($menu_produkactive) ? $menu_produkactive : '' ;?>">
            <a href="#">
                <i class="fa fa-cube"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $url_administrator;?>all_products"><i class="fa fa-cubes"></i> All Products</a></li>
                <li><a href="<?php echo $url_administrator;?>add_new_products"><i class="fa fa-plus"></i> Add New</a></li>
                <li><a href="<?php echo $url_administrator;?>categories"><i class="fa fa-tag"></i> Categories</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo isset($menu_configactive) ? $menu_configactive : '';?>">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>User</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $url_administrator;?>user_password"><i class="fa fa-unlock-alt"></i> User Password</a></li>
            </ul>
        </li>
        <li class="treeview <?php echo isset( $menu_pageactive) ? $menu_pageactive: '';?>" >
            <a href="#">
                <i class="fa fa-file"></i>
                <span>Pages</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $url_administrator;?>page_about"><i class="fa fa-file-text"></i> About Us</a></li>
            <li><a href="<?php echo $url_administrator;?>page_contact"><i class="fa fa-circle-o"></i> Contact Us</a></li>
            <li><a href="<?php echo $url_administrator;?>page_store_locator"><i class="fa fa-map-marker"></i> Store Locator</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>