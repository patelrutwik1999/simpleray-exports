<html lang="en">

<head>
    <?php
    session_start();
    include '../../top-header.php';
    ?>
    <link href="categories/category-list/display-categories.css" rel="stylesheet" media="all">
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
            include 'categories-list.php';
            include '../../footer.php';
            ?>
        </div>
    </div>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("category-search-bar");
            filter = input.value.toUpperCase();
            table = document.getElementById("category-table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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