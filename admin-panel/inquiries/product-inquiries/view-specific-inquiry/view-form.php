<?php
include '../../../../config/config.php';
$inquiryId = $_GET['inquiry_id'];

$get_single_inquiry = "select * from product_inquiries where inquiry_id = '$inquiryId'";
$single_inquiry = mysqli_query($conn, $get_single_inquiry);

$num = mysqli_num_rows($single_inquiry);
$row = $single_inquiry->fetch_assoc();

if ($num == 1) {
    ?>
    <div class="main-content" style="min-height: 80vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="edit-product-form-title">
                    Product Inquiry
                    <hr class="add-category-shine">
                </div>
                <div class="row edit-product-form">
                    <div class="col-lg-6 mb-2">
                        <div class="card">
                            <div class="card-header edit-product-heading">Inquiry Details</div>
                            <div class="card-body">
                                <form method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Inquiry Id</label>
                                        <input id="cc-pament" name="product_id" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false"
                                            value="<?php echo $row['inquiry_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Full Name</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['first_name'] . " " . $row['last_name']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Email</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['email']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Phone No</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['phone_no']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['category_name']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['product_name']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Subject</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['subject']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="textarea-input" class="form-control-label">Message</label>
                                        <textarea name="product_description" id="textarea-input" rows="3"
                                            class="form-control" aria-required="true" aria-invalid="false"><?php echo $row['description']; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Submitted On</label>
                                        <input id="cc-pament" name="product_price" type="text" class="form-control"
                                            aria-required="true" readonly aria-invalid="false" value="<?php echo $row['submitted_on']; ?>">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Processed On</label>
                                        <input id="cc-pament" readonly type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php
                                                                                                                                                            if ($row['updated_on'] == null) {
                                                                                                                                                                echo "Request has not been processed yet";
                                                                                                                                                            } else {
                                                                                                                                                                echo $row['updated_on'];
                                                                                                                                                            }
                                                                                                                                                            ?>">
                                    </div> -->

                                    <div>
                                        <button id="submit-button" type="submit" class="btn btn-lg btn-info btn-block"
                                            name="submit-button">
                                            <i class="fa fa-arrow-circle-right fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Reply</span>
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