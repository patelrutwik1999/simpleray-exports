<div class="page-content">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Add Category</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray Exports Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="categories/category-list/display-categories.php">Categories</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
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
                            <h4 class="header-title" style="color: #525ce5">Insert Category Details</h4>
                            <!-- Checking whether the category has been added successfully or not. -->
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
                                                    <p>The category has been added successfully.</p>

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
                                                    <p>Sorry ! The category was not added.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each
                                                textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p> -->
                            <form class="custom-validation" action="categories/add-category/store-category/store-category.php" method="POST">
                                <div class="row mb-3 mt-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Category Name" name="category_name" id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Is it a sub-category?</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="select-sub-category" aria-label="Default select example" required name="has_parent_category">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Parent Category, if applicable</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="select-parent-category" aria-label="Default select example" required name="parent_category" disabled='false'>
                                            <option selected="">Open this select menu</option>

                                            <?php
                                            include '../../../config/config.php';
                                            $get_categories = "select category_id, category_name from categories";
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
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Submit Details
                                        </button>
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