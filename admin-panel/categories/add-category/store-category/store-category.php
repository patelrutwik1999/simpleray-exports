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
    $categoryname = checkInput($_POST['category_name']);
    $hasParentCategory = $_POST['has_sub_category'];
    $parentCategoryid = $_POST['parent_category'];

    date_default_timezone_set("Asia/Kolkata");
    $categoryaddedon = date("Y-m-d h:i:s");
    $categoryid = str_replace(array('.'), '', uniqid('cat', true));
    echo $hasParentCategory;
    if ($hasParentCategory == 0) {
        $insert_category = "insert into add_category(category_id, category_name, added_on, hasSubCategory, hasParentCategory) values ('$categoryid', '$categoryname', '$categoryaddedon', 0, '$hasParentCategory')";
        if (mysqli_query($conn, $insert_category)) {
            mysqli_close($conn);
            $_SESSION['is-error'] = false;
            $_SESSION['message'] = true;
            $_SESSION['success-message'] = "The category has been added.";
            header("location:../insert-category.php");
        } else {
            $_SESSION['is-error'] = true;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "The category has not been added.";
            header("location:../insert-category.php");
        }
    } else {
        $update_parent_category = "update add_category SET hasSubCategory = 1 where category_id = '$parentCategoryid'";
        if (mysqli_query($conn, $update_parent_category)) {
            $insert_category = "insert into add_category(category_id, category_name, added_on, hasSubCategory, hasParentCategory, parent_category_id) values ('$categoryid', '$categoryname', '$categoryaddedon', 0,'$hasParentCategory', '$parentCategoryid')";
            if (mysqli_query($conn, $insert_category)) {
                mysqli_close($conn);
                $_SESSION['is-error'] = false;
                $_SESSION['message'] = true;
                $_SESSION['success-message'] = "The category has been added.";
                header("location:../insert-category.php");
            } else {
                mysqli_close($conn);
                $_SESSION['is-error'] = true;
                $_SESSION['message'] = true;
                $_SESSION['error-message'] = "The category has not been added.";
                header("location:../insert-category.php");
            }
        } else {
            mysqli_close($conn);
            $_SESSION['is-error'] = false;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "The parent category column has not been updated.";
            header("location:../insert-category.php");
        }
    }
}
