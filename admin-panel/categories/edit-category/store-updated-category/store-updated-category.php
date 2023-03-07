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
    $is_subcategory = $_POST['has_sub_category'];
    $has_parent_category = $_POST['has_parent_category'];
    $parent_category_Id = $_POST['parent_category'];

    date_default_timezone_set("Asia/Kolkata");
    $updated_on = date("Y-m-d h:i:s");

    $update_category = '';
    //Removing the parent_category_id from the table and in the same time unset has_parent_category to 0 from 1.
    //Basically it remove the link with its parent category and stay as an independent category.
    if ($is_subcategory == 0) {
        $update_category = "update categories SET category_name = '$category_name', hasSubCategory = '$is_subcategory', hasParentCategory = '0', parent_category_id='NULL', updated_on='$updated_on' WHERE category_id = '$category_id'";
    } else {
        $update_category = "update categories SET category_name = '$category_name', hasSubCategory = '$is_subcategory', hasParentCategory = '$has_parent_category', parent_category_id='$parent_category_Id', updated_on='$updated_on' WHERE category_id = '$category_id'";
    }
    if (mysqli_query($conn, $update_category)) {
        mysqli_close($conn);
        $_SESSION['is-error'] = false;
        $_SESSION['message'] = true;
        $_SESSION['success-message'] = "The category has been updated.";
        header("location:../edit-category.php?category_id=$category_id");
    } else {
        mysqli_close($conn);
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "The category has not been updated.";
        header("location:../edit-category.php?category_id=$category_id");
    }
}
?>