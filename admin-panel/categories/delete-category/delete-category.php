<?php
include '../../../config/config.php';
session_start();
$category_id_to_delete = $_GET['category_id'];

$get_connected_category = "select category_id, category_name from add_category where parent_category_id = '$category_id_to_delete'";
$connected_categories = mysqli_query($conn, $get_connected_category);
while ($categories = mysqli_fetch_array($connected_categories)) {
    $correspond_category = $categories['category_id'];
    $delete_corresponding_categories = "delete from add_category where category_id = '$correspond_category'";
    if ($conn->query($delete_corresponding_categories) === TRUE) {
        $delete_corresponding_products = "delete from products where parent_category_id = '$correspond_category'";
        if ($conn->query($delete_corresponding_products) === TRUE) {
            echo "Successfully deleted related products and categories";
        } else {
            echo "Error deleting related products: " . $conn->error;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

//Deleting the category itself.

$category_deletion = "delete from add_category where category_id = '$category_id_to_delete'";
if ($conn->query($category_deletion) === TRUE) {
    $delete_products = "delete from products where parent_category_id = '$category_id_to_delete'";
    if ($conn->query($delete_products) === TRUE) {
        mysqli_close($conn);
        $_SESSION['is-error'] = false;
        $_SESSION['message'] = true;
        $_SESSION['success-message'] = "The category and its related sub-categories, and products are deleted.";
        header("location:../category-list/display-categories.php");
    } else {
        mysqli_close($conn);
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "The category and its related sub-categories, and products are not deleted.";
        header("location:../category-list/display-categories.php");
    }
} else {
    mysqli_close($conn);
    $_SESSION['is-error'] = false;
    $_SESSION['message'] = true;
    $_SESSION['error-message'] = "The category and its related sub-categories, and products are not deleted.";
    header("location:../category-list/display-categories.php");
}
