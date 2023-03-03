<html lang="en">

<head>
    <?php
    session_start();
    include '../../top-header.php';
    ?>
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
            $path = $_GET['path'];
            ?>

            <img src = "<?php echo $path?>" alt = "Product Image" />

            <?php
            include '../../footer.php';
            ?>
        </div>
    </div>
    <?php
    include '../../sub-footer.php';
    ?>
</body>

</html>