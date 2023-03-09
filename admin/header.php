<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark mt-0">
                    <span class="logo-sm mt-3">
                        <img src="assets/images/favicon.png" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-1.png" alt="" height="80">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                    data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-none d-md-block ms-2">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="me-2" src="assets/images/flags/us.jpg" alt="Header Language" height="16"> English
                    <!-- <span class="mdi mdi-chevron-down"></span> -->
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>


            <?php
            $status = 0;
            $get_general_inquiries = "select * from general_inquiries where read_status = '$status'";
            $general_inquiries_result = mysqli_query($conn, $get_general_inquiries);
            $general_inquiries_num = mysqli_num_rows($general_inquiries_result);

            $get_product_inquiries = "select * from product_inquiries where read_status = '$status'";
            $product_inquiries_result = mysqli_query($conn, $get_product_inquiries);
            $product_inquiries_num = mysqli_num_rows($product_inquiries_result);
            ?>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline bx-tada"></i>

                    <?php
                    if ($general_inquiries_num != 0 || $product_inquiries_num !== 0) {
                        ?>

                        <span class="badge bg-danger rounded-pill">
                            <?php echo $general_inquiries_num + $product_inquiries_num; ?>
                        </span>

                        <?php
                    }
                    ?>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="inquiries/general-inquiries/all-inquiries/display-all-inquiries.php" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <!-- <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart text-white"></i>
                                    </span> -->
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">
                                        General Inquiries
                                    </h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">You have
                                            <?php echo $general_inquiries_num ?> new inquiries
                                        </p>
                                    </div>
                                </div>
                                <div class="avatar-xs me-3">
                                    <!-- <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart text-white"></i>
                                    </span> -->
                                </div>
                            </div>
                        </a>
                        <a href="inquiries/product-inquiries/all-inquiries/display-all-inquiries.php" class="text-reset notification-item">
                        <div class="media">
                                <div class="avatar-xs me-3">
                                    <!-- <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart text-white"></i>
                                    </span> -->
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">
                                        Product Inquiries
                                    </h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">You have
                                            <?php echo $product_inquiries_num ?> new inquiries
                                        </p>
                                    </div>
                                </div>
                                <div class="avatar-xs me-3">
                                    <!-- <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart text-white"></i>
                                    </span> -->
                                </div>
                            </div>
                        </a>
                        <!-- <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="mdi mdi-check text-white"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a> -->

                        <!-- <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-xs"
                                    alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a> -->
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-7.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">
                        <?php echo $_SESSION['username']; ?>
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-wallet-outline font-size-16 align-middle me-1"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-end">11</span><i
                            class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-lock-open-outline font-size-16 align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#"><i
                            class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline font-size-20"></i>
                </button>
            </div>

        </div>
    </div>
</header>