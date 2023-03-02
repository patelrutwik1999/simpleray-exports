<div class="main-content">
    <h1 class="title-3 m-b-30 categories-list-title">Category list</h1>
    <hr style="height: 15px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <form class="form-header categories-list-search-bar" action="" method="POST">
                        <input class="au-input au-input--xl" style="border: 1px solid #453456; border-radius: 1rem;" type="text" name="search" placeholder="Search category name..." onkeyup="myFunction()" id="category-search-bar" />
                    </form>
                </div>
                <div class="add-category-button-section">
                    <a href="categories/add-category/insert-category.php" class='add-category'>
                        <i class="zmdi zmdi-plus"></i> Add Category
                    </a>
                </div>
            </div>

            <div class="row">
                <div style="margin: 3.5vh auto" class="col-lg-10">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning" id="category-table">
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>Category Added On</th>
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
                                        <td><?php echo $retrieved_categories['category_id']; ?></td>
                                        <td><?php echo $retrieved_categories['category_name']; ?></td>
                                        <td><?php echo $retrieved_categories['added_on']; ?></td>

                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <a href="categories/edit-category/edit-category.php?category_id=<?php echo $retrieved_categories['category_id'] ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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