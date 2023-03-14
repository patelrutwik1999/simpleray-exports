<div class="page-content">
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Modify Product</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a
                                    href="product/products-list/display-products.php">Products</a></li>
                            <li class="breadcrumb-item active">Modify Product</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="products/add-product/insert-product.php" class="btn btn-success">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">
        <div class="page-container-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Modify Product</h4>
                            <p class="card-title-desc">You can have a view at all products and can modify or delete any
                                product you want. Clicking &nbsp; <i
                                    style="line-height: 1.5rem; margin: auto auto; font-size:larger;"
                                    class="fas fa-pencil-alt btn btn-outline-primary btn-sm edit">
                                </i> &nbsp; button will open
                                a form with detailed information of the product. You can just change the
                                content you want. <br>
                                For Delete, just click on &nbsp; <i
                                    style="line-height: 1.5rem; margin: auto auto; font-size:larger;"
                                    class="far fa-trash-alt btn btn-outline-primary btn-sm waves-effect waves-light">
                                </i>
                                &nbsp; icon.
                            </p>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Product Photo</th>
                                        <!-- <th>Want to change product photo? Upload new one.</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include '../../../config/config.php';

                                    $get_products = "select * from products";
                                    $result = mysqli_query($conn, $get_products);

                                    while ($retrieved_products = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr style="word-wrap: break-word;">
                                            <td>
                                                <?php echo $retrieved_products['product_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $retrieved_products['description'] ?>
                                            </td>
                                            <td>
                                                <?php echo $retrieved_products['price'] ?>
                                            </td>
                                            <td>
                                                <?php echo $retrieved_products['parent_category_name'] ?>
                                            </td>
                                            <td>
                                                <a href="products/view-image/view.php?path=<?php echo $retrieved_products['photo'] ?>"
                                                    target="_blank">
                                                    Image
                                                </a>
                                            </td>
                                            <td>
                                                <a href="products/edit-product/edit-product-form-base.php?product_id=<?php echo $retrieved_products['product_id']; ?>"
                                                    class="btn btn-outline-primary btn-sm edit"><i
                                                        style="line-height: 1.5rem; margin: auto auto; font-size:larger;"
                                                        class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-sm waves-effect waves-light"
                                                    id="delete_product"
                                                    data-id="<?php echo $retrieved_products['product_id'] ?>"><i
                                                        style="line-height: 1.5rem; margin: auto auto; font-size:large;"
                                                        class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
</div>