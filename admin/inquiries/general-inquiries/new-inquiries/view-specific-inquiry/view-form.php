<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Read Inquiry</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray Exports</a></li>
                            <li class="breadcrumb-item"><a
                                    href="inquiries/general-inquiries/new-inquiries/display-new-inquiries.php">New General
                                    Inquiries</a>
                            </li>
                            <li class="breadcrumb-item active">View Inquiry</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <?php

            include '../../../../../config/config.php';
            $inquiryId = $_GET['id'];

            $get_single_inquiry = "select * from general_inquiries where inquiry_id = '$inquiryId'";
            $single_inquiry = mysqli_query($conn, $get_single_inquiry);

            $num = mysqli_num_rows($single_inquiry);
            $row = $single_inquiry->fetch_assoc();

            if ($num == 1) {
                ?>


                <div class="row">
                    <div class="col-12">
                        <div class="email-rightbar mb-3" style="margin: auto;">

                            <div class="card">
                                <div class="card-body">

                                    <div class="media mb-4 mt-4">
                                        <img class="d-flex me-3 rounded-circle avatar-sm" src="assets/images/person.png"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="font-size-14 mt-1">
                                                <?php echo $row['full_name'] ?>
                                            </h5>
                                            <small class="text-muted">
                                                <?php echo $row['email'] ?>
                                            </small><br>
                                        </div>
                                    </div>

                                    <h4 class="mt-2 mb-3 font-size-22"><strong>
                                            <?php echo $row['subject'] ?>
                                        </strong></h4>

                                    <p>
                                        <?php echo $row['description'] ?>
                                    </p>
                                    <br>
                                    <br>
                                    <hr />

                                    <h4 class="mt-2 mb-3 font-size-22">Sender Information</h4>
                                    <div class="table-responsive">
                                        <table class="table mb-5">
                                            <thead>
                                                <tr>

                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone No</th>
                                                    <th>Inquiry Received</th>
                                                    <th>Last Read</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <?php echo $row['full_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['phone_no'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['submitted_on'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['updated_on'] == null) {
                                                            echo "<p>New Inquiry</p>";
                                                        } else {
                                                            echo $row['updated_on'];
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <!-- <div class="row">
                                        <div class="col-xl-2 col-6">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg"
                                                    alt="Card image cap">
                                                <div class="py-2 text-center">
                                                    <a href="" class="font-weight-medium">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-6">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg"
                                                    alt="Card image cap">
                                                <div class="py-2 text-center">
                                                    <a href="" class="font-weight-medium">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <a href="email-compose.html" class="btn btn-secondary waves-effect mt-4"><i
                                            class="mdi mdi-reply"></i>Back</a>
                                    <a href="email-compose.html" class="btn btn-secondary waves-effect mt-4"><i
                                            class="mdi mdi-reply"></i> Reply</a>
                                </div>

                            </div>
                        </div>
                        <!-- card -->
                    </div>
                </div>
            </div>
            <?php
            if ($row['read_status'] == 0) {
                $update_status = "
                    update general_inquiries set
                    read_status = 1
                    where
                    inquiry_id = '$inquiryId'
                ";
                mysqli_query($conn, $update_status);
            }
            date_default_timezone_set("Asia/Kolkata");
            $updated_on = date("Y-m-d h:i:s");

            $update_updated_on = "
                    update general_inquiries set
                    updated_on = '$updated_on'
                    where
                    inquiry_id = '$inquiryId'
                ";
            mysqli_query($conn, $update_updated_on);
            }
            ?>
    </div>
</div>