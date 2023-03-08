<!DOCTYPE html>
<html lang="en">

<head>
    <!-- If need to mention specific title then give it before php include -->
    <title>Login Page</title>
    <?php
    session_start();
    include 'top-header.php';
    // if (isset($_SERVER['error'])) {
    //     $error = $_SESSION['error-desc'];
    //     echo '<script>alert("Message : ' . $error . '");</script>';
    // }
    ?>

</head>

<body class="account-pages">
    <?php
    include 'admin-login/login-form.php';
    include 'sub-footer.php';
    ?>
</body>

</html>