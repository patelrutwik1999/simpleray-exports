<div class="main-content">
    <h1 class="title-3 m-b-30 inquiries-list-title">Inquiries List</h1>

    <hr style="height: 15px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <!-- <div class="row">
                <div class="gi-tab-title">
                    <div class="gi-pro-tab">
                        <ul class="gi-pro-tab-nav nav">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#all">All</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#snack">Snack &
                                    Spices</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#fruit">Fruits</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#veg">Vegetables</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div style="display: flex; justify-content: right;">
                <nav class="navbar navbar-dark bg-dark" style="width: 17%">
                    <a class="navbar-brand" href="#">Filter Inquiries</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">All <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="inquiries/general-inquiries/processed-inquiries/display-processed-inquiries.php">Processed</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="row">
                <form class="form-header inquiries-list-search-bar" action="" method="POST">
                    <input class="au-input au-input--xl" style="border: 1px solid #453456; border-radius: 1rem;"
                        type="text" name="search" placeholder="Search inquiry..." onkeyup="searchInquiry()"
                        id="inquiry-search-bar" />
                </form>
            </div>

            <div class="row">
                <div style="margin: 3.5vh auto" class="col-lg-10">


                    <?php
                    if (($_SESSION['is-error'] == false) && ($_SESSION['message'] == true)) {
                        $_SESSION['message'] = false;
                        ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            <?php
                            echo $_SESSION['success-message'];
                            $_SESSION['success-message'] = '';
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    } elseif (($_SESSION['is-error'] == true) && ($_SESSION['message'] == true)) {
                        $_SESSION['is-error'] = false;
                        $_SESSION['message'] = false;
                        ?>
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Oops</span>
                            <?php
                            echo $_SESSION['error-message'];
                            $_SESSION['error-message'] = '';
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="table-responsive table--no-card m-b-30" id="all">
                        <table class="table table-borderless table-striped table-earning inquiry-table"
                            id="inquiry-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Submitted On</th>
                                    <th>Last Read On</th> <!-- Display the time when the inquiry is updated -->
                                    <th>Status</th> <!-- Display the status of the inquiry (New/Old) -->
                                    <!-- <th>Replied On</th> -->
                                    <th>Action</th>
                                    <!-- <th class="text-right">price</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include '../../../../config/config.php';

                                $get_general_inquiries = "select * from general_inquiries where read_status = 1";
                                $result = mysqli_query($conn, $get_general_inquiries);
                                $num = mysqli_num_rows($result);
                                while ($retrieved_general_inquiries = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $retrieved_general_inquiries['full_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $retrieved_general_inquiries['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $retrieved_general_inquiries['phone_no']; ?>
                                        </td>
                                        <td>
                                            <?php echo $retrieved_general_inquiries['submitted_on']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($retrieved_product_inquiries['updated_on'] == null) {
                                                echo "Not opened yet";
                                            } else {
                                                echo $retrieved_product_inquiries['updated_on'];
                                            }
                                            ?>
                                        </td>
                                        <?php
                                        if ($retrieved_product_inquiries['read_status'] == 0) { ?>
                                            <td class="status--process">New</td>
                                        <?php } else { ?>
                                            <td class="status--denied">Processed</td>
                                        <?php }
                                        ?>
                                        <td>
                                            <a
                                                href="inquiries/view-specific-inquiry/view-inquiry.php?id=<?php echo $retrieved_general_inquiries['inquiry_id'] ?>">
                                                Open
                                            </a>
                                        </td>
                                        <!-- <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Edit">
                                                    <a
                                                        href="products/edit-product/edit-product.php?product_id=<?php echo $retrieved_products['product_id'] ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Delete" onclick="handleDelete()">
                                                    <a
                                                        href="products/delete-product/delete-product.php?product_id=<?php echo $retrieved_products['product_id'] ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>