<html lang="en">

<head>
    <!-- Title Page-->
    <title>Dashboard | Simpleray Exports</title>
    <?php
    session_start();
    include '../top-header.php';
    
    include '../../config/config.php';
    ?>
    

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php
        include '../header.php';
        include '../sidebar/menu-sidebar.php';
        ?>
        <div class="main-content">
            <?php
            include 'landing-page.php';
            include '../footer.php';
            ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?php
    include '../sidebar/right-sidebar.html';
    include '../sub-footer.php';
    ?>
</body>

</html>