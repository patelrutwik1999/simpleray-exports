<?php
include '../../config/config.php';
session_start();
function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $categoryName = $_POST['categoryname'];
    $productName = $_POST['productname'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    //Finds the category id from the category name.
    $findCategoryId = "select category_id from categories where category_name = '$categoryName'";
    $retrieved_categories = mysqli_query($conn, $findCategoryId);
    $categories = mysqli_fetch_array($retrieved_categories);
    $categoryId = $categories['category_id'];

    //Finds the product id from the product name.
    $findProductId = "select product_id from products where product_name = '$productName'";
    $retrieved_products = mysqli_query($conn, $findProductId);
    $products = mysqli_fetch_array($retrieved_products);
    $productId = $products['product_id'];

    date_default_timezone_set("Asia/Kolkata");
    $submittedOn = date("Y-m-d h:i:s");
    $inquiryId = str_replace(array('.'), '', uniqid('inqprod', true));;

    //Unread status
    $readStatus = 0;

    $insert_inquiry = "
        insert into product_inquiries(
            inquiry_id,
            first_name,
            last_name,
            email,
            phone_no,
            category_id,
            category_name,
            product_id,
            product_name,
            subject,
            description,
            submitted_on,
            read_status
        ) values (
            '$inquiryId',
            '$firstName',
            '$lastName',
            '$email',
            '$phoneNumber',
            '$categoryId',
            '$categoryName',
            '$productId',
            '$productName',
            '$subject',
            '$description',
            '$submittedOn',
            '$readStatus'
        )
    ";
    
    if (mysqli_query($conn, $insert_inquiry)) {
        mysqli_close($conn);
        $_SESSION['is-error'] = false;
        $_SESSION['message'] = true;
        $_SESSION['success-message'] = "Thank you for contacting us. We have received your inquiry. We will get back to you soon.";
        header("location:../submit-inquiry.php");
    } else {
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "Unable to receive your inquiry. Please try again";
        header("location:../submit-inquiry.php");
    }
}
?>