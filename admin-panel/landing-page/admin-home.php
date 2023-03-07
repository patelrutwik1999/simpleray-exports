<html lang="en">

<head>
    <?php
    session_start();
    include '../top-header.php';
    include '../../config/config.php';
    ?>
    <!-- Title Page-->
    <title>Dashboard</title>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
        include '../header-mobile.php';
        include '../sidebar/menu-sidebar.html';
        ?>
        <div class="page-container">
            <?php
            include '../header-desktop.php';
            include 'landing-page.php';
            include '../footer.php';
            ?>
        </div>

    </div>
    <?php
    include '../sub-footer.php';
    ?>
</body>

</html>