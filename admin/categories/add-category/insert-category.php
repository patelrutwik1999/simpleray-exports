<html lang="en">

<head>
    <!-- Title Page-->
    <title>Insert Category</title>

    <?php
    session_start();
    include '../../../config/config.php';
    include '../../top-header.php';
    ?>
</head>

<body>
    <div id="layout-wrapper">

        <?php
        include '../../header.php';
        include '../../sidebar/menu-sidebar.php';
        ?>
        <div class="main-content">
            <?php
            include 'add-category-form.php';
            include '../../footer.php';
            ?>
        </div>
        <!-- end main content-->
    </div>

    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="assets/js/pages/form-validation.init.js"></script>
    <?php
    include '../../sub-footer.php';
    ?>

</body>

</html>