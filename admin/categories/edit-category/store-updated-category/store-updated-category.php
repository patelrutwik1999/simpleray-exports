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

    date_default_timezone_set("Asia/Kolkata");
    $updated_on = date("Y-m-d h:i:s");

    $update_category = '';
    //Removing the parent_category_id from the table and in the same time unset has_parent_category to 0 from 1.
    //Basically it remove the link with its parent category and stay as an independent category.
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
            $getParentCategoryId = "select childrenCount, hasSubCategory from categories where '$current_parent_category_id'";
            $retreivedChildrenCount = mysqli_query($conn, $getParentCategoryId);

            $childrens = $retreivedChildrenCount->fetch_assoc();
            // The parent category have more than one sub categories.

            $update_category = "update categories SET category_name = '$category_name', hasParentCategory = '0', parent_category_id = 'null', updated_on = '$updated_on' WHERE category_id = '$category_id'";
            if (mysqli_query($conn, $update_category)) {
                //Decreasing the count of children by 1.
                $childrenCount = $childrens['childrenCount'];
                $hasChildrenCategories = $childrens['hasSubCategory'];
                if ($childrenCount >= 1) {
                    $childrenCount = $childrenCount - 1;
                }
                if ($childrenCount == 0) {
                    $hasChildrenCategories = 0;
                } else {
                    $hasChildrenCategories = 1;
                }
                $updateChildrenCategories = "update categories SET hasSubCategory = '$hasChildrenCategories', childrenCount = '$childrenCount', updated_on = '$updated_on' where category_id = '$current_parent_category_id' ";
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
            $update_category = "update categories SET category_name = '$category_name', hasParentCategory = '1', parent_category_id='$parent_category_Id', updated_on='$updated_on' WHERE category_id = '$category_id'";
            if (mysqli_query($conn, $update_category)) {
                $getParentCategoryId = "select childrenCount, hasSubCategory from categories where '$current_parent_category_id'";
                $retreivedChildrenCount = mysqli_query($conn, $getParentCategoryId);
                $childrens = $retreivedChildrenCount->fetch_assoc();

                $childrenCount = $childrens['childrenCount'];
                $hasChildrenCategories = $childrens['hasSubCategory'];
                if ($childrenCount >= 1) {
                    $childrenCount = $childrenCount - 1;
                }
                if ($childrenCount == 0) {
                    $hasChildrenCategories = 0;
                } else {
                    $hasChildrenCategories = 1;
                }
                $updateChildrenCategories = "update categories SET hasSubCategory = '$hasChildrenCategories', childrenCount = '$childrenCount', updated_on = '$updated_on' where category_id = '$current_parent_category_id' ";
                if (mysqli_query($conn, $updateChildrenCategories)) {
                    //Updating its new parent category children count and hasSubCategory column(If set to 0 before).
                    $updateNewParentCategory = "select hasSubCategory, childrenCount from categories where category_id = '$parent_category_id'";
                    $retrievedNewParentCategory = mysqli_query($conn, $getParentCategoryId);
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
