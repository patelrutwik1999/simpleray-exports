<html lang="en">

<head>
    <!-- Title Page-->
    <title>Add Category</title>

    <?php
    session_start();
    include '../../../config/config.php';
    include '../../top-header.php';
    ?>
    <link href="categories/add-category/add-category-form.css" rel="stylesheet" media="all">
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
            include 'add-category-form.php';
            include '../../footer.php';
            ?>
        </div>
    </div>
    <script>
        document.getElementById('select-sub-category').onchange = function () {
            if (this.value == '0') {
                document.getElementById("select-parent-category").disabled = true;
            } else {
                document.getElementById("select-parent-category").disabled = false;
            }
        }
    </script>
    <?php
    include '../../sub-footer.php';
    ?>
</body>

</html>