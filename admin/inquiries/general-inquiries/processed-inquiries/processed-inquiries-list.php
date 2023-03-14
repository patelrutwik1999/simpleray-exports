<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


<div class="page-content">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Inbox</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray Exports</a></li>
                            <li class="breadcrumb-item"><a
                                    href="inquiries/general-inquiries/all-inquiries/display-all-inquiries.php">General
                                    Inquiries</a></li>
                            <li class="breadcrumb-item active">Processed Inquiries</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <!-- Right Sidebar -->
                    <div class="email-rightbar mb-3" style="margin: auto;">

                        <div class="card">
                            <div class="btn-toolbar p-3" role="toolbar">
                                <div class="col-md-8">
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a href="inquiries/general-inquiries/all-inquiries/display-all-inquiries.php">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect">All</button>
                                        </a>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a href="inquiries/general-inquiries/new-inquiries/display-new-inquiries.php">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect">New</button>
                                        </a>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a
                                            href="inquiries/general-inquiries/processed-inquiries/display-processed-inquiries.php">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect">processed</button>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <input class="btn-group mb-2 mb-sm-0" style="width: 100%" type="text"
                                        id="search-input" placeholder="Search...">

                                </div>
                            </div>

                            <ul class="message-list">
                                <?php
                                include '../../../../config/config.php';

                                $get_general_inquiries = "select * from general_inquiries where read_status = 1 order by submitted_on desc";
                                $result = mysqli_query($conn, $get_general_inquiries);
                                $num = mysqli_num_rows($result);

                                while ($retrieved_general_inquiries = mysqli_fetch_array($result)) {
                                    if ($retrieved_general_inquiries['read_status'] == 1) {
                                        ?>
                                        <li>
                                            <?php
                                    } else {
                                        ?>
                                        <li class="unread">
                                            <?php
                                    }
                                    ?>
                                        <div class="col-mail col-mail-1">
                                            <div>
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-sm waves-effect waves-light ms-3 mt-2"
                                                    id="delete_inquiry"
                                                    data-id="<?php echo $retrieved_general_inquiries['inquiry_id'] ?>"><i
                                                        style="line-height: 1.5rem; margin: auto auto; font-size:large;"
                                                        class="far fa-trash-alt"></i></button>
                                            </div>
                                            <a href="inquiries/general-inquiries/processed-inquiries/view-specific-inquiry/view.php?id=<?php echo $retrieved_general_inquiries['inquiry_id'] ?>"
                                                class="title">
                                                <?php echo $retrieved_general_inquiries["full_name"]; ?>
                                            </a>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="inquiries/general-inquiries/processed-inquiries/view-specific-inquiry/view.php?id=<?php echo $retrieved_general_inquiries['inquiry_id'] ?>"
                                                class="subject">
                                                <?php
                                                if ($retrieved_general_inquiries['read_status'] == 1) {
                                                    ?>
                                                    <span class="bg-danger badge me-2">
                                                        Processed
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="bg-success badge me-2">
                                                        &nbsp;&nbsp;&nbsp;New&nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <?php
                                                }
                                                ?>
                                                <strong>
                                                    <?php echo $retrieved_general_inquiries['subject']; ?> -
                                                </strong>
                                                <span class="teaser">
                                                    <?php echo $retrieved_general_inquiries['description']; ?>
                                                </span>
                                            </a>
                                            <div class="date me-4">
                                                <?php $date = substr($retrieved_general_inquiries['submitted_on'], 0, 10);
                                                $month = substr(date('F', strtotime($date)), 0, 3);
                                                $year = date('Y', strtotime($date));
                                                // // $name_day = date('l',$convert_date);
                                                $day = date('j', strtotime($date));
                                                $date_of_submission = $month . " " . $day . ", " . $year;
                                                echo $date_of_submission;
                                                ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </div> <!-- card -->

                        <?php
                        $i = 1;
                        $records_per_page = 5;
                        $sum = 0;
                        $count_query = "SELECT COUNT(*) FROM general_inquiries where read_status = 1";
                        $count_query_execute = mysqli_query($conn, $count_query);
                        $count_query_rows = mysqli_fetch_row($count_query_execute);
                        $total_records = $count_query_rows[0];
                        ?>
                        <div class="row">
                            <div class="col">
                                Found total of
                                <?php echo $total_records; ?> records
                            </div>
                            <div class="col">
                                <ul class="pagination">
                                    <!-- <li class="page-item"><a class="page-link">Previous</a></li> -->
                                    <?php
                                    while ($sum < $total_records) {
                                        ?>
                                        <li class="page-item"><a class="page-link">
                                                <?php echo $i; ?>
                                            </a></li>
                                        <?php
                                        $sum = $sum + $records_per_page;
                                        $i = $i + 1;
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- <div class="col-5">
                                                <div class="btn-group float-end">
                                                    <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                    <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div> -->
                        </div>

                    </div> <!-- end Col-9 -->

                </div>

            </div><!-- End row -->

        </div>


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->





<!-- end main content-->

<!-- END layout-wrapper -->