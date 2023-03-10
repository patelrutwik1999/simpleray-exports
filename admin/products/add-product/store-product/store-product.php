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
    $productName = checkInput($_POST['product_name']);
    $productDescription = $_POST['product_description'];
    $productPrice = $_POST['product_price'];
    $parentCategoryId = $_POST['parent_category'];

    date_default_timezone_set("Asia/Kolkata");
    $productAddedOn = date("Y-m-d h:i:s");
    $productId = str_replace(array('.'), '', uniqid('prod', true));

    //Check the product name already exists or not. Because product name has a unique key index.
    $get_single_product = "select * from products where product_name = '$productName'";
    $single_product = mysqli_query($conn, $get_single_product);
    $num = mysqli_num_rows($single_product);
    $row = $single_product->fetch_assoc();

    //$num = 1 means that product name already exists.
    if ($num == 1) {
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "Product name already exists. Please change the product name.";
        header("location:../insert-product.php");
    } else {
        //Uploads the file at specific location and stores the path info in the database
        $target_dir = "../../../assets/product-images/";
        $target_file = $target_dir . basename($_FILES["product_photo"]["name"]);

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $image = basename($_FILES["product_photo"]["name"], $imageFileType); // used to store the filename in a variable
        $imageFileType = strtolower($imageFileType);

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $_SESSION['is-error'] = true;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "File format is not supported.";
            header("location:../insert-product.php");
        } else {
            if (move_uploaded_file($_FILES["product_photo"]["tmp_name"], $target_file)) {
                $filePathForHtml = substr($target_file, 9);

                //Finds the parent category name from the parent category id.
                $findCategoryName = "select category_name from categories where category_id = '$parentCategoryId'";

                $retrieved_categories = mysqli_query($conn, $findCategoryName);
                $categories = mysqli_fetch_array($retrieved_categories);
                $parentCategoryName = $categories['category_name'];

                //Inserts the record in the database.
                $insert_product = "insert into products(
                product_id,
                product_name,
                description,
                price,
                parent_category_id,
                parent_category_name,
                added_on,
                photo
            ) values (
                '$productId',
                '$productName',
                '$productDescription',
                '$productPrice',
                '$parentCategoryId',
                '$parentCategoryName',
                '$productAddedOn',
                '$filePathForHtml'
            )";

                if (mysqli_query($conn, $insert_product)) {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['success-message'] = "The product has been added.";
                    header("location:../insert-product.php");
                } else {
                    $_SESSION['is-error'] = true;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "Opps! The product has not been added.";
                    header("location:../insert-product.php");
                }
            } else {
                $_SESSION['is-error'] = true;
                $_SESSION['message'] = true;
                $_SESSION['error-message'] = "Error occurred while uploading product image. Please Try again.";
                header("location:../insert-product.php");
            }
        }
    }
}
?>