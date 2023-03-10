<html lang="en">

<head>
    <?php
    session_start();
    include '../../top-header.php';
    ?>
</head>

<body>
    <div id="layout-wrapper">

        <?php
        // include '../../header.php';
        // include '../../sidebar/menu-sidebar.php';
        ?>
        <div class="main-content">
            <?php
            $path = $_GET['path'];
            ?>
            <img src="<?php echo $path ?>" alt="Product Image" />
            <!-- <?php
            include '../../footer.php';
            ?> -->
        </div>
        <!-- end main content-->
    </div>
    <?php
    include '../../sub-footer.php';
    ?>
</body>

</html>