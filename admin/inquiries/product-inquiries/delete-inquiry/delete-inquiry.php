<?php
include '../../../../config/config.php';
session_start();
$inquiry_id_to_delete = $_POST['inquiry_id'];

$responseMessage = array();

$delete_inquiry = "delete from product_inquiries where inquiry_id = '$inquiry_id_to_delete'";

if ($conn->query($delete_inquiry) === TRUE) {
    mysqli_close($conn);
    $responseMessage['status'] = 'success';
    $responseMessage['message'] = " The inquiry is deleted.";
    #  header("location:../edit-category/edit-category.php");
} else {
    mysqli_close($conn);
    $responseMessage['status'] = 'error';
    $responseMessage['message'] = "Error is occurred while deleting the inquiry. Please try again.";
    # header("location:../category-list/display-categories.php");
}
echo json_encode($responseMessage);
?>