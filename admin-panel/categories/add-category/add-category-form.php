<div class="main-content" style="min-height: 80vh;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="add-category-form-title">
                Insert Category
                <hr class="add-category-shine">
            </div>
            <div class="row add-category-form">
                <div class="col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header insert-category-heading">Category Details</div>
                        <div class="card-body">
                            <form action="categories/add-category/store-category/store-category.php" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Is it a sub-category?</label>
                                    <div class="col-20 col-md-20">
                                        <select name="has_sub_category" id="select-sub-category" class="form-control">
                                            <option value="2">Please select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Please select the name of the parent
                                        category (if applicable)</label>
                                    <div class="col-20 col-md-20">
                                        <select name="parent_category" id="select-parent-category" class="form-control" placeholder="Disabled" disabled='false'>
                                            <option value="2">Please select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
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