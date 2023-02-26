<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div style = "margin: 20vh auto;" class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Insert Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Details</h3>
                            </div>
                            <hr>
                            <form action="categories/category-list/display-categories.php" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input id="cc-pament" name="category_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="">
                                </div>

                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Is it a sub-category?</label>
                                    <div class="col-20 col-md-20">
                                        <select name="subcategory-select" id="select" class="form-control">
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
                                        <select name="category-parent-select" id="select" class="form-control" placeholder="Disabled"
                                            disabled="">
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