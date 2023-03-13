<?php
include '../../../config/config.php';
session_start();
$category_id_to_delete = $_POST['category_id'];

//We will check if the category has any related categories.

$getSubCategoriesQuery = "select category_id, category_name from categories where parent_category_id = '$category_id_to_delete'";
$subCategories = mysqli_query($conn, $getSubCategoriesQuery);
$numberOfSubCategories = mysqli_num_rows($subCategories);

$responseMessage = array();
//If the number of sub-categories is more than 1, then we will first delete the sub-categories, its related products and then the category itself.
if ($numberOfSubCategories >= 1) {
    while ($categories = mysqli_fetch_array($subCategories)) {
        $subCategoryId = $categories['category_id'];
        $delete_related_products = "delete from products where parent_category_id = '$subCategoryId'";
        if ($conn->query($delete_related_products) === TRUE) {
            $deleteSubCategory = "delete from categories where category_id = '$subCategoryId'";
            if ($conn->query($deleteSubCategory) === TRUE) {
                $category_deletion = "delete from categories where category_id = '$category_id_to_delete'";
                if ($conn->query($category_deletion) === TRUE) {
                    mysqli_close($conn);
                    $responseMessage['status'] = 'success';
                    $responseMessage['message'] = " 1 The category and its related sub-categories, and products are deleted.";
                    #  header("location:../edit-category/edit-category.php");
                } else {
                    mysqli_close($conn);
                    $responseMessage['status'] = 'error';
                    $responseMessage['message'] = "The category and its related sub-categories, and products are not deleted.";
                    # header("location:../category-list/display-categories.php");
                }
            } else {
                mysqli_close($conn);
                $responseMessage['status'] = 'error';
                $responseMessage['message'] = "There has been an error deleting the category.";
                # header("location:../edit-category/edit-category.php");
            }
        } else {
            mysqli_close($conn);
            $responseMessage['status'] = 'error';
            $responseMessage['message'] = "There has been error deleting the realated products of sub-categories.";
            # header("location:../edit-category/edit-category.php");
        }
    }
} else {
    $delete_products = "delete from products where parent_category_id = '$category_id_to_delete'";
    if ($conn->query($delete_products) === TRUE) {
        $category_deletion = "delete from categories where category_id = '$category_id_to_delete'";
        if ($conn->query($category_deletion) === TRUE) {
            mysqli_close($conn);
            $responseMessage['status'] = 'success';
            $responseMessage['message'] = "The category and its related sub-categories, and products are deleted.";
            #header("location:../edit-category/edit-category.php");
        } else {
            mysqli_close($conn);
            $responseMessage['status'] = 'error';
            $responseMessage['message'] = "The category and its related sub-categories, and products are not deleted.";
            #   header("location:../edit-category/edit-category.php");
        }
    } else {
        mysqli_close($conn);
        $responseMessage['status'] = 'error';
        $responseMessage['message'] = "The category and its related sub-categories, and products are not deleted.";
        #header("location:../edit-category/edit-category.php");
    }
}

echo json_encode($responseMessage);
