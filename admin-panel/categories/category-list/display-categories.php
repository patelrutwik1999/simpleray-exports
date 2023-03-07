<html lang="en">

<head>
    <!-- Title Page-->
    <title>Categories List</title>

    <?php
    session_start();
    include '../../../config/config.php';
    include '../../top-header.php';
    ?>
    <link href="categories/category-list/display-categories.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
        $('.trash').click(function() {
            //Getting id
            var categoryId = $(this).data('id');
            //Setting href for delete button
            $("#modal-delete").attr('href', 'categories/delete-category/delete-category.php?category_id=' + categoryId);
        })

        function searchCategory() {
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