<?php
include '../../../config/config.php';
session_start();
$product_id_to_delete = $_GET['product_id'];

//Deleting the category itself.
$category_deletion = "delete from products where product_id = '$product_id_to_delete'";
if ($conn->query($category_deletion) === TRUE) {
    mysqli_close($conn);
    $_SESSION['is-error'] = false;
    $_SESSION['message'] = true;
    $_SESSION['success-message'] = "The selected product is deleted.";
    header("location:../products-list/display-products.php");
} else {
    mysqli_close($conn);
    $_SESSION['is-error'] = false;
    $_SESSION['message'] = true;
    $_SESSION['error-message'] = "Error! The selected product cannot be deleted.";
    header("location:../products-list/display-products.php");
}
