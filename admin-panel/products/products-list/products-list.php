<div class="main-content">
    <h1 class="title-3 m-b-30 products-list-title">Products list</h1>

    <hr style="height: 15px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <form class="form-header products-list-search-bar" action="" method="POST">
                        <input class="au-input au-input--xl" style="border: 1px solid #453456; border-radius: 1rem;"
                            type="text" name="search" placeholder="Search product name..." onkeyup="myFunction()"
                            id="product-search-bar" />
                    </form>
                </div>

                <div class="add-product-button-section">
                    <a href="products/add-product/insert-product.php" class='add-product'>
                        <i class="zmdi zmdi-plus"></i> Add product
                    </a>
                </div>

            </div>
            <div class="row">
                <div style="margin: 3.5vh auto" class="col-lg-10">


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


                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning" id="product-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                    <!-- <th class="text-right">price</th> -->
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
                                            Image
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Edit">
                                                    <a href="products/edit-product/edit-product.php">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>