<!-- Breadcrumb start -->
<div class="gi-breadcrumb m-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="gi-breadcrumb-title">Register Page</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
                        <ul class="gi-breadcrumb-list">
                            <li class="gi-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="gi-breadcrumb-item active">Register Page</li>
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
            <h2 class="gi-title">Register<span></span></h2>
            <p>Best place to buy and sell digital products.</p>
        </div>
        <div class="row">
            <div class="gi-register-wrapper">
                <div class="gi-register-container">
                    <div class="gi-register-form">
                        <form action="#" method="post">
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
                                <input type="email" name="email" placeholder="Enter your email add..." required>
                            </span>
                            <span class="gi-register-wrap gi-register-half">
                                <label>Phone Number*</label>
                                <input type="text" name="phonenumber" placeholder="Enter your phone number" required>
                            </span>
                            <span class="gi-register-wrap">
                                <label>Address</label>
                                <input type="text" name="address" placeholder="Address Line 1">
                            </span>
                            <span class="gi-register-wrap gi-register-half">
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
                            </span>
                            <span class="gi-register-wrap gi-register-half">
                                <label>Post Code</label>
                                <input type="text" name="postalcode" placeholder="Post Code">
                            </span>
                            <span class="gi-register-wrap gi-register-half">
                                <label>Country *</label>
                                <span class="gi-rg-select-inner">
                                    <select name="gi_select_country" id="gi-select-country" class="gi-register-select">
                                        <option selected disabled>Country</option>
                                        <option value="1">Country 1</option>
                                        <option value="2">Country 2</option>
                                        <option value="3">Country 3</option>
                                        <option value="4">Country 4</option>
                                        <option value="5">Country 5</option>
                                    </select>
                                </span>
                            </span>
                            <span class="gi-register-wrap gi-register-half">
                                <label>Region State</label>
                                <span class="gi-rg-select-inner">
                                    <select name="gi_select_state" id="gi-select-state" class="gi-register-select">
                                        <option selected disabled>Region/State</option>
                                        <option value="1">Region/State 1</option>
                                        <option value="2">Region/State 2</option>
                                        <option value="3">Region/State 3</option>
                                        <option value="4">Region/State 4</option>
                                        <option value="5">Region/State 5</option>
                                    </select>
                                </span>
                            </span>
                            <span class="gi-register-wrap gi-recaptcha">
                                <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                    data-callback="verifyRecaptchaCallback"
                                    data-expired-callback="expiredRecaptchaCallback"></span>
                                <input class="form-control d-none" data-recaptcha="true" required
                                    data-error="Please complete the Captcha">
                                <span class="help-block with-errors"></span>
                            </span>
                            <span class="gi-register-wrap gi-register-btn">
                                <span>Already have an account?<a href="login.html">Login</a></span>
                                <button class="gi-btn-1" type="submit">Register</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sample section End -->