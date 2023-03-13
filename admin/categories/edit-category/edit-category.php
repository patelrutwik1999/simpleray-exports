<html lang="en">

<head>
    <title>Edit Category</title>
    <?php
    session_start();
    include '../../../config/config.php';
    include '../../top-header.php';
    ?>
    <link href="categories/edit-category/edit-categories-list.css" rel="stylesheet" media="all">

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="layout-wrapper">
        <?php
        include '../../header.php';
        include '../../sidebar/menu-sidebar.php';
        ?>
        <div class="main-content">
            <?php
            include 'edit-categories-list.php';
            include '../../footer.php';
            ?>
        </div>

    </div>

    <?php
    include '../../sub-footer.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#delete_category', function() {
                var id = $(this).data('id');

                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                                url: 'categories/delete-category/delete-category.php',
                                type: 'POST',
                                data: 'category_id=' + id,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                swal.fire('Deleted!', response.message, response.status);
                                setInterval(function() {
                                    location.reload();
                                }, 3000);
                            })
                            .fail(function() {
                                swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                            });
                    }

                })

            });
        });
    </script>

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

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
</body>

</html>