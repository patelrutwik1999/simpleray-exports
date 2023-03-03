<!-- Category section -->
<section class="gi-category body-bg padding-tb-40 wow fadeInUp" data-wow-duration="2s">
    <div class="container">
        <div class="row m-b-minus-15px">
            <div class="col-xl-12 border-content-color">
                <div class="gi-category-block owl-carousel">
                    <div class="gi-cat-box gi-cat-box-2">
                        <div class="gi-cat-icon">
                            <i class="fi fi-tr-bread"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Bakery</h4>
                                </a>
                                <p class="items">65 Items</p>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                    echo "hello";
                    $get_categories = "select * from add_category";
                    $retrieved_categories = mysqli_query($conn, $get_categories);
                    while ($category = mysqli_fetch_array($retrieved_categories)) {
                    ?>
                        <div class="gi-cat-box gi-cat-box-2">
                            <div class="gi-cat-icon">
                                <i class="fi fi-tr-peach"></i>
                                <div class="gi-cat-detail">
                                    <a href="shop-left-sidebar-col-3.html">
                                        <h4 class="gi-cat-title"><?php echo $category['category_name']; ?></h4>
                                    </a>
                                    <!-- <p class="items">320 Items</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="gi-cat-box gi-cat-box-2">
                            <div class="gi-cat-icon">
                                <i class="fi fi-tr-bread"></i>
                                <div class="gi-cat-detail">
                                    <a href="shop-left-sidebar-col-3.html">
                                        <h4 class="gi-cat-title">Bakery</h4>
                                    </a>
                                    <p class="items">65 Items</p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- <div class="gi-cat-box gi-cat-box-2">
                        <div class="gi-cat-icon">
                            <i class="fi fi-tr-bread"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Bakery</h4>
                                </a>
                                <p class="items">65 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-3">
                        <div class="gi-cat-icon">
                            <span class="gi-lbl">15%</span>
                            <i class="fi fi-tr-corn"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Vegetables</h4>
                                </a>
                                <p class="items">548 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-4">
                        <div class="gi-cat-icon">
                            <span class="gi-lbl">10%</span>
                            <i class="fi fi-tr-coffee-pot"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Dairy & Milk</h4>
                                </a>
                                <p class="items">48 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-5">
                        <div class="gi-cat-icon">
                            <i class="fi fi-tr-french-fries"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Snack & Spice</h4>
                                </a>
                                <p class="items">59 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-6">
                        <div class="gi-cat-icon">
                            <i class="fi fi-tr-hamburger-soda"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Juice & Drinks </h4>
                                </a>
                                <p class="items">845 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-1">
                        <div class="gi-cat-icon">
                            <i class="fi fi-tr-shrimp"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Seafood</h4>
                                </a>
                                <p class="items">652 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-2">
                        <div class="gi-cat-icon">
                            <span class="gi-lbl">20%</span>
                            <i class="fi fi-tr-popcorn"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Fast Food</h4>
                                </a>
                                <p class="items">253 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="gi-cat-box gi-cat-box-3">
                        <div class="gi-cat-icon">
                            <i class="fi fi-tr-egg"></i>
                            <div class="gi-cat-detail">
                                <a href="shop-left-sidebar-col-3.html">
                                    <h4 class="gi-cat-title">Eggs</h4>
                                </a>
                                <p class="items">154 Items</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section End -->