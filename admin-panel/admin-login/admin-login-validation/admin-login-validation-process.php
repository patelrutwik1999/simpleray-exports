<?php
session_start();

function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../../config/config.php';


    $email = checkInput($_POST['email']);

    $password = checkInput($_POST['password']);
    echo $email . " " . $password;



    $sql = "select * from admin-details where email = '$email'";
    echo $sql;
    echo $conn;
    $result = mysqli_query($conn, $sql);
    echo $result;

    // $num = mysqli_num_rows($result);
    // $row = $result->fetch_assoc();
    // $passwordFromDatabase = $row["password"];

    // if ($num == 1) {
    //     #password decyption....
    //     $ciphering = "AES-128-CTR";
    //     $options = 0;

    //     // Non-NULL Initialization Vector for decryption 
    //     $decryption_iv = '1234567891011121';

    //     // Store the decryption key 
    //     $decryption_key = "kvmcvnbieoc";

    //     // Use openssl_decrypt() function to decrypt the data 
    //     $decryption = openssl_decrypt(
    //         $passwordFromDatabase,
    //         $ciphering,
    //         $decryption_key,
    //         $options,
    //         $decryption_iv
    //     );

    //     if ($password == $decryption) {
    //         $_SESSION['logged'] = true;
    //         $_SESSION['logged-in-type'] = "admin";
    //         $_SESSION['username'] = $row['name'];
    //         mysqli_close($conn);
    //         header("location:../../landing-page/admin-home.php");
    //     } else {
    //         $_SESSION['logged'] = false;
    //         $_SESSION['is-error'] = true;
    //         $_SESSION['error-desc'] = 'Wrong Password';
    //         mysqli_close($conn);
    //         header("location:../../index.php");
    //     }
    // } else {
    //     $_SESSION['is-error'] = true;
    //     $_SESSION['error-desc'] = 'The email address has not been found in the system';
    //     header("location:../../index.php");
    // }
}
