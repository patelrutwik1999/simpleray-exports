<?php
include '../../../config/config.php';
$categoryid = $_GET['category_id'];

$get_single_category = "select * from add_category where category_id = '$categoryid'";
$single_category = mysqli_query($conn, $get_single_category);

$num = mysqli_num_rows($single_category);
$row = $single_category->fetch_assoc();

if ($num == 1) {
?>
    <div class="main-content" style="min-height: 80vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="edit-category-form-title">
                    Edit Category
                    <hr class="add-category-shine">
                </div>
                <div class="row edit-category-form">
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
                            <div class="card-header edit-category-heading">Category Details</div>
                            <div class="card-body">
                                <form action="categories/edit-category/store-updated-category/store-updated-category.php" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Id</label>
                                        <input id="cc-pament" name="category_id" type="text" class="form-control" aria-required="true" readonly aria-invalid="false" value="<?php echo $row['category_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                        <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['category_name']; ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Is it a sub-category?</label>
                                        <div class="col-20 col-md-20">
                                            <select name="has_sub_category" id="select-sub-category" class="form-control">
                                                <option value="<?php echo $row['hasSubCategory']; ?>">
                                                    <?php
                                                    if ($row['hasSubCategory'] == 0) {
                                                        echo 'No';
                                                    } else {
                                                        echo 'Yes';
                                                    }
                                                    ?>
                                                </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Does it have parent
                                            category?</label>
                                        <div class="col-20 col-md-20">
                                            <select name="has_parent_category" id="select-parent-category" class="form-control" placeholder="Disabled">
                                                <option value="<?php echo $row['hasParentCategory']; ?>">
                                                    <?php
                                                    if ($row['hasParentCategory'] == 0) {
                                                        echo 'No';
                                                    } else {
                                                        echo 'Yes';
                                                    }
                                                    ?>
                                                </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Name of the parent category</label>
                                        <div class="col-20 col-md-20">
                                            <select name="parent_category" id="select-parent-category" class="form-control" placeholder="Disabled">

                                                <option value="<?php echo $row['parent_category_id']; ?>">
                                                    <?php
                                                    $categoryIdToSearch = $row['parent_category_id'];
                                                    $get_category_name = "select category_name from add_category where category_id = '$categoryIdToSearch'";

                                                    $retrieved_category_name = mysqli_query($conn, $get_category_name);

                                                    $retrieved_category_length = mysqli_num_rows($retrieved_category_name);
                                                    $category_name = $retrieved_category_name->fetch_assoc();

                                                    if ($retrieved_category_length == 1) {
                                                        echo $category_name['category_name'];
                                                    }
                                                    ?>
                                                </option>
                                                <?php
                                                $get_categories = "select category_id, category_name from add_category";
                                                $retrieved_categories = mysqli_query($conn, $get_categories);
                                                while ($categories = mysqli_fetch_array($retrieved_categories)) {
                                                ?>
                                                    <option value="<?php echo $categories['category_id'] ?>"><?php echo $categories['category_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Added On</label>
                                        <input id="cc-pament" readonly type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['added_on']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Updated On</label>
                                        <input id="cc-pament" readonly type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php
                                                                                                                                                            if ($row['updated_on'] == null) {
                                                                                                                                                                echo "Category data has not been updated yet.";
                                                                                                                                                            } else {
                                                                                                                                                                echo $row['updated_on'];
                                                                                                                                                            }
                                                                                                                                                            ?>">
                                    </div>
                                    <div>
                                        <button id="submit-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit-button">
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
<?php
}
?>