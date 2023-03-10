<div class="page-content">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Add Product</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray Exports</a></li>
                            <li class="breadcrumb-item"><a
                                    href="products/products-list/display-products.php">Products</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div style="margin: auto">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title" style="color: #525ce5">Insert Product Details</h4>

                            <?php
                            if (($_SESSION['is-error'] == false) && ($_SESSION['message'] == true)) {
                                $_SESSION['message'] = false;
                            ?>
                                <div class="row" style="text-align: center;">
                                    <div class="col-lg-6" style="margin: auto">
                                        <div class="card alert alert-dismissible border p-0 mb-0">
                                            <div class="card-header bg-soft-success">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                                </button>
                                                <h5 class="font-size-16 text-success my-1">Success</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <i class="mdi mdi-checkbox-marked-circle-outline display-4 text-success"></i>
                                                    </div>
                                                    <h4 class="alert-heading font-size-18">Well done!</h4>
                                                    <p>
                                                        <?php
                                                        echo $_SESSION['success-message'];
                                                        $_SESSION['success-message'] = "";
                                                        ?>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } elseif (($_SESSION['is-error'] == true) && ($_SESSION['message'] == true)) {
                                $_SESSION['is-error'] = false;
                                $_SESSION['message'] = false;
                            ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card alert alert-dismissible border mt-4 mt-lg-0 p-0 mb-0">
                                            <div class="card-header bg-soft-danger">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                                </button>
                                                <h5 class="font-size-16 text-danger my-1">Oops</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <i class="mdi mdi-alert-outline display-4 text-danger"></i>
                                                    </div>
                                                    <h4 class="alert-heading font-size-18">Something went wrong</h4>
                                                    <p> 
                                                        <?php
                                                        echo $_SESSION['error-message'];
                                                        $_SESSION['error-message'] = "";
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <form class="custom-validation"
                                action="products/add-product/store-product/store-product.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="row mb-3 mt-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Name" name="product_name"
                                            id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input"
                                        class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea required class="form-control" rows="5" placeholder="Type here"
                                            id="example-text-input" name="product_description"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" placeholder="Price"
                                            id="example-email-input" name="product_price" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Parent Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="parent_category">
                                            <option selected="">Open this select menu</option>

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
                                <div class="row mb-3">
                                    <label for="example-color-input" class="col-sm-2 col-form-label">Product
                                        Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-color w-100" id="customFile"
                                            name="product_photo" accept="image/*">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <!-- <a href="products/add-product/store-product/store-product.php"> -->
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">

                                            Submit
                                        </button>
                                        <!-- </a> -->
                                        <!-- <a href="products/products-list/display-products.php">
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </button>
                                        </a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>