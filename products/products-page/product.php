<?php
include '../../config/config.php';

$categoryId = $_GET['categoryId'];

$hasASubCategory = "select hasSubCategory from add_category where category_id = '$categoryId'";
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
                                                                <img class="main-image" src="assets/img/product-images/2_1.jpg" alt="Product">
                                                                <img class="hover-image" src="assets/img/product-images/2_2.jpg" alt="Product">
                                                            </a>
                                                            <span class="flags">
                                                                <span class="sale">Sale</span>
                                                            </span>
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
                                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html"><?php echo $allProducts['product_name']; ?></a></h5>
                                                        <p class="gi-info"><?php echo $allProducts['description']; ?></p>
                                                        <div class="gi-pro-rat-price">
                                                            <span class="gi-pro-rating">
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star fill"></i>
                                                                <i class="gicon gi-star"></i>
                                                                <i class="gicon gi-star"></i>
                                                            </span>
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
                                <h2 class="gi-title">New <span>Arrivals</span></h2>
                                <p>Shop online for new arrivals and get free shipping!</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Start -->
                    <div class="gi-pro-tab">
                        <ul class="gi-pro-tab-nav nav">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#all">All</a></li>
                            <?php
                            $getChildCategory = "select category_id, category_name from add_category where parent_category_id = '$categoryId'";
                            $retrievedChildCategory = mysqli_query($conn, $getChildCategory);
                            $temp =  mysqli_num_rows($retrievedChildCategory);
                            while ($childCategory = mysqli_fetch_array($retrievedChildCategory)) {
                            ?>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#<?php echo $childCategory['category_name'] ?>"><?php echo $childCategory['category_name']; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Sub-category_3_agro_updating">Fruits</a></li>
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
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/3_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/3_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Dried Fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Californian
                                                            Almonds Value 250g + 50g Pack</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$58.00</span>
                                                            <span class="old-price">$65.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/2_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/2_2.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Dried Fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Dates Value
                                                            Pouch Dates Value Pouch</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$78.00</span>
                                                            <span class="old-price">$85.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/25_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/25_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Fresh fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Fresh Lichi
                                                            500g pack</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <span class="qty">500 g</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$25.00</span>
                                                            <span class="old-price">$35.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/8_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/8_2.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Snacks</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Smoked
                                                            Honey
                                                            Spiced Nuts Almonds Pack</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$32.00</span>
                                                            <span class="old-price">$45.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/4_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/4_2.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Foods</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Banana
                                                            Chips
                                                            Snack crunchy & spicy wafer</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$45.00</span>
                                                            <span class="old-price">$50.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/7_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/7_2.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Foods</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Mixed Nuts
                                                            &
                                                            Almonds Dry Fruits 500g pack</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$49.00</span>
                                                            <span class="old-price">$65.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label nonveg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/9_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/9_2.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Foods</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Roasted
                                                            Almonds, Pumpkin Snacks</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$49.00</span>
                                                            <span class="old-price">$65.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label nonveg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/19_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/19_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Eggs</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Farm Eggs -
                                                            Brown</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">3 pcs</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$3.00</span>
                                                            <span class="old-price">$5.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/5_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/5_2.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Snacks</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">carrot &
                                                            broccoli soup
                                                            Mix 250g pack</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$25.00</span>
                                                            <span class="old-price">$35.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box d-n-1199">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/17_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/17_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Tuber root</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Ginger -
                                                            Organic</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">100 g</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$2.00</span>
                                                            <span class="old-price">$3.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1st Product tab end -->

                            <?php
                            $getChildCategoryForModal = "select category_id, category_name from add_category where parent_category_id = '$categoryId'";
                            $retrievedChildCategoryForModal = mysqli_query($conn, $getChildCategoryForModal);
                            $temp =  mysqli_num_rows($retrievedChildCategoryForModal);
                            while ($childCategoryForModal = mysqli_fetch_array($retrievedChildCategoryForModal)) {

                            ?>
                                <!-- 2nd Product tab start -->
                                <div class="tab-pane fade" id="<?php echo $childCategoryForModal['category_name'] ?>">
                                    <p><?php echo $childCategoryForModal["category_id"] ?> </p>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                            <div class="gi-product-content">
                                                <div class="gi-product-inner">
                                                    <div class="gi-pro-image-outer">
                                                        <div class="gi-pro-image">
                                                            <a href="product-left-sidebar.html" class="image">
                                                                <span class="label veg">
                                                                    <span class="dot"></span>
                                                                </span>
                                                                <img class="main-image" src="assets/img/product-images/1_1.jpg" alt="Product">
                                                                <img class="hover-image" src="assets/img/product-images/1_2.jpg" alt="Product">
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
                                                            <h6 class="gi-pro-stitle">chips & fries</h6>
                                                        </a>
                                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Crunchy
                                                                Triangle Chips Snacks</a></h5>
                                                        <div class="gi-pro-rat-price">
                                                            <span class="gi-price">
                                                                <span class="new-price">$59.00</span>
                                                                <span class="old-price">$87.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd Product tab end -->
                            <?php
                            }
                            ?>

                            <!-- 3rd Product tab start -->
                            <div class="tab-pane fade" id="Sub-category_3_agro_updating">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/21_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/21_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Fresh Fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Apple</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">5 pcs</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$10.00</span>
                                                            <span class="old-price">$12.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/22_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/22_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Fresh Fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Kamalam
                                                            Fruit</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">3 pcs</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$15.00</span>
                                                            <span class="old-price">$17.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/23_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/23_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Fresh Fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Blue
                                                            berry</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">500 g</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$11.00</span>
                                                            <span class="old-price">$12.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/24_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/24_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Fresh Fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Cherry</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">1 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$20.00</span>
                                                            <span class="old-price">$21.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/25_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/25_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Fresh fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Lichi</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <span class="qty">500 g</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$25.00</span>
                                                            <span class="old-price">$35.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/26_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/26_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Fresh fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Star
                                                            fruit</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">1 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$5.00</span>
                                                            <span class="old-price">$6.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/27_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/27_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Fresh fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Guava</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">2 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$10.00</span>
                                                            <span class="old-price">$12.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/28_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/28_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Snacks</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Mango -
                                                            Kesar</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">20 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$50.00</span>
                                                            <span class="old-price">$55.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/29_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/29_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">fresh fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Pineapple</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">1 psc</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$15.00</span>
                                                            <span class="old-price">$16.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box d-n-1199">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/30_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/30_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Fresh fruit</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">banana</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star sill"></i>
                                                            <span class="qty">12 psc</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$9.00</span>
                                                            <span class="old-price">$10.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3rd Product tab end -->
                            <!-- 4th Product tab start -->
                            <div class="tab-pane fade" id="veg">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/11_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/11_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Vegetables</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Tomato -
                                                            Hybrid</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">1 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$5.00</span>
                                                            <span class="old-price">$7.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/12_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/12_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Tuber root</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Potato</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">5 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$15.00</span>
                                                            <span class="old-price">$17.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/13_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/13_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Tuber root</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Onion -
                                                            Hybrid</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">10 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$25.00</span>
                                                            <span class="old-price">$30.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/14_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/14_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Vegetables</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Coriander
                                                            Bunch</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">250 g</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$5.00</span>
                                                            <span class="old-price">$7.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/15_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/15_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="new">New</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Vegetables</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Capsicum -
                                                            Red</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <span class="qty">3 pcs</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$2.00</span>
                                                            <span class="old-price">$3.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/16_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/16_1.jpg" alt="Product">
                                                        </a>
                                                        <span class="flags">
                                                            <span class="sale">Sale</span>
                                                        </span>
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
                                                        <h6 class="gi-pro-stitle">Vegetables</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Sweet
                                                            Corn</a>
                                                    </h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">2 pcs</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$6.00</span>
                                                            <span class="old-price">$8.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/17_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/17_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Tuber root</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Ginger -
                                                            Organic</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">100 g</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$2.00</span>
                                                            <span class="old-price">$3.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/18_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/18_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Vegetables</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Lemon -
                                                            Seedless</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">1 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$8.00</span>
                                                            <span class="old-price">$9.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label nonveg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/19_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/19_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Eggs</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Farm Eggs -
                                                            Brown</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <i class="gicon gi-star"></i>
                                                            <span class="qty">3 pcs</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$3.00</span>
                                                            <span class="old-price">$5.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 gi-col-5 gi-product-box d-n-1199">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/20_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/20_1.jpg" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">Vegetables</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Organic
                                                            fresh Broccoli</a></h5>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star sill"></i>
                                                            <span class="qty">1 kg</span>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$10.00</span>
                                                            <span class="old-price">$11.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 4th Product tab end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product tab Area End -->
        <!-- Shop section -->
        <section class="gi-shop padding-tb-40">
            <div class="container">
                <div class="row">
                    <div class="gi-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
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

                                    $getProducts = "select * from products where parent_category_id = '$categoryId'";
                                    $retreivedProducts = mysqli_query($conn, $getProducts);
                                    while ($products = mysqli_fetch_array($retreivedProducts)) {
                                    ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
                                            <div class="gi-product-content">
                                                <div class="gi-product-inner">
                                                    <div class="gi-pro-image-outer">
                                                        <div class="gi-pro-image">
                                                            <a href="product-left-sidebar.html" class="image">
                                                                <span class="label veg">
                                                                    <span class="dot"></span>
                                                                </span>
                                                                <img class="main-image" src="assets/img/product-images/2_1.jpg" alt="Product">
                                                                <img class="hover-image" src="assets/img/product-images/2_2.jpg" alt="Product">
                                                            </a>
                                                            <span class="flags">
                                                                <span class="sale">Sale</span>
                                                            </span>
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
                                                            <h6 class="gi-pro-stitle"><?php echo $products['parent_category_name']; ?></h6>
                                                        </a>
                                                        <h5 class="gi-pro-title"><a href="product-left-sidebar.html"><?php echo $products['product_name']; ?></a></h5>
                                                        <p><?php echo $products['description']; ?></p>
                                                        <div class="gi-pro-rat-price">
                                                            <span class="gi-price">
                                                                <span class="new-price">&#8377; <?php echo $products['price']; ?></span>
                                                                <span class="old-price">$85.00</span>
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
                    <!-- Sidebar Area Start -->
                    <div class="gi-shop-sidebar col-lg-3 order-lg-first col-md-12 order-md-last m-t-991">
                        <div id="shop_sidebar">
                            <div class="gi-sidebar-wrap">
                                <!-- Sidebar Category Block -->
                                <div class="gi-sidebar-block">
                                    <div class="gi-sb-title">
                                        <h3 class="gi-sidebar-title">Sub Categories</h3>
                                    </div>
                                    <div class="gi-sb-block-content">
                                        <ul>
                                            <?php
                                            $getChildCategory = "select category_id, category_name from add_category where parent_category_id = '$categoryId'";
                                            $retrievedChildCategory = mysqli_query($conn, $getChildCategory);
                                            $temp =  mysqli_num_rows($retrievedChildCategory);
                                            while ($childCategory = mysqli_fetch_array($retrievedChildCategory)) {
                                            ?>
                                                <li>
                                                    <div class="gi-sidebar-block-item">
                                                        <a href="products/product-display.php?categoryId=<?php echo $childCategory['category_id'] ?>">
                                                            <span><i class="fi-rr-cupcake"></i><?php echo $childCategory['category_name']; ?></span>
                                                        </a>
                                                        <span class="checked"></span>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar Weight Block -->

                                <!-- <div class="gi-sidebar-block">
                                <div class="gi-sb-title">
                                    <h3 class="gi-sidebar-title">Weight</h3>
                                </div>
                                <div class="gi-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" value="" checked>
                                                <a href="#">500gm Pack</a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" value="">
                                                <a href="#">1kg Pack</a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" value="">
                                                <a href="#">2kg Pack</a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" value="">
                                                <a href="#">5kg Pack</a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" value="">
                                                <a href="#">10kg Pack</a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop section End -->
<?php
    }
}
?>