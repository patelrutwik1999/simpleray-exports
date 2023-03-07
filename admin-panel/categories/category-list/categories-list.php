<div class="main-content">

    <h1 class="title-3 m-b-30 categories-list-title">Category list
    </h1>

    <hr style=" height: 15px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);">
    <div class="section__content section__content--p30">
        <div class="container-fluid">


            <div class="row">

                <div style="margin: 3.5vh auto" class="col-lg-10">
                    <div class="row">
                        <div class="search-and-add-category">
                            <form class="form-header categories-list-search-bar" action="" method="POST">
                                <input class="au-input au-input--xl" style="border: 1px solid #453456; border-radius: 1rem;" type="text" name="search" placeholder="Search category name..." onkeyup="searchCategory()" id="category-search-bar" />
                            </form>
                        </div>
                        <div class="search-and-add-category">
                            <a href=" categories/add-category/insert-category.php" class='add-category'>
                                <i class="zmdi zmdi-plus"></i> Add Category
                            </a>
                        </div>
                    </div>

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

                        <table class="table table-borderless table-striped table-earning" id="category-table">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Added On</th>
                                    <th>Category Last Updated</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../../config/config.php';

                                $get_categories = "select * from add_category";
                                $result = mysqli_query($conn, $get_categories);
                                $num = mysqli_num_rows($result);

                                while ($retrieved_categories = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $retrieved_categories['category_name']; ?></td>
                                        <td><?php echo $retrieved_categories['added_on']; ?></td>
                                        <td><?php echo $retrieved_categories['updated_on']; ?></td>

                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <a href="categories/edit-category/edit-category.php?category_id=<?php echo $retrieved_categories['category_id'] ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </button>
                                                <button class="trash item" data-id="<?php echo $retrieved_categories['category_id']; ?>" data-toggle="modal" data-placement="top" data-target="#mediumModal" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">WARNING!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure, you want to delete this category?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a style="color:white" id="modal-delete" href="" class="btn btn-primary">Confirm</a>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal End -->