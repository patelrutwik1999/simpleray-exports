<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search here..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>

                <div class="header-button">

                    <?php

                    $status = 0;
                    $get_general_inquiries = "select * from general_inquiries where read_status = '$status'";
                    $general_inquiries_result = mysqli_query($conn, $get_general_inquiries);
                    $general_inquiries_num = mysqli_num_rows($general_inquiries_result);

                    $get_product_inquiries = "select * from product_inquiries where read_status = '$status'";
                    $product_inquiries_result = mysqli_query($conn, $get_product_inquiries);
                    $product_inquiries_num = mysqli_num_rows($product_inquiries_result);

                    ?>

                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-email"></i>
                            <?php
                            if ($general_inquiries_num != 0 || $product_inquiries_num !== 0) {
                                ?>
                                <span class="quantity">
                                    <?php echo $general_inquiries_num + $product_inquiries_num; ?>
                                </span>
                                <?php
                            }
                            ?>
                            <div class="email-dropdown js-dropdown">
                                <div class="email__title">
                                    <p>You have
                                        <?php echo $general_inquiries_num + $product_inquiries_num; ?> new inquiries
                                    </p>
                                </div>
                                <div class="email__item">
                                    <div class="content">
                                        <p>
                                            <a
                                                href="inquiries/general-inquiries/all-inquiries/display-all-inquiries.php">General
                                                Inquiries
                                            </a>
                                        </p>
                                        <span>You have
                                            <?php echo $general_inquiries_num ?> new inquiries
                                        </span>
                                    </div>
                                </div>
                                <div class="email__item">

                                    <div class="content">

                                        <p>
                                            <a
                                                href="inquiries/product-inquiries/all-inquiries/display-all-inquiries.php">Product
                                                Inquiries
                                            </a>
                                        </p>

                                        <span>You have
                                            <?php echo $product_inquiries_num ?> new inquiries
                                        </span>
                                    </div>

                                </div>
                                <div class="email__footer">
                                    <a href="inquiries/general-inquiries/all-inquiries/display-all-inquiries.php">See
                                        all inquiries</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="./admin-panel-assets/images/icon/avatar-01.jpg" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">
                                    <?php echo $_SESSION['username'];
                                    ?>
                                </a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="./admin-panel-assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">
                                                <?php echo $_SESSION['username'];
                                                ?>
                                            </a>
                                        </h5>
                                        <span class="email">admin@simplerayexports.com</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="admin-login/admin-login.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->