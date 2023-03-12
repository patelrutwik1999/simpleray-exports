<?php
include '../../../../config/config.php';
session_start();
function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = checkInput($_POST['category_name']);
    $change_parent_category = $_POST['change_parent_category'];
    $parent_category_Id = $_POST['parent_category_id'];
    $current_parent_category_id = $_POST['current_parent_category_id'];


    //New category photo
    $change_current_photo = $_POST['change_category_image'];
    $new_photo = $_POST['new_photo'];

    date_default_timezone_set("Asia/Kolkata");
    $updated_on = date("Y-m-d h:i:s");

    //Removing the parent_category_id from the table and in the same time unset has_parent_category to 0 from 1.
    //Basically it remove the link with its parent category and stay as an independent category.

    //If the user wants to update the category photo
    if ($change_current_photo == 1) {
        //Uploads the file at specific location and stores the path info in the database
        $target_dir = "../../../assets/category-images/";
        $target_file = $target_dir . basename($_FILES["new_photo"]["name"]);

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $image = basename($_FILES["new_photo"]["name"], $imageFileType); // used to store the filename in a variable
        $imageFileType = strtolower($imageFileType);

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $_SESSION['is-error'] = true;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "The photo type is not supported. Please upload a photo of type JPG, JPEG, or PNG.";
            header("location:../edit-category-form-base.php?category_id=$category_id");
        } else {
            if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file)) {
                $filePathForHtml = substr($target_file, 9);

                $updatePhoto = "update categories SET category_image = '$filePathForHtml' where category_id = '$category_id'";
                if (mysqli_query($conn, $updatePhoto)) {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['success-message'] = "The photo has been updated.";
                    header("location:../edit-category-form-base.php?category_id=$category_id");
                } else {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = true;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "The photo has not been updated.";
                    header("location:../edit-category-form-base.php?category_id=$category_id");
                }
            } else {
                $_SESSION['is-error'] = true;
                $_SESSION['message'] = true;
                $_SESSION['error-message'] = "An error has encontered while saving the photo";
                header("location:../edit-category-form-base.php?category_id=$category_id");
            }
        }
    }

    //There is just the change for name. No other changes.
    if ($change_parent_category == 0) {
        $update_category = "update categories SET category_name = '$category_name', updated_on='$updated_on' WHERE category_id = '$category_id'";

        if (mysqli_query($conn, $update_category)) {
            echo $update_category;
            mysqli_close($conn);
            $_SESSION['is-error'] = false;
            $_SESSION['message'] = true;
            $_SESSION['success-message'] = "The category has been updated.";
            header("location:../edit-category-form-base.php?category_id=$category_id");
        } else {
            mysqli_close($conn);
            $_SESSION['is-error'] = false;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating the category details.";
            header("location:../edit-category-form-base.php?category_id=$category_id");
        }
    } else {
        // The parent category has not been changed but the change_parent_category has been set to YES.
        if ($parent_category_Id == 0) {
            $update_category = "update categories SET category_name = '$category_name', updated_on='$updated_on' WHERE category_id = '$category_id'";
            if (mysqli_query($conn, $update_category)) {
                mysqli_close($conn);
                $_SESSION['is-error'] = false;
                $_SESSION['message'] = true;
                $_SESSION['success-message'] = "The category has been updated.";
                header("location:../edit-category-form-base.php?category_id=$category_id");
            } else {
                mysqli_close($conn);
                $_SESSION['is-error'] = false;
                $_SESSION['message'] = true;
                $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating the category details.";
                header("location:../edit-category-form-base.php?category_id=$category_id");
            }
        }
        //Needs to change the sub category and make it a parent category.
        elseif ($parent_category_Id == 1) {

            $update_category = "update categories SET category_name = '$category_name', hasParentCategory = '0', parent_category_id = 'null', updated_on = '$updated_on' WHERE category_id = '$category_id'";
            if (mysqli_query($conn, $update_category)) {
                $getParentCategoryId = "select childrenCount, hasSubCategory from categories where category_id = '$current_parent_category_id'";

                $retreivedChildrenCount = mysqli_query($conn, $getParentCategoryId);

                $childrens = $retreivedChildrenCount->fetch_assoc();
                // The parent category have more than one sub categories.

                //Decreasing the count of children by 1.
                $childrenCount = $childrens['childrenCount'];
                $hasChildrenCategories = $childrens['hasSubCategory'];
                echo $childrens['childrenCount'];
                if ($childrenCount > 0) {
                    $childrenCount = $childrenCount - 1;
                } else {
                    $childrenCount = 0;
                }
                // echo $childrenCount + "<br>";
                if ($childrenCount == 0) {
                    $hasChildrenCategories = 0;
                } else {
                    $hasChildrenCategories = 1;
                }

                $updateChildrenCategories = "update categories SET hasSubCategory = '$hasChildrenCategories', childrenCount = '$childrenCount', updated_on = '$updated_on' where category_id = '$current_parent_category_id' ";
                echo $updateChildrenCategories;
                if (mysqli_query($conn, $updateChildrenCategories)) {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['success-message'] = "The category has been updated.";
                    header("location:../edit-category-form-base.php?category_id=$category_id");
                } else {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating its parent category.";
                    header("location:../edit-category-form-base.php?category_id=$category_id");
                }
            } else {
                mysqli_close($conn);
                $_SESSION['is-error'] = false;
                $_SESSION['message'] = true;
                $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating the category details.";
                header("location:../edit-category-form-base.php?category_id=$category_id");
            }
        }
        // The parent of the sub category has been changed. 
        else {

            //Check if the parent already has a sub-category.
            if ($current_parent_category_id == "") {
                // echo $current_parent_category_Id;
                $update_category = "update categories SET category_name = '$category_name', hasParentCategory = '1', parent_category_id='$parent_category_Id', updated_on='$updated_on' WHERE category_id = '$category_id'";
                if (mysqli_query($conn, $update_category)) {
                    //Updating its new parent category children count and hasSubCategory column(If set to 0 before).
                    $getParentCategoryId = "select hasSubCategory, childrenCount from categories where category_id = '$parent_category_Id'";
                    echo $updateNewParentCategory;
                    $retrievedNewParentCategory = mysqli_query($conn, $getParentCategoryId);
                    $newParentCategory = $retrievedNewParentCategory->fetch_assoc();
                    // echo $newParentCategory['childrenCount'];
                    $parentChildrenCount = $newParentCategory['childrenCount'];
                    $parentHasChildrenCategories = $newParentCategory['hasSubCategory'];

                    //If the children count and hasSubCategory is zero then directly add 1 or in case of more than one children count just update the children count.
                    if ($parentChildrenCount == 0 && $parentHasChildrenCategories == 0) {
                        $parentChildrenCount = 1;
                        $parentHasChildrenCategories = 1;
                    } else {
                        $parentChildrenCount = $parentChildrenCount + 1;
                    }
                    $updateNewParentCategory = "update categories SET hasSubCategory = '$parentHasChildrenCategories', childrenCount = '$parentChildrenCount', updated_on = '$updated_on'  where category_id = '$parent_category_Id'";

                    if (mysqli_query($conn, $updateNewParentCategory)) {
                        mysqli_close($conn);
                        $_SESSION['is-error'] = false;
                        $_SESSION['message'] = true;
                        $_SESSION['success-message'] = "The category has been updated.";
                        header("location:../edit-category-form-base.php?category_id=$category_id");
                    } else {
                        mysqli_close($conn);
                        $_SESSION['is-error'] = false;
                        $_SESSION['message'] = true;
                        $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating its new parent category.";
                        header("location:../edit-category-form-base.php?category_id=$category_id");
                    }
                } else {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating the current category.";
                    header("location:../edit-category-form-base.php?category_id=$category_id");
                }
            } else {
                $update_category = "update categories SET category_name = '$category_name', hasParentCategory = '1', parent_category_id='$parent_category_Id', updated_on='$updated_on' WHERE category_id = '$category_id'";
                echo $current_parent_category_Id;
                if (mysqli_query($conn, $update_category)) {
                    $getParentCategoryId = "select childrenCount, hasSubCategory from categories where category_id = '$current_parent_category_id'";
                    $retreivedChildrenCount = mysqli_query($conn, $getParentCategoryId);
                    $childrens = $retreivedChildrenCount->fetch_assoc();

                    $childrenCount = $childrens['childrenCount'];
                    $hasChildrenCategories = $childrens['hasSubCategory'];
                    if ($childrenCount > 0) {
                        $childrenCount = $childrenCount - 1;
                    } else {
                        $childrenCount = 0;
                    }
                    if ($childrenCount == 0) {
                        $hasChildrenCategories = 0;
                    } else {
                        $hasChildrenCategories = 1;
                    }
                    $updateChildrenCategories = "update categories SET hasSubCategory = '$hasChildrenCategories', childrenCount = '$childrenCount', updated_on = '$updated_on' where category_id = '$current_parent_category_id' ";
                    if (mysqli_query($conn, $updateChildrenCategories)) {
                        //Updating its new parent category children count and hasSubCategory column(If set to 0 before).
                        $updateNewParentCategory = "select hasSubCategory, childrenCount from categories where category_id = '$parent_category_Id'";
                        $retrievedNewParentCategory = mysqli_query($conn, $updateNewParentCategory);
                        $newParentCategory = $retrievedNewParentCategory->fetch_assoc();

                        $parentChildrenCount = $newParentCategory['childrenCount'];
                        $parentHasChildrenCategories = $newParentCategory['hasSubCategory'];

                        //If the children count and hasSubCategory is zero then directly add 1 or in case of more than one children count just update the children count.
                        if ($parentChildrenCount == 0 && $parentHasChildrenCategories == 0) {
                            $parentChildrenCount = 1;
                            $parentHasChildrenCategories = 1;
                        } else {
                            $parentChildrenCount = $parentChildrenCount + 1;
                        }
                        $updateNewParentCategory = "update categories SET hasSubCategory = '$parentHasChildrenCategories', childrenCount = '$parentChildrenCount', updated_on = '$updated_on'  where category_id = '$parent_category_Id'";
                        if (mysqli_query($conn, $updateNewParentCategory)) {
                            mysqli_close($conn);
                            $_SESSION['is-error'] = false;
                            $_SESSION['message'] = true;
                            $_SESSION['success-message'] = "The category has been updated.";
                            header("location:../edit-category-form-base.php?category_id=$category_id");
                        } else {
                            mysqli_close($conn);
                            $_SESSION['is-error'] = false;
                            $_SESSION['message'] = true;
                            $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating its new parent category.";
                            header("location:../edit-category-form-base.php?category_id=$category_id");
                        }
                    } else {
                        mysqli_close($conn);
                        $_SESSION['is-error'] = false;
                        $_SESSION['message'] = true;
                        $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating its current parent category.";
                        header("location:../edit-category-form-base.php?category_id=$category_id");
                    }
                } else {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "The category has not been updated because an error has been caused while updating the category details.";
                    header("location:../edit-category-form-base.php?category_id=$category_id");
                }
            }
        }
    }
}
