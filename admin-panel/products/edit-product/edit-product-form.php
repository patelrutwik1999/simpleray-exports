<?php
include '../../../config/config.php';
$productId = $_GET['product_id'];

$get_single_product = "select * from products where product_id = '$productId'";
$single_product = mysqli_query($conn, $get_single_product);

$num = mysqli_num_rows($single_product);
$row = $single_product->fetch_assoc();

if ($num == 1) {
    ?>
    <div class="main-content" style="min-height: 80vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="edit-product-form-title">
                    Edit Product
                    <hr class="add-category-shine">
                </div>
                <div class="row edit-product-form">
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
                            <div class="card-header edit-product-heading">Product Details</div>
                            <div class="card-body">
                                <form action="products/edit-product/store-updated-product/store-updated-product.php"
                                    method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Id</label>
                                        <input id="cc-pament" name="product_id" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false"
                                            value="<?php echo $row['product_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="<?php echo $row['product_name']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="textarea-input" class="form-control-label">Product Description</label>
                                        <textarea name="product_description" id="textarea-input" rows="3"
                                            class="form-control" aria-required="true" aria-invalid="false"><?php echo $row['description']; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                        <input id="cc-pament" name="product_price" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="<?php echo $row['price']; ?>">
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Parent Category</label>
                                        <div class="col-20 col-md-20">
                                            <select name="parent_category" id="parent-category"
                                                class="form-control">
                                                <option value="<?php echo $row['parent_category_id']; ?>"><?php echo $row['parent_category_name']; ?></option>
                                                
                                                <?php
                                                $parent = $row['parent_category_id'];
                                                $get_categories = "select category_id, category_name from add_category where hasSubCategory = 0 and category_id != '$parent'";
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
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Added On</label>
                                        <input id="cc-pament" readonly type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['added_on']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Updated On</label>
                                        <input id="cc-pament" readonly type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php
                                                                                                                                                            if ($row['updated_on'] == null) {
                                                                                                                                                                echo "Product data has not been updated yet.";
                                                                                                                                                            } else {
                                                                                                                                                                echo $row['updated_on'];
                                                                                                                                                            }
                                                                                                                                                            ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="file-input" class=" form-control-label">Product Photo</label>
                                        <input type="file" id="file-input" name="product_photo" class="form-control-file">
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
                                            name="submit-button">
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
mysqli_close($conn);
?>