<div class="page-content">
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Categories List</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="categories/category-list/display-categories.php">Categories</a></li>
                            <li class="breadcrumb-item active">Modify Categories List</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="categories/add-category/insert-category.php" class="btn btn-success">Add Category</a>
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

                            <h4 class="header-title">Modify Categories</h4>
                            <p class="card-title-desc">You can have a view at all categories and can modify or delete any category you want. Clicking &nbsp; <i style="line-height: 1.5rem; margin: auto auto; font-size:larger;" class="fas fa-pencil-alt btn btn-outline-primary btn-sm edit">
                                </i> &nbsp; button it
                                will open a form with detailed information of the category.You can just change the content you want. <br>
                                For Delete, just click on &nbsp; <i style="line-height: 1.5rem; margin: auto auto; font-size:larger;" class="far fa-trash-alt btn btn-outline-primary btn-sm waves-effect waves-light">
                                </i>
                                &nbsp; icon.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Parent Category, if any</th>
                                        <th>Sub Categories, if any</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include '../../../config/config.php';

                                    $get_categories = "select * from categories";
                                    $result = mysqli_query($conn, $get_categories);

                                    while ($retrieved_categories = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr style="word-wrap: break-word;">
                                            <td><?php echo $retrieved_categories['category_name']; ?></td>
                                            <td>
                                                <a href="categories/view-image/view-image.php?path=<?php echo $retrieved_categories['category_image'] ?>">
                                                    Image
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                if ($retrieved_categories['hasParentCategory'] == 1) {
                                                    $categoryIdToSearch = $retrieved_categories['parent_category_id'];
                                                    $get_category_name = "select category_name from categories where category_id = '$categoryIdToSearch'";

                                                    $retrieved_category_name = mysqli_query($conn, $get_category_name);

                                                    $retrieved_category_length = mysqli_num_rows($retrieved_category_name);
                                                    $category_name = $retrieved_category_name->fetch_assoc();

                                                    if ($retrieved_category_length == 1) {
                                                        echo $category_name['category_name'];
                                                    }
                                                } else {
                                                    echo "No parent-category";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($retrieved_categories['hasSubCategory'] == 1) {
                                                    $idToLookFor = $retrieved_categories['category_id'];
                                                    $getChildCategories =
                                                        "select category_name from categories where parent_category_id = '$idToLookFor'";
                                                    $retrieved_child_category_names = mysqli_query($conn, $getChildCategories);
                                                    // echo $getChildCategories;
                                                    $childCategoriesList = "";
                                                    while ($child_categories = mysqli_fetch_array($retrieved_child_category_names)) {
                                                        if ($childCategoriesList == "") {
                                                            $childCategoriesList = $child_categories['category_name'];
                                                        } else {
                                                            $childCategoriesList = $childCategoriesList . ", <br> " . $child_categories['category_name'];
                                                        }
                                                    }
                                                    $childCategoriesList = ltrim($childCategoriesList, ",");
                                                    echo rtrim($childCategoriesList, ",");
                                                } else {
                                                    echo "No sub-category";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="categories/edit-category/edit-category-form-base.php?category_id=<?php echo $retrieved_categories['category_id']; ?>" class="btn btn-outline-primary btn-sm edit"><i style="line-height: 1.5rem; margin: auto auto; font-size:larger;" class="fas fa-pencil-alt"></i> </a>
                                                <a href="categories/delete-category/delete-category.php?category_id=<?php echo $retrieved_categories['category_id']; ?>" class="btn btn-outline-primary btn-sm waves-effect waves-light"><i style="line-height: 1.5rem; margin: auto auto; font-size:larger;" class="far fa-trash-alt"></i></a>
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