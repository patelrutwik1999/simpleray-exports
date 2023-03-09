<html lang="en">

<head>
    <!-- Title Page-->
    <title>Products List</title>

    <?php
    session_start();
    include '../../../../config/config.php';
    include '../../../top-header.php';
    ?>
    <link href="inquiries/general-inquiries/all-inquiries/all-inquiries-list.css" rel="stylesheet" media="all">
</head>

<body>
    <div id="layout-wrapper">

        <?php
        include '../../../header.php';
        include '../../../sidebar/menu-sidebar.php';
        ?>
        <div class="main-content">
            <?php
            include 'all-inquiries-list.php';
            include '../../../footer.php';
            ?>
        </div>
        <!-- end main content-->
    </div>
    <?php
    include '../../../sub-footer.php';
    ?>
    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <script>
        var itemsPerPage = 3;
        var currentPage = 1;

        function showPage(page) {
            $(".message-list li").hide();
            $(".message-list li").each(function (index) {
                if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
                    $(this).show();
                }
            });
        }

        $(".pagination li").click(function () {
            var className = $(this).attr("class");
            if (className == "page-item") {
                currentPage = $(this).index() + 1;
                showPage(currentPage);
                $(".pagination li").removeClass("active");
                $(this).addClass("active");
            }
        });

        showPage(currentPage);
        $(".pagination li:first").addClass("active");


        const searchInput = document.getElementById('search-input');
        searchInput.addEventListener('input', handleSearchInput);


        function handleSearchInput() {
            const query = searchInput.value.toLowerCase();
            const items = document.querySelectorAll('.message-list li');
            items.forEach((item) => {
                const text = item.textContent.toLowerCase();
                if (text.includes(query)) {
                item.style.display = 'block';
                } else {
                item.style.display = 'none';
                }
            });
        }

        function debounce(func, delay) {
            let timer;
            return function() {
                clearTimeout(timer);
                timer = setTimeout(() => {
                func.apply(this, arguments);
                }, delay);
            };
        }

        const debouncedSearch = debounce(handleSearchInput, 300);
        searchInput.addEventListener('input', debouncedSearch);



    </script>

</body>

</html>