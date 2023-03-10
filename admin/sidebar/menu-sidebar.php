<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">
                        <?php echo $_SESSION['username']; ?>
                    </h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="landing-page/dashboard.php" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <!-- <span class="badge rounded-pill bg-info float-end">3</span> -->
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-network-3"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="categories/category-list/display-categories.php">Categories List</a></li>
                        <li><a href="categories/add-category/insert-category.php">Add Category</a></li>
                        <li><a href="categories/edit-category/edit-category.php">Modify Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-tags"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="products/products-list/display-products.php">Products List</a></li>
                        <li><a href="products/add-product/insert-product.php">Add Product</a></li>
                        <!-- <li><a href="products/edit-product/edit-product.php">Edit Product</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-conversation"></i>
                        <span>General Inquiry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="inquiries/general-inquiries/all-inquiries/display-all-inquiries.php">All Inquiries</a></li>
                        <li><a href="inquiries/general-inquiries/new-inquiries/display-new-inquiries.php">New Inquiries</a></li>
                        <li><a href="inquiries/general-inquiries/processed-inquiries/display-processed-inquiries.php">Processed Inquiries</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-inbox"></i>
                        <span>Product Inquiry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="inquiries/product-inquiries/all-inquiries/display-all-inquiries.php">All Inquiries</a></li>
                        <li><a href="inquiries/product-inquiries/new-inquiries/display-new-inquiries.php">New Inquiries</a></li>
                        <!-- <li><a href="products/add-product/insert-product.php">New Inquiries</a></li>
                        <li><a href="products/edit-product/edit-product.php">Processed Inquiries</a></li> -->
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->