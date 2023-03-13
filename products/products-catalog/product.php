<?php
include '../../config/config.php';

$categoryId = $_GET['categoryId'];

$hasASubCategory = "select hasSubCategory from categories where category_id = '$categoryId'";
$hasSubCategory = mysqli_query($conn, $hasASubCategory);
$subCategoryResult = mysqli_num_rows($hasSubCategory);
if ($subCategoryResult == 1) {
    $subCategory = mysqli_fetch_assoc($hasSubCategory);
    if ($subCategory['hasSubCategory'] == 0) {
?>
        <!-- Shop section -->
        <section class="gi-shop padding-tb-30">
            <div class="container">
                <div class="row">
                    <div class="gi-shop-rightside col-lg-12 col-md-12 margin-b-30">
                        <!-- Shop Top Start -->
                        <div class="gi-pro-list-top d-flex">
                            <div class="col-md-6 gi-grid-list">
                                <div class="gi-gl-btn">
                                    <button class="grid-btn btn-grid-50 active">
                                        <i class="fi fi-rr-apps"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 gi-sort-select">
                                <div class="gi-select-inner">
                                    <select name="gi-select" id="gi-select">
                                        <option selected disabled>Sort by</option>
                                        <option value="1">Position</option>
                                        <option value="2">Relevance</option>
                                        <option value="3">Name, A to Z</option>
                                        <option value="4">Name, Z to A</option>
                                        <option value="5">Price, low to high</option>
                                        <option value="6">Price, high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Top End -->

                        <!-- Shop content Start -->
                        <div class="shop-pro-content">
                            <div class="shop-pro-inner">
                                <div class="row">
                                    <?php
                                    $getAllProducts = "select * from products where parent_category_id = '$categoryId'";
                                    $retreivedAllProducts = mysqli_query($conn, $getAllProducts);
                                    while ($allProducts = mysqli_fetch_array($retreivedAllProducts)) {
                                    ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
                                            <div class="gi-product-content">
                                                <div class="gi-product-inner">
                                                    <div class="gi-pro-image-outer">
                                                        <div class="gi-pro-image">
                                                            <a href="product-left-sidebar.html" class="image">
                                                                <span class="label veg">
                                                                    <span class="dot"></span>
                                                                </span>
                                                                <img class="main-image" src="admin/<?php echo $allProducts['photo'] ?>" alt="Product">
                                                                <img class="hover-image" src="admin/<?php echo $allProducts['photo'] ?>" alt="Product">
                                                            </a>

                                                            <div class="gi-pro-actions">
                                                                <a class="gi-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                                <a href="#" class="gi-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                                <a href="javascript:void(0)" class="gi-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                                <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gi-pro-content">
                                                        <a href="shop-left-sidebar-col-3.html">
                                                            <h6 class="gi-pro-stitle"><?php echo $allProducts['parent_category_name']; ?></h6>
                                                        </a>
                                                        <h5 class="gi-pro-title"><a href="products/product-page/product-page.php?product_id=<?php echo $allProducts['product_id']; ?>"><?php echo $allProducts['product_name']; ?></a></h5>
                                                        <p class="gi-info"><?php echo $allProducts['description']; ?></p>
                                                        <div class="gi-pro-rat-price">

                                                            <span class="gi-price">
                                                                <span class="new-price">&#8377; <?php echo $allProducts['price']; ?></span>
                                                                <!-- <span class="old-price">$85.00</span> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- Pagination Start -->
                            <div class="gi-pro-pagination">
                                <span>Showing 1-12 of 21 item(s)</span>
                                <ul class="gi-pro-pagination-inner">
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><span>...</span></li>
                                    <li><a href="#">8</a></li>
                                    <li><a class="next" href="#">Next <i class="gicon gi-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- Pagination End -->
                        </div>
                        <!--Shop content End -->

                    </div>
                </div>
            </div>
        </section>
        <!-- Shop section End -->
    <?php
    } else {
    ?>
        <!-- New Product tab Area Start -->
        <section class="gi-product-tab gi-products padding-tb-40 wow fadeInUp" data-wow-duration="2s">
            <div class="container">
                <div class="gi-tab-title">
                    <div class="gi-main-title">
                        <div class="section-title">
                            <div class="section-detail">
                                <h2 class="gi-title">Our <span>Categories</span></h2>
                                <p>Shop online for new arrivals and get free shipping!</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Start -->
                    <div class="gi-pro-tab">
                        <ul class="gi-pro-tab-nav nav">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#all">All</a></li>
                            <?php
                            $getChildCategory = "select category_id, category_name from categories where parent_category_id = '$categoryId'";
                            $retrievedChildCategory = mysqli_query($conn, $getChildCategory);
                            $temp =  mysqli_num_rows($retrievedChildCategory);
                            while ($childCategory = mysqli_fetch_array($retrievedChildCategory)) {
                            ?>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#<?php echo $childCategory['category_id'] ?>"><?php echo $childCategory['category_name']; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
                <!-- New Product -->
                <div class="row m-b-minus-24px">
                    <div class="col">
                        <div class="tab-content">
                            <!-- 1st Product tab start -->
                            <div class="tab-pane fade show active product-block" id="all">
                                <div class="row">
                                    <?php
                                    $getSubCategories = "select category_id from categories where parent_category_id = '$categoryId'";
                                    $retrievedSubCategories = mysqli_query($conn, $getSubCategories);

                                    while ($subCategories = mysqli_fetch_array($retrievedSubCategories)) {

                                        $singleSubCategory = $subCategories['category_id'];
                                        $productsList = "select * from products where parent_category_id = '$singleSubCategory'";

                                        $retrievedProductsList = mysqli_query($conn, $productsList);

                                        while ($products = mysqli_fetch_array($retrievedProductsList)) {
                                    ?>
                                            <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                                <div class="gi-product-content">
                                                    <div class="gi-product-inner">
                                                        <div class="gi-pro-image-outer">
                                                            <div class="gi-pro-image">
                                                                <a href="product-left-sidebar.html" class="image">
                                                                    <span class="label veg">
                                                                        <span class="dot"></span>
                                                                    </span>
                                                                    <img class="main-image" src="admin/<?php echo $products['photo'] ?>" alt="Product">
                                                                    <img class="hover-image" src="admin/<?php echo $products['photo'] ?>" alt="Product">
                                                                </a>

                                                                <div class="gi-pro-actions">
                                                                    <a class="gi-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                                    <a href="#" class="gi-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                                    <a href="javascript:void(0)" class="gi-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gi-pro-content">
                                                            <a href="shop-left-sidebar-col-3.html">
                                                                <h6 class="gi-pro-stitle"><?php echo $products['parent_category_name'] ?></h6>
                                                            </a>
                                                            <h5 class="gi-pro-title"><a href="products/product-page/product-page.php?product_id=<?php echo $products['product_id']; ?>">
                                                                    <?php echo $products['product_name'] ?>
                                                                </a></h5>
                                                            <p class="gi-info"><?php echo $products['description']; ?></p>
                                                            <div class="gi-pro-rat-price">
                                                                <span class="gi-price">
                                                                    <span class="new-price">&#8377; <?php echo $products['price'] ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- 1st Product tab end -->

                            <?php
                            $getAllSubCategories = "select category_id from categories where parent_category_id = '$categoryId'";
                            $retrievedGetAllSubCategories = mysqli_query($conn, $getAllSubCategories);

                            while ($allSubCategories = mysqli_fetch_array($retrievedGetAllSubCategories)) {

                            ?>
                                <!-- 2nd Product tab start -->
                                <div class="tab-pane fade" id="<?php echo $allSubCategories['category_id'] ?>">
                                    <div class="row">
                                        <?php
                                        $currentCategoryId = $allSubCategories['category_id'];
                                        $getAllProducts = "select * from products where parent_category_id = '$currentCategoryId'";
                                        $retreivedAllProducts = mysqli_query($conn, $getAllProducts);

                                        while ($allProducts = mysqli_fetch_array($retreivedAllProducts)) {
                                        ?>
                                            <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                                <div class="gi-product-content">
                                                    <div class="gi-product-inner">
                                                        <div class="gi-pro-image-outer">
                                                            <div class="gi-pro-image">
                                                                <a href="product-left-sidebar.html" class="image">
                                                                    <span class="label veg">
                                                                        <span class="dot"></span>
                                                                    </span>

                                                                    <img class="main-image" src="admin/<?php echo $allProducts['photo'] ?>" alt="Product">
                                                                    <img class="hover-image" src="admin/<?php echo $allProducts['photo'] ?>" alt="Product">
                                                                </a>
                                                                <div class="gi-pro-actions">
                                                                    <a class="gi-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                                    <a href="#" class="gi-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                                    <a href="javascript:void(0)" class="gi-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gi-pro-content">
                                                            <a href="shop-left-sidebar-col-3.html">
                                                                <h6 class="gi-pro-stitle"><?php echo $allProducts['parent_category_name'] ?></h6>
                                                            </a>
                                                            <h5 class="gi-pro-title"><a href="products/product-page/product-page.php?product_id=<?php echo $allProducts['product_id']; ?>">
                                                                    <?php echo $allProducts['product_name'] ?>
                                                                </a></h5>
                                                            <p class="gi-info"><?php echo $allProducts['description']; ?></p>
                                                            <div class="gi-pro-rat-price">
                                                                <span class="gi-price">
                                                                    <span class="new-price">&#8377; <?php echo $allProducts['price'] ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- 2nd Product tab end -->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product tab Area End -->
<?php
    }
}
?>