<!-- Category section -->
<section class="gi-category body-bg padding-tb-40 wow fadeInUp" data-wow-duration="2s">
    <div class="container">
        <div class="row m-b-minus-15px">
            <div class="col-xl-12 border-content-color">
                <div class="gi-category-block owl-carousel">

                    <?php
                    include '../config/config.php';
                    $classNames = ['gi-cat-box-1', 'gi-cat-box-2', 'gi-cat-box-3', 'gi-cat-box-4', 'gi-cat-box-5', 'gi-cat-box-6'];
                    // echo "hello1";
                    $get_all_categories = "select * from categories where hasParentCategory = 0";
                    // echo $get_all_categories;
                    $result = mysqli_query($conn, $get_all_categories);
                    $num = mysqli_num_rows($result);
                    // echo $num;
                    $classId = 0;
                    while ($category = mysqli_fetch_array($result)) {
                        if ($classId >= 0 && $classId <= 5) {
                            $className = "$classNames[$classId]";
                        }
                    ?>
                        <div class="gi-cat-box <?php echo $className ?>">
                            <div class="gi-cat-icon">
                                <i class="fi fi-tr-peach"></i>
                                <div class="gi-cat-detail">
                                    <a href="products/product-display.php?categoryId=<?php echo $category['category_id']; ?>">
                                        <!-- <a href="shop-left-sidebar-col-3.html"> -->
                                        <h4 class="gi-cat-title"><?php echo $category['category_name']; ?></h4>
                                    </a>
                                    <!-- <p class="items">320 Items</p> -->
                                </div>
                            </div>
                        </div>
                    <?php
                        $classId++;
                        if ($classId == 6) {
                            $classId = 0;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section End -->