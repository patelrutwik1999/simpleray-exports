<div class="page-content">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Products List</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray-Exports</a></li>
                            <li class="breadcrumb-item"><a
                                    href="products/products-list/display-products.php">Products</a></li>
                            <li class="breadcrumb-item active">Products List</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="products/add-products/insert-product.php" class="btn btn-success">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Buttons example</h4>
                            <p class="card-title-desc">The Buttons extension for DataTables
                                provides a common set of options, API methods and styling to display
                                buttons on a page that will interact with a DataTable. The core library
                                provides the based framework upon which plug-ins can built.
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
                                        <th>Photo</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>


                                <tbody>

                                    <?php
                                    include '../../../config/config.php';

                                    $get_products = "select * from products";
                                    $result = mysqli_query($conn, $get_products);
                                    $num = mysqli_num_rows($result);
                                    while ($retrieved_products = mysqli_fetch_array($result)) {
                                        ?>

                                        <tr>
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
                                                <a
                                                    href="products/view-image/view.php?path=<?php echo $retrieved_products['photo'] ?>">
                                                    Image
                                                </a>
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


    </div> <!-- container-fluid -->
</div>