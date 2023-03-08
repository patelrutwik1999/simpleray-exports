<!-- Begin page -->
<div class="accountbg"
    style="background: url('assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

<div class="wrapper-page account-page-full">

    <div class="card shadow-none">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box shadow-none p-4">
                    <div class="p-2">
                        <div class="text-center mt-2">
                            <a href="index.php"><img src="assets/images/logo-1.png" height="130" alt="logo"></a>
                        </div>

                        <h4 class="font-size-18 mt-4 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to Simpleray Exports.</p>

                        <form class="mt-4" action="admin-login/login-validation/validation.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter password">
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>
                            </div>

                            <div class="mb-3 mt-2 mb-0 row">
                                <div class="col-12 mt-3">
                                    <a href="pages-recoverpw-2.html"><i class="mdi mdi-lock"></i> Forgot your
                                        password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>