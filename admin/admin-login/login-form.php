<div class="home-center">
    <div class="home-desc-center">

        <div class="container">

            <div class="home-btn"><a href="../index.php" class="text-white router-link-active"><i
                        class="fas fa-home h2"></i></a>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 py-3">


                                <div class="text-center">
                                    <a href="index.html">
                                        <img src="assets/images/logo-1.png" height="130" alt="logo">
                                    </a>

                                    <h5 class="text-primary mb-2 mt-3">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Simpleray Exports.</p>
                                </div>


                                <form class="form-horizontal mt-4 pt-2" action="admin-login/login-validation/validation.php" method="POST">

                                    <div class="mb-3">
                                        <label for="username">Email</label>
                                        <input type="text" class="form-control" id="username" name="email"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Enter password">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i
                                                class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>


                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- End Log In page -->
</div>