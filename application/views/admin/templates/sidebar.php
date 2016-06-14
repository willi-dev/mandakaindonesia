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
                    <li><a href="#" class="admin-menu" data-target="categories"><i class="icon-tag"></i>Categories</a></li>
                </ul>
            </li>
            
            <li class="sub-menu">
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?>" href="javascript:;" >
                    <i class="icon-male"></i>
                    <span>User</span>
                </a>
                <ul class="sub">
                    <li><a href="#" class="admin-menu" data-target="user_password"><i class="icon-unlock"></i>Password</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="<?php echo ( isset($menu_configactive) ) ? $menu_configactive : '';?>" href="javascript:;" >
                    <i class="icon-file"></i>
                    <span>Page</span>
                </a>
                <ul class="sub">
                    <li><a href="#" class="admin-menu" data-target="page_about"><i class="icon-file-text"></i>About Us</a></li>
                    <li><a href="#" class="admin-menu" data-target="page_contact"><i class="icon-envelope"></i>Contact Us</a></li>
                    <li><a href="#" class="admin-menu" data-target="page_store_locator"><i class="icon-map-marker"></i>Store Locator</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="#">
                    <i class="icon-picture"></i>
                    <span>Features Slideshow</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="<?php echo base_url();?>auth/logout" >
        			<i class="icon-signout"></i>
        			<span>Log Out</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->