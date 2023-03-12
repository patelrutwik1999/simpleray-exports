<?php
$categoryid = $_GET['category_id'];
echo $categoryid;
$get_single_category = "select * from categories where category_id = '$categoryid'";
$single_category = mysqli_query($conn, $get_single_category);

$num = mysqli_num_rows($single_category);
$row = $single_category->fetch_assoc();

if ($num == 1) {
?>
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Modify Category</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray Exports Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="categories/edit-category/edit-category.php">Categories</a></li>
                                <li class="breadcrumb-item active">Modify Category</li>
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
                                <h4 class="header-title" style="color: #525ce5">Modify Category Details</h4>
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
                                                        <p>The category has been updated successfully.</p>

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
                                                        <p>Sorry ! The category has not been updated.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <form class="custom-validation" action="categories/edit-category/store-updated-category/store-updated-category.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3 mt-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Category Id</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="category_id" type="text" id="example-text-input" value="<?php echo $row['category_id'] ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Category Name" name="category_name" id="example-text-input" value="<?php echo $row['category_name']; ?>" required>
                                        </div>
                                    </div>
                                    <?php
                                    if ($row['hasSubCategory'] == 1) {
                                    ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">List of sub-categories</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="select-sub-category" aria-label="Default select example">
                                                    <option selected="">The list of Sub Categories are as follows</option>
                                                    <?php
                                                    $idToLookFor = $row['category_id'];
                                                    $getChildCategories =
                                                        "select category_id, category_name from categories where parent_category_id = '$idToLookFor'";
                                                    echo "$getChildCategories";
                                                    $retrieved_child_category_names = mysqli_query($conn, $getChildCategories);
                                                    while ($child_categories = mysqli_fetch_array($retrieved_child_category_names)) {
                                                    ?>
                                                        <option value="<?php echo $child_categories['category_id']; ?>"><?php echo $child_categories['category_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="row mb-3 mt-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Parent Category Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Category Name" id="example-text-input" value="<?php
                                                                                                                                                if ($row['hasParentCategory'] == 0) {
                                                                                                                                                    echo "No, it has no Parent Category";
                                                                                                                                                } else {
                                                                                                                                                    $categoryIdToSearch = $row['parent_category_id'];
                                                                                                                                                    $get_category_name = "select category_name from categories where category_id = '$categoryIdToSearch'";

                                                                                                                                                    $retrieved_category_name = mysqli_query($conn, $get_category_name);

                                                                                                                                                    $retrieved_category_length = mysqli_num_rows($retrieved_category_name);
                                                                                                                                                    $category_name = $retrieved_category_name->fetch_assoc();

                                                                                                                                                    if ($retrieved_category_length == 1) {
                                                                                                                                                        echo $category_name['category_name'];
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $row['parent_category_id'] ?>" name="current_parent_category_id">


                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Category Photo</label>
                                        <div class="col-sm-10">
                                            <a class="mt-1 btn btn-outline-success waves-effect waves-light" target="_blank" href="products/view-image/view.php?path=<?php echo $row['category_image'] ?>">
                                                Click here to view</a>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Do you want to change category photo?</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="change-category-image" aria-label="Default select example" required name="change_category_image">
                                                <option selected="" value="0">Want to change Parent Category Photo?
                                                </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-color-input" class="col-sm-2 col-form-label">Upload New Photo</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control form-control-color w-100" id="new-category-name" name="new_photo" accept="image/*" disabled='false' required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Do you want to change parent category?</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="change-parent-category" aria-label="Default select example" required name="change_parent_category">
                                                <option selected="" value="0">Want to change Parent Category?
                                                </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Parent Category, if applicable</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="select-parent-category" aria-label="Default select example" required name="parent_category_id" disabled="false">
                                                <option selected="" value="0">Select the list of categories</option>
                                                <?php
                                                if ($row['hasParentCategory'] == 1) {
                                                ?>
                                                    <option value="1">Make it a Parent Category</option>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                include '../../../config/config.php';
                                                $get_categories = "select category_id, category_name from categories";
                                                $retrieved_categories = mysqli_query($conn, $get_categories);
                                                while ($categories = mysqli_fetch_array($retrieved_categories)) {
                                                ?>
                                                    <option value="<?php echo $categories['category_id'] ?>"><?php echo $categories['category_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Update Details
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
<?php
}
mysqli_close($conn);
?>