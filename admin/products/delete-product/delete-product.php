<?php
include '../../../config/config.php';
session_start();
$product_id_to_delete = $_POST['product_id'];

$responseMessage = array();

$delete_product = "delete from products where product_id = '$product_id_to_delete'";

if ($conn->query($delete_product) === TRUE) {
    mysqli_close($conn);
    $responseMessage['status'] = 'success';
    $responseMessage['message'] = " The product is deleted.";
    #  header("location:../edit-category/edit-category.php");
} else {
    mysqli_close($conn);
    $responseMessage['status'] = 'error';
    $responseMessage['message'] = "Error is occurred while deleting the product. Please try again.";
    # header("location:../category-list/display-categories.php");
}
echo json_encode($responseMessage);
?>