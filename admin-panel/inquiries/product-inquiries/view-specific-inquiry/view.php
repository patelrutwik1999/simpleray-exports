<html lang="en">

<head>
    <!-- Title Page-->
    <title>Details</title>
    <?php
    session_start();
    include '../../../top-header.php';
    ?>
    <link href="inquiries/product-inquiries/view-specific-inquiry/view-form.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
        include '../../../header-mobile.php';
        include '../../../sidebar/menu-sidebar.html';
        ?>
        <div class="page-container">
            <?php
            include '../../../header-desktop.php';
            include 'view-form.php';
            include '../../../footer.php';
            ?>
        </div>
    </div>
    <?php
    include '../../../sub-footer.php';
    ?>
</body>

</html>