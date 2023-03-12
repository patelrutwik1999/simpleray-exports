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
    $hasParentCategory = $_POST['has_parent_category'];
    $parentCategoryid = $_POST['parent_category'];

    //Category Image Processing
    //Uploads the file at specific location and stores the path info in the database
    $target_dir = "../../../assets/category-images/";
    $target_file = $target_dir . basename($_FILES["category_photo"]["name"]);

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $image = basename($_FILES["category_photo"]["name"], $imageFileType); // used to store the filename in a variable
    $imageFileType = strtolower($imageFileType);

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "The photo type is not supported. Please upload a photo of type JPG, JPEG, or PNG.";
        header("location:../insert-category.php");
    } else {
        if (move_uploaded_file($_FILES["category_photo"]["tmp_name"], $target_file)) {
            $filePathForHtml = substr($target_file, 9);
            $childrenCount = 0;
            //Setting the indian time zone.
            date_default_timezone_set("Asia/Kolkata");
            $categoryaddedon = date("Y-m-d h:i:s");
            $categoryid = str_replace(array('.'), '', uniqid('cat', true));
            echo $hasParentCategory;
            if ($hasParentCategory == 0) {
                $insert_category = "insert into categories(category_id, category_name, added_on, hasSubCategory, hasParentCategory, childrenCount, category_image) values ('$categoryid', '$categoryname', '$categoryaddedon', 0, '$hasParentCategory', '$childrenCount', '$filePathForHtml')";
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
                $getParentCurrentChildrenCount = "select childrenCount from categories where category_id = '$parentCategoryid'";
                $getParentChildrenCount = mysqli_query($conn, $getParentCurrentChildrenCount);
                $parentChildrenCount = $getParentChildrenCount->fetch_assoc();
                $updatedParentChildrenCount = $parentChildrenCount['childrenCount'] + 1;

                $update_parent_category = "update categories SET hasSubCategory = 1, childrenCount = '$updatedParentChildrenCount' where category_id = '$parentCategoryid'";
                echo $update_parent_category;
                if (mysqli_query($conn, $update_parent_category)) {
                    $insert_category = "insert into categories(category_id, category_name, added_on, hasSubCategory, hasParentCategory, parent_category_id, childrenCount, category_image) values ('$categoryid', '$categoryname', '$categoryaddedon', 0,'$hasParentCategory', '$parentCategoryid', '$childrenCount', '$filePathForHtml')";
                    echo $insert_category;
                    if (mysqli_query($conn, $insert_category)) {
                        mysqli_close($conn);
                        $_SESSION['is-error'] = false;
                        $_SESSION['message'] = true;
                        $_SESSION['success-message'] = "The category has been added.";
                        header("location:../insert-category.php");
                    } else {
                        mysqli_close($conn);
                        $_SESSION['is-error'] = true;
                        $_SESSION['message'] = true;
                        $_SESSION['error-message'] = "The category has not been added.";
                        header("location:../insert-category.php");
                    }
                } else {
                    mysqli_close($conn);
                    $_SESSION['is-error'] = false;
                    $_SESSION['message'] = true;
                    $_SESSION['error-message'] = "The parent category column has not been updated.";
                    header("location:../insert-category.php");
                }
            }
        } else {
            $_SESSION['is-error'] = true;
            $_SESSION['message'] = true;
            $_SESSION['error-message'] = "An error has encontered while saving the photo";
            header("location:../insert-category.php");
        }
    }
}
