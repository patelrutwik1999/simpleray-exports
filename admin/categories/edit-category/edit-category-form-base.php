<html lang="en">

<head>
    <!-- Title Page-->
    <title>Modify Category</title>

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
            include 'edit-category-form.php';
            include '../../footer.php';
            ?>
        </div>
        <!-- end main content-->
    </div>

    <script>
        document.getElementById('change-category-image').onchange = function() {
            if (this.value == '0') {
                document.getElementById("new-category-name").disabled = true;
            } else {
                document.getElementById("new-category-name").disabled = false;
            }
        }

        document.getElementById('change-parent-category').onchange = function() {
            if (this.value == '0') {
                document.getElementById("select-parent-category").disabled = true;
            } else {
                document.getElementById("select-parent-category").disabled = false;
            }
        }
    </script>
    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="assets/js/pages/form-validation.init.js"></script>
    <?php
    include '../../sub-footer.php';
    ?>

</body>

</html>