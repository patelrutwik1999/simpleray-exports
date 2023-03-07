<html lang="en">

<head>
    <!-- Title Page-->
    <title>Products List</title>

    <?php
    session_start();
    include '../../../config/config.php';
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
    <script>
        function searchProduct() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("product-search-bar");
            filter = input.value.toUpperCase();
            table = document.getElementById("product-table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <?php
    include '../../sub-footer.php';
    ?>
</body>

</html>