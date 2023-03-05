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
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $description = $_POST['description'];

    date_default_timezone_set("Asia/Kolkata");
    $submittedOn = date("Y-m-d h:i:s");
    $inquiryId = uniqid('inqgen', true);

    //Unread status
    $readStatus = 0;

    $insert_inquiry = "
        insert into general_inquiries (
            inquiry_id,
            full_name,
            email,
            phone_no,
            description,
            submitted_on,
            read_status
        ) values (
            '$inquiryId',
            '$fullName',
            '$email',
            '$phoneNumber',
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
        header("location:../contact-us.php");
    } else {
        $_SESSION['is-error'] = true;
        $_SESSION['message'] = true;
        $_SESSION['error-message'] = "Unable to receive your inquiry. Please try again";
        header("location:../contact-us.php");
    }
}
?>