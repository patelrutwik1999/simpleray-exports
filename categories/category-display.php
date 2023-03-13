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
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#all">All Categories</a></li>
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
                                $getAllSubCategories = "select * from categories where hasSubCategory = 0";
                                $retrievedAllSubCategories = mysqli_query($conn, $getAllSubCategories);

                                while ($subCategories = mysqli_fetch_array($retrievedAllSubCategories)) {
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
                                                            <img class="main-image" src="admin/<?php echo $subCategories['category_image'] ?>" alt="Product">
                                                            <img class="hover-image" src="admin/<?php echo $subCategories['category_image'] ?>" alt="Product">
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
                                                        <h6 class="gi-pro-stitle">
                                                            <?php
                                                            //Check if the category has a sub-category then we will print it here.
                                                            $categoryToCheck = $subCategories['parent_category_id'];

                                                            if (str_contains($categoryToCheck, 'cat')) {
                                                                $getParentCategoryName = "select category_name from categories where category_id = '$categoryToCheck'";
                                                                $retrievedParentCategoryName = mysqli_query($conn, $getParentCategoryName);
                                                                $totalParentCategoryRetrieved = mysqli_num_rows($retrievedParentCategoryName);
                                                                if ($totalParentCategoryRetrieved == 1) {
                                                                    $parentCategoryName = mysqli_fetch_assoc($retrievedParentCategoryName);
                                                                    echo $parentCategoryName['category_name'];
                                                                }
                                                            }

                                                            ?>
                                                        </h6>
                                                    </a>
                                                    <h5 class="gi-pro-title"><a href="products/product-display.php?categoryId=<?php echo $subCategories['category_id'] ?>">
                                                            <?php echo $subCategories['category_name']; ?>
                                                        </a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- 1st Product tab end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product tab Area End -->