<html lang="en">

<head>
    <?php
    include '../../top-header.php';
    ?>
    <link href="products/products-list/products-list.css" rel="stylesheet" media="all">
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
            include 'products-list.php';
            include '../../footer.php';
            ?>
        </div>
    </div>
    <?php
    include '../../sub-footer.php';
    ?>
</body>

</html>