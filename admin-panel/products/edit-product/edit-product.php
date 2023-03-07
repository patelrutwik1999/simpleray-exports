<html lang="en">

<head>
    <!-- Title Page-->
    <title>Edit Product</title>

    <?php
    session_start();
    include '../../../config/config.php';
    include '../../top-header.php';
    ?>
    <link href="products/edit-product/edit-product-form.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
        include '../../header-mobile.php';
        include '../../sidebar/menu-sidebar.html';
        ?>
        <div class="page-container">
            <?php
            include '../../header-desktop.php';
            include 'edit-product-form.php';
            include '../../footer.php';
            ?>
        </div>
    </div>
    <?php
    include '../../sub-footer.php';
    ?>
</body>

</html>