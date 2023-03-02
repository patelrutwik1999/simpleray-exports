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
    $hasSubCategory = $_POST['has_sub_category'];
    $parentCategory = $_POST['parent_category'];

    date_default_timezone_set("Asia/Kolkata");
    $categoryaddedon = date("Y-m-d h:i:s");
    $categoryid = uniqid('cat', true);
    if ($hasSubCategory == 0) {
        $insert_category = "insert into add_category(category_id, category_name, added_on, hasSubCategory, hasParentCategory) values ('$categoryid', '$categoryname', '$categoryaddedon', '$hasSubCategory', 0)";
        echo $insert_category;
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
        $insert_category = "insert into add_category(category_id, category_name, added_on, hasSubCategory, hasParentCategory) values ('$categoryid', '$categoryname', '$categoryaddedon', '$hasSubCategory', 1)";
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
    }
}
