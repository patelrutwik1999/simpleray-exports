<!-- Breadcrumb start -->
<div class="gi-breadcrumb m-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="gi-breadcrumb-title">Inquiry Page</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
                        <ul class="gi-breadcrumb-list">
                            <li class="gi-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="gi-breadcrumb-item active">Inquiry Page</li>
                        </ul>
                        <!-- gi-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->

<!-- Register section -->
<section class="gi-register padding-tb-40">
    <div class="container">
        <div class="section-title-2">
            <h2 class="gi-title">Quick Inquiry<span></span></h2>
            <p>Best place to buy and sell digital products.</p>
        </div>
        <div class="row">
            <div class="gi-register-wrapper">
                <?php
                if (($_SESSION['is-error'] == false) && ($_SESSION['message'] == true)) {
                    $_SESSION['message'] = false;
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>

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

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong>

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
                <div class="gi-register-container">
                    <div class="gi-register-form">
                        <form action="inquiry/store-inquiry/store-inquiry.php" method="POST">
                            <span class="gi-register-wrap gi-register-half">
                                <label>First Name*</label>
                                <input type="text" name="firstname" placeholder="Enter your first name" required>
                            </span>

                            <span class="gi-register-wrap gi-register-half">
                                <label>Last Name*</label>
                                <input type="text" name="lastname" placeholder="Enter your last name" required>
                            </span>

                            <span class="gi-register-wrap gi-register-half">
                                <label>Email*</label>
                                <input type="email" name="email" placeholder="Enter your email add" required>
                            </span>

                            <span class="gi-register-wrap gi-register-half">
                                <label>Phone Number*</label>
                                <input type="text" name="phonenumber" placeholder="Enter your phone number" required>
                            </span>
                            <!-- <span class="gi-register-wrap gi-register-half">
                                <label>City *</label>
                                <span class="gi-rg-select-inner">
                                    <select name="gi_select_city" id="gi-select-city" class="gi-register-select">
                                        <option selected disabled>City</option>
                                        <option value="1">City 1</option>
                                        <option value="2">City 2</option>
                                        <option value="3">City 3</option>
                                        <option value="4">City 4</option>
                                        <option value="5">City 5</option>
                                    </select>
                                </span>
                            </span> -->

                            <span class="gi-register-wrap gi-register-half">
                                <label>Category Name</label>
                                <input type="text" name="categoryname" placeholder="Category name">
                            </span>

                            <span class="gi-register-wrap gi-register-half">
                                <label>Product Name</label>
                                <input type="text" name="productname" placeholder="Product name">
                            </span>

                            <span class="gi-register-wrap">
                                <label>Subject*</label>
                                <input type="text" name="subject" placeholder="Enter subject" required>
                            </span>

                            <span class="gi-register-wrap">
                                <label>Description*</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                        rows="3" placeholder="" required></textarea>
                                </div>
                            </span>

                            <span class="gi-register-wrap">
                                <label></label>
                            </span>
                            <!-- <span class="gi-register-wrap gi-recaptcha">
                                <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                    data-callback="verifyRecaptchaCallback"
                                    data-expired-callback="expiredRecaptchaCallback"></span>
                                <input class="form-control d-none" data-recaptcha="true" required
                                    data-error="Please complete the Captcha">
                                <span class="help-block with-errors"></span>
                            </span> -->
                            <span class="gi-register-wrap gi-register-btn">
                                <button class="gi-btn-1" type="submit">Submit</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sample section End -->