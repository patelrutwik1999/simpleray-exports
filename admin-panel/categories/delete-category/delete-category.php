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
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

//Deleting the category itself.
$category_deletion = "delete from add_category where category_id = '$category_id_to_delete'";
if ($conn->query($category_deletion) === TRUE) {
    mysqli_close($conn);
    $_SESSION['is-error'] = false;
    $_SESSION['message'] = true;
    $_SESSION['success-message'] = "The category and its related sub categories are deleted.";
    header("location:../category-list/display-categories.php");
} else {
    mysqli_close($conn);
    $_SESSION['is-error'] = false;
    $_SESSION['message'] = true;
    $_SESSION['error-message'] = "The category and its related categories are not deleted.";
    header("location:../category-list/display-categories.php");
}
