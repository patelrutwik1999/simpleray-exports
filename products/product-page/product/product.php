<?php
$categoryId = $_GET['category_id'];
$getProduct = "select * from products where product_id = '$categoryId'";

$retrievedProduct = mysqli_query($conn, $getProduct);
$numofProduct = mysqli_num_rows($retrievedProduct);

if ($numofProduct == 1) {
    $product = mysqli_fetch_assoc($retrievedProduct);
?>

    <!-- Breadcrumb start -->
    <div class="gi-breadcrumb m-b-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gi_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="gi-breadcrumb-title">Product Page</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list">
                                <li class="gi-breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="gi-breadcrumb-item active">Product Page</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Sart Single Product -->
    <section class="gi-single-product padding-tb-40">
        <div class="container">
            <div class="row">
                <div class="gi-pro-rightside gi-common-rightside col-md-12">
                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="admin/<?php echo $product['photo'] ?>" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="assets/img/product-images/2_1.jpg" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="assets/img/product-images/3_1.jpg" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="assets/img/product-images/1_1.jpg" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="assets/img/product-images/5_1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="single-nav-thumb">
                                            <div class="single-slide">
                                                <img class="img-responsive" src="admin/<?php echo $product['photo'] ?>" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="assets/img/product-images/2_1.jpg" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="assets/img/product-images/3_1.jpg" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="assets/img/product-images/1_1.jpg" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="assets/img/product-images/5_1.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar m-t-991">
                                    <div class="single-pro-content">
                                        <h5 class="gi-single-title"><?php echo $product['product_name'] ?></h5>
                                        <div class="gi-single-rating-wrap">

                                            <span class="gi-read-review">
                                                <a href="#gi-spt-nav-review">
                                                    992 inquired about this product.
                                                </a>
                                            </span>
                                        </div>

                                        <div class="gi-single-price-stoke">
                                            <div class="gi-single-price">
                                                <div class="final-price">&#8377; <?php echo $product['price'] ?><span class="price-des">-78%</span>
                                                </div>
                                                <!-- <div class="mrp">M.R.P. : <span>$2,999.00</span></div> -->
                                            </div>
                                            <div class="gi-single-stoke">
                                                <!-- <span class="gi-single-sku">SKU#: WH12</span> -->
                                                <span class="gi-single-ps-title">IN STOCK</span>
                                            </div>
                                        </div>
                                        <div class="gi-single-desc"><?php echo $product['description'] ?></div>

                                        <div class="gi-single-list">
                                            <ul>
                                                <li><strong>Closure :</strong> Hook & Loop</li>
                                                <li><strong>Sole :</strong> Polyvinyl Chloride</li>
                                                <li><strong>Width :</strong> Medium</li>
                                                <li><strong>Outer Material :</strong> A-Grade Standard Quality</li>
                                            </ul>
                                        </div>

                                        <div class="gi-pro-variation">
                                            <div class="gi-pro-variation-inner gi-pro-variation-size">
                                                <span>Weight</span>
                                                <div class="gi-pro-variation-content">
                                                    <ul>
                                                        <li class="active"><span>250g</span></li>
                                                        <li><span>500g</span></li>
                                                        <li><span>1kg</span></li>
                                                        <li><span>2kg</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-single-qty">
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" type="text" name="ms_qtybtn" value="1">
                                            </div>
                                            <div class="gi-single-cart">
                                                <button class="btn btn-primary gi-btn-1">Add To Cart</button>
                                            </div>
                                            <div class="gi-single-wishlist">
                                                <a class="gi-btn-group wishlist" title="Wishlist">
                                                    <i class="fi-rr-heart"></i>
                                                </a>
                                            </div>
                                            <div class="gi-single-quickview">
                                                <a href="#" class="gi-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#gi_quickview_modal">
                                                    <i class="fi-rr-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->

                    <!-- Single product tab start -->
                    <div class="gi-single-pro-tab">
                        <div class="gi-single-pro-tab-wrapper">
                            <div class="gi-single-pro-tab-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#gi-spt-nav-details" type="button" role="tab" aria-controls="gi-spt-nav-details" aria-selected="true">Detail</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#gi-spt-nav-info" type="button" role="tab" aria-controls="gi-spt-nav-info" aria-selected="false">Specifications</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#gi-spt-nav-vendor" type="button" role="tab" aria-controls="gi-spt-nav-vendor" aria-selected="false">Vendor</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#gi-spt-nav-review" type="button" role="tab" aria-controls="gi-spt-nav-review" aria-selected="false">Reviews</button>
                                    </li>
                                </ul>

                            </div>
                            <div class="tab-content  gi-single-pro-tab-content">
                                <div id="gi-spt-nav-details" class="tab-pane fade show active">
                                    <div class="gi-single-pro-tab-desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged.
                                        </p>
                                        <ul>
                                            <li>Any Product types that You want - Simple, Configurable</li>
                                            <li>Downloadable/Digital Products, Virtual Products</li>
                                            <li>Inventory Management with Backordered items</li>
                                            <li>Flatlock seams throughout.</li>
                                        </ul>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged.
                                        </p>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have
                                            suffered alteration in some form, by injected humour, or randomised words
                                            which don't
                                            look even slightly believable. If you are going to use a passage of Lorem
                                            Ipsum,
                                            you need to be sure there isn't anything embarrassing hidden in the middle
                                            of text.
                                            All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                            chunks as necessary,
                                            making this the first true generator on the Internet. It uses a dictionary
                                            of over
                                            200 Latin words, combined with a handful of model sentence structures, to
                                            generate
                                            Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore
                                            always
                                            free from repetition, injected humour, or non-characteristic words etc.</p>
                                    </div>
                                </div>
                                <div id="gi-spt-nav-info" class="tab-pane fade">
                                    <div class="gi-single-pro-tab-moreinfo">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries.
                                        </p>
                                        <ul>
                                            <li><span>Model</span> SKU140</li>
                                            <li><span>Weight</span> 500 g</li>
                                            <li><span>Dimensions</span> 35 × 30 × 7 cm</li>
                                            <li><span>Color</span> Black, Pink, Red, White</li>
                                            <li><span>Size</span> 10 X 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="gi-spt-nav-vendor" class="tab-pane fade">
                                    <div class="gi-single-pro-tab-moreinfo">
                                        <div class="gi-product-vendor">
                                            <div class="gi-vendor-info">
                                                <span>
                                                    <img src="assets/img/vendor/3.jpg" alt="vendor">
                                                </span>
                                                <div>
                                                    <h5>Ocean Crate</h5>
                                                    <p>Products : 358</p>
                                                    <p>Sales : 5587</p>
                                                </div>
                                            </div>
                                            <div class="gi-detail">
                                                <ul>
                                                    <li><span>Phone No. :</span> +00 987654321</li>
                                                    <li><span>Email. :</span> Example@gmail.com</li>
                                                    <li><span>Address. :</span> 2548 Broaddus Maple Court, Madisonville
                                                        KY 4783, USA.</li>
                                                </ul>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                    Lorem Ipsum has been the industry's standard dummy text ever since
                                                    the
                                                    1500s, when an unknown printer took a galley of type and scrambled
                                                    it to
                                                    make a type specimen book. It has survived not only five centuries,
                                                    but also
                                                    the leap into electronic typesetting, remaining essentially
                                                    unchanged.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="gi-spt-nav-review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="gi-t-review-wrapper">
                                            <div class="gi-t-review-item">
                                                <div class="gi-t-review-avtar">
                                                    <img src="assets/img/user/1.jpg" alt="user">
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top">
                                                        <div class="gi-t-review-name">Mariya Lykra</div>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gi-t-review-item">
                                                <div class="gi-t-review-avtar">
                                                    <img src="assets/img/user/2.jpg" alt="user">
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top">
                                                        <div class="gi-t-review-name">Moris Willson</div>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p>Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="gi-ratting-content">
                                            <h3>Add a Review</h3>
                                            <div class="gi-ratting-form">
                                                <form action="#">
                                                    <div class="gi-ratting-star">
                                                        <span>Your rating:</span>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-ratting-input">
                                                        <input name="your-name" placeholder="Name" type="text">
                                                    </div>
                                                    <div class="gi-ratting-input">
                                                        <input name="your-email" placeholder="Email*" type="email" required>
                                                    </div>
                                                    <div class="gi-ratting-input form-submit">
                                                        <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
                                                        <button class="gi-btn-2" type="submit" value="Submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Product -->
<?php
}
?>