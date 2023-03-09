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
                            <li class="breadcrumb-item active">Categories List</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="" class="btn btn-success">Add Widget</a>
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

                            <h4 class="header-title">Categories</h4>
                            <p class="card-title-desc">You can have a view at all categories. Also, you can search any category by entering its related information.
                                You can export the data to excel or pdf, as you wish. You can remove some columns from column visibility, if you do not want it.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Parent Category, if any</th>
                                        <th>Sub Categories, if any</th>
                                        <th>Added On</th>
                                        <th>Updated On</th>
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
                                                            // echo $childCategoriesList;
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
                                            <td><?php echo $retrieved_categories['added_on']; ?></td>
                                            <td>
                                                <?php
                                                if ($retrieved_categories['updated_on'] == null) {
                                                    echo "Not updated yet";
                                                } else {
                                                    echo $retrieved_categories['updated_on'];
                                                }
                                                ?>
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