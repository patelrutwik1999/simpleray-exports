<div class="main-content" style="min-height: 80vh;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="add-product-form-title">
                Insert Product
                <hr class="add-category-shine">
            </div>
            <div class="row add-product-form">
                <div class="col-lg-6 mb-2">


                    <?php
                    if (($_SESSION['is-error'] == false) && ($_SESSION['message'] == true)) {
                        $_SESSION['message'] = false;
                        ?>


                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>


                            <?php
                            echo $_SESSION['success-message'];
                            $_SESSION['success-message'] = '';
                            ?>


                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                    <?php
                    } elseif (($_SESSION['is-error'] == true) && ($_SESSION['message'] == true)) {
                        $_SESSION['is-error'] = false;
                        $_SESSION['message'] = false;
                        ?>


                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Oops</span>


                            <?php
                            echo $_SESSION['error-message'];
                            $_SESSION['error-message'] = '';
                            ?>


                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="card">
                        <div class="card-header insert-product-heading">Product Details</div>
                        <div class="card-body">
                            <form action="products/add-product/store-product/store-product.php" method="post"
                                novalidate="novalidate" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input id="cc-pament" name="product_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div class="form-group">
                                    <label for="textarea-input" class="form-control-label">Product Description</label>
                                    <textarea name="product_description" id="textarea-input" rows="3"
                                        class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                    <input id="cc-pament" name="product_price" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Parent Category</label>
                                    <div class="col-20 col-md-20">
                                        <select name="parent_category" id="parent-category" class="form-control">
                                            <option value="2">Please select</option>


                                            <?php
                                            include '../../../config/config.php';
                                            $get_categories = "select category_id, category_name from categories where hasSubCategory = 0";
                                            $retrieved_categories = mysqli_query($conn, $get_categories);
                                            while ($categories = mysqli_fetch_array($retrieved_categories)) {
                                                ?>
                                                <option value="<?php echo $categories['category_id'] ?>"><?php echo $categories['category_name'] ?></option>
                                            <?php
                                            }
                                            mysqli_close($conn);
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="file-input" class=" form-control-label">Product Photo</label>
                                    <input type="file" id="product_photo" name="product_photo"
                                        class="form-control-file">
                                </div>
                                <!-- <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Please select the name of the parent
                                        category (if applicable)</label>
                                    <div class="col-20 col-md-20">
                                        <select name="parent_category" id="select-parent-category" class="form-control"
                                            placeholder="Disabled" disabled='false'>
                                            <option value="2">Please select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div>
                                    <button id="submit-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit">
                                        <i class="fa fa-arrow-circle-right fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Submit</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>