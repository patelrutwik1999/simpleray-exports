<?php
$allProducts = "select * from products";
$retrievedAllProducts = mysqli_query($conn, $allProducts);
?>
<!-- Related product section -->
<section class="gi-related-product gi-new-product padding-tb-40">
    <div class="container">
        <div class="row overflow-hidden m-b-minus-24px">
            <div class="gi-new-prod-section col-lg-12">
                <div class="gi-products">
                    <div class="section-title-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                        <h2 class="gi-title">Our <span>Products</span></h2>
                        <p>Browse The Collection of Top Products</p>
                    </div>
                    <div class="gi-new-block m-minus-lr-12" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                        <div class="new-product-carousel owl-carousel gi-product-slider">
                            <?php
                            while ($retrievedProducts = mysqli_fetch_assoc($retrievedAllProducts)) {
                            ?>
                                <div class="gi-product-content">
                                    <div class="gi-product-inner">
                                        <div class="gi-pro-image-outer">
                                            <div class="gi-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <span class="label veg">
                                                        <span class="dot"></span>
                                                    </span>
                                                    <img class="main-image" src="admin/<?php echo $retrievedProducts['photo'] ?>" alt="Product">
                                                    <img class="hover-image" src="admin/<?php echo $retrievedProducts['photo'] ?>" alt="Product">
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
                                                <h6 class="gi-pro-stitle"><?php echo $retrievedProducts['parent_category_name'] ?></h6>
                                            </a>
                                            <h5 class="gi-pro-title">
                                                <a href="products/product-page/product-page.php?product_id=<?php echo $retrievedProducts['product_id'] ?>"><?php echo $retrievedProducts['product_name'] ?></a>
                                            </h5>
                                            <div class="gi-pro-rat-price">
                                                <span class="gi-price">
                                                    <span class="new-price">&#8377; <?php echo $retrievedProducts['price'] ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related product section End -->