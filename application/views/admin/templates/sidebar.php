<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?>" href="#">
                    <i class="icon-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?>" href="javascript:;" >
                    <i class="icon-th"></i>
                    <span>Products</span>
                </a>
                <ul class="sub">
                    <li><a href="#" class="admin-menu" data-target="all_products">All Products</a></li>
                    <li><a href="#" class="admin-menu" data-target="add_new_product">Add New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?> admin-menu" 
                    href="#" 
                    data-target="categories">
                  <i class="icon-folder-open"></i>
                  <span>Categories</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?>" href="javascript:;" >
                    <i class="icon-male"></i>
                    <span>User</span>
                </a>
                <ul class="sub">
                    <li><a href="#" class="admin-menu" data-target="user_password">Password</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?>" href="javascript:;" >
                    <i class="icon-file"></i>
                    <span>Page</span>
                </a>
                <ul class="sub">
                    <li><a href="#" class="admin-menu" data-target="user_password">About Us</a></li>
                    <li><a href="#" class="admin-menu" data-target="user_password">Contact Us</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="<?php echo base_url();?>auth/logout" >
        			<i class="icon-key"></i>
        			<span>Log Out</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->