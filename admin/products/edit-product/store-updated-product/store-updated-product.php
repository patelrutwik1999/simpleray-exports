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
    $productId = $_POST['product_id'];
    $productName = checkInput($_POST['product_name']);
    $productDescription = $_POST['product_description'];
    $productPrice = $_POST['product_price'];
    $parentCategoryId = $_POST['parent_category'];
    $changePhoto = $_POST['change_photo'];

    date_default_timezone_set("Asia/Kolkata");
    $updated_on = date("Y-m-d h:i:s");

    //Fetch category name to add category name in the product table.
    $findCategoryName = "select category_name from categories where category_id = '$parentCategoryId'";
    $retrieved_categories = mysqli_query($conn, $findCategoryName);
    $categories = mysqli_fetch_array($retrieved_categories);
    $parentCategoryName = $categories['category_name'];

    // //Check the product name already exists or not. Because product name has a unique key index.
    // $get_single_product = "select * from products where product_name = '$productName'";
    // $single_product = mysqli_query($conn, $get_single_product);
    // $num = mysqli_num_rows($single_product);
    // $row = $single_product->fetch_assoc();

    // //$num = 1 means that product name already exists.
    // if ($num == 1) {
    //     $_SESSION['is-error'] = false;
    //     $_SESSION['message'] = true;
    //     $_SESSION['error-message'] = "The product name already exist. Please change the product name.";
    //     header("location:../edit-product-form-base.php?product_id=$productId");
    // } else {
    if ($changePhoto == '0') {
        $update_product = "update products set
            product_name = '$productName',
            description = '$productDescription',
            price = '$productPrice',
            parent_category_id = '$parentCategoryId',
            parent_category_name = '$parentCategoryName',
            updated_on = '$updated_on',
            where product_id = '$productId'
            ";

        if (mysqli_query($conn, $update_product)) {
            mysqli_close($conn);
            $_SESSION['is-error'] = false;
            $_SESSION['message'] = true;
            $_SESSION['success-message'] = "The product has been updated.";
            header("location:../edit-product-form-base.php?product_id=$productId");
        } else {
            mysqli_close($conn);
            $_SESSION['is-error'] = true;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "The product has not been updated.";
            header("location:../edit-product-form-base.php?product_id=$productId");
        }
    } else {
        //Uploads the file at specific location and stores the path info in the database
        $target_dir = "../../../assets/product-images/";
        $target_file = $target_dir . basename($_FILES["new_photo"]["name"]);

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $image = basename($_FILES["new_photo"]["name"], $imageFileType); // used to store the filename in a variable
        $imageFileType = strtolower($imageFileType);

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {

            mysqli_close($conn);
            $_SESSION['is-error'] = true;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "File format is not supported.";
            header("location:../edit-product-form-base.php?product_id=$productId");

        } else {
            if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file)) {

                $filePathForHtml = substr($target_file, 9);

                $update_product = "update products set
                    product_name = '$productName',
                    description = '$productDescription',
                    price = '$productPrice',
                    parent_category_id = '$parentCategoryId',
                    parent_category_name = '$parentCategoryName',
                    updated_on = '$updated_on',
                    photo = '$filePathForHtml'
                    where product_id = '$productId'
                    ";

                if (mysqli_query($conn, $update_product)) {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = true;
                    $_SESSION['message'] = true;
                    $_SESSION['success-message'] = "The product has been updated.";
                    header("location:../edit-product-form-base.php?product_id=$productId");
                } else {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = true;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "The product has not been updated.";
                    header("location:../edit-product-form-base.php?product_id=$productId");
                }
            } else {
                mysqli_close($conn);
                $_SESSION['is-error'] = true;
                $_SESSION['message'] = true;
                $_SESSION['error-message'] = "Error is occurred in uploading image. Please try again.";
                header("location:../edit-product-form-base.php?product_id=$productId");
            }
        }
    }
}

// //Checks the photo has been changed or not.
// //Fetches photo from database.
// $findProductPhoto = "select photo from products where product_id = '$productId'";
// $retrieved_products = mysqli_query($conn, $findProductPhoto);
// $products = mysqli_fetch_array($retrieved_products);
// $productCurrentDatabasePhoto = $products['photo'];

// //Compares the photo fetched from the database with the uploaded photo.
// //If the admin uploads the photo while updating the product then product entry will be updated with the new photo.
// //If the admin submit the form without uploading the photo then old photo will be used.
// if (strcmp($productCurrentDatabasePhoto, $filePathForHtml) != 0) {
//     $currentDatabasePhotoLastIndex = strripos($productCurrentDatabasePhoto, '/');
//     $uploadedPhotoLastIndex = strripos($filePathForHtml, '/');
//     if ($uploadedPhotoLastIndex == strlen($filePathForHtml) - 1) {
//         $filePathForHtml = $productCurrentDatabasePhoto;
//     }
// }

?>