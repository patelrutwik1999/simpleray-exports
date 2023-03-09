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
                                    href="inquiries/general-inquiries/all-inquiries/all-inquiries.php">General
                                    Inquiries</a></li>
                            <li class="breadcrumb-item active">All Inquiries</li>
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
                    <div class="email-rightbar mb-3 col-lg-12" style="margin: auto;">

                        <div class="card">
                            <div class="btn-toolbar p-3" role="toolbar">
                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                            class="far fa-trash-alt"></i></button>
                                </div>

                                <div class="me-2 mb-2 mb-sm-0 mt-1">
                                    <input type="text" id="search-input">

                                </div>


                            </div>
                            <ul class="message-list">
                                <?php
                                include '../../../../config/config.php';

                                $get_general_inquiries = "select * from general_inquiries order by submitted_on desc";
                                $result = mysqli_query($conn, $get_general_inquiries);
                                $num = mysqli_num_rows($result);
                                while ($retrieved_general_inquiries = mysqli_fetch_array($result)) {
                                    ?>
                                    <li>
                                        <div class="col-mail col-mail-1">
                                            <div class="checkbox-wrapper-mail">
                                                <input type="checkbox" id="chk19">
                                                <label for="chk19" class="toggle"></label>
                                            </div>
                                            <a href="#" class="title"><?php echo $retrieved_general_inquiries["full_name"]; ?></a>
                                            <!-- <span class="star-toggle far fa-star"></span> -->
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="#" class="subject"><strong><?php $retrieved_general_inquiries['subject']; ?> - </strong>
                                                <span class="teaser"><?php $retrieved_general_inquiries['description']; ?></span>
                                            </a>
                                            <div class="date"><?php $retrieved_general_inquiries['submitted_on']; ?></div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li>
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk20">
                                            <label for="chk20" class="toggle"></label>
                                        </div>
                                        <a href="#" class="title">me, Susanna (7)</a><span
                                            class="star-toggle far fa-star"></span>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="#" class="subject"><span
                                                class="bg-warning badge me-2">Freelance</span>Since you asked... and i'm
                                            inconceivably bored at the train station –
                                            <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll
                                                get back to you.</span>
                                        </a>
                                        <div class="date">Mar. 6</div>
                                    </div>
                                </li>
                            </ul>

                        </div> <!-- card -->

                        <div class="row">
                            <div class="col-7">
                                Showing 1 - 20 of 1,524
                            </div>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link">Previous</a>
                                </li>
                                <!-- <li class="page-item"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                <li class="page-item"><a class="page-link">Next</a></li>
                            </ul>
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