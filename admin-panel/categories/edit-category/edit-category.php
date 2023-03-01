<html lang="en">

<head>
    <?php
    include '../../top-header.php';
    ?>
    <link href="categories/edit-category/edit-category-form.css" rel="stylesheet" media="all">
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
            include 'edit-category-form.php';
            include '../../footer.php';
            ?>
        </div>
    </div>
    <script>
        document.getElementById('select-sub-category').onchange = function() {
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