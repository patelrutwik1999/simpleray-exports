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

    date_default_timezone_set("Asia/Kolkata");
    $updated_on = date("Y-m-d h:i:s");


    // if (isset($_FILES) && !empty($_FILES)) {
    $filename = $_FILES["product_photo"]["name"];
    $tempname = $_FILES["product_photo"]["tmp_name"];
    $folder = "admin-panel-assets/product-images/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    // }


    //Checks the photo has been changed or not.
    //Fetches photo from database.
    $findProductPhoto = "select photo from products where product_id = '$productId'";
    $retrieved_products = mysqli_query($conn, $findProductPhoto);
    $products = mysqli_fetch_array($retrieved_products);
    $productCurrentDatabasePhoto = $products['photo'];

    //Compares the photo fetched from the database with the uploaded photo.
    //If the admin uploads the photo while updating the product then product entry will be updated with the new photo.
    //If the admin submit the form without uploading the photo then old photo will be used.
    if (strcmp($productCurrentDatabasePhoto, $folder) != 0) {
        $currentDatabasePhotoLastIndex = strripos($productCurrentDatabasePhoto, '/');
        $uploadedPhotoLastIndex = strripos($folder, '/');
        if ($uploadedPhotoLastIndex == strlen($folder) - 1) {
            $folder = $productCurrentDatabasePhoto;
        }
    }
    

    $findCategoryName = "select category_name from categories where category_id = '$parentCategoryId'";
    $retrieved_categories = mysqli_query($conn, $findCategoryName);
    $categories = mysqli_fetch_array($retrieved_categories);
    $parentCategoryName = $categories['category_name'];


    $update_product = "update products set
        product_name = '$productName',
        description = '$productDescription',
        price = '$productPrice',
        parent_category_id = '$parentCategoryId',
        parent_category_name = '$parentCategoryName',
        updated_on = '$updated_on',
        photo = '$folder'
        where product_id = '$productId'
    ";

    if (mysqli_query($conn, $update_product)) {
        mysqli_close($conn);
        $_SESSION['is-error'] = false;
        $_SESSION['message'] = true;
        $_SESSION['success-message'] = "The product has been updated.";
        echo "Success";
        header("location:../edit-product.php?product_id=$productId");
    } else {
        mysqli_close($conn);
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "The category has not been updated.";
        echo "Failure";
        header("location:../edit-product.php?product_id=$productId");
    }
}
?>