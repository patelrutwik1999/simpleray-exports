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
                                    <button class="grid-btn filter-toggle-icon">
                                        <i class="fi fi-rr-filter"></i>
                                    </button>
                                    <button class="grid-btn btn-grid-50 active">
                                        <i class="fi fi-rr-apps"></i>
                                    </button>
                                    <button class="grid-btn btn-list-50">
                                        <i class="fi fi-rr-list"></i>
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

                        <!-- Select Bar Start -->
                        <div class="gi-select-bar d-flex">
                            <span class="gi-select-btn">Clothes<a class="gi-select-cancel" href="javascript:void(0)">×</a></span>
                            <span class="gi-select-btn">Fruits<a class="gi-select-cancel" href="javascript:void(0)">×</a></span>
                            <span class="gi-select-btn">Snacks<a class="gi-select-cancel" href="javascript:void(0)">×</a></span>
                            <span class="gi-select-btn">Dairy<a class="gi-select-cancel" href="javascript:void(0)">×</a></span>
                            <span class="gi-select-btn">perfume<a class="gi-select-cancel" href="javascript:void(0)">×</a></span>
                            <span class="gi-select-btn">jewelry<a class="gi-select-cancel" href="javascript:void(0)">×</a></span>
                            <span class="gi-select-btn gi-select-btn-clear"><a class="gi-select-clear" href="javascript:void(0)">Clear All</a></span>
                        </div>
                        <!-- Select Bar End -->

                        <!-- Shop content Start -->
                        <div class="shop-pro-content">
                            <div class="shop-pro-inner">
                                <div class="row">
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
                                                        <h6 class="gi-pro-stitle">Dried Fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Dates Value
                                                            Pack Pouch</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>

                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$59.00</span>
                                                            <span class="old-price">$87.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/3_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/3_2.jpg" alt="Product">
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
                                                            Almonds Value Pack</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                            Chips Snacks & Spices</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Berry &
                                                            Graps Mix Snack</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/6_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/6_2.jpg" alt="Product">
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
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Mixed Nuts
                                                            Seeds & Berries Pack</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$45.00</span>
                                                            <span class="old-price">$56.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                            & Almonds Dry Fruits</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                            Honey Spiced Nuts</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                                        <h6 class="gi-pro-stitle">Dried Fruits</h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="product-left-sidebar.html">Dates Value
                                                            Pack Pouch</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>

                                                    <div class="gi-pro-rat-price">
                                                        <span class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </span>
                                                        <span class="gi-price">
                                                            <span class="new-price">$59.00</span>
                                                            <span class="old-price">$87.00</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
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
                                                            Chips Snacks & Spices</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
                                        <div class="gi-product-content">
                                            <div class="gi-product-inner">
                                                <div class="gi-pro-image-outer">
                                                    <div class="gi-pro-image">
                                                        <a href="product-left-sidebar.html" class="image">
                                                            <span class="label veg">
                                                                <span class="dot"></span>
                                                            </span>
                                                            <img class="main-image" src="assets/img/product-images/3_1.jpg" alt="Product">
                                                            <img class="hover-image" src="assets/img/product-images/3_2.jpg" alt="Product">
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
                                                            Almonds Value Pack</a></h5>
                                                    <p class="gi-info">Contrary to popular belief, Lorem Ipsum is not simply
                                                        random text. It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old.</p>
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
                    <div class="filter-sidebar-overlay"></div>
                    <div class="gi-shop-sidebar gi-filter-sidebar col-lg-3 col-md-12">
                        <div class="sidebar-filter-title">
                            <h5>Filters</h5>
                            <a class="filter-close" href="javascript:void(0)">×</a>
                        </div>
                        <div id="shop_sidebar">
                            <div class="gi-sidebar-wrap">
                                <!-- Sidebar Category Block -->
                                <div class="gi-sidebar-block">
                                    <div class="gi-sb-title">
                                        <h3 class="gi-sidebar-title">Category</h3>
                                    </div>
                                    <div class="gi-sb-block-content">
                                        <ul>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" checked>
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi-rr-cupcake"></i>Dairy & Bakery</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox">
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi fi-rs-apple-whole"></i>Fruits & Vegetable</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox">
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi fi-rr-popcorn"></i>Snack & Spice</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox">
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi fi-rr-drink-alt"></i>Juice & Drinks</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar Weight Block -->
                                <div class="gi-sidebar-block">
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
                                </div>
                                <!-- Sidebar Color item -->
                                <div class="gi-sidebar-block color-block gi-sidebar-block-clr">
                                    <div class="gi-sb-title">
                                        <h3 class="gi-sidebar-title">Color</h3>
                                    </div>
                                    <div class="gi-sb-block-content">
                                        <ul>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#c4d6f9;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#ff748b;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#000000;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#2bff4a;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#ff7c5e;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#f155ff;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#ffef00;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#c89fff;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#7bfffa;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#56ffc1;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#ffdb9f;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#9f9f9f;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" value="">
                                                    <span class="gi-clr-block" style="background-color:#6556ff;"></span>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar Price Block -->
                                <div class="gi-sidebar-block">
                                    <div class="gi-sb-title">
                                        <h3 class="gi-sidebar-title">Price</h3>
                                    </div>
                                    <div class="gi-sb-block-content gi-price-range-slider es-price-slider">
                                        <div class="gi-price-filter">
                                            <div class="gi-price-input">
                                                <label class="filter__label">
                                                    From<input type="text" class="filter__input">
                                                </label>
                                                <span class="gi-price-divider"></span>
                                                <label class="filter__label">
                                                    To<input type="text" class="filter__input">
                                                </label>
                                            </div>
                                            <div id="gi-sliderPrice" class="filter__slider-price" data-min="0" data-max="250" data-step="10"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sidebar tags -->
                                <div class="gi-sidebar-block">
                                    <div class="gi-sb-title">
                                        <h3 class="gi-sidebar-title">Tags</h3>
                                    </div>
                                    <div class="gi-tag-block gi-sb-block-content">
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Clothes</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Fruits</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Snacks</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Dairy</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Seafood</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Fastfood</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Toys</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">perfume</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">jewelry</a>
                                        <a href="shop-left-sidebar-col-3.html" class="gi-btn-2">Bags</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop section End -->
    <?php
    } else {
    ?>
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
                                        <h3 class="gi-sidebar-title">Category</h3>
                                    </div>
                                    <div class="gi-sb-block-content">
                                        <ul>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox" checked>
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi-rr-cupcake"></i>Dairy & Bakery</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox">
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi fi-rs-apple-whole"></i>Fruits & Vegetable</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox">
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi fi-rr-popcorn"></i>Snack & Spice</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="gi-sidebar-block-item">
                                                    <input type="checkbox">
                                                    <a href="javascript:void(0)">
                                                        <span><i class="fi fi-rr-drink-alt"></i>Juice & Drinks</span>
                                                    </a>
                                                    <span class="checked"></span>
                                                </div>
                                            </li>
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