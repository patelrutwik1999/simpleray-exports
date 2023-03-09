<html lang="en">

<head>
    <!-- Title Page-->
    <title>View Inquiry</title>

    <?php
    session_start();
    include '../../../../config/config.php';
    include '../../../top-header.php';
    ?>
    <link href="inquiries/general-inquiries/view-specific-inquiry/view-form.css" rel="stylesheet" media="all">
</head>

<body>
    <div id="layout-wrapper">

        <?php
        include '../../../header.php';
        include '../../../sidebar/menu-sidebar.php';
        ?>
        <div class="main-content">
            <?php
            include 'view-form.php';
            include '../../../footer.php';
            ?>
        </div>
        <!-- end main content-->
    </div>
    <?php
    include '../../../sidebar/right-sidebar.html';
    include '../../../sub-footer.php';
    ?>
</body>

</html>